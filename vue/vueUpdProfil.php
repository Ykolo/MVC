<div class="profil">
    <fieldset>
        <h1>Modifier mon profil</h1>
        <br>
        Mon adresse électronique : <?= $util["Email"] ?> <br />
        Mettre à jour mon pseudo :

        <form action="./?action=update" method="POST">
            <input class="profil-input" type="text" name="pseudoU" placeholder="Nouveau pseudo" /><br />
            <button class="profil-input"type="submit">Enregistrer</button>
        </form>
            <hr>
            Mettre à jour mon mot de passe : <br />
        <form action="./?action=update" method="POST">
            <?= $messageMdp ?>
            <input class="profil-input" type="password" name="mdpU" placeholder="Nouveau mot de passe" /><br />
            <input class="profil-input" type="password" name="mdpU2" placeholder="Confirmer la saisie" /><br />
            <button class="profil-input" type="submit">Enregistrer</button>

        </form>
    </fieldset>
</div>