<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Second</title>
</head>
<body>
    <h1>Page 2</h1>
    <form method="post" action="../index.php">
        <label>Location: <input type="text" name="location"></label>
        <span style="color:red"><?php if(isset($_SESSION['location_err'])){ echo $_SESSION['location_err']; }?></span>
        <label>Age: <input type="number" name="age"></label>
        <span style="color:red"><?php if(isset($_SESSION['university_err'])){ echo $_SESSION['university_err']; }?></span>
        <label>University: <input type="text" name="university"></label>
        <span style="color:red"><?php if(isset($_SESSION['age_err'])){ echo $_SESSION['age_err']; }?></span>
        <input type="submit" name="page2submit" value="Submit">
    </form>
</body>
</html>