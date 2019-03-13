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
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                header('Location: login.php?error_msg=student part, not allowed for teachers');
            }

            echo '<h2>Welcome '.$_SESSION['username'].'</h2>';
            $result_scores = get_datas("SELECT id_quiz, username, score, date FROM scores WHERE username='".$_SESSION['username']."' ORDER BY id_quiz DESC");
            $scores = [-1, -1, -1, -1, -1];
            if ($result_scores->num_rows > 0) {
                while ($row = $result_scores->fetch_assoc()) {
                    $scores[$row['id_quiz']] = $row['score'];
                }
            }
        ?>
        <table>
            <?php
                $results_quiz = get_datas('SELECT id_quiz from questions ORDER BY id_quiz DESC');
                if ($results_quiz->num_rows > 0) {
                    $row = $results_quiz->fetch_assoc();
                    $nb_quiz = $row['id_quiz'] + 1;
                    for ($idx = 0; $idx < $nb_quiz; $idx++) {
                        echo "<tr>";
                        echo "<td>quiz".strval($idx+1)."</td>";
                        if ($scores[$idx] != -1)
                            $score = $scores[$idx];
                        else
                            $score = "not graded";
                        echo "<td>score : ".strval($score)."</td>";
                        if ($scores[$idx] < 5) {
                            echo "<td><form action=\"quiz/quiz.php\" method=\"POST\">";
                            echo "<input type=\"hidden\" name=\"id_quiz\" value=\"".strval($idx)."\">";
                            echo "<input class=\"button\" type=\"submit\" name=\"button_quiz\" value=\"GO\">";
                            echo "</form></td>";
                        } else {
                            echo "<td><form action=\"\" method=\"POST\">";
                            echo "<input class=\"button_blocked\" type=\"submit\" name=\"button_quiz_1_blocked\" value=\"test\">";
                            echo "</form></td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "no quiz";
                }
            ?>
        </table>

        <form action="login.php" method="POST"> 
            <input class="button" type="submit" name="button_logout" value="Logout" >
        </form>
    </body>
</html>