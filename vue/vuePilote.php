<h1>Liste des pilotes</h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Nationalité</th>
        <th>Écurie</th>
    </tr>
    <?php foreach ($lesPilotes as $pilote) : ?>
        <tr>
            <td><?= $pilote['NomP'] ?></td>
            <td><?= $pilote['PrenomP'] ?></td>
            <td><?= $pilote['Nationalité'] ?></td>
            <td><?= $pilote['NomE'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</main>
</body>

</html>