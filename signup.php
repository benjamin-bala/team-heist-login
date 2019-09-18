<?php
date_default_timezone_set('Africa/Lagos');

// start session
session_start();
// if logged in already, redirect
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $msg = "You are already logged in";
    header("location:welcome.php?message=$msg");
}

//this is the basic User sign up
if (isset($_POST["submit"])) {
    if (file_exists('users.json')) {
        $current_data = file_get_contents('users.json');
        $array_data = json_decode($current_data, true);

        // validation
        $fullname = trim($_POST["fullname"]);
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $password = trim($_POST["password"]);
        $cpassword = (trim($_POST["Cpassword"]));

        // check that all field are valid
        if (strlen($fullname) < 1 || strlen($username) < 1 || strlen($email) < 1 || strlen($phone) < 1 || strlen($password) < 1 || strlen($cpassword) < 1) {
            $msg = "Fill all required fields";
            header("location:signup.php?message=$msg");
        }

        // check if email && username doesn't exist
        $emails = array_column($array_data, "email");
        $usernames = array_column($array_data, "username");
        if (in_array($email, $emails)) {
            $msg = "User with this email exists";
            header("location:signup.php?message=$msg");
        }
        if (in_array($username, $usernames)) {
            $msg = "Username has been choosen";
            header("location:signup.php?message=$msg");
        }

        // check if password match
        if ($password != $cpassword) {
            $msg = "Password don't match";
            header("location:signup.php?message=$msg");
        }

        // then store
        $extra = array(
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => md5($password),
            'created_at' => date("Y-m-d h:i:s a", time()),
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        $final_data .= "\n";
        if (file_put_contents('users.json', $final_data)) {
            $msg = "Signup Successful";
            header("location:login.php?message=$msg");
        }
    } else {
        $msg = 'Error loading database';
        header("location:signup.php?message=$msg");
    }
}

?>
<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Signup with the official team heist of the HNGi6 Group.">
    <title>Sign up | Team Heist</title>
    <meta name="author" content="Abdullah Oladipo(@lapalace), Benjamin Bala (@Benjee), Kenchi, Kadijat Okeowo, Tuns and other Team Heist contributors">
    <meta name="generator" content="Team_Heist_Login v6.1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    </head>
  <body>
    <?php if (isset($_GET['message'])): ?>
        <script>alert("<?=$_GET['message']?>");</script>
    <?php endif;?>
      <!--check back later-->
    <!-- Begin page content -->
    <div class="container-fluid">
        <div class="row"> <!--using grid for the image aside and form-->
            <div class="col-8 image-container"> <!--illustration-->
                <img src="https://res.cloudinary.com/dcoqt2wpo/image/upload/q_10/v1568587134/Group_22_reybvb.png" alt="student illustration" class="imgHeist">
            </div>
            <div class="col animated bounceInDown contain"> <!--form-->
                <div class="form-content">
                    <div class="heist-logo animated pulse delay-1s infinite">
                            <img src="https://res.cloudinary.com/benjee/image/upload/v1568672308/Heist_nhkhoh.png" alt="heist logo" width="100" height="100">
                        </div>
                        <div class="form-header">
                            <h1>Create Account</h1>
                            <p >Kindly create your account by filling the form below</p>
                        </div>
                        <div class="heist-form">
                            <form action="signup.php" method="POST" name="form">
                                <input type="text" class="form-control" name="fullname" id="name" placeholder="Full Name"required aria-required="true">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required aria-required="true">
                                <input type="email" name="email" id="email" class="form-control" id="email" placeholder="Email Address" required aria-required="true">
                                <input type="text" name="phone" class="form-control" id="mobile" placeholder="Mobile Number" required aria-required="true">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                <input type="password" name="Cpassword" id="Cpassword" class="form-control" placeholder="Confirm password">
                                <button type="submit" name="submit" id="submit" class="btn btn-outline-secondary btn-md buttonOption">Sign up</button>
                            </form>
                        </div>
                        <div class="form-footer">
                            <p>Already a member?. <a href="login.php" class="loginHeist">Login</a></p>
                            <!-- <div class="line"><hr class="left"><span class="text-muted" > or</span><hr class="right"></div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-secondary btn-md buttonOption">Sign Up with Google</button>
                                <button type="button" class="btn btn-outline-secondary btn-md buttonOption">Sign Up with Facebook</button>
                                <button type="button" class="btn btn-outline-secondary btn-md buttonOption py-1">
                                    <span>
                                      <img src="https://res.cloudinary.com/dcoqt2wpo/image/upload/v1568667394/WhatsApp_Image_2019-09-16_at_21.50.29_wmmg1d.jpg"
                                      alt="Alternate_Signup" width="25" class="img-fluid py-0">
                                    </span>
                                      Sign in with Google
                            </button>
                            </div>
                        </div> -->
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/validationscript.js"></script>
</body>
</html>
