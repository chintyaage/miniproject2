<?php
session_start();

require_once('php/createDB.php');
require_once('./php/component.php');

$dbase = new CreateDB("Product", "tbl_user");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM `tbl_user` WHERE `email`='$email'";
    $checkEmailResult = mysqli_query($dbase->con, $checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        echo "<div class=\"alert alert-warning alert-dismissible w-25 pb-0 position-absolute z-3 m-5 start-0\" role=\"alert\">
                <p>Akun email sudah terdaftar!</p>
                <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
    } else {
        if (empty($name) || empty($email) || empty($password) || empty($alamat)) {
                echo "<script>alert('Please Fill Name, Email, Password, and Address');</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else{
                
                $sql = "INSERT INTO `tbl_user`(`name`, `email`, `password`, `alamat`, `user_type`) VALUES ('$name','$email','$password', '$alamat', '2')";
                $result = mysqli_query($dbase->con, $sql);

                if($result){
                    echo "<div class=\"alert alert-success alert-dismissible w-25 pb-0 position-absolute z-3 m-5 start-0\" role=\"alert\">
                            <p>Registrasi berhasil!</p>
                            <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                        </div>";
                } else {
                    die(mysqli_error($dbase->con));
                }
            }   
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Please Fill email and Password');</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $dbase->con->prepare("SELECT * FROM `tbl_user` WHERE `email`=? AND `password`=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['prod_id'];
            header('location:shop.php');
        } else {
            echo "<script>alert('Invalid email or password');</script>";
            header('location:index.php');
        }
    }
}


if (isset($_POST['login_admin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please Fill Username and Password');</script>";
        echo "<script>window.location = 'index.php'</script>";
    } else{
    // Corrected the query execution
    $sql = "SELECT * FROM tbl_user WHERE name = '$username' AND password = '$password' AND user_type = '1'";
    $result = $dbase->con->query($sql);

    $data = mysqli_query($dbase->con, "select * from `tbl_user` where name = '$username'");
    $fetchdata = mysqli_fetch_assoc($data);
    
    $sql = "SELECT user_id FROM tbl_user WHERE name = '$username'";
    $result = $dbase->con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row["user_id"];

        // simpan member_id ke dalam session variable
        $_SESSION['user_id'] = $user_id;
    } else {
        echo "Login gagal.";
        header("Location: index.php");
    }

    if($result->num_rows > 0){ 
        $_SESSION['username'] = $username; 
        header("Location: store.php");
    }
    else{
        echo "Login gagal.";
        header("Location: index.php"); 
    }
}
    $dbase->con->close();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center position-relative z-0">
        <img src="img/background2.png" alt="" width="100%">

        <div class="container position-absolute" id="signup" style="display:none;">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-7 col-lg-5">
            <div class="form-container p-5">
                <form action="index.php" method="post">
                    <h1 class="text-center fw-bold mb-4">Sign Up</h1>
                <!-- Name input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example1c"><i class="bi bi-person-circle"></i> Name</label>
                        <input type="text" id="form3Example1c" class="form-control form-control-lg py-1" name="name" autocomplete="off" placeholder="Type your name"/>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example3c"><i class="bi bi-envelope-at-fill"></i> Email</label>
                        <input type="email" id="form3Example3c" class="form-control form-control-lg py-1" name="email" autocomplete="off" placeholder="Type your email"/>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                        <input type="password" id="form3Example4c" class="form-control form-control-lg py-1" name="password" autocomplete="off" placeholder="Type your password"/>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4c"><i class="bi bi-chat-left-dots-fill"></i> Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" autocomplete="off" placeholder="Type your address"></textarea>
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" value="Register" name="register" class="btn btn-primary btn-lg text-light my-2 py-2"/>
                    </div>
                </form>
                <p class="text-center">I have already an account <button class="text-warning p-0" id="signinBtn">Login</button>.</p>
            </div>
            </div>
        </div>
        </div>

        <div class="container position-absolute" id="signin">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 col-lg-5">
            <div class="form-container p-5">
                <form action="index.php" method="post">
                    <h1 class="text-center fw-bold">Hello Aquarist!</h1>
                    <p class="text-center">Log in to your account</p>
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> Email</label>
                        <input type="email" id="form1Example13" class="form-control form-control-lg py-1" name="email" autocomplete="off" placeholder="Enter your email" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example21"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg py-1" name="password" autocomplete="off" placeholder="Enter your password" />
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center mx-4">
                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-lg text-light my-2 py-2"/>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <a class="btn btn-cancel" id="login" href="index.php" role="button">Cancel</a>
                    </div>
                </form>
                <p class="text-center mb-2">If you don't have an account, <button class="text-warning p-0" id="signupBtn">Register</button> here.</p>
                <p class="text-center mb-2">or</p>
                <span>
                    <p class="text-center">Login as <button class="text-warning p-0" id="loginAdminBtn">Administrator</button></p>
                </span>
            </div>
            </div>
        </div>
        </div>

        <div class="container position-absolute" id="login_admin" style="display:none;">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 col-lg-5">
            <div class="form-container p-5">
                <form action="index.php" method="post">
                    <h1 class="text-center fw-bold mb-5">Hello Admin!</h1>
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> Username</label>
                        <input type="text" id="form1Example13" class="form-control form-control-lg py-1" name="username" autocomplete="off" placeholder="Type username" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example21"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg py-1" name="password" autocomplete="off" placeholder="Type password" />
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center mx-4">
                        <input type="submit" value="Login" name="login_admin" class="btn btn-primary btn-lg text-light my-2 py-2"/>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <a class="btn btn-cancel" id="login" href="index.php" role="button">Cancel</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>


    </div>


    <script src="js/script.js"></script>
    
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>