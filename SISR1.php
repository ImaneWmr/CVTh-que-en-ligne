<!DOCTYPE html>
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
    <div class="portail">
        <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        // Connexion à la base dOUAMAe données
        $cnxBDD = new mysqli("localhost", "root", "Iroise29", "OUAMAR", 3306);
        
        // Vérifier la connexion
        if ($cnxBDD->connect_error) {
            die("Erreur de connexion à la base de données : " . $cnxBDD->connect_error);
        }
        
        $sql = "SELECT nom, prenom, urlphoto, urlcv FROM ETUDIANT WHERE groupe = 'SISR1'"; 
        $result = $cnxBDD->query($sql);
        
        // Vérifier si la requête a réussi
        if ($result === false) {
            die("Erreur lors de l'exécution de la requête : " . $cnxBDD->error);
        }
        
        ?>

        <div class="resultats-container">
            <table class="resultats">
                <tbody>
                    <tr>
                        <?php foreach($result as $ligne) : ?>
                            <td class="resultats">
                                <?php
                                    $nom = $ligne['nom'];
                                    $prenom = $ligne['prenom'];
                                    $urlPhoto = $ligne['urlphoto']; // Utilisez le même nom de colonne que dans la base de données
                                    $urlCV = $ligne['urlcv']; // Utilisez le même nom de colonne que dans la base de données
                                ?>
                                <a href="<?php echo $urlCV; ?>" target="_blank">
                                    <img src="<?php echo $urlPhoto; ?>" class="photo">
                                    <br>
                                    <?php echo "$nom $prenom"; ?>
                                </a>
                                <br>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <?php
        // Fermer la connexion à la base de données
        $cnxBDD->close();
        ?>
        
    </div>
</body>
</html>
