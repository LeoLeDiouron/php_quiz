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
        <?php
            include_once "database.php";
            session_start();

            if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                header('Location: login.php?error_msg=no username or password');
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                header('Location: login.php?error_msg=teacher part, not allowed for students');
            }

            if (isset($_POST['id_quiz_del']) && isset($_POST['username_del'])) {
                delete_datas('scores', ['id_quiz', 'username'], [$_POST['id_quiz_del'], "'".$_POST['username_del']."'"]);
            }

            echo '<h2>Welcome '.$_SESSION['username'].'</h2>';
        ?>
        <form action="dashboard_teacher.php" method="POST">
            search a specific student (leave it blank to get all results) : <input type="text" name="student">
            <input class="button" type="submit" name="button_search" value="search" >
        </form>
        <table>
            <?php
                $query = "SELECT id_quiz, username, score, date FROM scores ORDER BY date DESC";
                if (isset($_POST['student']) && $_POST['student'] != "")
                    $query = "SELECT id_quiz, username, score, date FROM scores WHERE username='".$_POST['student']."' ORDER BY date DESC";
                $result_scores = get_datas($query);
                if ($result_scores->num_rows > 0) {
                    echo "<tr><td>username</td><td>quiz</td><td>score</td><td>date</td></tr>";
                    while ($row = $result_scores->fetch_assoc()) {
                        echo "<tr>";
                        // username
                        echo "<td>".$row['username']."</td>";
                        // id quiz
                        echo "<td>".strval($row['id_quiz'] + 1)."</td>";
                        // score
                        echo "<td>".strval($row['score'])."</td>";
                        // date
                        echo "<td>".strval($row['date'])."</td>";
                        // button to delete the score
                        echo "<td><form action=\"dashboard_teacher.php\" method=\"POST\">";
                        if (isset($_POST['student']) && $_POST['student'] != "")
                            echo "<input type=\"hidden\" name=\"student\" value=\"".$_POST['student']."\">";
                        echo "<input type=\"hidden\" name=\"id_quiz_del\" value=\"".strval($row['id_quiz'])."\">";
                        echo "<input type=\"hidden\" name=\"username_del\" value=\"".strval($row['username'])."\">";
                        echo "<input class=\"button_delete\" type=\"submit\" name=\"button_delete\" value=\"X\">";
                        echo "</form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "no scores";
                }
            ?>
        </table>

        <form action="quiz/dashboard_add_quiz.php" method="POST"> 
            <input class="button" type="submit" name="button_create" value="Create a new quiz" >
        </form>

        <form action="login.php" method="POST"> 
            <input class="button" type="submit" name="button_logout" value="Logout" >
        </form>
    </body>
</html>