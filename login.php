<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login Here</title>
</head>

<body>
    <!-- for "LOGIN" page CLASS prefix will be class = 'l___' -->
    <div class="lall">
        <form action="login.php" method="post">
            <img src="image/imageLogin.jpg" alt="LoginImage" class="limg">
            <h1 class="lh1">Login</h1>
            <input type="text" name="uname" class="luname" placeholder="Username">
            <input type="password" name="password" class=lupass placeholder="Password">
            <input type="submit" name="submit" value="Login" class="lsubmit">
        </form>

    </div>
</body>

</html>


<?php
    include("dbconn.php");
    
    if(isset($_POST["submit"]))     // when user entered its USERNAME and PASSWORD and click SUBMIT
    {
        $user = $_POST["uname"];
        $pass = $_POST["password"];
        $sqlcheck = "SELECT * FROM `login` WHERE `username`='$user' AND `password`='$pass'";
        //                          tbl             column1                 column2
        
        $run = mysqli_query($conn,$sqlcheck);   // run record aa gya //
                                                // yeh dbconn kaa $conn hai                      //       
        
        $row = mysqli_num_rows($run);
        if($row<1)
        {       // means THIS user has NO Account ...//
            
            ?>
            
        <script>
            alert("You don't have any Login Account with this Username");
        </script>

                            <!-- PHP KO close karo and JAVASCRIPT se alert() se user ko bataao ki account NHI Bana h-->
                            <!-- BUT ISSI BLOCK ME waapas se PHP TAG Open bhi kar lena warna ....:(-->         

            <?php           // it is REALLY VERY IMPORTANT TO "reopen" THE PHP TAG '<?php' before '{'
        }
        else                // YEH LAGAANA ...IMP HAI
        {
            // means THIS user has A Account ...//
            
            $data = mysqli_fetch_assoc($run);
            $id = $data["id"];
            session_start();
            $_SESSION['uid'] = $id;
            header('location: admin/admindashboard.php');
        }
    }
?>
