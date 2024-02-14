<?php
/*When POSTing, it grabs the NAME not the id*/
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//Set the variables to empty first, don't confuse this with the POST values
//If want check empty POST use empty($_POST)
$email = $fname = $lname = $password = $password2 = $errorMsg = "";
$success = true;

if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);

    // Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

// First name
if (empty($_POST["fname"])) {
    $errorMsg .= "First name is required.<br>";
    $success = false;
} else {
    $fname = sanitize_input($_POST["fname"]);
}

// Last name
if (empty($_POST["lname"])) {
    $errorMsg .= "Last name is required.<br>";
    $success = false;
} else {
    $lname = sanitize_input($_POST["lname"]);
}

// Password
if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    $password = $_POST["pwd"];
    //bcrypt hash - $2y$ 
    //10$ = 10 rounds
    $hashed = password_hash($password, PASSWORD_DEFAULT);
}

// Confirm Password
if (empty($_POST["pwd_confirm"])) {
    $errorMsg .= "Confirm password is required.<br>";
    $success = false;
} else {
    $password2 = sanitize_input($_POST["pwd_confirm"]);
}

// Check if password and confirm password match
if ($password != $password2) {
    $errorMsg .= "Passwords do not match.<br>";
    $success = false;
}


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<head>
    <?php include "inc/head.inc.php"; ?>
</head>
<body>
    <?php include "inc/nav.inc.php"; ?>
    <main class="container">
        <?php
            echo '<style>.container { padding: 25px; border-top: 1px solid #000; }</style>';
        ?>
        <?php
            if ($success) {
                echo "<h4>Your registration successful!</h4>";
                echo "<h5>Thank you for signing up, " . ($fname) . " " . ($lname) . "!</h5>";
                echo '<style>.custom-button { background-color: green; color: white; }</style>';
                echo '<form action="index.php">';
                echo '<button type="submit" class="btn custom-button">Log-in</button>';
                echo '</form>';
            } else {
                echo "<h4>Oops!</h4>";
                echo "<h5>The following errors were detected:</h5>";
                echo "<p>" . ($errorMsg) . "</p>";
                //submittign an empty GET is fine, it will just refresh the page. This is cause i want to use a button lol.
                echo '<style>.custom-button { background-color: #D04848; color: white; }</style>';
                echo '<form action="Register.php">';
                echo '<button type="submit" class="btn custom-button">Return to Sign Up</button>';
                echo '</form>';
            }
        ?>
        </div>
    </main>
    <?php include "inc/footer.inc.php"; ?>
</body>