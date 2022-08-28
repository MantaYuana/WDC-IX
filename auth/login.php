<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <div class="container-sm">
        <h3>PHP Login Form</h2> <br>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3 col-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" name="input-email" class="form-control" placeholder="example@email.com" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" name="input-password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-link" name="forgot-pass">Forgot Password ?</button>
                </div>
                <div class="mb-3">
                    <span>Dont have an account ? </span>
                    <a href="register.php" class="link-info">Register Here </a>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                
                <?php
                include "../src/action.php";
                
                if (@$_GET['pesan']) {
                    echo "Anda telah Log out dari aplikasi !";
                }
                
                if ($_POST) {

                    $_SESSION['email'] = $_REQUEST['input-email'];
                    $_SESSION['pass'] = $_REQUEST['input-password'];

                    switch (checkdata($_SESSION['email'], $_SESSION['pass'])) {
                        case 0:
                            $_SESSION['status'] = "login";
                            echo "Login successful";
                            break;
                        case 1:
                            echo "Account not found";
                            break;
                        case 3:
                            echo "Wrong password";
                            break;
                        default:
                            echo "Data check not available";
                            break;
                    }
                }
                ?>
            </form>
    </div>
</body>

</html>