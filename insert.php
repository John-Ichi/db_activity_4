<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    //Code
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <form method="post">
        <input type="text" placeholder="Name"><br>
        <input type="text" placeholder="Email"><br>
        Birthday <br>
        <input type="date"><br>
        <input type="text" placeholder="Address"><br>
        Gender: <br>
        <input type="radio" name="GENDER" value="Male">Male <br>
        <input type="radio" name="GENDER" value="Female">Female <br>
        <input type="radio" name="GENDER" value="Other">Other <br>
        <button type="submit" name="submit">Submit</button><br>
        <button type="reset">Reset</button><br>
        <a href="webpage.php">Return</a>
    </form>
</body>
</html>