<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Ingredients</title>
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
            <a style="color: #2fadfc;" href="<?=BASE?>User/ingredients">Ingredients</a>
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

    <div class="blue-box" style="border:20px solid white">
        <br>            
        <h1 class="PageHeader text-center">Ingredients</h1>                
        <br>
        <div id="outer">
            <div class="inner" style="margin-left: 50%">
                <form action="" method="POST">
                    <input type="search" name="">
                    <input type="submit" value="Search">               
                    <a href='/Item/editItem/$item->item_id'><img src='/images/plus-icon.png' alt='delete' style='width:42px;height:42px;'></a>
                    <button class="btn btn-outline-light btn-lg" onclick="window.print()" style="">Print</button>
                </form>                                
            </div>
        </div>                
        <div><br>          
            <center>
                <table style="border:2px solid black; background-color: white;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                   
                <?php
                    $items = new \app\models\Item();
                    $items = $items->getItemByType("ingredients");

                    foreach ($items as $item) { 
                        echo "<tr>
                            <td><input disabled type='text' id='' value='$item->item_name' name=''></td>
                            <td><input disabled type='text' id='' value='$item->item_description' name=''></td>
                            <td><input disabled type='text' id='' value='$item->item_price' name=''></td>
                            <td><input disabled type='text' id='' value='$item->item_quantity' name=''></td>
                            <td>
                                <a href='/Item/editItem/$item->item_id'><img src='/images/pencil-icon.png' alt='delete' style='width:42px;height:42px;'></a>
                                <a href='/Item/deleteItem/$item->item_id'><img src='/images/delete-icon.png' alt='edit' style='width:42px;height:42px;'></a>
                            </td>                            
                            </tr>";
                    }
                ?>
                                        
                    </tbody>
                </table>
            </center>
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