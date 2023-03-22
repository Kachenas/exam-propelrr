
$(document).ready(function () { 

    $("#myForm").submit(function (e) { 
        
        e.preventDefault();

        let fullname = $("#fullname").val();
        let email = $("#email").val();
        let mobile = $("#mobile").val();
        let birthdate = $("#birthdate").val();
        let gender = $("#gender").val();
        let actionPerform = $('#actionPerform').find(":selected").val();
        let inputs = {};
        
        if (fullname == '') {
            $('#errorName').text("Full Name is a required field!");
            $("#fullname").attr("style", "border: 1px solid red;");
        } else {
            let newfullname = fullname.replace(/[^a-zA-Z ]/g, "");
            inputs['name'] = newfullname;
        }

        if (email == '') {
            $('#errorEmail').text("Email Address is a required field!");
            $("#email").attr("style", "border: 1px solid red;");
        } else {
            if (validateEmail(email)) {
                inputs['email'] = email;
            } else {
                $('#errorEmail').text("Email Address is not valid!");
            }
        }

        if (mobile == '') {
            $('#errormobile').text("Mobile Number is a required field!");
            $("#mobile").attr("style", "border: 1px solid red;");
        } else {
            if (validateMobile(mobile)) {
                  inputs['mobile'] = mobile;
            } else {
                $('#errormobile').text("Mobile number input is not valid!");
            }
        }

        if (birthdate == '') {
            $('#errorbirthdate').text("Full Name is a required field!");
            $("#birthdate").attr("style", "border: 1px solid red;");
        } else {
            inputs['birthdate'] = birthdate;
            $('#age').val(calculateAge(birthdate));
        }

        if (gender == '') {
            $('#errorgender').text("Full Name is a required field!");
            $("#gender").attr("style", "border: 1px solid red;");
        } else {
            inputs['gender'] = gender;
        }

        inputs['actionPerform'] = actionPerform;

        let formData = inputs.serialize();

        $.ajax({
            type: "POST",
            url: "submit-form.php",
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                console.log(textStatus, errorThrown);
            }
        });


    });
    

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validateMobile (mobile) {
        const mobileNumberRegex = /^(09|\+639)\d{9}$/;
        return mobileNumberRegex.test(mobile);
    }


    function calculateAge (birthDateStr) {
        
        const birthDate = new Date(birthDateStr);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }


});
