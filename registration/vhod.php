<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Регистрация</h1>
        <form action="php/avtor.php" method="post">
            <input type="text" class="form_control" name="name" id="name" placeholder="введите имя"><br>
            <input type="email" class="form_control" name="email" id="email" placeholder="введите email"><br>
            <input type="password" class="form_control" name="password" id="password" placeholder="введите пароль"><br>
            <button class="btn" type="submit">войти</button><br><br>
            <a href="index.php" class="pereh" style="background-color: green; font-size:20px;color:white; 
            text-decoration:none;border:2px solid black;border-radius:50px; ">зарегистрироваться</a>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="message">' . $_SESSION['message']  . '</p>';
            }
            unset($_SESSION['message']);
            ?>

        </form>

    </div>

    <script src="" async defer></script>
</body>

</html>
<?php
