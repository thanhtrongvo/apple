$().ready(function() {
    $("#signup").validate({
        onfocusout: false,
		onkeyup: false,
		onclick: false,
        rules: {
            name: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            password: {
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