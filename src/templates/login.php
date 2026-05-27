<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="/src/stylesheets/login.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Page de login</h1>
        <table>
            <caption>Utilisateurs de l'application</caption>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Mot de passe</th>
            </tr>
            <?php foreach($rows as $row): ?>
                <tr>
                    <?php foreach(["id", "login", "password"] as $field_name): ?>
                        <td><?= $row[$field_name]; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <a role="button" href="/">Retour</a>

        <pre><?php /* print_r($_SERVER); */ ?></pre>
    </body>
</html>
