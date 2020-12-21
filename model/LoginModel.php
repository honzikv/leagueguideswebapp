<?php


namespace app\model;


use app\core\BaseModel;
use Exception;

class LoginModel extends BaseModel {

    var string $username;
    var string $password;

    private const USERNAME_LIMIT = 30;
    private const PASSWORD_LIMIT = 255;

    function validate() {

        if (empty($this->username)) {
            throw new Exception('Error, username is empty');
        }

        if (strlen($this->username) > self::USERNAME_LIMIT) {
            throw new Exception('User name is too long (max ' . self::USERNAME_LIMIT . " characters).");
        }

        if (empty($this->password)) {
            throw new Exception('Error, password is empty');
        }

        if (strlen($this->password) > self::PASSWORD_LIMIT) {
            throw new Exception('Password is too long (max ' . self::USERNAME_LIMIT . " characters).");
        }

    }

    function checkPassword(UserModel $userModel) {
        $user = $userModel->getUser($this->username);
        if ($user == false || !password_verify($this->password, $user['password'])) {
            throw new Exception('Error, incorrect username password combination');
        }

    }


}