function registrationForm(form){
    if((form.username.value != "")&&(form.fullname.value != "")&&(form.email.value != "")&&
    (form.address.value != "")&&(form.nidnumber.value != "")&&(form.phnnumber.value != "")&&
    (form.password.value != "")){
        return true;
    }
    alert("Please provide all data first");
    return false;
}