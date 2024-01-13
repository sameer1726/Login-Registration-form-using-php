<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $host='localhost';
    $user='root';
    $pass='';
    $dbname='wt';
    $conn=mysqli_connect($host,$user,$pass,$dbname);
    $sql="select *from register1 where username='$username' and pass='$password'";
    $retval=mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
        header("Location:main.html");
        exit();
    }else{
        echo "Incorrect username/password entered!";
    }
    mysqli_close($conn);
}
?>