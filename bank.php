<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Bank Customer Details</title>
    <style>
        .container{
            height:700px;
            width: 600px;
            padding:20px;
            margin-top:30px;
            background-color:palegreen;
            color:blue;
            text-align:center;
            border-radius:20px;
            box-shadow:0px 0px 10px green;
            

        }

        h2{
            font-weight:400px;
            margin-top:10px;
        }

        form{
            text-align:center;
            margin-top:20px;

        }

        input[type="button"]:hover{
            background-color:pink;
            color:red;
        }

        .result{
            height:280px;
            width: 100%;
            margin-top:20px;
            background-color:skyblue;
            border-radius:20px;
        }
        </style>
    
    <script>

        function validateForm(){
            let name=document.forms["bankForm"]["name"].value;
            let email=document.forms["bankForm"]["email"].value;
            let mobile=document.forms["bankForm"]["mobile"].value;
            let age=document.forms["bankForm"]["age"].value;

            if(name==""){
                alert("Enter your name!");
                return false;
            }

             if(email==""){
                alert("Enter your email!");
                return false;
            }
             if(age==""){
                alert("Enter your age!");
                return false;
            }

            let emailPattern=/^[^]+@[^]+\.[a-z]{2,3}$/;

            if(!email.match(emailPattern)){
                alert("Please enter valid email!");
                return false;
            }

            let mobilePattern=/^[0-9]{10}$/;

            if(!mobile.match(mobilePattern)){
                alert("Please enter 10 digit...");
                return false;
            }

            return true;
        } 

        function calculateInterest(){
            let principal=parseFloat(document.getElementById("principal").value);
            let rate=parseFloat(document.getElementById("rate").value);
            let time=parseFloat(document.getElementById("time").value);
            let interest=(principal*rate*time)/100;
            document.getElementById("interestResult").innerHTML=
            "Simple interst=  RS" +interest;

            document.getElementById("interest").value = interest;
        }

        
     </script>   
</head>
<body>
    <div class="container">

    <h2>Bank Details</h2>
        <form name="bankForm"
              method="POST"
              onsubmit="return validateForm()">

              name:<input type="text" name="name" value="name"><br><br>
              email:<input type="text" name="email" value="email"><br><br>
              age:<input type="number" name="age" value="age"><br><br>
              mobile:<input type="number" name="mobile" value="mobile"><br><br>

            
            principal:<input type="number" id="principal" name="principal"><br><br>
            rate:<input type="number" id="rate" name="rate"><br><br>
            time:<input type="number" id="time" name="time"><br><br>
            
            <input type="hidden" name="interest" id="interest">

            <button type="button" onclick="calculateInterest()">
                calculateInterest
            </button><br><br>

            <h3 id="interestResult"></h3>
            
            <input type="submit" value="Submit details">

</form>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST['name'];

    $email=$_POST['email'];

    $age=$_POST['age'];

    $mobile=$_POST['mobile'];

    $principal=$_POST['principal'];

    $rate=$_POST['rate'];

    $time=$_POST['time'];

    $interest=$_POST['interest'];

    echo"<div class='result'>";

    echo"<h2>Person details</h2><br>";

    echo"name:$name<br>";

    echo"email:$email<br>";

    echo"age:$age<br>";

    echo"mobile:$mobile<br>";

    echo"principal:$principal<br>";

    echo"rate:$rate<br>";

    echo"time:$time<br>";

    echo"interest:$interest<br>";

    echo"</div>";
}
?>
</div>
</body>
</html>