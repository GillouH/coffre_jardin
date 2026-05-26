<?php

try{
    $mysql_client = new PDO(
        dsn: implode(
            separator: ";",
            array: [
                "mysql:host={$_SERVER["DB_HOSTNAME"]}",
                "dbname={$_SERVER["DB_NAME"]}",
                "charset=utf8",
            ],
        ),
        username: $_SERVER["DB_LOGIN"],
        password: $_SERVER["DB_PASSWORD"],
        options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    );
} catch(Exception $exception){
    die("Erreur : {$exception->getMessage()}");
}

$version = "simple";
//$version = "préparée";

if($version == "simple"){
    $statement = $mysql_client->query(
        query: "SELECT * FROM users",
    );
    $rows = $statement->fetchAll(
        mode: PDO::FETCH_ASSOC,
    );
} elseif($version == "préparée"){
    // "a BETWEEN b AND c" -> "b <= a <= c"
    $select_all_query = "SELECT * FROM users WHERE id BETWEEN :id_min AND :id_max";
    $recipes_statement = $mysql_client->prepare(
        query: $select_all_query,
    );
    $recipes_statement->execute(
        params: [
            "id_min" => 0,
            "id_max" => 100,
        ],
    );
    $rows = $recipes_statement->fetchAll(
        mode: PDO::FETCH_ASSOC,
    );
} else{
    die("Version non reconnue : {$version}");
}

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
        echo "<td>{$row[$field_name]}</td>";
    }
    echo "</tr>";
}
?>
</table>
