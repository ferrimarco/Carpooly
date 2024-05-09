<?php
    include_once './login.php';
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Passeggero</title>
    <link rel="stylesheet" href="./static/css/dashboard-passenger.css">
    <script src="https://kit.fontawesome.com/af6ecfa2ff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"/>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="./static/img/img/images.png" alt="BlaBlaCar Logo" width="145" height="87">
                </div>
                <div class="nav-links">
                    <a href="search-ride.html"><i class="fas fa-magnifying-glass"></i> Cerca</a>
                    <a href="offer-ride.html"><i class="fas fa-hand-holding-heart"></i> Offri un passaggio</a>
                    <div class="folder-user">
                    <?php if (isset($_GET['name'])): ?>
                        <i style="margin-right: 10px;" class="fas fa-user"></i>
                        <h1 class="user-name">Ciao <?php echo $_GET['name']; ?></h1>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

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
                <div id="date-date" class="date">
                    <div class="content-btn-date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <input style="width: 100px;" class="date-txt" id="date" name="date" placeholder="Oggi">
                    </div>
                </div>
                <div id="passenger-passenger" class="passenger">
                    <div class="content-btn-passenger">
                        <i class="fa-regular fa-user"></i>
                        <input style="width: 100px;" class="passenger-txt" id="passenger" name="passenger" placeholder="Passegero">
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
        <div id="calendario">
            <div class="format-date">
                <div class="content-date">
                    <div id="Maggio">
                        <div class="row-title">
                        <div class="icon-date">
                                &nbsp;
                            </div>
                            <div class="title-date">
                                <span> Maggio </span>
                            </div>
                            <div class="icon-date">
                                <button id="MayToJuneBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp;</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp;</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button disabled name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>31</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="Giugno">
                        <div class="row-title">
                            <div class="icon-date">
                                <button id="JuneBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="title-date">
                                <span> Giugno </span>
                            </div>
                            <div class="icon-date">
                                <button id="JuneToJulyBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="Luglio">
                        <div class="row-title">
                            <div class="icon-date">
                                <button id="JulyBtn" type="submit" class="btn-i">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            </div>
                            <div class="title-date">
                                <span> Luglio </span>
                            </div>
                            <div class="icon-date">
                                <button type="submit" class="btn-i">
                                    
                                </button>
                            </div>
                        </div>
                        <table class="table-date" role="grid">
                            <thead>
                                <tr class="days-name">
                                    <th class="number" scope="col">
                                        Lun
                                    </th>
                                    <th class="number" scope="col">
                                        Mar
                                    </th>
                                    <th class="number" scope="col">
                                        Mer
                                    </th>
                                    <th class="number" scope="col">
                                        Gio
                                    </th>
                                    <th class="number" scope="col">
                                        Ven
                                    </th>
                                    <th class="number" scope="col">
                                        Sab
                                    </th>
                                    <th class="number" scope="col">
                                        Dom
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>&nbsp;</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>1</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>2</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>3</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>4</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>5</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>6</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>7</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>8</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>9</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>10</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>11</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>12</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>13</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>14</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>15</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>16</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>17</span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>18</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>19</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>20</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>21</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>22</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>23</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>24</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>25</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>26</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>27</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>28</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>29</span>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>30</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                                <tr class="tr-display">
                                    <td class="td-styles">
                                        <div class="content-number">
                                            <button name="day" class="btn-n" role="gridcell" type="button">
                                                <span>31</span>
                                            </button>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="format-passenger">
            <div class="content-number-passenger">
                <div class="content-txt-passenger">
                    Passeggero
                </div>
                <div class="add-number-content">
                    <div class="notranslate">
                        <button class="less-btn" type="button" disabled>
                            <i class="fa-solid fa-circle-minus"></i>
                        </button>
                        <span>1</span>
                        <button class="add-btn" type="button">
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container travel-raccomendation">
        <div class="content-travel">
            <div class="main-title">
                <h1>I viaggi da noi consigliati con partenza Bari</h1>
            </div>
            <div class="content-card">
                <div class="card-n1">
                    <div class="img-travel">
                        <img src="data:image/jpeg;base64,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" alt="">
                    </div>
                    <div class="content-description-travel">
                        <?php
                            $sql = "SELECT * FROM viaggi WHERE partenza = 'Bari' AND destinazione = 'Roma' ";
                            $result = $conn->query($sql);
                        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                            }
                        ?>
                        <div class="travel-travel">
                            <div class="partenza">
                                <i class="fa-solid fa-plane-departure"></i>
                                <h3>Partenza: <?php echo $row['partenza']; ?></h3>
                            </div>
                            <div class="destinazione">
                                 <i class="fa-solid fa-plane-arrival"></i>
                                 <h3>Destinazione: <?php echo $row['destinazione']; ?></h3>
                            </div>
                            <div class="data">
                                <i class="fa-solid fa-calendar-days"></i>
                                <h3>Data: <?php echo $row['data_viaggio']; ?></h3>
                            </div>
                            <div class="costo">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <h3>Costo: <?php echo $row['costo_viaggio']; ?>€</h3>
                            </div>
                        </div>
                        <div class="car-travel">
                            <div class="car">
                                 <i class="fa-solid fa-car-side"></i>
                                 <h3>Macchina: <?php echo $row['modello']; ?></h3>
                            </div>
                            <div class="car-color">
                                <i class="fa-solid fa-palette"></i>
                                <h3>Colore Macchina: <?php echo $row['colore']; ?></h3>
                            </div>
                            <div class="PostiAuto">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto: <?php echo $row['nPostitotale']; ?></h3>
                            </div>
                            <div class="PostiAutoDisponibili">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto Disponibli: <?php echo $row['nPostiDisponibili']; ?></h3>
                            </div>
                        </div>
                        <button id="btn-p" type="submit">Prenota</button>
                    </div>
                </div>

                <div class="card-n1">
                    <div class="img-travel">
                        <img src="data:image/jpeg;base64,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" alt="">
                    </div>
                    <div class="content-description-travel">
                        <?php
                            $sql = "SELECT * FROM viaggi WHERE partenza = 'Bari' AND destinazione = 'Napoli' ";
                            $result = $conn->query($sql);
                        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                            }
                        ?>
                        <div class="travel-travel">
                            <div class="partenza">
                                <i class="fa-solid fa-plane-departure"></i>
                                <h3>Partenza: <?php echo $row['partenza']; ?></h3>
                            </div>
                            <div class="destinazione">
                                 <i class="fa-solid fa-plane-arrival"></i>
                                 <h3>Destinazione: <?php echo $row['destinazione']; ?></h3>
                            </div>
                            <div class="data">
                                <i class="fa-solid fa-calendar-days"></i>
                                <h3>Data: <?php echo $row['data_viaggio']; ?></h3>
                            </div>
                            <div class="costo">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <h3>Costo: <?php echo $row['costo_viaggio']; ?>€</h3>
                            </div>
                        </div>
                        <div class="car-travel">
                            <div class="car">
                                 <i class="fa-solid fa-car-side"></i>
                                 <h3>Macchina: <?php echo $row['modello']; ?></h3>
                            </div>
                            <div class="car-color">
                                <i class="fa-solid fa-palette"></i>
                                <h3>Colore Macchina: <?php echo $row['colore']; ?></h3>
                            </div>
                            <div class="PostiAuto">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto: <?php echo $row['nPostitotale']; ?></h3>
                            </div>
                            <div class="PostiAutoDisponibili">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto Disponibli: <?php echo $row['nPostiDisponibili']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <button id="btn-p" type="submit">Prenota</button>
                </div>

                <div class="card-n1">
                    <div class="img-travel">
                        <img src="data:image/jpeg;base64,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" alt="">
                    </div>
                    <div class="content-description-travel">
                    <?php
                        $sql = "SELECT * FROM viaggi WHERE partenza = 'Bari' AND destinazione = 'Milano' ";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                         }
                    ?>
                    <div class="travel-travel">
                            <div class="partenza">
                                <i class="fa-solid fa-plane-departure"></i>
                                <h3>Partenza: <?php echo $row['partenza']; ?></h3>
                            </div>
                            <div class="destinazione">
                                 <i class="fa-solid fa-plane-arrival"></i>
                                 <h3>Destinazione: <?php echo $row['destinazione']; ?></h3>
                            </div>
                            <div class="data">
                                <i class="fa-solid fa-calendar-days"></i>
                                <h3>Data: <?php echo $row['data_viaggio']; ?></h3>
                            </div>
                            <div class="costo">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <h3>Costo: <?php echo $row['costo_viaggio']; ?>€</h3>
                            </div>
                        </div>
                        <div class="car-travel">
                            <div class="car">
                                 <i class="fa-solid fa-car-side"></i>
                                 <h3>Macchina: <?php echo $row['modello']; ?></h3>
                            </div>
                            <div class="car-color">
                                <i class="fa-solid fa-palette"></i>
                                <h3>Colore Macchina: <?php echo $row['colore']; ?></h3>
                            </div>
                            <div class="PostiAuto">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto: <?php echo $row['nPostitotale']; ?></h3>
                            </div>
                            <div class="PostiAutoDisponibili">
                                <i class="fa-solid fa-person"></i>
                                <h3>Posti Auto Disponibli: <?php echo $row['nPostiDisponibili']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <button id="btn-p" type="submit">Prenota</button>
                </div>
                
            </div>
         </div>
    </main>

    
    <script src="./static/js/dashboard-passenger.js"></script>  
</body>
</html>
