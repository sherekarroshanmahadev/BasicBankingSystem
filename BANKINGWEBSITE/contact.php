<!doctype html>
<html lang="en">
    <body style="background-color:#ff0000";>
    <?php include 'config.php'; ?>
    
<?php

$conn = mysqli_connect($servername, $username, $password,"apnabank");
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    
    $sql = "INSERT INTO `contactus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$msg')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div>   
        <i class="fas fa-check-circle"></i>
          Thank you '.$name.' for contacting us!
        </div>
      </div>';
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
        <i class="fas fa-times-circle"></i>
        Oops '.$name.'! Something went wrong!
        </div>
      </div>';
    }
}
}

?>



    <style>
        .formin {
            border-radius: 20px;
            width: 380px;
            height: 50px;
            padding: 5px 5px 5px 15px;
        }

        .mybtn {
            margin-bottom: 10px;
            box-shadow: 2px 2px 10px black;
            border-radius: 30px;
            font-weight: bold;
            color: white;
        }

        .mybtn:active {
            background-color: black;
            color: white;
        }
    </style>

    <center>
        <div class="container" style="padding:10px 80px 10px 80px; margin-top:2%;">
            <div
                style="width:80%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                <h1 style=" color:white;">Contact Us</h1>
            </div>

            <div class="container"
                style=" backdrop-filter: blur(5px);  border-radius:5px; padding: 20px 20px 20px 20px; margin-top:50px; width:60%;">
                <form action="contact.php" method="post">
                    <input type="text" class="formin form-control" name="name" id="" style="font-size:30px;" placeholder="Name"><br><br>
                    <input type="email" class="formin form-control" name="email" style="font-size:30px;" id="" placeholder="Email"><br><br>
                    <textarea name="message" class="" style="border-radius:20px;" padding: 5px 5px 5px 15px;"
                        placeholder="Enter your message" rows="5" cols="47"  style="font-size:30px;" id=""></textarea>
                    <br><br><input class="btn mybtn btn-outline-light" type="submit" value="Submit"style="font-size:30px; font-color:green;">
                </form>
            </div>
        </div>

    </center>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>