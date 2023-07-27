<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully</br>";

// Perform query
if ($query = $conn->query("SELECT * FROM db_view.discussion")) {
    echo "Returned rows are: " . $query->num_rows . "</br>";
    while ($row = $query->fetch_assoc()) {
        echo "id: " . $row["id"]. " - pseudo: " . $row["pseudo"]. " " . $row["message"]. "<br>";
        $posts[] = $row;
    }
    var_dump($posts);
}

$conn->close();

?>
<!--   -->
<html>
    <head>
        <title>All posts by member</title>
    </head>
    <body>
        <?php foreach($posts as $post): ?>
            <h1><?=$post['pseudo']?></h1>
            <span><?=$post['message']?></span>
        <?php endforeach; ?>
    </body>
</html>

