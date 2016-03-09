<?php if(isset($_SESSION)){session_destroy();unset($_SESSION['user']);};?>
<?php session_start(); ?>
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
    $user = parse_ini_file('config/user/admin.ini');
    print_r($user);
    if($user['password'] == filter_input(INPUT_POST, 'password')){
        $_SESSION['user'] = filter_input(INPUT_POST, 'username');
    }
}

?>
    </body>
</html>



