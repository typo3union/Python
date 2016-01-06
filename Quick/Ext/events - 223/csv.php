<?php



//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1><br/><br/>";
		//readfile($_FILES['filename']['tmp_name']);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		
		echo '<pre>';
		print_r($data);
		echo '<./pre>';
	}

	fclose($handle);

	print "Import done";

	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='csv.php' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}

?>
