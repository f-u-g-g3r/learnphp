<?php

namespace App\Models;

use App\DB;

class Model {
    static $table;
    public $id;
    public static function all()
    {
        $db = new DB();
        return $db->all(static::$table, static::class);
    }

    public function save() {
        $fields = get_object_vars($this);
        $db = new DB();
        if ($fields['id'] === NULL) {
            $db->insert(static::$table, $fields);
        } else {
            $db->update(static::$table, $fields);
        }
    }

    public static function find($id) {
        $db = new DB();
        return $db->find(static::$table, static::class, $id);
    }
    public static function where($fieldName, $fieldValue) {
        $db = new DB();
        return $db->where(static::$table, static::class, $fieldName, $fieldValue);
    }

    public function delete() {
        $db = new DB();
        return $db->delete(static::$table, $this->id);
    }


}