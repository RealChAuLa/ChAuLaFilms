<?php
session_start();
$_SESSION["loggedin"] = null;
$_SESSION["userid"] = null;
$_SESSION["uName"] = null;
$_SESSION["userNo"] = null;
$_SESSION["type"] = null;
echo '<html><script>alert("Succesfully Logged Out"); setTimeout(function() { window.history.go(-1); }, 50);</script></html>';
