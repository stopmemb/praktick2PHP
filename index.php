<?
include('page/head.php');
include('include/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    $flag='true';
    $errors = [
        '<p class="errors">Заполните поля ввода</p>',
        '<p class="errors">Не верный формат почты</p>',
        '<p class="errors">Вы уже зарегистрированы</p>',
        '<p class="errors">Номер телефона должен быть из 11 символов</p>',
        '<p class="errors">Имя должно быть не меньше 6 символов</p>'
    ];
}
?>
<div class="reg">
<h1 class="zagalov">РЕГИСТРАЦИЯ</h1>
    <form action="" class="form" method="POST" name="reg">
    <div class="formss">
        <div class="form_div">
            <label for="name">
                Введите имя*
            </label>
            <input type="text" name="name" placeholder="Имя">
       <? if(isset($_POST['reg'])){
            if(empty($name))
            echo $errors[0];
            $flag = 'false';
            
        } ?>
        <?if(strlen($name) < 6) {
    $_SESSION['errors']['name'];
    echo $errors[4];
        }
        ?>
         </div>


        <div class="form_div">
            <label for="email">
                Введите E-mail*
            </label>
            <input type="text" name="email" placeholder="Email">
       
        <? if (isset($_POST['reg'])){
            if(empty($email)) {
                echo $errors[0];
                $flag = 'false';

            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $_SESSION['errors']['email'];
                echo $errors[1];
            }
        }?>
          </div>

        <div class="form_div">
            <label for="phonenumber">
                Введите номер телефона*
            </label>
            <input type="text" name="phonenumber" placeholder="Пароль">
        <? if(isset($_POST['reg'])){
            if(empty($phone))
            echo $errors[0];
            $flag = 'false';
        } ?>
        <?if(strlen($phone) < 11) {
    $_SESSION['errors']['phonenumber'];
    echo $errors[3];
        }
        ?>
          </div>
  <input class="button" type="submit" value="Зарегистрироваться" name="reg">
    </div>
  </form>
</div>
</body>
</html>