<?php

function usersDashboard(&$errorMsg, &$success, $searchTerm = null)
{
    global $errorMsg, $success;

    // Create database connection
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }

    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }
    $sql = "SELECT * FROM user";
    if ($searchTerm) {
        $sql .= " WHERE fname LIKE ?";
        $searchTerm = "%" . $searchTerm . "%";
    }

    $stmt = $conn->prepare($sql);
    if ($searchTerm) {
        $stmt->bind_param("s", $searchTerm);
    }

    if (!$stmt->execute())
    {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " .
        $stmt->error;
        $success = false;
        return;
    }

    // Get the result of the query
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    // Return to HTML for styling
    return $result;
}

function countUsers(&$errorMsg, &$success)
{
    global $errorMsg, $success;

    // Create database connection
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }

    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }

    $sql = "SELECT COUNT(*) as count FROM user";

    $stmt = $conn->prepare($sql);
    
    if (!$stmt->execute())
    {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " .
        $stmt->error;
        $success = false;
        return;
    }

    // Get the result of the query
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    // Return the count
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

function moderateReports(&$errorMsg, &$success, $searchTerm2 = null)
{
    global $errorMsg, $success;

    // Create database connection
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }

    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }

    $sql = "SELECT * FROM member"; // Changed from "user" to "member"

    if ($searchTerm2) {
        $sql .= " WHERE name LIKE ?"; // Modify this line to search the correct column
        $stmt = $conn->prepare($sql);
        $searchTerm2 = "%$searchTerm2%";
        $stmt->bind_param("s", $searchTerm2);
    } else {
        $stmt = $conn->prepare($sql);
    }

    if (!$stmt->execute())
    {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " .
        $stmt->error;
        $success = false;
        return;
    }

    // Get the result of the query
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    // Return to HTML for styling
    return $result;
}

function timeoutUser(&$errorMsg, &$success, $id, $status)
{
    global $errorMsg, $success;

    // create database connection
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }
    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    // check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }

    if ($status) {
        // prepare and bind
        $stmt = $conn->prepare("UPDATE user SET is_timedout = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        // execute the query
        if ($stmt->execute()) {
            header('Location: admin.php');
        } else {
            $errorMsg = "Failed to time in";
            $stmt->error;
            $success = false;
            return;
        }

        $stmt->close();
        $conn->close();

    } else { 
        // prepare and bind
        $stmt = $conn->prepare("UPDATE user SET is_timedout = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);

        // execute the query
        if ($stmt->execute()) {
            header('Location: admin.php');
        } else {
            $errorMsg = "Failed to time out";
            $stmt->error;
            $success = false;
            return;
        }

        $stmt->close();
        $conn->close();
    }
}

function pushreport(&$errorMsg, &$success, $id)
{
    global $errorMsg, $success;

    // create database connection
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
        return;
    }
    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    // check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
        return;
    }

    // prepare and bind
    $stmt = $conn->prepare("UPDATE member SET status = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);

    // execute the query
    if ($stmt->execute()) {
        header('Location: admin.php');
    } else {
        $errorMsg = "Failed to push";
        $stmt->error;
        $success = false;
        return;
    }

    $stmt->close();
    $conn->close();
}



?>