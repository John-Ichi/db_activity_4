<?php
include 'connect.php';

$userid = $_GET['updatebyid'];

$sql = "SELECT name, email, birthday, address, gender FROM demotable WHERE id = $userid";
$statement = $con->prepare($sql);
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
    

    $sql_update = "UPDATE `demotable` SET `name` = '$name', `email` = '$email', `birthday` = '$birthday', `address` = '$address', `gender` = '$gender', WHERE `id` = '$userid'";

    $update_statement = $con->prepare($sql_update);
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
            <input type="radio" name="gender" value = "Male" autocomplete="off" value="<?php echo $original_gender ?>" required>
            Male
            <br>
            <input type="radio" name="gender" value = "Female" autocomplete="off" value="<?php echo $original_gender ?>" required>
            Female
            <br>
            <input type="radio" name="gender" value = "Other" autocomplete="off" value="<?php echo $original_gender ?>" required>
            Other
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
