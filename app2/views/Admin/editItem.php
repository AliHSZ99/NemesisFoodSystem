<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Cleaning Supplies</title>
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
        <!-- !-->
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

    <div class="blue-box" style="border:20px solid white">
        <div class="container"> 
            <div class="row">
                <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
                    <h1 class="PageHeader text-center">Editing Item</h1>                              
                </div>
            </div>
        </div>

        <!-- Food View -->
        <div class="container" style="margin-top: 5%;">
            <table class="table table-light table-hover" style="width: 87.7%; margin-left: 6.2%">
                <tr class="table-secondary" style="table-layout: fixed;">
                    <!--UNCOMMENT FOR PAGE WITH IMAGE <th>Images</th>!-->
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
                <form action='' method='POST' enctype="multipart/form-data">                        
                <?php 
                    $item = $data;
                echo "<tr>";
                /*echo "
                       <td>
                        <img src='$item->filename' style='width:150px; height: 120px;'>
                        </td>"; UNCOMMENT FOR PAGE WITH IMAGE*/
                echo "
                        <td><input name='item_name' type='text' id='' value='$item->item_name'></td>
                        <td style='word-wrap:break-word'><input name='item_description' type='text' id='' value='$item->item_description'></td>
                        <td><input name='item_price' type='text' id='' value='$item->item_price'></td>
                        <td><input name='item_quantity' type='text' id='' value='$item->item_quantity'></td>
                        <td>
                            <input name='action' type='submit' value='save'/>
                            <a href='/Item/deleteItem/$item->item_id'><img src='/images/delete-icon.png' alt='delete' style='width:42px;height:42px;'></a>";
                /*echo "
                        <a href='/Item/decrement/$item->item_id' class='btn btn-danger mt-2' style='width:100%; '>Discard</a>
                        <a href='/Item/discardAll/$item->item_id' class='btn btn-danger mt-2' style='width:100%;'width:100%;'>Discard all</a>";*/
                echo "  </td>
                        </tr>";
                ?>
                </form>                                            
            </table> <!-- POSSIBLE BUTTON GOTTA FIX: <input name='action' type='submit' value='save' style='width:42px; height:42 px;background: url(/images/save-icon.png)'/> !-->
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
