<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
        $db = new PDO('mysql:host=localhost;dbname=atelier_professionnel','root','root');
        $sql =$db->prepare("SELECT * FROM demande");
        $sql->execute();
        $data = array();

        while ($requete = $sql ->fetchAll(PDO::FETCH_ASSOC)) {
            array_push($data,$requete);
        } 

        $json = json_encode ($data);
        echo $json;
    ?>
    </body>
</html>