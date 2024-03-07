<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['comment'])) {
        // Sanitize input data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $comment = htmlspecialchars($_POST['comment']);

        // Validation: You can add more specific validation for each field if needed

        // If email is not valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address";
            exit(); // Stop further execution
        }

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'subscribeemails');

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed : ' . $conn->connect_error);
        } else {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO form_data (name, email, number, comment) VALUES (?, ?, ?, ?)");

            // Check if the statement is prepared successfully
            if ($stmt === false) {
                echo "Prepare failed: " . $conn->error;
                exit(); // Stop further execution
            }

            // Bind parameters and execute
            $stmt->bind_param("ssss", $name, $email, $number, $comment);
            $stmt->execute();

            // Check if the query executed successfully
            if ($stmt->affected_rows > 0) {
                echo "Form data submitted successfully.";
            } else {
                echo "Error: Unable to submit form data.";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "All fields are required.";
    }
}
?>
