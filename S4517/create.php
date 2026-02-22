<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
    <style>
        form { width: 50%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Add New Student</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Age: <input type="number" name="age" required><br>
        <button type="submit" name="submit">Add Student</button>
        <a href="index.php">⬅️ Back</a>
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        include 'db.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
    ?>
</body>
</html>