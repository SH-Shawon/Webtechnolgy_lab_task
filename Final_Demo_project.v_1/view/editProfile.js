function editProfileForm(form){
    if((form.phone.value != "")&&(form.address.value != "")&&(form.pass.value != "")){
        return true;
    }
    alert("Please provide all data first");
    return false;
}