<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php
		
		// Identify the server information
		$servername = "localhost";
		$username = "sds9278"; // better to prompt the user for this
		$password = "fr1end"; // prompt the user for this too of course
		$dbname = "sds9278"; // the database name is your username on this server
		
		
		// Grab the user input from form if it exists
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		
		// Check if the form has been posted properly
		if (empty($name) || empty($comment)) {
		    echo "Please fill in a name AND comment";
		} else { // Name and comment are good, put them in the database
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    // Check connection
		    if ($conn->connect_error) {
		        die("Connection failed: " . $conn->connect_error);
		    }
		    $insert = "INSERT INTO Comments (Id, Name, Comment)
		    VALUES (
		    NULL , '". $name ."', '". $comment . "');";
		    
		    $result = $conn->query($insert);
		}
		
		// Create a connection to the server
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		
		// Create a query string
		$sql = "SELECT Id, Name, Comment FROM Comments";
		
		// Execute your query on the server connection
		$result = $conn->query($sql);
		
		// Check to see if results were found
		if ($result->num_rows > 0) {
		    // Output a table with row headers
		    echo '<table>'; 
		    echo '<tr>
		            <th>id</th>
		            <th>name</th>
		            <th>comment</th>
		        </tr>';
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>";
		        echo "<td>" . $row["Id"] . "</td>";
		        echo "<td>" . $row["Name"] . "</td>";
		        echo "<td>" . $row["Comment"] . "</td>";
		        echo "</tr>";
		    }
		    echo '</table>';
		}
		
		// NO results were found in the query
		
		else {
		    echo "0 results";
		}
		
		// close the connection to the database on the server
		
		$conn->close();
		?>
		
		<form name="OrderForm" action="blog.php"  onsubmit="return validateForm();" method="post">
		
		<p>Name:  <input type="text" name="name"  /></p>
		<p>Comment:  <input type="text"  name="comment"  /></p>
		
		<input type="submit"  name="Submit"  value=" Send Form"  />
		
		</p>
		</form>
	</body>
</html>