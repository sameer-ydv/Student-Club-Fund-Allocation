function validate(){
    if(document.getElementById("username").value === "admin@xyz"&& document.getElementById("password").value === "admin123" )
    {
        alert( "VALIDATION SUCCESS!!!!");
        return true;
    }
    else{
        alert("VALIDATION FAILED!!!!");
        return false;
    }
}