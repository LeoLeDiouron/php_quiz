<?php
    function connect_database() {
        $servername = "127.0.0.1:50437"; 
        $username = "azure"; 
        $password = "6#vWHD_$"; 
        $db = "quiz_db";
        $conn = new mysqli($servername, $username, $password, $db); 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        } 
        return $conn;
    }

    function get_datas($sql_query) {
        $conn = connect_database();
        $result = $conn->query($sql_query);
        $conn->close();
        return $result;
    }

    function delete_datas($table, $fields, $values) {
        $conn = connect_database();
        $sql_condition = '';
        for ($idx = 0; $idx < sizeof($fields); $idx++) {
            $sql_condition = $sql_condition.$fields[$idx].'='.$values[$idx].' AND ';
        }
        $sql_query = "DELETE FROM ".$table." WHERE ".substr($sql_condition, 0, strlen($sql_condition)-5).";";
        $conn->query($sql_query);
        $conn->close();
    }

    function insert_datas($table, $fields, $values) {
        $conn = connect_database();
        $values_str = '';
        for ($idx = 0; $idx < sizeof($fields); $idx++) {
            if (gettype($values[$idx]) != "boolean") {
                $values_str = $values_str.$values[$idx].',';
            } else {
                if ($values[$idx] == false) {
                    $values_str = $values_str.'false,';
                } else {
                    $values_str = $values_str.'true,';
                }
            }
        }
        $sql_query = "INSERT INTO ".$table." (".implode(',',$fields).") VALUES (".substr($values_str, 0, strlen($values_str)-1).");";
        $conn->query($sql_query);
        $conn->close();
    }

    function update_datas($table, $fields_where, $values_where, $fields, $values) {
        $conn = connect_database();
        $sql_set = '';
        for ($idx = 0; $idx < sizeof($fields); $idx++) {
            $sql_set = $sql_set.$fields[$idx].'='.$values[$idx].',';
        }
        $sql_condition = '';
        for ($idx = 0; $idx < sizeof($fields_where); $idx++) {
            $sql_condition = $sql_condition.$fields_where[$idx].'='.$values_where[$idx].' AND ';
        }
        $sql_query = "UPDATE ".$table." SET ".substr($sql_set, 0, strlen($sql_set)-1)." WHERE ".substr($sql_condition, 0, strlen($sql_condition)-5);
        $conn->query($sql_query);
        $conn->close();
    }

    function check_datas_exist($table, $fields, $values) {
        $conn = connect_database();
        $sql_condition = '';
        for ($idx = 0; $idx < sizeof($fields); $idx++) {
            $sql_condition = $sql_condition.$fields[$idx].'='.$values[$idx].' AND ';
        }
        $sql_query = "SELECT * FROM ".$table." WHERE ".substr($sql_condition, 0, strlen($sql_condition)-5);
        $results = $conn->query($sql_query);
        if ($results->num_rows > 0)
            return true;
        return false;
    }

?>