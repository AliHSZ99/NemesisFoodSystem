<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Cleaning Supplies</title>
    <script>
        function printCleaning() {
            var content = document.getElementById("printCleaning").innerHTML;
            var page = window.open('', '');
            page.document.write('<html><head><title>Cleaning Supplies</title></head>');
            page.document.write('<body><center><h1>Cleaning Supplies<h1>');
            page.document.write(content);
            page.document.write('</center></body></html>');
            page.document.close();
            page.print();
        }
    </script>
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
            <a style="color: #2fadfc;" href="<?=BASE?>User/cleaning">Cleaning Supplies</a>
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

    <div class="blue-box">

        <!-- Title and Search Bar -->
        <div class="container"> 
            <div class="row">
                <form action="/Item/searchCleaning" method="POST">
                    <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
                        <h1 id="foodTitle" style="color:white;">Cleaning Supplies</h1>
                        <div class="input-group rounded">
                            <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <button type="submit" style="border:none;"> 
                            <i><img src="/images/search-icon.png"></i>
                        </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Button and Print Button -->
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 5%;">
                    <a href="<?=BASE?>Item/addCleaningItem" class="btn btn-success" style="margin-left: 85%; margin-right: 2%; vertical-align: middle;">Add</a>
                    <button class="btn btn-outline-light" onclick="printCleaning()" >Print</button>
                </div>
            </div>
        </div>

        <!-- Cleaning View -->
        <div id="printCleaning">
            <div class="container" style="margin-top: 5%;">
                <table class="table table-light table-hover" style="width: 87.7%; margin-left: 6.2%">
                    <tr class="table-secondary" style="table-layout: fixed;">
                        <th style="width: 13%">Name</th>
                        <th style="width: 30%">Description</th>
                        <th style="width:  9%">Price</th>
                        <th style="width:  9%">Quantity</th>
                        <th style="width:  30%">Actions</th>
                    </tr>
                </table>

                <div class="row overflow-auto" style="width: 90%; height: 50%; margin-left: 5%">
                    <div class="">
                        <table class="table table-light table-hover" style="table-layout: fixed; width:100%;">
                            <tr class="table-secondary">
                                <!--UNCOMMENT FOR PAGE WITH IMAGE <th>Images</th>!-->
                                <th style="width: 13%"></th>
                                <th style="width: 30%"></th>
                                <th style="width: 9%"></th>
                                <th style="width: 9%"></th>
                                <th style="width: 30%"></th>
                            </tr>
                            <?php 
                                foreach ($data as $item) { 
                                        echo " <tr> ";
                                        /*echo "
                                                    <td>
                                                    <img src='$item->filename' style='width:150px; height: 120px;'>
                                                    </td>"; UNCOMMENT FOR PAGE WITH IMAGE*/
                                        echo "
                                                    <td style='word-wrap:break-word'>$item->item_name</td>
                                                    <td style='word-wrap:break-word'>$item->item_description</td>
                                                    <td>$item->item_price</td>
                                                    <td>$item->item_quantity</td>
                                                    <td>
                                                        <a href='/Item/editItem/$item->item_id' class='btn btn-primary mt-2'>Edit</a>
                                                        <a href='/Item/deleteItem/$item->item_id' class='btn btn-danger mt-2'>Delete</a> ";
                                        echo "
                                                        <a href='/Item/decrement/$item->item_id' class='btn btn-danger mt-2'>Discard</a>
                                                        <a href='/Item/discardAll/$item->item_id' class='btn btn-danger mt-2'>Discard all</a>";

                                        echo "      </td>
                                            </tr>";
                                        }
                                    ?>
                        </table>
                    </div>
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