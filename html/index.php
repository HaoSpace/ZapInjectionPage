<!DOCTYPE html>
<html>
<body>
<h1>Injection Index</h1>

<?php

$glob = glob("{*.php,*.html}", GLOB_BRACE);

foreach($glob as $file) {
    if (strpos($file, "Form_") !== false) {
        if (filetype($file) == "html") {
            $pageName = substr($file, 5, strlen($file) - 10);
            $pageName = str_replace("Injection", " Injection", $pageName);
            echo '<h5><a href='.$file.'>'.$pageName.'</a><h5><br />';
        }
        else {
            $pageName = substr($file, 5, strlen($file) - 9);
            $pageName = str_replace("Injection", " Injection", $pageName);
            echo '<h5><a href='.$file.'>'.$pageName.'</a><h5><br />';
        }
    }
}

?>

</body>
</html>