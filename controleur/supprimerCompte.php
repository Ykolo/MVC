<?php
include_once "bd.utilisateur.inc.php"; // Inclure le fichier contenant les fonctions de manipulation de la base de données
$page = 'login';
$data['pageClass'] = $page . '-page';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_profile'])) {
    // Vérifier si la requête est de type POST et si le paramètre 'delete_profile' est présent
    $mailU = $_POST['mailU']; 

    // Appeler la fonction pour supprimer l'utilisateur de la base de données
    $success = removeUtilisateur($mailU);

    if ($success) {
        $titre = "Suppression réussi";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueConfirmationSuppression.php";
        include "$racine/vue/pied.html.php";
    } else {
        // En cas d'échec, afficher un message d'erreur ou effectuer une autre action
        echo "Une erreur s'est produite lors de la suppression de votre profil.";
    }
    var_dump($success);
}
?>
