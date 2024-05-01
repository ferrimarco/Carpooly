<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM autisti WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Ottieni il nome dell'autista
        $getNameQuery = "SELECT name FROM autisti WHERE email='$email'";
        $resultName = $conn->query($getNameQuery);

        if ($resultName->num_rows == 1) {
            $row = $resultName->fetch_assoc();
            $userName = $row['name'];
        
            // Imposta l'email nella sessione
            $_SESSION['email'] = $email;
        
            // Redirect alla dashboard dell'autista con il nome utente corretto
            header("Location: dashboard-autisti.php?name=$userName");
            exit;
        } else {
            echo "<script>alert('Errore nel recupero del nome autista');</script>";
            exit;
        }
        
    } else {
        echo "<script>alert('Credenziali errate. Riprova.');</script>";
        exit;
    }
}
?>
