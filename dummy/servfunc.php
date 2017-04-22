<?php
//Functions
function rrmdir($dir) {
  if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file)
    if ($file != "." && $file != "..") rrmdir("$dir/$file");
    rmdir($dir);
  }
  else if (file_exists($dir)) unlink($dir);
} 
?>


<?php
if (isset($_POST['start'])) {
header('location: index.php');
exec('java -jar -XmxSERVRAMM server.jar > /dev/null &');
//Add "running" file
mkdir("running", 0700);
}
if (isset($_POST['stop'])) {
//Send stop command to RCON and remove "running" file
require_once('rcon.php');

$host = 'localhost'; // Server host name or IP
$port = RCONPORTT;                      // Port rcon is listening on
$password = 'RCONPASSS'; // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
  $rcon->sendCommand("stop");
}
exec('rm -rf running');
}
if (isset($_POST['restart'])) {
//Send stop command to RCON than sleep for 3 seconds before executing cmd below
require_once('rcon.php');

$host = 'localhost'; // Server host name or IP
$port = RCONPORTT;                      // Port rcon is listening on
$password = 'RCONPASSS'; // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
  $rcon->sendCommand("stop");
}
sleep(3);
//START
header('location: index.php');
exec('java -jar -XmxSERVRAMM server.jar > /dev/null &');
}
if (isset($_POST['delete'])) {
exec('rm -rf ../SERVNAMEFOLD/');
header('location: ../../index.php');
}
if(isset($_POST['console'])) {
header('location: console.php');
}
if(isset($_POST['refcon'])) {
header('location: console.php');
}
?>
