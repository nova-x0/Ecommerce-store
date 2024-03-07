<?php
// Check if the form is submitted
if(isset($_POST['subscribe'])) {
    $subscribe = $_POST['subscribe'];

    // Validate the email address (you might want to add more robust validation)
    if (!filter_var($subscribe, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit(); // Stop further execution
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'subscribeemails');

    // Check connection
    if($conn->connect_error) {
        die('Connection failed : '.$conn->connect_error);
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO subscriptions (email) VALUES (?)");

        // Check if the statement is prepared successfully
        if ($stmt === false) {
            echo "Prepare failed: " . $conn->error;
            exit(); // Stop further execution
        }

        // Bind parameters and execute
        $stmt->bind_param("s", $subscribe);
        $stmt->execute();

        // Check if the query executed successfully
        if ($stmt->affected_rows > 0) {
            echo "You subscribed to our Emails successfully.";
        } else {
            echo "Error: Unable to subscribe to emails.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    // Handle if the form is not submitted
    echo "Form submission failed.";
}
?>
