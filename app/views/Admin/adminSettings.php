<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style> 
        

        .navbar-brand {
            margin-left: 20px;
        }

        
        /* the box where all the anime list and manga list are located */
        #listBox{
            background-color: #F5F5F5;
            width: 1000px;
            height: 100%;
            border-radius: 25px;
            margin-top: 30%;
            margin-left: 15%;
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
            /* margin-left: 16%; */
            margin-top: 0%;
            margin-bottom: 5%;
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

    <div class="blue-box">

        <!-- side navigation bar -->
        <div class="sidenav">
            <center>
                <a href="<?=BASE?>User/adminIndex"><img class="logo" src="/images/logo.png" alt=""></a>
                <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome <?=$_SESSION["username"]?>!</h2>
                
                <h4 style="color:white; letter-spacing: 2px;"><?=$_SESSION["fullname"]?></h4>

                <div class="admin-navbar-items">
                    <a href="<?=BASE?>User/adminIndex">Prospective Menu</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/food">Food Inventory</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/cleaning">Cleaning Supplies</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/ingredients">Ingredients</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/shopping">Shopping List</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/discarded">Discarded List</a>
                    <hr class="admin-hr">
                    <a href="<?=BASE?>User/customers">Customers</a>
                </div>

                <hr>
                <div class="text-center setting-logout-position-admin">
                <a style="color: #2fadfc;" href="<?=BASE?>User/adminSettings">Settings</a>
                <center>
                    <hr class="setting-logout-hr">
                </center>
                <a href="<?=BASE?>Main/logout" class="logouthover">Logout</a>
                </div>
            </center>
        </div>

        <center>
            <!-- This for the actual body of the page -->
            <div class="container-xl container-fluid">
                <div class="row">
                    
                    <!-- post, animelist, mangalist, and settings box -->
                    <!-- The box where all the post, anime list, mangalist and settings will be placed -->
                    <div id="listBox">
                            <div style="height: 468px;">
                                <div class="container">
                                    <div class="row">
                                        <!-- Change password section -->
                                        <div id="changePassBox" class="col-12 d-flex flex-column">
                                            <form action="" method="POST">
                                                <h2 class="text-dark mt-5 text-center">Change password</h2>
                                                <!-- Old password  -->
                                                <input class="mt-1 align-self-center mt-5" type="password" name="oldPassword" placeholder="Old password">
                                                <br>
                                                <!-- New password  -->
                                                <input class="mt-1 align-self-center mt-3" type="password" name="newPassword" placeholder="New password">
                                                <br>
                                                <!-- New password confirmation  -->
                                                <input class="mt-1 align-self-center mt-3" type="password" name="confirmNewPassword" placeholder="Confirm password">
                                                <br>
                                                <button name="action" type="submit" id="confirmButton" class="btn btn-info mt-0 align-self-center mt-3">Confirm</button>
                                                <h4 class="mt-3" id="error_messages">
                                                <?php
                                                    echo $data;
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