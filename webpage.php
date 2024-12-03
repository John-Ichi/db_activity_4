<?php
include 'connect.php';
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
    
    <title>Lab Activity 4</title>

    <style>
        body {
            font-family: "Arimo", serif;
            background-image: linear-gradient(to bottom right, #23cd6b, #272d2d);
            text-align: center;
        }
        h1 {
            color: white;
            text-align: left;
            text-shadow: 2px 2px 4px #000000;
        }
        a {
            color: #000000;
            text-decoration: none;
        }
        
    </style>

</head>
<body>

<div class="container">
    <h1>
        <b>USER INFORMATION</b>
    </h1>
</div>

<br>

<div class="container">
<table class="table table-success table-hover table-bordered border-success">
<thead>
    <tr class="table table-dark">
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>BIRTHDAY</th>
        <th>ADDRESS</th>
        <th>GENDER</th>
        <th></th>
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
            <button class="btn btn-sm btn-warning">
                <a href="update.php?updatebyid=' . $id . '"><b>EDIT</b></a>
            </button>
            <button class="btn btn-sm btn-danger">
                <a href="delete.php?deletebyid=' . $id . '"><b>DELETE</b></a>
            </button>
        </td>
        </tr>';

    }
}

            ?>
        </tbody>
    </table>
</div>

<div>
    <button class="btn btn-sm btn-light">
        <a href="insert.php">ADD USER</a>
    </button>
</div>

</body>

</html>