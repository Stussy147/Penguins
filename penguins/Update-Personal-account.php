<?php
include "Connect.php";
session_start();
$email =  isset($_POST['email']) ? $_POST['email'] : false;
$nickname =  isset($_POST['nick']) ? $_POST['nick'] : false;
$id =  isset($_POST['id']) ? $_POST['id'] : false;

$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from Users where user_id = $id"));

$update_user = " UPDATE `Users` set ";
// изменение почты
if ($email != $user['email']) {

    $update_user .= " `email` = '$email' where  user_id = $id ";

    $result_update_user = mysqli_query($con, $update_user);

    echo "<script>alert('Данные обновленны!'); location.href = '/userpage.php' </script>";
}
//изменение ника
if ($nickname != $user['username']) {
    $update_user .= " `username` = '$nickname' where user_id = $id ";

    $result_update_user = mysqli_query($con, $update_user);

    echo "<script>alert('Данные обновленны!'); location.href = '/userpage.php' </script>";
}
//изменение и то и то
if ($email != $user['email'] or $nickname != $user['username']) {

    $update_user .= " `email` = '$email', `username` = '$nickname' where user_id = $id ";

    $result_update_user = mysqli_query($con, $update_user);

    echo "<script>alert('Данные обновленны!'); location.href = '/userpage.php' </script>";
}
if ($email = $user['email'] or $nickname == $user['username']) {

    echo "<script>alert('Данные актуальны!'); location.href = '/userpage.php' </script>";
}
