<?php
session_start();
include './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_viaggio'])) {
    $id_viaggio = $_POST['id_viaggio'];
    
    if (!isset($_SESSION['id_utente'])) {
        exit("Devi effettuare l'accesso per poter prenotare un viaggio.");
    } else {
        $id_utente = $_SESSION['id_utente'];

        $check_sql = "SELECT * FROM viaggi WHERE id = '$id_viaggio'";
        $check_result = $conn->query($check_sql);

        if ($check_result && $check_result->num_rows > 0) {
            $sql = "INSERT INTO prenotazioni (id_viaggio, id_utente) VALUES ('$id_viaggio', '$id_utente')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('La tua prenotazione e` stata pubblicata con successo!')</script>";
                header("Location: dashboard-passenger.php");
                exit;
            } else {
                echo "Errore durante la prenotazione: " . $conn->error;
            }
            
        } else {
            exit("Errore: Il viaggio specificato non esiste.");
        }
    }
} else {
    exit("Errore: I valori di partenza e destinazione non sono stati inviati correttamente.");
}
?>
