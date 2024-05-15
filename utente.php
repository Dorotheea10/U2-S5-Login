<?php

require_once 'database.php';

class Utente {
    private $username;
    private $password;
    private $conn;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        global $conn;
        $this->conn = $conn;
    }

    public function register() {
        $stmt = $this->conn->prepare("INSERT INTO reglog (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        try {
            $stmt->execute();
            echo "<div class='alert alert-success' role='alert'>Registrazione completata con successo.</div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Errore durante la registrazione: " . $e->getMessage() . "</div>";
        }
    }

    public function login() {
        $stmt = $this->conn->prepare("SELECT * FROM reglog WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            echo "<div class='alert alert-success' role='alert'>Accesso effettuato con successo.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Credenziali non valide.</div>";
        }
    }

    public function logout() {
        // Metodo per il logout, se necessario
    }

    public function is_authenticated() {
        // Metodo per verificare l'autenticazione, se necessario
    }
}

?>
