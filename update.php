<?php
include 'connect.php';

$userid = $_GET['updatebyid'];

$sql = "SELECT name, email, birthday, address, gender FROM cervantes_dizon_mananquil WHERE id = $userid";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $original_name = $row['name'];
        $original_email = $row['email'];
        $original_birthday = $row['birthday'];
        $original_address = $row['address'];
        $original_gender = $row['gender'];
    }
}

if (isset($_POST['updateButton'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    

    $sql_update = "UPDATE `cervantes_dizon_mananquil` SET `name` = '$name', `email` = '$email', `birthday` = '$birthday', `address` = '$address', `gender` = '$gender' WHERE `id` = '$userid'";

    $update_statement = $conn->prepare($sql_update);
    $update_result = $update_statement->execute();


    if ($update_result) {
        header('location: webpage.php');
    } else {
        echo '<script> alert("Update Failed"); </script>';
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

    <title>Update Record</title>
</head>

<body>
    <h1> <b>UPDATE USER INFO</b></h1>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Enter full name" autocomplete="off" value="<?php echo $original_name ?>" required class="form-control-sm mt-3">
            <br>
            <input type="text" name="email" placeholder="Enter your email" autocomplete="off" value="<?php echo $original_email ?>" required class="form-control-sm">
            <br>
            <label> Birthday: </label> <br>
            <input type="date" name="birthday" autocomplete="off" value="<?php echo $original_birthday ?>" required class="form-control-sm">
            <br>
            <input type="text" name="address" placeholder="Enter your address" autocomplete="off" value="<?php echo $original_address ?>" required class="form-control-sm">
            <br>
            <label> Gender: </label> <br>
            <input type="radio" name="gender" <?php echo ($original_gender =="Male") ? "checked" : "";?> value = "Male" autocomplete="off" value="<?php echo $original_gender ?>" required class="form-check-input">Male
            <br>
            <input type="radio" name="gender" <?php echo ($original_gender =="Female") ? "checked" : "";?> value = "Female" autocomplete="off" value="<?php echo $original_gender ?>" required class="form-check-input">Female
            <br>
            <input type="radio" name="gender" <?php echo ($original_gender =="Other") ? "checked" : "";?> value = "Other" autocomplete="off" value="<?php echo $original_gender ?>" required class="form-check-input">Other
            <br>
            <div class="container text-center pb-3">
                <div class="row">
                    <div class="col">
                    <button type="submit" name="updateButton" class="btn btn-sm btn-light">UPDATE</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-sm btn-light">
                            <a href="webpage.php">CANCEL</a>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>