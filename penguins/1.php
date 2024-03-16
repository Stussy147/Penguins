<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penguins</title>
</head>

<body>
    <?php
    // $a = 1;
    // echo "<b> Меня зовут - $UserName </b>";
    // if ($Age >= 18) {
    //     echo  "<a href = 'parent.php'>Переход по ссылке</a><br>";
    // } else {
    //     echo  "<a href = 'child.php'>Переход по ссылке</a> <br>";
    // }

    // for ($i = 1; $i <= $Age; $i++) {
    //     if ($Age % $i == 0) {
    //         echo "$i <br>";
    //     }
    // }
    ?>
    <!-- <form action="check.php" method="POST" enctype="multipart/form-data">
        <label for="userName">Введите имя:</label>
        <input name="userName" type="text" id="userName">
        <br>
        <label for="userAge">Введите возраст:</label>
        <input name="userAge" type="text" id="userAge">
        <br>
        <label for="userAvatar">Загрузите Изображение профиля</label>
        <input type="file" id="userAvatar" name="userAvatar">
        <br>
        <input type="submit" value="Отправить">
    </form> -->
    <form action="check.php" method="POST" enctype="multipart/form-data">
        <label for="news_title">Введите заголовок поста</label>
        <input name="news_title" type="text" id="news_title">
        <br>
        <label for="news_img">Загрузите Изображения Поста</label>
        <input type="file" id="news_img" name="news_img">
        <br>
        <label for="news_content">Введите содержание поста:</label>
        <input name="news_content" type="text" id="news_content">
        <br>
        <select name="" id="">
            <option value="">Выбор новости</option>
            <option value="pets">Животные</option>
            <option value="plans">Растения</option>
            <option value="space">Космос</option>
        </select>
        <br>
        <input type="submit" value="Опубликовать пост" id="submit">
    </form>
</body>

</html>