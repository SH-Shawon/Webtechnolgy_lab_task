function loginForm(form){
    if((form.username.value != "")&&(form.password.value != "")){
        return true;
    }
    alert("Please provide all data first");
    return false;
}