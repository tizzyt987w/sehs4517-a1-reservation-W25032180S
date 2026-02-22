<!DOCTYPE html>
<html>
<head>
    <title>Insert Record</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br>";
    
    $sql = "INSERT INTO MyGuests (name, email, password) 
            VALUES ('Sun Sir', 'sunsir@speed.com', 'secret123')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
    <br>
    <a href="read_mydb.php">View All Records</a>
</body>
</html>