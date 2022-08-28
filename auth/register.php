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
                    <label for="input-name" class="form-label">Name</label>
                    <input type="text" name="input-name" class="form-control" placeholder="Name" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="input-username" class="form-label">Username</label>
                    <input type="text" name="input-username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" name="input-email" class="form-control" placeholder="example@email.com" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" name="input-password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <span>Already have an account ?</span>
                    <a href="login.php" class="link-info">Login Here</a>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>

                <?php
                include "../src/action.php";

                // @ is used in front of variable to supress warning messages
                @$name = $_REQUEST['input-name'];
                @$username = $_REQUEST['input-username'];
                @$email = $_REQUEST['input-email'];
                @$pass = $_REQUEST['input-password'];

                // echo (inserttoDB($email, $pass) == 0) ? "Account has been successfully registerd" : "An account with the same email has been registerd";
                
                if ($_POST) {
                    if (inserttoDB($name, $username, $email, $pass, 1) == 0) {
                        echo "Account has been successfully registerd";
                    } else if (inserttoDB($name, $username, $email, $pass) == 1) {
                        echo "An account with the same email has been registerd";
                    }
                }

                ?>
            </form>
    </div>
</body>

</html>