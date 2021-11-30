<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Food Inventory</title>
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
            <a style="color: #2fadfc;" href="<?=BASE?>User/food">Food Inventory</a>
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
            <a href="#">Settings</a>
            <center>
                <hr class="setting-logout-hr">
            </center>
            <a href="<?=BASE?>Main/logout" class="logouthover">Logout</a>
        </div>
    </div>

    <!-- Food Display -->
    <div class="blue-box">

        <!-- Title and Search Bar -->
        <div class="container"> 
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <h1 id="foodTitle" style="color:white;">Food Inventory</h1> 
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                          aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                        <i><img src="/images/search-icon.png"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Button and Print Button -->
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <button class="btn btn-outline-light btn-lg" onclick="window.print()" style="margin-left: 90%">Print</button>
                </div>
            </div>
        </div>

        <!-- Food View -->
        <div class="container">
            <div class="row" style="margin-top: 5%">
                    <table border="1" class="foodTable">
                        <?php 
                            foreach($data as $results) {
                                echo " <tr> 
                                            <td>$results->item_name</td>
                                            <td>$results->item_description</td>
                                            <td>$results->item_price</td>
                                            <td>$results->item_quantity</td>
                                            <td>$results->goal</td>
                                            <td>$results->filename</td>
                                            <td>
                                                <button class='deleteFoodBtn' type='submit' name='delete'>Delete</button>
                                                <button class='editFoodBtn' type='submit' name='edit'>Edit</button>
                                            </td>
                                        </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>

            <!-- Delete Button, Edit Button and Post Button -->
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                        
                        <button class="addFoodBtn" type="submit" name="add"><a href="<?=BASE?>Item/addFoodItem">Add</a></button>
                    </div>
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