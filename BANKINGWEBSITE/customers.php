<!DOCTYPE html>
<marquee direction="left" >
<a style="margin:auto;width:50%;padding:550px;font-size:70px; font-weight: bold;color:white;">customers</a>
</marquee>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Apna Bank</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            navbar.classList.add("show");
            menuBtn.classList.add("hide");
            body.classList.add("disabled");
        }
        cancelBtn.onclick = () => {
            body.classList.remove("disabled");
            navbar.classList.remove("show");
            menuBtn.classList.remove("hide");
        }
        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>

<body style="background-color:#ff0000;">

<?php include 'config.php'; ?>
    
    <?php
    

$conn = mysqli_connect($servername, $username, $password,"apnabank");
if(!$conn){
    die("Connection not established: ".mysqli_connect_error());
}else{

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
?>
        <table class="table" style="margin-top: 80px;font-size:15px;color:white; ">
            <thead  >
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Account No</th>
                    <th scope="col" >Balance</th>
                    <th scope="col" >Send Money From</th>
                </tr>
            </thead>
            <style>
                    .mybtn {

                        box-shadow: 2px 2px 10px black;
                        border-radius: 30px;
                        font-weight: bold;
                        background-color: lightgreen;
                        color: green;
                    }

                    .mybtn:active {
                        background-color: green;
                        color: lightgreen;
                    }
                    .table{
                        margin:auto;
                        width:50%;
                        padding:10px;
                        
                    }
                   
                   
                </style>
                <?php
echo "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
        echo    '
            <tr>
              <td>'.$row['name'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['accno'].'</td>
              <td>'.$row['blc'].'</td>
              <td style="padding:10px 10px 10px 10px">
              <a href="transfermoney.php?reads='.$row['accno'].'"
              <button type="button" class="btn mybtn btn-outline-light">Send Money</button>
              </a>
              </td>
            </tr>';
    }
    
    }
    echo "</tbody>";
?>
  
</body>
 </html>
