<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Manage. System</title>
    <link rel="stylesheet" href="style.css">
   <style>
        .utable
        {
            position: absolute;
            top: 48.5%;
        }
        th
        {
            font-size: 20px;
        }
        table tr td       
        {            
            border: 1px solid green;
            font-size: 18px;
            background-color: darkgrey;
        }
        .login{
            position: absolute;
            right: 5px;
            top: 3.5px;
            background-color: crimson;
            border-radius: 10px;
            padding: 22px 13px 22px 17px;
            margin: 0px 0px 0px 0px ;
            font-size: 25px;
            font-size: darkgray;                        
            outline: none;            
        }
        .login a
        {
            text-decoration: none;
            font-family: serif;
            font-weight: 800;
            color: white;
        }
        .sub{            
            
        }
       .sub input[type="submit"]
       {    
            position: absolute;
            top: 50%;
            left:39%;
            width: 22.2%;            
            background-color: crimson;
            padding: 13px 30px 13px 30px;
            font-size: 24px;
            font-weight: 800;
            color: beige;
            font-family: serif;
            border: none;
            border-radius: 10px;
       }
/*
        .login a
        {
            text-decoration: none;
            font-family: serif;
            font-weight: 800;
            color: white;
            
            
        }
*/
    </style>
</head>

<body>
    <h2 class="clsStuRes">Student Details</h2>
    <h4 class="login"><a href="http://localhost/sms/login.php">Login</a></h4>

    <!-- ***************** INPUT ELEMENTS IN FORM  **************** -->
    <form action="http://localhost/sms/index.php" method="post">
        <div class="all">
            <input type="text" name="class" placeholder="Enter Class" required="">
            <input type="text" name="rno" placeholder="Enter Roll NO." required="">
        </div>
        <div class="sub">
            <input type="submit" name="submit">
        </div>
    </form>
 </body></html> <?php
        
        if(isset($_POST['submit']))
        {
            include('dbconn.php');
            $roll = $_POST['rno'];
            $class = $_POST['class'];
            
            $sql = "SELECT * FROM `add_student` WHERE `roll_no`='$roll' AND `class`='$class'";
            
            $run = mysqli_query($conn,$sql);
            if(mysqli_num_rows($run)<1)
               {
                    echo "<tr><td colspan='7'>No Data Available</td></tr>";
               }
            else
               {
                   $count=0;                  
                   while($record = mysqli_fetch_assoc($run))
                   {
                       $count++;
                       // jaisa SEQENCE UPAR HAI <th> ME     WAISA HI YAHHAAN RAHEGA  //
                       ?>
                    <table class="utable">       <!----  table starts  --->
                        <tr>
                        <th>Sr.No.</th>
                        <th>Image</th>
                        <th>Class</th>
                        <th>Name</th>
                        <th>Roll No.</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        
                    </tr>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><img src="student_images/<?php echo $record['image'];?>" alt="Image" style="max-width:100px"/></td>

                        <td><?php echo $record['class'];?></td>
                        <td><?php echo $record['name'];?></td>
                        <td><?php echo $record['roll_no'];?></td>                        
                        <td><?php echo $record['addess'];?></td>
                        <td><?php echo $record['phone'];?></td>
                        <td><?php echo $record['email'];?></td>                        
                    </tr>                        
                </table>
        <?php
                   }
               }
        }
?>
