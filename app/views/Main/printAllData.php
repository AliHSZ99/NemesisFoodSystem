<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print all data</title>
</head>
<body>

    <center>
        <h1 style="font-size:70px">All Data</h1>
    </center>
    <h1>Users</h1>
        <table style="border-collapse: collapse; table-layout: fixed;" cellpadding="5px">
            <tr style="height: 30px; border-bottom:1pt solid black;">
                <th>User ID</th>
                <th>Username</th>
                <th>Password Hash</th>
                <th>Role</th>
                <th>Full Name</th>
                <th>E-Mail</th>
            </tr>

            <?php 
            foreach ($data["user"] as $currentUser) {
                echo 
                "<tr style='height: 30px;'>
                    <td>$currentUser->user_id</td>
                    <td style='word-wrap:break-word'>$currentUser->username</td>
                    <td style='word-wrap:break-word'>$currentUser->password_hash</td>
                    <td>$currentUser->role</td>
                    <td style='word-wrap:break-word'>$currentUser->fullname</td>
                    <td>$currentUser->email</td>
                </tr>";
            }
            ?>
        </table>

        <br>
        <br>

    <h1>All Items</h1>
        <table style="border-collapse: collapse; table-layout: fixed; width: 100%;" cellpadding="5px">
            <tr style="height: 30px; border-bottom:1pt solid black;">
                <th>Item ID</th>
                <th>Item Type</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Item Quantity</th>
                <th>Voting Goal</th>
                <th>Vote Count</th>
                <th>Timestamp</th>
                <th>File name</th>
            </tr>

            <?php 
            foreach ($data["item"] as $currentItem) {
                echo 
                "<tr style='height: 30px;'>
                    <td>$currentItem->item_id</td>
                    <td>$currentItem->type</td>
                    <td style='word-wrap:break-word'>$currentItem->item_name</td>
                    <td style='word-wrap:break-word'>$currentItem->item_description</td>
                    <td>$currentItem->item_price</td>
                    <td>$currentItem->item_quantity</td>
                    <td>$currentItem->goal</td>
                    <td>$currentItem->vote_count</td>
                    <td>$currentItem->timestamp</td>
                    <td>$currentItem->filename</td>
                </tr>";
            }
            ?>
        </table>

        <br>
        <br>

    <h1>Votes</h1>
        <table style="border-collapse: collapse; table-layout: fixed;" cellpadding="5px">
            <tr style="height: 30px; border-bottom:1pt solid black;">
                <th>Vote ID</th>
                <th>User ID</th>
                <th>Item ID</th>
            </tr>

            <?php 
            foreach ($data["vote"] as $currentVote) {
                echo 
                "<tr style='height: 30px;'>
                    <td>$currentVote->vote_id</td>
                    <td>$currentVote->user_id</td>
                    <td>$currentVote->item_id</td>
                </tr>";
            }
            ?>
        </table>
    
</body>
</html>