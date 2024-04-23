<h1>Liste des écuries</h1>
<table class="ecurie">
    <tr>
        <th>Nom</th>
        <th>Logo</th>
    </tr>
    <?php foreach ($lesEcuries as $ecurie) : ?>
        <tr>
            <td><?= $ecurie['NomE'] ?></td>
            <td><img src="<?=$ecurie['Logo']?>" alt="logo"></td>
        </tr>
    <?php endforeach; ?>
</table>
</main>
</body>

</html>