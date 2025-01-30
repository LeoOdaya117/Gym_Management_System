
var youtubePlayer;
var isYouTubeAPIReady = false;




function openInfoModal(itemId, itemName, category) {

    // console.log('ID:', itemId);
    // console.log('category:', category);
    var modalId = 'itemInfoModal_' + itemId;
    var modalContent = ''; 

    $.ajax({
        url: 'api/fetch_details.php',
        type: 'GET',
        dataType: 'json',
        data: { itemId: itemId, category: category },
        success: function(data) {

            var description = data.Description;
            var instruction = data.Instructions;
            var VideoURL = data.VideoURL;


            modalContent = `
                        <div class="video-container">
                            <iframe id="youtubePlayer" width="100%" height="180" src="${VideoURL}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        
                        <div class="description">
                            <p><strong>Description</strong></p>
                            <p class="description-content mb-n5">${description}</p>
                            <button class="show-more-btn-description" style="background-color: #f0f2f5; border: none; color: #385898; cursor: pointer;">See More</button>
                        </div>
                        <div class="instruction">
                            <p><strong>Instruction</strong></p>
                            <p class="instruction-content">${instruction}</p>
                            <button class="show-more-btn-instruction" style="background-color: #f0f2f5; border: none; color: #385898; cursor: pointer;">See More</button>
                        </div>
                    `;
            // Generate modal HTML
            var modal = `
                <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="itemInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="itemInfoModalLabel">${itemName} Information</h5>
                                <button type="button" class="btn-close"  aria-label="Close" onclick="closeModal('${modalId}')"></button>
                            </div>
                            <div class="modal-body" style="text-align: justify;">
                                ${modalContent}
                            </div>
                        </div>
                    </div>
                </div>
            `;

            
            $('#' + modalId).remove();
           
            document.body.insertAdjacentHTML('beforeend', modal);
    
            $('#' + modalId).modal('show');

           

            // Function to toggle content visibility
            function toggleContent(button, content) {
                if (content.hasClass('expanded')) {
                    content.removeClass('expanded');
                    button.text('See More');
                } else {
                    content.addClass('expanded');
                    button.text('See Less');
                }
            }

            // Add event listener to "See More" button for description
            $('.show-more-btn-description').on('click', function() {
                var descriptionContent = $(this).siblings('.description-content');
                var instructionContent = $('.show-more-btn-instruction').siblings('.instruction-content');
                
                // Check if instruction content is expanded
                if (instructionContent.hasClass('expanded')) {
                    toggleContent($('.show-more-btn-instruction'), instructionContent);
                }
                
                toggleContent($(this), descriptionContent);
            });

            // Add event listener to "See More" button for instructions
            $('.show-more-btn-instruction').on('click', function() {
                var instructionContent = $(this).siblings('.instruction-content');
                var descriptionContent = $('.show-more-btn-description').siblings('.description-content');
                
                // Check if description content is expanded
                if (descriptionContent.hasClass('expanded')) {
                    toggleContent($('.show-more-btn-description'), descriptionContent);
                }
                
                toggleContent($(this), instructionContent);
            });



        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}




function closeModal(modalId) {
    console.log('Closing modal');
    $('#' + modalId).modal('hide');
    $('#' + modalId).remove();
}


$(document).ready(function() {
    // Make AJAX call to fetch diet plan data
    const urlParams = new URLSearchParams(window.location.search);
    const WorkoutPlanID = urlParams.get('WorkoutPlanID');
    const day = urlParams.get('day');
 
    $.ajax({
        url: 'api/fetch_workout_data.php', // Replace with your PHP script URL
        type: 'GET',
        dataType: 'json',
        data: {
            WorkoutPlanID: WorkoutPlanID,
            day: day
        },
        success: function(response) {
            // Process the fetched data and populate the cards
            if (response.length === 0) {
                // Display "Rest Day" message
               
                var cardHtml = `
                    <div class="col-md-4">
                        <div class="card mb-3 food-card" style="background-image: url('https://ivypanda.com/blog/wp-content/uploads/2021/03/serene-black-man-resting-park-listening-music-704x372.jpg'); background-size: cover; position: relative;"> <!-- Added inline CSS for background image -->
                            <div class="card-body food-content" style="text-align: center; position: relative; z-index: 1; display:block"> <!-- Added inline CSS for text alignment -->
                                <h5 class="text-light">Rest Day</h5>
                                <p class="text-light">Enjoy your rest day!</p>
                            </div>
                            <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 0;"></div> <!-- Added overlay with blur effect -->
                        </div>
                    </div>
                `;


                $('#exercisecard').append(cardHtml);
            } else {
                response.forEach(function(exercise) {
                    var photo = exercise.image;
                    var sets = exercise.set;
                    var reps = exercise.reps;
                    var content = '';

                    if(exercise.image == ""){
                        photo = "img/imageNotFound.jpg";
                    }
                    
                    if (sets == "" && reps == "") {
                        // Display content for exercises with only duration
                        content = `<p class="card-text">Duration: ${exercise.duration}</p>`;
                    } else {
                        // Display content for exercises with sets and reps
                        content = `<p class="card-text">Sets: ${sets}</p><p class="card-text">Reps: ${reps}</p>`;
                    }
                    var cardHtml = `
                        <div class="col-md-4">
                            <div class="card mb-3 food-card">
                                <div class="card-body food-content">
                                    <div class="flex-container">
                                        <img src="${photo}" alt="Food Image" class="card-img">
                                        <div class="flex-item">
                                            <h5 class="card-title">${exercise.name}</h5>
                                            ${content}
                                            
                                        </div>
                                    </div>
                                    <div class="info-icon-container">
                                        <a href="#info-modal" >
                                            <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${exercise.ExerciseID}', '${exercise.name}', 'exercise')"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $('#exercisecard').append(cardHtml);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});


function gotonextURL(url){
    window.location.href = url;
}


// Get the reference to the <li> element
var planElement = document.getElementById("plan");

// Add a click event listener to the <li> element
planElement.addEventListener("click", function() {
    // Get the current URL
    var currentUrl = window.location.href;

    // Check if the URL already contains parameters
    var separator = currentUrl.includes("?") ? "&" : "?";

    // Add or update the parameter 'type=plan' to the URL
    var newUrl = currentUrl + separator + "type=plan";

    // Redirect the user to the new URL
    window.location.href = newUrl;

    window.location.href = "loadingpage.php";
});