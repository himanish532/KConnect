  
	function formValidation()  
    {  
    var uid = document.registration.userid;  
    var passid = document.registration.passid;  
    var uemail = document.registration.email;
    var utype = document.registration.type;  
    var untid = document.registration.euid;   	
    if(userid_validation(uid,5,12))  
    {  
    if(passid_validation(passid,7,12))  
    {
	if(confirmPwd())  
    {		
    if(ValidateEmail(uemail))  
    {   
    if(typeselect(utype))  
    {
    if(ValidateUntid(untid))  
    {   
		window.location.href = "file:///F:/First%20major%20project/KnowledgeSharing/KShop/MainPage.html";
    }  
    }   
    }
	}	
	}
    } 
    return false;  
    } 


    function userid_validation(uid,mx,my)  
    {  
    var uid_len = uid.value.length;  
    if (uid_len == 0 || uid_len >= my || uid_len < mx)  
    {  
    alert("User Id should not be empty / length be between "+mx+" to "+my);  
    uid.focus();  
    return false;  
    }  
    return true;  
    }  


    function passid_validation(passid,mx,my)  
    {  
    var passid_len = passid.value.length;  
    if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
    {  
    alert("Password should not be empty / length be between "+mx+" to "+my);  
    passid.focus();  
    return false;  
    }  
    return true;  
    }  
	
		
	function confirmPwd() 
	{
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        if (pass1 != pass2) {
            alert("Passwords Do not match");
			//passid.style.borderColor =  "#E34234";
			//cpassid.style.borderColor =  "#E34234";
            document.getElementById("pass1").style.borderColor = "#E34234";
            document.getElementById("pass2").style.borderColor = "#E34234";
        }
        else {
            //alert("Passwords Match!!!");
			//document.getElementById("pass1").style.borderColor = "#3333ff";
			//document.getElementById("pass2").style.borderColor = "#3333ff";
			return true;
        }
    }
	
	
	
	function ValidateEmail(uemail)  
    {  
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(uemail.value.match(mailformat))  
    {  
    return true;  
    }  
    else  
    {  
    alert("You have entered an invalid email address!");  
    uemail.focus();  
    return false;  
    }  
    }
    
    function typeselect(utype)  
    {  
    if(utype.value == "Default")  
    {  
    alert('Select your user type from the list');  
    utype.focus();  
    return false;  
    }  
    else  
    {  
    return true;  
    }  
    }  
   
   function ValidateUntid(untid)  
    {  
    var untid_len = untid.value.length;  
    if (untid_len < 8 || untid_len > 8)  
    {  
    alert("UNT Id should not be empty / length be "+8);  
    untid.focus();  
    return false;  
    }  
    return true; 
    }  
   
 

   
   
   
   

    
    

	


