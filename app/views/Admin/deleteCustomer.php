asdf<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

        /* Use to center the box at the middle of the page */
        #center{
            position: absolute;
            width: 700px;
            height: 600px;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            margin-left: 50%;
        }

        /*  The design of the box in the middle */
        #loginBox {
            width: 650px;
            height: 400px;
            background-color: #F5F5F5;
            border-radius: 25px;
            opacity: 90%;
        }

        #cancel {
            width: 120%;
            border-radius: 15px;
            margin-top: 35%;
            margin-left:100%
        }

        .boutens {
            float: left;
            margin-left: 22%;
        }

        body, html {
            overflow: hidden;
        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Delete Customer</title>
</head>

<body>

    <!-- side navigation bar -->
    <div id="blue" class="sidenav">
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
            <a style="color: #2fadfc;" href="<?=BASE?>User/customers">Customers</a>
        </div>

        </center>
        <hr>
        <div class="text-center setting-logout-position-admin">
            <a href="<?=BASE?>User/adminSettings">Settings</a>
            <center>
                <hr class="setting-logout-hr">
            </center>
            <a href="<?=BASE?>Main/logout" class="logouthover">Logout</a>
        </div>
    </div>

    <div style="margin-bottom:100px" class="blue-box">

        <div id="center">
            <div id="loginBox" class="mx-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <div class="mt-3" id="go-down">
                                    <h1 class="text-dark">Delete <span style="color:red;"><?=$data->username?></span></h1>
                                    <h2 class="text-dark">Are you sure?</h1>
                                    <br>
                                    <h3 class="text-dark">By clicking Delete, you are agreeing to permanently deleting the following customer's account: <span style="color:red;"><?=$data->email?></span>. It is impossible to retrieve after completing this action...</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <form action="" method="POST">
                        <button name="cancel" type="submit" class="btn btn-secondary btn-lg boutens">Cancel</button>
                        <button name="delete" type="submit" class="btn btn-danger btn-lg boutens">Delete</button>
                    </form>
                </center>
            </div>
        </div>

    </div>

    <!-- black footer -->
    <footer class="footer">
        <center> 
            <div class="mt-2 allotherfooters">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
        </center>
    </footer>

</body>
</html>