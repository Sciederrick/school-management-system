function validate(){

error_log=validate_cohort(form.cohort.value);

error_log+=validate_reg_no(form.reg_no.value);

error_log+=validate_name(form.name.value);

error_log+=validate_phone_number(form.phone_number.value);

error_log+=validate_email(form.email.value);

error_log+=validate_password(form.password.value);


	if(error_log==""){
		return true;
	}else{
			alert(error_log);
			return false;	
	}

}


	function validate_cohort(field){
	if(field==""||/[^0-9a-zA-Z.\s]/.test(field)||field.length<4){
	form.cohort.focus();
	return ("Enter a valid Cohort!\n");
	}else{
	return ("");
	}
	}

	function validate_reg_no(field){
	if(field==""||/[^0-9a-zA-Z\s\/]/.test(field)||field.length<6){
	form.reg_no.focus();
	return ("Enter a valid Registration Number!\n");
	}else{
	return ("");
	}
	}
	

	function validate_name(field){
	if(field==""||/[^a-zA-Z.\s]/.test(field)){
	form.name.focus();
	return ("Enter a valid Name!\n");
	}else{
	return ("");
	}
	}	


	function validate_phone_number(field){
	if(field==""||/[^0-9]/.test(field)||field.length<10){
	form.phone_number.focus();
	return ("Enter a valid phone number!\n");
	}else{
	return ("");
	}
	}

	function validate_email(field){
	if(field==""||field.indexOf("@")<=0||field.indexOf(".")<=0||/[^a-zA-Z0-9-_@.]/.test(field)){
	form.email.focus();
	return ("Enter a valid email!\n");
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
