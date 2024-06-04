<?php
function dbConnect() {
    $host = 'localhost';
    $dbname = 'nationsglory';
    $username = 'root';
    $password = '';

    try {
        return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

function generateCardNumber() {
    return str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);
}

function generateCardExpiry() {
    $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
    $year = rand(23, 30);
    return "$month/$year";
}

function generateCardCVC() {
    return str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
}

function register($username, $password, $email) {
    $db = dbConnect();

    $cardNumber = generateCardNumber();
    $cardExpiry = generateCardExpiry();
    $cardCVC = generateCardCVC();

    $stmt = $db->prepare("INSERT INTO users (username, password, email, bank_card_number, bank_card_expiry, bank_card_cvc) VALUES (?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$username, $password, $email, $cardNumber, $cardExpiry, $cardCVC]);
}

function login($username, $password) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}

function getUser($username) {
    $db = dbConnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>