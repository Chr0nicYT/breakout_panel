<?php
if (isset($_POST['control'])) {
$name = $_POST['cname'];
header('location: servers/'.$name.'/');
}
?>
