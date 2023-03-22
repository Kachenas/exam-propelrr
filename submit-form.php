<?php 

    $host = "localhost";
    $user = "root";
    $password = "samplePass";
    $dbname = "sampletest";

    // Create connection
    $conn = mysqli_connect($host, $user, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $name = mysqli_escape_string(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email =  mysqli_escape_string(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $mobile = mysqli_escape_string(filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT));
    $birthdate = DateTime::createFromFormat('Y-m-d', $_POST['birthdate']);
    $birthdate = mysqli_escape_string($birthdate->format('Y-m-d'));
    $gender = mysqli_escape_string(filter_var($_POST['gender'], FILTER_SANITIZE_STRING));
    $actionPerform = filter_var($_POST['actionPerform'], FILTER_SANITIZE_STRING);

    switch (strtoupper($actionPerform)) {

        case 'CREATEUSER':
            
            $sql = "INSERT INTO personal_info (fullname, email, mobileNo, birthdate, gender) VALUES ($name, $email, $mobile,$birthdate,$gender)";
            if (mysqli_query($conn, $sql)) {
                return "New record created successfully";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            break;
        case 'UPDATEUSER':
            
            $sql = "UPDATE personal_info SET email=$email, mobile=$mobile WHERE name=$name";
            mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn) > 0) {
                return "Update successful!";
            } else {
                return "Update failed.";
            }

            break;
        case 'DELETEUSER':
            
            // Prepare and execute the delete query
            $sql = "DELETE FROM personal_info WHERE name = $name";
            if ($conn->query($sql) === TRUE) {
                return "Record deleted successfully";
            } else {
                return "Error deleting record: " . $conn->error;
            }

            break;
        default:
            return "NOt a valid Action to be Perform";
            break;
    }

    mysqli_close($conn);
?>