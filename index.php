<?php
declare(strict_types=1);

// Simple PHP 8.4 Info Dashboard
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8.4 Dashboard</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .header {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    h1 {
        color: #333;
        margin-bottom: 10px;
    }

    .version {
        color: #667eea;
        font-size: 24px;
        font-weight: bold;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .card h2 {
        color: #333;
        margin-bottom: 15px;
        font-size: 20px;
        border-bottom: 3px solid #667eea;
        padding-bottom: 10px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .label {
        color: #666;
        font-weight: 500;
    }

    .value {
        color: #333;
        font-weight: bold;
        text-align: right;
    }

    .success {
        color: #10b981;
    }

    .warning {
        color: #f59e0b;
    }

    .extensions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .badge {
        background: #667eea;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .feature-list {
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        padding: 8px 0;
        padding-left: 25px;
        position: relative;
    }

    .feature-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #10b981;
        font-weight: bold;
    }

    .footer {
        text-align: center;
        color: white;
        margin-top: 30px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🚀 PHP Info Dashboard</h1>
            <div class="version">PHP <?= PHP_VERSION ?></div>
            <p style="color: #666; margin-top: 10px;">Aplikasi sederhana untuk testing Azure Web App</p>
        </div>

        <div class="grid">
            <!-- Server Info -->
            <div class="card">
                <h2>📊 Server Info</h2>
                <div class="info-item">
                    <span class="label">PHP Version</span>
                    <span class="value success"><?= PHP_VERSION ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Server Software</span>
                    <span class="value"><?= $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Server Name</span>
                    <span class="value"><?= $_SERVER['SERVER_NAME'] ?? 'localhost' ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Document Root</span>
                    <span class="value"><?= $_SERVER['DOCUMENT_ROOT'] ?? '-' ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Protocol</span>
                    <span class="value"><?= $_SERVER['SERVER_PROTOCOL'] ?? '-' ?></span>
                </div>
            </div>

            <!-- PHP Configuration -->
            <div class="card">
                <h2>⚙️ PHP Configuration</h2>
                <div class="info-item">
                    <span class="label">Memory Limit</span>
                    <span class="value"><?= ini_get('memory_limit') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Max Execution Time</span>
                    <span class="value"><?= ini_get('max_execution_time') ?>s</span>
                </div>
                <div class="info-item">
                    <span class="label">Upload Max Size</span>
                    <span class="value"><?= ini_get('upload_max_filesize') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Post Max Size</span>
                    <span class="value"><?= ini_get('post_max_size') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Timezone</span>
                    <span class="value"><?= date_default_timezone_get() ?></span>
                </div>
            </div>

            <!-- System Info -->
            <div class="card">
                <h2>💻 System Info</h2>
                <div class="info-item">
                    <span class="label">Operating System</span>
                    <span class="value"><?= PHP_OS ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Architecture</span>
                    <span class="value"><?= php_uname('m') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Current Time</span>
                    <span class="value"><?= date('Y-m-d H:i:s') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Your IP</span>
                    <span class="value"><?= $_SERVER['REMOTE_ADDR'] ?? '-' ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Request Method</span>
                    <span class="value"><?= $_SERVER['REQUEST_METHOD'] ?? '-' ?></span>
                </div>
            </div>

            <!-- PHP 8.4 Features -->
            <div class="card">
                <h2>✨ PHP 8.4 Features</h2>
                <ul class="feature-list">
                    <li>Property Hooks</li>
                    <li>Asymmetric Visibility</li>
                    <li>New Array Functions</li>
                    <li>HTML5 Support</li>
                    <li>JIT Improvements</li>
                    <li>Performance Boost</li>
                </ul>
            </div>
        </div>

        <!-- Extensions -->
        <div class="card">
            <h2>🔌 Loaded Extensions (<?= count(get_loaded_extensions()) ?>)</h2>
            <div class="extensions">
                <?php foreach(get_loaded_extensions() as $ext): ?>
                <span class="badge"><?= $ext ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Test Features -->
        <div class="card" style="margin-top: 20px;">
            <h2>🧪 Quick Tests</h2>
            <div class="info-item">
                <span class="label">String Test</span>
                <span class="value success"><?= strtoupper("php 8.4 works!") ?></span>
            </div>
            <div class="info-item">
                <span class="label">Array Count</span>
                <span class="value success"><?= count([1,2,3,4,5]) ?> items</span>
            </div>
            <div class="info-item">
                <span class="label">Math Test</span>
                <span class="value success">10 + 5 = <?= 10 + 5 ?></span>
            </div>
            <div class="info-item">
                <span class="label">JSON Encode</span>
                <span class="value success"><?= json_encode(['status' => 'OK', 'php' => PHP_VERSION]) ?></span>
            </div>
        </div>

        <div class="footer">
            <p>✅ PHP 8.4 is running successfully on Azure Web App!</p>
            <p style="margin-top: 10px; font-size: 14px; opacity: 0.8;">
                Dibuat untuk testing deployment di Azure By Ricky Adam Saputra Updating VS Code
            </p>
        </div>
    </div>
</body>

</html>