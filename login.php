<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Imposta l'email nella sessione
        $_SESSION['email'] = $email;
        
        // Ottieni l'ID e il nome dell'utente
        $getUserQuery = "SELECT id, name FROM users WHERE email='$email'";
        $resultUser = $conn->query($getUserQuery);

        if ($resultUser->num_rows == 1) {
            $row = $resultUser->fetch_assoc();
            $id_utente = $row['id'];
            $userName = $row['name'];
        
            $_SESSION['id_utente'] = $id_utente;
            header("Location: dashboard-passenger.php?name=$userName&id=$id_utente");
            exit;
        } else {
            echo "<script>alert('Errore nel recupero del nome utente');</script>";
            exit;
        }
        
    } else {
        echo "<script>alert('Credenziali errate. Riprova.');</script>";
        exit;
    }
}
?>
