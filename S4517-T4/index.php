<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { margin: 0 5px; text-decoration: none; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Student List</h2>
    <div style="text-align:center; margin:20px;">
        <a href="create.php">➕ Add New Student</a>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        
        <?php
        include 'db.php';
        $sql = "SELECT id, name, email, age FROM students";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row["id"] . "'>✏️ Edit</a> | 
                        <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>