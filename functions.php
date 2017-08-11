<?php
	//logOut();
	//populateStorage();
	//die();

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

    function getUsersFromDb(Pdo $dbConnection) {
        $sql = "SELECT * FROM user";

        return $dbConnection->query($sql)->fetchAll();
    }

    function getUserFromDb(Pdo $dbConnection, $userId) {
        $sql = "SELECT * FROM user WHERE userId = {$userId}";

        return $dbConnection->query($sql)->fetch();
    }

	function getUsersFromFile() {
		return json_decode(file_get_contents('storage.json'));
	}

    function getUserFromFile($userId) {
        foreach (getUsersFromFile() as $user) {
            if ($user->userId === $userId) {
                return $user;
            }
        }

        throw new \Exception('korisnik nije pronadjen.');
    }

	function saveUserToFile($params) {
		$users = getUsersFromFile();
		if (!$users) {
            $users = array();
        }

		$user = new StdClass();
		$user->userId = count($users);
		$user->fullname = $params['fullname'];
		$user->email = $params['email'];
		$user->birthdate = $params['birthdate'];
		$user->gender = $params['gender'];
        $users[] = $user;

		return file_put_contents('storage.json', json_encode($users));
	}

    function saveUserToDb(Pdo $dbConnection, $params){
        $sql = "INSERT INTO user VALUES (NULL ,'{$params['fullname']}', '{$params['gender']}', '{$params['email']}', '{$params['birthdate']}', NOW())";

        if (!$dbConnection->exec($sql)) {
            throw new \Exception($dbConnection->errorInfo()[2]);
        }

        return  true;
    }


?>