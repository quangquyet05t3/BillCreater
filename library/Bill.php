<?php
/**
 * Created by PhpStorm.
 * User: van
 * Date: 5/21/2017
 * Time: 1:04 PM
 */

class Bill {

    public $dal;

    function __construct() {
        $this->dal = new DataAccess();
    }

    public function saveBill($customerName, $numRow, $userId) {
        try {
            $sql = "INSERT INTO bill_creater_bill (user_id, customer_name, bill_name, number_row) values (:user_id, :customer_name, :bill_name, :number_row)";
            $db = $this->dal->connect();
            $stmt = $db->prepare($sql);
            $params = array(
                ':user_id' => $userId,
                ':customer_name' => $customerName,
                ':bill_name' => $customerName,
                ':number_row' => $numRow
            );
            $stmt->execute($params);
            $result = $db->lastInsertId();
            $db = null;
            if(!$result)
                throw new Exception("Lỗi");
            return $result;
        }catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
} 