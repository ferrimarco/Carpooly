<?php
    include_once './login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Passeggero</title>
    <link rel="stylesheet" href="./static/css/dashboard-passenger.css">
    <script src="https://kit.fontawesome.com/af6ecfa2ff.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="./static/img/img/images.png" alt="Carpooly Logo" width="145" height="87">
                </div>
                <div class="nav-links">
                    <a href="search-ride.html"><i class="fas fa-magnifying-glass"></i> Cerca</a>
                    <a href="offer-ride.html"><i class="fas fa-hand-holding-heart"></i> Offri un passaggio</a>
                    <div class="folder-user">
                        <div class="user-icon">
                            <a href="#" onclick="toggleMenu(event)">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>
                        <i class="fas fa-chevron-down" id="icon"></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="menu" id="menu">
    <?php if (isset($_GET['name'])): ?>
                    <h1 class="user-name">Ciao <?php echo $_GET['name']; ?></h1>
                <?php endif; ?>

        <div class="menu-item">
            <i class="fas fa-car"></i> <span>I tuoi viaggi</span>
        </div>
        <div class="menu-item">
            <i class="fas fa-user"></i> <span>Il tuo profilo</span>
        </div>
        <div class="menu-item">
            <i class="fas fa-sign-out-alt"></i> <span>Esci</span>
        </div>
    </div>

    <section>
        <div class="content-image">
            <img class="img" src="https://cdn.blablacar.com/kairos/assets/images/carpool_blablabus_large-e3d8eff32c13cdafc080.svg" alt="" height="100%" width="100%" loading="eager" decoding="sync" fetchpriority="high">
            <h1 class="content-title">La tua selezione di viaggi dal prezzo accessibile</h1>
        </div>
        <div class="search-ride-input">
            <form class="searching-form" action="search-ride.php" method="post">
            <div class="departure">
                <label for="departure">
                    <i class="fa-solid fa-plane-departure"></i>
                </label>
                <input type="text" placeholder="Inserire città di partenza..." class="departure-input" id="departure" name="departure">
            </div>
            <div class="destination" style="position: relative;">
                <label for="destination">
                    <i class="fa-solid fa-plane-arrival"></i>
                </label>
                <input type="text" placeholder="Inserire città di destinazione..." class="destination-input" id="destination" name="destination">
            </div>
                <div class="date">
                    <div class="content-btn-date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span style="width: 100px;" class="date-txt" id="date" name="date">
                            Oggi
                        </span>
                    </div>
                </div>
                <div id="passenger-passenger" class="passenger">
                    <div class="content-btn-passenger">
                        <i class="fa-regular fa-user"></i>
                        <span style="width: 100px;" class="passenger-txt" id="passenger" name="passenger">
                            Passeggeri
                        </span>
                    </div>
                </div>
                <div class="search">
                    <button type="submit" class="search-btn" id="search-btn">
                        Trova
                    </button>
                </div>
            </form>
        </div>

        <div class="citta-corrispondenti departure-corrispondenti"></div>
        <div class="citta-corrispondenti destination-corrispondenti"></div>
        
    </section>

    <script src="./static/js/dashboard-passenger.js"></script>
</body>
</html>
