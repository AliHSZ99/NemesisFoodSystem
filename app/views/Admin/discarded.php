<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Discarded List</title>
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
                <a style="color: #2fadfc;" href="<?=BASE?>User/discarded">Discarded List</a>
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

    <div class="blue-box">
        <center>
            <h1 class="PageHeader">Discarded Page</h1>
            <input type="text" placeholder="Search.." class="searchBar"> 
            <button onclick="window.print()" class="printButton">Print</button>
            <div class="white-box">
                <table>
                  <tr>
                    <th class="discardTable">Name</th>
                    <th class="discardTable">Description</th>
                    <th class="discardTable">Quanity</th>
                    <th class="discardTable">Price</th>
                    <th class="discardTable">Actions</th>
                </tr>
            </table>
        </div>
        <?php
            foreach($data as $item){
                echo "<tr>
                        <td>$item->item_id</td>
                        <td>$item->item_name</td>
                        <td>$item->item_description</td>
                        <td>$item->item_quantity</td>
                        <td>
                        </td>
                        <br>
                    </tr>";
                }
             ?>
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