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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Insert</title>
    <style>
        body {
            text-align: center;
            font-family: "Arimo", serif;
            background-image: linear-gradient(to bottom right, #23cd6b, #272d2d);
        }
        .container {
            background-color: #272d2d;
            border-radius: 5px;
            margin-top: 15px;
            max-width: 400px;
            text-align: left;
            color: white;
        }
        .btn {
            color: black;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: black;
        }
        input {
            margin: 10px;
        }
        h1 {
            margin-top: 10px;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }
    </style>
</head>
<body>
    <div class="container-sm">
        <h1><b>ADD USER</b></h1>
    </div>
    <div class="container">
    <form method="post">
        <input type="text" placeholder="Name" name="name" required class="form-control-sm mt-3"><br>
        <input type="text" placeholder="Email" name="email" required class="form-control-sm"><br>
        Birthday: <br>
        <input type="date" name="birthday" required class="form-control-sm"><br>
        <input type="text" placeholder="Address" name="address" required class="form-control-sm" maxlength="100"><br>
        Gender: <br>
        <input type="radio" name="gender" value="Male" required class="form-check-input"> Male <br>
        <input type="radio" name="gender" value="Female" required class="form-check-input"> Female <br>
        <input type="radio" name="gender" value="Other" required class="form-check-input"> Other <br>
        <div class="container text-center pb-3">
        <div class="row">
            <div class="col">
                <button type="submit" name="submit" class="btn btn-sm btn-light">SUBMIT</button><br>
            </div>
            <div class="col">
                <button type="reset" class="btn btn-sm btn-light">RESET</button><br>
            </div>
            <div class="col">
                <button class="btn btn-sm btn-light">
                    <a href="webpage.php">RETURN</a>
                </button>
            </div>
        </div>
        </div>
    </form>
    </div>
</body>
</html>