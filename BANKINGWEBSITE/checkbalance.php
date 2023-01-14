<!doctype html>
<marquee direction="left" scrollmount="100">
<a style="margin:auto;width:50%;padding:550px;font-size:70px; font-weight: bold;color:white;">Check Account Balance!!!</a>
</marquee>
<html lang="en">
    <body style="background-color:#ff0000;">
        <?php include 'config.php'; ?>
        <body>
          
            <center>
                <div class="container" style="margin-top: 10%; padding:10px 80px 10px 80px; ">
                    <div
                        style="width:80%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                        <h1 style=" color:white;font-size:30px;">Check Account Balance</h1>
                    </div>
        
                    <div class="container"
                        style=" backdrop-filter: blur(5px);  border-radius:5px; padding: 20px 20px 20px 20px; margin-top:50px; width:60%;">
                        <form action="checkbalance.php" method="post">
                            <input type="text" class="formin form-control" style="font-size:30px;"name="accno" id="" placeholder="Account Number"><br>
                            <br><input class="btn mybtn btn-outline-light" type="submit"style="font-size:30px; value="Submit"><br><br>
                            <p style="color:white;font-size:30px;">Don't remember your account number? check <a href="customers.php">here</a>
                            </p>
                        </form>
                    </div>
                </div>
        
        
                <?php
        
        $conn = mysqli_connect($servername, $username, $password,"apnabank");
        if(!$conn){
            die("Connection not established: ".mysqli_connect_error());
        }else{
        
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $accno = $_POST['accno'];
            
            $sql = "SELECT blc FROM users where accno='$accno'";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<div class="alert alert-success align-items-center text-center" style="width:25%;" role="alert">
                 <h2> <i class="fas fa-rupee-sign" aria-hidden="true"></i>'.mysqli_fetch_assoc($result)['blc'].'</h2></div>';
            }else{
                echo '<div class="alert alert-danger align-items-center text-center" style="width:34%;" role="alert">
                <div><h2>
                <i class="fas fa-times-circle"></i>
                Something went wrong!</h2>
                </div>
              </div>';
            }
        }
        }
        
        
        ?>
            </center>
        
        </body>