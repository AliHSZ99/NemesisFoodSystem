<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/css/styles.css">
  <title>Shopping List</title>
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
        <a style="color: #2fadfc;" href="<?=BASE?>User/shopping">Shopping List</a>
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
  <div class="blue-box">
    <center> 
      <h1 class="PageHeader">Shopping Page
         <button onclick="window.print()" class="printButton">Print</button>
         <form action="/Admin/searchShoppingItem" method="POST">
                <input type="text" name="search">
                <button type="submit">Search</button>
        </form></h1>
      <a href="<?=BASE?>Item/addShoppingItem">
      <img src="https://media.discordapp.net/attachments/883416041991069776/914549468341362708/plus.png" width="2%" height="5%"></a>
      <div class = "scroll">
      <?php
            foreach($data as $item){
                echo "<tr>
                        <td>$item->item_id</td>
                        <td>$item->item_name</td>
                        <td>$item->item_description</td>
                        <td>$item->item_quantity</td>
                        <td>
                        <a href='/Item/editShoppingItem/$item->item_id'>edit</a> |
                        <a href='/Item/deleteShoppingItem/$item->item_id'>delete</a>
                        </td>
                        <br>
                    </tr>";
                }
             ?>
             </div>
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