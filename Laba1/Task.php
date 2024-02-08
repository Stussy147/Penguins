<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Задачи</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' media='screen' href='Task.css'>
<script src = "main.js"></script>
</head>
<body>
<section id="Ege-bg">
<div id="EGE">
<div id="Title-EGE">
<h2>Тренировочные задания по ЕГЭ</h2>
<h1>Информатика</h1>
<p>Тольяттинский государственный университет</з>
</div>

<div id="YourSignHow">
<p>Вы вошли как гость</p>
<div id="but-content">
<button id="Sign">Войти</button>
<button id="Reg">Зарегистрироваться</button>
</div>
</div>
</div>
</section>

<main>
<section id="VARS-BG">
<div id="timer-content">
    <div id="timers"> <section id="VARS-BG">
        <div id="timer-content" >
            Осталось времени<span id="seconds">120</span>секунд
        </div></h4>
    
</div>


<div id="date-and-time">
<?php
    echo date("Y-m-d");
?>
<?php
    $timezone = new DateTimeZone('Europe/Moscow');
    $time = new DateTime('now', $timezone);
    $time -> modify('+2 hours');
    echo $time -> format('H:i:s'); // Выводит текущее время с учетом сдвига на +2 часа от Московского времени
?>
</div>
</div>

<div id="container-main-task">
<h1 id = "bilet">Билет №1</h1>
<?php
    $var1 = 0;
    $var2 = 0;
    $var3 = 0;
    $var4 = 0;
    $var5 = 0;
    $var6 = 0;

    $tasks = [

    "Необходимо перевести значение $var1 из 2СС в 10СС. В качестве ответа указать число.",

    "Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, чтобы можно было сохранить любое растровое изображение размером $var2 × $var3 пикселей при условии, что в изображении могут использоваться $var4 различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.",

    "Напишите количество вхождений символа $var5 в следующем тексте. В ответ записать число вхождений. $var6"

    ];


    function random($min, $max){
        return mt_rand($min, $max);
    }

    function get2SS($len){
        $str = "";
        for ($i=0;$i<$len;$i++) {
            if($i==0) $str .= 1;
            else $str .= random(0,1);
        }
        return $str;
    }


    function get_answer($var1) {
    $binaryDigits = str_split($var1);
    $decimalNumber = 0;

    for ($i = 0; $i < count($binaryDigits); $i++) {
        $decimalNumber += intval($binaryDigits[$i]) * pow(2, count($binaryDigits) - 1 - $i);
    }
        return $decimalNumber;
    }

    for($i=0;$i<4;$i++){
        switch($_GET['task']){
        case 0;
        $var1 = get2SS(random(2,5));
        echo "<p>Необходимо перевести значение $var1 из 2 сисемы счисления в 10 систему счисления. В качестве ответа указать число.</p>";
        echo "<input type='hidden' value='" . get_answer($var1) . "' id='ans$i'>";
        echo "<label>Ответ:</label><input type='number' id='ans_user$i'>";
        echo "<p id='val$i'></p><hr>";
        break;
        }
    }


    function getColor($tlen){
        $str="";
            $digits = array(128, 256, 16); // определенные цифры
                for($i = 0; $i < $tlen; $i++){
                if($i == 0) {
                $str .= $digits[array_rand($digits, 1)]; // первая цифра из определенных
                } else {
                $str .= $digits[array_rand($digits, 1)]; // случайная цифра из определенных
            }
        }
        return $str;
    }


    function calculateMemorySize($var2, $var3, $var4) {
        $bitsPerPixel = ceil(log($var4, 2)); // вычисляем количество бит на пиксель
        $memorySize = $var2 * $var3 * $bitsPerPixel / 8 / 1024; // вычисляем объем памяти в Кбайтах
        return ceil($memorySize); // округляем до ближайшего целого числа
    }

    $memorySize = calculateMemorySize($var2, $var3, $var4);



    for($i=0; $i<4; $i++){
        switch($_GET['task']){
            case 1:
            $var2 = getColor(rand(1, 1));
            $var3 = getColor(rand(1, 1));
            $var4 = getColor(rand(1, 1));
            echo "<p>Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, чтобы можно было сохранить любое растровое изображение размером $var2 × $var3 пикселей при условии, что в изображении могут использоваться $var4 различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.</p>";
            echo "<input type='hidden' value='" . calculateMemorySize($var2, $var3, $var4)
            . "' id='ans$i'>";
            echo "<label>Ответ:</label><input
            type='number' id='ans_user$i'>";
            echo "<p id='val$i'></p><hr>";
            break;
            }
    }


    function getRandomText() {
        $texts = array(
        "<br>Я вас любил: любовь еще, быть может,
        <br>В душе моей угасла не совсем;
        <br>Но пусть она вас больше не тревожит;
        <br>Я не хочу печалить вас ничем.
        <br>Я вас любил безмолвно, безнадежно,
        <br>То робостью, то ревностью томим;
        <br>Я вас любил так искренно, так нежно,
        <br>Как дай вам Бог любимой быть другим.<br>",

        "<br>Сижу за решеткой в темнице сырой.
        <br>Вскормленный в неволе орел молодой,
        <br>Мой грустный товарищ, махая крылом,
        <br>Кровавую пищу клюет под окном,
        <br>Клюет, и бросает, и смотрит в окно,
        <br>Как будто со мною задумал одно.
        <br>Зовет меня взглядом и криком своим
        <br>И вымолвить хочет: «Давай улетим!
        <br>Мы вольные птицы; пора, брат, пора!
        <br>Туда, где за тучей белеет гора,
        <br>Туда, где синеют морские края,
        <br>Туда, где гуляем лишь ветер… да я!..»<br>",

        "<br>Уж небо осенью дышало,
        <br>Уж реже солнышко блистало,
        <br>Короче становился день,
        <br>Лесов таинственная сень
        <br>С печальным шумом обнажалась,
        <br>Ложился на поля туман,
        <br>Гусей крикливых караван
        <br>Тянулся к югу: приближалась
        <br>Довольно скучная пора;
        <br>Стоял ноябрь уж у двора.<br>",

        "<br>В тот год осенняя погода
        <br>Стояла долго на дворе,
        <br>Зимы ждала, ждала природа.
        <br>Снег выпал только в январе
        <br>На третье в ночь. Проснувшись рано,
        <br>В окно увидела Татьяна
        <br>Поутру побелевший двор,
        <br>Куртины, кровли и забор,
        <br>На стеклах легкие узоры,
        <br>Деревья в зимнем серебре,
        <br>Сорок веселых на дворе
        <br>И мягко устланные горы
        <br>Зимы блистательным ковром.
        <br>Все ярко, все бело кругом.<br>"
        );
    $randomIndex = array_rand($texts); // Получаем случайный индекс из массива

    return $texts[$randomIndex]; // Возвращаем случайный текст
    }

    function randomRussianLetter() {
        $letters = "абвгдеёжзийклмнопрстуфхцчшщъыьэюя";
        $randomIndex = rand(0, mb_strlen($letters, 'utf-8') - 1);
        return mb_substr($letters, $randomIndex, 1, 'utf-8');
    }
    for($i=0;$i<4;$i++){
        switch($_GET['task']){
        case 2:
        $var5 = randomRussianLetter();
        $var6 = getRandomText();
        $count = mb_substr_count($var6, $var5, 'utf-8');
        echo "<p>Напишите количество вхождений символа '$var5' в следующем тексте. В ответ записать число вхождений. <br> $var6</p>";
        echo "<input type='hidden' value='" . mb_substr_count($var6, $var5, 'utf-8') . "' id='ans$i'>";
        echo "<label>Ответ:</label><input type='number' id='ans_user$i'>";
        echo "<p id='val$i'></p><hr>";
        break;
        }
    }
    function letterInPoem($var5, $var6) {
        $randomLetter = strtolower(strval($var5));//Возвращает строковое значение переменной перевод в нижний регистр
        $lettersArray = str_split(mb_strtolower($var6));//Преобразование строки в массив и перевод в нижний регистр
        $count = 0;

        foreach ($lettersArray as $letter) {
            if ($letter === $randomLetter) {
            $count++;
        }
    }

    // echo "Буква '$randomLetter' встречается $count раз в стихе.";
    return $count;
    }
    ?>
    </div>
    </section>


    </main>

    <div class="submit">
    <label for="refreshButton">
    <label onclick="click" for="redirectButton">
    <input type="button" id="btn" onclick="click" value="Отправить"></label>
    </div>
<script>
    let btn = document.getElementById("btn");

    btn.addEventListener("click", () => {
    for (let i = 0; i < 4; i++) {
    let ans = document.getElementById(`ans${i}`).value;
    let ans_user = document.getElementById(`ans_user${i}`).value;
    let val = document.getElementById(`val${i}`);

    val.innerText = `Правильный ответ: ${ans}`;
    if (ans == ans_user)
    val.style.color = "green";
    else
    val.style.color = "red";

    // Заблокировать поле ввода после отправки ответа
    document.getElementById(`ans_user${i}`).disabled = true;
    }
    });
</script>
</body>
</html>