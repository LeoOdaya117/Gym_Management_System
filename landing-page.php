<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymPro App</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .navbar {
            background-color: #000 !important;
        }

        .btn {
            background-color: #ff6600;
            color: white;
        }

        .btn:hover {
            background-color: #cc5500;
        }

        .pricing-card {
            background-color: #111;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(255, 102, 0, 0.5);
        }

        .pricing-card.featured {
            border: 2px solid #ff6600;
            transform: scale(1.05);
        }

        .pricing-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(255, 102, 0, 0.7);
        }

        .pricing-card h3 {
            color: #ff6600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">FitnessApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#showcase">Showcase</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#features">Features</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#download">Download</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                    <li class="nav-item"><a class="btn" href="index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero text-center py-5" id="download">
        <div class="container">
            <h2>Revolutionize Your Fitness Journey</h2>
            <p>Track progress, manage workouts, and achieve your fitness goals with Fitness App.</p>
            <a href="#download" class="btn">Download App</a>
        </div>
    </header>

    <section id="showcase" class="section py-5 text-center">
        <div class="container">
            <h2>App Showcase</h2>
            <p>Explore the powerful features of our Fitness App.</p>
            <div class="row">
                <div class="col-md-4"><img src="https://scontent.fmnl37-1.fna.fbcdn.net/v/t1.15752-9/480942776_1212604624206365_8369771835216362598_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=9f807c&_nc_ohc=FEtmxvaN8pAQ7kNvgFTCUSz&_nc_oc=Adhse1o_x4D5mXP59Yl8chJtAFV7CFCZc_E_H70XTlYuMmY5CYeb-h5AVbmi_gm2dmY&_nc_zt=23&_nc_ht=scontent.fmnl37-1.fna&oh=03_Q7cD1gEMFqKybI-8-EBEbgw6h3Iz70Z0iGSREA0ilzOuZNshoA&oe=67EA8431" class="img-fluid" alt="App Screenshot"></div>
                <div class="col-md-4"><img src="https://scontent.fmnl3-4.fna.fbcdn.net/v/t1.15752-9/482518816_1339196144063439_1906311706803692861_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=9f807c&_nc_ohc=TsBYnGrl2I8Q7kNvgFCfhYZ&_nc_oc=Adi3oNN5_EybQkyfu5M5mpHFHowELbBUdjYqRXcZ7cmk9FgKFwcjyQ4QR8umWY4wm1k&_nc_zt=23&_nc_ht=scontent.fmnl3-4.fna&oh=03_Q7cD1gG1IQP7HVjFwbXHAmK4a281gBHaTuCH_C9v7ito8rAgLw&oe=67EA567F" class="img-fluid" alt="App UI"></div>
                <div class="col-md-4"><img src="https://scontent.fmnl37-1.fna.fbcdn.net/v/t1.15752-9/480947063_978409340586110_433571288590185435_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=9f807c&_nc_ohc=e4xe5Fi7Qw8Q7kNvgFwrpID&_nc_oc=AdjJeOqmQ5wvSMmVlc4_Q_NrK0bMFg_grDI2dRt7aCpaCEoJStNdx1ayWDYrJB3FeqE&_nc_zt=23&_nc_ht=scontent.fmnl37-1.fna&oh=03_Q7cD1gHHOS7iIAGBdAvdneVLgXQ7zSdtJaIzlRW6F0oHnGgZSw&oe=67EA520E" class="img-fluid" alt="Workout Tracking"></div>
            </div>
        </div>
    </section>

    <section id="pricing" class="section py-5 text-center">
        <div class="container">
            <h2>Pricing Plans</h2>
            <div class="row justify-content-center gap-5">
                <div class="col-md-3 pricing-card">
                    <h3>Free Plan</h3>
                    <p><strong>$0/month</strong></p>
                    <ul>
                        <li>Basic Workouts</li>
                        <li>Limited Access to Features</li>
                        <li>Community Support</li>
                    </ul>
                    <a href="#download" class="btn">Get Started</a>
                </div>
                <div class="col-md-3 pricing-card featured">
                    <h3>1 Month Plan</h3>
                    <p><strong>₱ 300.00/month</strong></p>
                    <ul>
                        <li>Unlimited access to Gym facilities</li>
                        <li>Advanced Progress Tracking</li>
                        <li>Workout/Diet Planner</li>
                    </ul>
                    <a href="#download" class="btn">Upgrade Now</a>
                </div>
                <div class="col-md-3 pricing-card">
                    <h3>1 Year Plan</h3>
                    <p><strong>₱ 2100.00/year</strong></p>
                    <ul>
                        <li>Unlimited access to Gym facilities</li>
                        <li>Advanced Progress Tracking</li>
                        <li>Workout/Diet Planner</li>
                    </ul>
                    <a href="#download" class="btn">Go Premium</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section py-5 text-center">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out to us.</p>
            <a href="mailto:support@gympro.com" class="btn">Email Us</a>
        </div>
    </section>

    <footer class="text-center py-3">
        <div class="container">
            <p>&copy; 2025 Brown House Fitness. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
