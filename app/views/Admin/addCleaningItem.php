<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Add Cleaning Item</title>
</head>

<body>

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
            <a href="<?=BASE?>User/cleaning" style="color: #2fadfc;">Cleaning Supplies</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/ingredients">Ingredients</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/shopping">Shopping List</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/discarded">Discarded List</a>
            <hr class="admin-hr">
            <a href="<?=BASE?>User/customers">Customers</a>
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

    <!-- Food Display -->
    <div class="blue-box">

        <!-- Title -->
        <div class="container"> 
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <h1 id="foodTitle" style="color:white;">Add Cleaning ITem</h1> 
                </div>
            </div>
        </div>
        <br>
        
       <!-- Food Add -->
        <div class="container">
        <div class="row" style="margin-top: 5%;background-color: 
            #F5F5F5;padding-top: 5%;padding-bottom: 5%;border: 2mm solid black;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container" style="width: 95%;">
                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%;">
                                <div>
                                    <h4> Description</h4>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-12 d-flex flex-row">
                                <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                    <div style="width: 50%">
                                        <textarea  required type="text" name="item_description" style="width: 100%; height: 100%; resize:none;"></textarea>
                                    </div>
                                 </div>
                            </div>
                        </div>

                        <br><br>
                         <div class="row">
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                <div style="width: 40%">
                                     <h4> Menu Item Name</h4>
                                </div>
                                <div style="width: 20%">
                                    <h4> Price</h4>
                                </div>
                                <div style="width: 20%">
                                    <h4> Quantity</h4>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                <div style="width: 40%">
                                     <input  required type="text" name="item_name" style="width: 60%;">
                                </div>
                                <div style="width: 20%">
                                    <input required type="number" min="0" step=".01" name="item_price" style="width: 30%;">
                                </div>
                                <div style="width: 20%">
                                    <input  required type="number" min="0" name="item_quantity" style="width: 35%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br><br>
                    <div style="margin-left: 90%">
                        <input type='submit' name='action' value='Post' class="btn btn-success">
                    </div> 
                </form>
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
