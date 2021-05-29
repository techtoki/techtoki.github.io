$(document).ready(function() {
    var user_data;
    $.post("../php/controller/session_controller.php",{
            "session_name": "user",
        },
        function(data, status){
            user_data = JSON.parse(data);
    });
    
    $(".edit-btn").on('click',function(event){
        event.stopPropagation();
        event.stopImmediatePropagation();
        let parent = this.closest(".form-group");
        if(this.id=="change-password"){
            $('#change-password-modal').modal('show');
            
        }
        if($($(parent).children()[1]).attr('readonly')!=null){
            
            $($(parent).children()[1]).removeAttr('readonly');
            
        }
        
        else{
            $($(parent).children()[1]).attr('readonly','true');
            switch($($(parent).children()[1]).attr('id')){
                case "email":
                    $($(parent).children()[1]).val(user_data.email_address);
                    break;
                case "firstname":
                    $($(parent).children()[1]).val(user_data.first_name);
                    break;
                case "lastname":
                    $($(parent).children()[1]).val(user_data.last_name);
                    break;
                case "phone":
                    $($(parent).children()[1]).val(user_data.phone);
                    break;
                case "address":
                    $($(parent).children()[1]).val(user_data.billing_address);
                    break;
            }
        }
        // console.log($(parent).children()[1]);
    });

    $("#close-change-password").click(()=>{
        $("#password-old").removeClass("is-invalid");
        $("#password-new").removeClass("is-invalid");
        $('#change-password-modal').modal('hide');
    });
    $("#confirm-change-password").click(()=>{
        let can_change = true;
        let old_correct = user_data.password.localeCompare($("#password-old").val());
        if(old_correct!=0){
            $("#password-old").addClass("is-invalid");
            can_change = false;
        }
        else{
            $("#password-old").removeClass("is-invalid");
        }
        if(user_data.password.localeCompare($("#password-new").val())==0){
            $('.password-field .invalid-feedback').html("New password must not be the same as your old one");
            $("#password-new").addClass("is-invalid");
            can_change = false;
        }
        else if($("#password-new").val().length<8){
            $('.password-field .invalid-feedback').html("Your password must be atleast 8 characters");
            $("#password-new").addClass("is-invalid");
            can_change = false;
        }
        else{
            $("#password-new").removeClass("is-invalid");
        }
        if($("#password-new").val().localeCompare( $('#password_confirm').val())!=0){
            $('#password_confirm').addClass("is-invalid");
            $('#password-new').addClass("is-invalid");
            can_change = false;
        }
        if(can_change){
            $('#current-password').val($('#password-new').val());
            $('#change-password-modal').modal('hide');
        }
        
    });
    $("#update-btn").click(()=>{
        let can_register = true;
        let email = $('#email').val();
        let password = ($('#current-password').val()==="NOTYOURPASSWORD"?user_data.password:$('#current-password').val());
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
        
        if(can_register){
            $.ajax({
                type: "post",    
                url: '../php/controller/validation_controller.php',
                data: { 
                    "id":user_data.id,
                    "email": email,
                    "password": password,
                    "firstname": firstname,
                    "lastname": lastname,
                    "phone": phone,
                    "address": address,
                    "mode":"update"
                    }, 
                success: function (data) {
                    $('#register').attr('data-bs-target','#exampleModal');
                    value = JSON.parse(data);
                    console.log(value.status);
                    if(value.status.includes("Duplicate entry")){
                        $('#email').addClass("is-invalid");
                        $('.email-field .invalid-feedback').html("Email is already in used!");
                        can_register = false;
                    }
                    else if(can_register){
                        $('#registration-form')[0].reset();
                        $("#success-modal").modal('show');
                    }
                    $.ajax({
                        type: "post",    
                        url: '../php/controller/validation_controller.php',
                        data: { 
                            "email":email,
                            "password":password,
                            "mode":'login'
                        },
                        success:function(data){
                            console.log(data)
                            setCookie("user",data,1);
                            location.href = '../';
                        }
                    });
                }, 
                error:function(){
                    alert("AHHH SHIT");
                }
            });
        }
    });
});
// $(document).ready(()=>{
//     var user_data;
//     $.post("../php/controller/session_controller.php",{
//             "session_name": "user",
//         },
//         (data, status)=>{
//             user_data = JSON.parse(data);
//     });
//     //toggle edit button
//     $(".edit-btn").on('click',(event)=>{
//         event.stopPropagation();
//         event.stopImmediatePropagation();
//         console.log( $(".edit-btn"));
//         let parent = this.closest(".form-group");
        
//         if($($(parent).children()[1]).attr('id')=="current-password"){
//             $('#change-password-modal').modal('show');
            
//         }
//         if($($(parent).children()[1]).attr('readonly')!=null){
//             if($($(parent).children()[1]).attr('id')!="current-password"){
//                 $($(parent).children()[1]).removeAttr('readonly');
//             }
//         }
        
//         else{
//             $($(parent).children()[1]).attr('readonly','true');
//             switch($($(parent).children()[1]).attr('id')){
//                 case "email":
//                     $($(parent).children()[1]).val(user_data.email_address);
//                     break;
//                 case "firstname":
//                     $($(parent).children()[1]).val(user_data.first_name);
//                     break;
//                 case "lastname":
//                     $($(parent).children()[1]).val(user_data.last_name);
//                     break;
//                 case "phone":
//                     $($(parent).children()[1]).val(user_data.phone);
//                     break;
//                 case "address":
//                     $($(parent).children()[1]).val(user_data.billing_address);
//                     break;
//             }
//         }
//     });

//     $("#close-change-password").click(()=>{
//         $('#change-password-modal').modal('hide');
//     });
//     //change password
//     $("#confirm-change-password").click(()=>{
//         let can_change = true;
//         let old_correct = user_data.password.localeCompare($("#password-old").val());
//         if(old_correct!=0){
//             $("#password-old").addClass("is-invalid");
//             can_change = false;
//         }
//         else{
//             $("#password-old").removeClass("is-invalid");
//         }
//         if(user_data.password.localeCompare($("#password-new").val())==0){
//             $('.password-field .invalid-feedback').html("New password must not be the same as your old one");
//             $("#password-new").addClass("is-invalid");
//             can_change = false;
//         }
//         else if($("#password-new").val().length<8){
//             $('.password-field .invalid-feedback').html("Your password must be atleast 8 characters");
//             $("#password-new").addClass("is-invalid");
//             can_change = false;
//         }
//         else{
//             $("#password-new").removeClass("is-invalid");
//         }
//         if($("#password-new").val().localeCompare( $('#password_confirm').val())!=0){
//             $('#password_confirm').addClass("is-invalid");
//             $('#password-new').addClass("is-invalid");
//             can_change = false;
//         }
//         if(can_change){
//             $('#current-password').val($('#password-new').val());
//             $('#change-password-modal').modal('hide');
//         }
        
//     });

//     $("#update-btn").click(()=>{
//         let can_register = true;
//         let email = $('#email').val();
//         let password = $('#current-password').val();
//         let firstname = $('#firstname').val();
//         let lastname = $('#lastname').val();
//         let phone = $('#phone').val();
//         let address = $('#address').val();
//         if(email.length==0){
//             $('#email').addClass("is-invalid");
//             can_register = false;
//         }
//         else{
//             $('#email').removeClass("is-invalid");
//         }
        
//         if(firstname.length==0){
//             $('#firstname').addClass("is-invalid");
//             can_register = false;
            
//         }
//         else{
//             $('#firstname').removeClass("is-invalid");
            
//         }
        
//         if(lastname.length==0){
//             $('#lastname').addClass("is-invalid");
//             can_register = false;
            
//         }
//         else{
//             $('#lastname').removeClass("is-invalid");
            
//         }
//         if(phone.length!=11){
//             $('#phone').addClass("is-invalid");
//             can_register = false;
            
//         }
        
//         else{
//             $('#phone').removeClass("is-invalid");
//         }
//         if(address.length==0){
//             $('#address').addClass("is-invalid");
//             can_register = false;
            
//         }
        
//         else{
//             $('#address').removeClass("is-invalid");
//         }
        
//         if(can_register){
//             $.ajax({
//                 type: "post",    
//                 url: '../php/controller/validation_controller.php',
//                 data: { 
//                     "id":user_data.id,
//                     "email": email,
//                     "password": password,
//                     "firstname": firstname,
//                     "lastname": lastname,
//                     "phone": phone,
//                     "address": address,
//                     "mode":"update"
//                     }, 
//                 success: function (data) {
//                     $('#register').attr('data-bs-target','#exampleModal');
//                     value = JSON.parse(data);
//                     console.log(value.status);
//                     if(value.status.includes("Duplicate entry")){
//                         $('#email').addClass("is-invalid");
//                         $('.email-field .invalid-feedback').html("Email is already in used!");
//                         can_register = false;
//                     }
//                     else if(can_register){
//                         $('#registration-form')[0].reset();
//                         $("#success-modal").modal('show');
//                     }
//                 }, 
//                 error:function(){
//                     alert("AHHH SHIT");
//                 }
//             });
//         }
//     });
// });


