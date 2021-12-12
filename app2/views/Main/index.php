<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Log in</title>
</head>

<body>

    <!-- nav bar -->
    <nav class="navbar loginregister">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE ?>Main/index"><img src="/images/logo.png" alt="Nemesis Food Voting"></a>
        </div>
    </nav>

    <!-- code to make the alert registration successful pop up alert -->
    <?php
    if (isset($_SESSION["register_status"])) {
                    ?>

                <script>
                    swal({
                        title: "Registration Successful!",
                        text: "",
                        icon: "success",
                        button:"ok"
                    });
                </script>


            <?php
                    unset($_SESSION["register_status"]);
                }
            ?>

    <!-- login form -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <h4 class="error-messages">
            <?php
                echo $data;
            ?>
        </h4>
        <div id="loginform">
            <br>
            <br>
            <br>
            <h1 id="loginh1">Log in</h1>
            <form action="" method="POST">
                <br>
                <input name="username" class="loginbox" type="text" placeholder="Username">
                <br>
                <br>
                <input name="password" class="loginbox" type="password" placeholder="Password">
                <br>
                <br>
                <button name="action" id="loginbutton" type="submit" class="btn btn-primary">Log in</button>
            </form>
            <br>
        </div>
        <br>
        <!-- go to register page -->
        <a class="loginlinks" href="<?=BASE?>Main/register">Create an Account</a>
    </center>

    <!-- black footer -->
    <footer class="footer">
        <center> 
            <div class="mt-2">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
        </center>
    </footer>

</body>
</html>