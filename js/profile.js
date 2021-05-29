

$(document).ready(function() {
    // $.get("./templates/profile/account_tab.php", function(data, status){
    //     $(".tab-content")[0].innerHTML = data;
    // });
    $(".tab-button-group").on('click', function(event){
        event.stopPropagation();
        event.stopImmediatePropagation();
        switch(this.id){
            case 'account':
                onClickTabBtn("./templates/profile/account_tab.php",
                [
                    "../pages/templates/profile/js/account_tab.js",
                    "../js/jquery_session.js",
                    "../js/validation.js",
                    "../js/cookie.js"
                    
                ]);
                break;
        }
    });

    
    function onClickTabBtn(page,scripts_path=[]){
        $.get(page, function(data, status){
            $(".tab-content")[0].innerHTML = data;
            
            scripts_path.forEach(function(value){
                $.getScript(value).done(function( script, textStatus ) {
                    console.log( textStatus );
                }).fail(function( jqxhr, settings, exception ) {
                    $( "div.log" ).text( "Triggered ajaxError handler." );
                });

            });
        });
    }
       

});
