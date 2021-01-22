<?php

include('FileSystem.php');

Class UploadSystem extends FileSystem {

	function FileParse(){
		$file=$_FILES['xfile'];
		  $fn = fopen($file['tmp_name'],"r");
		  while(! feof($fn))  {
			$line = fgets($fn);
			if($line!=''){
				$escaped=mysqli_real_escape_string($this->db_connection, $line);
				$sql="INSERT INTO filesystemlist (xpath) VALUES ('$escaped')";
				$this->SQLQueryExec($sql);
				
			}
		  }
		  fclose($fn);
		  return $html='<p align="center" ><b>File Added successfully into the Database</b></p>';
	}

	function HTMLForm(){
		$html='<h1 align="center">Upload</h1>
			<form align="center" class="search_form" action="upload.php" enctype="multipart/form-data" method="POST">
				<input type="file" class="search_field" name="xfile">
				<input type="submit" class="search_button" name="Search">
		</form>';
		return $html;
	}
	function FormRender(){
		$html=$this->HeaderHTML();
		
		if(isset($_FILES['xfile']) && $_FILES['xfile']['error'] === UPLOAD_ERR_OK)
		{
			$html.=$this->FileParse();
		}

		$html.=$this->HTMLForm();
		$html.=$this->FooterHTML();
		
		echo $html;
	}
}