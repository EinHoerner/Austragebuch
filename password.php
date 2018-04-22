<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("Location: index.php");
}
$page = $_SESSION['role'];
include 'dbh.php';
$uid = $_SESSION['uid'];
                
$first = $_SESSION['first'];
$last = $_SESSION['last'];

$err = '';
if(!empty($_GET['err'])){
    $err = $_GET['err'];
}
?>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Passwort ändern</title>
</head>
<body role="document">
    
    <div class="container theme-showcase" role="main">
        
        <div class="row">
            <a href="<?php
                 echo $page;
                 ?>.php"><span class="glyphicon glyphicon-home" style="font-size: 2em;" aria-hidden="true"></span></a>
            <div class="col-lg-4 col-md-6 col-sm-8 center-block">
                <h2>Passwort ändern</h2>
                <p>
                    <?php
                    echo "Du bist eingeloggt als $first $last ($uid)."
                    ?>
                </p>
                <?php
                    if($err == 'pwd'){
                        echo "<div class='alert alert-danger' role='alert'>Das eingegebene Passwort ist inkorrekt.</div>";
                    } else if($err == 'new'){
                        echo "<div class='alert alert-danger' role='alert'>Bitte gib einen gültigen Wert für das neue Passwort ein.</div>";
                    }
                ?>
                <form method="post" action="processing/pwd.php">
                    <input type="password" class="form-control" placeholder="Altes Passwort" name="old">
                    <input type="password" class="form-control" placeholder="Neues Passwort" name="new"><br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Okay</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>