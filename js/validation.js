
$(document).ready(function() {
    $('#registration-form').submit(function(e) {
        e.preventDefault();
        let can_register = true;
        let email = $('#email').val();
        let password = $('#password').val();
        let password_confirm = $('#password_confirm').val();
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let phone = $('#phone').val();
        let address = $('#address').val();
        
        if(email.length==0){
            $('#email').addClass("is-invalid");
            can_register = false;
        }
        else{
            $('#email').removeClass("is-invalid");
        }
        
        if(firstname.length==0){
            $('#firstname').addClass("is-invalid");
            can_register = false;
            
        }
        else{
            $('#firstname').removeClass("is-invalid");
            
        }
        
        if(lastname.length==0){
            $('#lastname').addClass("is-invalid");
            can_register = false;
            
        }
        else{
            $('#lastname').removeClass("is-invalid");
            
        }
        if(phone.length!=11){
            $('#phone').addClass("is-invalid");
            can_register = false;
            
        }
        
        else{
            $('#phone').removeClass("is-invalid");
        }
        if(address.length==0){
            $('#address').addClass("is-invalid");
            can_register = false;
            
        }
        
        else{
            $('#address').removeClass("is-invalid");
        }
       
        if(password.localeCompare(password_confirm)!=0){
            $('#password_confirm').addClass("is-invalid");
            $('#password').addClass("is-invalid");
            can_register = false;
        }
        else if(password.length<8){
            $('#password_confirm').removeClass("is-invalid");
            $('.password-field .invalid-feedback').html("Your password must be atleast 8 characters")
            can_register = false;
        }
        else{
            $('#password_confirm').removeClass("is-invalid");
            $('#password').removeClass("is-invalid");
        }
    
        if(can_register){
            
            $.ajax({
                type: "post",    
                url: '../php/controller/validation_controller.php',
                data: { 
                    "email": email,
                    "password": password,
                    "firstname": firstname,
                    "lastname": lastname,
                    "phone": phone,
                    "address": address,
                    "mode":"register"
                 }, 
                success: function (data) {
                    $('#register').attr('data-bs-target','#exampleModal');
                    value = JSON.parse(data);
                    if(value.status.includes("Duplicate entry")){
                        $('#email').addClass("is-invalid");
                        $('.email-field .invalid-feedback').html("Email is already in used!");
                        can_register = false;
                    }
                    else if(can_register){
                        $('#registration-form')[0].reset();
                        $("#success-modal").modal('show');
                        
                    }
                }, 
                error:function(){
                    alert("AHHH SHIT");
                }
            });
        }
    });
    $('#login').click(function(){
        let email = $('#email').val();
        let password = $('#password').val();
        console.log()
        $.ajax({
            type: "POST",    
            url: '../php/controller/validation_controller.php',
            data: { 
                "email":email,
                "password":password,
                "mode":'login'
            },
            success:function(data){
                try{
                    JSON.parse(data);
                    location.href = '../';
                    setCookie("user",data,1);
                }catch(e){
                    $('#email').addClass("is-invalid");
                    $('#password').addClass("is-invalid");
                }
                
            }
        });
        
    });
});
