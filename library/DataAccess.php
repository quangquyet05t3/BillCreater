<?php

class DataAccess
{
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "bill_creater";
    public function connect() {
        $dbHost = self::DB_HOST;
        $dbUser = self::DB_USER;
        $dbPass = self::DB_PASS;
        $dbName = self::DB_NAME;
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public function query($sql, $id) {
        try {
            $db = $this->connect();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $db = null;
            return $result;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function multiQuery($listQuery) {
        $result = false;
        try {
            $db = $this->connect();
            $db->beginTransaction();
            foreach($listQuery as $sql) {
                $db->exec($sql);
            }
            $db->commit();
            $result = true;
        } catch(PDOException $e) {
            $db->rollBack();
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
        $db = null;
        return $result;
    }
}
?>