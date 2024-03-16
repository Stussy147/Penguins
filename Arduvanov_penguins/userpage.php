<?php include "Connect.php";
include "header.php";
session_start();
$id = $_SESSION['user_id'];
$user = mysqli_fetch_array(mysqli_query($con, "SELECT * from users where user_id = $id"));
?>
<main>

    <div class="container">
        <h2>
            Личный кабинет
        </h2>
        <form action="Update-Personal-account.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Электронная почта:</b></label>
                <input type="Hidden" name="id" value="<?= $id ?>">
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user["email"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><b>Никнейм</b></label>
                <input type="text" name="nick" class="form-control" value="<?= $user["username"] ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Изменить">
        </form>
    </div>
</main>
</body>

</html>