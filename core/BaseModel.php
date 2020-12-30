<?php


namespace app\core;


abstract class BaseModel {

    const CHARACTERS_NUMBERS_REGEX = '/\b[a-zA-Z0-9]+\b/';
    const CHARACTERS_FILE_REGEX = '/\b[a-zA-Z0-9.\-_\[\]\(\)]+.pdf\b/';

    function loadData($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract function validate();

    function prepare($statement) {
        return Application::getInstance()->getDatabase()->prepare($statement);
    }

    protected function existsInDatabase($table, $column, $value): bool {
        $statement = "SELECT 1 FROM $table WHERE $column = ?";
        $query = $this->prepare($statement);
        $query->execute([$value]);
        $result = $query->fetchAll();
        return count($result) > 0;
    }

}