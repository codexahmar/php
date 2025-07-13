<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple To-Do App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>My To-Do List</h2>


        <form action="insert.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>


        <table>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Actions</th>
            </tr>

            <?php

            $result = mysqli_query($conn, "SELECT * FROM tasks");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['task']."</td>";
                echo "<td>
                        <a href='update.php?id=".$row['id']."'>Edit</a> |
                        <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
