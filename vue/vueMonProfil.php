<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["Email"] ?> <br />
Mon pseudo : <?= $util["NomU"] ?> <br />
<button><a href="./?action=deconnexion">Se déconnecter</a></button>
<form class="supprC" action="./?action=supprimerC" method="post">
    <button type="submit">Supprimer mon compte</button>
</form>