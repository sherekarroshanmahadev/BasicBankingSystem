<!DOCTYPE html>
<html>
<marquee direction="left" >
    <a style="margin:auto;width:50%;padding:550px;font-size:70px; font-weight: bold;color:white;">Transfer Money</a>
</marquee>
<body style="background-color:#ff0000;">
<?php include 'config.php'; ?>
    <center>
        <div class="container" style="margin-top:2%; ">
            <div
                style="width:80%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                <h1 style=" color:white;font-size:30px; ">Transfer Money</h1>
            </div>
            <br><br>
            <div class="" style=" backdrop-filter: blur(5px);  border-radius:5px; font-size:20px; ">
                <form action="transfermoney.php" method="post">
                    <table style="font-size:30px;">
                        <tr>
                            <td><input type="text" class="formin form-control" style="font-size:30px;"name="accno1" id=""
                                    placeholder="Sender's Account Number"
                                    value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"></td>
                        <tr>
                        <tr>
                            <td><input type="number" class="formin form-control"style="font-size:30px;" name="amount" id=""
                                    placeholder="Amount to Transfer"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="formin form-control" style="font-size:30px;" name="accno2" id=""
                                    placeholder="Reciever's Account Number"></td>
                        </tr>
                    </table>
                    <br><input class="btn mybtn btn-outline-light"style="font-size:30px;" type="submit" value="Transfer"><br><br>
                    <p style="color:white;font-size:30px; ">Want to check your balance? check <a href="checkbalance.php">click here</a></p>
                </form>
            </div>
        </div>


        <?php 

$conn = mysqli_connect($servername,$username,$password,"apnabank");
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){

    
    $sender = $_POST['accno1'];
    $amount = $_POST['amount'];
    $reciever = $_POST['accno2'];
   
    
    $checkblcquery = "SELECT blc FROM users where accno='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['blc'];

    if($ava_blc >= $amount){
    $sql1 = "UPDATE users SET blc= blc-$amount WHERE accno='$sender'";
    $sql2 = "UPDATE users SET blc= blc+$amount WHERE accno='$reciever'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if($result1 && $result2){
        echo '<div class="alert alert-success align-items-center text-center" style="width:50%;" role="alert">
        <div>   
        <h2><i class="fas fa-check-circle"></i>
          Amount Transfered Successfully!</h2></div>
        </div>
      </div>';

      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'succeed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
        <i class="fas fa-times-circle"></i>
        Oops! Something went wrong!
        </div>
      </div>';
      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }
}else{
    echo '<div class="alert alert-danger align-items-center text-center" style="width:50%;" role="alert">
        <div>   
        <h2><i class="fas fa-times-circle"></i>
        Not Sufficient Balance in Account!</h2></div>
        </div>
      </div>
      ';
      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
}
}
}
?>
</center>
</body>
</html>