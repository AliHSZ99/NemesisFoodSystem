<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>  

        /* Change the size of the search input */
        #searchInput {
            width: 300px;
        }

        #editProfileButton{
            width: 140px;
            margin-right: 10px;
        }

        #deleteProfileButton {
            margin-left: 8px;
        }
        
        /* the box where all the anime list and manga list are located */
        #listBox{
            background-color: #F5F5F5;
            width: 1000px;
            height: max-content;
            border-radius: 25px;
            margin-left: 20%;
            margin-top: 30%;
            padding: 10px;
        }

        /* Change the  border and height of the input inside the change password box */ 
        #changePassBox input {
            border-radius: 4px;
            height: 40px;
            width: 300px;
            padding: 2%;
        }

        /* Change the size and the border radius of the confirm button */ 
        #confirmButton {
            border-radius: 15px;
            width: 160px;
        }

        /* Change the size and the border radius of the send button */ 
        #sendButton {
            width: 120px;
            border-radius: 15px;
        }

        #error_messages {
            color:red;
            font-size:100%;
        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/app/css/styles.css">
</head>
<body id="body">
    <?php
        if (isset($_SESSION["passwordUpdate"])) {
        ?>

            <script>
                swal({
                    title: "Password Updated",
                    text: "Your password has been successfully updated",
                    icon: "success",
                    button:"ok"
                    });
            </script>


        <?php
            unset($_SESSION["passwordUpdate"]);
        }
    ?>

    <?php
        if (isset($_SESSION["feedbackSent"])) {
        ?>

            <script>
                swal({
                    title: "Feedback Sent",
                    text: "Thank you!, your feedback has been sent to us!",
                    icon: "success",
                    button:"ok"
                    });
            </script>


        <?php
            unset($_SESSION["feedbackSent"]);
        }
    ?>

    <div class="blue-box">

        <!-- side navigation bar -->
        <div class="sidenav">
            <center>
            <a href="<?=BASE?>User/customerIndex"><img class="logo" src="/images/logo.png" alt=""></a>
            <br>
            <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome to the Nemesis prospective menu items voting system!</h2>
            <br>
            <h3 class="text-light">User: <?php echo $_SESSION["username"];?></h3>
            <br>
            <p class="nav-title" style="color:white;">
                We at Nemesis Video Game Lounge prioritize our customers and their satisfaction with the services that we offer.
                The food items you see on this screen are not on our menu, but you can change that!
                By voting for a potential new menu item, you are one step closer to getting a food item to be included in our official
                menu. <br><br>What are you waiting for? <br><br><a href="<?=BASE?>User/customerIndex">Vote now!</a>  
            </p>
            </center>
            <hr>
            <div class="text-center setting-logout-position">
                <a style="color: #2fadfc;" href="<?=BASE?>User/customerSettings">Settings</a>
                <center>
                    <hr class="setting-logout-hr">
                </center>
                <a href="<?= BASE ?>Main/logout" class="logouthover">Logout</a>
            </div>
            </center>
        </div>

        <center>
            <!-- This for the actual body of the page -->
            <div class="container-xl container-fluid">
                <div class="row">
                    
                    <!-- The user's post, anime list, manga list, and setting section -->
                    <div class="col-9 mt-4 pt-3">

                        <!-- post, animelist, mangalist, and settings box -->
                        <!-- The box where all the post, anime list, mangalist and settings will be placed -->
                        <div id="listBox">
                            <div style="height: 468px;">
                                <div class="container">
                                    <div class="row">
                                        <!-- Change password section -->
                                        <div id="changePassBox" class="col-6 d-flex flex-column">
                                            <form action="" method="POST">
                                                <h2 class="text-dark mt-2" >Change password</h2>
                                                <!-- Old password  -->
                                                <input class="mt-1" type="password" name="oldPassword" placeholder="Old password">
                                                <br>
                                                <!-- New password  -->
                                                <input class="mt-1" type="password" name="newPassword" placeholder="New password">
                                                <br>
                                                <!-- New password confirmation  -->
                                                <input class="mt-1" type="password" name="confirmNewPassword" placeholder="Confirm password">
                                                <br>
                                                <center>
                                                    <button name="changePassword" type="submit" id="confirmButton" class="btn btn-info mt-0 align-self-center mt-3">Confirm</button>
                                                </center>
                                                <h4 class="mt-3" id="error_messages">
                                                <?php
                                                    echo $data["error"];
                                                ?>
                                                </h4>
                                            </form>
                                        </div>

                                        <!-- Send feedback section -->
                                        <div class="col-6 d-flex flex-column">
                                            <form action="" method="POST">
                                                <h2 class="text-dark mt-2" >Send feedback</h2>
                                                <!-- Feedback textarea -->
                                                <textarea name="message" id="" cols="30" rows="10" style="resize: none;" placeholder="Enter feedback here..."></textarea>
                                                <!-- Send button -->
                                                <!-- Sends the feedback -->
                                                <br>
                                                <button name="feedback" type="submit" id="feedback" class="btn btn-info mt-0 align-self-end mt-3">Send feedback</button>
                                                <h4 class="" id="error_messages">
                                                <?php
                                                    echo $data["feedback"];
                                                ?>
                                                </h4>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <!-- black footer -->
    <footer class="footer">
        <center> 
            <div class="mt-2 allotherfooters">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
        </center>
    </footer>
</body>
</html>