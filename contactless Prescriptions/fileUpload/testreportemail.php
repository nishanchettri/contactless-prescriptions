<?php
$servername = "localhost";
$database = "your db name";
$username = "your db username";
$password = "your db password";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST["submit"]))
	{
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $email=$_POST['email'];
  	$testername = $_POST['testername'];
    #retrieve file title
   $title = $_POST['title'];
   $file= $_POST['file'];
   #file name with a random number so that similar dont get replaced
    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

   #temporary file name to store file
   $tname = $_FILES["file"]["tmp_name"];

    #upload directory path
   $uploads_dir = 'uploads';
   move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $sql = "INSERT INTO testReports(pid, name,email,testername,title,file) VALUES ('$pid', '$name', '$email','$testername','$title','$pname')";

	// set the location of the template file to be loaded
	$template_file = "./template_email_report.php";

	// set the email 'from' information
	$email_from = "nishan chettri <admin@nishanchettri.com>";

	// create a list of the variables to be swapped in the html template
	$swap_var = array(
		"{SITE_ADDR}" => "https://www.nishanchettri.com",
		"{EMAIL_LOGO}" => "https://www.nishanchettri.com/hackster01/hospital/images/logo.png",
		"{EMAIL_TITLE}" => "Hello Here is your TEST REPORT",
		"{TO_NAME}" => $name,
		"{TO_EMAIL}" => $email,
		"{FILE}"=>$file,
		"{TESTERNAME}"=>$testername,
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
		        echo $file ;
					// send the email out to the user
					if ( mail($email_to, $email_subject, $email_message, $email_headers) )
				{
				  //	echo '<hr /><center>Success! Your email has been sent to '. $email_to .'</center>';
				  
				   header("Location:https://www.nishanchettri.com/hackster01/fileUpload/thankyouReport.php"); //redirect to
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
