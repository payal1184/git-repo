<?php
// ==============================
// RDS Database Configuration
// (Recommend: move these to environment variables or a config file outside webroot)
// e.g. put in Apache env or /etc/apache2/envvars or use getenv('RDS_HOST')
// ==============================
$host     = getenv('RDS_HOST') ?: "your-rds-endpoint.amazonaws.com";
$port     = getenv('RDS_PORT') ?: 3306;
$dbname   = getenv('RDS_DB')   ?: "datadb";
$username = getenv('RDS_USER') ?: "root";
$password = getenv('RDS_PASS') ?: "pass1234";

// ==============================
// Create Connection (mysqli)
// ==============================
$conn = new mysqli($host, $username, $password, $dbname, (int)$port);

// Check connection
if ($conn->connect_error) {
    // In production, log error and show friendly message
    error_log("DB connect error: " . $conn->connect_error);
    die("❌ Database connection failed. Please try again later.");
}

// Set proper charset
if (! $conn->set_charset("utf8mb4")) {
    error_log("Failed to set charset: " . $conn->error);
    // continue — charset not critical but recommended
}

// ==============================
// Get Form Data (from POST) and validate
// ==============================
$name  = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if ($name === '' || $email === '') {
    die("⚠️ Name and Email are required!");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("⚠️ Invalid email address!");
}

// Optional: limit lengths to avoid very large inserts
if (mb_strlen($name) > 200 || mb_strlen($email) > 320) {
    die("⚠️ Input too long.");
}

// ==============================
// Use prepared statement (safe from SQL Injection)
// ==============================
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
if ($stmt === false) {
    error_log("Prepare failed: " . $conn->error);
    die("❌ Server error. Please try again later.");
}

$bind = $stmt->bind_param("ss", $name, $email);
if ($bind === false) {
    error_log("Bind failed: " . $stmt->error);
    die("❌ Server error. Please try again later.");
}

if ($stmt->execute()) {
    // Use htmlspecialchars when echoing user-supplied data
    echo "✅ New record created successfully. <br>";
    echo "<a href='form.html'>Go Back</a>";
} else {
    error_log("Execute failed: " . $stmt->error);
    echo "❌ Error: Unable to save record. Please try again later.";
}

$stmt->close();
$conn->close();
?>

