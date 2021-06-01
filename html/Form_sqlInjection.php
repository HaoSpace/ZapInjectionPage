<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>input sql</title>
    </head>
    <body>
    <?php  echo "<br />SQL Injection Test<br />"; ?>
        <form action="">
            nname: <input type="text" name="uname">
            pwd: <input type="text" name="pwd">
            <input type="submit" value="ssubmit">

        </form>

        <?php 
            $login_user = $_GET["uname"];
            $login_pwd = $_GET["pwd"];
            echo "check User: ". $login_user. "<br />";
            echo "check pwd: ".$login_pwd;

            $db_host="localhost";
            $db_user="phpmyadmin";
            $db_passwd="123456";
            $db_name="phpmyadmin";

            $conn = new mysqli($db_host, $db_user, $db_passwd, $db_name);

            if (mysqli_connect_error()){ 
                die("failed: ".$conn->connect_error);
            }
            echo "<br />SQL success<br />";

            // $result = mysqli_query($conn, "SELECT * FROM users WHERE name='".$login_user."'");
            $result = mysqli_query($conn, "SELECT * FROM users WHERE name LIKE'".$login_user."' AND pwd LIKE'".$login_pwd."'");
            $row=mysqli_fetch_array($result);
            if (!empty($row)) {
                echo "found<br />";

                echo "password is ".$row['pwd'];
            }
            // if ($result) {
            //     echo "found<br />";
            //     $row=mysqli_fetch_array($result);

            //     if ($login_pwd == $row['pwd']) {
            //        echo "login sucess";
            //     } else {
            //         echo "password is wrong".$row['pwd'];
            //     }
            // }
            else {
                echo "not found";
            }
        ?>
    </body>
</html>