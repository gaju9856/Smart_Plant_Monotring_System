<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Plant Monitoring | Data Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c786c;
            --secondary: #f8b400;
            --accent: #004445;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui;
        }

        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2.5rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        }

        h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            padding-left: 50px;
        }

        h1 i {
            position: absolute;
            left: 0;
            top: -5px;
            font-size: 1.8rem;
            background: var(--secondary);
            color: white;
            padding: 10px;
            border-radius: 12px;
        }

        .form-label {
            font-weight: 600;
            color: var(--accent);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(44, 120, 108, 0.1);
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='%232c786c' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            border-radius: 10px;
            border: 2px solid #e0e0e0;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 120, 108, 0.2);
        }

        .btn-primary::after {
            content: '🌱';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            transform: translateX(-5px);
            color: var(--secondary);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .plant-icon {
            animation: float 3s ease-in-out infinite;
            max-width: 120px;
            margin: 2rem auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>
            <i class="fas fa-seedling"></i>
            Plant Health Analysis
        </h1>

        <form method="post" action="calculate_score.php">
            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-tint text-primary"></i>
                    Soil Moisture (%)
                </label>
                <input type="number" name="moisture" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-thermometer-half text-danger"></i>
                    Temperature (°C)
                </label>
                <input type="number" name="temperature" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-cloud-rain text-info"></i>
                    Humidity (%)
                </label>
                <input type="number" name="humidity" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-flask text-warning"></i>
                    NPK Level
                </label>
                <input type="text" name="npk" class="form-control" placeholder="e.g., 10-10-10">
            </div>

            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-leaf text-success"></i>
                    Select Crop
                </label>
                <select name="crop" class="form-select" required>
                    <option value="saffron">🌺 Saffron (Kesar)</option>
                    <option value="mushroom">🍄 Oyster Mushroom</option>
                    <option value="lettuce">🥬 Hydroponic Lettuce</option>
                    <option value="basil">🌿 Basil (Tulsi)</option>
                    <option value="tomato">🍅 Tomato</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Calculate Health Score
            </button>
        </form>

        <a href="index.php" class="back-link">
            <i class="fas fa-arrow-left me-2"></i>
            Return to Dashboard
        </a>

        <img src="https://img.icons8.com/color/96/000000/plant-under-sun.png" 
             alt="Plant Icon" 
             class="plant-icon">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
