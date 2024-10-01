<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();
// Hàm mã hóa ID
function encodeId($id)
{
    return strtr(base64_encode($id), '+/=', '*&BUYG'); // Thay thế ký tự
}

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = htmlspecialchars($_GET['keyword']); // Mã hóa đầu vào
}

$users = $userModel->getUsers($params);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <?php if (isset($_GET['message'])): ?>
        <?php if ($_GET['message'] == 'delete_success'): ?>
            <div class="alert alert-success" role="alert">
                Người dùng đã được xóa thành công!
            </div>
        <?php elseif ($_GET['message'] == 'permission_denied'): ?>
            <div class="alert alert-danger" role="alert">
                Bạn không có quyền xóa người dùng này!
            </div>
        <?php elseif ($_GET['message'] == 'no_id'): ?>
            <div class="alert alert-warning" role="alert">
                Không có ID để xóa!
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="container">
        <?php if (!empty($users)) { ?>
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?php echo $user['id'] ?></th>
                            <td>
                                <?php echo $user['name'] ?>
                            </td>
                            <td>
                                <?php echo $user['fullname'] ?>
                            </td>
                            <td>
                                <?php echo $user['type'] ?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo encodeId($user['id']); ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo encodeId($user['id']); ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo $user['id']; ?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Xóa"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
        <?php } ?>
    </div>
</body>

</html>