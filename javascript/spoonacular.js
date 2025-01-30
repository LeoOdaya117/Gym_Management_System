//import generatePDF from './pdfGenerator.js';

$(document).ready(function () {
    // Function to generate a PDF from the API response

    let apiUrl;
    
    
    $("#mealPlanForm").submit(function (event) {
        event.preventDefault();

        $("#mealPlan").html("");
        $("#nutrientDetails").html("");

        const apiKey = $("#apiKey").val();
        const timeFrame = $("#timeFrame").val();
        const targetCalories = $("#targetCalories").val();
        const diet = $("#diet").val();
        const exclude = $("#exclude").val();
        const cuisine = 'Filipino';

        apiUrl = `https://api.spoonacular.com/mealplanner/generate?apiKey=${apiKey}&timeFrame=${timeFrame}&targetCalories=${targetCalories}&diet=${diet}&exclude=${exclude},&cuisine=${cuisine}`;

        $.get(apiUrl, function (data) {
            if (data && data.meals){
                const mealPlan = data.meals;
                let mealPlanHtml = '';

                for (const meal of mealPlan) {
                    mealPlanHtml += `
                        <li class="list-group-item">
                            <h3>${meal.title}</h3>
                         
                            <img src="https://spoonacular.com/recipeImages/${meal.id}-90x90.${meal.imageType}" alt="${meal.title}" class="img-fluid">
                        </li>
                    `;
                }

                $("#mealPlan").html(mealPlanHtml);
            

                // Display nutrient details
                if (data && data.nutrients) {
                    const nutrients = data.nutrients;
                    const nutrientDetailsHtml = `
                        <p><strong>Calories:</strong> ${nutrients.calories.toFixed(2)} kcal</p>
                        <p><strong>Protein:</strong> ${nutrients.protein.toFixed(2)} g</p>
                        <p><strong>Fat:</strong> ${nutrients.fat.toFixed(2)} g</p>
                        <p><strong>Carbohydrates:</strong> ${nutrients.carbohydrates.toFixed(2)} g</p>
                    `;

                    $("#nutrientDetails").html(nutrientDetailsHtml);
                } else {
                    $("#nutrientDetails").html("Nutrient details not available.");
                }

                // Generate PDF using the data from the API response
                //generatePDF(data);

            }
            else if (data && (data.meals || data.week)) {
                const mealPlan = timeFrame === 'week' ? data.week : data.meals;
                let mealPlanHtml = '';
                let totalNutrients = {
                    calories: 0,
                    protein: 0,
                    fat: 0,
                    carbohydrates: 0
                };

                mealPlanHtml += `<div class="alert alert-info"><h2>WEEK MEALS PLAN</h2>`;

                // Code for displaying nutrient details for each day (Monday, Tuesday, etc.)
                for (const day in mealPlan) {
                    if (mealPlan.hasOwnProperty(day)) {
                        const meals = mealPlan[day].meals;
                        const nutrients = mealPlan[day].nutrients;

                        mealPlanHtml += `<h4>${day.charAt(0).toUpperCase() + day.slice(1)}</h4>`;

                        for (const meal of meals) {
                            mealPlanHtml += `
                                <li class="list-group-item">
                                    <h3>${meal.title}</h3>
                                    
                                    <img src="https://spoonacular.com/recipeImages/${meal.id}-90x90.${meal.imageType}" alt="${meal.title}" class="img-fluid">
                                </li>
                            `;

                            // Accumulate total nutrients for the day
                            for (const nutrient in nutrients) {
                                if (nutrients.hasOwnProperty(nutrient)) {
                                    totalNutrients[nutrient] += nutrients[nutrient];
                                }
                            }
                        }

                        // Display nutrient details for the day
                        mealPlanHtml += `
                            <p><strong>Total Calories:</strong> ${nutrients.calories.toFixed(2)} kcal</p>
                            <p><strong>Total Protein:</strong> ${nutrients.protein.toFixed(2)} g</p>
                            <p><strong>Total Fat:</strong> ${nutrients.fat.toFixed(2)} g</p>
                            <p><strong>Total Carbohydrates:</strong> ${nutrients.carbohydrates.toFixed(2)} g</p>
                            <hr>
                        `;
                    }
                }

                // Separate code for displaying total nutrient details for the week
                mealPlanHtml += `<div class="week-nutrients">`;
                mealPlanHtml += `
                    <br>
                    <br>
                    <h4>Total Nutrients for the Week</h4>
                    <p><strong>Total Calories:</strong> ${totalNutrients.calories.toFixed(2)} kcal</p>
                    <p><strong>Total Protein:</strong> ${totalNutrients.protein.toFixed(2)} g</p>
                    <p><strong>Total Fat:</strong> ${totalNutrients.fat.toFixed(2)} g</p>
                    <p><strong>Total Carbohydrates:</strong> ${totalNutrients.carbohydrates.toFixed(2)} g</p>
                `;
                mealPlanHtml += `</div>`;
                $("#nutrientDetails").html(mealPlanHtml);
            } else {
                if (timeFrame === 'day') { // Handle 'day' time frame here
                    const nutrients = mealPlan.nutrients;

                    for (const meal of mealPlan.meals) {
                        mealPlanHtml += `
                            <li class="list-group-item">
                                <h3>${meal.title}</h3>
                                <img src="https://spoonacular.com/recipeImages/${meal.id}-90x90.${meal.imageType}" alt="${meal.title}" class="img-fluid">
                            </li>
                        `;
                    }

                    // Display nutrient details for the day
                    mealPlanHtml += `
                        <p><strong>Total Calories:</strong> ${nutrients.calories.toFixed(2)} kcal</p>
                        <p><strong>Total Protein:</strong> ${nutrients.protein.toFixed(2)} g</p>
                        <p><strong>Total Fat:</strong> ${nutrients.fat                                .toFixed(2)} g</p>
                        <p><strong>Total Carbohydrates:</strong> ${nutrients.carbohydrates.toFixed(2)} g</p>
                    `;

                    // Separate code for displaying total nutrient details for the week
                    mealPlanHtml += `<div class="week-nutrients">`;
                    mealPlanHtml += `
                        <br>
                        <br>
                        <h4>Total Nutrients for the Week</h4>
                        <p><strong>Total Calories:</strong> ${totalNutrients.calories.toFixed(2)} kcal</p>
                        <p><strong>Total Protein:</strong> ${totalNutrients.protein.toFixed(2)} g</p>
                        <p><strong>Total Fat:</strong> ${totalNutrients.fat.toFixed(2)} g</p>
                        <p><strong>Total Carbohydrates:</strong> ${totalNutrients.carbohydrates.toFixed(2)} g</p>
                    `;
                    mealPlanHtml += `</div>`;
                    $("#nutrientDetails").html(mealPlanHtml);
                } else {
                    $("#mealPlan").html("Unable to fetch meal plan.");
                    $("#nutrientDetails").html(""); // Clear nutrient details on error
                }

                // Generate PDF using the data from the API response
                //generatePDF(data);
            }
        }).fail(function (error) {
            console.log(error); // Log the error to the console
            $("#mealPlan").html("Failed to generate meal plan. Please try again later.");
            $("#nutrientDetails").html(""); // Clear nutrient details on error
        });
        
    });

    /// Handle "Generate PDF" button click
    //document.getElementById('generatePDFButton').addEventListener('click', function () {
        // Make sure apiUrl is defined
        //if (!apiUrl) {
            //console.error('API URL is not defined.');
            //return;
        //}

        //fetch(apiUrl)
            //.then(response => response.json())
            //.then(data => {
                //const mealPlanData = data; // Save the API response here

                // Call the function to generate the PDF
                //generatePDF(mealPlanData);
            //})
            //.catch(error => {
                //console.error('Error fetching data:', error);
            //});
    //});
    
});


