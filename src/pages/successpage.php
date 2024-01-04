<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
</head>
<body>
    <h1>Success Page</h1>
    <p>Thank you for filling the form <?php echo $_SESSION['name'];?>.</p>
    
    <?php
    session_unset(); session_destroy(); //clearing the session variables and destroying the session file.
    ?>
    <form method="post" action="../index.php">
        <input type="submit" value="Index Page">
    </form>
</body>
</html>