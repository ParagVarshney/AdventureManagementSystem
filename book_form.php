<?php

$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if (isset($_POST['send'])) {
    // Validate form fields
    $requiredFields = ['name', 'email', 'phone', 'address', 'location', 'guests', 'arrivals', 'leaving'];
    $isValid = true;

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $isValid = false;
            $message = 'Sorry   ,All fields are mandatory. Please fill out all fields  Other  Go back.';
            
           
            break;
        }
    }

    if ($isValid) {
        // All fields are filled, proceed with the form submission
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $location = $_POST['location'];
        $guests = $_POST['guests'];
        $arrivals = $_POST['arrivals'];
        $leaving = $_POST['leaving'];

        $request = "INSERT INTO book_form(name, email, phone, address, location, guests, arrivals, leaving) VALUES ('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";
        
        // Execute the query
        if (mysqli_query($connection, $request)) {
            // Query executed successfully
            $message = 'Thank you for book the form and Booking request submitted successfully!  Our team contact will you soon';
        } else {
            // Query execution failed
            $message = 'Something went wrong. Please try again!';
        }

        // Close the connection
        mysqli_close($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="book.css">
    <title>Booking Form</title>
</head>
<body class="book">
    

    <?php
    // Display the validation message
    if (isset($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

  
</body>
</html>
