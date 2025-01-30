const video = document.getElementById('video');

        function startScanner() {
            // Check if camera access is supported
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
                    .then(function(stream) {
                        // Start video stream
                        video.srcObject = stream;
                        video.play();

                        // Create canvas element for drawing
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        const canvasWidth = canvas.width = 800;
                        const canvasHeight = canvas.height = 600;

                        // Listen for video play event
                        video.addEventListener('play', function() {
                            const tick = function() {
                                if (video.paused || video.ended) return false;

                                // Draw video frame on canvas
                                ctx.drawImage(video, 0, 0, canvasWidth, canvasHeight);

                                // Get image data from canvas
                                const imageData = ctx.getImageData(0, 0, canvasWidth, canvasHeight);

                                // Decode QR code from image data
                                const code = jsQR(imageData.data, imageData.width, imageData.height);

                                if (code) {
                                    console.log('QR code detected:', code.data);
                                    // Pause the video stream
                                    video.pause();
                                    // Save attendance and resume video after 5 seconds
                                    setTimeout(function() {
                                        saveAttendance(code.data);
                                    }, 3000); // Delay of 5 seconds (5000 milliseconds)
                                } else {
                                    console.log('No QR');
                                }

                                requestAnimationFrame(tick);
                            };

                            setTimeout(tick, 2000);
                        });
                    })
                    .catch(function(error) {
                        console.error('Error accessing camera:', error);
                        alert('Error accessing camera: ' + error.message);
                    });
            } else {
                alert('Camera access not supported by this browser.');
            }
        }

        function saveAttendance(userID) {
            // AJAX request to retrieve user's full name
            $.ajax({
                url: '../get_fullname.php',
                method: 'POST',
                data: { userID: userID },
                success: function(response) {
                    try {
                        const userData = JSON.parse(response);
        
                        if (userData.error) {
                            // Handle server-side error or user not found
                            Swal.fire({
                                icon: "warning",
                                title: "Not a Member",
                                text: userData.error,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            video.play(); // Assuming 'video' is your video element
                            return;
                        }
                       
        
                        const fullName = `${userData.Firstname} ${userData.Lastname}`;
                        const subscriptionPlan = userData.plan || "N/A";
                        const dueDate = userData.dueDate || "N/A";

                        const photo = userData.photo || "img/notfound.jpg";

                        let formattedDueDate = "N/A";

                        if (dueDate !== "N/A") {
                            const dateObj = new Date(dueDate);
                            const month = dateObj.toLocaleString('default', { month: 'short' });
                            const day = dateObj.getDate();
                            const year = dateObj.getFullYear();
                            
                            formattedDueDate = `${month} ${day}, ${year}`;
                        }
        
                        // AJAX request to save attendance
                        $.ajax({
                            url: '../save_attendance.php',
                            method: 'POST',
                            data: { userID: userID, fullName: fullName },
                            success: function(response) {
                                if (response === "timeIn") {
                                    // Display subscription details in SweetAlert
                                    const swalContent = `
                                        <div style="display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column;">
                                            <!-- Circular Image -->
                                            <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; margin-bottom: 20px;">
                                                <img src="${'../'+ photo}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                            </div>
                                            <!-- Text Content -->
                                            <div>
                                                <p style="font-weight: bold; margin-bottom: 5px;">${fullName}</p>
                                                <p style="margin-bottom: 5px;">Subscription Plan: ${subscriptionPlan}</p>
                                                <p>Due Date: ${formattedDueDate}</p>
                                            </div>
                                        </div>
                                    `;
                                    Swal.fire({
                                        icon: "success",
                                        title: "Time In",
                                        html: swalContent,
                                        showConfirmButton: true
                                    });
                                } else if (response === "timeOut") {
                                    // Handle timeOut success
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: "TimeOut saved successfully.",
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                } else {
                                    // Handle other responses (e.g., errors)
                                    Swal.fire({
                                        icon: "error",
                                        title: "Failed",
                                        text: response,
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                    video.play(); // Assuming 'video' is your video element
                                }
        
                                // Play video and fetch attendance data
                                video.play(); // Assuming 'video' is your video element
                                fetchAttendanceForToday(); // Assuming this function fetches attendance data
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", error);
                                Swal.fire({
                                    icon: "error",
                                    title: "Failed",
                                    text: "Failed to save attendance.",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                video.play(); // Assuming 'video' is your video element
                            }
                        });
                    } catch (error) {
                        console.error("JSON Parse Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Failed",
                            text: "Failed to parse server response.",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        video.play(); // Assuming 'video' is your video element
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Failed",
                        text: "Failed to retrieve user details.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    video.play(); // Assuming 'video' is your video element
                }
            });
        }
        

        document.addEventListener('DOMContentLoaded', function() {
            startScanner();
            fetchAttendanceForToday();
        });

        function fetchAttendanceForToday() {
    // Get today's date
            const today = new Date().toISOString().slice(0, 10);

            // AJAX request to retrieve attendance data for today
            $.ajax({
                url: '../fetch_attendance_today.php',
                dataType: 'json',
                success: function(response) {
                    updateTable(response);
                },
                error: function(error) {
                    console.error('Error fetching attendance:', error);
                }
            });
        }


        function updateTable(attendanceData) {
            const tableBody = document.querySelector('#attendance-table tbody');
            tableBody.innerHTML = ''; // Clear existing rows
            
            attendanceData.forEach(function(record) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${record.user_id}</td>
                    <td>${record.FullName}</td>
                    <td>${record.timeIn}</td>
                    <td>${record.timeOut}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Function to update the current time continuously
        function updateTime() {
            const options = { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
            const currentTime = new Date().toLocaleDateString('en-US', options);

            const currentTimeDiv = document.getElementById('current-time');
            currentTimeDiv.textContent = 'Current Date and Time: ' + currentTime;

            // // Update the time every second
            setTimeout(updateTime, 1000);
        }

        // Call the updateTime function to start updating the time
        updateTime();
