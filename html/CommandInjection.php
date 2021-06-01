<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='content-type' , content='text/html'; charset='UTF-8'>
    </head>
<body>
<h1>Xml Injection</h1>

<?php

if (isset ($_GET['ip']) ) {
    $target = $_GET[ 'ip' ];
    //echo "target: ".$target;
    $cmd = shell_exec($target );
    // $cmd = shell_exec( "cat /etc/passwd&" );
    echo "<pre>".$cmd."</pre>";
    //echo "Root:.:0:0";
}

?>

</body>
</html>
