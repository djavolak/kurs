<?php

    /**
     * @param $params
     *
     * @return PDO
     */
    function connectToDatabase($params) {
        $dsn = sprintf('mysql:dbname=%s;host=%s', $params['name'], $params['hostname']);

        try {
            $pdo = new PDO($dsn, $params['user'], $params['pass']);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            var_dump($e->getCode());
            var_dump($e->getTrace());
            die();
        }

        return $pdo;
    }

    function getUser(Pdo $dbConnection, $userId) {
        $userId = addslashes($userId);
        $sql = "SELECT * FROM user WHERE userId = ? {$userId}";

        return $dbConnection->query($sql)->fetchAll(\Pdo::FETCH_ASSOC);
    }

    function getUsers(Pdo $dbConnection) {
        $sql = "SELECT * FROM user";

        return $dbConnection->query($sql)->fetchAll(\Pdo::FETCH_ASSOC);
    }

    function saveUserToDb(Pdo $dbConnection, $params) {
        $sql = "INSERT INTO user VALUES(NULL , '{$params['fullname']}', '{$params['gender']}', '{$params['email']}', '{$params['birthdate']}', NOW())";

        return $dbConnection->exec($sql);
    }

?>