<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $errors = array();
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }
    if (!is_numeric($mobile)) {
        $errors[] = "Mobile number must be numeric";
    }
    if (empty($errors)) {
        $hostname = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'wt';
        $conn = mysqli_connect($hostname, $user, $pass, $database);
        $sql = "INSERT INTO register1 (username, pass, email, mobile) VALUES ('$username', '$password', '$email', $mobile)";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.html");
            exit();
        } 
        mysqli_close($conn);
    }else{
        echo "error";
    }
}
?>
