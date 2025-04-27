<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Information | Smart Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c786c;
            --secondary: #f8b400;
            --accent: #004445;
            --light: #f8f9fa;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Segoe UI', system-ui;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: var(--primary);
            margin-bottom: 3rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 1rem;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .crop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .crop-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: none;
        }

        .crop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .crop-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
            border: 3px solid var(--light);
            transition: transform 0.3s ease;
        }

        .crop-img:hover {
            transform: scale(1.03);
        }

        .crop-header {
            color: var(--primary);
            margin-bottom: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .crop-header i {
            color: var(--secondary);
            font-size: 1.2em;
        }

        .param-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .param-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .param-list strong {
            color: var(--accent);
            margin-right: 1rem;
        }

        .info-card {
            background: var(--light);
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem 0;
            border-left: 4px solid var(--secondary);
        }

        .info-card h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .prevention-list {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .prevention-list li {
            padding: 0.5rem 0;
            display: flex;
            align-items: start;
            gap: 0.8rem;
        }

        .prevention-list li::before {
            content: '✅';
            margin-top: 3px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            margin-top: 2rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background: rgba(44, 120, 108, 0.1);
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <i class="fas fa-seedling"></i>
            Crop Database
        </h1>

        <div class="crop-grid">
            <?php
            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "smartplant");
            if (!$conn) die("Connection failed: " . mysqli_connect_error());

            // Fetch crops
            $sql = "SELECT * FROM crops";
            $result = mysqli_query($conn, $sql);

            // Display each crop
            while ($row = mysqli_fetch_assoc($result)) {
                echo <<<HTML
                <div class="crop-card">
                    <div class="crop-header">
                        <i class="fas fa-leaf"></i>
                        <h2>{$row['name']}</h2>
                    </div>
                    <img src="images/{$row['image']}" class="crop-img" alt="{$row['name']}">
                    
                    <ul class="param-list">
                        <li><strong>Moisture:</strong> {$row['moisture']}</li>
                        <li><strong>Temperature:</strong> {$row['temp']}</li>
                        <li><strong>Humidity:</strong> {$row['humidity']}</li>
                        <li><strong>NPK Ratio:</strong> {$row['npk']}</li>
                    </ul>

                    <div class="info-card">
                        <h4><i class="fas fa-bug"></i> Common Diseases</h4>
                        <p>{$row['diseases']}</p>
                    </div>

                    <div class="info-card">
                        <h4><i class="fas fa-shield-alt"></i> Prevention Techniques</h4>
                        <ul class="prevention-list">
                HTML;

                // Split prevention techniques
                $preventions = explode(',', $row['prevention']);
                foreach ($preventions as $technique) {
                    echo '<li>' . htmlspecialchars(trim($technique)) . '</li>';
                }

                echo <<<HTML
                        </ul>
                    </div>
                </div>
                HTML;
            }
            mysqli_close($conn);
            ?>
        </div>

        <a href="index.php" class="back-link">
            <i class="fas fa-arrow-left me-2"></i>
            Return to Dashboard
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>