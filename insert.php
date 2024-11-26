<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `cervantes_dizon_mananquil` (`name`, `email`, `birthday`, `address`, `gender`) VALUES (?, ?, ?, ?, ?)";

    $insertStatement = $conn->prepare($sql);
    $insertStatement->bindParam(1, $name);
    $insertStatement->bindParam(2, $email);
    $insertStatement->bindParam(3, $birthday);
    $insertStatement->bindParam(4, $address);
    $insertStatement->bindParam(5, $gender);

    $result = $insertStatement->execute();

    if ($result) {
        header('Location: webpage.php');
        exit();
    }
    else {
        echo "<script> alert(Error); </script>";
        header('Location: webpage.php');
    }
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
        <input type="text" placeholder="Name" name="name"><br>
        <input type="text" placeholder="Email" name="email"><br>
        Birthday <br>
        <input type="date" name="birthday"><br>
        <input type="text" placeholder="Address" name="address"><br>
        Gender: <br>
        <input type="radio" name="gender" value="Male">Male <br>
        <input type="radio" name="gender" value="Female">Female <br>
        <input type="radio" name="gender" value="Other">Other <br>
        <button type="submit" name="submit">Submit</button><br>
        <button type="reset">Reset</button><br>
        <a href="webpage.php">Return</a>
    </form>
</body>
</html>