<!DOCTYPE html>
<html>

<head>
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css"  href="view/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <h1>Zippy Used Autos</h1>
    <?php if(!isset($_SESSION['userid']) && 
                    ($action != 'register' && $action != 'logout')) { ?>
        <p class="register" ><a href="?action=register">Register</a></p>
    <?php } elseif (isset($_SESSION['userid']) &&
                    ($action != 'register' && $action != 'logout')) { ?>
        <p><?php echo "Welcome {$_SESSION['userid']}! "?>(<a href="?action=logout">Sign Out</a>)</p>
    <?php } else { ?>
        <div></div>
    <?php } ?>
</header>
