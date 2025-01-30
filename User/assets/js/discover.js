var warmup = document.getElementById("third_div");
var workoutscontainer = document.getElementById("first_div");
var workout = document.getElementById("first_div");
var workoutexercise = document.getElementById("second_div");

var youtubePlayer;
var isYouTubeAPIReady = false;

// Function to initialize YouTube player
function onYouTubeIframeAPIReady() {
    youtubePlayer = new YT.Player('youtubePlayer', {
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
    isYouTubeAPIReady = true;
}

function onPlayerStateChange(event) {
    // You can add logic here if needed
}

// Initialize YouTube player when the page loads
$(document).ready(function() {
    if (typeof YT !== 'undefined' && typeof YT.Player !== 'undefined') {
        onYouTubeIframeAPIReady();
    }
});



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
            var fooddescription = data.description;
            var Calorie = data.calories;
            var Carb = data.carbohydrates;
            var Protien = data.protein;
            var Fat = data.fat;

            var equipmentDescription = data.equipmentDescription;


            // Construct the new URL with variables
            var newUrl = "/gym_website/user/discover.php?" +
            "current=" + encodeURIComponent('disover') +
            "&itemId=" + encodeURIComponent(itemId) +
            "&itemName=" + encodeURIComponent(itemName) +
            "&category=" + encodeURIComponent(category) +
            "&description=" + encodeURIComponent(description) +
            "&instruction=" + encodeURIComponent(instruction) +
            "&VideoURL=" + encodeURIComponent(VideoURL) +
            "&fooddescription=" + encodeURIComponent(fooddescription) +
            "&Calorie=" + encodeURIComponent(Calorie) +
            "&Carb=" + encodeURIComponent(Carb) +
            "&Protien=" + encodeURIComponent(Protien) +
            "&Fat=" + encodeURIComponent(Fat) +
            "&equipmentDescription=" + encodeURIComponent(equipmentDescription);
        
            history.pushState({}, '', newUrl);

            // Generate modal content based on the category
            switch(category) {
                case 'exercise':
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
                    break;
                case 'warmup':
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
                    break;

                case 'food':
                    modalContent = `
                        <p><strong>Description</strong></p>
                        <p>${fooddescription}</p>
                        <p><strong>Nutrients</strong></p>
                        <p>Calorie: ${Calorie} kcal</p>
                        <p>Carb: ${Carb} g</p>
                        <p>Protien: ${Protien} g</p>
                        <p>Fat: ${Fat} g</p>
                    `;
                    break;
                case 'equipment':
                    modalContent = `
                        <p><strong>Description</strong></p>
                        <p>${equipmentDescription}</p>
                    `;
                    break;
                default:
                    // Handle unknown category
                    modalContent = `<p>No specific information available for ${itemName} (ID: ${itemId}) in the category ${category}.</p>`;
            }

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
            // Show the modal
            if ((category === 'exercise' || category === 'warmup') && !isYouTubeAPIReady) {
                // If YouTube API is not ready, wait and retry
                setTimeout(function () {
                    openInfoModal(itemId, itemName, category);
                }, 1000); // Retry after 1 second
                return;
            }
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



$(document).on('hidden.bs.modal', '.modal', function() {
    var modalId = $(this).attr('id');
    closeModal(modalId);
});

function closeModal(modalId) {
    console.log('Closing modal');
    
    // Pause the YouTube video after a slight delay
    setTimeout(function() {
        // Access the YouTube player directly from the DOM
        var playerElement = document.getElementById('youtubePlayer');
        if (playerElement && typeof playerElement.pauseVideo === 'function') {
            console.log('Pausing video');
            playerElement.pauseVideo();
        } else {
            console.log('YouTube player not found or pauseVideo function not available');
        }
    }, 500); // Adjust the delay time as needed
    
    // Close the modal
    $('#' + modalId).modal('hide');
    $('#' + modalId).remove();
}




document.addEventListener('DOMContentLoaded', function() {
    toggleCategory('workout');
});

function toggleCategory(category) {
    $('#search').val('');
    if(category == 'workout'){
        var warmup = document.getElementById("third_div");
        var workout = document.getElementById("first_div");
        var workoutexercise = document.getElementById("second_div");

        warmup.style.display = "none"; // Show the qrCodeContainer
        workoutexercise.style.display = "none"; // Show the qrCodeContainer
        workout.style.display = "block"; // Show the qrCodeContainer
    }else if(category == 'exercise'){
        fetchExercises("");
    }
    else if(category == 'food'){
        fetchFood("");
    }
    else if(category == 'equipment'){
        fetchEquipment("");
    }
    else{
        
    }

    
   
    
    var navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.style.opacity = '0.5'; 
        item.style.fontWeight = 'normal';
        item.style.fontSize = '15px';
    });

    var selectedItem = document.querySelector(`.nav-item[data-category="${category}"]`);
    selectedItem.style.fontWeight = 'bold';
    selectedItem.style.opacity = '1'; 
    selectedItem.style.fontSize = '17px';

    var containers = category + 'container';
    var containerElement = document.querySelector('.' + containers);

    if (containerElement) {
        containerElement.style.display = "block";
    }

    var allContainers = document.querySelectorAll('.container-content > div');
    allContainers.forEach(container => {
        if (container !== containerElement) {
            container.style.display = "none";
        }
    });
}



function fetchExercises(value) {
    $.ajax({
        url: 'api/fetch_exercise.php', // PHP script to fetch exercise data
        type: 'GET',
        dataType: 'json',
        data: { search: value },
        success: function(data) {
            // Iterate through each exercise in the data
            $('.exercisecontainer').empty();
            data.forEach(function(exercise) {
                // Create a new card element for each exercise
                var image = "";
                if (exercise.ImageUR == null){
                    image = "img/imageNotFound.jpg";
                }
                else{
                    image = exercise.ImageUR;
                }

         
                // var exerciseCard = `
                //     <div class="card">
                //         <div class="card-img-overlay">
                //             <h5 class="card-title">${exercise.ExerciseName}</h5>
                //             <p class="card-text">${exercise.EquipmentID}</p>
                //             <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${exercise.ExerciseID}', '${exercise.ExerciseName}', 'exercise')"></i>
                //         </div>
                //         <img src="${exercise.ImageURL}" class="card-img" alt="${exercise.ExerciseName} image">
                //     </div>
                // `;

                var exerciseCard = `
                <div class="col-md-4">
                        <div class="card mb-3 warmup-card">
                            <div class="card-body warmup-content">
                                <div class="flex-container">
                                    <img src="${exercise.ImageURL}" alt="${exercise.ExerciseName} Image" class="card-img">
                                    <div class="flex-item mt-3">
                                        <h5 class="card-title">${exercise.ExerciseName}</h5>
                                        <p class="card-text">Equipment: ${exercise.EquipmentID}</p>
                                        
                                    </div>
                                </div>
                                <div class="info-icon-container">
                                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${exercise.ExerciseID}', '${exercise.ExerciseName}', 'exercise')"></i>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                `;
                // Append the exercise card to the exercise container
                $('.exercisecontainer').append(exerciseCard);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}

function fetchFood(value) {
    $.ajax({
        url: 'api/fetch_food.php', // PHP script to fetch exercise data
        type: 'GET',
        dataType: 'json',
        data: { search: value },
        success: function(data) {
            // Iterate through each exercise in the data
            $('.foodcontainer').empty();
            data.forEach(function(food) {
                // Create a new card element for each exercise
                var image = "";
                if (food.photo == "" || food.photo == null){
                    image = "img/imageNotFound.jpg";
                }
                else{
                    image = food.photo;
                }
                // var foodCard = `

                
                //     <div class="card">
                //         <div class="card-img-overlay">
                //             <h5 class="card-title">${food.name}</h5>
                //             <p class="card-text">Serving: ${food.serving}g</p>
                //             <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${food.id}', '${food.name}', 'food')"></i>
                //         </div>
                //         <img src="${image}" class="card-img" alt="${food.name} image">
                //     </div>
                // `;

                var foodCard = `
                <div class="col-md-4">
                        <div class="card mb-3 food-card">
                            <div class="card-body food-content">
                                <div class="flex-container">
                                    <img src="${image}" alt="${food.name} Image" class="card-img">
                                    <div class="flex-item mt-3">
                                        <h5 class="card-title">${food.name}</h5>
                                        <p class="card-text">Serving: ${food.serving}g</p>
                                        
                                    </div>
                                </div>
                                <div class="info-icon-container">
                                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${food.id}', '${food.name}', 'food')"></i>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                `;
                // Append the exercise card to the exercise container
                $('.foodcontainer').append(foodCard);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}

function fetchEquipment(value) {
    $.ajax({
        url: 'api/fetch_equipment.php', // PHP script to fetch exercise data
        type: 'GET',
        dataType: 'json',
        data: { search: value },
        success: function(data) {
            // Iterate through each exercise in the data
            $('.equipmentcontainer').empty();
            data.forEach(function(equipment) {
                // Create a new card element for each exercise
                var image = "";
                if (equipment.image == "" || equipment.image == null){
                    image = "img/imageNotFound.jpg";
                }
                else{
                    image = equipment.image;
                }
                // var equipmentCard = `

                
                //     <div class="card">
                //         <div class="card-img-overlay">
                //             <h5 class="card-title">${equipment.equipmentName}</h5>
                //             <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${equipment.equipmentID}', '${equipment.equipmentName}', 'equipment')"></i>
                //         </div>
                //         <img src="${image}" class="card-img" alt="${equipment.equipmentName} image">
                //     </div>
                // `;


                var equipmentCard = `
                <div class="col-md-4">
                        <div class="card mb-3 food-card">
                            <div class="card-body food-content">
                                <div class="flex-container">
                                    <img src="${image}" alt="${equipment.equipmentName} Image" class="card-img">
                                    <div class="flex-item mt-3">
                                        <h5 class="card-title">${equipment.equipmentName}</h5>
                                        
                                        
                                    </div>
                                </div>
                                <div class="info-icon-container">
                                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${equipment.equipmentID}', '${equipment.equipmentName}', 'equipment')"></i>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                `;
                // Append the exercise card to the exercise container
                $('.equipmentcontainer').append(equipmentCard);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}

$(document).ready(function() {
    $('#search-button').on('click', function() {
        var searchValue = $('#search').val().trim();
        console.log(searchValue);
        fetchExercises(searchValue);
        fetchFood(searchValue);
        fetchEquipment(searchValue);
    });

    $('#search').on('input', function() {
        var searchValue = $(this).val().trim();
         if (searchValue === '') {
            fetchExercises('');
            fetchFood('');
            fetchEquipment('');
        } else {
            fetchExercises(searchValue);
            fetchFood(searchValue);
            fetchEquipment(searchValue);
        }
    });


    
});




function fetchWorkouts(workout, difficulty) {

     console.log("Workout: " + workout, "Difficulty: " +difficulty); 

    

    var warmup = document.getElementById("third_div");
    var workouts = document.getElementById("second_div");
    var workoutscontainer = document.getElementById("first_div");

    workoutscontainer.style.display = "none"; // Show the qrCodeContainer

    if(workout == "warmup"){
        warmup.style.display = "block"; // Show the qrCodeContainer
    }else{
        workouts.style.display = "block"; // Show the qrCodeContainer
    }
    
   

    $.ajax({
        url: 'api/fetch_exercise.php', // PHP script to fetch exercise data
        type: 'GET',
        dataType: 'json',
        data: { workout: workout, difficulty:difficulty},
        success: function(data) {
            // Iterate through each exercise in the data

            $('.warmup-exercise').empty();
            data.forEach(function(exercise) {
                // Create a new card element for each exercise
                var image = "";
                if (exercise.ImageURL == null){
                    image = "img/imageNotFound.jpg";
                }
                else{
                    image = exercise.ImageURL;
                }

         
             
                
                var exerciseCard = `
                <div class="col-md-4">
                        <div class="card mb-3 warmup-card">
                            <div class="card-body warmup-content">
                                <div class="flex-container">
                                    <img src="${exercise.ImageURL}" alt="${exercise.ExerciseName} Image" class="card-img">
                                    <div class="flex-item mt-3">
                                        <h5 class="card-title">${exercise.ExerciseName}</h5>
                                        <p class="card-text">Equipment: ${exercise.Equipment}</p>
                                        
                                    </div>
                                </div>
                                <div class="info-icon-container">
                                    <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${exercise.id}', '${exercise.ExerciseName}', 'warmup')"></i>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                `;
                // Append the exercise card to the exercise container
                $('.warmup-exercise').append(exerciseCard);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}
