<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require 'auth.php';
$user = getUser($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Enchères NationsGlory Sigma</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Enchères NationsGlory Sigma</h1>
            <img src="images/nationsglory_sigma_logo.png" alt="NationsGlory Sigma" class="logo-top-right">
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <section class="profile">
            <h2>Profil de <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            <p>Nom d'utilisateur: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Compte bancaire: €<?php echo htmlspecialchars($user['bank_account']); ?></p>
            
            <div class="bank-card">
                <div class="bank-card-content">
                    <p>Numéro de carte: <?php echo htmlspecialchars($user['bank_card_number']); ?></p>
                    <p>Date d'expiration: <?php echo htmlspecialchars($user['bank_card_expiry']); ?></p>
                    <p>CVC: <?php echo htmlspecialchars($user['bank_card_cvc']); ?></p>
                </div>
            </div>
            
            <img src="images/nationsglory_logo.png" alt="NationsGlory" class="logo-bottom-left">
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Enchères NationsGlory Sigma. Tous droits réservés.</p>
    </footer>
</body>
</html>