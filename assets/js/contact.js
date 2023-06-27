/*==============================================================*/
// Raque Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm").validator().on("submit", function (event) {
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
        var qualification= $('#qualification').val();
        var number= $('#number').val();
        var captcha_valid=grecaptcha.getResponse();
        // var fileToUpload =$('#fileToUpload').val();

        var file_data = $('#fileToUpload').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        form_data.append('name', name);
        form_data.append('email', email);
        form_data.append('qualification', qualification);
        form_data.append('number', number);
        form_data.append('captcha_valid', captcha_valid);
        $.ajax({
            type: "POST",
            url: "php/email.php",
            cache: false,
            contentType: false,
            processData: false,    
            data: form_data,
            success : function(text){
                if (text == "success"){
                    formSuccess();
                    $('#panel').css('display','block');
                    setTimeout(()=>{
                        window.location.reload();
                    },3000)
                 } 
                 else if(text=="captcha_invalid") {
                    // formError();
                    $('#captcha_err').html("Captcha not valid")
                    // submitMSG(false,"Capctcha not valid");
                }
            }
        });
    }

    function formSuccess(){
        $("#contactForm")[0].reset();
        submitMSG(true, "Message Submitted!")
    }

    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
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
