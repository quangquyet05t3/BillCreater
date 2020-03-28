<?php
require $_SERVER["DOCUMENT_ROOT"] . '/library/Bill.php';
try {
    $json    =  file_get_contents('php://input');
    $obj     =  json_decode($json);


    $id = $obj->id;
    $customerName = $obj->customerName;
    $allData = $obj->allData;
    $total = $obj->total;


    $bill = new Bill();
    $bill->saveBill($id, $customerName, $allData, $total);
    $result = [
        'success' => true,
        'message' => "Xác nhận thành công"
    ];
    if($exist) {
        setcookie(User::COOKIE_USER_ID, $exist->user_id, strtotime( '+30 days' ), "/");
    }

} catch (Exception $ex) {
    $result = [
        'success' => false,
        'message' => $ex->getMessage()
    ];
}
echo json_encode($result);

?>