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
            <h1>Insert</h1>
        </div>
        <form action="/action_page.php">
            <div id="Insert-zone" class="box-content">
                <filedset>
                    <form id="Insert-file-form" action="?insert=file" method="POST" enctype="mutipart/form-data">
                        <input multiple type="file" name="file_insert()" />
                    </form>
            <ul>
                
            <label for="usename">ClothesID</label>
            <input type="text" id="ID" name="ID" required>

            <label for="usename">ClothesName</label>
            <input type="text" id="name" name="name" required>

            <label for="usename">Price</label>
            <input type="text" id="price" name="price" required>
            
                <li><a href="home.html" title="Summit" target="_blank"><button class="btn" >Summit</button></a></li>
            </ul>
        </form>
    </div>
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

if($pdo === false){
     echo "ERROR: Could not connect Database";
}

//Khởi tạo Prepared Statement
//$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');

//$stmt->bindParam(':id','SV03');
//$stmt->bindParam(':name','Ho Hong Linh');
//$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
//$stmt->bindParam(':class', 'GCD018');
//$stmt->execute();
//$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
$sql = "INSERT INTO product(id, name, price)"
        . " VALUES('$_POST[id]','$_POST[name]','$_POST[price]'";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
 if (is_null($_POST[id])) {
   echo "ID must be not null";
 }
 else
 {
    if($stmt->execute() == TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: ";
    }
 }
?>
</body>

</html>