<?php

if (empty($_POST["username"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 4 ){
    die("Password must be at least 4 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// if ($_POST["password"] !== $_POST["re_password"]) {
//     die("Passwords must match");
// }
if (empty($_POST["mobile"])) {
    die("Number is required");
}

$currentDate = date("Y-m-d H:i:s");


$mysqli = require __DIR__ . "/db.php";

$sql = "INSERT INTO user_info (username, mail, password, mobile, DateOfJoin)
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssis",
                  $_POST["username"],
                  $_POST["email"],
                  $_POST["password"],
                  $_POST["mobile"],
                  $currentDate);
                  
if ($stmt->execute()) {

    header("Location: login.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}