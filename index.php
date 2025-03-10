<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/81c2f751c8.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <link rel="stylesheet" href="index.css">
        <link rel="icon" href="img/icon.png">
        <title>Charles de Foucauld - SIO</title>
    </head>
    <body>
        <div class="header">
            <table>
                <td>
                    <i class="fa-solid fa-school icon"></i>
                </td>
                <td class="titre">
                    <b class="titre">Charles de Foucauld</b>
                </td>
                <td>
                    <a class="nav" href="#sio">BTS SIO <i class="fa-solid fa-computer"></i></a>
                    <div class="dropdown-menu">
                       <!--<a class="nav" href="#" id="specialites">Spécialités <i class="fa-solid fa-caret-down"></i></a>-->
                       <a class="nav" href="#specialites">Spécialités <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a class="dropdown" href="#sisr"><i class="fa-solid fa-wifi"></i> SISR</a>
                            <a class="dropdown" href="#slam"><i class="fa-solid fa-code"></i> SLAM</a>
                        </div>
                    </div>
                    <a class="nav" href="#resulstats">Résultats <i class="fa-solid fa-square-poll-vertical"></i></a>
                    <a class="nav" href="#localisation">Où nous trouver <i class="fa-solid fa-location-dot"></i></a>
                    
                </td>
            </table>
        </div>

<div class="debut">
    <table>
        <tr>
        Espace<br>
        <b>Recruteur<br><br>
        Les talents dont vous avez besoin sont ici!</b><br>
        </tr>
    </table>
</div>
<div class="annonce" >
    <table>
    <tr><td><b>Avec la CVthèque, n'attendez plus que les candidats postulent à vos offres.<br>Soyez les 1 er à contacter les candidats qui vous intéressent.</b></td></tr>

    </table>
</div>


<div class= "wrapper1">
    <br>
    <button onclick="retourEnArriere()" style="background-color:#74b1be ; color: white;">Revenir en arrière</button>

    <script>
        function retourEnArriere() {
            window.history.back();
        }
    </script>
<?php
$mapage = isset($_GET['page']) ? $_GET['page'] : '';
$monGroupe = isset($_GET['groupe']) ? $_GET['groupe'] : '';

switch ($mapage) {
    case '1': include "page01.html"; break;
    case '2': include "SISR1.php"; break;
    case '3': include "SISR2.php"; break;
    case '4': include "SLAM1.php"; break;
    case '5': include "SLAM2.php"; break;
    default: include "page01.html"; break;
}
?>

</div>


<div class="fin">
<table class="finn">
    <tr>
        FAQ<br>
        <b>Nous rejoindre</b><br>
        Conditions générales<br>
        </tr>
</table>
</div>
</body>
</html>