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
    <title>Accueil - Enchères NationsGlory Sigma</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Enchères NationsGlory Sigma</h1>
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <section class="welcome">
            <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Voici votre tableau de bord.</p>
        </section>

        <section class="auction-list">
            <h2>Annonces en cours</h2>
            <?php
                $annonces = [
                    ["item" => "Épée en diamant", "prix" => 150, "acheteur" => "Steve", "image" => "images/diamond_sword.png"],
                    ["item" => "Armure en diamant", "prix" => 300, "acheteur" => "Alex", "image" => "images/diamond_armor.png"],
                    ["item" => "Pioche en diamant", "prix" => 120, "acheteur" => "Notch", "image" => "images/diamond_pickaxe.png"],
                    ["item" => "Arc enchanté", "prix" => 200, "acheteur" => "Herobrine", "image" => "images/enchant_bow.png"],
                ];

                foreach ($annonces as $annonce) {
                    echo "<div class='auction-item'>";
                    echo "<img src='{$annonce['image']}' alt='{$annonce['item']}'>";
                    echo "<div class='auction-details'>";
                    echo "<h3>{$annonce['item']}</h3>";
                    echo "<p>Offre actuelle: €{$annonce['prix']}</p>";
                    echo "<p>Nom de l'acheteur: {$annonce['acheteur']}</p>";
                    echo "<button>Faire une offre</button>";
                    echo "</div></div>";
                }
            ?>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Enchères NationsGlory Sigma. Tous droits réservés.</p>
    </footer>
</body>
</html>