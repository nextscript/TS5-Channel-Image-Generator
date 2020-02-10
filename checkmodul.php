<?php
echo '<b>PHP Version 5.6 or higher?:</b><hr />';
$ver = (float)phpversion();
if ($ver >= '5.6') {
echo 'PHP ' . $ver . '.x  INSTALLED<hr />';
}else{
echo 'Please Update your PHP Version!<hr />';
}
echo '<b>Module Installed?:</b><hr />';
if (!extension_loaded('gd')) {
    if (!dl('gd.so')) {
        echo "PHP5-GD IS NOT INSTALLED";
    }
	
}else{
echo "PHP5-GD IS INSTALLED";
}
echo '</br>';
// Script to test if the CURL extension is installed on this server

// Define function to test
function _is_curl_installed() {
    if  (in_array  ('curl', get_loaded_extensions())) {
        return true;
    }
    else {
        return false;
    }
}

// Ouput text to user based on test
if (_is_curl_installed()) {
  echo "PHP5-CURL IS INSTALLED";
} else {
  echo "PHP5-CURL IS NOT INSTALLED";
}
echo '</p><b>Function Enabled?:</b><hr />';
if (headers_sent()) {
    die("Headers_sent NOT WORKS");
}
else{
   echo 'Headers_sent IS WORKING';
}
echo '</p>';
$datei=$_SERVER['SCRIPT_NAME'];



// Start Session
session_start();
// Show banner
echo '<b>Session Support Checker</b><hr />';
// Check if the page has been reloaded
if(!isset($_GET['reload']) OR $_GET['reload'] != 'true') {
   // Set the message
   $_SESSION['MESSAGE'] = 'Session support enabled!<br />';
   // Give user link to check
   echo '<a href="?reload=true">Click HERE</a> to check for PHP Session Support.<br />';
} else {
   // Check if the message has been carried on in the reload
   if(isset($_SESSION['MESSAGE'])) {
      echo $_SESSION['MESSAGE'];
   } else {
      echo 'Sorry, it appears session support is not enabled, or you PHP version is to old. <a href="?reload=false">Click HERE</a> to go back.<br />';
   }
}
?>
