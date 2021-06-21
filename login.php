<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP IO</title>
</head>
<body>
<h1>PHP IO</h1>

 <?php
define("filepath", "data.txt");

            $userName = $password = "";
            $userNameErr = $passwordErr = "";
            $successMessage = $messageErr ="";
            $flag = false;
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $userName = $_POST['userName'];
                $password = $_POST['password'];

                if(empty($userName)) {
                    $userNameErr = "User name cannot be empty!";
                    $flag = true;
                }
                if(empty($password)){
                    $passwordErr = "password cannot be empty!";
                    $flag = true;
                }
                if(!$flag){
                    
                    $res1 = write($data);
                    if($res1) {
                        $successMessage = "Successfully saved.";
                    }
                    else{
                        $errorMessage = "Error while saving!";
                    }

                }
            }

            function write($content){
                $resource = fopen(filepath, "a");
                $fw = fwrite($resource, $content."
            \n");
            fclose($resource);
             return $fw;
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
        method="POST">
        <label for="userName">Username:</label>
        <input type="text" id="userName" name="userName" >
        <span style = "color : red;"><?php echo $userNameErr;?></span> <br> <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >

        <span style = "color : red;"><?php echo $passwordErr;?></span> <br> <br>

        <input class="register_button" type="submit" value="LOGIN">
        </form>
        <span style = "color : green"><?php echo $successMessage; ?> </span> 
        <span style = "color : red"><?php echo $messageErr; ?> </span>


</body>
</html>