
<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les valeurs du formulaire
    $nom = isset($_POST['TXTnom']) ? $_POST['TXTnom'] : '';
    $prenom = isset($_POST['TXTprenom']) ? $_POST['TXTprenom'] : '';
    $groupe = isset($_POST['groupe']) ? $_POST['groupe'] : '';
   
    // Vérifiez le téléversement du fichier photo
   
        // Récupérez les informations sur le fichier
        $photo = $_FILES['filephoto']['tmp_name']; // Chemin temporaire
        $nomPhoto = $_FILES['filephoto']['name']; // Nom du fichier d'origine

        // Déplacez le fichier vers un répertoire de destination
        $destinationPhoto = '/var/www/html/OUAMAR/depot/photos/' . $nomPhoto;
        move_uploaded_file($photo, $destinationPhoto);
    

    // Vérifiez le téléversement du fichier CV
    
        // Récupérez les informations sur le fichier
        $cv = $_FILES['fileCV']['tmp_name']; // Chemin temporaire
        $nomCV = $_FILES['fileCV']['name']; // Nom du fichier d'origine

        // Déplacez le fichier vers un répertoire de destination
        $destinationCV = '/var/www/html/OUAMAR/depot/photos/' . $nomCV;
        move_uploaded_file($cv, $destinationCV);
    

    // Connexion à la base de données (assurez-vous de remplacer ces valeurs par les vôtres)
    $host = "localhost";
    $user = "root";
    $password = "Iroise29";
    $bdname = "OUAMAR";

    $cnxBDD = new mysqli($host, $user, $password, $bdname);

    // Vérifier la connexion
    if ($cnxBDD->connect_error) {
        die("Échec de la connexion à la base de données : " . $cnxBDD->connect_error);
    }

    // Échapper les données pour éviter les injections SQL
    $nom = $cnxBDD->real_escape_string($nom);
    $prenom = $cnxBDD->real_escape_string($prenom);
    $groupe = $cnxBDD->real_escape_string($groupe);
    $destinationCV = './photos/' . $nomCV;
    $destinationPhoto = './photos/' . $nomPhoto;
    // Écrire la requête SQL pour insérer les données dans la base de données
    $sql = "INSERT INTO ETUDIANT(Nom, Prenom, urlPhoto, urlCV, groupe) VALUES ('$nom', '$prenom', '$destinationPhoto', '$destinationCV', '$groupe')";

    // Exécuter la requête
    if ($cnxBDD->query($sql) === TRUE) {
        echo "$prenom $nom, votre inscription est terminée. <br>";
    } else {
        echo "Erreur lors de l'inscription : " . $cnxBDD->error;
    }

    // Fermer la connexion à la base de données
    $cnxBDD->close();
}
?>
