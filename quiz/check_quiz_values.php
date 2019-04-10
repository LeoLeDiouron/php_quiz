<?php
    function check_quiz_values() {
        for($idx_question = 0; $idx_question < 10; $idx_question++) {
            if (isset($_POST["question_".strval($idx_question)]) == false || $_POST["question_".strval($idx_question)] == "")
                return false;
            for($idx_answer = 0; $idx_answer < 4; $idx_answer++) {
                if (isset($_POST["answer_".strval($idx_question)."_".strval($idx_answer)]) == false || $_POST["answer_".strval($idx_question)."_".strval($idx_answer)] == "")
                    return false;
            }
            if (isset($_POST["good_answer_".strval($idx_question)]) == false || $_POST["good_answer_".strval($idx_question)] == "")
                return false;
            }
        return true;
    }
?>