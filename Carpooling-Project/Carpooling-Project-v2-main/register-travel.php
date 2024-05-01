<?php
// Includi il file per la connessione al database
include_once 'db.php';

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dai campi del form
    $departure_city = $_POST["departure_city"];
    $destination_city = $_POST["destination_city"];
    $travel_date = $_POST["travel_date"];
    $passengers = $_POST["passengers"];
    $car_model = $_POST["car_model"];
    $license_plate = $_POST["license_plate"];
    $car_color = $_POST["car_color"];
    $car_year = $_POST["car_year"];
    $total_seats = $_POST["total_seats"];
    $available_seats = $_POST["available_seats"];

    // Prepara e esegui la query SQL per l'inserimento dei dati del viaggio nella tabella "viaggi"
    $sql = "INSERT INTO viaggi (partenza, destinazione, data_viaggio, ora_partenza, numero_posti)
            VALUES ('$departure_city', '$destination_city', '$travel_date', $passengers,$total_seats, $available_seats)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Il viaggio è stato pubblicato con successo!')</script>";
        header("Location: dashboard-passenger.php");
    } else {
        echo "Errore durante la pubblicazione del viaggio: " . $conn->error;
    }
}
?>
