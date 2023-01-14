<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Apna Bank</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .blink {
                animation: blinker 1.5s linear infinite;
                color: red;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;"
                }
            }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="content">
            <div class="logo">
                <a href="#"></a>
                <img src="logoapna.png" alt="ApnaLOgo" height="120" width="120" />
            </div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li><a href="index.php">Home</a></li>
                <li><a href="customers.php">View All Customers</a></li>
                <li><a href ="transfermoney.php">Send Money</a></li>
                <li><a href="transactionhistory.php">Transaction History</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <div class="fullpage">
        <div class="banner"></div>

        <div class="center">
            <img src="logo.jpg" alt="ApnaLOgo" height="200" width="400" />
        </div>
        <marquee class="blink"  direction="left-right">
        <div class="tag"><strong>WELCOME TO APNA BANK</strong></div>
        </marquee>

    </div>
    
    <div class="container">
        <div class="image"> <img src="user.jpg" alt="userimage" height="200" width="400" />
            <div class="a1">
                <strong><a href="customers.php">View All Customers</a></strong>
                
            </div>
        </div>
        <div class="image"> <img src="transfer.jpg" alt="Transfer image." height="200" width="400" />
            <div class="a2">
                <strong><a href="transfermoney.php">Transfer Money</a></strong>
            </div>
        </div>
        <div class="image"><img src="tranhis.png" alt="transaction history" height="200" width="400" />
            <div class="a3">
                <strong><a href="transactionhistory.php">Transaction History</a></strong>
            </div>
        </div>

    </div>
        
    



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
    
  

  <!-- Footer -->
  <footer class="page-footer font-small blue" style="  display:inline; ">

<!-- Copyright -->
<div class="footer-copyright text-center py-3"style="padding-inline:40%;background-color:pink; font-color:violet;">©2020 Copyright:
  <a href="index.php">Apna.com</a>
  <h3>Apna Bank</h3>
            <p>kalyan</p>
            <h3>Contact information:</h3>
            <p>Mail Address: <a href="mailto:xyz@example.com">Apna123@gmail.com</a></p>
            <p>Postal Address: <i>123, Street 1, Colony 2, City, State, Country, 123123</i></p>
            <p>Tel. No. <i>123456</i></p>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

</body>

</html>