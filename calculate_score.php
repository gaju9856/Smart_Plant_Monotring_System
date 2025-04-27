<?php
// Get data from form
$moisture = $_POST['moisture'];
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];
$npk = strtoupper(trim($_POST['npk']));
$crop = $_POST['crop'];

// Crop display names mapping
$crop_names = [
    "saffron" => "Saffron (Kesar)",
    "mushroom" => "Oyster Mushroom",
    "lettuce" => "Hydroponic Lettuce",
    "basil" => "Basil (Tulsi)",
    "tomato" => "Tomato"
];

// Ideal parameters with exact ranges
$crop_params = [
    "saffron" => [
        "moisture" => [40, 60], 
        "temp" => [15, 25], 
        "humidity" => [50, 70], 
        "npk" => "10-10-10"
    ],
    "mushroom" => [
        "moisture" => [70, 90], 
        "temp" => [20, 30], 
        "humidity" => [80, 95], 
        "npk" => "N/A"
    ],
    "lettuce" => [
        "moisture" => [60, 80], 
        "temp" => [18, 22], 
        "humidity" => [40, 60], 
        "npk" => "8-15-36"
    ],
    "basil" => [
        "moisture" => [50, 70], 
        "temp" => [20, 25], 
        "humidity" => [40, 70], 
        "npk" => "14-14-14"
    ],
    "tomato" => [
        "moisture" => [60, 80], 
        "temp" => [20, 30], 
        "humidity" => [60, 70], 
        "npk" => "5-10-15"
    ]
];

$score = 0;
$advice = [];

// Moisture Check
if ($moisture >= $crop_params[$crop]["moisture"][0] && 
    $moisture <= $crop_params[$crop]["moisture"][1]) {
    $score += 3;
} else {
    if ($moisture < $crop_params[$crop]["moisture"][0]) {
        $advice[] = "Increase moisture to at least " . $crop_params[$crop]["moisture"][0] . "% for " . $crop_names[$crop];
    } else {
        $advice[] = "Reduce moisture below " . $crop_params[$crop]["moisture"][1] . "% for " . $crop_names[$crop];
    }
}

// Temperature Check
if ($temperature >= $crop_params[$crop]["temp"][0] && 
    $temperature <= $crop_params[$crop]["temp"][1]) {
    $score += 3;
} else {
    if ($temperature < $crop_params[$crop]["temp"][0]) {
        $advice[] = "Increase temperature to at least " . $crop_params[$crop]["temp"][0] . "°C for " . $crop_names[$crop];
    } else {
        $advice[] = "Reduce temperature below " . $crop_params[$crop]["temp"][1] . "°C for " . $crop_names[$crop];
    }
}

// Humidity Check
if ($humidity >= $crop_params[$crop]["humidity"][0] && 
    $humidity <= $crop_params[$crop]["humidity"][1]) {
    $score += 2;
} else {
    if ($humidity < $crop_params[$crop]["humidity"][0]) {
        $advice[] = "Increase humidity to at least " . $crop_params[$crop]["humidity"][0] . "% for " . $crop_names[$crop];
    } else {
        $advice[] = "Reduce humidity below " . $crop_params[$crop]["humidity"][1] . "% for " . $crop_names[$crop];
    }
}

// NPK Check
if ($crop_params[$crop]["npk"] === "N/A") {
    if ($npk === "N/A" || $npk === "") {
        $score += 2;
    } else {
        $advice[] = "NPK not required for " . $crop_names[$crop];
    }
} else {
    if ($npk === $crop_params[$crop]["npk"]) {
        $score += 2;
    } else {
        $advice[] = "Use NPK " . $crop_params[$crop]["npk"] . " for " . $crop_names[$crop];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Health Analysis | Smart Plant</title>
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
            padding: 2rem;
            font-family: 'Segoe UI', system-ui;
        }
        .analysis-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 2.5rem;
            position: relative;
        }
        .score-header {
            color: var(--primary);
            border-bottom: 3px solid var(--secondary);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }
        .param-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .param-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }
        .advice-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }
        .tts-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin: 1.5rem 0;
        }
        .tts-button:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="analysis-container">
        <h1 class="score-header">
            <i class="fas fa-leaf"></i>
            Crop Health Analysis
        </h1>

        <!-- Score Display -->
        <div class="alert alert-<?= $score >=8 ? 'success' : ($score >=5 ? 'warning' : 'danger') ?>">
            <h2 class="mb-0">🌱 Overall Score: <?= $score ?>/10</h2>
        </div>

        <!-- Parameters Card -->
        <div class="param-card">
            <h4>📊 Parameters for <?= $crop_names[$crop] ?></h4>
            <div class="param-item">
                <span>Moisture:</span>
                <span><?= $moisture ?>% (Ideal: <?= implode('-', $crop_params[$crop]["moisture"]) ?>%)</span>
            </div>
            <div class="param-item">
                <span>Temperature:</span>
                <span><?= $temperature ?>°C (Ideal: <?= implode('-', $crop_params[$crop]["temp"]) ?>°C)</span>
            </div>
            <div class="param-item">
                <span>Humidity:</span>
                <span><?= $humidity ?>% (Ideal: <?= implode('-', $crop_params[$crop]["humidity"]) ?>%)</span>
            </div>
            <div class="param-item">
                <span>NPK Level:</span>
                <span><?= $npk ?> (Ideal: <?= $crop_params[$crop]["npk"] ?>)</span>
            </div>
        </div>

        <?php if (!empty($advice)): ?>
        <!-- Action Required Section -->
        <div class="alert alert-warning">
            <h4>🚨 Action Required</h4>
            <ul class="advice-list">
                <?php foreach ($advice as $tip): ?>
                <li class="advice-item">• <?= $tip ?></li>
                <?php endforeach; ?>
            </ul>
            <button onclick="readAdviceAloud()" class="tts-button">
                <i class="fas fa-volume-up"></i>
                Read Advice Aloud
            </button>
        </div>
        <?php endif; ?>

        <!-- Score Analysis -->
        <div class="alert alert-<?= $score >=8 ? 'success' : ($score >=5 ? 'warning' : 'danger') ?>">
            <h4>💡 Analysis</h4>
            <p class="mb-0">
                <?php if ($score >= 8): ?>
                ✅ Perfect conditions! Maintain current parameters
                <?php elseif ($score >= 5): ?>
                ⚠️ Needs improvement - Follow recommendations
                <?php else: ?>
                ❌ Critical state! Immediate action required
                <?php endif; ?>
            </p>
        </div>

        <a href="index.php" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Dashboard
        </a>
    </div>

    <!-- TTS Functionality -->
    <script>
    function readAdviceAloud() {
        const advicePoints = document.querySelectorAll('.advice-item');
        let adviceText = "";
        advicePoints.forEach(point => {
            adviceText += point.innerText.replace('•', '') + ". ";
        });
        
        if ('speechSynthesis' in window) {
            const utterance = new SpeechSynthesisUtterance(adviceText);
            window.speechSynthesis.speak(utterance);
        } else {
            alert("Text-to-speech not supported in your browser!");
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>