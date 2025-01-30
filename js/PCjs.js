/*!
 * Start Bootstrap - SB Admin 2 v4.0.2 (https://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin-2/blob/master/LICENSE)
 */

(function($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on("click", function(event) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        
        if ($(".sidebar").hasClass("toggled")) {
            $(".sidebar .collapse").collapse("hide");
        }
    });



     // Toggle sidebar on document ready
     $(document).ready(function() {
        $(".sidebar .collapse").collapse("hide");
        // $(".sidebar").toggleClass("toggled");
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
        if ($(window).width() < 768) {
            $(".sidebar .collapse").collapse("hide");
        }
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function(event) {
        if ($(window).width() > 768) {
            var originalEvent = event.originalEvent;
            var delta = originalEvent.wheelDelta || -originalEvent.detail;
            this.scrollTop += 30 * (delta < 0 ? 1 : -1);
            event.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on("scroll", function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on("click", "a.scroll-to-top", function(event) {
        var $anchor = $(this);
        $("html, body").stop().animate({
            scrollTop: $($anchor.attr("href")).offset().top
        }, 1000, "easeInOutExpo");
        event.preventDefault();
    });

})(jQuery); // End of use strict

$(document).ready(function() {
    // Function to fetch notifications
    function fetchNotifications() {
        console.log('Fetching notifications...'); // Check if this log message appears in the console
        $.ajax({
            url: 'fetch_notifications.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Clear existing notifications
                $('#notificationList').empty();
                
                // Update the notification counter
                $('#notifNum').text(data.length);

                // Get the latest date from the notifications
                var latestDate = new Date(Math.max.apply(null, data.map(function(notification) {
                    return new Date(notification.notifDate);
                })));

                // Convert the latest date to a string
                var latestDateString = latestDate.toDateString();

                // Define an object to store counts for each message category
                var categoryCounts = {};

                // Map categories to icon colors
                var categoryIconColors = {
                    'Account Registration': 'bg-primary',
                    'Subscription Request': 'bg-success',
                    'User Expiring Subscription': 'bg-warning'
                };


                // Group notifications by category and count them
                $.each(data, function(index, notification) {
                    categoryCounts[notification.messageCategory] = (categoryCounts[notification.messageCategory] || 0) + 1;
                });

                // Define a mapping of categories to icon classes and colors
                var categoryIcons = {
                    'Account Registration': { iconClass: 'fas fa-user-plus', color: 'bg-primary' },
                    'Subscription Request': { iconClass: 'fas fa-file-alt', color: 'bg-success' },
                    'User Expiring Subscription': { iconClass: 'fas fa-exclamation-triangle', color: 'bg-warning' }
                };

                // Append new notifications grouped by category
                $.each(categoryCounts, function(category, count) {
                    // Get the icon class and color for the current category
                    var iconClass = categoryIcons[category].iconClass;
                    var color = categoryIcons[category].color;

                    // Get the latest date for this category
                    var latestDate = new Date(Math.max.apply(null, data.filter(function(notification) {
                        return notification.messageCategory === category;
                    }).map(function(notification) {
                        return new Date(notification.notifDate);
                    })));

                    // Convert the latest date to a string
                    var latestDateString = latestDate.toDateString();

                    // Create the notification list item
                    var listItem = $('<a>', {
                        class: 'dropdown-item d-flex align-items-center',
                        href: '#',
                        click: function() {
                            $.ajax({
                                type: "POST",
                                url: "update_notification.php",
                                data: {
                                    category: category,
                                    
                                },
                                success: function (response) {

                                    response = response.trim();

                                    if(response === "Success"){

                                        if(category === 'Account Registration'){
                                            window.location.href = "forApproval.php";
                                        }
                                        else if(category === 'Subscription Request'){
                                            window.location.href = "paymentRequest.php";
                                        }
                                        else if(category === 'User Expiring Subscription'){
                                            window.location.href = "member_status.php";
                                        }
                                        else{
                                            window.location.href = "admin-index.php";
                                        }
                                        
                                    }
                                    else{
                                        alert(response);
                                    }
                        
                                
                                }
                            });
                        },
                        html: '<div class="mr-3">' +
                            '<div class="icon-circle ' + color + '">' +
                            '<i class="' + iconClass + ' text-white"></i>' +
                            '</div>' +
                            '</div>' +
                            '<div>' +
                            '<div class="small text-gray-500">' + latestDateString + '</div>' +
                            '<span class="font-weight-bold">' + count + ' new ' + category + ' has been received.</span>' +
                            '</div>'
                    });

                    // Append the notification list item
                    $('#notificationList').append(listItem);
                });







                
                

            },
            error: function(xhr, status, error) {
                console.error('Error fetching notifications:', error);
            }
        });
    }

    // Fetch notifications initially
    fetchNotifications();

    // Fetch notifications every 30 seconds
    setInterval(fetchNotifications, 2000);
});


function checkExpiringMemberships() {
    $.ajax({
        url: 'check_subscription.php',
        type: 'POST',
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function runCheck() {
    checkExpiringMemberships();
    
    setInterval(checkExpiringMemberships, 12 * 60 * 60 * 1000); 
}

$(document).ready(function() {
    runCheck();
});



function promptForPassword(url) {
    Swal.fire({
        title: 'Enter Admin Password',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        showLoaderOnConfirm: true,
        preConfirm: (password) => {
            // Perform Ajax call to verify password
            return $.ajax({
                url: 'admin/api/verify_password.php', // Replace with the URL of your PHP script for password verification
                type: 'POST',
                data: { password: password },
                dataType: 'json',
                success: function(response) {
                    if (response.valid) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Correct!',
                            text: 'You have been granted access.',
                            confirmButtonText: 'Close'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location.href = url;

                            }
                        });
                        

                        // Add your logic to redirect or show the content here
                    } else {
                        Swal.showValidationMessage('Incorrect password. Please try again.');
                    }
                }
            });
        },
        allowOutsideClick: false, // Prevent closing on click outside
        allowEscapeKey: false // Prevent closing with keyboard ESC key
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.cancel) {
            // Cancel button was clicked
            // window.location.href = 'admin-index.php';
        }
    });
}


// let inactivityTimer;

// function resetTimer() {
//     clearTimeout(inactivityTimer);
//     inactivityTimer = setTimeout(logout,  1 * 60 * 1000); // 3 minutes in milliseconds
// }


// function handleActivity() {
//     resetTimer();
    
// }


// function logout() {
    
//     window.location.href = 'logout.php';
// }


// document.addEventListener('mousemove', handleActivity);
// document.addEventListener('keypress', handleActivity);

// resetTimer();
