<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/library/DataAccess.php";

class User
{
    const COOKIE_USER_ID = 'user_id';
    const COOKIE_USER_NAME = 'user_name';

    public $user_id;
    public $user_name;
    public $pass_word;
    public $active_code;
    public $due_date;
    public $status;
    public $dal;

    function __construct() {
        $this->dal = new DataAccess();
    }

    public function getAllUser($id) {
        $sql = "SELECT * FROM bill_creater_user WHERE user_id = :id ORDER BY user_id";
        $ret = $this->dal->query($sql, $id);

        return $ret;
    }

    /**
     * @param $activeCode
     * @return User
     * @throws Exception
     */
    public function getUser($activeCode) {
        try {
            $sql = "SELECT * FROM bill_creater_user WHERE active_code = :active_code ORDER BY user_id LIMIT 1";
            $db = $this->dal->connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("active_code", $activeCode);
            $stmt->execute();
            $result = $stmt->fetchObject("User");
            $db = null;
            if(!$result)
                throw new Exception("Mã xác nhận không chính xác");
            return $result;
        }catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>