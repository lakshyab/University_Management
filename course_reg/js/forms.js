
function regformhash(form, Roll_No, ID, As, ctype, prewaiver, year, Sem) {
    // Check each field has a value
    if (Roll_No.value == '' || ID.value == '' || As.value == '' || ctype.value == '' || prewaiver.value == '' || year.value == '' || Sem.value == '' ) {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    console.log("Hello world!");
    form.submit();
    return true;
}
