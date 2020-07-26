<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="styleforreg.css" rel="stylesheet">
  
  <script>
	function Validation()
	{

	var lastname=document.myform.lastname.value;
    var firstname=document.myform.firstname.value;
	var password=document.myform.password.value;
	var phonenumber=document.myform.phonenumber.value;

	if(lastname=="null" || lastname=="" || lastname.length<4)
	{
		alert("Lastname length should be atleast 4 charecters");
		return false;
	}
    if(firstname=="null" || firstname=="" || firstname.length<6)
	{
		alert("Firstname length should be atleast 6 charecters");
		return false;
	}
	else if(password.length<6)
	{
		alert("Enter valid password");
		return false;
	}
	else if(phonenumber.length<10)
	{
		alert("Enter valid number");
		return false;
	}
	}

</script>
</head>
  <body>
        <div class="container-fluid back">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3"></div>
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9">
              <!--form  -->
              <form class="form-container" method="GET" action="" name="myform"  onsubmit="return Validation()">
                   <center> <h1 class="sty">Register</h1></center>
                   <div class="form-group">
                    <label for="first">First Name</label>
                    <input type="text" class="form-control" id="first" name="firstname" placeholder="First Name" >
                  </div>
                  <div class="form-group">
                    <label for="last">Last Name</label>
                    <input type="text" class="form-control" id="last" name="lastname" placeholder="Last Name">
                  </div>
                   <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="phone" class="form-control"  name ="phonenumber" id="exampleInputPassword1" placeholder="Phone Number">
                  </div>
                  
                <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button> &nbsp;
                <a class="btn btn-info" href="index.php" role="button">Goto Homepage</a>
              </form>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
        </div>
    </div>


<?php
if($_GET['submit'])
{
$lastn=$_GET['lastname'];
$firstn= $_GET['firstname'];
$pass=$_GET['password'];
$email= $_GET['email'];
$phone=$_GET['phonenumber'];
$gender=$_GET['gender'];
  if($lastn!='' && $firstn!='' && $pass!='' && $email!='' && $phone!='')
  {
    $query="INSERT INTO USER VALUES('$lastn','$firstn','$pass','$email','$phone') ";
    $data=mysqli_query($conn,$query);
    if($data)
    {
      echo "Data Inserted into database";
    }
  }
  else {
    echo "All fields are required";
  }
}
?>
  </body>
</html>
