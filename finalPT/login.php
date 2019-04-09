<?php
    include_once 'database.php';

    session_start();

  if(isset($_SESSION['username'])){
    header("Location:index.php");
  }
    
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = 'Please enter your name.';
        } else{
            $username = trim($_POST["username"]);
        }
    
    // Check if password is empty
        if(empty(trim($_POST['password']))){
            $password_err = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        
        if($stmt = $pdo->prepare("SELECT fld_staff_name, fld_staff_password FROM tbl_staffs_a160841_pt2 WHERE fld_staff_id = :username")){
            // Bind variables to the prepared statement as parameters
           $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters 
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $database_password = $row['fld_staff_password'];
                        if($database_password == $password){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $row['fld_staff_name'];      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'Wrong password !';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'User ID does not exist !';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
else{
    $username_err = "Welcome to My Bag Ordering System";
    $password_err = "";
}
?>

<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        <!-- Include the above in your HEAD tag -->
        <title>My Bag Ordering System: Login Page </title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body id="body_bg" >

<div class="container-fluid" align="center">
    <br>
    <br>
    <h1>My Bag Ordering System</h1>
    <h3>Login Page</h3>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <form id="login-form" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <fieldset>

                <div class="form-group" style="margin: 15px">
                  <!-- Username -->
                  <label for="username" class="col-md-3 control-label">User ID: </label>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Your User ID" value="<?php echo $username; ?>" required>
                    </div>
                </div>

                <div class="form-group" style="margin: 15px">
                  <!-- Password-->
                  <label for="password" class="col-md-3 control-label">Password: </label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="<?php echo $password; ?>" required>
                    </div>
                </div>

                <br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">
                        <button class="btn btn-primary btn-md" type="submit" name="login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
                        <button class="btn btn-primary btn-md" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>               
                    </div>
                </div>

            <!-- Error Message -->
            <div class="cellContainer" style="padding: 5px">
                
                <div class=="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <span class="help-block"><h4><?php echo "<script type='text/javascript'>alert('$username_err $password_err');</script>"; ?></h4></span>
                </div>
            </div>
                

              </fieldset>
            </form>
        </div>
    </div>
    <h5>New staff ? Please contact admin to create a new staff account.</h5>
</div>

</body>
</html> 