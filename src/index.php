<?php
session_start();
// Initialize variables to store user input
$name = $phone = $email = $location = $age = $university = "";
// Initialize variables to store error messages
$name_err = $phone_err = $email_err = $location_err = $age_err = $university_err = "";

function validateText($text, $field) {
    // Strip whitespace (or other characters) from the beginning and end of a string
    $text = trim($text);
    // Check if the input is empty
    if ($text == "") {
      return "$field is required";
    }
    // Check if the input only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $text)) {
      return "Only letters and white space allowed for $field";
    }
    // Return an empty string if there is no error
    return "";
}

// Check if the form from first page is submitted
if (isset($_POST['page1submit'])) {

    // Validate name
    $name_err = validateText($_POST['name'], "Name");
    if ($name_err == "") {
        $name = $_POST['name'];
    }

    // Validate phone number
    if (empty($_POST['phone'])) {
        $phone_err = "Phone number is required";
    } else {
        $phone = $_POST['phone'];
        // Check if phone number is valid
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phone_err = "Invalid phone number format, 10 digits allowed!";
        }
    }

    // Validate email address
    if (empty($_POST['email'])) {
        $email_err = "Email is required";
    } else {
        $email = $_POST['email'];
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    // Check if there are no errors
    if ($name_err == "" && $phone_err == "" && $email_err == "") {
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        // Redirect to the second page
        header("Location: pages/secondpage.php");
        exit();
    } else {
        // Redirect to the first page with the error values
        $_SESSION['name_err'] = $name_err;
        $_SESSION['phone_err'] = $phone_err;
        $_SESSION['email_err'] = $email_err;
        header("Location: pages/firstpage.php");
        exit();
    }
}

// Check if the form from second page is submitted
if (isset($_POST['page2submit'])) {
    // Validate location
    $location_err = validateText($_POST['location'], "location");
    if ($location_err == "") {
        $location = $_POST['location'];
    }

    // Validate age
    if (empty($_POST['age'])) {
        $age_err = "Age is required";
    } else {
        $age = $_POST['age'];
        // Check if age is a positive integer
        if (!filter_var($age, FILTER_VALIDATE_INT) || $age <= 0) {
            $age_err = "Invalid age";
        }
    }

    // Validate university
    $university_err = validateText($_POST['university'], "university");
    if ($university_err == "") {
        $university = $_POST['university'];
    }

    // Check if there are no errors
    if ($location_err == "" && $age_err == "" && $university_err == "") {
        // Redirect to the success page
        $_SESSION['location'] = $location;
        $_SESSION['age'] = $age;
        $_SESSION['university'] = $university;
        header("Location: pages/successpage.php");
        exit();
    } else {
        // Redirect to the second page with the error values
        $_SESSION['location_err'] = $location_err;
        $_SESSION['age_err'] = $age_err;
        $_SESSION['university_err'] = $university_err;
        header("Location: pages/secondpage.php");
        exit();
    }
}

/* 
    Adding this condition so that new users will be redirected to the first page.
    Also if someone is on the second page and they have already filled out the first page form, 
    if they were to go to the index page after that,
    they will be redirected to the second page instead of the first page.
*/ 
if (!isset($_SESSION['name']) && !isset($_SESSION['phone']) && !isset($_SESSION['email'])) {
    // First page
    header("Location: pages/firstpage.php");
    exit();
} else {
    // Second page
    header("Location: pages/secondpage.php");
    exit();
}
?>