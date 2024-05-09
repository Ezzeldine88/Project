<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user chats</title>
    <link rel="stylesheet" href="viewdonations.css">
</head>
<body>
    <h1>user chats</h1>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "clinic"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM chat_messages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Phone</th><th>Message</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No messages found.";
    }

    $conn->close();
    ?>
</body>
</html>
