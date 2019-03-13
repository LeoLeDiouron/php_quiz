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
        <p>Please login</p>
        <?php
            session_start();
            if (isset($_GET['error_msg']))
                echo '<p class="error">'.$_GET['error_msg'].'</p>';
            else
                echo '<br>';
            if (isset($_POST['username']) && isset($_POST['password'])) {
                include_once "database.php";
                if ($_POST['username'] != '' && $_POST['password'] != '') {
                    $result_users = get_datas("SELECT username, password, is_admin FROM users WHERE username='".$_POST['username']."'");
                    if ($result_users->num_rows > 0) {
                        $row = $result_users->fetch_assoc();
                        if ($row["password"] == $_POST['password']) {
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['password'] = $_POST['password'];
                            $_SESSION['is_admin'] = $row['is_admin'];
                            if ($_SESSION['is_admin']) {
                                header('Location: dashboard_teacher.php');
                            } else {
                                header('Location: dashboard_student.php');
                            }
                        } else {
                            header('Location: login.php?error_msg=wrong password');
                        }
                    } else {
                        header('Location: login.php?error_msg=wrong username');
                    }
                } else {
                    header('Location: login.php?error_msg=no username or password');
                }
            } else {
                session_destroy();
            }
        ?>
        <form action="login.php" method="POST">
            username : <input type="text" name="username"><br><br>
            password : <input type="password" name="password"><br><br>       
            <input class="button" type="submit" name="button_login" value="Login" >
        </form>
        <p>Not register yet ? Sign up <a href="./signup.php">here</a> </p>
    </body>
</html>