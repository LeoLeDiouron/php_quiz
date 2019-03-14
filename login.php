<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <!-- <link rel="stylesheet" type="text/css" href="style/style.css"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body>
<!-- d -->

        <!-- Always shows a header, even in smaller screens. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Quiz</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <!-- <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="">Logout</a>
            </nav> -->
            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--5-col mdl-cell--0-col-phone"></div>
                    <div class="mdl-cell mdl-cell--2-col mdl-cell--12-col-phone">

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
                    
                    </div>
                </div>
            </div>
        </main>
        </div>


<!-- d -->
    </body>
</html>