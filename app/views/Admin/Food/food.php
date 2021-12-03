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
                <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
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
                    <a href="<?=BASE?>Item/addFoodItem" class="btn btn-success" style="margin-left: 85%; margin-right: 2%; vertical-align: middle;">Add</a>
                    <button class="btn btn-outline-light" onclick="window.print()" >Print</button>
                </div>
            </div>
        </div>

        <!-- Food View -->
        <div class="container" style="margin-top: 5%;">
            <table class="table table-light table-hover" style="width: 87.7%; margin-left: 6.2%">
                <tr class="table-secondary" style="table-layout: fixed;">
                    <th style="width: 20%">Images</th>
                    <th style="width: 13%">Name</th>
                    <th style="width: 30%">Description</th>
                    <th style="width:  9%">Price</th>
                    <th style="width:  9%">Quantity</th>
                    <th style="width:  9%">Actions</th>
                </tr>
            </table>
            <div class="row overflow-auto" style="width: 90%; height: 50%; margin-left: 5%">
                <div>                    <table class="table table-light table-hover" style="table-layout: fixed;">
                        <tr class="table-secondary">
                            <th style="width: 20%"></th>
                            <th style="width: 13%"></th>
                            <th style="width: 30%"></th>
                            <th style="width:  9%"></th>
                            <th style="width:  9%"></th>
                            <th style="width:  9%"></th>
                        </tr>
                        <?php 
                            foreach($data as $results) {
                            echo " <tr> 
                                        <td>
                                            <img src='$results->filename' style='width:150px; height: 120px;'>
                                        </td>
                                        <td>$results->item_name</td>
                                        <td style='word-wrap:break-word'>$results->item_description</td>
                                        <td>$results->item_price</td>
                                        <td>$results->item_quantity</td>
                                        <td>
                                             <a href='/Item/editFoodItem/$results->item_id' class='btn btn-primary' style='width:100%;'>Edit</a>
                                             <a href='/Item/deleteFoodItem/$results->item_id' class='btn btn-danger mt-2' style='width:100%; '>Delete</a>
                                             <a href='/Item/decrement/$results->item_id' class='btn btn-danger mt-2' style='width:100%; '>Discard</a>
                                             <a href='/Item/discardAll/$results->item_id' class='btn btn-danger mt-2' style='width:100%;'width:100%;'>Discard all</a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </table>
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
