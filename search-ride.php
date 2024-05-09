<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $passenger = $_POST['passenger'];

    echo''. $departure .''. $destination .''. $date .   ''. $passenger .'';
}
?>
