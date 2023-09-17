<?php
require "../class/Database.php";
require "../functions/function.php";
$db=new Database();

$data=[
    "email"=>'',
    "password"=>'',
    "emailError"=>'',
    "passwordError"=>'',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data=[
        "email"=>trim($_POST["email"]),
        "password"=>trim($_POST["password"]),
        "emailError"=>'',
        "passwordError"=>'',
    ];

    

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


    

    if ( empty($data['emailError']) && empty($data['passwordError'])  ) {
        $password=sha1($data['password']);
        $db->query("SELECT * FROM users WHERE email=:email AND password =:password");
        $db->bind(':email',$data['email']);
        $db->bind(':password',$password);
       $row=$db->single();
       if ($db->rowCount()>0) {
            $success="you logged in";
            userSession($row);
            header("Location: ../dashboard");
       }else {
        $error="username not exists or password is wrong";
    }
    }
   
} 

if (isset($_SESSION["userid"])) {
    header("Location: ../dashboard");
}else{
    require "../views/login.view.php";
}
