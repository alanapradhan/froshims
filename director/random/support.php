<?php 
	require_once('includes/reset_session.php'); 
	require_once('includes/common.php');
	if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
		header('http://www.appsuccess.org');
	}
	
	if (isset($_POST['url']) && isset($_POST['applicant']) && isset($_POST['mentor']) && isset($_POST['name'])) {
		$url = mysql_real_escape_string($_POST['url']);
		$applicant = mysql_real_escape_string($_POST['applicant']);
		$mentor = mysql_real_escape_string($_POST['mentor']);
		$name = mysql_real_escape_string($_POST['name']);
		
		$query = sprintf("SELECT * FROM `applicants` WHERE `email`='%s'", $applicant);
		$result = mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($result) == 1) {
			$applicant = mysql_fetch_assoc($result);
			$query = sprintf("SELECT * FROM `mentors` WHERE `email`='%s'", $mentor);
			$result = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($result) == 1) {
				$mentor = mysql_fetch_assoc($result);
				$query = sprintf("INSERT INTO `documents` (`name`,`url`,`applicant_id`,`mentor_id`) VALUES ('%s', '%s', '%s', '%s')", $name, $url, $applicant['id'], $mentor['id']);
				$result = mysql_query($query) or die(mysql_error());
				if ($result) {
					$error = false;
					$message = "Document added";
				}
				else {
					$error = true;
					$message = "Document could not be added";
				}
			}
			else {
				$error = true;
				$message = "Mentor not found";
			}
		}
		else {
			$error = true;
			$message = "Applicant not found";
		}
	}
	print_header('Documents');
?>
<script type="text/javascript">
$(document).ready(function() {
	$('#documents-table').dataTable({
		"oLanguage": {
			"sLengthMenu": "Display <select><option value=\"10\">10</option><option value=\"25\">25</option><option value=\"50\">50</option><option value=\"100\">100</option><option value=\"500\">500</option><option value=\"1000\">1000</option></select> records per page"
		}
	});
	
	var mentors = [
		<?php
		$query = sprintf("SELECT * FROM `mentors`");
		$result = mysql_query($query) or die(mysql_error());
		
		while ($row = mysql_fetch_assoc($result)) {
			echo "\"".htmlentities($row['email'])."\", ";
		}
		?>
	];
	
	$( "#mentor" ).autocomplete({
		source: mentors
	});
	
	var applicants = [
		<?php
		$query = sprintf("SELECT * FROM `applicants`");
		$result = mysql_query($query) or die(mysql_error());
		
		while ($row = mysql_fetch_assoc($result)) {
			echo "\"".htmlentities($row['email'])."\", ";
		}
		?>
	];
	
	$( "#applicant" ).autocomplete({
		source: applicants
	});
});
</script>
<?php if (isset($error)) { echo '<div style="padding: 5px; border: 1px solid black; float: right; color: '; if ($error) { echo 'red'; } else { echo 'green'; } echo ';">'.htmlentities($message).'</div>'; } ?>
<h1>Documents</h1>

<?php 
$query = sprintf("SELECT * FROM `documents`");
$result = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($result) > 0) {
	echo '<table id="documents-table" style="width: 100%; display: inline-table;">';
	echo '<thead><th>ID</th><th>Document Name</th><th>Applicant</th><th>Mentor</th></thead><tbody>';
	while ($document = mysql_fetch_assoc($result)) {
		unset($mentor);
		unset($applicant);
		
		$query2 = sprintf("SELECT * FROM `mentors` WHERE `id`='%s'", $document['mentor_id']);
		$result2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($result2) == 1) {
			$mentor = mysql_fetch_assoc($result2);
		}
		
		$query2 = sprintf("SELECT * FROM `applicants` WHERE `id`='%s'", $document['applicant_id']);
		$result2 = mysql_query($query2) or die(mysql_error());
		if (mysql_num_rows($result2) == 1) {
			$applicant = mysql_fetch_assoc($result2);
		}
		
		echo '<td><a href="document-profile.php?id='.htmlentities($document['id']).'">'.htmlentities($document['id']).'</a></td>';
		echo '<td><a href="'.htmlentities($document['url']).'">'.htmlentities(str_replace("\\", "", $document['name'])).'</a></td>';
		echo '<td>';
		if (isset($applicant)) {
			echo '<a href="applicant-profile.php?id='.htmlentities($applicant['id']).'">'.htmlentities($applicant['first_name']).' '.htmlentities($applicant['last_name']).'</a>';
		}
		else {
			echo 'No applicant';
		}
		echo '</td>';
		echo '<td>';
		if (isset($mentor)) {
			echo '<a href="mentor-profile.php?id='.htmlentities($mentor['id']).'">'.htmlentities($mentor['first_name']).' '.htmlentities($mentor['last_name']).'</a>';
		}
		else {
			echo 'No mentor';
		}
		echo '</td>';
		echo '</tr>';
		
	}
	echo '</tbody>';
	echo '</table>';
	
}
else {
	echo "No documents found.";
}
?>
<h2>Add a Document</h2>
<form method="post">
<label for="url">Document URL</label>
<input type="text" name="url" id="url" />
<label for="name">Name</label>
<input type="text" name="name" id="name" />
<label for="applicant">Applicant</label>
<input type="text" name="applicant" id="applicant" />
<label for="mentor">Mentor</label>
<input type="text" name="mentor" id="mentor" />
<button style="margin: 0px auto 0px; float: none;" type="submit">Add Document</button>
</form>
<?php print_footer(); ?>