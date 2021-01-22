<?php 

Class FileSystem {
	public $db_connection;
	public $results;
	function __construct()
	{
		// db credentials
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test1";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$this->db_connection=$conn;
	}

	function __destruct(){
		$this->db_connection->close();
	}

	function SQLQueryExec($sql){
		return $this->db_connection->query($sql);
	}

	function HeaderHTML(){
		$html='<!DOCTYPE html>
		<html>
			<head>
				<title>Search File</title>
				<link rel="stylesheet" href="styles.css">
			</head>
		<body>';
		return $html;
	}

	function MainHTML($s){
		$html='<h1 align="center">Search</h1>
			<form align="center" class="search_form" action="index.php" method="POST">
				<input type="text" class="search_field" value="'.$s.'" name="s">
				<input type="submit" class="search_button" name="Search">
		</form>';
		return $html;
	}

	function ResultsTableHTML(){
		$html='<h1 align="center">Results</h1>
		<table border="1" class="results_table">
			<thead><tr>
				<td>Path</td>
			</tr></thead>
			<tbody>';
			$html.=$this->ResultsRowHTML();
			$html.='</tbody>
			</table>';
			return $html;
	}

	function ResultsRowHTML(){
		$html='';

		if ($this->results->num_rows > 0) {
		  // output data of each row
		  while($row = $this->results->fetch_assoc()) {
		    $id=$row['id'];
		    $xpath=$row['xpath'];;
		    $html.='<tr>
				<td>'.$xpath.'</td>
			</tr>';
			
		  }
		} else {
		  $html.='<tr>
				<td>0 results</td>
			</tr>';
		}
		return $html;
	}

	fUnction FooterHTML(){
		$html='</body></html>';
		return $html;
	}

	function HTMLRender()
	{	
		// header view 
	$html=$this->HeaderHTML();
	 // main page component and view, including the logic , which brings the main form and the results on the form search.
	if(isset($_POST['s']) && $_POST['s']!='') {
		$s=$_POST['s'];
		$html.=$this->MainHTML($s);
		$esc_s=mysqli_real_escape_string($this->db_connection, $s);
		$sql = "SELECT * FROM filesystemlist WHERE xpath LIKE '%".$esc_s."%'";
		$this->results = $this->SQLQueryExec($sql);
		$html.=$this->ResultsTableHTML();
	 }else{
	 	$html.=$this->MainHTML('');
	 }
	 // the footer view
	 $html.=$this->FooterHTML();
		echo $html;
	}
}
