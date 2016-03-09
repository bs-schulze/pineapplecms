<?php session_start(); ?>
<?php
require_once './system/functions.php';
securePasswords();
?>
<html>
    
    <title>Login</title>
    <body>
        <?php if(isset($_SESSION['user'])) {echo $_SESSION['user'];}  ?>
        <form method="post">
            User: <input type="text" name="username"><br>
            Passwort: <input type="password" name="password"><br>
            <input type="submit">
            
        </form>
        <?php
if(file_exists('config/user/'.filter_input(INPUT_POST, 'username').'.ini')){
    $user = parse_ini_file('config/user/'.filter_input(INPUT_POST, 'username').'.ini');
    if(password_verify(filter_input(INPUT_POST, 'password'), $user['password'])){
        $_SESSION['user'] = filter_input(INPUT_POST, 'username');
    }
}

?>
    </body>
</html>



