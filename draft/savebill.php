<?php
require $_SERVER["DOCUMENT_ROOT"] . '/library/User.php';
require $_SERVER["DOCUMENT_ROOT"] . '/library/Bill.php';
if(!isset($_COOKIE[User::COOKIE_USER_ID])) {
    echo '<script>window.location.href = "../active";</script>';
} else {
    try {


        $customerName = $_POST['customer-name'];
        $numRow = $_POST['num-row'];
        $userId = $_COOKIE[User::COOKIE_USER_ID];

        $bill = new Bill();
        $id = $bill->saveBill($customerName, $numRow, $_COOKIE[User::COOKIE_USER_ID]);
        $result = [
            'success' => true,
            'Id' => $id,
            'message' => "Lưu thành công"
        ];

    } catch (Exception $ex) {
            $result = [
                'success' => false,
                'message' => $ex->getMessage()
            ];
    }
    echo json_encode($result);
}




?>