<?php
// Defining the variables
$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    }else{
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
          
    }

    if(empty($_POST["gender"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
}

    }

    if(empty($_POST["gender"])){
        $genderErr = "No gender selected";
    }else{
        $gender = test_input($_POST["gender"]);
    }

    }

function test_input($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
Name: <input type="text" name="name">
<span class="error" style="color: red">*<?php echo $nameErr;?></span>
<br>

Email: <input type="email" name="email">
<span class="error" style="color: red">*<?php echo $emailErr;?></span>
<br>
Gender: 
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="other">Other
<span class="error" style="color: red">*<?php echo $genderErr; ?></span>
<br>
<input type="submit" value="Submit">
</form>