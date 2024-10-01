<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
// Hàm mã hóa ID
function encodeId($id)
{
    return strtr(base64_encode($id), '+/=', '*&BUYG');
}

// Hàm giải mã ID
function decodeId($encodedId)
{
    $encodedId = strtr($encodedId, '*&BUYG', '+/='); 
    return (int) base64_decode($encodedId); 
}

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = decodeId($_GET['id']);
    $user = $userModel->findUserById($_id);//Update existing user
}

if (!empty($_POST['submit'])) {
    // Kiểm tra tên
    if (empty($_POST['name']) || !preg_match('/^[A-Za-z0-9]{5,15}$/', $_POST['name'])) {
        $errors[] = "Tên là bắt buộc và phải có độ dài từ 5 đến 15 ký tự, chỉ chứa chữ cái và chữ số.";
    }

    // Kiểm tra mật khẩu
    if (empty($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/', $_POST['password'])) {
        $errors[] = "Mật khẩu là bắt buộc và phải có độ dài từ 5 đến 10 ký tự, bao gồm ít nhất một chữ thường, một chữ hoa, một số và một ký tự đặc biệt.";
    }


    if (empty($errors)) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        exit; 
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <?php
            // Hiển thị thông báo lỗi nếu có
            if (!empty($errors)) {
                echo '<div class="alert alert-danger" role="alert">' . implode('<br>', $errors) . '</div>';
            }
            ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars(encodeId($_id)); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name']))
                        echo htmlspecialchars($user[0]['name']); ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>