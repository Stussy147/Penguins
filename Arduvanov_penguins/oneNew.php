<?php
include "Connect.php";
include "header.php";
$new_id = isset($_GET["new"]) ? $_GET["new"] : false;

if ($new_id) {
    $query_getNew = "SELECT * from News where news_id = $new_id";
    $new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));
    $date = date("d:m:Y h:m:s", strtotime($new_info['publish_date']));
    $mount = [
        '01' => 'Январь',
        '02' => 'Ферваль',
        '03' => 'Март',
        '04' => 'Апрель',
        '05' => 'Май',
        '06' => 'Июнь',
        '07' => 'Июль',
        '08' => 'Август',
        '09' => 'Сентябрь',
        '10' => 'Октябрь',
        '11' => 'Ноябрь',
        '12' => 'Декабрь'
    ];


    $publish_date = date_new($new_info['publish_date']);
    $comments_result = mysqli_query($con, "SELECT * FROM Comments INNER JOIN Users on Users.user_id = Comments.user_id WHERE news_id = '$new_id'");
    $comments = mysqli_fetch_all($comments_result);
} else {
    header("Location: /");
}
function date_new($date_old)
{
    global $mount;
    $date = date("d:m:Y h:m:s", strtotime($date_old));
    return substr($date, 0, 2) . " " . $mount[substr($date, 3, 2)] . " " . substr($date, 6);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/CSS/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<div class = 'card'>";
    echo "<div class = 'c_img'><img src = 'Image/News/" . $new_info['image'] . "'></div>";
    echo $publish_date;
    echo "<br>";
    echo $new_info['title'];
    echo "<br>";
    echo "<p class = 'description mb-3'>" . $new_info['content'] . "</p>";
    ?>


    <h3 class="mb-3">Коментарии</h3>
    <div class="comment"><img src="/icons/5355695_chat_comment_email_letter_mail_icon.png" width="40px" height="40px">
        <h3 class="mb-3"><?= $count = mysqli_num_rows($comments_result) ?> </h3>
    </div>
    <?php if ($username) { ?>
        <form class="w-100" action="/DB/comments-DB.php" method="post">
            <div class="mb-3 d-flex w-100">
                <div class="w-50">
                    <input type="hidden" name="id_new" value="<?= $new_id ?>">
                    <label for="comment_text" class="form-label">Напишите комментарий</label>
                    <input type="text" class="form-control" id="comment_text" name="comment_text">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
        <?php }
    if ($count) {
        foreach ($comments as $comment) { ?>
            <div class="card">
                <div class="card-header">
                    <?= date_new($comment[4]) ?>

                </div>
                <div class="card-body">
                    <?= "<p>Автор: " . $comment[8] . "</p>" ?>
                </div>
                <p class="card-text">
                    <?= $comment[3] ?>
                </p>
            </div>
        <?php }
        ?>
    <?php
    } else echo "<i>Комментариев пока нет</i>"
    ?>

</body>

</html>