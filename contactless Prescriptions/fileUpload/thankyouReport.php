<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div style="text-align:center;">
      <h1>Thank you!</h1>
      <p>Test Reports Sent.</p>
      <span id="timer"></span>
    </div>

<script type="text/javascript">
    var count = 5;
    var redirect = "https://www.nishanchettri.com/hackster01/fileUpload";
    function countDown()
    {
        var timer = document.getElementById("timer");
        if(count > 0)
            {
              count--;
              timer.innerHTML = "This page will redirect in "+count+" seconds.";
              setTimeout("countDown()", 1000);
            }

    else {
            window.location.href = redirect;
        }
    }
    countDown();
</script>
  </body>
</html>
