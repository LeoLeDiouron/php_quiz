<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <h1>
            QUIZ
        </h1>
        <p>Register</p>
        <form action="signup.php" method="POST">
            username : <input type="text" name="username"><br><br>
            password : <input type="password" name="password"><br><br>       
            <input class="button" type="submit" name="button_login" value="Sign up" >
        </form>
        <?php
            if ((isset($_POST['username']) && $_POST['username'] != '') &&
                (isset($_POST['password']) && $_POST['password'] != '')) {
                include_once "database.php";
                $result = get_datas("SELECT id FROM users WHERE username='".$_POST['username']."'");

                if ($result->num_rows == 0) {
                    insert_datas('users', ['username', 'password', 'is_admin'], ["'".$_POST['username']."'", "'".$_POST['password']."'", false]);
                    header('Location: login.php');
                } else {
                    echo "<p class=\"error\">This username already exists</p>";
                }
                
            }
        ?>
    </body>
</html>