<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Add Prospective Menu Item</title>
</head>

<body>

    <!-- side navigation bar -->
    <div class="sidenav">
        <center>
        <a href="<?=BASE?>User/adminIndex"><img class="logo" src="/images/logo.png" alt=""></a>
        <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome <?=$_SESSION["username"]?>!</h2>
        
        <h4 style="color:white; letter-spacing: 2px;"><?=$_SESSION["fullname"]?></h4>

        <div class="admin-navbar-items">
            <a style="color: #2fadfc;" href="<?=BASE?>User/adminIndex">Prospective Menu</a>
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

    <!-- Prospective Display -->
    <div class="blue-box">

        <!-- Title -->
        <div class="container"> 
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <h1 id="foodTitle" style="color:white;">Add Prospective Menu</h1> 
                </div>
            </div>
        </div>
        <br>

       <!-- Prospective Add -->
        <div class="container">
        <div class="row" style="margin-top: 5%;background-color: 
            #F5F5F5;padding-top: 5%;padding-bottom: 5%;border: 2mm solid black;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container" style="width: 95%;">
                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%;">
                                <div style="width: 40%;">
                                    <h4> Add Image</h4>
                                </div>
                                <div>
                                    <h4> Description</h4>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-12 d-flex flex-row">
                                <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                    <div style="width: 40%">
                                         <img src='/images/default.png' style='width:150px; height: 120px;'>
                                    </div>
                                    <div style="width: 50%">
                                        <textarea required type="text" name="item_description" style="width: 100%; height: 100%; resize:none;"></textarea>
                                    </div>
                                 </div>
                            </div>
                        </div>

                        <br><br>
                         <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                <input required type="file" name="newPicture">
                            </div>
                        </div>

                        <br><br>
                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                <div style="width: 40%">
                                     <h4> Prospective Item Name</h4>
                                </div>
                                <div style="width: 20%">
                                    <h4> Price</h4>
                                </div>
                                <div>
                                    <h4> Goals</h4>
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex flex-row" style="margin-left: 5%">
                                <div style="width: 40%">
                                     <input required type="text" name="item_name" style="width: 60%;">
                                </div>
                                <div style="width: 20%">
                                    <input required type="number" min="0" step=".01" name="item_price" style="width: 40%;">
                                </div>
                                <div>
                                    <input  required type="number" min="1" name="goal" style="width: 35%;">
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
