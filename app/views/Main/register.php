<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Register</title>
</head>

<body>

    <!-- nav bar -->
    <nav class="navbar loginregister">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE ?>Main/register"><img src="/images/logo.png" alt="Nemesis Food Voting"></a>
        </div>
    </nav>

    <!-- login form -->
    <br>
    <br>
    <br>
    <center>
        <h4 class="error-messages">
            <?php
                echo $data;
            ?>
        </h4>
        <div id="registerform">
            <h1 id="loginh1">Register</h1>
            <div id="register-content">
                <form action="" method="POST">
                    <input name="email" type="text" class="loginbox" type="text" placeholder="Email">
                    <br>
                    <br>
                    <input name="username" type="username" class="loginbox" placeholder="Username">
                    <br>
                    <br>
                    <input name="password" type="password" class="loginbox" placeholder="Password">
                    <br>
                    <br>
                    <input name="confirmPassword" type="password" class="loginbox" placeholder="Confirm Password">
                    <br>
                    <br>
                    <div id="password-requirements">
                        <p id="password-must-contain">Password must contain:</p>
                        <ul id="passwordlist">
                            <li id="cond1">Minimum 8 characters</li>
                            <li id="cond2">At least 1 uppercase letter</li>
                            <li id="cond3">At least 1 number</li>
                        </ul>
                    </div>
                    <button name="action" id="loginbutton" type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <br>
        </div>
        <br>
        <a class="loginlinks" href="<?=BASE?>Main/index">Log in</a>
    </center>

    <!-- black footer -->
    <footer class="footer">
        <center> 
            <div class="mt-2">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
        </center>
    </footer>

</body>
</html>