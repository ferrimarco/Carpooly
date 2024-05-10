<?php
session_start();
include './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se l'utente ha effettuato l'accesso
    if(isset($_SESSION['id_utente'])) {
        // Recupera l'ID dell'utente dalla sessione
        $id_utente = $_SESSION['id_utente'];

        // Query per ottenere l'ID del viaggio in base all'utente
        $query_viaggio = "SELECT id_viaggio FROM prenotazioni WHERE id_utente = '$id_utente'";
        $result_viaggio = $conn->query($query_viaggio);

        if ($result_viaggio->num_rows > 0) {
            $row_viaggio = $result_viaggio->fetch_assoc();
            $id_viaggio = $row_viaggio['id_viaggio'];

            // Inserisci l'ID del viaggio e l'ID dell'utente nella tabella delle prenotazioni
            $sql = "INSERT INTO prenotazioni (id_viaggio, id_utente) VALUES ('$id_viaggio','$id_utente')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('La tua prenotazione è stata pubblicata con successo!')</script>";
                exit;
            } else {
                echo "Errore durante la prenotazione: " . $conn->error;
            }
        } else {
            echo "Nessun viaggio trovato per questo utente.";
        }
    } else {
        echo "Devi effettuare l'accesso prima di prenotare un viaggio.";
    }
}
?>
