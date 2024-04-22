<div class="profil">
    <fieldset>
        <h1>Mon profil</h1>
        <br>
        Mail : <?= $util["Email"] ?> <br />
        Pseudo : <?= $util["NomU"] ?> <br />
        <button><a href="./?action=deconnexion">Se déconnecter</a></button>
        <button><a href="./?action=update">Modifier mon profil</a></button>
        <form action="./?action=supprimerC" method="post">
            <input class="profil-input" type="email" name="mailU" placeholder="Email" alt="Email">
        <button type="submit" name="delete_profile">Supprimer mon compte</button>
        </form>
    </fieldset>
</div>