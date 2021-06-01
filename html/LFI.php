<!DOCTYPE html>
<html>
<body>
<h1>LFI</h1>

<?php echo $_POST["url"]."<br/ >"; ?>
<?php
    $url=file_get_contents($_POST['url']);
    echo nl2br($url);
?>

</body>
</html>
