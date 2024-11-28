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
    <title>Update Record</title>

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
            color: gray;
        }
        a {
            text-decoration: none;
            color: gray;
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
    </style>
</head>

<body>
    <h1>UPDATE USER INFO</h1>
    <div>
        <form action="" method="POST">
            <label> Name: </label>
            <input type="text" name="name" placeholder="Enter full name" autocomplete="off" value="<?php echo $original_name ?>" required>
            <br>
            <label> Email: </label>
            <input type="text" name="email" placeholder="Enter your email" autocomplete="off" value="<?php echo $original_email ?>" required>
            <br>
            <label> Birthday: </label>
            <input type="date" name="birthday" autocomplete="off" value="<?php echo $original_birthday ?>" required>
            <br>
            <label> Address: </label>
            <input type="text" name="address" placeholder="Enter your address" autocomplete="off" value="<?php echo $original_address ?>" required>
            <br>
            <label> Gender: </label>
            <input type="radio" name="gender" <?php echo ($original_gender =="Male") ? "checked" : "";?> value = "Male" autocomplete="off" value="<?php echo $original_gender ?>" required>Male
            <br>
            <input type="radio" name="gender" <?php echo ($original_gender =="Female") ? "checked" : "";?> value = "Female" autocomplete="off" value="<?php echo $original_gender ?>" required>Female
            <br>
            <input type="radio" name="gender" <?php echo ($original_gender =="Other") ? "checked" : "";?> value = "Other" autocomplete="off" value="<?php echo $original_gender ?>" required>Other
            <br>
            <button type="submit" name="updateButton"> Update </button>
            <br>
            <button>
                <a href="webpage.php"> Cancel</a>
            </button>

        </form>
    </div>
</body>

</html>