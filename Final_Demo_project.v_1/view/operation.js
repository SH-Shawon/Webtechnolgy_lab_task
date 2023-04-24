function operationForm(form){
    if((form.addquantity.value != "")||(form.actualprice.value != "")){
        return true;
    }
    alert("Please provide at least one data first");
    return false;
}