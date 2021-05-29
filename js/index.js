

$(document).ready(function() {
    //show hide register login and account button
    if(getCookie("user")){
        $("#log-register-btn").remove();
        value = getCookie("user");
        $("#account-a")[0].innerHTML = value.email_address;
    }
    else{
        $("#account-btn").remove();
    }
    // end

    $("#logout-btn").click(function(){
        document.cookie = "user=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        
        $.ajax({
            url: './php/controller/logout_controller.php',
            success: function(data) {
              console.log(data);
            }
        });
        location.reload();
        
    });
    window.addEventListener('scroll', function() {
        let navigation_top = document.getElementById('navigation_top');
        let nav_doc = $(navigation_top);
        if (window.scrollY > 0) {
          navigation_top.classList.add('fixed-top');
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';

          nav_doc.find("#account-btn").removeClass("d-flex");
          nav_doc.find("#account-btn").addClass("d-none");

          nav_doc.find("#dropdown-mini").removeClass("d-none");
          nav_doc.find("#dropdown-mini").addClass("d-flex");
          
          nav_doc.find("#logo").attr("width",100);
          

        } else {
          nav_doc.find("#logo").attr("width",200);
          nav_doc.find("#account-btn").removeClass("d-none");
          nav_doc.find("#account-btn").addClass("d-flex");

          nav_doc.find("#dropdown-mini").removeClass("d-flex");
          nav_doc.find("#dropdown-mini").addClass("d-none");

          document.getElementById('navigation_top').classList.remove('fixed-top');
          document.body.style.paddingTop = '0';
        } 
    });

   

});





