<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Smart Plant Monitoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c786c;
            --secondary: #f8b400;
            --light: #f7f7f7;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.8;
        }
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, #004445 100%);
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
        }
        .feature-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 2rem;
            overflow: hidden;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .fact-bubble {
            background-color: var(--light);
            border-radius: 50%;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .divider {
            border-top: 3px dotted var(--secondary);
            width: 100px;
            margin: 3rem auto;
        }
        .nav-pills .nav-link.active {
            background-color: var(--primary);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">🌿 Smart Plant Monitoring System</h1>
            <p class="lead">Revolutionizing agriculture through IoT and precision farming</p>
        </div>
    </section>

    <div class="container">
        <!-- Project Overview -->
        <section class="py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4" style="color: var(--primary);">Our Vision</h2>
                    <p class="fs-5">We're bridging the gap between traditional farming and modern technology to create sustainable, efficient agricultural practices for the 21st century.</p>
                    <p>Our system empowers farmers with real-time insights about their crops, helping them make data-driven decisions that increase yield while conserving resources.</p>
                </div>
                <div class="col-lg-6">
                    <img src="images/farming-tech.jpg" alt="Smart Farming" class="img-fluid rounded shadow">
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <!-- Key Features -->
        <section class="py-5">
            <h2 class="text-center fw-bold mb-5" style="color: var(--primary);">How It Works</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card card h-100">
                        <div class="card-body text-center p-4">
                            <div class="fact-bubble">
                                <i class="fas fa-microchip fa-3x" style="color: var(--primary);"></i>
                            </div>
                            <h4>Smart Sensors</h4>
                            <p>ESP32 microcontroller collects real-time data on soil moisture, temperature, humidity, and nutrient levels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100">
                        <div class="card-body text-center p-4">
                            <div class="fact-bubble">
                                <i class="fas fa-brain fa-3x" style="color: var(--primary);"></i>
                            </div>
                            <h4>Intelligent Analysis</h4>
                            <p>Our algorithm compares readings against crop-specific ideal parameters to generate health scores.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100">
                        <div class="card-body text-center p-4">
                            <div class="fact-bubble">
                                <i class="fas fa-robot fa-3x" style="color: var(--primary);"></i>
                            </div>
                            <h4>Actionable Advice</h4>
                            <p>Farmers receive precise recommendations to optimize growing conditions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <!-- Protected Farming Section -->
        <section class="py-5">
            <h2 class="text-center fw-bold mb-5" style="color: var(--primary);">The Future: Protected Environment Farming</h2>
            
            <div class="row mb-5">
                <div class="col-lg-6 order-lg-2">
                    <h3 class="fw-bold mb-4">What is Protected Farming?</h3>
                    <p>Protected farming involves growing crops in controlled environments like:</p>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">🌱 Greenhouses and polyhouses</li>
                        <li class="list-group-item">💧 Hydroponic systems</li>
                        <li class="list-group-item">🏙️ Vertical farms</li>
                        <li class="list-group-item">🍄 Climate-controlled mushroom units</li>
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="images/protected-farming.jpg" alt="Protected Farming" class="img-fluid rounded shadow">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Key Benefits</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>90% more water efficient than traditional farming</li>
                                <li>Year-round production regardless of weather</li>
                                <li>Reduces pesticide use by 75%</li>
                                <li>Enables organic farming at scale</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Did You Know?</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Mumbai's first vertical farm produces 5x more yield per sqft</li>
                                <li>Saffron grown in controlled environments has 20% higher medicinal value</li>
                                <li>Hydroponic lettuce uses 10x less land than soil farming</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team/Footer -->
        <section class="py-5 text-center">
            <h4 class="mb-4"></h4>
            <a href="index.php" class="btn btn-primary px-4">
                <i class="fas fa-arrow-left me-2"></i>Back to Home
            </a>
        </section>
    </div>

    <!-- Font Awesome & Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>