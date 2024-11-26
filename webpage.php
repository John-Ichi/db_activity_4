<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LAB ACTIVITY 4</title>

    <style>
    </style>

</head>
<body>

<h1>USER INFORMATION</h1>

<div>
    <button>
        <a href="insert.php"> Add a user
    </button>
</div>
<br>

<table>
<thead>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>BIRTHDAY</th>
        <th>ADDRESS</th>
        <th>GENDER</th>
        <th>EDIT</th>
    </tr>
</thead>

<tbody>

<?php
$sql = "SELECT id, name, email, birthday, address, gender FROM cervantes_dizon_mananquil";
$statement = $conn->prepare($sql);
$statement->execute();

$result = $statement->fetchALL(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $birthday = $row['birthday'];
        $address = $row['address'];
        $gender = $row['gender'];

        echo '<tr>
        <td>' . $id . '</td>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>' . $birthday . '</td>
        <td>' . $address . '</td>
        <td>' . $gender . '</td>
        <td>
         <button>
            <a href="update.php?updatebyid=' . $id . '"> Edit </a>
         </button>
         
         </td>
         </tr>';

    }
}

            ?>
        </tbody>
    </table>
</body>

</html>