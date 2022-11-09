<?php 
     include_once('Database/connection.php');
     session_start();
 ?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                 
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <!-- jQuery library -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Popper JS -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>          
               <link href='https://fonts.googleapis.com/css?family=Akronim' rel='stylesheet'>
       <!-- font awesome libaray-->  
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!---css -->
            <link rel="stylesheet" href="css/RegStyle.css">
          <link rel="stylesheet" href="css/datepicker.css">

          
          
        <!---title -->      
          <title>Register Here </title>
    </head>
        
    <body>

      <!-- php use here  -->
    <?php 

      $check =  array();

      //if login btn clicl
     if (isset($_POST['Registerclick'])) {
         $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
         $lname = mysqli_real_escape_string($conn, $_POST['lname']);
         $email = mysqli_real_escape_string($conn, $_POST['email']);
         $password = mysqli_real_escape_string($conn, $_POST['password']);
         $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
         $address = mysqli_real_escape_string($conn, $_POST['address']);
         $phone =  mysqli_real_escape_string($conn, $_POST['phone']);
         $city = mysqli_real_escape_string($conn, $_POST['city']);
         $state =  mysqli_real_escape_string($conn, $_POST['state']);
         $country = mysqli_real_escape_string($conn, $_POST['country']);

      
    if (empty($fname)||empty($lname)||empty($email)||empty($bdate)||empty($password)||
        empty($address) || empty($phone) || empty($city) || empty($state) ||         empty($country)) {
         array_push($check, "Fill all feilds "); 
    }

    //if no error found  or all feilds fill
    else if (count($check) == 0) {
        //$epassword = md5($password);
        $sql = "INSERT INTO customer (FNAME,LNAME,EMAIL,PASSWORD,BIRTHDATE,ADDRESS,CONTACT,CITY,STATES,COUNTRY)
        VALUES ('$fname','$lname','$email','$password','$bdate','$address','$phone','$city','$state','$country')";
            $result = mysqli_query($conn,$sql);
          if ($result) {
            $message = "Your Succesfully Register \\n Please Login Now.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          else{
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
           header('location: Sign.php');
            
        }
        }
       ?>





            
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                          <div class="d-flex w-100 order-0">
                        <div class="w-100">
                                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                        </div>          
                        <a class="navbar-brand  ">
                        <img  src="img/Foodlogo.jpg"  width="90" height="50"  alt="" /><i class="NewFontTitle ml-2 ">Food Express Resturant</i></a>
                        <span class="w-100"></span>
                                
                            </div>
                            <span class="w-100"></span>
                            <div class="collapse navbar-collapse w-100 order-1 order-lg-0 text-center " id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item  ">
                                        <a class="nav-link  font-weight-bold newfont" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold  newfont" href="Menu.php">Menu's</a>
                                    </li>
                                    <li class="nav-item font-weight-bold  newfont">
                                        <a class="nav-link " href="#">Contact</a>
                                    </li>
                                </ul>
                                <a class="btn btn-primary ml-5 btn-sytle newfont" href="#" role="button">Order Now &rarr;</a>
                            </div>
                          </nav>


      


    <div class="container">
   <div class="row mt-2 ">
  <div class="col-md-6 col-sm-6 col-xs-12  mt-sm-3 mt-md-3 mt-xl-3 text-center">
        <h1 >Welcome Here You can Register in Our Resturant Enjoy It..</h1>
    <p >
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
  </div>

  <div class="col-md-6 col-sm-12 col-xs-12 ">
    

              <div class="modal-dialog text-center " >
                <div class="col-md-12 col-sm-6 " >
                   <div class="modal-content">
                  <h1>Register Here</h1>
    <form action="Register.php" method="post">
            <?php include('errors.php') ?>
                  <div class=" form-row m-2  mb-4">
                    <div class="col mt-3 ">
                      <input type="text" class="form-control" name="fname" placeholder="First name" >
                    </div>
                    <div class="col mt-3 ">
                      <input type="text" class="form-control" name="lname" placeholder="Last name">
                    </div>
                     </div>

                 <div class="form-row m-2">
                      <div class="form-group col-md-12 email">
                      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                     </div>
                      <div class="form-group col-md-6 password">
                      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group col-md-6 dob input-wrapper">
                        <input type="text" class="form-control" id="date-arrival" name="bdate" placeholder="Birth date">
                      </div>
                      <div class="form-group col-md-6 address">
                      <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Adresss">
                      </div>
                      
                      <div class="form-group col-md-6 phone">
                      <input type="text" class="form-control" id="inputphone" name="phone" placeholder="Contact No">
                      </div>

                </div>

                 <div class="form-row m-2">
                    <div class="form-group col-md-6 City">
                      <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-6 State">
                      <input type="text" class="form-control" id="inputCity" name="state"  placeholder="State">
                    </div>
                    <div class="form-group col-md-12 mb-4 Country">
                      <input type="text" class="form-control " id="inputCity" name="country" placeholder="Country">
                    </div>
                    <div class="form-group col-md-12 col-sm-12  ">

                    <button type="submit" class="btn btn-danger  col-md-5 col-sm-6  ml-2 ml-lg-8 mb-2" name="Registerclick">Register</button>
                    <a href="Sign.php" class="btn btn-danger  col-md-8 col-sm-12  ml-2 ml-lg-8 mb-2">Already Register</a>
                    
                    </div>
                    </div>
        </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>  


        </div>
  </div>
 


        

           <script src="js/scripts.min.js"></script>
            <script src="js/main.min.js"></script> 




    </body>
    </html> 