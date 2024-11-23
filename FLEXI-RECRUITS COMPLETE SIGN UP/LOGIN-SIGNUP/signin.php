<?php

$host = 'localhost';
$dbname = 'Flexi_Recruits';
$username = 'Ayush';
$password = 'Ayush#1801@';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) 
{       
    die("Connection failed: " . mysqli_connect_error());
}
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $accountType = strtolower($_POST['account_type']);
        $s_email = $_POST['email'];
        $s_password = $_POST['password'];
        $sql;

        if ($accountType === 'company account') 
        {
            $sql = "SELECT * FROM company WHERE username = $email";
        } 
        elseif ($accountType === 'jobseeker account') 
        {
            $sql = "SELECT * FROM jobseeker WHERE username = $email";
        } 
        elseif ($accountType === 'admin') 
        {
            $table = 'admin';
            $sql = "SELECT * FROM admin WHERE username = $email";
        } 
        else
        {
            echo " error while fetching details";
        }
        $res=mysqli_query($con,$sql) or die(mysqli_error($con));

        while($row=mysqli_fetch_array($res))
        {
            extrac($row);

            if($email === $s_email && $password === $s_password)
            {
                echo json_encode(['success' => true, 'message' => 'Sign in successful']);
            }    
        }
    } 
    else 
    {
        throw new Exception("Invalid request method");
    }
?>
