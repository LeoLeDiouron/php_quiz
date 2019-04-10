<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Quiz</span>
            </div>
        </header>
        <?php
            if (isset($_POST['password_signup']) && !isset($_GET['error_msg'])) {
                $created_username=$_POST['username_signup'];
                $created_password=$_POST['password_signup'];
            }
        ?>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--0-col-phone"></div>
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-phone">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar">
                                <a href="#tab1-panel" class="mdl-tabs__tab <?php echo (isset($created_username) ? '' : 'is-active');?>">Login</a>
                                <a href="#tab2-panel" class="mdl-tabs__tab <?php echo (isset($created_username) ? 'is-active' : '');?>">Sign Up</a>
                            </div>

                            <div class="mdl-tabs__panel <?php echo (isset($created_username) ? '' : 'is-active');?>" id="tab1-panel">
                                <form action="login.php" method="POST">
                                    <p class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" id="username" name="username" value="<?php echo (isset($created_username) ? $created_username : '') ?>" required>
                                        <label class="mdl-textfield__label" for="username">Username</label>
                                    </p>
                                    <br>
                                    <p class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="password" id="password" name="password" value="<?php echo (isset($created_password) ? $created_password : '') ?>" required>
                                        <label class="mdl-textfield__label" for="password">Password</label>
                                    </p>
                                    <br>
                                    <button type="submit" name="button_login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"> Login </button>
                                </form>
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
                            </div>

                            <div class="mdl-tabs__panel <?php echo (isset($created_username) ? 'is-active' : '');?>" id="tab2-panel">
                                <form action="login.php" method="POST">
                                    <p class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" id="username_signup" name="username_signup" required>
                                        <label class="mdl-textfield__label" for="username_signup">Username</label>
                                    </p>
                                    <br>
                                    <p class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="password" id="password_signup" name="password_signup" required>
                                        <label class="mdl-textfield__label" for="password_signup">Password</label>
                                    </p>
                                    <br>
                                    <button type="submit" name="button_login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"> Sign up </button>
                                </form>
                                <?php
                                    if ((isset($_POST['username_signup']) && $_POST['username_signup'] != '') &&
                                        (isset($_POST['password_signup']) && $_POST['password_signup'] != '')) {
                                        
                                    
                                            include_once "database.php";
                                            $result = get_datas("SELECT id FROM users WHERE username='".$_POST['username_signup']."'");
    
                                            if ($result->num_rows == 0) {
                                                insert_datas('users', ['username', 'password', 'is_admin'], ["'".$_POST['username_signup']."'", "'".$_POST['password_signup']."'", false]);
                                                header('Location: login.php');
                                            } else {
                                                echo "<p class=\"error\">This username already exists</p>";
                                            }    
                                        
                                        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>