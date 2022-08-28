<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-sm">
        <h3>PHP Login Form</h2> <br>

            <!-- <form method="POST" action="action.php"> -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- <div class="mb-3 col-3">
                    <label for="input-email" class="form-label">Username</label>
                    <input type="email" name="input-email" class="form-control" placeholder="Username">
                </div> -->
                <div class="mb-3 col-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="email" name="input-email" class="form-control" placeholder="example@email.com">
                </div>
                <div class="mb-3 col-3">
                    <label for="input-password" class="form-label">Password</label>
                    <input type="password" name="input-password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-link" name="forgot-pass">Forgot Password ?</button>
                </div>
                <div class="mb-3">
                    <span>Dont have an account ? </span>
                    <a href="register.php" class="link-info">Register Here </a>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                
                <?php
                include "src/action.php";
                include "src/sendmail.php";

                if ($_POST) {
                    if (!$mail->send()) {
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message sent!';
                    }
                }
                ?>
            </form>
    </div>
</body>

</html>