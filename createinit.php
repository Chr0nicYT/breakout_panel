<?php
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

function replace_in_file($FilePath, $OldText, $NewText)
{
    $Result = array('status' => 'error', 'message' => '');
    if(file_exists($FilePath)===TRUE)
    {
        if(is_writeable($FilePath))
        {
            try
            {
                $FileContent = file_get_contents($FilePath);
                $FileContent = str_replace($OldText, $NewText, $FileContent);
                if(file_put_contents($FilePath, $FileContent) > 0)
                {
                    $Result["status"] = 'success';
                }
                else
                {
                   $Result["message"] = 'Error while writing file';
                }
            }
            catch(Exception $e)
            {
                $Result["message"] = 'Error : '.$e;
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' is not writable !';
        }
    }
    else
    {
        $Result["message"] = 'File '.$FilePath.' does not exist !';
    }
    return $Result;
}


function rrmdir($dir) {
  if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file)
    if ($file != "." && $file != "..") rrmdir("$dir/$file");
    rmdir($dir);
  }
  else if (file_exists($dir)) unlink($dir);
} 

// copies files and non-empty directories
function rcopy($src, $dst) {
  if (file_exists($dst)) rrmdir($dst);
  if (is_dir($src)) {
    mkdir($dst);
    $files = scandir($src);
    foreach ($files as $file)
    if ($file != "." && $file != "..") rcopy("$src/$file", "$dst/$file"); 
  }
  else if (file_exists($src)) copy($src, $dst);
}



if (isset($_POST['create'])) {
$name = $_POST['servname'];
$jar = $_POST['servjar'];
$port = $_POST['servport'];
$rcon = $_POST['servrcon'];
$ram = $_POST['servram'];
$rpass = $_POST['rconpass'];
if (!isset($name) || trim($name) == '' || !isset($jar) || trim($jar) == '' || !isset($port) || trim($port) == '' || !isset($rcon) || trim($rcon) == '') {

print ("Error creating server");

}
else {
$euladir = 'servers/'.$name.'/eula.txt';
$euladummy = 'dummy/eula.txt';
$jardum = 'jars/'.$jar.'';
$jardir = 'servers/'.$name.'/server.jar';
$funcdum = 'dummy/servfunc.php';
$funcdir = 'servers/'.$name.'/servfunc.php';
//[START] Dash varibles, and server needs.
$edummy = 'dummy/edit.php';
$edir = 'servers/'.$name.'/edit.php';
$dashdir = 'servers/'.$name.'/index.php';
$dashdum = 'dummy/dash.php';

//CSS AND MORE IMPORTANT FILES!
$css = 'css/';
$js = 'js/.';
$fonts = 'fonts/';

$cssd = 'servers/'.$name.'/css/';
$jsd = 'servers/'.$name.'/js/';
$fontsd = 'servers/'.$name.'/fonts';

//[END] Dash varibles, and server needs.


$propdir = 'servers/'.$name.'/server.properties';
$propdum = 'dummy/server.properties';
$session = 'ses.php';
$sesdir = 'servers/'.$name.'/ses.php';
$reqrcon = 'dummy/rcon.php';
$reqrconpath = 'servers/'.$name.'/rcon.php';
mkdir('servers/'.$name.'/', 0777, true);
sleep(1);
copy($reqrcon, $reqrconpath);
copy($session, $sesdir);
copy($funcdum, $funcdir);
copy($euladummy, $euladir);
copy($jardum, $jardir);
copy($propdum, $propdir);
copy($edummy, $edir);
recurse_copy($css, $cssd);
recurse_copy($js, $jsd);
recurse_copy($fonts, $fontsd);
copy('dummy/console.php', 'servers/'.$name.'/console.php');
copy($dashdum, $dashdir);
copy('dummy/rcon.php' , 'servers/'.$name.'rcon.php');
sleep(1);
replace_in_file('servers/'.$name.'/console.php', "RCONPASSS", $rpass);
replace_in_file('servers/'.$name.'/console.php', "RCONPORTT", $rcon);
replace_in_file($propdir, "SERVPORTT", $port);
replace_in_file($propdir, "RCONPORTT", $rcon);
replace_in_file($dashdir, "SERVERNAMEHERETEST", $name);
replace_in_file($funcdir, "SERVNAMEFOLD", $name);
replace_in_file($funcdir, "SERVRAM", $ram);
replace_in_file($funcdir, "RCONPORTT", $rcon);
replace_in_file($funcdir, "RCONPASSS", $rpass);
replace_in_file($propdir, "RCONPASSS", $rpass);
//DO NOT EDIT THE FOLLOWING LINE (OR THIS FILE AT ALL TO BE HONEST)!!
exec('sudo iptables -D INPUT -p tcp -m tcp --dport '.$port.' -j ACCEPT');
sleep(1);
exec('sudo iptables -A INPUT -p tcp -m tcp --dport '.$port.' -j ACCEPT');
exec('sudo iptables-save');
}
}
?>
