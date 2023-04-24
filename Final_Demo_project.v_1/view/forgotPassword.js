function forgotPasswordForm(form){
    if((form.email.value != "")){
        return true;
    }
    alert("Please provide a data first");
    return false;
}