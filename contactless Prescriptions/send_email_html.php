<?php
$servername = "localhost";
$database = "db name";
$username = "db username";
$password = "db password"; 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['pid']) && isset($_GET['name'])&&isset($_GET['email'])&&isset($_GET['med'])&&isset($_GET['docname']))
	{
    $pid = $_GET['pid'];
    $name = $_GET['name'];
    $email=$_GET['email'];
   	$med = $_GET['med'];
  	$docname = $_GET['docname'];

    $sql = "INSERT INTO testTable (pid, name,email,med,docname) VALUES ('$pid', '$name', '$email','$med','$docname')";

	// set the location of the template file to be loaded
	$template_file = "./template_email_activation.php";

	// set the email 'from' information
	$email_from = "nishan chettri <admin@nishanchettri.com>";

	// create a list of the variables to be swapped in the html template
	$swap_var = array(
		"{SITE_ADDR}" => "https://www.nishanchettri.com",
		"{EMAIL_LOGO}" => "https://www.nishanchettri.com/hackster01/hospital/images/logo.png",
		"{EMAIL_TITLE}" => "Hello Here is your Prescription",
		"{TO_NAME}" => $name,
		"{TO_EMAIL}" => $email,
		"{MED}"=>$med,
		"{DOCNAME}"=>$docname,
	);

	// create the email headers to being the email
	$email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
	$email_headers .= "MIME-Version: 1.0\r\n";
	$email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // load the email to and subject from the $swap_var
	$email_to = $swap_var['{TO_EMAIL}'];
	$email_subject = $swap_var['{EMAIL_TITLE}']; // you can add time() to get unique subjects for testing: time();

	// load in the template file for processing (after we make sure it exists)
	if (file_exists($template_file))
		$email_message = file_get_contents($template_file);
	else
		die ("Unable to locate your template file");

	// search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
	foreach (array_keys($swap_var) as $key){
		if (strlen($key) > 2 && trim($swap_var[$key]) != '')
			$email_message = str_replace($key, $swap_var[$key], $email_message);
	}

	// display the email template back to the user for final approval
	//echo $email_message;

    // check if the email script is in demo mode, if it is then dont actually send an email
		if (mysqli_query($conn, $sql))
		    {
					// send the email out to the user
					if ( mail($email_to, $email_subject, $email_message, $email_headers) )
				{
				  //	echo '<hr /><center>Success! Your email has been sent to '. $email_to .'</center>';
				   header("Location:https://www.nishanchettri.com/hackster01/thankyou.php"); //redirect to
				}

				else
				{
					echo '<hr /><center> UNSUCCESSFUL... Your email was <b>NOT</b> sent. </center>';
				}

				}

	else {
		          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		    }

		    mysqli_close($conn);

}

?>
