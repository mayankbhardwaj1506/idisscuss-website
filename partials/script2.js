function login() {
    const myspan1 = document.getElementById('alert1');
    myspan1.innerHTML = '';
    const myspan2 = document.getElementById('alert2');
    myspan2.innerHTML = '';
    const myspan3 = document.getElementById('alert8');
    myspan3.innerHTML = '';
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    jQuery.ajax({
        url: 'partials/login_db2.php',
        method: 'post',
        data: {
            email: email,
            passward: password
        },
        success: function (result) {
            if (result == 'yes') {
                jQuery('.second_box').show();
                jQuery('.first_box').hide();
                setTimeout(function () {
                    location.reload();
                }, 1000);

            }
            
            if (result == "not_exist") {
                const myspan1 = document.getElementById('alert1');
                myspan1.innerHTML = 'Email i\'d Or Username didn\'t exist';

            }
            if (result == "not_varified") {
                const myspan3 = document.getElementById('alert8');
                myspan3.innerHTML = 'Your email address is not verfied. Please re-create your account then varify your email address. ';
            }
            
            if (result == "Password_not_found") {
                console.log("not exist username");
                const myspan2 = document.getElementById('alert2');
                myspan2.innerHTML = 'Password didn\'t found';
            }
        }

    })
}



function signup() {

    var email = jQuery('#email1').val();
    var username = jQuery('#username1').val();
    var pass = jQuery('#password1').val();
    var cpass = jQuery("#cpassword1").val();
    var otp = jQuery("#otp").val();
    const inputemail = document.getElementById('email1');
    jQuery('#signbtn').hide();
    jQuery('#loading').show();



    if (inputemail.checkValidity()) {
        console.log("valid");
        if (username == username.toLowerCase()) {
            if (username.length >= 5) {
                if (pass.length >= 4) {
                    if (pass == cpass) {
                        jQuery.ajax({
                            url: 'partials/signup_db2.php',
                            method: 'post',
                            data: {
                                email: email,
                                uname: username,
                                password: pass,
                                cpassword: cpass,
                                otp: otp

                            },
                            success: function (result) {

                                if (result == 'otp_send') {
                                    jQuery('.first_box2').hide();
                                    jQuery('.second_box2').show();

                                }
                                if (result == "invalid_otp") {
                                    jQuery('#alertotp').html('Entered OTP for ' + email + ' is invalid. Please enter valid OTP.');
                                }
                                if (result == "Enter_otp") {
                                    jQuery('#alertotp').html('Enter OTP that is send to your email i\'d ' + email + '. Please enter valid OTP.');
                                }


                                if (result == "invalid_email") {
                                    console.log("invalid");
                                    jQuery('#alert3').html('Enter a valid Email address and try again.');
                                    jQuery('#loading').hide();
                                    jQuery('#signbtn').show();

                                }

                                if (result == 'yes') {
                                    setTimeout(function() {
                                        $('#signupModal').modal('hide');
                                    }, 1000);
                                     jQuery('#alert7').html('Your account created successfully');
                                    jQuery('.second_box2').show();
                                    jQuery('.first_box2').hide();
                                }
                                if (result == 'email_exists') {
                                    jQuery('#alert3').html('Email i\'d already exists.');
                                    jQuery('#loading').hide();
                                    jQuery('#signbtn').show();
                                }
                                if (result == 'username_exists') {
                                    jQuery('#alert4').html('Username already exists.');
                                    jQuery('#loading').hide();
                                    jQuery('#signbtn').show();
                                }

                            }

                        })
                    } else {
                        const alert3 = document.getElementById('alert6');
                        alert3.innerHTML = 'Password didn\'t match';
                        jQuery('#loading').hide();
                        jQuery('#signbtn').show();
                    }
                } else {
                    const alert3 = document.getElementById('alert5');
                    alert3.innerHTML = 'Password should have four characters.';
                    jQuery('#loading').hide();
                    jQuery('#signbtn').show();
                }
            } else {
                const alert3 = document.getElementById('alert4');
                alert3.innerHTML = 'Username should have five characters';
                jQuery('#loading').hide();
                jQuery('#signbtn').show();
            }
        } else {
            const alert3 = document.getElementById('alert4');
            alert3.innerHTML = 'Username should be in lowerCase';
            jQuery('#loading').hide();
            jQuery('#signbtn').show();
        }
    } else {
        const alert3 = document.getElementById('alert3');
        alert3.innerHTML = 'Enter a valid Email i\'d.';
        jQuery('#loading').hide();
        jQuery('#signbtn').show();

    }
}


function logout() {
    window.alert("Are you sure to Logout?");
    window.history.forward();
    jQuery.ajax({
        url: "partials/logout2.php",
        success: function (result) {
            if (result == "yes") {


                var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                myModal.show();

                setTimeout(function () {
                    var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                    myModal.hide();
                    location.reload();
                }, 2000);
            }
        }
    })
}

// function imageupload() {

//     var image = document.getElementById('file_input');
//     const file = image.file[2];

//     if(file){
//         const formData = new FormData();
//         formData.append('image',file);
//     }
//     console.log(image);
//     jQuery.ajax({
//         url: 'partials/image.php',
//         method: "post",
//         data: { image: formData },
//         processData: false,
//         contentType: false,
//         success: function (result) {
//             if (result == "yes") {
//                 console.log("yes saved");
//             }
//         }

//     })
// }