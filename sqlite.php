<html>
<head>
    <title>Liste de mes films</title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf8"/>
</head>
<body>
<?php

    $db = new SQLite3("data/MyVideos93.db");
    $query = "SELECT * FROM movie ORDER BY c07 DESC"; // Date de parution
    $results = $db->query($query);
    while ($row = $results->fetchArray()) {
        $name = $row[2];
        $desc = $row[3];
        $subdesc = $row[5];
        $year = $row[9];
        $images = $row[10];
        $ddl = $row[24];
        preg_match("#http:\/\/(\w.)+.\w{2,3}(\/\w+)+.(jpg|png|gif|bmp)#", $images, $matches);
        $image = $matches[0];
        print "<span class='movie'><a href='file://$ddl'><img src='$image'/></a><h1>$name ($year)</h1></span>";
        /*if($name == "Deadpool")
            var_dump($row);*/
    }
?> 
</body>
</html>