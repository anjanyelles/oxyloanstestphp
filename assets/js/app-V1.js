 $(document).ready(function() {
baseUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
folderName = "FEOxyLoans";
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
     lenderAmtValue:{
       required: true
      },
      lmobileNumber:{
         required:true
        }
    },
    messages:{
      lenderAmtValue:{
         required:"Please enter amount interested to lend."
      },
      lmobileNumber:{
         required:"Please enter mobile number."
      }
    },highlight: function(element, errorClass, validClass) {
      $(element).addClass(errorClass).removeClass(validClass);
      $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
    },unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass).addClass(validClass);
      $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
  },submitHandler: function() {
   var regUrl = baseUrl+"v1/user/register"
		$(".loading").show();
     var userData = {
          amt: $("#lenderAmtValue").val(),
          userType:$("#lenderuserType").val(),
          mobileNumber:$("#lmobileNumber").val()
     }
     var amt =$("#lenderAmtValue").val();
    // amt = parseInt(amt);
     var userType = $("#lenderuserType").val();
     var mobileNumber = $("#lmobileNumber").val();
      
     var postData = {mobileNumber:mobileNumber, type:userType, amountInterested:amt};
     var postData = JSON.stringify(postData);

    $.ajax({
      url: regUrl,
      type: "POST",
      data: postData,
      contentType: "application/json",
      dataType: "json",
      success: function(data){
        console.log(data);
        userID = data.id;
        gMobileNumber = $("#lmobileNumber").val();
        console.log(userID);
        console.log(gMobileNumber);
        $("#lender").hide();
        $('.enterOTPSection').show();
     	 $(".loading").hide();
      }, error: function (request, error) {
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
     borrowerAmtValue:{
          required: true
      },
      bmobileNumber:{
         required:true
        }
    },
    messages:{
      borrowerAmtValue:{
         required:"please fill this field"
      },
      bmobileNumber:{
         required:"please fill this field"
      }
    },
    submitHandler: function() {
      $(".loading").show();
       var amt =$("#benderAmtValue").val();
    // amt = parseInt(amt);
     var userType = $("#benderuserType").val();
     var mobileNumber = $("#bmobileNumber").val();
      
     var postData = {mobileNumber:mobileNumber, type:userType, amountInterested:amt};
     var postData = JSON.stringify(postData);
      var regUrl =  baseUrl+"v1/user/register";

        $.ajax({
          url: regUrl,
          type: "POST",
          data: postData,
          contentType: "application/json",
          dataType: "json",
          success: function(data){
            console.log(data);
            userID = data.id;
            gMobileNumber = data.mobileNumber;
            console.log(userID);
            $("#borrower").hide();
            $('.enterOTPSection').show();

            $(".loading").hide();
          }, error: function (request, error) {
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
if ($this.val().length >6) {
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
     otpValue:{
          required: true
      },
      emailValue:{
         required:true,
          email:true
        }
    },
    messages:{
      otpValue:{
         required:"please fill this field"
      },
      emailValue :{
         required:"please fill this field",
          email:"Pleaase enter valid email"
      }
    },submitHandler: function() {
       $(".loading").show();
     var enteredOTPValue = $("#otpValue").val();
     var enteredEmail = $("#emailValue").val();
     var postData = {"mobileNumber": gMobileNumber, "mobileOtpValue": enteredOTPValue, "email":enteredEmail};

     var postData = JSON.stringify(postData);

      regUrl = baseUrl+"v1/user/register";
        
        $.ajax({
            url: regUrl,
            type: "PATCH",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function(data){
              console.log(data);
              //var response = JSON.parse(data);
              //$('.enterOTPSection').hide();
              
              $("#modal-RegisterSuccess").modal('show');
              //$('.displayUploadFile').show();
              $(".loading").hide();
               setTimeout(function(){ 
                window.location = "userlogin";
              }, 3000);
            }, error: function (request, error) {
              console.log(arguments);
            }
          });
      }
  });
  // user login validations//
  $("#userloginSection").validate({
rules: {
     emailValue:{
        required:true,
         email:true
       },
      password:{
        required:true
       }
   },
   messages:{
    emailValue :{
      required:"Please enter email",
       email:"Please enter valid email"
     },
    password:{
     required:"Please enter password"
     }
  },
  //user login api call//
   submitHandler: function() {
   var enteredEmail = $("#emailValue").val();
   var enteredPassword = $("#password").val();
   var postData = { "password": enteredPassword, "email":enteredEmail };
   var postData = JSON.stringify(postData);
   console.log(postData);
   regUrl = baseUrl+"v1/user/login?grantType=PWD";
       $.ajax({
           url: regUrl,
           type: "POST",
           data: postData,
           contentType: "application/json",
           //contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "json",
           success: function(data){
             console.log(data);
              //headers: {'accessToken': "token String"},
             userID = data.id;
             userType = data.primaryType;
             var sId = data.id;
             writeCookie('sUserId', sId);
            
             var sUserType = data.primaryType;
             writeCookie('sUserType', sUserType);
              
               if(sUserType == "Lender"){
                window.location = "lenderDashBoard";
               }else{
                window.location = "dashboard";
               }
           },
         }).done(function (data, textStatus, xhr) {
             console.log(xhr.getResponseHeader('accessToken'));
             accessToken = xhr.getResponseHeader('accessToken');
             
             writeCookie('saccessToken', accessToken);

             var sUserType = data.primaryType;
             if(sUserType == "LENDER"){
              window.location = "lenderDashBoard";
             }else{
              window.location = "dashboard";
             }
       });
 }
});


 

//Activateuser validations//
$(".activateSection").validate({   
  rules: {
      password:{
         required:true
      },
      cpassword:{
        equalTo : "#password"
      }  

    },
    messages:{
      password :{
       required:"Please enter password",
        password:"Please enter password"
      },
     cpassword:{
        equalTo:"Password and Confirm must be same.",
      }
   },
   submitHandler: function() {
      var enteredPassword = $(".passwordValue").val();
      var enteredcPassword = $(".cpasswordValue").val();
      var emailToken = $(".emailToken").val();
      var postData = { "password": enteredPassword,"confirmPassword":enteredcPassword  };
      var postData = JSON.stringify(postData);
       regUrl = baseUrl+"v1/user/register/"+emailToken+"/verify";
        // alert(regUrl);
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function(data){
              console.log(data);
              $("#modal-activateUser").modal('show');
              setTimeout(function(){ 
                window.location = "userlogin";
              }, 2000);
            }, error: function (request, error) {
              console.log(arguments);
               $("#modal-activateUser-error").modal('show');
            }
                
          });
       }
});

// ENDS ACTIVATE USER//


// FORGOT SECTION VALIDATIONS//

 $(".phonenumber").on('keypress', function(e) {
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


//FORGOT EMAIL AND MOBILE FUNCTION//

$("#resetbtn").click(function(){
    var enteredemailValue = $("#email").val(); 
    var enteredPhoneValue = $("#phonenumber").val();
   if(enteredemailValue == "" && enteredPhoneValue == ""){
    $('.displayError-forgot').html("Please enter email or phone number to reset password.");
    $('.displayError-forgot').show();
    return false;
  }else if(enteredemailValue != "" && enteredPhoneValue != ""){
      $('.displayError-forgot').html("Please choose only <b>one</b> option to reset password.");
      $('.displayError-forgot').show();
  } else{
      $('.displayError-forgot').hide();
      if(enteredemailValue ==""){
        // USER ENTERED MOBILE NUMBER
       $(".enterforgotSection").hide();
       $(".otpSection").show();
    }
      if(enteredPhoneValue ==""){
        // USER ENTERED EMAIL
        var enteredemailValue = $("#email").val();
        var postData = {"email":enteredemailValue};
        var postData = JSON.stringify(postData);
        console.log(postData);
        var EmailPattern = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
        $('.displayError-forgot').html("Please enter valid email.");
        $('.displayError-forgot').show();
        //alert(EmailPattern);
        
        if( !EmailPattern.test(enteredemailValue)){
          $('.displayError-forgot').html("Please enter valid email.");
          $('.displayError-forgot').show();
          return false;
        } else {
            $('.displayError-forgot').hide();
        }


       regUrl = baseUrl+"v1/user/resetpassword";
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function(data){
               $("#modal-resetSuccess").modal('show');
              console.log(data);
             }
           });
        }
      }
    });
   
 
  $("#savebtn").click(function(){
     var enteredPassword = $(".passwordValue").val();
      var enteredcPassword = $(".cpasswordValue").val();
      var emailToken = $(".emailToken").val();
    
    if(enteredPassword == "" && enteredcPassword == ""){
    $('.displayError-forgot').html("Please enter Password and ConfirmPassword to reset password.");
    $('.displayError-forgot').show();
}
 var postData = {"password": enteredPassword,"confirmPassword":enteredcPassword};
 var postData = JSON.stringify(postData);
  regUrl = baseUrl+"v1/user/resetpassword/"+emailToken+"";
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function(data){
               $("#modal-resetpasswordSuccess").modal('show');
               setTimeout(function(){ 
                window.location = "userlogin";
              }, 2000);
             }
           });
 });

// ENDS FORGOT SECTION//



//PERSONALINFO SECTION VALIDATIONS//
$("#firstname").keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });
$("#lastname").keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });
$("#fathername").keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });

 $("#personalinfoSection").validate({   
  rules: {
     firstname:{
          required: true,
          minlength: 5,
          maxlength:20,
      },
      lastname:{
          required:true,
           minlength: 5,
           maxlength:20
         },
     dateofbirth:{
           required:true
         },
      gender:{
        required:true,
        checked:true
       },
      maritalStatus:{
          required:true
      },
      nationality:{
        required:true
      }
    },
    messages:{
     firstname: {
           required: "Enter your first name!",
           minlength: "Enter at least (5) characters",
           maxlength:"First name too long more than (20) characters"       
        }, 
        lastname:{
          required: 'Enter your last name!',
          minlength: "Enter at least (5) characters",
          maxlength:"First name too long more than (20) characters" 
        },
        dateofbirth:{
            required:"Please enter your Date of birth."
        },
      gender:{
        required:"Please select your gender."
      },
      maritalStatus:{
        required:"Please select your maritalStatus."
      },
       nationality:{
        required:"Please select your nationality."
      }
   },
});

//PERSONALINFO API CALL//

    $("#profile-submit-btn").click(function(){
      $("#personalinfoSection").validate();
       var enteredFirstname= $(".firstnameValue").val();
       var enteredLastname = $(".lastnameValue").val();
       var enteredFathername = $(".fathernameValue").val();
       var enteredDateofbirth=$(".dateofbirthValue").val();
        //var enteredGender=$("#gender").val();
      // var enteredMaritalStatus=$("#maritalStatus").val();
      //var enteredNationality=$(".nationalityValue").val();
      var enteredGender="female";
       var enteredMaritalStatus="single";
      var enteredNationality="INDIAN";
      
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");


    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
      
      var postData ={"firstName":enteredFirstname,"lastName":enteredLastname,"fatherName":enteredFathername,
      "dob":enteredDateofbirth,"gender":enteredGender,"maritalStatus":enteredMaritalStatus,"nationality":enteredNationality};
      var postData = JSON.stringify(postData);
      console.log(postData);
      regUrl = baseUrl+"v1/user/"+userId+"";

        $.ajax({
            url: regUrl,
            type:"PATCH",
            data: postData,
            contentType:"application/json",
            dataType:"json",
            
            success: function(data,textStatus,xhr){
                     console.log(data);
                     $("#modal-profileSuccess").modal('show');
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                 },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken ); 
                 } 
           
               
           });
        });
    //ENDS personalinfo Scetion validations//

   
     

//MY PROFILE SECTION//

  $("#myprofile-submit-btn").click(function(){
       //var enteredEmployment= $(".employmentValue").val();
       //var enteredCompanyname = $(".companynameValue").val();
       //var enteredDesignation = $(".designationValue").val();
       //var enteredDescription=$(".descriptionValue").val();
      // var enteredNoOfJobsChanged=$(".NoOfJobsChangedvvalue").val();
      //var enteredworkExperience=$("#workExperience").val();
      // var enteredHighestQualifications=$(".highestQualificationsvalue").val();
      // var enteredofficeAddressId= $(".officeAddressIdValue").val();
      // var enteredofficeContactNumber = $(".officeContactNumbervalue").val();
       //var enteredfieldOfStudy = $(".fieldOfStudyValue").val();
      // var enteredCollege=$(".collegeValue").val();
      // var enteredyearOfPassing=$(".yearOfPassingValue").val();


      var enteredEmployment= "PUBLIC";
       var enteredCompanyname = "tcs";
       var enteredDesignation = "java";
       var enteredDescription="developer";
      var enteredNoOfJobsChanged="2";
      var enteredworkExperience="2";
       var enteredHighestQualifications="b.tech";
       var enteredofficeAddressId= "Hyderabad";
       var enteredofficeContactNumber = "8919856343";
       var enteredfieldOfStudy = "cse";
      var enteredCollege="jntu";
       var enteredyearOfPassing="2016";


    
    
var postData={"employment":enteredEmployment,"companyName":enteredCompanyname,"designation":enteredDesignation,"description":enteredDescription,
   "noOfJobsChanged":enteredNoOfJobsChanged,"workExperience":enteredworkExperience,"highestQualification":enteredHighestQualifications,
   "officeAddressId":enteredofficeAddressId,"officeContactNumber":enteredofficeContactNumber,"fieldOfStudy":enteredfieldOfStudy,
   "college":enteredCollege,"yearOfPassing":enteredyearOfPassing};
    postData=JSON.stringify(postData);
console.log(postData);
    regUrl=baseUrl+"v1/user/professional/22";

        $.ajax({
            url:regUrl,
            type:"PATCH",
            data:postData,
            contentType:"application/json",
            dataType:"json",
              
             success: function(data,textStatus,xhr){

                     console.log(data);
                     $("#modal-professionaldetailsSuccess").modal('show');
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                   },
                beforeSend: function(xhr) {

               xhr.setRequestHeader("accessToken","eyJ1c2VySWQiOiIyMiIsImlhdCI6MTU1ODAwNjEwMzQxMSwidHRsIjo3MjAwLCJ2ZXJzaW9uIjoidjEiLCJncmFudFR5cGUiOiJQV0QiLCJhbGdvcml0aG0iOiJSU0EifQ==.DvoMEvrJ3Wpr+Z59qH33U/5NkGQ4owO0dlDbcQo+sZFR4TbOFdjhoFBfHwiMudTX2ftAH+MnB0+8wYwkmfkqJcb2b3Lj3KLoL2Bc/9pDkNbvCbONJSarUvXwJ53UBF3CWru7AVkPXTS8CoCr7jBu2LUebtlXdiOLn9Vu+7Zyke4GBTzqS+60Ja/AAtd0BGgDSurxYqiL5lcjll8s0QGLC9Zk3csckMBu1VF1W2PZQHg8vd0IcV89ngwlLEQAglyINd9Kfp1wRqz1HWJMJyxu2LbQqWul9cShqcz2D+H5K/V3hKHILDwdaSMupQ9llVLCm+hHagqCLysJ0j7xKWDr3w==" ); 
                 } 

           
           });

});

// ENDS MY PROFILE SECTION//


// LOAN RESPONSES REQUESTS //

 $("#loan-submit-btn").click(function(){
      
     var enteredloanRequestAmount= $(".loanRequestAmount").val();
     var enteredrateOfInterest = $(".rateOfInterest").val();
     var enteredduration = $(".durationValue").val();
     var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
     var enteredloanPurpose=$(".loanPurpose").val();
     var enteredexpectedDate=$(".expectedDateValue").val();
     var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
     var woim = false;
     var isValid = true;
     alert(enteredrepaymentMethod);
     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     }else{
        $(".loanRequestAmountError").hide();
        isValid = true;
     }

     if(enteredrateOfInterest == ""){
        $(".rateOfInterestError").show();
        isValid = false;
     }else{
        $(".rateOfInterestError").hide();
        isValid = true;
     }

    if(enteredduration == ""){
        $(".durationError").show();
        isValid = false;
     }else{
        $(".durationError").hide();
        isValid = true;
     }

    if(enteredrepaymentMethod == ""){
        $(".repaymentMethodError").show();
        isValid = false;
     }else{
        $(".repaymentMethodError").hide();
        isValid = true;
     }

    var i = 0;
    for(var i=0; i < wayOfinterestMethod.length; i++){
        if(wayOfinterestMethod[i].checked == true){
            woim = true;    
        }
    }
    if(!woim){
         $(".repaymentMethodError").show();
         isValid = false;
    }else{
        $(".repaymentMethodError").hide();
        isValid = true;
    }


    if(enteredloanPurpose == ""){
        $(".loanPurposeError").show();
        isValid = false;
     }else{
        $(".loanPurposeError").hide();
        isValid = true;

     }

    if(enteredexpectedDate == ""){
        $(".expectedDateError").show();
        isValid = false;
     }else{
        $(".expectedDateError").hide();
        isValid = true;
     }

     return isValid;
    

     


      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
      
      var postData ={"loanRequestAmount":enteredloanRequestAmount,"rateOfInterest":enteredrateOfInterest,
      "duration":enteredduration,"repaymentMethod":enteredrepaymentMethod,"loanPurpose":enteredloanPurpose,
            "expectedDate":enteredexpectedDate};

      
      
      var postData = JSON.stringify(postData);

     

      alert (postData);

      console.log(postData);
      regUrl = baseUrl+"v1/user/"+userId+"/loan/"+primaryType+"/request";

        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType:"application/json",
            dataType:"json",
             
            success: function(data,textStatus,xhr){
                     console.log(data);
                     $("#modal-profileSuccess").modal('show');
                      
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                 },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken);
           
               }
           });
        });


// ENDS LOAN RESPONSES REQUESTS //

// ADDRESS DETAILS //

$("#address-submit-btn").click(function(){
    
       //var enteredType= $(".typeValue").val();
       //var enteredHousenumber = $(".housenumberValue").val();
       //var enteredStreet = $(".streetValue").val();
       //var enteredArea=$(".areaValue").val();
       //var enteredCity=$(".cityValue").val();
       //var enteredType= "PERMANENT";
       var enteredHousenumber ="425/2";
       var enteredStreet ="gandhi nagar"; 
       var enteredArea="gandhi nagar";
       var enteredCity="Hyderabad";
      

    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");


    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    addressType="PRESENT";
      var postData ={"type":addressType,"houseNumber":enteredHousenumber,"street":enteredStreet,"area":enteredArea,
                      "city":enteredCity};
      var postData = JSON.stringify(postData);
      console.log(postData);
      regUrl =baseUrl+"v1/user/"+userId+"/address/"+addressType+"";

        $.ajax({
            url: regUrl,
            type:"PATCH",
            data: postData,

            contentType:"application/json",
            dataType:"json",
             
            success: function(data,textStatus,xhr){
                     console.log(data);
                     $("#modal-addressSuccess").modal('show');
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                 },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken);
               }
           });
        });


// ONLOAD ENDS
});
// ONLOAD ENDS

 function writeCookie(name,value,days) {
   var date, expires;
   console.log(name);
   console.log(value);
   if (days) {
       date = new Date();
       date.setTime(date.getTime()+(days*24*60*60*1000));
       expires = "; expires=" + date.toGMTString();
           }else{
       expires = "";
   }
   document.cookie = name + "=" + value + expires + "; path=/";
}

//LOAD LENDER DASHBOARD DATA //
function loadDashboardData(){
    
    //checkCookie();

    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    //alert("sprimaryType "+suserId+sprimaryType+" ACCESSTOKEN "+" "+saccessToken);
    //alert(1);
    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
    //alert(getStatUrl);
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
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
      if(data.amountDisbursed == null){
          data.amountDisbursed = 0;
       }
       if(data.interestPaid == null){
          data.interestPaid = 0;
       }
       if(data.principalReceived == null){
          data.principalReceived = 0;
       }
       if(data.totalTransactionFee == null){
          data.totalTransactionFee = 0;
       }
       $(".amountDisbursed").html(data.amountDisbursed);
       },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", accessToken ); 
      } 
   });
}


// LOAD BORROWER DASHBOARD //
function loadborrowerDashboardData(){
    //checkCookie();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");


    userId = suserId;
    primaryType = sprimaryType;
    saccessToken = saccessToken;

    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
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
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}

// LOAD BORROWER LISTINGS //

function loadBorrowersListings(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "BORROWER";
    }else{
       var  fieldValueforSearch = "LENDER";
    }
    alert(fieldValueforSearch); 
  var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "Page":{"pageNo" : 1,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function loadlendersListings(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "BORROWER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
    }
    alert(fieldValueforSearch); 
  var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "Page":{"pageNo" : 1,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}




function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
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

function checkCookie(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("primaryType");
    saccessToken = getCookie("accessToken");
    return suserId, sprimaryType, saccessToken;
    if(document.cookie.indexOf('sUserId') > -1){
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
  $('.'+fromclass+' .file-upload-input').replaceWith($('.'+fromclass+' .file-upload-input').clone());
  $('.'+fromclass+' .file-upload-content').hide();
  $('.'+fromclass+' .image-upload-wrap').show();
}


$('.image-upload-wrap').bind('dragover', function () {
  $('.image-upload-wrap').addClass('image-dropping');
});

$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});


$(".uploadAllFilesAdded").click(function(){
   alert(1);
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