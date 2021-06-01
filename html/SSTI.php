<!DOCTYPE html>
<html>
<body>
<h1>SSTI</h1>


<?php echo $_POST["name"]."<br/ >"; ?>
<?php
require './vender/autoload.php';
Twig_Autoloader::register();
echo "1";
$loader = new Twig_Loader_String();
echo "1";
$twig = new Twig_Environment($loader);
echo "1";
    $output = $twig->render("Hi {$_POST['name']}");
    echo $output."erer";
    echo "1";
?>

</body>
</html>
