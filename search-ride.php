<?php
session_start();
include './db.php';

// Inizializza una variabile per l'ID del viaggio
$id_viaggio = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partenza = $_POST['departure'];
    $destinazione = $_POST['destination'];
    $data_viaggio = $_POST['date'];
    $passenger = $_POST['passenger'];
}

if (!isset($_SESSION['id_utente'])) {
    exit("Devi effettuare l'accesso per poter prenotare un viaggio.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search-ride</title>
    <link rel="stylesheet" href="./static//css/search-ride.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="./static/img/img/images.png" alt="BlaBlaCar Logo" width="145" height="87">
                </div>
                <div class="title">
                    <h1>Ricerca Viaggio</h1> <!-- Corretto il typo -->
                </div>
                <div>
                    <h1>&nbsp;</h1>
                </div>
            </div>
        </nav>
    </header>
    <main class="container travel-recommendation"> <!-- Corretto il typo -->
        <div class="content-travel">
            <div class="main-title">
                <h1>Ecco a te i risultati della tua ricerca</h1>
            </div>
            <div class="content-card">
                <div class="card-n1">
                <?php
                    $sql = "SELECT *, image FROM viaggi WHERE partenza = '$partenza' AND destinazione = '$destinazione' AND data_viaggio = '$data_viaggio' AND nPostiDisponibili >= $passenger";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='img-travel'>";
                            echo "<img src='" . $row['image'] . "' alt='Immagine viaggio'>";
                            echo "</div>";
                            echo "<div class='travel-travel'>";
                            echo "<div class='partenza'>";
                            echo "<i class='fa-solid fa-plane-departure'></i>";
                            echo "<h3>Partenza: " . $row['partenza'] . "</h3>";
                            echo "</div>";
                            echo "<div class='destinazione'>";
                            echo "<i class='fa-solid fa-plane-arrival'></i>";
                            echo "<h3>Destinazione: " . $row['destinazione'] . "</h3>";
                            echo "</div>";
                            echo "<div class='data'>";
                            echo "<i class='fa-solid fa-calendar-days'></i>";
                            echo "<h3>Data: " . $row['data_viaggio'] . "</h3>";
                            echo "</div>";
                            echo "<div class='costo'>";
                            echo "<i class='fa-solid fa-sack-dollar'></i>";
                            echo "<h3>Costo: €" . $row['costo_viaggio'] . "</h3>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='car-travel'>";
                            echo "<div class='car'>";
                            echo "<i class='fa-solid fa-car-side'></i>";
                            echo "<h3>Macchina: " . $row['modello'] . "</h3>";
                            echo "</div>";
                            echo "<div class='car-color'>";
                            echo "<i class='fa-solid fa-palette'></i>";
                            echo "<h3>Colore Macchina: " . $row['colore'] . "</h3>";
                            echo "</div>";
                            echo "<div class='PostiAuto'>";
                            echo "<i class='fa-solid fa-person'></i>";
                            echo "<h3>Posti Auto: " . $row['nPostitotale'] . "</h3>";
                            echo "</div>";
                            echo "<div class='PostiAutoDisponibili'>";
                            echo "<i class='fa-solid fa-person'></i>";
                            echo "<h3>Posti Auto Disponibli: " . $row['nPostiDisponibili'] . "</h3>";
                            echo "</div>";
                            // Memorizza l'ID del viaggio
                            $id_viaggio = $row['id'];
                        }
                    } else {
                        echo "Nessun viaggio trovato.";
                    }
                ?>
                    <!-- Includi il campo nascosto per l'ID del viaggio nel form -->
                    <form action="prenotazione.php" method="post">
                        <input type="hidden" name="id_viaggio" value="<?php echo $id_viaggio; ?>">
                        <button id="btn-p" type="submit">Prenota</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/af6ecfa2ff.js" crossorigin="anonymous"></script>
</body>
</html>
