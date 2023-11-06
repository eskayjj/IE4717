<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('location: ../Pages/index.php');
    }

    Session_start();

    $subject = $_POST['subject'];
    $name = $_POST['feedbackName'];
    $email_address = $_POST['feedbackEmail'];
    $contact_number = $_POST['feedbackContact'];
    $feedback_input = $_POST['feedbackFeedback'];

    // set username and password
    @ $db = new mysqli('localhost', 'root', '', 'studyfuel');

    if (mysqli_connect_errno()) {
           exit;  
    }
    
    $query = 'INSERT INTO feedback (subject, name, email_address, contact_number, feedback_input)
     values ("'. $subject . '","' . $name .'","' . $email_address . '","' . $contact_number . '","' . $feedback_input . '")';
    $result = $db->query($query);

    try{
        if($result){
            $_SESSION['feedbackUpdate'] = true;
            header('location: ../Pages/feedback.php');
        }
        else{
            $_SESSION['feedbackUpdate'] = false;
            header('location: ../Pages/feedback.php');
        }
    }

    catch(Exception $e){
        $_SESSION['feedbackUpdate'] = false;
        header('location: ../Pages/feedback.php');
    }
    $db->close();
?>