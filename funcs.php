<?php

function h($a) {
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con() {
    try {
        $pdo = new PDO('mysql:dbname=dbname;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Conection-Error:'.$e->getMessage());
    }
}

function redirect($page) {
    header("Location: ".$page);
    exit;
}

function sqlError($stmt) {
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

function time_options() {
    $html = '';
    $html .= '<option hidden value="--：--">--：--</option>';

    for ($hour = 0; $hour < 24; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 15) {
            $time = sprintf('%02d：%02d', $hour, $minute);
            $html .= '<option value="' . $time . '">' . $time . '</option>';
        }
    }
    return $html;
}

?>