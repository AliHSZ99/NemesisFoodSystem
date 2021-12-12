<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Customers</title>
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

    <div class="blue-box">
        <!-- Title and Search Bar -->
        <div class="container"> 
            <div class="row">
                <form action="/User/searchCustomers" method="POST">
                    <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
                        <h1 id="foodTitle" style="color:white;">Customers</h1>
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

        <!-- Prospective View -->
        <div class="container" style="margin-top: 5%;">
            <table class="table table-light table-hover" style="width: 60%; margin-left: 25%">
                <tr class="table-secondary" style="table-layout: fixed;">
                    <th style="width: 40%">Username</th>
                    <th style="width: 40%">Email</th>
                    <th style="width: 17%">Action</th>
                </tr>
            </table>

            <div class="row overflow-auto" style="width: 62%; height: 70%; margin-left: 24.1%">
                <div class="">
                    <table class="table table-light table-hover " style="table-layout: fixed;">
                        <tr class="table-secondary">
                            <th style="width: 40%"></th>
                            <th style="width: 40%"></th>
                            <th style="width: 17%"></th>
                        </tr>

                        <?php
                            foreach($data as $currentUser) {
                            echo "<tr>
                                    <td>$currentUser->username</td>
                                    <td>$currentUser->email</td>
                                    <td><a href='/User/deleteCustomer/$currentUser->user_id' class='btn btn-danger'>Delete user</a></td>
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