$().ready(function() {
        $("#signup").validate({
            errorClass: "invalid invalid-alert",
            validClass: "valid valid-alert",
            errorElement: "div",
            focusCleanup: true,
            onclick: false,
            submitHandler: function(form) {
                form.submit();
            },

            invalidHandler: function(event, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            },

            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                pswd: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 5 characters long",
                    maxlength: "Your name must be at most 20 characters long"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at most 20 characters long"
                },  
                email: {
                    required: "Please enter your email address",
                    
                },
                phone: {
                    required: "Please enter your phone number",
                    digits: "Please enter a valid phone number",
                    minlength: "Your phone number must be at least 10 digits long",
                    maxlength: "Your phone number must be at most 10 digits long"
                }
            }
        });
    
    
    
    })
