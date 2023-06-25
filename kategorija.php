<?php
include 'connect.php';
define('UPLPATH', 'img/');
$kategorija = $_GET['kategorija'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>antonio-baricevic</title>
    <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <header class="glavni">
        <img id = "logo" src="Stern_Logo.svg.png" alt="Stern Logo" > 
        <h1 id="h1-naslov">stern</h1>
        <nav>
            <h5 class="menu-item">Home</h5>
            <h5 class="menu-item">Politik</h5>
            <h5 class="menu-item">Gesundheit</h5>
            <h5 class="menu-item">Administracija</h5>
            <h5 class="menu-item"><a href="unos.html">Unos</a></h5>
        </nav>
    </header>
    
    <section class="tekst">
        <h2><?php$kategorija?></h2>
        <div class="artikli">
        <?php
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='".$kategorija."'";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)){
            echo '<article>';  
            echo '<img src="' . UPLPATH . $row['slika'] . '"';
            echo '<h3 class="title"><a href="clanak.php?id='.$row['id'].'">'.$row['naslov'].'</a></h3>';
            echo '<p>'.$row['sazetak'].'</p>';
            echo '</article>';
        }?>
        </div>
    </section>

    <footer class="glavni">
        <h1>stern</h1>
    </footer>
  </body>
</html>