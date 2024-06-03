<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
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
            <p>Compte bancaire: €500</p>
            <!-- Ajouter plus d'informations sur l'utilisateur ici -->
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Enchères NationsGlory Sigma. Tous droits réservés.</p>
    </footer>
</body>
</html>
