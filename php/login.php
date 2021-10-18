

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="unipi" content="PWEB">
    <meta name="service" content="possibility to rent work tools of various types">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png">
    <link rel="stylesheet" href="./../css/general.css" type="text/css" media="screen">
    <link rel="stylesheet" href="./../css/log.css" type="text/css" media="screen">
    <title>LogIn - Rentool Official</title>
</head>

<body>
    <div id="contenitore">
        <header id="welcome">
            <h2>Entra in Rentool</h2>
            <p>Accedi subito alla tua area privata.</p>
        </header>
        <form name="login" action="./loginControl.php" method="POST">
            <div class="curr-tab">
                <label><b>E-Mail:</b>
                    <input type="text" name="mail" required>
                </label>
                <label><b>Password:</b>
                    <input type="password" name="password" required>
                </label>
            </div>
            <hr class="smallSplit">
            <div>
                <p>Sei nuovo su Rentool? &nbsp;<a href="./register.php">Registrati</a></p>
                <button class="end" name="submit" type="submit">Accedi</button>
            </div>
        </form>
        <?php
            if(isset($_GET['error'])){
                echo '<div class="server">';
                echo '<span>' . $_GET['error'] . '</span>';
                echo '</div>';
            }
        ?>
    </div>
</body>



