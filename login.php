<?php
    $iusername=$_POST['iusername'];
    $ipassword=$_POST['ipassword'];
    //to prevent sql injection
    $iusername=stripcslashes($iusername);
    $ipassword=stripcslashes($ipassword);
    session_start();
    //connect to server and db
    $conn=new mysqli('localhost:8111','root','','test');
    if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
    }
    else{
        if(isset($_POST['submit']))
        {

            $uname = mysqli_real_escape_string($conn,$_POST['iusername']);
            $password = mysqli_real_escape_string($conn,$_POST['ipassword']);
        
            if ($uname != "" && $password != "")
            {
        
                $sql_query = "select count(*) as username from user where firstname='".$uname."' and password='".$password."'";
                $result = mysqli_query($conn,$sql_query);
                $row = mysqli_fetch_array($result);
        
                $count = $row['username'];
        
                if($count > 0){
                    $_SESSION['username'] = $uname;
                    //header('Location: home.php');
                    echo "<script>location.href='index.php'</script>";
                   
                    //echo "<h1>login succesful ".$_SESSION['username']."</h1>";
                    sleep(2);    
                    echo "<script>location.href='index.php'</script>";
                    //header('Refresh: 2; URL=homepage.php');

                    //header('Refresh: 2; URL=homepage.php');
                }else
                {
                    echo "<script>location.href='styleafterlogin.html'</script>";
                    sleep(3);
                    echo "<script>location.href='login.html'</script>";
                    //header('Refresh: 2; URL=loginform.html');

                }
                
                $conn->close();
            }
        
        }

    }
?>