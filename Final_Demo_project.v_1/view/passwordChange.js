function passwordChangeForm(form){
    if((form.cpass.value != "")&&(form.npass.value != "")&&(form.rpass.value != "")){
        return true;
    }
    alert("Please provide all data first");
    return false;
}