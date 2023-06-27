/*==============================================================*/
// Raque Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#franchiseForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Did you fill in the form properly?");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm(){
         $('#captcha_err').html("")
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var mobile= $('#mobile').val();
        var profession = $("#profession").val();
        var type=$('#type').val();        
        var captcha_valid=grecaptcha.getResponse();
        $.ajax({
            type: "POST",
            url: "php/franchise_network_mail.php",
            data: "name=" + name + "&email=" + email + "&mobile="+mobile + "&profession="+profession + "&type="+type+ "&captcha_valid=" + captcha_valid,
            success : function(text){
                if (text == "success"){
                    formSuccess();
                  $('#form_success').css('display','block');
                    setTimeout(()=>{
                        window.location.reload();
                    },3000)
                } else if(text=="captcha_valid") {
                    // formError();
                    $('#captcha_err').html("Captcha not valid")
                    // submitMSG(false,"Capctcha not valid");
                }
            }
        });
    }

    function formSuccess(){
        $("#franchiseForm")[0].reset();
        submitMSG(true, "Message Submitted!")
    }

    function formError(){
        $("#franchiseForm").addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery)); // End of use strict