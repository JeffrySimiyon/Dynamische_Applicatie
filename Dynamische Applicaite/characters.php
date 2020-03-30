<?php
    require('connection.php');
    $id = $char = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $stmt = $conn->prepare("SELECT * FROM characters WHERE id=?");
    $stmt->execute([$id]);
    $char = $stmt->fetch();
    $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/a3078cd2a7.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
        <title><?=$char['name']?></title>
    </head>
    <body>
        <div id='main'>
            <header>
                <div>
                    <h1>
                        <?=$char['name']?>  
                    </h1>
                </div>
                <a href='index.php' class='back'><i class="fas fa-long-arrow-alt-left"></i> terug</a>
            </header>
            <div id='char'>
                <div id='info'>
                    <img id='avatar' src="assets/images/<?php echo $char['avatar'] ?>" alt="">
                    <div id='statistics' style='background-color: <?= $char['color'] ?>;'>
                        <div id='stat-text'>
                            <i class='fas fa-heart'></i> <?php echo $char['health'] ?><br>
                            <i class='fas fa-fist-raised'></i>  <?php echo $char['attack'] ?><br>
                            <i class='fas fa-shield-alt'></i> <?php echo $char['defense'] ?><br>
                            <br>
                            <?php
                            // checking if weapon or armor exists and then showing it if it does
                            if (isset($char['weapon'])) {
                                echo "<b>Weapon:</b> $char[weapon]<br>";
                            }
                            if (isset($char['armor'])) {
                                echo "<b>Armor:</b> $char[armor]";
                            }
                            ?>
                        </div>
                    </div> 
                </div>
                <div id='bio'>
                    <?= nl2br($char['bio']) ?>
                </div>
            </div>
            <?php include('assets/includes/footer.php') ?>
        </div>
    </body>
</html>