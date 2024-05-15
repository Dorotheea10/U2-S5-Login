<?php
require_once 'Utente.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Registrazione utente
        $username = $_POST["username"];
        $password = $_POST["password"];

        $utente = new Utente($username, $password);
        $utente->register();
    } elseif (isset($_POST["login"])) {
        // Login utente
        $username = $_POST["username"];
        $password = $_POST["password"];

        $utente = new Utente($username, $password);
        $utente->login();
    } elseif (isset($_POST["logout"])) {
        // Logout utente
        $username = $_POST["username"];
        $password = $_POST["password"];

        $utente = new Utente($username, $password);
        $utente->logout();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Registrazione Utente</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Personalizzazione CSS */
        .container {
            margin-top: 50px;
            width: 400px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!isset($_GET["register"]) && !isset($_POST["register"])): ?>
            <h2 class="text-center">Effettua il Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Accedi</button>
            </form>
            <br>
            <p class="text-center">Non hai un account? <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?register=true">Registrati qui</a>.</p>
        <?php else: ?>
            <h2 class="text-center">Registrazione Utente</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-block">Registrati</button>
            </form>
            <br>
            <p class="text-center">Hai già un account? <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">Accedi qui</a>.</p>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
