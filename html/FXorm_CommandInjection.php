<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='content-type' , content='text/html'; charset='UTF-8'>
    </head>
<body>
<h1>Command Injection</h1>

<form action="">
            ip: <input type="text" name="ip">
            <input type="submit" value="ssubmit">

</form>
<?php 
//echo $_GET["ip"]; 
?> 
<?php

if (isset ($_REQUEST['ip']) ) {
    $target = $_REQUEST[ 'ip' ];
    //echo "target: ".$target;
    $cmd = shell_exec( "ping  -c 4 " . $target );
    // $cmd = shell_exec( "cat /etc/passwd&" );
    echo "<pre>".$cmd."</pre>";
    // echo "Root:.:0:0";
}
?>

</body>
</html>
