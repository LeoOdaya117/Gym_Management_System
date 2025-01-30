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
            if (data && data.meals) {
                const mealPlan = data.meals;
                let mealPlanHtml = '';

                // Create a table for the meal plan
                mealPlanHtml += '<table class="meal-plan-table">';
                mealPlanHtml += '<tr>';
                mealPlanHtml += '<th></th>'; // Empty header for spacing
                mealPlanHtml += '<th>Monday</th>';
                mealPlanHtml += '<th>Tuesday</th>';
                mealPlanHtml += '<th>Wednesday</th>';
                mealPlanHtml += '<th>Thursday</th>';
                mealPlanHtml += '<th>Friday</th>';
                mealPlanHtml += '<th>Saturday</th>';
                mealPlanHtml += '<th>Sunday</th>';
                mealPlanHtml += '</tr>';

                // Create rows for each meal
                const daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                for (const meal of mealPlan) {
                    mealPlanHtml += '<tr>';
                    mealPlanHtml += `<td>${meal.title}</td>`; // Meal name

                    // Create columns for each day of the week
                    for (const day of daysOfWeek) {
                        const mealOfDay = mealPlan[day];
                        if (mealOfDay) {
                            const mealDetails = mealOfDay.find((item) => item.title === meal.title);
                            if (mealDetails) {
                                mealPlanHtml += `<td><img src="https://spoonacular.com/recipeImages/${mealDetails.id}-90x90.${mealDetails.imageType}" alt="${mealDetails.title}" class="img-fluid"></td>`;
                            } else {
                                mealPlanHtml += '<td></td>'; // Empty cell if meal not available that day
                            }
                        } else {
                            mealPlanHtml += '<td></td>'; // Empty cell if no meals that day
                        }
                    }

                    mealPlanHtml += '</tr>';
                }

                mealPlanHtml += '</table>';

                $("#mealPlan").html(mealPlanHtml);

                // Display nutrient details
                if (data && data.nutrients) {
                    const nutrients = data.nutrients;
                    const nutrientDetailsHtml = `
                        <div class="nutrient-details">
                            <p><strong>Calories:</strong> ${nutrients.calories.toFixed(2)} kcal</p>
                            <p><strong>Protein:</strong> ${nutrients.protein.toFixed(2)} g</p>
                            <p><strong>Fat:</strong> ${nutrients.fat.toFixed(2)} g</p>
                            <p><strong>Carbohydrates:</strong> ${nutrients.carbohydrates.toFixed(2)} g</p>
                        </div>
                    `;

                    $("#nutrientDetails").html(nutrientDetailsHtml);
                } else {
                    $("#nutrientDetails").html("Nutrient details not available.");
                }
            } else {
                $("#mealPlan").html("Unable to fetch meal plan.");
                $("#nutrientDetails").html(""); // Clear nutrient details on error
            }
        }).fail(function (error) {
            console.log(error); // Log the error to the console
            $("#mealPlan").html("Failed to generate meal plan. Please try again later.");
            $("#nutrientDetails").html(""); // Clear nutrient details on error
        });
    });
});
