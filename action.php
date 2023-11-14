<?php
$connection = mysqli_connect('localhost', 'root', '', 'post');


// Получение данных из формы
$title = $_POST['title'];
$content = $_POST['content'];
$currentDate = date('Y-m-d'); // формат даты: год-месяц-день

// Добавление данных в базу данных
mysqli_query($connection, "INSERT INTO `post` (`title`, `content`, `date`) VALUES ('$title', '$content', '$currentDate');");

// Отправка данных обратно на клиентскую сторону
$response = array('title' => $title, 'content' => $content);
echo json_encode($response);

// Закрытие подключения к базе данных
mysqli_close($connection);
?>
