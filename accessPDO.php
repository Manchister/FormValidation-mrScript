<?php

class DbAccess {

    function getPDO() {
        static $pdo;
        if (!isset($pdo)) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE;
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec('set session sql_mode = traditional');
            $pdo->exec('set session innodb_strict_mode = on');
        }
        return $pdo;
    }

    function query($sql, $input_parameters = null, &$insert_id = null) {
        $pdo = $this->getPDO();
        $insert_id = null;

        if (is_null($input_parameters)) {
            $stmnt = $pdo->query($sql);
        } else {
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute($input_parameters);
        }

        if (stripos($sql, 'insert') === 0) {
            $insert_id = $pdo->lastInsertId();
        }

        return $stmnt;
    }

}

