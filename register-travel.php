<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera l'ID dell'autista dalla sessione
    $id_autista = $_SESSION['id_autista'];

    $image = $_POST["city"];
    $partenza = $_POST["departure_city"];
    $destinazione = $_POST["destination_city"];
    $data = $_POST["travel_date"];
    $costo = $_POST["costo"];
    $modello = $_POST["car_model"];
    $targa = $_POST["license_plate"];
    $colore = $_POST["car_color"];
    $anno = $_POST["car_year"];
    $nPostiTotali = $_POST["total_seats"];
    $nPostiDisponibili = $_POST["available_seats"];

    $sql = "INSERT INTO viaggi (id_autista, Image, partenza, destinazione, data_viaggio, costo_viaggio, modello, targa, colore, anno, nPostitotale, nPostiDisponibili)
            VALUES ('$id_autista', '$image', '$partenza', '$destinazione', '$data', '$costo', '$modello', '$targa', '$colore', '$anno', '$nPostiTotali', '$nPostiDisponibili')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Il viaggio è stato pubblicato con successo!')</script>";
        header("Location: dashboard-passenger.php");
        exit;
    } else {
        echo "Errore durante l'inserimento del viaggio: " . $conn->error;
    }
}
?>
