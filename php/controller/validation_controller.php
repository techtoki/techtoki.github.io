
<?php
    include_once("../managers/user_manager.php");
    session_start();

    if(isset($_POST)){
        switch($_POST['mode']){
            case "register":
                $data['email'] = $_POST['email'];
                $data['password'] = $_POST['password'];
                $data['firstname'] = $_POST['firstname'];
                $data['lastname'] = $_POST['lastname'];
                $data['address'] = $_POST['address'];
                $data['phone'] = $_POST['phone'];
                $data['status'] = User::insertUser(new User($data['password'],$data['email'],$data['firstname'],$data['lastname'],$data['address'],$data['phone']));
                echo json_encode($data);
                break;
            case "login":
                $data['email'] = $_POST['email'];
                $data['password'] = $_POST['password'];
                $data['data'] = User::getUsersWhere(['email_address','password'],[$data['email'], $data['password']]);
                setcookie('user',json_encode($data['data'][0]),time() + (86400 * 30),"/");
                $_SESSION["user"] = json_encode($data['data'][0]);
                echo json_encode($data['data'][0]);
                break;
            case "update":
                $data['id'] = $_POST['id'];
                $data['email'] = $_POST['email'];
                $data['password'] = $_POST['password'];
                $data['firstname'] = $_POST['firstname'];
                $data['lastname'] = $_POST['lastname'];
                $data['address'] = $_POST['address'];
                $data['phone'] = $_POST['phone'];
                $data['status'] = User::updateUser(['password','email_address','firstname','lastname','billing_address','phone'],
                [$data['password'],$data['email'],$data['firstname'],$data['lastname'],$data['address'],$data['phone']],['id'],[$data['id']]);
                // 
                echo json_encode($data);
        }
        exit;
    }
?>