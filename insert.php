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
        <input type="text" placeholder="Name" name="name" required><br>
        <input type="text" placeholder="Email" name="email" required><br>
        Birthday <br>
        <input type="date" name="birthday" required><br>
        <input type="text" placeholder="Address" name="address" required><br>
        Gender: <br>
        <input type="radio" name="gender" value="Male" required>Male <br>
        <input type="radio" name="gender" value="Female" required>Female <br>
        <input type="radio" name="gender" value="Other" required>Other <br>
        <button type="submit" name="submit">SUBMIT</button><br>
        <button type="reset">RESET</button><br>
        <button>
            <a href="webpage.php">RETURN</a>
        </button>
    </form>
</body>
</html>