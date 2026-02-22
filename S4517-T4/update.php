<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        form { width: 50%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; }
        input { width: 100%; padding: 8px; margin: 10px 0; box-sizing: border-box; }
        button { background-color: #2196F3; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Edit Student</h2>
    
    <?php
    include 'db.php';
    $id = $_GET['id'];
    
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        $sql = "UPDATE students SET name='$name', email='$email', age=$age WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    $conn->close();
    ?>
    
    <form method="POST" action="">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Age: <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br>
        <button type="submit" name="update">Update Student</button>
        <a href="index.php">⬅️ Back</a>
    </form>
</body>
</html>