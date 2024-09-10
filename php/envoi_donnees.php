<?php
if (isset($_POST['envoi'])) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $message);
        // Configuration de l'erreur pour lever une exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sujet', $sujet);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        echo "Enregistrement effectué avec succès.";
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
    $conn = null;
}
?>