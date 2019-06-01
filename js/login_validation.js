	
	function validate(){

		error_log=validate_reg_no(form.reg_no.value);
		error_log+=validate_password(form.password.value);


				if(error_log==""){
					return true;}else{
					alert(error_log);
					return false;	
				}
	}






	function validate_reg_no(field){
	if(field==""||/[^a-zA-Z0-9-_@.\s\/]/.test(field)){
	form.reg_no.focus();
	return ("Please enter a valid registration number!\n");
	}else{
	return ("");
	}
	}
	
	function validate_password(field){
	if(field==""||!/[a-z]/.test(field)||!/[A-Z]/.test(field)||!/[0-9]/.test(field)||field.length<6){
	form.password.focus();
	return ("Please enter a valid password!\n");
	}else{
	return ("");
	}
	}