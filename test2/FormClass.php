<?php 

Class FormClass {

	function Validation(){
		
		$check=0;
		$dts=array('names'=>[], 'emails'=>[], 'phonenumbers'=>[]);
		
		if(isset($_POST['names']) && isset($_POST['emails']) && isset($_POST['phonenumbers'])){
			
			$names=$_POST['names'];
			$emails=$_POST['emails'];
			$phonenumbers=$_POST['phonenumbers'];
			// Validation names, emails and phone numbers for each form, for a possible failure, if does not catch at least one then the check=0 becomes check=1 and also the index of the form element submmited gets saved , so we can indentify later which element on which form had the failure. 
			foreach ($names as $key=>$value) {
				
				$regex='/^[A-Za-z\s]+$/';

				if(preg_match($regex, $value)!=1)
				{	
					array_push($dts['names'], $key);
					$check=1;
				}else{
				}

			}
			
			foreach ($emails as $key=>$value) {

				$regex='/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';

				if(preg_match($regex, $value)!=1)
				{
					array_push($dts['emails'], $key);
					$check=1;
				}else{
				}

			}
			
			foreach ($phonenumbers as $key=>$value) {
				
				$regex='/^\d+$/';
				if(preg_match($regex, $value)!=1)
				{
					array_push($dts['phonenumbers'], $key);
					$check=1;
				}else{
				}

			}
			if($check==0){
				// if are no failures on the validation checks above, then we do save the data in text file. 
				$this->SaveTextFile($names, $emails, $phonenumbers);
			}
		}

		return array('dts'=>$dts, 'forms'=>array('names'=>$names, 'emails'=>$emails, 'phonenumbers'=>$phonenumbers));
	}

	function SaveTextFile($names, $emails, $phonenumbers){
		// Creation or open an existing text.txt and save new data due to append * method which means it keeps the brevious existing data and it adds the new one in the end of the file with a empty line space between each new entry of block data. 
		$txtfile = fopen("text.txt", "a") or die("Unable to open file!");
		
		foreach ($names as $key => $value) {
			
			$name="Name: ".$names[$key]."\n";
			fwrite($txtfile, $name);
			$email="Email: ".$emails[$key]."\n";
			fwrite($txtfile, $email);
			$phonenumber="Phone Number: ".$phonenumbers[$key]."\n";
			fwrite($txtfile, $phonenumber);
			fwrite($txtfile, PHP_EOL);

		}

		fclose($txtfile);
	}

}




?>