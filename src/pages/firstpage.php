<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>First</title>
</head>
<body>
    <h1>Page 1</h1>
    <form method="post" action="../index.php">
        <label>Name: <input type="text" name="name"></label>
        <span style="color:red"><?php if(isset($_SESSION['name_err'])){ echo $_SESSION['name_err']; }?></span>
        <label>Phone Number: <input type="text" name="phone"></label>
        <span style="color:red"><?php if(isset($_SESSION['phone_err'])){ echo $_SESSION['phone_err']; }?></span>
        <label>Email: <input type="email" name="email"></label>
        <span style="color:red"><?php if(isset($_SESSION['email_err'])){ echo $_SESSION['email_err']; }?></span>
        <input type="submit" name="page1submit" value="Submit">
    </form>
</body>
</html>