<?php
include("db.php");


$id = $_GET['id'];


$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id = $id");
$row = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated_task = $_POST['task'];


    mysqli_query($conn, "UPDATE tasks SET task = '$updated_task' WHERE id = $id");


    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Task</h2>
    <form method="POST">
        <input type="text" name="task" value="<?php echo $row['task']; ?>" required>
        <button type="submit">Update Task</button>
    </form>
</div>
</body>
</html>
