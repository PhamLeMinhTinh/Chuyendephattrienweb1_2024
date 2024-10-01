<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

session_start(); // Bắt đầu phiên
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Giả sử ID của người dùng đang đăng nhập được lưu trong session
$currentUserId = $_SESSION['user_id']; 

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']); 

    // Kiểm tra xem ID có hợp lệ và có phải là người dùng đang đăng nhập không
    if (is_numeric($id) && $id == $currentUserId) {
        $userModel->deleteUserById($id); 
        header('Location: list_users.php?message=delete_success'); 
        exit();
    } else {
        header('Location: list_users.php?message=permission_denied'); 
    }
} else {
    header('Location: list_users.php?message=no_id'); 
    exit();
}
?>