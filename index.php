<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Plant Monitoring System</title>
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #388E3C;
            --light-color: #F1F8E9;
            --dark-color:rgb(78, 192, 84);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        .card a {
            text-decoration: none;
            color: inherit;
        }
        
        .card h2 {
            color: var(--dark-color);
            margin-top: 15px;
            font-size: 1.5rem;
        }
        
        .icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        
        footer {
            margin-top: 50px;
            padding: 20px;
            background-color: var(--dark-color);
            color: white;
        }
        
        @media (max-width: 600px) {
            .card {
                width: 80%;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>🌱 Smart Plant Monitoring System</h1>
            <p>Monitor and optimize your plants' health with real-time data</p>
        </div>
    </header>
    
    <div class="container">
        <div class="card-container">
            <div class="card">
                <a href="enter_data.php">
                    <div class="icon">📊</div>
                    <h2>Enter Sensor Data</h2>
                    <p>Record your plant's environmental measurements</p>
                </a>
            </div>
            
            <div class="card">
                <a href="view_data.php">
                    <div class="icon">📈</div>
                    <h2>View Data</h2>
                    <p>Analyze historical plant data trends</p>
                </a>
            </div> 
            
            <div class="card">
                <a href="crop_info.php">
                    <div class="icon">📚</div>
                    <h2>Crop Information</h2>
                    <p>Learn about optimal growing conditions</p>
                </a>
            </div>
            
            <!-- <div class="card">
                <a href="alerts.php">
                    <div class="icon">⚠️</div>
                    <h2>Alerts</h2>
                    <p>View critical plant health notifications</p>
                </a>
            </div> -->
            
            <div class="card">
                <a href="about.php">
                    <div class="icon">ℹ️</div>
                    <h2>About Project</h2>
                    <p>Learn about our monitoring system</p>
                </a>
            </div>
        </div>
    </div>
    
    
</body>
</html>