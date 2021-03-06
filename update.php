<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="js/index.js">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="#">View</a></li>
                <li><a href="#">Insert</a></li>
                <a href="#"><img src="images/image-full-29982-bca1c00843298b55fa79f6ec5bef331f.png" alt=""></a>
                <li><a href="#">Update</a></li>
                <li><a href="#">Delete</a></li>
            </ul>
        </div>
        <div class="loginbox">
            <h1>Update</h1>
        </div>
        <form action="/action_page.php">
            <label for="usrname">ClothesID</label>
            <input type="text" id="usrname" name="usrname" required>

            <label for="psw">ClothesName</label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <ul>
                <li><a href="home.html" title="Summit" target="_blank"><button class="btn" >Summit</button></a></li>
            </ul>
        </form>
    </div>

    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
<?php
ini_set('display_errors', 1);
echo "Update database!";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
         "host=
ec2-52-202-146-43.compute-1.amazonaws.com
;port=5432;user=lnmlwwbswnzsfa;password=cb977e5e295f4561e6e00a6bfe3cb3f1239bd0a6f672d8cde0d2527d0f465bbd;dbname=d5jt6vji9s8ql3",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

//$sql = 'UPDATE student '
//                . 'SET name = :name, '
//                . 'WHERE ID = :id';
// 
//      $stmt = $pdo->prepare($sql);
//      //bind values to the statement
//        $stmt->bindValue(':name', 'Lee');
//        $stmt->bindValue(':id', 'SV02');
        // update data in the database
//        $stmt->execute();

        // return the number of row affected
        //return $stmt->rowCount();
$sql = "UPDATE product SET productname = 'toy001' WHERE productid = '001'";
      $stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record updated successfully.";
} else {
    echo "Error updating record. ";
}
    
?>
</body>

</html>

