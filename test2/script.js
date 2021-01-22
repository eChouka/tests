class Forms {
  
  constructor() {
    this.num = 0;
  }

  InsertNewForm(){
  	
    this.num++;
  	
    var e = document.createElement('div');
  	var element= document.getElementById('forms_container');
	  e.innerHTML = '<div id="form'+this.num+'" onsubmit="return false;" class="mform"><h3>Contact<button id="remove'+this.num+'" onclick="x.RemoveForm('+this.num+');">Remove</button></h3><div class="mform_field"><label>Name:</label><input type="text" name="names[]" id="name'+this.num+'" /><span id="name_msg'+this.num+'" >Invalid name.</span></div><div class="mform_field" ><label>Email:</label><input type="text" name="emails[]" id="email'+this.num+'" /><span id="email_msg'+this.num+'" >Invalid email.</span></div><div class="mform_field" ><label>Phone Number:</label><input type="text" name="phonenumbers[]" id="phonenumber'+this.num+'" /><span id="phonenumber_msg'+this.num+'" >Invalid phone number.</span></div></div>';

  	while(e.firstChild) {
      	element.appendChild(e.firstChild);
  	}
  	
  }
 
  ValidateForms(){

  	if(this.num>0)
  	{
  		var i;
  		for(i=0; i<=this.num; i++)
  		{

  			this.ValidateSingleForm(i);
  		}
  	}else{
  		this.ValidateSingleForm(0);
  	}

  }
  
  ValidateSingleForm(num){
  	//Name Validation for each form.
  	var name=document.getElementById('name'+num);
  	if(name){
  		var name=document.getElementById('name'+num).value;
  		var name_regex = /^[A-Za-z\s]+$/;
  		var name_result=name.match(name_regex);
	  	if(name_result==null)
	  	{
	  		document.getElementById('name_msg'+num).style.display = 'block';
	  	}else{
	  		document.getElementById('name_msg'+num).style.display = 'none';
	  	}
  	}
  	//Email Validation for each form.
  	var email=document.getElementById('email'+num);
  	if(email){
  		var email=document.getElementById('email'+num).value;
  		var email_regex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  		var email_result=email.match(email_regex);
	  	if(email_result==null)
	  	{
	  		document.getElementById('email_msg'+num).style.display = 'block';
	  	}else{
	  		document.getElementById('email_msg'+num).style.display = 'none';
	  	}
  	}
  	//PhoneNumber Validation for each form.
  	var phonenumber=document.getElementById('phonenumber'+num);
  	if(phonenumber){
  		var phonenumber=document.getElementById('phonenumber'+num).value;
  		var phonenumber_regex = /^\d+$/;
  		var phonenumber_result=phonenumber.match(phonenumber_regex);
	  	if(phonenumber_result==null)
	  	{
	  		document.getElementById('phonenumber_msg'+num).style.display = 'block';
	  	}else{
	  		document.getElementById('phonenumber_msg'+num).style.display = 'none';
	  	}
  	}
  	
  	
  	
  }

  RemoveForm(num){
  	document.getElementById('form'+num).remove();
  }

}

x=new Forms();

window.onload = function () {
	
  document.getElementById("add_contact").addEventListener("click", function(){ x.InsertNewForm() });
	document.getElementById("forms_validation").addEventListener("click", function(){ x.ValidateForms() });
	document.getElementById("save_form").addEventListener("click", function(){ document.getElementById('all_forms').submit() });

}