<?php
session_start();
require "class/Database.php";
$db=new Database();


$data=[
    "username"=>'',
    "email"=>'',
    "password"=>'',
    "Cpassword"=>'',
    "nameError"=>'',
    "emailError"=>'',
    "passwordError"=>'',
    "cpError"=>''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data=[
        "username"=>trim($_POST["username"]),
        "email"=>trim($_POST["email"]),
        "password"=>trim($_POST["password"]),
        "Cpassword"=>trim($_POST["confirmPassword"]),
        "nameError"=>'',
        "emailError"=>'',
        "passwordError"=>'',
        "cpError"=>''
    ];

    //! username input error handelling
    $nameValidation = "/^[a-zA-Z\s]*$/";
    if (empty($data['username'])) {
        $data['nameError']="username is required";
    }elseif(strlen($data['username']) < 4) {
        $data['nameError']="username must be at least 4 char";
    }elseif (!preg_match($nameValidation,$data['username'])) {
        $data['nameError']="username contains only words";
    }

      //! email input error handelling
   
    if (empty($data['email'])) {
        $data['emailError']="email is required";
    }   elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['emailError'] = "Please enter the correct format of email";
      }

     //! password input error handelling
     if (empty($data['password'])) {
        $data['passwordError']="password is required";
    }  elseif(strlen($data['password']) < 4) {
        $data['passwordError']="password must be at least 4 char";
    }


     //! confirm password input error handelling
     if (empty($data['Cpassword'])) {
        $data['cpError']="confirm password is required";
    } else {
        if ($data['password'] != $data['Cpassword']) {
            $data['cpError']="password do not match , please try again";
        }
    }

    if (empty($data['nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['cpError']) ) {
        if (!EmailExist($db,$data['email'])) {
         
        $password=sha1($data['password']);
        $db->query("INSERT INTO users(username,email, password) VALUES (:username,:email,:password)");
        $db->bind(':username',$data['username']);
        $db->bind(':email',$data['email']);
        $db->bind(':password',$password);
        if ($db->execute()) {
            $success ="your account is create";

        }else {
            $error="there is an error in db connection";
        }
     
    }else {
       
    }
       
}else {
    $error="this email is already taken";
}
}


function EmailExist($db,$email){
    $db->query("SELECT * FROM users WHERE email=:email");
    $db->bind(":email",$email);
    if ($db->rowCount() > 0) {
        return true;
    }else {
        return false;
    }
}
if (isset($_SESSION["userid"])) {
    header("Location: dashboard");
}else{
    require "views/singup.view.php";
}
