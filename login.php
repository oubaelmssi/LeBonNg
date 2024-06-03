<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des informations d'identification (à remplacer par une vérification réelle)
    if ($username == "admin" && $password == "password") {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Enchères NationsGlory Sigma</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Enchères NationsGlory Sigma</h1>
        </div>
    </header>
    
    <main>
        <section class="login">
            <h2>Connexion</h2>
            <form id="login-form" method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Se connecter</button>
                <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            </form>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Enchères NationsGlory Sigma. Tous droits réservés.</p>
    </footer>
</body>
</html>
