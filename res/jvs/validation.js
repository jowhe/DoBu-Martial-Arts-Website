var cPage = window.location.href;
var emailOK = false;
var passwOK = false;

UpdateText();

if(cPage.includes("register.php")  || cPage.includes("reset-password")){
    // Register Validation
    
    // Variables for inputs
    var emailInput = document.getElementById("eInput");
    var passwInput = document.getElementById("pInput");
    var passcInput = document.getElementById("cpInput");
    
    // Variables for errors
    var emailError = document.getElementById("emailerr");
    var passwError = document.getElementById("passwerr");
    var passcError = document.getElementById("passwcerr");
    
    // functions
    function Validate(){
        if(emailInput.value != ""){
            checkEmail();
        }else{
            emailError.style.display = "block";
            emailError.style.visibility = "visible";
            emailError.innerHTML = "Please enter a valid email address!";
        }
        
        if(passwInput.value != ""){
            checkPassword();
        }else{
            passwError.style.display = "block";
            passwError.style.visibility = "visible";
            passwError.innerHTML = "Please enter a valid password!";
        }
    }
    
    // Variable to store a temporary value, this value gets stored at when the email entered is in correct format,
    // once stored it isn't changed and is only compared with to see if the user has changed their email input.
    var tempEmail = null;
    
    
    // Check email function, this will check to see if an email has been entered and if it contains one of the domains below, 
    // these can be added upon to cover a wider range of domains.
    function checkEmail(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            if(this.responseText == "true"){
                emailError.innerHTML = "This email already exists!";
            }else{
                var domains = ["gmail.com", "outlook.co.uk", "hotmail.com"];
        
                var i = emailInput.value.split("@");
                if(emailInput.value != tempEmail)
                {   emailError.style.display = "block";
                    emailError.style.visibility = "visible";
                    emailError.innerHTML = "Email does not contain<br> (@gmail.com, @outlook.co.uk or @hotmail.com)";
                }

                function checkDomains(item, index, arr){
                    if(arr[index] == i[1]){
                        if(emailInput.value.includes(arr[index])){
                            emailError.style.display = "none";
                            emailError.style.visibility = "hidden";
                            tempEmail = emailInput.value;
                            emailOK = true;
                            return true;
                        }else{
                            emailError.style.display = "block";
                            emailError.style.visibility = "visible";
                            emailOK = false;
                            return false;
                        }
                    }
                }

                domains.forEach(checkDomains);
            }
        }
        xhttp.open("GET", "_/emailcheck.php?q="+emailInput.value);
        xhttp.send();
    }
    
    // Variable to store a temporary value, this value gets stored when a password is entered and meets the criteria,
    // once stored it isn't changed and is only compared with to see if the user has changed their password, 
    // this variable is also used when checking the password confirmation.
    var tempPass = null;
    
    function checkPassword(){
        if(passwInput.value != tempPass){
            passwError.style.display = "block";
            passwError.style.visibility = "visible";
            passwError.innerHTML = "Please enter a valid password!";
        } 
        
        // Special Characters to choose from.
        // There is an anlternative method to getting these using RegExp, however this method allows for custom characters.
        var specialChars = ["\!", "\"", "\£", "\$", "\^", "\&", "\*", "\(", "\)", "\_", "\\", "\+", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "\-", "\=", "\{", "\}", "\:", "\@", "\~", "\<", "\>", "\?", "\,", "\.", "\/", "\;", "\'", "\#", "\[", "\]"];
        
        var i = passwInput.value.split('');
        
        // Check to see if the special character is included in the password.
        function charCheck(item, index, arr){
            // Loop through all of the inputs in the specialChars array.
            for(x = 0; x < i.length; x++){
                if(arr[index] == i[x]){
                    if(passwInput.value.includes(arr[index])){
                        passwError.style.display = "none";
                        passwError.style.visibility = "hidden";
                        tempPass = passwInput.value;
                        console.log(tempPass);
                    }else{
                        passwError.style.display = "block";
                        passwError.style.visibility = "visible";
                        passwError.innerHTML = "Password does not contain a special character!"
                    }
                }
            }
        }
        
        if(passwInput.value.length >= 8){
            tempPass = passwInput.value;
            specialChars.forEach(charCheck);
        }
        
        if(passcInput.value == tempPass){
            passcError.style.display = "none";
            passcError.style.visibility = "hidden";
            passwOK = true;
        }else{
            passcError.style.display = "block";
            passcError.style.visibility = "visible";
            passwOK = false;
        }
    }
    
    function submitForm(){
        // If the email is validated and the password is validated.
        if(emailOK & passwOK){
            document.getElementById("regform").submit();
            return true;
        // If the email is validated but the password(s) is not.
        }else if(emailOK){
            alert("Check your passwords and ensure they meet the criteria.");
            return false;
        // If the password(s) are validated but the email is not.
        }else if(passwOK){
            alert("Check your email and ensure that it meets the criteria.");
            return false;
        }else{
        // If neither of them are validated.
            alert("The information you have entered is incorrect/incomplete!");
            return false;
        }
    }
    
    
}else if(cPage.includes("login.html")){
    // Login Validation
}

// Error text reset.
function UpdateText(){
    // Variables for errors
    var emailError = document.getElementById("emailerr");
    var passwError = document.getElementById("passwerr");
    var passcError = document.getElementById("passwcerr");
    
    emailError.innerHTML = "Please enter a valid email address!";
    passwError.innerHTML = "Please enter a valid password!";
    passcError.innerHTML = "Passwords do no match!";
}