TEST 1, TEST 2

I have implemented the TEST 1, and TEST 2 with the requirements given on them description. 

My solutions and approaches on the problems solving that we have to implement they are not absolute, of course there are and other solutions that can bring the same results. However me I tried to avoid "impressive solutions" and preferred to choose more simple and focus on fulfilling of the requirements.

TEST 1 ::

There are 2 php Classes:
- FileSystem Class
	- This Class contains the FileSystem, which means the Database Connection and Database Queries handling, Also the search and results finding in the FileSystem records. 
- UploadSystem Class (which extends the FileSystem Class)
	- This Class contains the UploadSystem, which extends the FileSystem Class, and implements the part of Uploading the text file and inserting the Data into the Database. 

There are 2 php files:
	- index.php 
		This php file runs the FileSystem Class. 
	- upload.php
		This php file runs the UploadSystem Class.

The are also a styles.css (stylesheet file for the CSS) , a test1.sql which contains the database table structure, and a text.txt which contains the filesystem data that needs to be imported to the DB. 

To run the TEST1 please follow the below steps ::

	- Create a database and import the test1.sql to your local database.
	- Open the FileSystem.php with an php editor and update the DB credentials $servername, $username, $password, $dbname to your local DB Credentials. 
	- Open the upload.php with a browser and on the Upload form that it will appear , please upload the text.txt that is inside the test1 folder test1/text.txt. 
	- Open the index.php with a browser and then search 'image' and check the results. 


TEST 2 ::

There is 1 php Class:
- FormClass Class
	- This Class contains the Form Class Validation and Saving methods. 

There is 1 php file:
- index.php
	- This file contains the multiple forms frontend and also runs the FormClass and includes and the javascript validations. 

There are 1 script.js which has the Javasript Class including its validation, a style.css which contains the CSS. 

To run the TEST2 please follow the below steps ::
	
	- Open the index.php with a browser and then you can press on the right the button Add Contact to add couple of forms, then you can fill the forms with same data and press check if the data are valid, if they are not valid then it will appear a red message under the invalid data text field, then when the data are valid you can press the button on top right "Save" and this will submit the data, if the data are valid then they will get saved if not the red messages will appear under the invalid text fields and the save will be avoided. 
	- If you manage to submit validated data then please check the text file text.txt which has been created and contains the saved valid data which you submitted. 

Thank you. 
