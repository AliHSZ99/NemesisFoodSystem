<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">
    <title>Nemesis: Vote</title>

    <style>
        /* #images {
            width: 90%;
            height: 180px;
        } */

        #container {
            margin-top: 0%;
            margin-left: 21%;
        }

        #votebutton {
            margin-top: 30%;
            margin-left: 30%;
            width: 60%;
        }

        #name {
            margin-left: 7%;
        }

        #description {
            margin-right: 100%;
        }

        body, html {
            overflow: hidden;
        }

        #bigbox {
            height: 20%;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>

    <div class="blue-box">

        <!-- side navigation bar -->
        <div class="sidenav">
            <center>
            <a href="<?=BASE?>User/customerIndex"><img class="logo" src="/images/logo.png" alt=""></a>
            <br>
            <h2 class="nav-title" style="color:white; margin-top: 30px">Welcome to the Nemesis prospective menu items voting system!</h2>
            <br>
            <h3 class="text-light">User: <?php echo $_SESSION["username"];?></h3>
            <br>
            <p class="nav-title" style="color:white;">
                We at Nemesis Video Game Lounge prioritize our customers and their satisfaction with the services that we offer.
                The food items you see on this screen are not on our menu, but you can change that!
                By voting for a potential new menu item, you are one step closer to getting a food item to be included in our official
                menu. <br><br>What are you waiting for? <br><br><a href="<?=BASE?>User/customerIndex">Vote now!</a>  
            </p>
            </center>
            <hr>
            <div class="text-center setting-logout-position">
                <a href="<?=BASE?>User/customerSettings">Settings</a>
                <center>
                    <hr class="setting-logout-hr">
                </center>
                <a href="<?= BASE ?>Main/logout" class="logouthover">Logout</a>
            </div>
            </center>
        </div>

        <br>


        <!-- Title and Search Bar -->
        <div class="container"> 
            <div class="row">
                <form action="/User/searchProspective" method="POST">
                    <div class="col-12 d-flex flex-row" style="margin-top: 2%;">
                        <h1 id="foodTitle" style="color:white;">Potential Menu Items</h1>
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

        <br>
        <br>
        <br>
        
        <div class="container" id="container">
            <div style="border-radius: 15px;" class="row bg-light">
                <div id="bigbox" class="col-12">
                    <div style="height: 1000px; overflow: scroll;">
                        <table class="table" style='table-layout: fixed'>
                            <tbody>
                                <?php
                                $vote = new \app\models\Vote();
                                $voteOrUnvoteHref;
                                foreach ($data as $currentProspective) {
                                    if ($vote->getVote($_SESSION["user_id"], $currentProspective->item_id)) {
                                        if ($currentProspective->vote_count == $currentProspective->goal) {
                                            $voteOrUnvoteHref = "<a href='/Vote/vote/$currentProspective->item_id' id='votebutton' class='btn btn-success disabled'>Item will be added to menu!</a>";
                                        } else {
                                            $voteOrUnvoteHref = "<a href='/Vote/vote/$currentProspective->item_id' id='votebutton' class='btn btn-info'>Vote</a>";
                                        }
                                    } else if (!($vote->getVote($_SESSION["user_id"], $currentProspective->item_id))) {
                                        $voteOrUnvoteHref = "<a href='/Vote/unvote/$currentProspective->item_id' id='votebutton' class='btn btn-danger'>Remove vote</a>";
                                    } 

                                echo "

                                <tr class='bg-light'>
                                    <td style='width: 30%;'>
                                        <img style='object-fit:cover; max-width: 250px; max-height: 220px' id='images' src='$currentProspective->filename' alt=''>
                                        <h5 id='name'>$currentProspective->item_name</h5>
                                    </td>
                                    
                                    <td>
                                        <h5 id='description'>Description:</h5>
                                        <p style='word-wrap: break-word;'>
                                            $currentProspective->item_description
                                        </p>
                                    </td>

                                    <td style='padding-left: 2%'>
                                        <h5 style='margin-left: 70px;'>Vote Count: $currentProspective->vote_count</h5>
                                        <br>
                                        <h5 style='margin-left: 70px;'>Goal: $currentProspective->goal</h5>
                                        $voteOrUnvoteHref
                                    </td>
                                </tr>";

                                }

                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- black footer -->
        <footer class="footer">
            <center> 
                <div class="mt-2 allotherfooters" style="margin-right: 22%;">269 Boul. St-Jean #245J (Plaza Pointe-Claire)  Montreal,  QC <div> 
            </center>
        </footer>

    </div>

</body>
</html>