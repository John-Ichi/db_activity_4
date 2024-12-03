<?php

include 'connect.php';

if (isset($_GET['deletebyid'])) {

    $id = $_GET['deletebyid'];

    echo "<script>
        if (confirm('Are you sure you want to delete the user with ID $id?')) {
            window.location.href = 'delete.php?confirmdelete=true&&deletebyid=$id';
        }
        else {
            window.location.href = 'webpage.php';
        }
    </script>";

}

if (isset($_GET['deletebyid']) && $_GET['confirmdelete'] === 'true') {
    
    $userid = $_GET['deletebyid'];
    $sql_delete = "DELETE FROM `cervantes_dizon_mananquil` WHERE `id` = '$userid'";
    $delete_statement = $conn->prepare($sql_delete);
    $delete_result = $delete_statement->execute();

    if ($delete_result) {
        header('location: webpage.php');
        exit;
    }
    else {
        echo '<script> alert("Delete failed!"); </script>';
        exit;
    }

}

?>