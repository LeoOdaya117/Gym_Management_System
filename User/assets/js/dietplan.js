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

            modalContent = `
                        <p><strong>Description</strong></p>
                        <p>${fooddescription}</p>
                        <p><strong>Nutrients</strong></p>
                        <p>Calorie: ${Calorie} kcal</p>
                        <p>Carb: ${Carb} g</p>
                        <p>Protien: ${Protien} g</p>
                        <p>Fat: ${Fat} g</p>
                    `;

            // Generate modal HTML
            var modal = `
                <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="itemInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="itemInfoModalLabel">${itemName} Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: justify;">
                                ${modalContent}
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Remove existing modal (if any) and append new modal
            $('#' + modalId).remove();
            document.body.insertAdjacentHTML('beforeend', modal);
            // Show the modal
            $('#' + modalId).modal('show');

            // // Add event listener to "See More" button
            // $('.show-more-btn').on('click', function() {
            //     var instructionContent = $(this).siblings('.instruction-content');
            //     if (instructionContent.hasClass('expanded')) {
            //         instructionContent.removeClass('expanded');
            //         $(this).text('See More');
            //     } else {
            //         instructionContent.addClass('expanded');
            //         $(this).text('See Less');
            //     }
            // });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error:', errorThrown);
        }
    });
}

$(document).ready(function() {
    // Make AJAX call to fetch diet plan data
    const urlParams = new URLSearchParams(window.location.search);
    const dietPlanId = urlParams.get('dietplanid');
    const day = urlParams.get('day');

    $.ajax({
        url: 'api/fetch_dietplan_data.php', // Replace with your PHP script URL
        type: 'GET',
        dataType: 'json',
        data: {
            dietplanid: dietPlanId,
            day: day
        },
        success: function(response) {
            // Process the fetched data and populate the cards
            response.forEach(function(food) {
                var photo = food.image;

                if(food.image == ""){
                    photo = "img/imageNotFound.jpg";
                }
                var cardHtml = `
                    <div class="col-md-4">
                        <div class="card mb-3 food-card">
                            <div class="card-body food-content">
                                <div class="flex-container">
                                    <img src="${photo}" alt="Food Image" class="card-img">
                                    <div class="flex-item">
                                        <h5 class="card-title">${food.name}</h5>
                                        <p class="card-text">Serving: ${food.Serving}g</p>
                                    </div>
                                </div>
                                <div class="info-icon-container">
                                    <a href="#info-modal" >
                                        <i class="fa-solid fa-circle-info info-icon" onclick="openInfoModal('${food.id}', '${food.name}', 'food')"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Determine where to append the card based on the meal type
                if (food.mealtype === 'breakfast') {
                    $('#breakfastFood').append(cardHtml);
                } else if (food.mealtype === 'lunch') {
                    $('#lunchFood').append(cardHtml);
                } else if (food.mealtype === 'dinner') {
                    $('#DinnerFood').append(cardHtml);
                }
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

function gotonextURL(url){
    window.location.href = url;
}

function day(day) {
    const urlParams = new URLSearchParams(window.location.search);
    const WorkoutPlanID = urlParams.get('id');
    window.location.href = "today-diet-plan_no_header.php?dietplanid=" + WorkoutPlanID + "&day=" + day;
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