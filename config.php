 <?php
	$servername = "localhost";
	$username = "u630873190_trustlibdb";
	$password = 'r?2X9oU$rPDV';
	$database ="u630873190_libtrust";
	// Create connection
	$con = mysqli_connect($servername, $username, $password,$database);

	// Check connection
	if (!$con) {
	  die("Connection failed: " . mysqli_connect_error());
	}
?> 
