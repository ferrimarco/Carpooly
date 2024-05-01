<?php

    include_once 'db.php';

    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $licenseNumber = $_POST['licenseNumber'];
    $licenseCreate = $_POST['licenseCreate'];
    $licenseExpiration = $_POST['licenseExpiration'];
    $password = $_POST['password'];
    

    // Prepara e esegui la query per inserire i dati nel database
    $sql = "INSERT INTO autisti (email, name, surname, birthdate, gender, N_Patente, E_Patente, S_Patente, password)
    VALUES ('$email', '$name', '$surname', '$birthdate', '$gender', '$licenseNumber', '$licenseCreate', '$licenseExpiration', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registrazione avvenuta con successo');</script>";
        echo "<script> window.location.href = 'sign-autist.html'; </script>";
        exit;
    } else {
        echo "Errore nella registrazione dell'utente: " . $conn->error;
    }

?>