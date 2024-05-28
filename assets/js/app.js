$(document).ready(function() {
        baseUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
        folderName = "FEOxyLoans";
        var userNameFromAPI;

        getUserDetails();
        //
        //http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/17/dashboard/lender?current=true/false
        //$('#datetimepicker1').datetimepicker();

        //
        userenteredOTP = 1;
        userID = 0;
        gMobileNumber = 0;

        //lender validations starts//
        $("#lenderAmtValue").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 20) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;
        });
        $("#lmobileNumber").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 9) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;

        });
        $("#lenderSection").validate({
                rules: {
                        lenderAmtValue: {
                                required: true
                        },
                        lmobileNumber: {
                                required: true
                        }
                },
                messages: {
                        lenderAmtValue: {
                                required: "Please enter amount interested to lend."
                        },
                        lmobileNumber: {
                                required: "Please enter mobile number."
                        }
                },
                highlight: function(element, errorClass, validClass) {
                        $(element).addClass(errorClass).removeClass(validClass);
                        $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass(errorClass).addClass(validClass);
                        $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
                },
                submitHandler: function() {
                        var regUrl = baseUrl + "v1/user/register"
                        $(".loading").show();
                        var userData = {
                                amt: $("#lenderAmtValue").val(),
                                userType: $("#lenderuserType").val(),
                                mobileNumber: $("#lmobileNumber").val()
                        }
                        var amt = $("#lenderAmtValue").val();
                        // amt = parseInt(amt);
                        var userType = $("#lenderuserType").val();
                        var mobileNumber = $("#lmobileNumber").val();

                        var postData = { mobileNumber: mobileNumber, type: userType, amountInterested: amt };
                        var postData = JSON.stringify(postData);

                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data) {
                                        console.log(data);
                                        userID = data.id;
                                        gMobileNumber = $("#lmobileNumber").val();
                                        console.log(userID);
                                        console.log(gMobileNumber);
                                        $("#lender").hide();
                                        $('.enterOTPSection').show();
                                        $(".loading").hide();
                                },
                                error: function(request, error) {
                                        console.log(arguments);
                                }
                        });
                }
        });
        //Borrower validations//
        $("#borrowerAmtValue").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 20) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;
        });
        //borrower validations starts//

        $("#bmobileNumber").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 9) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;

        });
        $("#borrowerSection").validate({
                rules: {
                        borrowerAmtValue: {
                                required: true
                        },
                        bmobileNumber: {
                                required: true
                        }
                },
                messages: {
                        borrowerAmtValue: {
                                required: "please fill this field"
                        },
                        bmobileNumber: {
                                required: "please fill this field"
                        }
                },
                submitHandler: function() {
                        $(".loading").show();
                        var amt = $("#borrowerAmtValue").val();
                        // amt = parseInt(amt);
                        var userType = $("#borroweruserType").val();
                        var mobileNumber = $("#bmobileNumber").val();

                        var postData = { mobileNumber: mobileNumber, type: userType, amountInterested: amt };
                        var postData = JSON.stringify(postData);
                        var regUrl = baseUrl + "v1/user/register";

                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data) {
                                        console.log(data);
                                        userID = data.id;
                                        gMobileNumber = data.mobileNumber;
                                        console.log(userID);
                                        $("#borrower").hide();
                                        $('.enterOTPSection').show();

                                        $(".loading").hide();
                                },
                                error: function(request, error) {
                                        console.log(arguments);
                                }
                        });
                }
        });

        //otp validations//
        $("#otpValue").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 6) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;
        });
        $("#otpSection").validate({
                rules: {
                        otpValue: {
                                required: true
                        },
                        emailValue: {
                                required: true,
                                email: true
                        }
                },
                messages: {
                        otpValue: {
                                required: "please fill this field"
                        },
                        emailValue: {
                                required: "please fill this field",
                                email: "Pleaase enter valid email"
                        }
                },
                submitHandler: function() {
                        $(".loading").show();
                        var enteredOTPValue = $("#otpValue").val();
                        var enteredEmail = $("#emailValue").val();
                        var postData = { "mobileNumber": gMobileNumber, "mobileOtpValue": enteredOTPValue, "email": enteredEmail };

                        var postData = JSON.stringify(postData);

                        regUrl = baseUrl + "v1/user/register";

                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data) {
                                        console.log(data);
                                        //var response = JSON.parse(data);
                                        //$('.enterOTPSection').hide();

                                        $("#modal-RegisterSuccess").modal('show');
                                        //$('.displayUploadFile').show();
                                        $(".loading").hide();
                                        setTimeout(function() {
                                                window.location = "userlogin";
                                        }, 3000);
                                },
                                error: function(request, error) {
                                        console.log(arguments);
                                }
                        });
                }
        });
        // user login validations//


        $(".emailbtnValue").click(function() {

                $('.btnvalue').hide();
                $('.enterUSERLOGINSection').show();

        });

        $(".mobilebtnValue").click(function() {

                $('.btnvalue').hide();
                $('.enterMOBILESection').show();

        });

        $(".otpbtn").click(function() {

                var enteredmobileValue = $(".mobilenumberValue").val();

                var postData = { "mobileNumber": enteredmobileValue };
                var postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/sendOtp";
                $.ajax({
                        url: regUrl,
                        type: "POST",
                        data: postData,
                        contentType: "application/json",
                        dataType: "json",
                        success: function(data) {
                                $('.enterotpSection').show();
                                $('.otpbtn').hide();
                                $('.showloginBtn').show();
                                console.log(data);
                        }
                });
        });

        $(".showloginBtn").click(function() {

                var enteredmobileValue = $(".mobilenumberValue").val();
                var enteredOTPValue = $(".otpValue").val();
                var postData = { "mobileNumber": enteredmobileValue, "mobileOtpValue": enteredOTPValue };
                var postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/login?grantType=PWD";
                $.ajax({
                        url: regUrl,
                        type: "POST",
                        data: postData,
                        contentType: "application/json",
                        //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        dataType: "json",
                        success: function(data) {
                                console.log(data);

                                //headers: {'accessToken': "token String"},
                                userID = data.id;
                                userType = data.primaryType;
                                var sId = data.id;
                                writeCookie('sUserId', sId);

                                var sUserType = data.primaryType;
                                writeCookie('sUserType', sUserType);

                                if (sUserType == "LENDER") {
                                        window.location = "investor";
                                } else {
                                        window.location = "borrowerDashboard";
                                }
                        },
                }).done(function(data, textStatus, xhr) {
                        console.log(xhr.getResponseHeader('accessToken'));
                        accessToken = xhr.getResponseHeader('accessToken');

                        writeCookie('saccessToken', accessToken);

                        var sUserType = data.primaryType;
                        if (sUserType == "LENDER") {
                                window.location = "investor";
                        } else {
                                window.location = "borrowerDashboard";
                        }
                });

        });




        $("#userloginSection").validate({
                rules: {
                        emailValue: {
                                required: true,
                                email: true
                        },
                        password: {
                                required: true
                        }
                },
                messages: {
                        emailValue: {
                                required: "Please enter email",
                                email: "Please enter valid email"
                        },
                        password: {
                                required: "Please enter password"
                        }
                },
                //user login api call//
                submitHandler: function() {
                        var enteredEmail = $("#emailValue").val();
                        var enteredPassword = $("#password").val();
                        var postData = { "password": enteredPassword, "email": enteredEmail };
                        var postData = JSON.stringify(postData);
                        console.log(postData);
                        regUrl = baseUrl + "v1/user/login?grantType=PWD";
                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                                dataType: "json",
                                success: function(data) {
                                        console.log(data);

                                        //headers: {'accessToken': "token String"},
                                        userID = data.id;
                                        userType = data.primaryType;
                                        var sId = data.id;
                                        writeCookie('sUserId', sId);

                                        var sUserType = data.primaryType;
                                        writeCookie('sUserType', sUserType);

                                        if (sUserType == "LENDER") {
                                                window.location = "investor";
                                        } else {
                                                window.location = "borrowerDashboard";
                                        }
                                },
                        }).done(function(data, textStatus, xhr) {
                                console.log(xhr.getResponseHeader('accessToken'));
                                accessToken = xhr.getResponseHeader('accessToken');

                                writeCookie('saccessToken', accessToken);

                                var sUserType = data.primaryType;
                                if (sUserType == "LENDER") {
                                        window.location = "investor";
                                } else {
                                        window.location = "borrowerDashboard";
                                }
                        });
                }
        });




        //Activateuser validations//
        $(".passwordValue").keyup(function() {
                $("#strength_message").html(checkStrength($("#password").val()))
        })

        function checkStrength(password) {
                var strength = 0
                if (password.length < 5) {
                        $('#strength_message').removeClass()
                        $('#strength_message').addClass('short')
                        return 'Too short'
                }

                if (password.length > 7) strength += 1
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                if (strength < 2) {
                        $('#strength_message').removeClass()
                        $('#strength_message').addClass('weak')
                        return 'Weak'
                } else if (strength == 2) {
                        $('#strength_message').removeClass()
                        $('#strength_message').addClass('good')
                        return 'Good'
                } else {
                        $('#strength_message').removeClass()
                        $('#strength_message').addClass('strong')
                        return 'Strong'
                }
        }


        $(".activateSection").validate({
                rules: {
                        password: {
                                required: true
                        },
                        cpassword: {
                                equalTo: "#password"
                        }

                },
                messages: {
                        password: {
                                required: "Please enter password",
                                password: "Please enter password"
                        },
                        cpassword: {
                                equalTo: "Password and Confirm must be same.",
                        }
                },
                submitHandler: function() {
                        var enteredPassword = $(".passwordValue").val();
                        var enteredcPassword = $(".cpasswordValue").val();
                        var emailToken = $(".emailToken").val();
                        var postData = { "password": enteredPassword, "confirmPassword": enteredcPassword };
                        var postData = JSON.stringify(postData);
                        regUrl = baseUrl + "v1/user/register/" + emailToken + "/verify";
                        // alert(regUrl);
                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data) {
                                        console.log(data);
                                        $("#modal-activateUser").modal('show');
                                        setTimeout(function() {
                                                window.location = "userlogin";
                                        }, 2000);
                                },
                                error: function(request, error) {
                                        console.log(arguments);
                                        $("#modal-activateUser-error").modal('show');
                                }

                        });
                }
        });

        // ENDS ACTIVATE USER//



        // FORGOT SECTION VALIDATIONS//

        $(".phonenumber,.mobilenumberValue,#monthlyEmi,#creditamount,#existingloanamount,#creditcardsrepaymentamount,#othersourcesincome,#netmonthlyincome,#avgmonthlyexpenses,#officeContactNumber,.yearOfPassingValue,#NoOfJobsChanged").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 9) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;

        });



        // showProfile
        $(".showProfile").click(function() {
                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                if (sprimaryType == "LEMDER") {
                        window.location = "lenderpersonalinfo";
                } else {
                        window.location = "borrowerpersonalinfo";
                }

        });

        //FORGOT EMAIL AND MOBILE FUNCTION//

        $("#resetbtn").click(function() {
                var enteredemailValue = $("#email").val();
                var enteredPhoneValue = $("#phonenumber").val();
                if (enteredemailValue == "" && enteredPhoneValue == "") {
                        $('.displayError-forgot').html("Please enter email or phone number to reset password.");
                        $('.displayError-forgot').show();
                        return false;
                } else if (enteredemailValue != "" && enteredPhoneValue != "") {
                        $('.displayError-forgot').html("Please choose only <b>one</b> option to reset password.");
                        $('.displayError-forgot').show();
                } else {
                        $('.displayError-forgot').hide();
                        if (enteredemailValue == "") {
                                // USER ENTERED MOBILE NUMBER
                                var enteredmobileValue = $("#phonenumber").val();
                                var postData = { "mobileNumber": enteredmobileValue };
                                var postData = JSON.stringify(postData);
                                console.log(postData);
                                regUrl = baseUrl + "v1/user/sendOtp";
                                $.ajax({
                                        url: regUrl,
                                        type: "POST",
                                        data: postData,
                                        contentType: "application/json",
                                        dataType: "json",
                                        success: function(data) {
                                                $(".enterforgotSection").hide();
                                                $(".otpSection").show();
                                                console.log(data);
                                        }
                                });


                        }
                        if (enteredPhoneValue == "") {
                                // USER ENTERED EMAIL
                                var enteredemailValue = $("#email").val();
                                var postData = { "email": enteredemailValue };
                                var postData = JSON.stringify(postData);
                                console.log(postData);
                                var EmailPattern = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
                                $('.displayError-forgot').html("Please enter valid email.");
                                $('.displayError-forgot').show();
                                //alert(EmailPattern);

                                if (!EmailPattern.test(enteredemailValue)) {
                                        $('.displayError-forgot').html("Please enter valid email.");
                                        $('.displayError-forgot').show();
                                        return false;
                                } else {
                                        $('.displayError-forgot').hide();
                                }


                                regUrl = baseUrl + "v1/user/resetpassword";
                                $.ajax({
                                        url: regUrl,
                                        type: "POST",
                                        data: postData,
                                        contentType: "application/json",
                                        dataType: "json",
                                        success: function(data) {
                                                $("#modal-resetSuccess").modal('show');
                                                console.log(data);
                                        }
                                });
                        }
                }
        });


        $("#savebtn").click(function() {
                var enteredPassword = $(".passwordValue").val();
                var enteredcPassword = $(".cpasswordValue").val();
                var emailToken = $(".emailToken").val();
                console.log(enteredcPassword);
                if (enteredPassword == "" && enteredcPassword == "") {
                        $('.displayError-forgot').html("Please enter Password and Confirm Password to reset password.");
                        $('.displayError-forgot').show();
                        return false;
                } else {
                        $('.displayError-forgot').hide();
                }

                if (enteredPassword != enteredcPassword) {
                        $('.displayError-forgot').html("Password and Confirm Password must be same.");
                        $('.displayError-forgot').show();
                        return false;
                } else {
                        $('.displayError-forgot').hide();
                }


                var postData = { "password": enteredPassword, "confirmPassword": enteredcPassword };
                var postData = JSON.stringify(postData);
                regUrl = baseUrl + "v1/user/resetpassword/" + emailToken + "";
                $.ajax({
                        url: regUrl,
                        type: "POST",
                        data: postData,
                        contentType: "application/json",
                        dataType: "json",
                        success: function(data) {
                                $("#modal-resetpasswordSuccess").modal('show');
                                setTimeout(function() {
                                        window.location = "userlogin";
                                }, 2000);
                        }
                });
        });

        // ENDS FORGOT SECTION//



        //PERSONALINFO SECTION VALIDATIONS//
        $("#firstname").keypress(function(e) {
                var regex = new RegExp(/^[a-zA-Z\s]+$/);
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                        return true;
                } else {
                        e.preventDefault();
                        return false;
                }
        });
        $("#lastname").keypress(function(e) {
                var regex = new RegExp(/^[a-zA-Z\s]+$/);
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                        return true;
                } else {
                        e.preventDefault();
                        return false;
                }
        });
        $("#fathername").keypress(function(e) {
                var regex = new RegExp(/^[a-zA-Z\s]+$/);
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                        return true;
                } else {
                        e.preventDefault();
                        return false;
                }
        });


        //PERSONALINFO API CALL//

        $("#profile-submit-btn").click(function() {

                var enteredFirstname = $(".firstnameValue").val();
                var enteredLastname = $(".lastnameValue").val();
                var enteredFathername = $(".fathernameValue").val();
                var enteredDateofbirth = $(".dateofbirthValue").val();
                var enteredGender = $('input[name=gendervalue]:checked').val();
                var enteredMaritalStatus = $('input[name=maritalStatus]:checked').val();
                var enteredNationality = $("#nationality").val();


                var genderMethod = document.getElementsByName("gendervalue");
                var maritalStatusMethod = document.getElementsByName("maritalStatus");
                var mios = false;
                var gom = false;
                var isValid = true;

                if (enteredFirstname == "") {
                        $(".firstnameError").show();
                        isValid = false;
                } else {
                        $(".firstnameError").hide();

                }

                if (enteredLastname == "") {
                        $(".lastnameError").show();
                        isValid = false;
                } else {
                        $(".lastnameError").hide();

                }

                if (enteredFathername == "") {
                        $(".fathernameError").show();
                        isValid = false;
                } else {
                        $(".fathernameError").hide();

                }

                if (enteredGender == "gendervalue") {
                        $(".genderError").show();
                        isValid = false;
                } else {
                        $(".genderError").hide();

                }

                var i = 0;
                for (var i = 0; i < genderMethod.length; i++) {
                        if (genderMethod[i].checked == true) {
                                gom = true;
                        }
                }
                if (!gom) {
                        $(".genderError").show();
                        isValid = false;
                } else {
                        $(".genderError").hide();

                }


                if (enteredDateofbirth == "") {
                        $(".dateofbirthError").show();
                        isValid = false;
                } else {
                        $(".dateofbirthError").hide();

                }

                /* if( enteredMaritalStatus== "maritalStatus"){
                     $(".maritalStatusError").show();
                     isValid = false;
                  }else{
                     $(".maritalStatusError").hide();
                     
                  }*/
                if (enteredNationality == "") {
                        $(".nationalityError").show();
                        isValid = false;
                } else {
                        $(".nationalityError").hide();

                }



                var i = 0;
                for (var i = 0; i < maritalStatusMethod.length; i++) {
                        if (maritalStatusMethod[i].checked == true) {
                                mios = true;
                        }
                }
                if (!mios) {
                        $(".maritalStatusError").show();
                        isValid = false;
                } else {
                        $(".maritalStatusError").hide();

                }
                //return isValid; 




                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "firstName": enteredFirstname,
                        "lastName": enteredLastname,
                        "fatherName": enteredFathername,
                        "dob": enteredDateofbirth,
                        "gender": enteredGender,
                        "maritalStatus": enteredMaritalStatus,
                        "nationality": enteredNationality
                };
                var postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/" + userId + "";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data, textStatus, xhr) {
                                        $("#modal-profileSuccess").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        $("#modal-profile-error").modal('show');
                                },
                                beforeSend: function(xhr) {
                                        xhr.setRequestHeader("accessToken", saccessToken);
                                }


                        });
                }
                return isValid;
        });
        //ENDS personalinfo Scetion validations//




        //professional SECTION//

        $("#myprofile-submit-btn").click(function() {
                var enteredEmployment = $(".employmentValue").val();
                var enteredCompanyname = $(".companynameValue").val();
                var enteredDesignation = $(".designationValue").val();
                var enteredDescription = $(".descriptionValue").val();
                var enteredNoOfJobsChanged = $(".NoOfJobsChangedvvalue").val();
                var enteredworkExperience = $("#workExperience").val();
                var enteredHighestQualifications = $(".highestQualificationsvalue").val();
                var enteredofficeAddressId = $(".officeAddressIdValue").val();
                var enteredofficeContactNumber = $(".officeContactNumbervalue").val();
                var enteredfieldOfStudy = $(".fieldOfStudyValue").val();
                var enteredCollege = $(".collegeValue").val();
                var enteredyearOfPassing = $(".yearOfPassingValue").val();

                var isValid = true;
                if (enteredEmployment == "") {
                        $(".employmentError").show();
                        isValid = false;
                } else {
                        $(".employmentError").hide();

                }

                if (enteredCompanyname == "") {
                        $(".companynameError").show();
                        isValid = false;
                } else {
                        $(".companynameError").hide();

                }

                if (enteredDesignation == "") {
                        $(".designationError").show();
                        isValid = false;
                } else {
                        $(".designationError").hide();

                }

                if (enteredDescription == "") {
                        $(".descriptionError").show();
                        isValid = false;
                } else {
                        $(".descriptionError").hide();
                        isValid = true;
                }
                if (enteredNoOfJobsChanged == "") {
                        $(".NoOfJobsChangedError").show();
                        isValid = false;
                } else {
                        $(".NoOfJobsChangedError").hide();

                }

                if (enteredworkExperience == "") {
                        $(".workexperienceError").show();
                        isValid = false;
                } else {
                        $(".workexperienceError").hide();

                }

                if (enteredHighestQualifications == "") {
                        $(".highestqualificationError").show();
                        isValid = false;
                } else {
                        $(".highestqualificationError").hide();
                }
                if (enteredofficeAddressId == "") {
                        $(".officeAddressIdError").show();
                        isValid = false;
                } else {
                        $(".officeAddressIdError").hide();
                }

                if (enteredofficeContactNumber == "") {
                        $(".officeContactNumberError").show();
                        isValid = false;
                } else {
                        $(".officeContactNumberError").hide();
                }

                if (enteredfieldOfStudy == "") {
                        $(".fieldOfStudyError").show();
                        isValid = false;
                } else {
                        $(".fieldOfStudyError").hide();
                }

                if (enteredCollege == "") {
                        $(".collegeError").show();
                        isValid = false;
                } else {
                        $(".collegeError").hide();
                }

                if (enteredyearOfPassing == "") {
                        $(".yearOfPassingError").show();
                        isValid = false;
                } else {
                        $(".yearOfPassingError").hide();
                }


                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "employment": enteredEmployment,
                        "companyName": enteredCompanyname,
                        "designation": enteredDesignation,
                        "description": enteredDescription,
                        "noOfJobsChanged": enteredNoOfJobsChanged,
                        "workExperience": enteredworkExperience,
                        "highestQualification": enteredHighestQualifications,
                        "officeAddressId": enteredofficeAddressId,
                        "officeContactNumber": enteredofficeContactNumber,
                        "fieldOfStudy": enteredfieldOfStudy,
                        "college": enteredCollege,
                        "yearOfPassing": enteredyearOfPassing
                };
                postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/professional/" + userId + "";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                async: false,
                                success: function(data, textStatus, xhr) {

                                        console.log(data);
                                        $("#modal-professionaldetailsSuccess").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        console.log('Error Something');
                                },
                                beforeSend: function(xhr) {

                                        xhr.setRequestHeader("accessToken", saccessToken);
                                }


                        });
                }
                return isValid;

        });

        // ENDS MY PROFILE SECTION//


        // RAISE A LOAN REQUEST //

        $("#loan-submit-btn").click(function() {

                var enteredloanRequestAmount = $(".loanRequestAmount").val();
                var enteredrateOfInterest = $("#rateOfInterest").val();
                var enteredduration = $("#duration").val();
                var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
                var enteredloanPurpose = $(".loanPurpose").val();
                var enteredexpectedDate = $(".expectedDateValue").val();
                var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
                var woim = false;
                var isValid = true;

                if (enteredloanRequestAmount == "") {
                        $(".loanRequestAmountError").show();
                        isValid = false;
                } else {
                        $(".loanRequestAmountError").hide();

                }

                if (enteredrateOfInterest == "") {
                        $(".rateOfInterestError").show();
                        isValid = false;
                } else {
                        $(".rateOfInterestError").hide();

                }

                if (enteredduration == "") {
                        $(".durationError").show();
                        isValid = false;
                } else {
                        $(".durationError").hide();

                }

                if (enteredrepaymentMethod == "") {
                        $(".repaymentMethodError").show();
                        isValid = false;
                } else {
                        $(".repaymentMethodError").hide();

                }

                var i = 0;
                for (var i = 0; i < wayOfinterestMethod.length; i++) {
                        if (wayOfinterestMethod[i].checked == true) {
                                woim = true;
                        }
                }
                if (!woim) {
                        $(".repaymentMethodError").show();
                        isValid = false;
                } else {
                        $(".repaymentMethodError").hide();

                }


                if (enteredloanPurpose == "") {
                        $(".loanPurposeError").show();
                        isValid = false;
                } else {
                        $(".loanPurposeError").hide();


                }

                if (enteredexpectedDate == "") {
                        $(".expectedDateError").show();
                        isValid = false;
                } else {
                        $(".expectedDateError").hide();

                }

                // return isValid;


                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "loanRequestAmount": enteredloanRequestAmount,
                        "rateOfInterest": enteredrateOfInterest,
                        "duration": enteredduration,
                        "repaymentMethod": enteredrepaymentMethod,
                        "loanPurpose": enteredloanPurpose,
                        "expectedDate": enteredexpectedDate
                };
                var postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/" + userId + "/loan/" + primaryType + "/request";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data, textStatus, xhr) {
                                        console.log(data);
                                        $("#modal-raisealoan").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        console.log('Error Something');
                                },
                                beforeSend: function(xhr) {
                                        xhr.setRequestHeader("accessToken", saccessToken);

                                }
                        });
                }
                return isValid;
        });


        // ENDS  RAISE A LOAN REQUEST //

        // CREATE A LOAN REQUEST //
        $("#createloan-submit-btn").click(function() {

                var enteredloanRequestAmount = $(".loanRequestAmount").val();
                var enteredrateOfInterest = $(".rateOfInterest").val();
                var enteredduration = $(".durationValue").val();
                var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
                var enteredloanPurpose = $(".loanPurpose").val();
                var enteredexpectedDate = $(".expectedDateValue").val();
                var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
                var woim = false;
                var isValid = true;

                if (enteredloanRequestAmount == "") {
                        $(".loanRequestAmountError").show();
                        isValid = false;
                } else {
                        $(".loanRequestAmountError").hide();

                }

                if (enteredrateOfInterest == "") {
                        $(".rateOfInterestError").show();
                        isValid = false;
                } else {
                        $(".rateOfInterestError").hide();

                }

                if (enteredduration == "") {
                        $(".durationError").show();
                        isValid = false;
                } else {
                        $(".durationError").hide();

                }

                if (enteredrepaymentMethod == "") {
                        $(".repaymentMethodError").show();
                        isValid = false;
                } else {
                        $(".repaymentMethodError").hide();

                }

                var i = 0;
                for (var i = 0; i < wayOfinterestMethod.length; i++) {
                        if (wayOfinterestMethod[i].checked == true) {
                                woim = true;
                        }
                }
                if (!woim) {
                        $(".repaymentMethodError").show();
                        isValid = false;
                } else {
                        $(".repaymentMethodError").hide();

                }


                if (enteredloanPurpose == "") {
                        $(".loanPurposeError").show();
                        isValid = false;
                } else {
                        $(".loanPurposeError").hide();


                }

                if (enteredexpectedDate == "") {
                        $(".expectedDateError").show();
                        isValid = false;
                } else {
                        $(".expectedDateError").hide();

                }

                // return isValid;


                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;
                var getloanId = $('.requestidFromClick').html();

                var postData = {
                        "loanRequestAmount": enteredloanRequestAmount,
                        "rateOfInterest": enteredrateOfInterest,
                        "duration": enteredduration,
                        "repaymentMethod": enteredrepaymentMethod,
                        "loanPurpose": enteredloanPurpose,
                        "expectedDate": enteredexpectedDate,
                        "parentRequestId": getloanId
                };
                var postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/" + userId + "/loan/" + primaryType + "/request";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "POST",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",
                                success: function(data, textStatus, xhr) {
                                        console.log(data);
                                        $("#modal-raisealoan").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        console.log('Error Something');
                                },
                                beforeSend: function(xhr) {
                                        xhr.setRequestHeader("accessToken", saccessToken);

                                }
                        });
                }
                return isValid;
        });


        // ENDS CREATE A LOAN REQUEST//


        // ADDRESS DETAILS //

        $("#address-submit-btn").click(function() {
                //PERMANENT CALL//
                var enteredpermanent_Type = "PERMANENT";
                var enteredpermanent_Housenumber = $(".permanent_housenumberValue").val();
                var enteredpermanent_Street = $(".permanent_streetValue").val();
                var enteredpermanent_Area = $(".permanent_areaValue").val();
                var enteredpermanent_City = $(".permanent_cityValue").val();

                var isValid = true;


                if (enteredpermanent_Housenumber == "") {
                        $(".permanent_housenumberError").show();
                        isValid = false;
                } else {
                        $(".permanent_housenumberError").hide();
                        isValid = true;
                }

                if (enteredpermanent_Street == "") {
                        $(".permanent_streetError").show();
                        isValidstreetError = false;
                } else {
                        $(".permanent_streetError").hide();
                        isValid = true;
                }

                if (enteredpermanent_Area == "") {
                        $(".permanent_areaError").show();
                        isValid = false;
                } else {
                        $(".permanent_areaError").hide();
                        isValid = true;
                }
                if (enteredpermanent_City == "") {
                        $(".permanent_cityError").show();
                        isValid = false;
                } else {
                        $(".permanent_cityError").hide();
                        isValid = true;
                }

                // Present

                var enteredpresent_Type = "PRESENT";
                var enteredpresent_Housenumber = $(".present_housenumberValue").val();
                var enteredpresent_Street = $(".present_streetValue").val();
                var enteredpresent_Area = $(".present_areaValue").val();
                var enteredpresent_City = $(".present_cityValue").val();



                var isValid = true;


                if (enteredpresent_Housenumber == "") {
                        $(".present_housenumberError").show();
                        isValid = false;
                } else {
                        $(".present_housenumberError").hide();
                        isValid = true;
                }

                if (enteredpresent_Street == "") {
                        $(".present_streetError").show();
                        isValidstreetError = false;
                } else {
                        $(".present_streetError").hide();
                        isValid = true;
                }

                if (enteredpresent_Area == "") {
                        $(".present_areaError").show();
                        isValid = false;
                } else {
                        $(".present_areaError").hide();
                        isValid = true;
                }
                if (enteredpresent_City == "") {
                        $(".present_cityError").show();
                        isValid = false;
                } else {
                        $(".present_cityError").hide();
                        isValid = true;
                }

                //office 
                //Office Call//
                var enteredoffice_Type = "OFFICE";
                var enteredoffice_Housenumber = $(".office_housenumberValue").val();
                var enteredoffice_Street = $(".office_streetValue").val();
                var enteredoffice_Area = $(".office_areaValue").val();
                var enteredoffice_City = $(".office_cityValue").val();



                var isValid = true;


                if (enteredoffice_Housenumber == "") {
                        $(".office_housenumberError").show();
                        isValid = false;
                } else {
                        $(".office_housenumberError").hide();
                        isValid = true;
                }
                if (enteredoffice_Street == "") {
                        $(".office_streetError").show();
                        isValid = false;
                } else {
                        $(".office_streetError").hide();
                        isValid = true;
                }

                if (enteredoffice_Area == "") {
                        $(".office_areaError").show();
                        isValid = false;
                } else {
                        $(".office_areaError").hide();
                        isValid = true;
                }
                if (enteredoffice_City == "") {
                        $(".office_cityError").show();
                        isValid = false;
                } else {
                        $(".office_cityError").hide();
                        isValid = true;
                }
                //alert(isValid);

                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                userId = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "type": enteredpermanent_Type,
                        "userId": userId,
                        "houseNumber": enteredpermanent_Housenumber,
                        "street": enteredpermanent_Street,
                        "area": enteredpermanent_Area,
                        "city": enteredpermanent_City
                };
                var postData = JSON.stringify(postData);

                var postData1 = {
                        "type": enteredpresent_Type,
                        "userId": userId,
                        "houseNumber": enteredpresent_Housenumber,
                        "street": enteredpresent_Street,
                        "area": enteredpresent_Area,
                        "city": enteredpresent_City
                };
                var postData1 = JSON.stringify(postData1);

                var postData2 = {
                        "type": enteredoffice_Type,
                        "userId": userId,
                        "houseNumber": enteredoffice_Housenumber,
                        "street": enteredoffice_Street,
                        "area": enteredoffice_Area,
                        "city": enteredoffice_City
                };
                var postData2 = JSON.stringify(postData2);


                console.log(postData);
                console.log(postData1);
                console.log(postData2);
                regUrl = baseUrl + "v1/user/" + userId + "/address/PERMANENT";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",

                                success: function(data, textStatus, xhr) {
                                        console.log(data);
                                        //$("#modal-addressSuccess").modal('show');
                                        regUrl = baseUrl + "v1/user/" + userId + "/address/PRESENT";
                                        // PRESENT API CALL
                                        $.ajax({
                                                url: regUrl,
                                                type: "PATCH",
                                                data: postData1,
                                                contentType: "application/json",
                                                dataType: "json",

                                                success: function(data, textStatus, xhr) {
                                                        console.log(data);
                                                        regUrl = baseUrl + "v1/user/" + userId + "/address/OFFICE";
                                                        $.ajax({
                                                                url: regUrl,
                                                                type: "PATCH",
                                                                data: postData2,
                                                                contentType: "application/json",
                                                                dataType: "json",

                                                                success: function(data, textStatus, xhr) {
                                                                        console.log(data);
                                                                        $("#modal-addressSuccess").modal('show');
                                                                },
                                                                error: function(xhr, textStatus, errorThrown) {
                                                                        $("#modal-address-error").modal('show');
                                                                },
                                                                beforeSend: function(xhr) {
                                                                        xhr.setRequestHeader("accessToken", saccessToken);
                                                                }
                                                        });

                                                },
                                                error: function(xhr, textStatus, errorThrown) {
                                                        $("#modal-address-erroror").modal('show');
                                                },
                                                beforeSend: function(xhr) {
                                                        xhr.setRequestHeader("accessToken", saccessToken);
                                                }
                                        });
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        $("#modal-address-error").modal('show');
                                },
                                beforeSend: function(xhr) {
                                        xhr.setRequestHeader("accessToken", saccessToken);
                                }
                        });
                }
                return isValid;
        });


        $(".sameasAbove").click(function() {
                var h = $('#permanent_housenumber').val();
                var s = $('#permanent_street').val();
                var a = $('#permanent_area').val();
                var c = $('#permanent_city').val();

                $('.present_housenumberValue').val(h);
                $('.present_streetValue').val(s);
                $('.present_areaValue').val(a);
                $('.present_cityValue').val(c);
        });

        $(".viewmorestats").click(function() {
                $(".moreStatsDisplay").show("slow");
                $(".hideStats").show();
                $(".viewmorestats").hide();
        });

        $(".hideStats").click(function() {
                $(".viewmorestats").show();
                $(".hideStats, .moreStatsDisplay").hide("slow");
        });

        //UPLOAD FUNCTION//

        $(".uploadKYC").click(function() {
                var formData = new FormData($(this)[0]);
                alert(formData);

                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                var formUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + suserId + "/upload/kyc";



                $.ajax({
                        type: 'POST',
                        url: formUrl,
                        data: formData,
                        contentType: "multipart/form-data",

                        xhr: function() {
                                var myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                        myXhr.upload.addEventListener('progress', progress, false);
                                }
                                return myXhr;
                        },

                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                                console.log(data);
                                alert('data returned successfully');
                        },

                        error: function(data) {
                                console.log(data);
                        },
                        beforeSend: function(xhr) {
                                xhr.setRequestHeader("accessToken", saccessToken);
                        },
                });
        });
        // ENDS UPLOAD function //

        $(".sendOfferToBorrower").click(function() {
                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                sendofferURL = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + suserId + "/loan/" + sprimaryType + "/request";
                alert(sendofferURL);
        });

        $("#loanRequestAmount, #rateOfInterest, #duration").change(function() {

                console.log('in');
                var loanValue = $("#loanRequestAmount").val();
                var cTenurevalue = $("#duration").val();
                var cRoiValue = $("#rateOfInterest").val();
                var tenureinYears = cTenurevalue * 1 / 12;
                console.log("tenureinYears " + tenureinYears);
                var calcEarnings = loanValue * cRoiValue * tenureinYears / 100;
                console.log(calcEarnings);

                var totalloanvalue = parseInt(loanValue) + calcEarnings;
                console.log("totalloanvalue " + totalloanvalue);
                var emivalue = totalloanvalue / cTenurevalue;
                console.log(emivalue);

                var payonlyint = calcEarnings / cTenurevalue;


                $(".displayEMIvalue").show();
                $(".payonlyint").html(payonlyint);
                $(".emiValueIs").html(emivalue);

                // do your code here
                // When your element is already rendered
        });


        // FINANCIAL INFO STARTS //

        $("#financial-submit-btn").click(function() {
                var enteredMonthlyemi = $(".monthlyEmiValue").val();
                var enteredCreditamount = $(".creditamountValue").val();
                var enteredExistingloanamount = $(".existingloanamountValue").val();
                var enteredCreditcardsrepaymentamount = $(".creditcardsrepaymentamountValue").val();
                var enteredOthersourcesincome = $(".othersourcesincomeValue").val();
                var enteredNetmonthlyincome = $(".netmonthlyincomeValue").val();
                var enteredavgMonthlyExpenses = $(".avgmonthlyexpensesValue").val();



                var isValid = true;
                if (enteredMonthlyemi == "") {
                        $(".monthlyEmiError").show();
                        isValid = false;
                } else {
                        $(".monthlyEmiError").hide();

                }

                if (enteredCreditamount == "") {
                        $(".creditamountError").show();
                        isValid = false;
                } else {
                        $(".creditamountError").hide();

                }

                if (enteredExistingloanamount == "") {
                        $(".existingloanamountError").show();
                        isValid = false;
                } else {
                        $(".existingloanamountError").hide();

                }

                if (enteredCreditcardsrepaymentamount == "") {
                        $(".creditcardsrepaymentamountError").show();
                        isValid = false;
                } else {
                        $(".creditcardsrepaymentamountError").hide();

                }
                if (enteredOthersourcesincome == "") {
                        $(".othersourcesincomeError").show();
                        isValid = false;
                } else {

                        $(".othersourcesincomeError").hide();

                }

                if (enteredNetmonthlyincome == "") {
                        $(".netmonthlyincomeError").show();
                        isValid = false;
                } else {
                        $(".netmonthlyincomeError").hide();

                }
                if (enteredavgMonthlyExpenses == "") {
                        $(".avgmonthlyexpensesError").show();
                        isValid = false;
                } else {
                        $(".avgmonthlyexpensesError").hide();

                }


                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                id = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "monthlyEmi": enteredMonthlyemi,
                        "creditAmount": enteredCreditamount,
                        "existingLoanAmount": enteredExistingloanamount,
                        "creditCardsRepaymentAmount": enteredCreditcardsrepaymentamount,
                        "otherSourcesIncome": enteredOthersourcesincome,
                        "netMonthlyIncome": enteredNetmonthlyincome,
                        "avgMonthlyExpenses": enteredavgMonthlyExpenses
                };
                postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/financialDetails/" + id + "";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",

                                success: function(data, textStatus, xhr) {

                                        console.log(data);
                                        $("#modal-FinancialSuccess").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        console.log('Error Something');
                                },
                                beforeSend: function(xhr) {

                                        xhr.setRequestHeader("accessToken", saccessToken);
                                }


                        });
                }
                return isValid;
        });

        // FINANCIAL INFO ENDS //

        // BANK DETAILS  //

        $("#accountnumber").on('keypress', function(e) {
                var $this = $(this);
                var regex = new RegExp("^[0-9\b]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if ($this.val().length > 20) {
                        e.preventDefault();
                        return false;
                }
                if (regex.test(str)) {
                        return true;
                }
                e.preventDefault();
                return false;

        });

        $("#bank-submit-btn").click(function() {
                var enteredAccountnumber = $(".accountnumberValue").val();
                var enteredBankname = $(".banknameValue").val();
                var enteredBranchname = $(".branchnameValue").val();
                var enteredAccounttype = $(".accounttypeValue").val();
                var enteredIfsccode = $(".ifsccodeValue").val();
                var enteredAddress = $(".addressValue").val();



                var isValid = true;
                if (enteredAccountnumber == "") {
                        $(".accountnumberError").show();
                        isValid = false;
                } else {
                        $(".accountnumberError").hide();
                }

                if (enteredBankname == "") {
                        $(".banknameError").show();
                        isValid = false;
                } else {
                        $(".banknameError").hide();
                }

                if (enteredBranchname == "") {
                        $(".branchnameError").show();
                        isValid = false;
                } else {
                        $(".branchnameError").hide();
                }

                if (enteredAccounttype == "") {
                        $(".accounttypeError").show();
                        isValid = false;
                } else {
                        $(".accounttypeError").hide();
                }
                if (enteredIfsccode == "") {
                        $(".ifsccodeError").show();
                        isValid = false;
                } else {
                        $(".ifsccodeError").hide();
                }

                if (enteredAddress == "") {
                        $(".addressError").show();
                        isValid = false;
                } else {
                        $(".addressError").hide();
                }

                suserId = getCookie("sUserId");
                sprimaryType = getCookie("sUserType");
                saccessToken = getCookie("saccessToken");
                id = suserId;
                primaryType = sprimaryType;
                accessToken = saccessToken;

                var postData = {
                        "accountNumber": enteredAccountnumber,
                        "bankName": enteredBankname,
                        "branchName": enteredBranchname,
                        "accountType": enteredAccounttype,
                        "ifscCode": enteredIfsccode,
                        "address": enteredAddress
                };
                postData = JSON.stringify(postData);
                console.log(postData);
                regUrl = baseUrl + "v1/user/bankdetails/" + id + "";
                if (isValid == true) {
                        $.ajax({
                                url: regUrl,
                                type: "PATCH",
                                data: postData,
                                contentType: "application/json",
                                dataType: "json",

                                success: function(data, textStatus, xhr) {

                                        console.log(data);
                                        $("#modal-bankSuccess").modal('show');
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        console.log('Error Something');
                                },
                                beforeSend: function(xhr) {

                                        xhr.setRequestHeader("accessToken", saccessToken);
                                }


                        });
                }
                return isValid;
        });








        // ONLOAD ENDS
});
// ONLOAD ENDS

function progress(e) {

        if (e.lengthComputable) {
                var max = e.total;
                var current = e.loaded;

                var Percentage = (current * 100) / max;
                console.log(Percentage);


                if (Percentage >= 100) {
                        // process completed  
                }
        }
}

function writeCookie(name, value, days) {
        var date, expires;
        console.log(name);
        console.log(value);
        if (days) {
                date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
        } else {
                expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
}

//LOAD LENDER DASHBOARD DATA //
function loadDashboardData() {

        //checkCookie();

        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        //alert("sprimaryType "+suserId+sprimaryType+" ACCESSTOKEN "+" "+saccessToken);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/dashboard/" + primaryType + "?current=false";
        //alert(getStatUrl);
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);

                        if (data.amountDisbursed == null) {
                                data.amountDisbursed = 0;
                        }
                        if (data.interestPaid == null) {
                                data.interestPaid = 0;
                        }
                        if (data.principalReceived == null) {
                                data.principalReceived = 0;
                        }
                        if (data.totalTransactionFee == null) {
                                data.totalTransactionFee = 0;
                        }

                        $(".amountDisbursed").html(data.amountDisbursed);
                        $(".commitmentAmount").html(data.commitmentAmount);
                        $(".availableForInvestment").html(data.availableForInvestment);
                        $(".interestPaid").html(data.interestPaid);
                        $(".noOfActiveLoans").html(data.noOfActiveLoans);
                        $(".noOfClosedLoans").html(data.noOfClosedLoans);
                        $(".noOfDisbursedLoans").html(data.noOfDisbursedLoans);
                        $(".noOfFailedEmis").html(data.noOfFailedEmis);
                        $(".noOfLoanRequests").html(data.noOfLoanRequests);
                        $(".outstandingAmount").html(data.outstandingAmount);
                        $(".principalReceived").html(data.principalReceived);
                        $(".totalTransactionFee").html(data.totalTransactionFee);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", accessToken);
                }
        });
}

function getUserDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");
        if (suserId != "") {
                $('.placeUserID').html(suserId);
        }

        // Get User Name from Personal Details API
        var personalDetailsUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/" + suserId + "";
        $.ajax({
                url: personalDetailsUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        userNameFromAPI = data.firstName;
                        if (userNameFromAPI == "") {
                                userNameFromAPI = "User";
                        }
                        userlastNameFromAPI = data.lastName;
                        if (userlastNameFromAPI == "") {
                                userlastNameFromAPI = "Name";
                        }

                        $(".displayUserName").html(userNameFromAPI + " " + userlastNameFromAPI);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });



}



// LOAD BORROWER DASHBOARD //
function loadborrowerDashboardData() {
        //checkCookie();
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");


        userId = suserId;
        primaryType = sprimaryType;
        saccessToken = saccessToken;





        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/dashboard/" + primaryType + "?current=false";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        $(".commitmentAmount").html(data.commitmentAmount);
                        $(".interestPaid").html(data.interestPaid);
                        $(".noOfActiveLoans").html(data.noOfActiveLoans);
                        $(".noOfClosedLoans").html(data.noOfClosedLoans);
                        $(".noOfDisbursedLoans").html(data.noOfDisbursedLoans);
                        $(".noOfFailedEmis").html(data.noOfFailedEmis);
                        $(".noOfLoanRequests").html(data.noOfLoanRequests);
                        $(".outstandingAmount").html(data.outstandingAmount);
                        $(".principalReceived").html(data.principalReceived);
                        $(".totalTransactionFee").html(data.totalTransactionFee);
                        $(".amountDisbursed").html(data.amountDisbursed);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}

// LOAD BORROWER LISTINGS //

function loadBorrowersListings() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "LENDER") {
                var fieldValueforSearch = "BORROWER";
        } else {
                var fieldValueforSearch = "LENDER";
        }
        //alert(fieldValueforSearch); 
        var postData = { "fieldName": "userPrimaryType", "fieldValue": fieldValueforSearch, "operator": "EQUALS", "Page": { "pageNo": 1, "pageSize": 3 } };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('loatListiongsTpl').innerHTML;;
                        //console.log(template);
                        Mustache.parse(template);
                        //var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });


                        //alert(html);
                        $('#loadBorrowersListings').html(html);


                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}

function loadLendersListings() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "BORROWER") {
                var fieldValueforSearch = "LENDER";
        } else {
                var fieldValueforSearch = "BORROWER";
        }
        //alert(fieldValueforSearch); 
        var postData = { "fieldName": "userPrimaryType", "fieldValue": fieldValueforSearch, "operator": "EQUALS", "Page": { "pageNo": 1, "pageSize": 3 } };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('loanListiongsTpl').innerHTML;;
                        //console.log(template);
                        Mustache.parse(template);
                        //var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });


                        //alert(html);
                        $('#loadLendersListings').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}

//LOAN LISTINGS FUNCTION //

function loadloanListings() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "LENDER") {
                var fieldValueforSearch = "BORROWER";
        } else {
                var fieldValueforSearch = "LENDER";
        }
        //alert(fieldValueforSearch); 
        var postData = { "fieldName": "userPrimaryType", "fieldValue": fieldValueforSearch, "operator": "EQUALS", "Page": { "pageNo": 1, "pageSize": 3 } };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('loanListiongsTpl').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        //var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });

                        //alert(html);
                        $('#loadloanListings').html(html);


                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


//LOAN LISTINGS FUNCTION ENDS //


// BORROWER LOAN FUNCTION //

function loadborrowerloanListings() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "LENDER") {
                var fieldValueforSearch = "BORROWER";
        } else {
                var fieldValueforSearch = "LENDER";
        }
        var postData = { "fieldName": "userPrimaryType", "fieldValue": fieldValueforSearch, "operator": "EQUALS", "Page": { "pageNo": 1, "pageSize": 3 } };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('loanListiongsTpl').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        //var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });

                        //alert(html);
                        $('#loadborrowerloanListings').html(html);


                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}

//BORROWER LOAN FUNCTION ENDS //

function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                }
        }
        return "";
}

function checkCookie() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("primaryType");
        saccessToken = getCookie("accessToken");
        return suserId, sprimaryType, saccessToken;
        if (document.cookie.indexOf('sUserId') > -1) {
                window.location = "userlogin";
        }

}






function readPAN(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                        $('.panUpload .image-upload-wrap').hide();

                        $('.panUpload .file-upload-image').attr('src', e.target.result);
                        $('.panUpload .file-upload-content').show();

                        $('.panUpload .image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

        } else {
                removeUpload();
        }
}

function readAADHAR(input) {
        if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                        $('.aadharUpload .image-upload-wrap').hide();

                        $('.aadharUpload .file-upload-image').attr('src', e.target.result);
                        $('.aadharUpload .file-upload-content').show();

                        $('.aadharUpload .image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

        } else {
                removeUpload();
        }
}


function readPASSPORT(input) {
        if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                        $('.passportUpload .image-upload-wrap').hide();

                        $('.passportUpload .file-upload-image').attr('src', e.target.result);
                        $('.passportUpload .file-upload-content').show();

                        $('.passportUpload .image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

        } else {
                removeUpload();
        }
}

function removeUpload(fromclass) {
        //var fromclass = $(this).attr("id");
        //alert(fromclass);
        $('.' + fromclass + ' .file-upload-input').replaceWith($('.' + fromclass + ' .file-upload-input').clone());
        $('.' + fromclass + ' .file-upload-content').hide();
        $('.' + fromclass + ' .image-upload-wrap').show();
}


$('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
});

$('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
});


$(".uploadKYC").click(function() {
        //alert(1);
        // Get form
        var form = $('#fileUploadForm')[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");
        //$('.uploadAllFilesAdded').prop("disabled", true);

        //alert(data);

        var panUpload = $('.panFileUpload').val();
        alert(panUpload);


        var aadharUpload = $('.aadharFileUpload').val();
        alert(aadharUpload);

        var passportUpload = $('.passportFileUpload').val();
        alert(passportUpload);
        // var file = panUpload.files[0];
        // var formData = new FormData();
        // formData.append('file', file)

});

function setKYCvars() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");
        var formUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + suserId + "/upload/kyc";
        $("#userKYCUpload").attr("action", formUrl);
}


function loaduserID() {
        suserId = getCookie("sUserId");
        $('.virtualID').html("OXYLR" + suserId);
}



function loadviewLoanoffer() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");


        userId = suserId;
        primaryType = sprimaryType;
        saccessToken = saccessToken;

        var loanRequestId = $('.requestidFromClick').html();
        //alert(loanRequestId);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/" + loanRequestId + "";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        $(".loanPurpose").html(data.loanPurpose);
                        $(".rateOfInterest").html(data.rateOfInterest);
                        $(".loanRequestedDate").html(data.loanRequestedDate);
                        if (data.repaymentMethod == "PI") {
                                $(".repaymentMethod").html("Principal Interest Flat");
                        } else {
                                $(".repaymentMethod").html("Interest");
                        }

                        $(".loanRequestAmount").html(data.loanRequestAmount);
                        $(".loanRequest").html(data.loanRequest);
                        $(".duration").html(data.duration);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function loadresponserequest() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "LENDER") {
                var fieldValueforSearch = "LENDER";
        } else {
                var fieldValueforSearch = "BORROWER";
        }
        //alert(fieldValueforSearch); 
        var postData = {
                "leftOperand": {
                        "fieldName": "parentRequestId",
                        "operator": "NULL"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                        "fieldName": "userId",
                        "fieldValue": userId,
                        "operator": "EQUALS"
                },
                "page": {
                        "pageNo": 1,
                        "pageSize": 10
                }
        };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('displayallRequests').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        //var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });
                        //alert(html);
                        $('#displayRequests').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}




function loadresponsetoMyrequest() {
        var loanRequestId = $('.loanrequestIDP').html();
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        if (primaryType == "BORROWER") {
                var fieldValueforSearch = "LENDER";
        } else {
                var fieldValueforSearch = "BORROWER";
        }
        //alert(fieldValueforSearch); 
        var postData = {
                "leftOperand": {
                        "fieldName": "parentRequestId",
                        "fieldValue": loanRequestId,
                        "operator": "EQUALS"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                        "fieldName": "userPrimaryType",
                        "fieldValue": fieldValueforSearch,
                        "operator": "EQUALS"
                },

                "page": {
                        "pageNo": 1,
                        "pageSize": 10
                }

        };
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";
        $.ajax({
                url: getStatUrl,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        console.log(data.totalCount)
                        var totalCount = data.totalCount;
                        if (totalCount == 0) {
                                $('.displayresponse').html("<b>No responses for yourrequests.</b>")
                        } else {
                                //
                        }
                        var template = document.getElementById('loanListiongsTpl').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });
                        //alert(html);
                        $('#loadresponsetoMyrequest').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function respondToLoanRequest(type, id) {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");
        // /{userId}/loan/{primaryType}/request/{loanRequestId}/{action}
        var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + suserId + "/loan/" + sprimaryType + "/request/" + id + "/" + type;
        //alert(sendofferURL);
        //var postData = {};
        alert(actOnLoan);

        $.ajax({
                url: actOnLoan,
                type: "PATCH",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        alert(data);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function loadaddressDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;

        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/address";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        //$("#modal-addressSuccess").modal('show');
                        /* getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/address";
                                             
                                                   $.ajax ({        
                                                    url: getStatUrl,
                                                      type:"GET",
                                  
                                                     success: function(data,textStatus,xhr){
                                                               console.log(data);
                                  getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/address";
                                                  // PRESENT API CALL
                                                                   $.ajax({        
                                                                    url:getStatUrl ,
                                                                      type:"GET",
                                                                     
                                                                       
                                                                      success: function(data,textStatus,xhr){
                                                                               console.log(data);
                                                                             //  $("#modal-addressSuccess").modal('show');
                                                                           },
                                                                           error: function(xhr,textStatus,errorThrown){
                                                                               console.log('Error Something');
                                                                           },
                                                                          beforeSend: function(xhr) {
                                                                              xhr.setRequestHeader("accessToken",saccessToken);
                                                                         }
                                                                     });
                                                              
                                                                       },
                                                                       error: function(xhr,textStatus,errorThrown){
                                                                           console.log('Error Something');
                                                                       },
                                                                      beforeSend: function(xhr) {
                                                                          xhr.setRequestHeader("accessToken",saccessToken);
                                                                     }
                                                                 });*/
                },

                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", accessToken);
                }
        });
}


//ACCEPTED REQUESTS //
function loadAcceptedrequests() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var postData = {
                "leftOperand": {
                        "fieldName": "parentRequestId",
                        "operator": "NOT_NULL"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                        "leftOperand": {
                                "fieldName": "userId",
                                "operator": "EQUALS",
                                "fieldValue": userId
                        },
                        "logicalOperator": "AND",
                        "rightOperand": {
                                "fieldName": "loanStatus",
                                "fieldValue": "Accepted",
                                "operator": "EQUALS"
                        }
                },
                "page": {
                        "pageNo": 1,
                        "pageSize": 10
                }
        }
        var postData = JSON.stringify(postData);
        console.log(postData);
        var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";


        //alert(actOnLoan);

        $.ajax({
                url: actOnLoan,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('displayallRequests').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });
                        //alert(html);
                        $('#displayRequests').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}



//REJECTED REQUESTS //

function loadRejectedrequests() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        userId = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var postData = {
                "leftOperand": {
                        "fieldName": "parentRequestId",
                        "operator": "NOT_NULL"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                        "leftOperand": {
                                "fieldName": "userId",
                                "operator": "EQUALS",
                                "fieldValue": userId
                        },
                        "logicalOperator": "AND",
                        "rightOperand": {
                                "fieldName": "loanStatus",
                                "fieldValue": "Rejected",
                                "operator": "EQUALS"
                        }
                },
                "page": {
                        "pageNo": 1,
                        "pageSize": 10
                }
        }
        var postData = JSON.stringify(postData);
        console.log(postData);
        var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/request/search";


        //alert(actOnLoan);

        $.ajax({
                url: actOnLoan,
                type: "POST",
                data: postData,
                contentType: "application/json",
                dataType: "json",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        var template = document.getElementById('displayallRequests').innerHTML;
                        //console.log(template);
                        Mustache.parse(template);
                        var html = Mustache.render(template, data);
                        var html = Mustache.to_html(template, { data: data.results });
                        //alert(html);
                        $('#displayRequests').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function loadpersonalDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");
        $(".displayFormElements").hide();
        id = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/" + id + "";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);

                        $("#firstname").val(data.firstName);
                        $("#lastname").val(data.lastName);
                        $("#fathername").val(data.fatherName);
                        $("#dateofbirth").val(data.dob);
                        $("#nationality").val(data.nationality);
                        var $genderRadio = $('input:radio[name=gendervalue]');
                        if ($genderRadio.is(':checked') === false) {
                                $genderRadio.filter("[value=" + data.gender + "]").prop('checked', true);
                        }
                        var $maritalStatusRadio = $('input:radio[name=maritalStatus]');
                        if ($maritalStatusRadio.is(':checked') === false) {
                                $maritalStatusRadio.filter("[value=" + data.maritalStatus + "]").prop('checked', true);
                        }

                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function loadprofessionalDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        id = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/professional/" + id + "";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        //$(".getemployment").html(data.employment);
                        // $(".getcompanyname").html(data.companyName);
                        // $(".getdesignation").html(data.designation);
                        // $(".getdescription").html(data.description);
                        // $(".getNoOfJobsChanged").html(data.noOfJobsChanged);
                        //$(".getworkExperience").html(data.workExperience);
                        // $(".gethighestQualifications").html(data.highestQualification);
                        //  $(".getofficeAddressId").html(data.officeAddressId);
                        //  $(".getofficeContactNumber").html(data.officeContactNumber);
                        // $(".getfieldOfStudy").html(data.fieldOfStudy);
                        //   $(".getcollege").html(data.college);
                        //  $(".getyearOfPassing").html(data.yearOfPassing);
                        $("#employment").val(data.employment);
                        $("#companyname").val(data.companyName);
                        $("#description").val(data.description);
                        $("#designation").val(data.designation);
                        $("#fieldOfStudy").val(data.fieldOfStudy);
                        $("#highestQualification").val(data.highestQualification);
                        $("#NoOfJobsChanged").val(data.noOfJobsChanged);
                        $("#officeAddressId").val(data.officeAddressId);
                        $("#officeContactNumber").val(data.officeContactNumber);
                        $("#workExperience").val(data.workExperience);
                        $(".yearOfPassingValue").val(data.yearOfPassing);
                        $("#college").val(data.college);




                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}


function loadfinancialDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        id = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/getfinancialDetails/" + id + "";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);
                        // $(".getmonthlyEmi").html(data.monthlyEmi);
                        // $(".getcreditamount").html(data.creditAmount);
                        // $(".getexistingloanamount").html(data.existingLoanAmount);
                        // $(".getcreditcardsrepaymentamount").html(data.creditCardsRepaymentAmount);
                        // $(".getothersourcesincome").html(data.otherSourcesIncome);
                        // $(".getnetmonthlyincome").html(data.netMonthlyIncome);
                        // $(".getavgmonthlyexpenses").html(data.avgMonthlyExpenses);
                        $("#monthlyEmi").val(data.monthlyEmi);
                        $("#creditamount").val(data.creditAmount);
                        $("#existingloanamount").val(data.existingLoanAmount);
                        $("#creditcardsrepaymentamount").val(data.creditCardsRepaymentAmount);
                        $("#othersourcesincome").val(data.otherSourcesIncome);
                        $("#netmonthlyincome").val(data.netMonthlyIncome);
                        $("#avgmonthlyexpenses").val(data.avgMonthlyExpenses);

                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}

function loadbankDetails() {
        suserId = getCookie("sUserId");
        sprimaryType = getCookie("sUserType");
        saccessToken = getCookie("saccessToken");

        id = suserId;
        primaryType = sprimaryType;
        accessToken = saccessToken;
        var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/bankdetails/" + id + "";
        $.ajax({
                url: getStatUrl,
                type: "GET",
                success: function(data, textStatus, xhr) {
                        console.log(data);

                        $("#accountnumber").val(data.accountNumber);
                        $("#bankname").val(data.bankName);
                        $("#branchname").val(data.branchName);
                        $("#accounttype").val(data.accountType);
                        $("#ifsccode").val(data.ifscCode);
                        $("#address").val(data.address);

                },
                error: function(xhr, textStatus, errorThrown) {
                        console.log('Error Something');
                },
                beforeSend: function(xhr) {
                        xhr.setRequestHeader("accessToken", saccessToken);
                }
        });
}