function productManageForm(form){
    if((form.producttype.value != "")&&(form.productname.value != "")&&(form.companyname.value != "")&&
    (form.description.value != "")){
        return true;
    }
    alert("Please provide all product data first");
    return false;
}