/* PANASHE TARUWINGA
09922023

VALIDATING THE REGISTRATION PROCESS
*/
var signupValidation = function(form){
    let user_name, email_state, password_state;
    let username = document.getElementById("username").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    
    //the regex for both the username and email
    var regName = /^[a-z0-9_-]{3,16}$/;
    var regEmail = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,10})+$/;

 
    
    // testing username against the regex
    if (!regName.test(username)){
        alert("Please enter your user name correctly. Please do not use special characters or numbers.");
        user_name = false;
        return false;
    }else{
        user_name = true;
    }
    
    //testing email against the regex
    if (!regEmail.test(email)){
        alert("Please enter your email correctly.");
        email_state = false;
        return false;
    }else{
        email_state = true;
    }

    // testing if the entered passwords match
    if (password === confirm_password){
         password_state = true;
    }else{
        alert("Password must match!.");
    }
    
    // if all the above conditions are passed, set those credentials to final state
    // else raise a warning
    let finalSate = user_name && email_state && password_state;

    if (!finalSate){
        return false
    }else{
        localStorage.setItem('username', user_name);
        localStorage.setItem('email', email);
        localStorage.setItem('password', password);
        //window.location.href = "registerprocess.php";
    }

}
