<?php

$db_hostname = $_SERVER["DB_HOSTNAME"];
$db_login = $_SERVER["DB_LOGIN"];
$db_password = $_SERVER["DB_PASSWORD"];
$db_name = $_SERVER["DB_NAME"];

$pdo = new PDO(
    dsn: "mysql:host=$db_hostname;dbname=$db_name",
    username: $db_login,
    password: $db_password,
);
$statement = $pdo->query(
    query: "SELECT * FROM users",
);
$rows = $statement->fetchAll(
    mode: PDO::FETCH_ASSOC,
);
?>

<table>
    <caption>Utilisateurs de l'application</caption>
    <tr>
        <th>ID</th>
        <th>Pseudo</th>
        <th>Mot de passe</th>
    </tr>
<?php
foreach($rows as $row){
    echo "<tr>";
    foreach(["id", "login", "password"] as $field_name){
        echo "<td>$row[$field_name]</td>";
    }
    echo "</tr>";
}
?>
</table>
