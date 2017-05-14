<?php

try {
    require $_SERVER["DOCUMENT_ROOT"] . '/library/User.php';
    $activeCode = $_POST['active-code'];
    $user = new User();
    $exist = $user->getUser($activeCode);
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