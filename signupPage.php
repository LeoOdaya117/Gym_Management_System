<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Fitness App - Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
            margin-top: 30px;
        }

        .questionnaire-section {
            background-color: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .question label {
            margin-bottom: 5px;
        }

        .question input,
        .question select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #1f1f1f;
            border-color: #1f1f1f;
        }

        /* Center content on small screens */
        @media (max-width: 576px) {
            .row.justify-content-center {
                justify-content: center;
            }

            .col-md-8 {
                max-width: 100%;
            }
        }
    </style>
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Section 1: Personal Information -->
            <div class="questionnaire-section" id="personalInfo">
                <h5 class="mb-4">Personal Information</h5>
                <div class="question">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="question">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="question">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="question">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="nextStep('personalInfo', 'physicalInfo')">Next</button>
            </div>

            <!-- Section 2: Physical Information -->

            <div class="questionnaire-section" id="physicalInfo" style="display: none;">
                <h5 class="mb-4">Physical Information</h5>
                <div class="question">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
                <div class="question">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="question">
                    <label for="weight">Weight (kg):</label>
                    <input type="number" class="form-control" id="weight" name="weight" required>
                </div>
                <div class="question">
                    <label for="height">Height (cm):</label>
                    <input type="number" class="form-control" id="height" name="height" required>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="calculateBmiAndContinue()">Next</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" onclick="prevStep('physicalInfo', 'personalInfo')">Previous</button>
            </div>


            <!-- Section 3: Goals and Preferences -->
            <div class="questionnaire-section" id="goalsPreferences" style="display: none;">
                <h5 class="mb-4">Goals and Preferences</h5>
                <div class="question">
                    <label for="fitnessGoal">Fitness Goal:</label>
                    <select class="form-control" id="fitnessGoal" name="fitnessGoal" required>
                        <option value="weightLoss">Weight Loss</option>
                        <option value="muscleGain">Muscle Gain</option>
                        <option value="maintain">Maintain</option>
                    </select>
                </div>
                <div class="question">
                    <label for="experienceLevel">Experience Level:</label>
                    <select class="form-control" id="experienceLevel" name="experienceLevel" required>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
    </div>
                <button type="button" class="btn btn-primary btn-block" onclick="nextStep('goalsPreferences', 'workoutPreferences')">Next</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" onclick="prevStep('goalsPreferences', 'physicalInfo')">Previous</button>
            </div>

            <!-- Section 4: Workout Preferences -->
            <div class="questionnaire-section" id="workoutPreferences" style="display: none;">
                <h5 class="mb-4">Workout Preferences</h5>
                <div class="question">
                    <label for="workoutGoal">Workout Goal:</label>
                    <select class="form-control" id="workoutGoal" name="workoutGoal" required>
                        <option value="fullBody">Full Body</option>
                        <option value="upperBody">Upper Body</option>
                        <option value="lowerBody">Lower Body</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="nextStep('workoutPreferences', 'dietaryPreferences')">Next</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" onclick="prevStep('workoutPreferences', 'goalsPreferences')">Previous</button>
            </div>

            <!-- Section 5: Dietary Preferences -->
            <div class="questionnaire-section" id="dietaryPreferences" style="display: none;">
                <h5 class="mb-4">Dietary Preferences</h5>
                <div class="question">
                    <label for="dietPreference">Diet Preference:</label>
                    <select class="form-control" id="dietPreference" name="dietPreference" required>
                        <option value="none">None</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="vegan">Vegan</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="submitForm()">Submit</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" onclick="prevStep('dietaryPreferences', 'workoutPreferences')">Previous</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showStep(stepId) {
        // Hide all steps
        $(".questionnaire-section").hide();
        // Show the specified step
        $("#" + stepId).show();
    }

    function nextStep(currentStepId, nextStepId) {
        showStep(nextStepId);
    }

    function prevStep(currentStepId, prevStepId) {
        showStep(prevStepId);
    }

    function calculateBmiAndContinue() {
        // Add BMI calculation logic here if needed
        nextStep('physicalInfo', 'goalsPreferences');
    }
    
    function calculateRestTimeAndContinue() {
        // Add rest time calculation logic here if needed
        nextStep('goalsPreferences', 'dietaryPreferences');
    }

    function submitForm() {
        // Your logic for submitting the form
        alert("Form submitted successfully!");
    }
</script>

</body>
</html>

