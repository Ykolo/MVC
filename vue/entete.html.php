<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/img/icon.png">
    <script defer src="script.js"></script>
    <title>Motorsport Schedules</title>
</head>
<body>
    <main class="<?php echo $data["pageClass"]; ?>">
        <nav>
            <div style="background-color: #e62a2a;"> <a href="./?action=accueil"> <img src="/img/logof1.png" alt="logo wrc"> </a> </div>
            <div> <a href="./?action=ecurie"> ECURIE </a> </div>
            <div> <a href="./?action=pilote"> PILOTE </a> </div>
            <div class="comingsoon">MORE COMING SOON</div>
            <?php if (isLoggedOn()) { ?>
                <a href="./?action=profil" id="connexion"><button><img src="../img/account.png" alt="Connexion"></button></a>
            <?php } else { ?>
                <a href="./?action=connexion" id="connexion"><button><img src="../img/account.png" alt="Connexion"></button></a>
            <?php } ?>
        </nav>