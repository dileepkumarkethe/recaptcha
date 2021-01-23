<?php
session_start();

define('USE_V124', false);
define('USE_MYSQL', false);
if(defined('USE_MYSQL') && USE_MYSQL === true) {
    require_once "sitedb.php";
} else { 
    require_once "site.php";
}

if(!defined('USE_V124') || USE_V124 === false) {
    require_once "recaptchalib.php";
} else {
    require_once "./ReCaptcha/ReCaptcha.php";
}


$resp = null;

$error = null;
if(!defined('USE_V124') || USE_V124 === false) {
    $reCaptcha = new ReCaptcha(SITE_SECRET);
} else {
    $reCaptcha = new \ReCaptcha\ReCaptcha(SITE_SECRET);
}

if (isset($_POST['g-recaptcha-response'])) {
    if(!defined('USE_V124') || USE_V124 === false) {
        $resp = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    } else {
        $resp = $reCaptcha->verify(
            $_POST["g-recaptcha-response"],
            $_SERVER["REMOTE_ADDR"]
        );
    }
}

?>
<!DOCTYPE html>
<html lang="<?php echo SITE_LANG;?>">
<meta charset="<?php echo SITE_CHARSET;?>">
<head>
    <title><?php echo PAGE_TITLE;?></title>
    <style>
        body {
            background:#6f1212;
            color:#aaaaaa;
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            font-weight:normal;
            margin:0px;
            padding:0px;
            overflow:hidden;
        }

        h1 {
            font-family:"Courier New", Courier, monospace;
            font-weight:bold;
            color:white;
        }

        .text-center {
            text-align: center;
        }

        .block-centered {
            display: inline-block;
        }
        input{
            width: 57rem;
    height: 2rem;
        }
        button{
            width: 9rem;
    height: 2rem;
        }
    </style>
</head>
<body>
<?php
$success = false;

if($resp != null) {
    if(!defined('USE_V124') || USE_V124 === false) {
        $success = $resp->success;
    } else {
        $success = $resp->isSuccess();
    }
}

if ($success == true) {
    $_SESSION['userName']=$_POST['userName'];
    $_SESSION['Name']=$_POST['Name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['site_id']=SITE_ID;

    session_write_close();


    echo "
        <script>
            location.replace('".SITE_APPL."');
        </script>
    ";
} else {
 
?>
    <div class="text-center">
        
<h1>REGISTRATION FORM</h1>
        <form action="" method="post">
            <br/>
            <br/>
            <input id="userName" name="userName" placeholder="Please enter first name" required></input>
            <br/>
            <br/>
            <br/>
            <input id="Name" name="Name" placeholder="Please enter last name" required></input>
            <br/>
            <br/>
            <br/>
            <input id="email" name="email" placeholder="Please enter mail id" required></input>
            <br/>
            <br/>
            <br/>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> <br/>
            <br/>
            <br/>
            <br/>
            <div class="g-recaptcha block-centered" data-sitekey="<?php echo SITE_KEY;?>" data-theme="<?php echo RECAPTCHA_THEME;?>"></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo SITE_LANG;?>"></script>
            <br/>
            <br/>
            <br/>
            <button id="enterSite" type="submit"><?php echo FORM_SUBMIT;?></button>
        </form>
    </div>
<?php } ?>
</body>
</html>
