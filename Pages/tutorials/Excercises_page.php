<?php
include "../../connection.php";
?>

<html>
<?php

include '../../Includes/Navigation.php';

?>
<head>
    <title>IntoCode</title>
    <link rel="stylesheet" href="<?=$page_path ?>CSS/Excercises_page_style.css">
</head>
<body>
   
<h1>Lesson name</h1>
<h2>Упражнения:</h2>
<a href="Excercise_template.php"><button class="lesson"> <span class="secondary_text">✔</span> <span class="primary_text">Задача 1</span> <span class="thirdl_text">Лесно</span></button>
<br><a href="Excercise_template.php"><button class="lesson-disabled" disabled> <span class="secondary_text"></span> <span class="primary_text">Задача 2</span> <span class="thirdl_text">Лесно</span></button>
<br><a href="Excercise_template.php"><button class="lesson-disabled" disabled> <span class="secondary_text"></span> <span class="primary_text">Задача 3</span> <span class="thirdm_text">Средно</span></button>
<br><a href="Excercise_template.php"><button class="lesson-disabled" disabled> <span class="secondary_text"></span> <span class="primary_text">Задача 4</span> <span class="thirdm_text">Средно</span></button>

</body>
</html>