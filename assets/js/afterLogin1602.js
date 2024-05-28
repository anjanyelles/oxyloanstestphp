userisIn = "prod";
$(document).ready(function() {
  // baseUrl = "https://fintech.oxyloans.com/oxyloans/";
  
  if(userisIn == "local"){
    baseUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/"
  }else{
    baseUrl = "https://fintech.oxyloans.com/oxyloans/";
  }
  
  folderName = "FEOxyLoans";
  var userNameFromAPI;
  displayFromRange = 0;

  globalLoanId = 0;
  // alert(globalLoanId);
  lendercommValue = 0; 
  borrowercommValue = 0; 
  totalEntries = 0;
  requesterdBalanec = 0;
  loanMaxAmount = 50000;
  userRequiredAmount = 0;
  var date = new Date();
  date.setDate(date.getDate()-1);
  
  noprofileCheck = "yes";
  noROICheck = "yes";
 
  borrowerWants = 0;
  whatlenderhas = 0;
  proceedOffer = false;
  stopOffer = false;
  uploadCropped = false;
  eSignTransactionID = "";
  loanIDFromEsign = "";
  rateofInterestCheck = false;
  tokenforeNach = ""; 
  txnIdforeNACH = "";
  userEmailforGlobal = "";
  userpersonalinfo  = "";
  userbankDetailsInfo = "";
  userkycStatus = "";
  // Check Cookie
  getUserDetails();
  //getUserDetails();
  downloadProfilePic();
  // TO GET LOAN ID
  // loadresponserequest();
  

$("#profilePicFile").change(function(e){
  console.log(234);
  var img = e.target.files[0];
  if(!img.type.match('image.*')){
    alert("Whoops! That is not an image.");
    return;
  }
  iEdit.open(img, true, function(res){
   $("#result").attr("src", res);
  });
  //console.log(alert);
  readProfilePicture(res);
  
});

 $('[data-toggle="tooltip"]').tooltip();


  
  $("#profile-edit-btn").click(function(){
    $(".udisplaysec, #profile-edit-btn").hide();
    $("#profile-submit-btn, #firstname, #lastname, #fathername, #address,.date, #nationality, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber").show();
  });

  $("#myprofile-edit-btn").click(function(){
    $(".udisplaysec, #myprofile-edit-btn").hide();
    $("#myprofile-submit-btn, #employment, #companyname, #description, #designation, #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeAddressId,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").show();
  });

  $("#address1-edit-btn").click(function(){
    $(".udisplaysec1, #address1-edit-btn").hide();
   $('#address1-submit-btn, .permanent_housenumberValue, .permanent_areaValue, .permanent_streetValue, .permanent_cityValue').show();
  });

  $(".offersSentLender").click(function(){
      loadRequestsSent();
  });

  $(".lenderDisplayMyActiveLoans").click(function(){
      loadActiveLoans();
  });
  

  $(".requestsReceived").click(function(){
      loadAllRequests();
  });
  

  $("#address2-edit-btn").click(function(){

    $(".udisplaysec2, #address2-edit-btn").hide();
    $('#address2-submit-btn, .present_housenumberValue, .present_areaValue, .present_streetValue, .present_cityValue').show();

  });


  $("#address3-edit-btn").click(function(){
    $(".udisplaysec3, #address3-edit-btn").hide();
    $('#address3-submit-btn, .office_housenumberValue, .office_areaValue, .office_streetValue, .office_cityValue').show();

  });


  $("#financial-edit-btn").click(function(){
    $(".udisplaysec, #financial-edit-btn").hide();
   $("#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome, #avgmonthlyexpenses").show();
  });


  $("#bank-edit-btn").click(function(){
    $(".udisplaysec, #bank-edit-btn").hide();
    $("#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address").show();
  });
   

  $('#expectedDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        startDate: new Date(),
        autoclose: true
  }); 


  $('.lenderSendingOffer').click(function(){
    // How much borrower wants
    // How much lender's balance commitement
      $('.viewLoanOfferSection').hide();
      $('#showRequestSection').show();
  });

  $('.borrowerSendingrequest').click(function(){
    //alert(requesterdBalanec);
    /*
    if(requesterdBalanec <= 5000 ){
        $("#modal-displayBalanceError").modal("show");
        setTimeout(function(){
          window.location = "borrowerraisealoanrequest"
        }, 5000);
    }else{
      $('.viewLoanOfferSection').hide();
      $('#showRequestSection').show();
    }
    */

    $('.viewLoanOfferSection').hide();
    $('#showRequestSection').show();

  });
  


  $('#dateofbirth').datepicker({
    dateFormat: 'dd/mm/yy',
    maxDate: '-18Y',
    yearRange: '1950:2013', 
    changeMonth: true,
    changeYear: true,
  });
  

 $('#transactiondatepicker').datepicker({
    dateFormat: 'dd/mm/yy',    
    changeMonth: true,
    changeYear: true,
  });

  $(".userPicArea").mouseover(function(){
      $('.displayEditOption').show();  
  });

 

 $(".displayEditOption").click(function(){
    $('.displayCropSection').show();
    var userPicArea = $('.userPicArea').attr("src");    
    $(".getFromProfileSec").attr("src", userPicArea);
 });

$(".closePicArea").click(function(){
  $('.displayCropSection, .displayEditOption').hide(); 
});

$(".displayEditOption").click(function(){
  $('.displayCropSection').show();  
});
//https://fintech.oxyloans.com/oxyloans/v1/user/17/dashboard/lender?current=true/false
//$('#datetimepicker1').datetimepicker();

//

// FORGOT SECTION VALIDATIONS//

 $(".phonenumber, .mobilenumberValue, #monthlyEmi,#creditamount,#existingloanamount,#creditcardsrepaymentamount,#othersourcesincome,#netmonthlyincome,#avgmonthlyexpenses,#officeContactNumber").on('keypress', function(e) {
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


 $(".closeProfile").click(function(){
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;      

     if(sprimaryType == "LENDER"){
      window.location = "lender_profilePage";
    }else{
      window.location = "borrower_profilePage";
    }
 });
// showProfile
$(".showProfile").click(function(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;

    if(sprimaryType == "LENDER"){
      window.location = "lenderpersonalinfo";
    }else{
      window.location = "borrowerpersonalinfo";
    }

});






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


//PERSONALINFO API CALL//

      $("#profile-submit-btn").click(function(){
		  
		    suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var enteredFirstname= $(".firstnameValue").val();
         var enteredLastname = $(".lastnameValue").val();
         var enteredFathername = $(".fathernameValue").val();
         var enteredDateofbirth=$(".dateofbirthValue").val();
         var enteredGender=$('input[name=gendervalue]:checked').val();
         var enteredMaritalStatus=$('input[name=maritalStatus]:checked').val();
        var enteredNationality=$("#nationality").val();
         var enteredAddress=$(".addressValue").val();


         var middlename = $(".middlenameValue").val();  
         var companyname = $(".companynameValue").val();
         var salary = $(".salaryValue").val();
         var panNumber = $(".panNumberValue").val();
      
         var panRegex=/[A-Z]{5}\d{4}[A-Z]{1}/;

         enteredFirstname = enteredFirstname.trim();
         enteredLastname = enteredLastname.trim();
         enteredFathername = enteredFathername.trim();
    
        
     var genderMethod = document.getElementsByName("gendervalue");
     var maritalStatusMethod=document.getElementsByName("maritalStatus");
     var mios=false;
       var gom = false;
       var isValid = true;
      
       if(enteredFirstname == ""){
          $(".firstnameError").show();
          isValid = false;
       }else{
          $(".firstnameError").hide();
        
       }

       if(enteredLastname == ""){
          $(".lastnameError").show();
          isValid = false;
       }else{
          $(".lastnameError").hide();
          
       }

      if( enteredFathername== ""){
          $(".fathernameError").show();
          isValid = false;
       }else{
          $(".fathernameError").hide();
      
       }

      if(enteredGender == "gendervalue"){
          $(".genderError").show();
          isValid = false;
       }else{
          $(".genderError").hide();
          
       }

      var i = 0;
      for(var i=0; i < genderMethod .length; i++){
          if(genderMethod[i].checked == true){
              gom = true;    
          }
      }
      if(!gom){
           $(".genderError").show();
           isValid = false;
      }else{
          $(".genderError").hide();
          
      }


      if(enteredDateofbirth == ""){
          $(".dateofbirthError").show();
          isValid = false;
       }else{
          $(".dateofbirthError").hide();
      
       }
       
if(primaryType!='LENDER'){
       if(companyname == ""){
          $(".companynameError").show();
          isValid = false;
       }else{
          $(".companynameError").hide();
        
       }



       if(salary == ""){
          $(".salaryError").show();
          isValid = false;
       }else{
          $(".salaryError").hide();
        
       }
	  }

 if(!panRegex.test(panNumber)) {
        $(".panNumberError").html("Please enter valid Pan Number.");
        $(".panNumberError").show();
        isValid = false;
     } else{
        $(".panNumberError").hide();
     }


      /* if(panNumber == ""){
          $(".panNumberError").show();
          isValid = false;
       }else{
          $(".panNumberError").hide();
        
       }*/



 if(enteredAddress == ""){
          $(".addressError").show();
          isValid = false;
       }else{
          $(".addressError").hide();
        
       }
     /* if( enteredMaritalStatus== "maritalStatus"){
          $(".maritalStatusError").show();
          isValid = false;
       }else{
          $(".maritalStatusError").hide();
          
       }*/
 if( enteredNationality== ""){
          $(".nationalityError").show();
          isValid = false;
       }else{
          $(".nationalityError").hide();
          
       }



      var i = 0;
      for(var i=0; i <maritalStatusMethod  .length; i++){
          if(maritalStatusMethod[i].checked == true){
              mios = true;    
          }
      }
      if(!mios){
           $(".maritalStatusError").show();
           isValid = false;
      }else{
          $(".maritalStatusError").hide();
          
      }
   //return isValid; 
      


    
    
        


        var postData ={"firstName":enteredFirstname,
         "middleName":middlename,
        "lastName":enteredLastname,
        "fatherName":enteredFathername,
        "dob":enteredDateofbirth,
        "gender":enteredGender,
        "maritalStatus":enteredMaritalStatus,
        "address":enteredAddress,
        "nationality":enteredNationality,
        "companyName":companyname,
        "salary":salary,
        "panNumber":panNumber
      };
        var postData = JSON.stringify(postData);
        console.log(postData);
       
        regUrl = baseUrl+"v1/user/"+userId+"";
 console.log(regUrl);
 console.log(primaryType);
if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
                   $("#modal-profileSuccess").modal('show');
                    setTimeout(function(){ 
                    if(primaryType == "LENDER")  {
                      window.location = "lenderuserkyc";                                 
                    }else{
                       window.location = "borroweruserkyc";                                  
                    }

                    }, 5000);                   
               },
               error: function(xhr,textStatus,errorThrown){
                  // $("#modal-profile-error").modal('show');
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
        return isValid;
          });
      //ENDS personalinfo Scetion validations//
   
     

//professional SECTION//


$("#companyname,#designation,#description,#highestQualification,#fieldOfStudy,#college").keypress(function (e) {
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


$("#yearOfPassing").on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
if ($this.val().length > 3) {
    e.preventDefault();
    return false;
  }
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;

  });

  
  $("#myprofile-submit-btn").click(function(){
       var enteredEmployment= $(".employmentValue").val();
       var enteredCompanyname = $(".companynameValue").val();
       var enteredDesignation = $(".designationValue").val();
       var enteredDescription=$(".descriptionValue").val();
       var enteredNoOfJobsChanged=$(".NoOfJobsChangedvvalue").val();
       var enteredworkExperience=$("#workExperience").val();
       var enteredHighestQualifications=$(".highestQualificationsvalue").val();
       //var enteredofficeAddressId= $(".officeAddressIdValue").val();
       var enteredofficeContactNumber = $(".officeContactNumbervalue").val();
       var enteredfieldOfStudy = $(".fieldOfStudyValue").val();
       var enteredCollege=$(".collegeValue").val();
       var enteredyearOfPassing=$(".yearOfPassingValue").val();

         enteredCompanyname = enteredCompanyname.trim();
         enteredDesignation = enteredDesignation.trim();
         enteredDescription = enteredDescription.trim();
         enteredfieldOfStudy = enteredfieldOfStudy.trim();
         enteredCollege = enteredCollege.trim();

    var isValid = true;
    if(enteredEmployment == ""){
        $(".employmentError").show();
        isValid = false;
     }else{
        $(".employmentError").hide();
    
     }

     if(enteredCompanyname == ""){
        $(".companynameError").show();
        isValid = false;
     }else{
        $(".companynameError").hide();
    
     }

    if( enteredDesignation== ""){
        $(".designationError").show();
        isValid = false;
     }else{
        $(".designationError").hide();
        
     }

    if(enteredDescription == ""){
        $(".descriptionError").show();
        isValid = false;
     }else{
        $(".descriptionError").hide();
      
     }
    if( enteredNoOfJobsChanged== ""){
        $(".NoOfJobsChangedError").show();
        isValid = false;
     }else{
        $(".NoOfJobsChangedError").hide();
        
     }

     if(enteredworkExperience ==  ""){
        $(".workexperienceError").show();
          isValid = false;
     }else{
        $(".workexperienceError").hide();
    
     }

  if( enteredHighestQualifications== ""){
        $(".highestqualificationError").show();
        isValid = false;
     }else{
        $(".highestqualificationError").hide();
     }


if( enteredofficeContactNumber== ""){
        $(".officeContactNumberError").show();
        isValid = false;
     }else if(enteredofficeContactNumber.length!=10){
       $(".officeContactNumberError").html("Please enter valid mobile number");
          $(".officeContactNumberError").show();
        isValid = false;
     }
     else{
        $(".officeContactNumberError").hide();
     }
if(enteredfieldOfStudy == ""){
        $(".fieldOfStudyError").show();
        isValid = false;
     }else{
        $(".fieldOfStudyError").hide();
     }

if(enteredCollege == ""){
        $(".collegeError").show();
        isValid = false;
     }else{
        $(".collegeError").hide();
     }

if( enteredyearOfPassing== ""){
        $(".yearOfPassingError").show();
        isValid = false;
     }else{
        $(".yearOfPassingError").hide();
     }


    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    
var postData={"employment":enteredEmployment,"companyName":enteredCompanyname,"designation":enteredDesignation,"description":enteredDescription,
   "noOfJobsChanged":enteredNoOfJobsChanged,"workExperience":enteredworkExperience,"highestQualification":enteredHighestQualifications,
  "officeContactNumber":enteredofficeContactNumber,"fieldOfStudy":enteredfieldOfStudy,
   "college":enteredCollege,"yearOfPassing":enteredyearOfPassing};
    postData=JSON.stringify(postData);
    console.log(postData);
   
    regUrl=baseUrl+"v1/user/professional/"+userId+"";
if(isValid == true){
        $.ajax({
            url:regUrl,
            type:"PATCH",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            async: false,
             success: function(data,textStatus,xhr){

                     console.log(data);
                     $("#modal-professionaldetailsSuccess").modal('show');
                       setTimeout(function(){ 
                    if(primaryType == "LENDER")  {
                      window.location = "lenderaddress";                                 
                    }else{
                       window.location = "borroweraddress";                                  
                    }

                    }, 5000);         
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                   },
                beforeSend: function(xhr) {

               xhr.setRequestHeader("accessToken",saccessToken ); 
                 } 

           
           });
      }
        return isValid;

});

// ENDS MY PROFILE SECTION//


// RAISE A LOAN REQUEST //

$(".loanRequestAmount").on('keypress', function(e) {
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



 $("#loan-submit-btn").click(function(){
     var enteredloanRequestAmount= $(".loanRequestAmount").val();
     var enteredrateOfInterest = $("#rateOfInterest").val();
     var enteredduration = $("#duration").val();
     var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
     var enteredloanPurpose=$(".loanPurpose").val();
     var enteredexpectedDate=$(".expectedDateValue").val();
     var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
     var woim = false;
     var isValid = true;
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;


    enteredloanPurpose = enteredloanPurpose.trim();

     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount < 5000){
        $(".loanRequestAmountError").html("Please enter a value greater than or equal to 5000.");
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount > 5000000){
      if(primaryType =="LENDER"){
        $(".loanRequestAmountError").html("As per RBI guidelines lender can lend only 50 Lakhs only.");
        $(".loanRequestAmountError").show();
        isValid = false; 
    } if(primaryType =="BORROWER"){
        $(".loanRequestAmountError").html("As per RBI guidelines borrower can borrow only 50 Lakhs only.");
        $(".loanRequestAmountError").show();
         isValid = false; 
         } 
     }else{
        $(".loanRequestAmountError").hide();
         
     }
     console.log(enteredrateOfInterest);
     if(enteredrateOfInterest == ""){
        $(".rateOfInterestError").show();
        isValid = false;
     }else{
        $(".rateOfInterestError").hide();
      
     }

    if(enteredduration == ""){
        $(".durationError").show();
        isValid = false;
     }else{
        $(".durationError").hide();
    
     }

    if(enteredrepaymentMethod == ""){
        $(".repaymentMethodError").show();
        isValid = false;
     }else{
        $(".repaymentMethodError").hide();
      
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
    
    }


    if(enteredloanPurpose == ""){
        $(".loanPurposeError").show();
        isValid = false;
     }else{
        $(".loanPurposeError").hide();
      

     }

    if(enteredexpectedDate == ""){
        $(".expectedDateError").show();
        isValid = false;
     }else{
        $(".expectedDateError").hide();
      
     }
  //$(".loadingSec").show();
    // return isValid/
    // alert(rateofInterestCheck);
      if(rateofInterestCheck == true){
        enteredloanRequestAmount = 0;
      }
      var postData ={"loanRequestAmount":enteredloanRequestAmount,"rateOfInterest":enteredrateOfInterest,
      "duration":enteredduration,"repaymentMethod":enteredrepaymentMethod,"loanPurpose":enteredloanPurpose,
            "expectedDate":enteredexpectedDate};
       var postData = JSON.stringify(postData);
       console.log(postData);
      
      regUrl = baseUrl+"v1/user/"+userId+"/loan/"+primaryType+"/request";
      console.log(postData);

if(isValid == true){
        $.ajax({
            url: regUrl,
            type:"PATCH",
            data: postData,
            contentType:"application/json",
            dataType:"json",
              success: function(data,textStatus,xhr){
                     console.log(data);
                     $("#modal-raisealoan").modal('show');
                      // $(".loadingSec").hide();
                    setTimeout(function(){ 
                     $(".loadingSec").hide();
                     if(primaryType =="LENDER"){
                        window.location="lenderloanlistings"
                      }else{
                        window.location="loanlistings"
                      }
                  }, 15000);
                },
              error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                },

              beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken);
           
               }
           });
      }
      return isValid;
        });


// ENDS  RAISE A LOAN REQUEST //

// CREATE A LOAN REQUEST //
$(".loanPurpose").keypress(function (e) {
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

$(".yesIncreaseCommitment").click(function(){
    proceedOffer = true;
    $("#createloan-submit-btn").trigger("click");
    $("#suggetionToLender").modal("hide");
});
$(".noLetmeChangeOffer").click(function(){
    stopOffer = true;
    //$("#createloan-submit-btn").trigger("click");
    $("#suggetionToLender").modal("hide");
});
$("#createloan-submit-btn").click(function(){
     var enteredloanRequestAmount= $(".loanRequestAmount").val();
     var enteredrateOfInterest = $(".rateOfInterest").val();
     var enteredduration = $(".durationValue").val();
     var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
     var enteredloanPurpose=$("#loanPurpose").val();
     var enteredexpectedDate=$(".expectedDateValue").val();
     var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
     var woim = false;
     var isValid = true;

      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;



      enteredloanPurpose = enteredloanPurpose.trim();
    
     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount < 5000){
        $(".loanRequestAmountError").html("Please enter a value greater than or equal to 5000.");
        $(".loanRequestAmountError").show();
        isValid = false;
    } else if ( enteredloanRequestAmount > 50000){
      if(primaryType == "LENDER"){
        $(".loanRequestAmountError").html("As per RBI guidelines you can offer only 50000 to one borrower.");
        $(".loanRequestAmountError").show();
        isValid = false;
      }
      if(primaryType == "BORROWER"){
        $(".loanRequestAmountError").html("As per RBI guidelines you can Request only 50000 to one lender.");
        $(".loanRequestAmountError").show();
         isValid = false;
      }
    } else{
        $(".loanRequestAmountError").hide();
    
     }

     if(enteredrateOfInterest == ""){
        $(".rateOfInterestError").show();
        isValid = false;
     }else{
        $(".rateOfInterestError").hide();
      
     }

    if(enteredduration == ""){
        $(".durationError").show();
        isValid = false;
     }else{
        $(".durationError").hide();
    
     }

    if(enteredrepaymentMethod == ""){
        $(".repaymentMethodError").show();
        isValid = false;
     }else{
        $(".repaymentMethodError").hide();

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
        
    }


    if(enteredloanPurpose == ""){
        $(".loanPurposeError").show();
        isValid = false;
     }else{
        $(".loanPurposeError").hide();
     }

    if(enteredexpectedDate == ""){
        $(".expectedDateError").show();
        isValid = false;
     }else{
        $(".expectedDateError").hide();
     }

    // return isValid;


      
      //alert(requesterdBalanec);
      $('.whatlenderHas').html(whatlenderhas);
      $('.whatlenderisOffering').html(enteredloanRequestAmount);
    if(sprimaryType == "LENDER-----"){ 
      //alert(whatlenderhas);
      //alert(borrowerWants);
      //alert(proceedOffer);
      //alert(stopOffer);
      //alert(enteredloanRequestAmount + "   " + whatlenderhas);
      //alert(whatlenderhas);
      //alert("proceedOffer is "+ proceedOffer);
      //alert(whatlenderhas + " "+ enteredloanRequestAmount)
      if(whatlenderhas < enteredloanRequestAmount){
        //alert(33);
        $("#suggetionToLender").modal("show");
      }else{
        //alert(2);
        proceedOffer = true;
      }

      if(proceedOffer == false){
        isValid = false;
      }

      if(stopOffer == true){
        isValid = false; 
      }
    }  
      // $(".loadingSec").show();  
      var getloanId = $('.requestidFromClick').html(); 
      
      var postData ={"loanRequestAmount":enteredloanRequestAmount,"rateOfInterest":enteredrateOfInterest,
      "duration":enteredduration,"repaymentMethod":enteredrepaymentMethod,"loanPurpose":enteredloanPurpose,
            "expectedDate":enteredexpectedDate,"parentRequestId":getloanId};
       var postData = JSON.stringify(postData);
       console.log(postData);
      
      regUrl = baseUrl+"v1/user/"+userId+"/loan/"+primaryType+"/request";

      if(isValid == true){
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType:"application/json",
            dataType:"json",
              success: function(data,textStatus,xhr){
                     console.log(data);
                  $("#modal-raisealoan").modal('show');

                  setTimeout(function(){ 
                     $(".loadingSec").hide();
                         // var sprimaryType = data.primaryType;
                         if(sprimaryType == "LENDER"){
                          window.location = "investor";
                         }else {
                          window.location = "borrowerDashboard";
                         }
                      }, 15000);
                },
                statusCode : {
                    400: function (jqXHR, textStatus, errorThrown) {
                      console.log(jqXHR.responseJSON.errorMessage);
                        var errorMessage =   jqXHR.responseJSON.errorMessage;
                        if(errorMessage == "Can not trasact more than 50K"){
                          var placeerrorHTMLCode = "As per RBI guiderlines, You can only give 50k to one borrower. You can give again after he close the loan.";  
                        }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
                          var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
                        }else if(errorMessage == "Already one loan in conversation, make sure that conversation is closed"){
                          var placeerrorHTMLCode = "Already one loan in conversation, make sure that conversation is closed.";  
                        }else if (errorMessage == "Already one loan in conversation. Plesae check your responses."){
                           if(sprimaryType == "LENDER"){
                            var placeerrorHTMLCode = "Already one loan in conversation. Please check your responses/offers sent.";  
                           }else{
                            var placeerrorHTMLCode = "Already one loan in conversation. Please check your responses/requests sent.";  
                           }
           
                       } else {
                          var placeerrorHTMLCode = errorMessage;
                        }

                        

                        $("#modal-ReqAlreadySent .modal-body p").html(placeerrorHTMLCode);
                        $("#modal-ReqAlreadySent").modal("show")                    
                    }
                 },
              error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                },
              beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken);
           
               }
           });
          }return isValid;
      });


// ENDS CREATE A LOAN REQUEST//


// ADDRESS DETAILS //
$("#permanent_area,#present_area,#office_area,#permanent_city,#present_city,#office_city").keypress(function (e) {
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


$("#address1-submit-btn").click(function(){
   //PERMANENT CALL//
   var enteredpermanent_Type= "PERMANENT";
   var enteredpermanent_Housenumber = $(".permanent_housenumberValue").val();
   var enteredpermanent_Street = $(".permanent_streetValue").val();
   var enteredpermanent_Area=$(".permanent_areaValue").val();
   var enteredpermanent_City=$(".permanent_cityValue").val();
     
     var isValid = true;

     enteredpermanent_Housenumber = enteredpermanent_Housenumber.trim();
     enteredpermanent_Street = enteredpermanent_Street.trim();
     enteredpermanent_Area = enteredpermanent_Area.trim();
     enteredpermanent_City = enteredpermanent_City.trim();

     if(enteredpermanent_Housenumber == ""){
        $(".permanent_housenumberError").show();
        isValid = false;
     }else{
        $(".permanent_housenumberError").hide();
        
     }

    if(enteredpermanent_Street == ""){
        $(".permanent_streetError").show();
        isValid = false;
     }else{
        $(".permanent_streetError").hide();
       
     }

    if( enteredpermanent_Area== ""){
        $(".permanent_areaError").show();
        isValid = false;
     }else{
        $(".permanent_areaError").hide();
        
     }
    if(enteredpermanent_City == ""){
        $(".permanent_cityError").show();
        isValid = false;
     }else{
        $(".permanent_cityError").hide();
     
     } 

  suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;

 var postData ={"type":enteredpermanent_Type, "userId": userId, "houseNumber":enteredpermanent_Housenumber,"street":enteredpermanent_Street,"area":enteredpermanent_Area,
                      "city":enteredpermanent_City};
      var postData = JSON.stringify(postData);
console.log(postData);

      
       regUrl =baseUrl+"v1/user/"+userId+"/address/PERMANENT";
     
      if(isValid == true){
         $.ajax({        
          url: regUrl,
            type:"PATCH",
            data: postData,
            contentType:"application/json",
            dataType:"json",
             
            success: function(data,textStatus,xhr){
                     console.log(data);
                   
                   $("#modal-address1Success").modal('show');
                   setTimeout(function(){ 
                        $('.modal-success, .modal-backdrop').removeClass("in");
                        //$(".modal").hide();
                        
              }, 2000); 
              $("html, body").animate({ scrollTop: 0 }, "slow");             
                  },
                   error: function(xhr,textStatus,errorThrown){
                        $("#modal-address-error").modal('show');
                        
                   },
                  beforeSend: function(xhr) {
                      xhr.setRequestHeader("accessToken",saccessToken);
                 }
             });
       }
       return isValid;
         });


     // Present address //
$("#address2-submit-btn").click(function(){
   var enteredpresent_Type="PRESENT";
   var enteredpresent_Housenumber = $(".present_housenumberValue").val();
   var enteredpresent_Street = $(".present_streetValue").val();
   var enteredpresent_Area=$(".present_areaValue").val();
   var enteredpresent_City=$(".present_cityValue").val();
    
     enteredpresent_Housenumber = enteredpresent_Housenumber.trim();
     enteredpresent_Street = enteredpresent_Street.trim();
     enteredpresent_Area = enteredpresent_Area.trim();
     enteredpresent_City = enteredpresent_City.trim();
     
     var isValid = true;
  

     if(enteredpresent_Housenumber == ""){
        $(".present_housenumberError").show();
        isValid = false;
     }else{
        $(".present_housenumberError").hide();
      
     }

    if(enteredpresent_Street == ""){
        $(".present_streetError").show();
        isValid = false;
     }else{
        $(".present_streetError").hide();
     
     }

    if( enteredpresent_Area== ""){
        $(".present_areaError").show();
        isValid = false;
     }else{
        $(".present_areaError").hide();
      
     }
    if(enteredpresent_City == ""){
        $(".present_cityError").show();
        isValid = false;
     }else{
        $(".present_cityError").hide();
       
     }  
     
  var postData1 ={"type":enteredpresent_Type, "userId": userId,"houseNumber":enteredpresent_Housenumber,"street":enteredpresent_Street,"area":enteredpresent_Area,
                      "city":enteredpresent_City};
      var postData1 = JSON.stringify(postData1);
 
       console.log(postData1);
 if(isValid == true){
  regUrl =baseUrl+"v1/user/"+userId+"/address/PRESENT";
                          // PRESENT API CALL
                           $.ajax({        
                            url: regUrl,
                              type:"PATCH",
                              data: postData1,
                              contentType:"application/json",
                              dataType:"json",
                               
              success: function(data,textStatus,xhr){
                       console.log(data);
                        $("#modal-address2Success").modal('show');
                         setTimeout(function(){ 
                        $('.modal-success, .modal-backdrop').removeClass("in");
                        
              }, 2000);
                $("html, body").animate({ scrollTop: 0 }, "slow");
               },
           error: function(xhr,textStatus,errorThrown){
              $("#modal-address-error").modal('show');
           },
          beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
         }
     });
}
return isValid;
});

//office 
$("#address3-submit-btn").click(function(){
//Office Call//
   var enteredoffice_Type= "OFFICE";
   var enteredoffice_Housenumber = $(".office_housenumberValue").val();
   var enteredoffice_Street = $(".office_streetValue").val();
   var enteredoffice_Area=$(".office_areaValue").val();
   var enteredoffice_City=$(".office_cityValue").val();
    
     enteredoffice_Housenumber  = enteredoffice_Housenumber .trim();
     enteredoffice_Street = enteredoffice_Street.trim();
     enteredoffice_Area = enteredoffice_Area.trim();
     enteredoffice_City = enteredoffice_City.trim();

     
    var isValid = true;
    

     if(enteredoffice_Housenumber == ""){
        $(".office_housenumberError").show();
        isValid = false;
     }else{
        $(".office_housenumberError").hide();
      
     }
    if(enteredoffice_Street == ""){
        $(".office_streetError").show();
        isValid = false;
     }else{
        $(".office_streetError").hide();
       
     }

    if( enteredoffice_Area== ""){
        $(".office_areaError").show();
        isValid = false;
     }else{
        $(".office_areaError").hide();
        
     }
    if(enteredoffice_City == ""){
        $(".office_cityError").show();
        isValid = false;
     }else{
        $(".office_cityError").hide();
        
     } 
     //alert(isValid);
    
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
  
var postData2 ={"type":enteredoffice_Type, "userId": userId,"houseNumber":enteredoffice_Housenumber,"street":enteredoffice_Street,"area":enteredoffice_Area,
              "city":enteredoffice_City};
var postData2 = JSON.stringify(postData2);
        console.log(postData2);
   
                if(isValid == true){   
                             regUrl =baseUrl+"v1/user/"+userId+"/address/OFFICE";
                           $.ajax({        
                            url: regUrl,
                              type:"PATCH",
                              data: postData2,
                              contentType:"application/json",
                              dataType:"json",
                               
                              success: function(data,textStatus,xhr){
                                       console.log(data);
                                       $("#modal-address3Success").modal('show');
                                        setTimeout(function(){ 
                       $('.modal-success, .modal-backdrop').removeClass("in");
                  
                    if(primaryType == "LENDER")  {
                      window.location = "lenderfinancialinfo";                                 
                    }else{
                       window.location = "borrowerfinancialinfo";                                  
                    }
                }, 4000);
                      $("html, body").animate({ scrollTop: 0 }, "slow");
                                   },
                                   error: function(xhr,textStatus,errorThrown){
                                      $("#modal-address-error").modal('show');
                                   },
                                  beforeSend: function(xhr) {
                                      xhr.setRequestHeader("accessToken",saccessToken);
                                 }
                             });
                      
                  
          
                         }
                         return isValid;
                      });


$(".sameasAbove").click(function(){
   var h = $('#permanent_housenumber').val();
   var s = $('#permanent_street').val();
   var a = $('#permanent_area').val();
   var c = $('#permanent_city').val();

   $('.present_housenumberValue').val(h);
   $('.present_streetValue').val(s);
   $('.present_areaValue').val(a);
   $('.present_cityValue').val(c);
});

$("#sameAsId").click(function(){
   var h = $('#residenceAddress').val();
   $('#permanentAddress').val(h);
  
});


$(".viewmorestats").click(function(){
  $(".moreStatsDisplay").show("slow");
  $(".hideStats").show();
  $(".viewmorestats").hide();
});

$(".hideStats").click(function(){
  $(".viewmorestats").show();
  $(".hideStats, .moreStatsDisplay").hide("slow");
});

//UPLOAD FUNCTION//
$(".uploadKYC").click(function(){
 var formData = new FormData($(this)[0]);
  //alert(formData);

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  
 if(userisIn == "local"){
     var formUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/kyc";
}else{
// https://fintech.oxyloans.com/oxyloans/
  var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";

}

  $.ajax({
        type:'POST',
        url: formUrl,
        data:formData,
        contentType: "multipart/form-data",
      
      xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',progress, false);
                }
                return myXhr;
        },
      
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log(data);
            //alert('data returned successfully');
        },

        error: function(data){
            console.log(data);
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken", saccessToken); 
        },
    });
});  
// ENDS UPLOAD function //

 $(".sendOfferToBorrower").click(function(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

  if(userisIn == "local"){
        sendofferURL = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request";
  }else{
  // https://fintech.oxyloans.com/oxyloans/
      sendofferURL = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request";
  }    
    //alert(sendofferURL);
 });

 $("#loanRequestAmount, #rateOfInterest, #duration").change(function(){   

    console.log('in');
    var loanValue = $("#loanRequestAmount").val();
    var cTenurevalue = $("#duration").val();
    var cRoiValue = $("#rateOfInterest").val();
    var tenureinYears = cTenurevalue*1/12;
    console.log("tenureinYears "+ tenureinYears);
    var calcEarnings = loanValue*cRoiValue*tenureinYears/100;
    console.log(calcEarnings);

    var totalloanvalue = parseInt(loanValue) +calcEarnings;
    console.log("totalloanvalue "+totalloanvalue);
    var emivalue = totalloanvalue / cTenurevalue;
    console.log(emivalue);

    var payonlyint = calcEarnings / cTenurevalue;


    $(".displayEMIvalue").show();
    $(".payonlyint").html(payonlyint);
    $(".emiValueIs").html(Math.round(emivalue));
    $("#emiValueIs").html(Math.round(emivalue));

    // do your code here
    // When your element is already rendered
});


 $("#newloanRequestAmount, #rateOfInterest, #duration").change(function(){   

    console.log('in');
    var loanValue = $("#newloanRequestAmount").val();
    var cTenurevalue = $("#duration").val();
    var cRoiValue = $("#rateOfInterest").val();
    var tenureinYears = cTenurevalue*1/12;
    console.log("tenureinYears "+ tenureinYears);
    var calcEarnings = loanValue*cRoiValue*tenureinYears/100;
    console.log(calcEarnings);

    var totalloanvalue = parseInt(loanValue) +calcEarnings;
    console.log("totalloanvalue "+totalloanvalue);
    var emivalue = totalloanvalue / cTenurevalue;
    console.log(emivalue);

    var payonlyint = calcEarnings / cTenurevalue;


    $(".displayEMIvalue").show();
    $(".payonlyint").html(payonlyint);
    $("#emiValueIs").html(Math.round(emivalue));

    // do your code here
    // When your element is already rendered
});

// FINANCIAL INFO STARTS //

 $("#financial-submit-btn").click(function(){
       var enteredMonthlyemi= $(".monthlyEmiValue").val();
       var enteredCreditamount = $(".creditamountValue").val();
       var enteredExistingloanamount=$(".existingloanamountValue").val();
       var enteredCreditcardsrepaymentamount=$(".creditcardsrepaymentamountValue").val();
       var enteredOthersourcesincome= $(".othersourcesincomeValue").val();
       var enteredNetmonthlyincome = $(".netmonthlyincomeValue").val();
       var enteredavgMonthlyExpenses = $(".avgmonthlyexpensesValue").val();
      
    

var isValid = true;
    if(enteredMonthlyemi == ""){
        $(".monthlyEmiError").show();
        isValid = false;
     }else{
        $(".monthlyEmiError").hide();
     
     }

     if(enteredCreditamount == ""){
        $(".creditamountError").show();
        isValid = false;
     }else{
        $(".creditamountError").hide();
       
     }

    if( enteredExistingloanamount== ""){
        $(".existingloanamountError").show();
        isValid = false;
     }else{
        $(".existingloanamountError").hide();
    
     }

    if(enteredCreditcardsrepaymentamount == ""){
        $(".creditcardsrepaymentamountError").show();
        isValid = false;
     }else{
        $(".creditcardsrepaymentamountError").hide();
      
     }
    if( enteredOthersourcesincome== ""){
        $(".othersourcesincomeError").show();
        isValid = false;
     } else{

        $(".othersourcesincomeError").hide();
       
     }

  if( enteredNetmonthlyincome== ""){
        $(".netmonthlyincomeError").show();
         isValid = false;
     }else if(enteredNetmonthlyincome < 5000){
       $(".netmonthlyincomeError1").show();
        isValid = false;
     }
     else{
        $(".netmonthlyincomeError").hide();
       $(".netmonthlyincomeError1").hide();
     }
if(enteredavgMonthlyExpenses == ""){
        $(".avgmonthlyexpensesError").show();
        isValid = false;
     }else{
        $(".avgmonthlyexpensesError").hide();
      
     }


    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    
var postData={"monthlyEmi":enteredMonthlyemi,"creditAmount":enteredCreditamount,"existingLoanAmount":enteredExistingloanamount,
"creditCardsRepaymentAmount":enteredCreditcardsrepaymentamount,"otherSourcesIncome":enteredOthersourcesincome,
"netMonthlyIncome":enteredNetmonthlyincome,"avgMonthlyExpenses":enteredavgMonthlyExpenses};
    postData=JSON.stringify(postData);
    console.log(postData);
    regUrl=baseUrl+"v1/user/financialDetails/"+id+"";
if(isValid == true){
        $.ajax({
            url:regUrl,
            type:"PATCH",
            data:postData,
            contentType:"application/json",
            dataType:"json",
              
             success: function(data,textStatus,xhr){

                     console.log(data);
                     $("#modal-FinancialSuccess").modal('show');
                     setTimeout(function(){ 
                    if(primaryType == "LENDER")  {
                      window.location = "lenderbankdetails";                                 
                    }else{
                       window.location = "borrowerbankdetails";                                  
                    }

                    }, 5000);
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                   },
                beforeSend: function(xhr) {

               xhr.setRequestHeader("accessToken",saccessToken ); 
                 } 

           
           });
}
return isValid;
});

// FINANCIAL INFO ENDS //

// BANK DETAILS  //

$("#bankname,#branchname,#accounttype").keypress(function (e) {
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

$("#bank-submit-btn").click(function(){
       var enteredAccountnumber= $(".accountnumberValue").val();
       var enteredBankname = $(".banknameValue").val();
       var enteredBranchname=$(".branchnameValue").val();
       var enteredAccounttype=$(".accounttypeValue").val();
       var enteredIfsccode= $(".ifsccodeValue").val();
       var enteredAddress = $(".addressValue").val();
       
        var ifscRegex = /^[A-Z]{4}\d{7}$/i;

         enteredBankname = enteredBankname.trim();
         enteredBranchname = enteredBranchname.trim();
         enteredAccounttype = enteredAccounttype.trim();
         enteredIfsccode = enteredIfsccode.trim();
         enteredAddress = enteredAddress.trim();
        
    

var isValid = true;
    if(enteredAccountnumber == ""){
        $(".accountnumberError").show();
        isValid = false;
     }else{
        $(".accountnumberError").hide();
     }

     if(enteredBankname == ""){
        $(".banknameError").show();
        isValid = false;
     }else{
        $(".banknameError").hide();
     }

    if( enteredBranchname== ""){
        $(".branchnameError").show();
        isValid = false;
     }else{
        $(".branchnameError").hide();
     }

    if(enteredAccounttype == ""){
        $(".accounttypeError").show();
        isValid = false;
     }else{
        $(".accounttypeError").hide();
     }
   if(!ifscRegex.test(enteredIfsccode)) {
        $(".ifsccodeError").html("Please enter valid IFSC code.");
        $(".ifsccodeError").show();
        isValid = false;
     } else{
        $(".ifsccodeError").hide();
     }

  if( enteredAddress== ""){
        $(".addressError").show();
        isValid = false;
     }else{
        $(".addressError").hide();
     }

    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    
var postData={
  "accountNumber":enteredAccountnumber,
  "bankName":enteredBankname,
  "branchName":enteredBranchname,
  "accountType":enteredAccounttype,
  "ifscCode":enteredIfsccode,
  "address":enteredAddress
};
    postData=JSON.stringify(postData);
    console.log(postData);
    regUrl=baseUrl+"v1/user/bankdetails/"+id+"";
    if(isValid == true){
        $.ajax({
            url:regUrl,
            type:"PATCH",
            data:postData,
            contentType:"application/json",
            dataType:"json",
              
             success: function(data,textStatus,xhr){

                     console.log(data);
                     $("#modal-bankSuccess").modal('show');
                     setTimeout(function(){ 
                    if(primaryType == "LENDER")  {
                      window.location = "investor";                                 
                    }else{
                       window.location = "borrowerDashboard";                                  
                    }

                    }, 5000);
                 },
                 error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                   },
                beforeSend: function(xhr) {

               xhr.setRequestHeader("accessToken",saccessToken ); 
                 } 

           
           });
      }
      return isValid;
});
  


$(".deleteSession").click(function(){
    signout();
});



$('#type').on('change', function() {
    if($('#type').val() == 'amount') {
         $(".amount").show();
          $('.roi, .borrowerIDBlock').hide(); 
    } else if($('#type').val() == 'roi'){
        $('.amount, .borrowerIDBlock').hide();
        $(".roi").show();
    } else if($('#type').val() == 'borrowerID'){
        $('.amount, .roi').hide();
        $(".borrowerIDBlock").show();
    }else if($('#type').val() == 'searchWithID'){
        $('.amount, .roi').hide();
        $(".searchWithID").show();
    } else {
        $('.amount, .borrowerIDBlock,.roi').hide(); 
    } 
});


// ONLOAD ENDS
});
// ONLOAD ENDS

function progress(e){

    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;

        var Percentage = (current * 100)/max;
        console.log(Percentage);


        if(Percentage >= 100)
        {
           // process completed  
        }
    }  
 }

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


function deleteSession(){
 
}

//LOAD LENDER DASHBOARD DATA //
function loadDashboardData(){
    $(".loadingSec").show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    //alert("sprimaryType "+suserId+sprimaryType+" ACCESSTOKEN "+" "+saccessToken);
   if(userisIn == "local"){
     //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
  }else{
    // https://fintech.oxyloans.com/oxyloans/
    var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
  }

  //  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
    //alert(23);
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
       
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
         if(data.oxyScore == null){
            data.oxyScore = 0;
         }
         $(".amountDisbursed").html(data.amountDisbursed-data.closedLoansAmount);
         $(".commitmentAmount").html(data.commitmentAmount);
         lendercommValue = data.commitmentAmount;
         $(".availableForInvestment").html(data.inProcessAmount);
         $(".interestPaid").html(data.interestPaid);
         $(".noOfActiveLoans").html(data.noOfActiveLoans);
         $(".noOfClosedLoans").html(data.noOfClosedLoans);
         $(".closedLoansValue").html(data.closedLoansAmount);
         $(".noOfDisbursedLoans").html(data.noOfDisbursedLoans);
         $(".noOfFailedEmis").html(data.noOfFailedEmis);
         $(".noOfLoanRequests").html(data.noOfLoanRequests);
         $(".outstandingAmount").html(data.outstandingAmount);
         $(".principalReceived").html(data.principalReceived);
         $(".totalTransactionFee").html(data.totalTransactionFee);
         $(".oxyscore").html(data.oxyScore);
         $(".data-lender-commitement").html(data.outstandingAmount);
         $(".noOfLoanResponses").html(data.noOfLoanResponses);
         $(".noOfDisbursedLoansValue").html(data.amountDisbursed);
       

        var totalComm = data.commitmentAmount - data.amountDisbursed;
        //alert(totalComm);
        //alert(data.amountDisbursed);


        requesterdBalanec = totalComm;
        whatlenderhas = requesterdBalanec;
        //alert(whatlenderhas);
        
        
        //alert(requesterdBalanec);
       //$('.balAmountDisplay').attr("totalRequestedAmount", requesterdBalanec);
       },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", accessToken ); 
      } 
   });
    $(".loadingSec").hide();
}

function getUserDetails(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    if(suserId != ""){
      if(sprimaryType == "LENDER"){
        $('.placeUserID').html("LR"+suserId);
        $('.virtualID').html("OXYLR"+suserId);
      }else{
        $('.placeUserID').html("BR"+suserId);
      }
    }

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
      var personalDetailsUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+suserId+"";
}else{
// https://fintech.oxyloans.com/oxyloans/
    var personalDetailsUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+suserId+"";
}




    // Get User Name from Personal Details API
    //var personalDetailsUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+suserId+"";
    $.ajax({
          url:personalDetailsUrl,
          type:"GET",
          success: function(data,textStatus,xhr){
           console.log(data);
           userNameFromAPI = data.firstName;
          
           globalLoanId = data.loanRequestId;
           //alert(data);
           $('.placeUserID').html(data.userDisplayId);
           //alert(globalLoanId);
           
           if(userNameFromAPI == ""){
              userNameFromAPI = "User"; 
           }

            usernationality=data.nationality
           if(usernationality == ""){
              usernationality = "Indian"; 
           }

           userlastNameFromAPI = data.lastName;
          
           $(".email-user").html(data.email);

           // userEmailforGlobal = data.email;

           if(userlastNameFromAPI == ""){
              userlastNameFromAPI = "Name"; 
           }

          userpersonalinfo=data.personalDetailsInfo;

          userifsccode= data.ifscCode;

          userkycStatus= data.kycStatus;
          userbankDetailsInfo= data.bankDetailsInfo;

         loanOfferedStatus=data.loanOfferedStatus;
         rateOfInterest = data.rateOfInterestUpdated;

     if(data.city == null){
    $("#modal-checkCity").modal("show");
  }else {
    $("#modal-checkCity").modal("hide");
      
      }
          

         

           var windowLocation = $(location). attr("href");
             if(noprofileCheck == "yes" ){
                redirectUsertoProfile();
             }



          var notificationErrorHtml = $(".emailHTML").html();
          if(data.emailVerified == false){
            $(".content-wrapper").prepend(notificationErrorHtml);
            $(".sendActivationLink").attr("data-email", data.email);
          }



           $(".displayUserName").html(userNameFromAPI +" "+userlastNameFromAPI);
           $(".lenderWalletAmount").html(data.lenderWalletAmount);

           // Checking RateofInterest and Redirect User SCRIPT STARTS

         if(noROICheck != "no"){  
           var locationfindpath = window.location.href;
           var inLoanRequestPage = false;
           if (window.location.href.indexOf("borrowerraisealoanrequest") > -1) {
              inLoanRequestPage = true;
           }

           if (window.location.href.indexOf("lenderraisealoanrequest") > -1) {
              inLoanRequestPage = true;
           }

            if(data.rateOfInterestUpdated === false ){
              setTimeout(function(){ 
                  rateofInterestCheck = true;
                }, 1000);  
            }

            var nowyoucancheckROI = true;

           if(userNameFromAPI == "" || userNameFromAPI == null){
              nowyoucancheckROI = false;
           } 

            //alert(nowyoucancheckROI);
         if(sprimaryType == "LENDER"){
              $(".updateTextForLenderLoanSubmitFirstTime").html("Your loan offer is submitted.");
          }else{
            //alert("borrowerraisealoanrequest");   
            $(".utbborrowerFitstTime").html("Your loan application is submitted.");
            //alert($(".utbborrowerFitstTime").html());
          } 

            
           if(nowyoucancheckROI){
                if(inLoanRequestPage == true && data.rateOfInterestUpdated === false){
                    $(".changeTextBeforeLoanSubmit").html("Submit your lending commitment");
                }
                //alert(inLoanRequestPage);
                if(inLoanRequestPage != true){
                  if(data.rateOfInterestUpdated === false ){
                    $(".btnNameofIncreaseLoan").html("Submit Loan Application");
                  }



                  //alert(userNameFromAPI);  
                  if(data.rateOfInterestUpdated === false){
                    if(data.kycStatus != false){
                        if(sprimaryType == "LENDER"){
                          $("#modal-ROI-NotUpdated-Lender").modal("show");
                        }else{
                          $("#modal-ROI-NotUpdated").modal("show");
                        }
                      }
                    }
                }
            }
          } 
           // Checking RateofInterest and Redirect User SCRIPT ENDS

           if(data.rateOfInterestUpdated ==false && data.loanRequestId==null){
                     $("#modal-newLoanRequest").modal("show");
                     $("#modal-ROI-NotUpdated").modal("hide");
                     $("#hideloanrequest").hide();
                     $("#shownewLoan").show();
                    }else{
                       $("#modal-newLoanRequest").modal("hide");
                       $("#shownewLoan").hide();
                       $("#hideloanrequest").hide();
                    }


                  
                  
                 /* if(data.kycStatus === false){
                    if(userpersonalinfo==true && userifsccode!=null){
                        if(sprimaryType == "LENDER"){
                          $("#modal-Kyc-NotUpdated-Lender").modal("show");
                        }else{
                          $("#modal-Kyc-NotUpdated-Borrower").modal("show");
                        }
                      }
                    }*/
      
        if(data.experianStatus==true){
      $("#experianid").attr("href", "creditreportview");       
     }else{
       $("#experianid").attr("href", "creditReportInfo"); 
     }
      
      if((data.city=="Hyderabad" || data.city=="Bangalore" || data.city=="Secunderabad" || data.city=="K.V.Rangareddy") && data.userStatus=="ACTIVE" ){
      $("#experianlistid").show();       
     }else{
       $("#experianlistid").hide(); 
     }
     

      if(sprimaryType == "BORROWER"){ 
  /*  var url=$(location).attr('href');  
    if(url.indexOf("creditReportInfo")<0){
     if((data.city=="Hyderabad" || data.city=="Bangalore" || data.city=="Secunderabad" || data.city=="K.V.Rangareddy") && data.userStatus=="ACTIVE" && data.experianStatus==false && data.rateOfInterestUpdated==true && userkycStatus==true && userpersonalinfo==true && userbankDetailsInfo==true ){
       $("#modal-checkCreditScore").modal("show");
     }else{
       $("#modal-checkCreditScore").modal("hide");
     }
  } */
}



          },
          statusCode: {
            200: function (response) {
               //alert('1');
               console.log("Login Successs");
            },
            401: function (response) {
               //alert('Invalid username or password.');
               $("#modal-checkSession").modal("show");
               setTimeout(function(){ 
                  window.location = "userlogin";
                }, 2000);     
            },
            409: function (response) {
               //alert('1');
             $("#modal-mobileerror").modal('show');
            },
            404: function (response) {
                               
            }
         },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
          }
       });



}

/*function updateUserCity(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  
  //usercityFromAPI= data.city
  
  if(data.city == null){
    $("#modal-checkCity").modal("show");
  }else {
    $("#modal-checkCity").modal("hide");
      
      }
}*/


function redirectUsertoProfile(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  if(userpersonalinfo==false && userbankDetailsInfo==false && userkycStatus==false ){
      if(sprimaryType == "LENDER"){
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to Add a Loan Offer.");
      }else{
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to raise a Loan Request.");
      }

    
    $("#modal-checkProfile").modal("show");
    if(sprimaryType == "LENDER"){
      $(".personalProfileLink").attr("href", "lender_profilePage");
    }else{
      $(".personalProfileLink").attr("href", "borrower_profilePage?");
    }
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lender_profilePage?userScore=0";
      }else{
        window.location = "borrower_profilePage?userScore=0";
      }
    }, 5000);   
  }


   if(userpersonalinfo==false && userbankDetailsInfo==false&& userkycStatus==true ){
      if(sprimaryType == "LENDER"){
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to Add a Loan Offer.");
      }else{
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to raise a Loan Request.");
      }

    
    $("#modal-checkProfile").modal("show");
    if(sprimaryType == "LENDER"){
      $(".personalProfileLink").attr("href", "lender_profilePage");
    }else{
      $(".personalProfileLink").attr("href", "borrower_profilePage?");
    }
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lender_profilePage?userScore=0";
      }else{
        window.location = "borrower_profilePage?userScore=0";
      }
    }, 5000);   
  }

if(userpersonalinfo==true && userbankDetailsInfo==false && userkycStatus==true ){
      if(sprimaryType == "LENDER"){

        $(".text-profileCheck").html("Please complete your Bank Details.");
      }else{
        $(".text-profileCheck").html("Please complete your Bank Details.");
      }

    
    $("#modal-checkProfile").modal("show");

    if(sprimaryType == "LENDER"){
      $(".personalProfileLink").attr("href", "lender_profilePage");
    }else{
      $(".personalProfileLink").attr("href", "borrower_profilePage?");
    }
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lender_profilePage?userScore=0";
      }else{
        window.location = "borrower_profilePage?userScore=0";
      }
    }, 5000);   
  }




 if(userpersonalinfo==true && userbankDetailsInfo==false && userkycStatus==false ){
      if(sprimaryType == "LENDER"){

        $(".text-profileCheck").html("Please complete your Bank Details.");
      }else{
        $(".text-profileCheck").html("Please complete your Bank Details.");
      }

    
    $("#modal-checkProfile").modal("show");

    if(sprimaryType == "LENDER"){
      $(".personalProfileLink").attr("href", "lender_profilePage");
    }else{
      $(".personalProfileLink").attr("href", "borrower_profilePage?");
    }
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lender_profilePage?userScore=0";
      }else{
        window.location = "borrower_profilePage?userScore=0";
      }
    }, 5000);   
  }




if(userpersonalinfo==true && userbankDetailsInfo==true  && userkycStatus==false ){
    

     if(sprimaryType == "LENDER"){
      $("#modal-Kyc-NotUpdated-Lender").modal("show");
     }else{
     $("#modal-Kyc-NotUpdated-Borrower").modal("show");
     }
    if(sprimaryType == "LENDER"){
      $(".personalProfileLink").attr("href", "lender_profilePage");
    }else{
      $(".personalProfileLink").attr("href", "borrower_profilePage?");
    }
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lender_profilePage?userScore=0";
      }else{
        window.location = "borrower_profilePage?userScore=0";
      }
    }, 5000);   
  }

if(userpersonalinfo==true && userbankDetailsInfo==true  && userkycStatus==true && rateOfInterest==true && loanOfferedStatus==true){
  if (sprimaryType == "BORROWER") {
    $("#modal-sendofferacceptance").modal("show");
    }else{
       $("#modal-sendofferacceptance").modal("hide");
     }
 
   if(sprimaryType == "BORROWER"){
      $(".sendofferPage").attr("href", "acceptLoanoffer");
    }

    setTimeout(function(){ 
      if(sprimaryType == "BORROWER"){
        window.location = "acceptLoanoffer?userScore=0";
      }
    }, 5000); 
}


}
// LOAD BORROWER DASHBOARD //
function loadborrowerDashboardData(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    saccessToken = saccessToken;

   if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
  }else{
  // https://fintech.oxyloans.com/oxyloans/
      var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
  }




    //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);	  
       borrowercommValue = data.commitmentAmount;
       $(".commitmentAmount").html(data.commitmentAmount);
       $(".interestPaid").html(data.interestPaid);
       $(".noOfActiveLoans").html(data.noOfActiveLoans);
       $(".noOfClosedLoans").html(data.noOfClosedLoans);
       $(".closedLoansValue").html(data.closedLoansAmount);
       $(".noOfDisbursedLoans").html(data.noOfDisbursedLoans);
       $(".noOfFailedEmis").html(data.noOfFailedEmis);
       $(".noOfLoanRequests").html(data.noOfLoanRequests);
       $(".outstandingAmount").html(data.amountDisbursed-data.closedLoansAmount);
       $(".principalReceived").html(data.principalReceived);
       $(".totalTransactionFee").html(data.totalTransactionFee);
       $(".amountDisbursed").html(data.amountDisbursed);
       $(".loanAmountPending").html(data.outstandingAmount);
       $('.noOfDisbursedLoansValue').html(data.amountDisbursed);
       $('.noOfLoanResponses').html(data.noOfLoanResponses);
       $('.noOfoffersent').html(data.noOfLoanRequests);
       $('.noofferssentValue').html(data.inProcessAmount);
       $('.oxyscore').html(data.oxyScore);


       setTimeout(function(){
        // This is for borrowerraisealoanrequest PAGE
          $("#loanRequestAmount").val(borrowercommValue);
        }, 500); 
      //alert(data.commitmentAmount + " "+ data.outstandingAmount);
       
        var totalComm = data.commitmentAmount + data.amountDisbursed;
        //alert(totalComm);
        //alert(data.amountDisbursed);        

        requesterdBalanec = totalComm - data.outstandingAmount;
        //alert(requesterdBalanec);
       //$('.balAmountDisplay').attr("totalRequestedAmount", requesterdBalanec);
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
   
   /*var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": 1,
         "pageSize":3
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
*/


 var postData={
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.status",
        "fieldValue":"ACTIVE",
        "operator":"EQUALS"
      }
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"loanOfferedAmount.loanOfferdStatus",
        "fieldValue":"LOANOFFERACCEPTED",
        "operator":"EQUALS"
      }
      },"page":{
        "pageNo":1,
        "pageSize":3
      },
      "sortBy":"loanRequestedDate",
      "sortOrder":"DESC"
    }



    //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 3}};
    var postData = JSON.stringify(postData);
    console.log(postData);

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}else{
// https://fintech.oxyloans.com/oxyloans/
     var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}

     //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
      $.ajax({
        url:getStatUrl,
        type:"POST",
        data:postData,
        contentType:"application/json",
        dataType:"json",
        success: function(data,textStatus,xhr){
         console.log(data);
          totalEntries = data.totalCount;
         // console.log(totalEntries);
         var template = document.getElementById('loanListingsTpl').innerHTML;
       //var indexValue = [];
       // alert(data.pageCount);


       // var _obj = data.results || [];
       // for(var i=0; i<3; i++){
       //    _obj[i].push(["index", i]);
       //    alert(_obj);
       // }


        Mustache.parse(template);
       //var html = Mustache.render(template, data);

      
        var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadBorrowersListings').html(html);
       $(".oxyScore-00").html("YTR");
         var displayPageNo = totalEntries/3;
        displayPageNo = displayPageNo+1;
        $('.lenderDashBoardPagination').bootpag({
            total: displayPageNo,
            page: 1,
            maxVisible: 5,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num){
            //$(".content4").html("Page " + num); // or some ajax content loading...
        
          if(primaryType == "LENDER"){
             var  fieldValueforSearch = "BORROWER";
          }else{
             var  fieldValueforSearch = "LENDER";
          }
  
      /* var postData =  {
           "leftOperand": {
            "leftOperand": {
               "fieldName": "userPrimaryType",
               "fieldValue": fieldValueforSearch,
               "operator": "EQUALS"
             },
             "logicalOperator": "AND",
             "rightOperand": {
                 "fieldName": "user.status",
                 "fieldValue": "ACTIVE",
                 "operator": "EQUALS"
             }

           },
           "logicalOperator": "AND",
           "rightOperand": {
             "leftOperand": {
               "fieldName": "parentRequestId",
               "operator": "NULL"
             },
             "logicalOperator": "AND",
             "rightOperand": {
                 "fieldName": "user.emailVerified",
                 "fieldValue": "true",
                 "operator": "EQUALS"
             }
           },
           "page": {
               "pageNo": num,
               "pageSize":3
           },
           "sortBy":"loanRequestedDate",
           "sortOrder" : "DESC"
        };*/

         var postData={
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.status",
        "fieldValue":"ACTIVE",
        "operator":"EQUALS"
      }
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"loanOfferedAmount.loanOfferdStatus",
        "fieldValue":"LOANOFFERACCEPTED",
        "operator":"EQUALS"
      }
      },"page":{
        "pageNo":num,
        "pageSize":3
      },
      "sortBy":"loanRequestedDate",
      "sortOrder":"DESC"
    }

        //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
        var postData = JSON.stringify(postData);
        console.log(postData);
        

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}else{
// https://fintech.oxyloans.com/oxyloans/
         var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}



         //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
          $.ajax({
            url:getStatUrl,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loanListingsTpl').innerHTML;
             //console.log(template);
             Mustache.parse(template);
             //var html = Mustache.render(template, data);
             var html = Mustache.to_html(template, {data: data.results});
             

             //alert(html);
             $('#loadBorrowersListings').html(html);
             $(".oxyScore-00").html("YTR");     

            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
  });
});    

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


/****************************LENDER PAGINATION DASHBOARD**********************/
/*setTimeout(function(){ 
  var displayPageNo = totalEntries/3;
  displayPageNo = displayPageNo+1;
  $('.lenderDashBoardPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
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
    //alert(fieldValueforSearch); 
  var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
       var template = document.getElementById('loanListingsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       

       //alert(html);
       $('#loadBorrowersListings').html(html);
            

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/**************************** LENDER PAGINATION DASHBOARD ENDS**********************/


function loadLendersListings(){
  //alert(2);
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  //alert(sprimaryType);
  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "BORROWER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
    }
  var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": 1,
         "pageSize":3
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };


  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
  console.log(postData);
  //alert(1);

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
}




   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
        console.log(totalEntries);
        //alert(totalEntries);
         var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       

       //alert(html);
       $('#loadLendersListings').html(html);
       var displayPageNo = totalEntries/3;
  displayPageNo = displayPageNo+1;
  $('.dashBoardPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
      
        if(primaryType == "BORROWER"){
           var  fieldValueforSearch = "LENDER";
        }else{
           var  fieldValueforSearch = "BORROWER";
        }
        //alert(fieldValueforSearch); 

     var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": num,
         "pageSize":3
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };

     // var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo":num,"pageSize":3}};
      var postData = JSON.stringify(postData);
    console.log(postData);
      //alert(1);

      if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
       var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
       var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
       //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
        $.ajax({
          url:getStatUrl,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
             var template = document.getElementById('loanListiongsTpl').innerHTML;
           //console.log(template);
           Mustache.parse(template);
           //var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});
           

           //alert(html);
           $('#loadLendersListings').html(html);
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
  }); 
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}
//LOAN LISTINGS FUNCTION //

/****************************BORROWER PAGINATION DASHBOARD**********************/
/*setTimeout(function(){ 
  var displayPageNo = totalEntries/3;
  displayPageNo = displayPageNo+1;
  $('.dashBoardPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
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
        //alert(fieldValueforSearch); 
      var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo":num,"pageSize":3}};
      var postData = JSON.stringify(postData);
    console.log(postData);
      //alert(1);
       var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
        $.ajax({
          url:getStatUrl,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
             var template = document.getElementById('loanListiongsTpl').innerHTML;
           //console.log(template);
           Mustache.parse(template);
           //var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});
           

           //alert(html);
           $('#loadLendersListings').html(html);
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
  }); 
}, 1000);*/
/****************************PAGINATION DASHBOARD ENDS**********************/


function loadloanListings(){
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
    //alert(fieldValueforSearch); 
    /* var postData =  {
   "leftOperand": {
       "fieldName": "userPrimaryType",
       "fieldValue": fieldValueforSearch,
       "operator": "EQUALS"
   },
   "logicalOperator": "AND",
   "rightOperand": {
       "fieldName": "parentRequestId",
       "operator": "NULL"
   },
   "page": {
       "pageNo": 1,
       "pageSize":9
   },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
};*/

 var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": 1,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 9}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);

       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $(".oxyScore-00").html("YTR");
       $('#loadloanListings').html(html);

 var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.borrowerLoanListingsPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...

    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "BORROWER";
    }else{
       var  fieldValueforSearch = "LENDER";
    }
    //alert(fieldValueforSearch); 

    var postData =  {
         "leftOperand": {
          "leftOperand": {
             "fieldName": "userPrimaryType",
             "fieldValue": fieldValueforSearch,
             "operator": "EQUALS"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.status",
               "fieldValue": "ACTIVE",
               "operator": "EQUALS"
           }

         },
         "logicalOperator": "AND",
         "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         },
         "page": {
             "pageNo": num,
             "pageSize":9
         },
         "sortBy":"loanRequestedDate",
         "sortOrder" : "DESC"
      };
  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       //alert(data);
       console.log(data);
       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadloanListings').html(html);
       $(".oxyScore-00").html("YTR");


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
    // $(".loadingSec").hide();
}


/****************************BORROWER LOAN LISTINGS PAGINATION **********************/
/*setTimeout(function(){ 
  var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.borrowerLoanListingsPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
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
    //alert(fieldValueforSearch); 
  var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadloanListings').html(html);


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************BORROWER LOAN LISTINGS PAGINATION  ENDS**********************/

function loadborrowerloanListings(){
  //alert(1);
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


     /*var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": 1,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };*/

 var postData={
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.status",
        "fieldValue":"ACTIVE",
        "operator":"EQUALS"
      }
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"loanOfferedAmount.loanOfferdStatus",
        "fieldValue":"LOANOFFERACCEPTED",
        "operator":"EQUALS"
      }
      },"page":{
        "pageNo":1,
        "pageSize":9
      },
      "sortBy":"loanRequestedDate",
      "sortOrder":"DESC"
    }

  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 9}};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadborrowerloanListings').html(html);
      
      var displayPageNo = totalEntries/9;
      displayPageNo = displayPageNo+1;
      $(".oxyScore-00").html("YTR"); 
         $('.lenderLoanListingsPagination').bootpag({
                total: displayPageNo,
                page: 1,
                maxVisible: 5,
                leaps: true,
                firstLastUse: true,
                first: '←',
                last: '→',
                wrapClass: 'pagination',
                activeClass: 'active',
                disabledClass: 'disabled',
                nextClass: 'next',
                prevClass: 'prev',
                lastClass: 'last',
                firstClass: 'first'
            }).on("page", function(event, num){
                //$(".content4").html("Page " + num); // or some ajax content loading...
    
              if(primaryType == "LENDER"){
                 var  fieldValueforSearch = "BORROWER";
              }else{
                 var  fieldValueforSearch = "LENDER";
              }
   /* var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
       "leftOperand": {
         "fieldName": "parentRequestId",
         "operator": "NULL"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.emailVerified",
           "fieldValue": "true",
           "operator": "EQUALS"
       }
     },
     "page": {
         "pageNo": num,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };*/

   var postData={
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.status",
        "fieldValue":"ACTIVE",
        "operator":"EQUALS"
      }
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"loanOfferedAmount.loanOfferdStatus",
        "fieldValue":"LOANOFFERACCEPTED",
        "operator":"EQUALS"
      }
      },"page":{
        "pageNo":num,
        "pageSize":9
      },
      "sortBy":"loanRequestedDate",
      "sortOrder":"DESC"
    }
           // var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
            var postData = JSON.stringify(postData);
            console.log(postData);
            //alert(1);
           
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


           //  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
              $.ajax({
                url:getStatUrl,
                type:"POST",
                data:postData,
                contentType:"application/json",
                dataType:"json",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 var template = document.getElementById('loanListiongsTpl').innerHTML;
                 //console.log(template);
                 Mustache.parse(template);
                 //var html = Mustache.render(template, data);
                 var html = Mustache.to_html(template, {data: data.results});

                 //alert(html);
                 $('#loadborrowerloanListings').html(html);


                },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken);
          }
             });
            }); 

                },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken);
          }
             });
          }

/****************************LENDER LOAN LISTINGS PAGINATION **********************/
/*setTimeout(function(){ 
  var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.lenderLoanListingsPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
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
  var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
  var postData = JSON.stringify(postData);
  console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadborrowerloanListings').html(html);


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************LENDER LOAN LISTINGS PAGINATION  ENDS**********************/




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
    
    if(suserId == ""){
      window.location = "userlogin";   
      return false;
    } else{
      return true;
    }     
}


 function readPAN(input) {
  console.log(input);
 $(".loadingSec").show();

 if (input.files && input.files[0]) {
   var reader = new FileReader();
 
   reader.onload = function(e) {
     $('.panUpload .image-upload-wrap').hide();

     $('.panUpload .file-upload-image').attr('src', e.target.result);
     $('.panUpload .file-upload-content').show();
    // $('.panUpload .file-upload-image').attr('href', e.target.result);

     $('.panUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);
        
   var fd = new FormData();
   var files = input.files[0];
   //alert(fd);
   fd.append('PAN',files);
   var actionURL = $("#userKYCUpload").attr("action");
   //alert(actionURL);
  $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){

           if(data != 0){
             $("#modal-fileUploadedSuccessfully").modal('show');
             $(".loadingSec").hide();
             var myfile=$("#pan").val();
             var filename = myfile.split("\\").pop();
       //alert(filename);
             $('.pancard').html(filename);
            
           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       console.log('Error Something');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }

   });

 } else {
  removeUpload();
 }
}


function readPAYSLIPS(input) {
  $(".loadingSec").show();
 if (input.files && input.files[0]) {

   var reader = new FileReader();

   reader.onload = function(e) {
     $('.payslipsUpload .image-upload-wrap').hide();

     $('.payslipsUpload .file-upload-image').attr('src', e.target.result);
     $('.payslipsUpload .file-upload-content').show();

     $('.payslipsUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append('PAYSLIPS',files);
   console.log(fd);
   var actionURL = $("#userKYCUpload").attr("action");
   //alert(actionURL);
   console.log(fd);
   $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
           if(data != 0){
              $("#modal-fileUploadedSuccessfully").modal('show');
              $(".loadingSec").hide();
              var myfile=$("#payslips").val();
               var filename = myfile.split("\\").pop();
             $('.Payslipsdoc').html(filename); 

           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       alert('file not uploaded');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }
   });
 } else {
   removeUpload();
 }
}



function readBankStatement(input) {
 $(".loadingSec").show();
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
     $('.bsUpload .image-upload-wrap').hide();

     $('.bsUpload .file-upload-image').attr('src', "http://182.18.139.198/FEOxyLoans/assets/images/pdf.png");
     $('.bsUpload .file-upload-content').show();

     $('.bsUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append('BANKSTATEMENT',files);
   // alert(fd);
   var actionURL = $("#userKYCUpload").attr("action");
   // alert(actionURL);

   $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
           if(data != 0){
             $("#modal-fileUploadedSuccessfully").modal('show');
             $(".loadingSec").hide();
             //location.reload();
           var myfile=$("#bankSatatementdoc").val();
            var filename = myfile.split("\\").pop();
              $('.bankSatatement').html(filename);
           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       console.log('Error Something');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }

   });

 } else {
  removeUpload();
 }
}

function readDocument(input, fileUpload, fileUploadUi) {

  //alert(fileUploadUi);

  $(".loadingSec").show();
 if (input.files && input.files[0]) {

   var reader = new FileReader();

   reader.onload = function(e) {
     $('.'+fileUploadUi+'Upload .image-upload-wrap').hide();

     $('.'+fileUploadUi+'Upload .file-upload-image').attr('src', e.target.result);
    
     $('.'+fileUploadUi+'Upload .file-upload-content').show();

     $('.'+fileUploadUi+'Upload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append(fileUpload, files);
   console.log(fd);
   var actionURL = $("#userKYCUpload").attr("action");
   //alert(actionURL);
   console.log(fd);
   $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
           if(data != 0){
              $("#modal-fileUploadedSuccessfully").modal('show');
              $(".loadingSec").hide();
             //location.reload();
             var myfile=$("#voterid").val();
              var filename = myfile.split("\\").pop();
             $('.voteridDoc').html(filename);
            
             var myfile=$("#drivinglicence").val();
              var filename1 = myfile.split("\\").pop();
              $('.DrivingLicenseDoc').html(filename1);
             
              var myfile=$("#aadhar").val();
              var filename2 = myfile.split("\\").pop();
              $('.Aadhardoc').html(filename2);  
           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       alert('file not uploaded');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }
   });
 } else {
   removeUpload();
 }
}


function readPASSPORT(input) {


  $(".loadingSec").show();
 if (input.files && input.files[0]) {

   var reader = new FileReader();

   reader.onload = function(e) {
     $('.passportUpload .image-upload-wrap').hide();

     $('.passportUpload .file-upload-image').attr('src', e.target.result);
     $('.passportUpload .file-upload-content').show();

     $('.passportUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append('PASSPORT',files);
   console.log(fd);
   var actionURL = $("#userKYCUpload").attr("action");
   //alert(actionURL);
   console.log(fd);
   $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
           if(data != 0){
              $("#modal-fileUploadedSuccessfully").modal('show');
              $(".loadingSec").hide();
              // location.reload();
             var myfile=$("#passport").val();
               var filename = myfile.split("\\").pop();
              $('.Passportdoc').html(filename);  
           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       alert('file not uploaded');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }
   });
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


$(".uploadKYC").click(function(){
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
    //alert(panUpload);

    var aadharUpload = $('.aadharFileUpload').val();
  //  alert(aadharUpload);

    var passportUpload = $('.passportFileUpload').val();
   // alert(passportUpload);
    // var file = panUpload.files[0];
    // var formData = new FormData();
    // formData.append('file', file)

});




function setKYCvars(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");



if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var formUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/kyc";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";

}
 //var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";
 $("#userKYCUpload").attr("action", formUrl);

}

function setProfilePicURL(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var formUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/uploadProfilePic";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/uploadProfilePic";

}

 // var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/uploadProfilePic";
  $("#userPICUpload").attr("action", formUrl);
}




function viewDoc(doctype){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var doctype = doctype;

  //var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/"+doctype;

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/"+doctype;

}
console.log(getPAN);
   $.ajax({
      url:getPAN,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
    if(data.downloadUrl != ""){
          console.log(data.downloadUrl);
       // $('a.colorbox').colorbox();
          //window.open(data.downloadUrl,'_blank');
          var sourcePath = data.downloadUrl;
          var contentTypeCheck = ".pdf";

          if(sourcePath.indexOf(contentTypeCheck) != -1){
              //alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
              window.open(data.downloadUrl,'_blank');
          }else{
            $.colorbox({href:data.downloadUrl});
          }

       }


     /* if(data.downloadUrl != ""){
          console.log(data.downloadUrl);
          window.open(data.downloadUrl,'_blank');    
       }*/
       
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}

function getKYC(){
suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");


if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PAN";
var getPASSPORT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
var getAADHAR = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/AADHAR";
var getBANKSTATEMENT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";
var getPAYSLIPS = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PAYSLIPS";
var getVOTERID = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/VOTERID";
var getDRIVINGLICENCE = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/DRIVINGLICENCE";

}else{
// https://fintech.oxyloans.com/oxyloans/
var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PAN";
var getPASSPORT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
var getAADHAR = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/AADHAR";
var getBANKSTATEMENT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";
var getPAYSLIPS = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PAYSLIPS";
var getVOTERID = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/VOTERID";
var getDRIVINGLICENCE = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/DRIVINGLICENCE";

}


// var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PAN";
// var getPASSPORT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
// var getAADHAR = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/AADHAR";
// var getBANKSTATEMENT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";

                  $.ajax({
                url:getPAN,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                    $('.pancard').html(data.fileName);
                    $('.pan-image-upload-wrap, .pan-uploadedButton').hide();
                    $('.pan-file-upload-content').show();
                    $(".panImage").attr('src',data.downloadUrl); 
                 }
                 
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });

            $.ajax({
                url:getPASSPORT,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                    $('.Passportdoc').html(data.fileName);
                    $('.passport-image-upload-wrap, .passport-uploadedButton').hide();
                    $('.passport-file-upload-content').show();
                    $(".passportImage").attr('src',data.downloadUrl);
                  }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });

              $.ajax({
                url:getAADHAR,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                  $('.Aadhardoc').html(data.fileName);
                    $('.aadhar-image-upload-wrap, .aadhar-uploadedButton').hide();
                    $('.aadhar-file-upload-content').show();
                    $(".aadharImage").attr('src',data.downloadUrl);
                 }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });

              $.ajax({
                url:getBANKSTATEMENT,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                  $('.bankSatatement').html(data.fileName);
                  // window.open(data.downloadUrl,'_blank');
                    $('.bs-image-upload-wrap, .bs-uploadedButton').hide();
                    $('.bs-file-upload-content').show();
                    $(".bsImage").attr('src', "http://182.18.139.198/FEOxyLoans/assets/images/pdf.png");
                 }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });


              $.ajax({
                url:getPAYSLIPS,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);

                 if(data.downloadUrl != ""){
                    $('.Payslipsdoc').html(data.fileName);

                    $('.payslips-image-upload-wrap, .payslips-uploadedButton').hide();

                    $('.payslips-file-upload-content').show();
                    $(".payslipsImage").attr('src', data.downloadUrl);
                 }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });

                $.ajax({
                url:getVOTERID,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                   $('.voteridDoc').html(data.fileName);
                    $('.voterid-image-upload-wrap, .voterid-uploadedButton').hide();
                    $('.voterid-file-upload-content').show();
                    $(".voteridImage").attr('src', data.downloadUrl);
                 }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });
              
           $.ajax({
                url:getDRIVINGLICENCE,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
                   $('.DrivingLicenseDoc').html(data.fileName);
                    $('.drivinglicence-image-upload-wrap, .drivinglicence-uploadedButton').hide();
                    $('.drivinglicence-file-upload-content').show();
                    $(".drivinglicenceImage").attr('src', data.downloadUrl);
                 }
              },
                error: function(xhr,textStatus,errorThrown){
                  console.log('Error Something');
                },
                beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken", saccessToken);
               }
             });
              

}

function loaduserID(){
  suserId = getCookie("sUserId");
  $('.virtualID').html("OXYLR"+suserId);
}


function loadviewLoanofferfromnewAPI(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  if(primaryType == "LENDER"){
     var  fieldValueforSearch = "BORROWER";
  }else{
     var  fieldValueforSearch = "LENDER";
  }


  $(".loadingSec").hide();
  var loanRequestId  = $('.requestidFromClick').html();
  var requestPageNo  = $('.requestPageNo').html();
  var requestorderNo  = $('.requestorderNo').html();
  console.log(loanRequestId +" , " +requestPageNo + " , "+ requestorderNo);
      
  var postData =  {
       "leftOperand": {
        "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": fieldValueforSearch,
           "operator": "EQUALS"
         },
         "logicalOperator": "AND",
         "rightOperand": {
             "fieldName": "user.status",
             "fieldValue": "ACTIVE",
             "operator": "EQUALS"
         }

       },
       "logicalOperator": "AND",
       "rightOperand": {
         "leftOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
         },
         "logicalOperator": "AND",
         "rightOperand": {
             "fieldName": "user.emailVerified",
             "fieldValue": "true",
             "operator": "EQUALS"
         }
       },
       "page": {
           "pageNo": requestPageNo,
           "pageSize":1
       },
       "sortBy":"loanRequestedDate",
       "sortOrder" : "DESC"
    };
  var postData = JSON.stringify(postData);
  console.log(postData);
 // var getLoanDetails = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";


if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getLoanDetails = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getLoanDetails = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

  $.ajax({
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",

    success: function(data,textStatus,xhr){
       console.log(data);

        var totalComm = data.commitmentAmount - data.amountDisbursed;
        //alert(totalComm);
        //alert(data.amountDisbursed);


        requesterdBalanec = totalComm;
        whatlenderhas = requesterdBalanec;
        //alert(whatlenderhas);
        
        
        //alert(requesterdBalanec);
       //$('.balAmountDisplay').attr("totalRequestedAmount", requesterdBalanec);
       },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", accessToken ); 
      } 
   });
  
  $(".loadingSec").hide();

}




function loadviewLoanoffer(){
    //alert("in loadviewLoanoffer");
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    saccessToken = saccessToken;

    var loanRequestId  = $('.requestidFromClick').html(); 
    //alert(loanRequestId);
    //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+loanRequestId;
    
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+loanRequestId;

}else{
// https://fintech.oxyloans.com/oxyloans/
    var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+loanRequestId;

}

    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
        console.log("Success Call");
        console.log(data);
       $(".loanPurposeDisplay").html(data.loanPurpose);
       $('.toImLending').html(data.user.firstName +" " +data.user.lastName)
       $(".rateOfInterestDisplay").html(data.rateOfInterest);
       $(".loanRequestedDateDisplay").html(data.loanRequestedDate);
       if(data.repaymentMethod == "PI"){
          $(".repaymentMethodDisplay").html("Principal Interest Flat");
       }else{
          $(".repaymentMethodDisplay").html("Interest");
       }
       //$(".balAmountDisplay").html(data.loanRequestAmount - data.loanDisbursedAmount);

       
     //loanDisbursedAmount
       $(".loanPurpose").html(data.loanPurpose);
       $(".loanRequestAmountDisplay").html(data.loanRequestAmount);
       $(".loanRequestDisplay").html(data.loanRequest);
       $(".durationDisplay").html(data.duration);
       
       
       //loanDisbursedAmount
       $(".borrowerCity").html(data.user.city);
       $(".borrowerCompany").html(data.user.companyName);
       $(".borrowerSalary").html(data.user.salary);
       //$(".borrowerRiskCat").html(data.user.riskProfileDto.grade);

     if(data.user.riskProfileDto.grade== "A"){
          $(".borrowerRiskCat").html("Low risk");
       }else if(data.user.riskProfileDto.grade== "B"){
          $(".borrowerRiskCat").html("Medium risk");
       }else if(data.user.riskProfileDto.grade== "C"){
          $(".borrowerRiskCat").html("High risk");
       }else{
          $(".borrowerRiskCat").html("High risk");
       }

       $(".placeUserIDHere").attr("data-userID", data.userId);
       
       
       //alert(data.loanDisbursedAmount);
     // $('.disbursedAmount').html(data.activeLoansAmount);
     $('.disbursedAmount').html(data.loanDisbursedAmount);
       console.log("data.loanRequestAmount" + data.loanRequestAmount);
       console.log("loanMaxAmount" + loanMaxAmount);
       console.log("requesterdBalanec"+ requesterdBalanec);
       console.log("data.loanRequestAmount"+ data.loanRequestAmount);
       console.log("data.loan"+ data.loanDisbursedAmount);

       if(data.loanRequestAmount > loanMaxAmount ){
        console.log(212);
          $('.balAmountDisplay').html(data.loanRequestAmount-data.loanDisbursedAmount); 
          $('.loanRequestAmount').html('50000');
       }else if(requesterdBalanec >= data.loanRequestAmount){
          console.log(2);
          var ansforconsole2 = data.loanRequestAmount - data.loanDisbursedAmount;
          console.log("requesterdBalanec"+ requesterdBalanec);
          if(ansforconsole2 < 0){
            $('.balAmountDisplay').html(0);
          }else{
            $('.balAmountDisplay').html(ansforconsole2);
          }
          
       } else if(requesterdBalanec == 0 || requesterdBalanec < data.loanRequestAmount){
          $('.balAmountDisplay').hide();
          if(sprimaryType == "LENDER"){
            $('.displaySuggetionMessageBorrower').html("You don't have suffecient commitment, please add a loan offer.");  
          } else{
            $('.displaySuggetionMessageBorrower').html("You don't have suffecient requested amount, please raise a loan request.");  
          }
       }
       userRequiredAmount = data.loanRequestAmount-loanMaxAmount;
       borrowerWants = data.loanRequestAmount;
       //alert(requesterdBalanec);


       //Displaying in the form
       var reqamt = data.loanRequestAmount-data.loanDisbursedAmount;
       //alert(data.loanRequestAmount +" "+ data.loanDisbursedAmount);
       //alert(reqamt);


       $('.rateOfInterest option[value='+data.rateOfInterest+']').attr("selected", "selected");
       $("#expectedDate").val(data.loanRequestedDate);
       $('.durationValue option[value='+data.duration+']').attr("selected", "selected");
        var $radios = $('input:radio[name=repaymentMethod]');
        if($radios.is(':checked') === false) {
          $radios.filter('[value='+data.repaymentMethod+']').prop('checked', true);
        }
       // $("#loanPurpose").val(data.loanPurpose);
       if(data.loanDisbursedAmount >= data.loanRequestAmount){
          //alert("yes");
          $(".lenderSendingOffer").remove();
       }



       if(primaryType == "LENDER"){
           if(reqamt > loanMaxAmount){
              $('#loanRequestAmount').val("50000");
           }else{
              $('#loanRequestAmount').val(reqamt);
           }
        } else{
          if(reqamt > loanMaxAmount){
            setTimeout(function(){ 
              $('#loanRequestAmount').val("50000");
            }, 1000); 
              
           }else{
              // alert(loanMaxAmount +" "+ reqamt);
              $('#loanRequestAmount').val(reqamt);
           }
        }
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
    $(".loadingSec").hide();
}


function loadresponserequest(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
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
        "fieldValue":userId ,
        "operator": "EQUALS"
    },
    "page": {
        "pageNo": 1,
        "pageSize": 10
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
  if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);

        //globalLoanID = data.results[0].loanRequestId;
        if(sprimaryType == "LENDER"){
          var lenderresponsHREF = "lenderresponsestoMyrequests?appNumber="+globalLoanId;
        }else{
          var lenderresponsHREF = "borrowerresponsestoMyrequests?appNumber="+globalLoanId;  
        }
        
        $('.viewLendersOffers').attr("href", lenderresponsHREF);
         //alert(lenderresponsHREF);

        totalEntries = data.totalCount;
        var template = document.getElementById('displayallRequests').innerHTML;
        Mustache.parse(template);
        var html = Mustache.to_html(template, {data: data.results});
           
         //alert(globalLoanID);
         //alert(html);
        $('#displayRequests').html(html);
        var displayPageNo = totalEntries/5;
        displayPageNo = displayPageNo+1;
  $('.myloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
   
    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
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
        "fieldValue":userId ,
        "operator": "EQUALS"
    },
    "page": {
        "pageNo": num,
        "pageSize": 10
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
};
  var postData = JSON.stringify(postData);1
console.log(postData);
  //alert(1);
   
   if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayRequests').html(html);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}

/****************************RESPONSE TO MY REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries); 
  var displayPageNo = totalEntries/5;
  displayPageNo = displayPageNo+1;
  $('.myloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
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
        "fieldValue":userId ,
        "operator": "EQUALS"
    },
    "page": {
        "pageNo": num,
        "pageSize": 10
    }
};
  var postData = JSON.stringify(postData);1
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayRequests').html(html);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************RESPONSE TO MY REQUEST  PAGINATION  ENDS**********************/




function loadresponsetoMyrequest(){
  var loanRequestId = globalLoanId;
  console.log("loanRequestId is "+ loanRequestId);
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
    //alert(fieldValueforSearch); 
  var postData = {  
     "leftOperand": {
        "fieldName": "parentRequestId",
        "fieldValue":loanRequestId,
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
        "pageSize": 9
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"

};
  var postData = JSON.stringify(postData);
  console.log(postData);
  //alert(1);
  //alert(1);
   
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  // alert(getStatUrl);
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
       totalEntries = data.totalCount;
        console.log(data.totalCount)
        var totalCount = data.totalCount;
       if(totalCount == 0 ){
          $('.displayNoRecords').show();
        }else{
        //
        var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadresponsetoMyrequest').html(html);
       $(".oxyScore-00").html("YTR");
       var displayPageNo = totalEntries/9;
      $(".displayAppMessage-Closed").html("This loan is closed.");
  displayPageNo = displayPageNo+1;
  $('.responsetomyloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
    var loanRequestId = globalLoanId;
     $('.displayNoRecords').remove();
  
    if(primaryType == "BORROWER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
    }
   //alert(fieldValueforSearch); 
   var postData = {  
           "leftOperand": {
              "fieldName": "parentRequestId",
              "fieldValue":loanRequestId,
              "operator": "EQUALS"
          },
          "logicalOperator": "AND",
           "rightOperand": {
              "fieldName": "userPrimaryType",
              "fieldValue": fieldValueforSearch,
              "operator": "EQUALS"
          },

          "page": {
              "pageNo": num,
              "pageSize": 9
          },
           "sortBy":"loanRequestedDate",
           "sortOrder" : "DESC"

      };
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}



   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  // alert(getStatUrl);
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
       //totalEntries = data.totalCount;
        console.log(data.totalCount)
        var totalCount = data.totalCount;
       if(totalCount == 0 ){
          $('.displayNoRecords').show();
        }else{
        //
        var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadresponsetoMyrequest').html(html);
      }
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
      }
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
    stopLoading();
}

/****************************RESPONSE TO MY LOAN REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries); 
  var displayPageNo = totalEntries/3;
  displayPageNo = displayPageNo+1;
  $('.responsetomyloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
    var loanRequestId = $('.loanrequestIDP').html();
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
    //alert(fieldValueforSearch); 
  var postData = {  
     "leftOperand": {
        "fieldName": "parentRequestId",
        "fieldValue":loanRequestId,
        "operator": "EQUALS"
    },
    "logicalOperator": "AND",
     "rightOperand": {
        "fieldName": "userPrimaryType",
        "fieldValue": fieldValueforSearch,
        "operator": "EQUALS"
    },

    "page": {
        "pageNo": num,
        "pageSize": 3
    }

};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  // alert(getStatUrl);
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
       //totalEntries = data.totalCount;
        console.log(data.totalCount)
        var totalCount = data.totalCount;
       if(totalCount == 0 ){
          $('.displayNoRecords').show();
        }else{
        //
        var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadresponsetoMyrequest').html(html);
      }
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************RESPONSE TO MY LOAN REQUEST  PAGINATION  ENDS**********************/


function respondToLoanRequest(type){
    $(".thisisYESbtn").hide();
    $(".thisisYESbtnajaxImg").show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var id = $(".postreqID").attr("data-reqID"); 
    var type = $(".postreqID").attr("data-type"); 
    //$(".loadingSec").show();   

    // /{userId}/loan/{primaryType}/request/{loanRequestId}/{action}
    //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/"+id+"/"+type;
   

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/"+id+"/"+type;

}else{
// https://fintech.oxyloans.com/oxyloans/
    var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/"+id+"/"+type;

}

  
    $.ajax({
      url:actOnLoan,
      type:"PATCH",
      success: function(data,textStatus,xhr){
        console.log(data);
        
        $('#promptAccUser').modal('hide');
        $('.entrieBlock-'+id+' .userReacted').hide();
        $('.entrieBlock-'+id+' .loanStatus-sec').show();
        $('.entrieBlock-'+id+' .loanStatus-sec').html("You've "+type+ " this request.");
        $('#modal-displaySuggetion').modal("show");
        location.reload();
        // Your response will be sent to the lender.
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
        console.log(arguments);
            $(".modal-body #text").html(arguments[0].responseJSON.errorMessage);

             if(arguments[0].responseJSON.errorCode==110){
              $('#promptAccUser').modal('hide');
              $('#modal-loanAmountlimit').modal("show");

             }
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function loadaddressDetails(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
 
 if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/address";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/address";

}



  //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/address";
  $.ajax({
    url:getStatUrl,
    type:"GET",
    success: function(data,textStatus,xhr){
       $("#address1-edit-btn, #address2-edit-btn, #address3-edit-btn").hide();
    //alert(data);
    if(data == ""){
        $("#address1-edit-btn, #address2-edit-btn, #address3-edit-btn").hide();
    } else if(data != ""){
      for (i = 0; i < data.length; i++) {
         // alert(data[i]);
          if(data[i].type == "PERMANENT"){
            $('#address1-submit-btn, .permanent_housenumberValue, .permanent_areaValue, .permanent_streetValue, .permanent_cityValue').hide();
            $("#address1-edit-btn").show();
            $('.permanent_housenumberValue').val(data[i].houseNumber);
            $('.displaypermanentNum').html(data[i].houseNumber);

            $('.permanent_areaValue').val(data[i].area);
             $('.displaypermanentarea').html(data[i].area);

            $('.permanent_streetValue').val(data[i].street);
             $('.displaypermanentstreet').html(data[i].street);

            $('.permanent_cityValue').val(data[i].city);
             $('.displaypermanentcity').html(data[i].city);

          }else if(data[i].type == "PRESENT"){
           $('#address2-submit-btn, .present_housenumberValue, .present_areaValue, .present_streetValue, .present_cityValue').hide();
             $("#address2-edit-btn").show();
            $('.present_housenumberValue').val(data[i].houseNumber);
            $('.displaypresenthousenumber').html(data[i].houseNumber);

            $('.present_areaValue').val(data[i].area);
             $('.displaypresentarea').html(data[i].area);

            $('.present_streetValue').val(data[i].street);
             $('.displaypresentstreet').html(data[i].street);

            $('.present_cityValue').val(data[i].city);
             $('.displaypresentcity').html(data[i].city);

          }else if(data[i].type == "OFFICE"){
             $('#address3-submit-btn, .office_housenumberValue, .office_areaValue, .office_streetValue, .office_cityValue').hide();
             $("#address3-edit-btn").show();
             $('.office_housenumberValue').val(data[i].houseNumber);
             $('.displayofficehousenumber').html(data[i].houseNumber);

              $('.office_areaValue').val(data[i].area);
              $('.displayofficearea').html(data[i].area);

              $('.office_streetValue').val(data[i].street);
              $('.displayofficestreet').html(data[i].street);

              $('.office_cityValue').val(data[i].city);
              $('.displayofficecity').html(data[i].city);
          }
      }
    }

  },
                  
    error: function(xhr,textStatus,errorThrown){
      console.log('Error Something');
    },
    beforeSend: function(xhr) {
      xhr.setRequestHeader("accessToken", accessToken ); 
    } 
   });
}


//ACCEPTED REQUESTS //
function loadAcceptedrequests(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
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
  },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
}

var postData = JSON.stringify(postData);
console.log(postData);
 
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


 //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
        console.log(data.results);
        if (data.results.length == 0) {
            $("#displayNoRecords").show();
        }else{
           var template = document.getElementById('displayallRequests').innerHTML;
                     Mustache.parse(template);
           var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});
        
           $('#displayRequests').html(html);
            var displayPageNo = totalEntries/9;
      displayPageNo = displayPageNo+1;
      $('.acceptedPagination').bootpag({
          total: displayPageNo,
          page: 1,
          maxVisible: 5,
          leaps: true,
          firstLastUse: true,
          first: '←',
          last: '→',
          wrapClass: 'pagination',
          activeClass: 'active',
          disabledClass: 'disabled',
          nextClass: 'next',
          prevClass: 'prev',
          lastClass: 'last',
          firstClass: 'first'
      }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     
    var postData={
    "leftOperand": {
      "fieldName": "parentRequestId",
      "operator": "NOT_NULL"
    },
      "logicalOperator": "AND",
      "rightOperand": {
        "leftOperand": {
          "leftOperand": {
            "fieldName": "userId",
            "operator": "EQUALS",
            "fieldValue": userId
          },
          "logicalOperator": "OR",
          "rightOperand": {
            "fieldName": "parentRequest.userId",
            "fieldValue": userId,
            "operator": "EQUALS"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValue": "Accepted",
          "operator": "EQUALS"
        }
      },
      "page": {
        "pageNo": num,
        "pageSize": 10
      },
       "sortBy":"loanRequestedDate",
       "sortOrder" : "DESC"
    }


 var postData = JSON.stringify(postData);
console.log(postData);
// var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
  

    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
    
        console.log(data.results);
        
           var template = document.getElementById('displayallRequests').innerHTML;
                     Mustache.parse(template);
           var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});
        
           $('#displayRequests').html(html);
       
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
       }
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}

/**************************** ACCEPTED REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries); 
  var displayPageNo = totalEntries/4;
  displayPageNo = displayPageNo+1;
  $('.acceptedPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Accepted",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  }
}


 var postData = JSON.stringify(postData);
console.log(postData);
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    
  

    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
    
        console.log(data.results);
        
           var template = document.getElementById('displayallRequests').innerHTML;
                     Mustache.parse(template);
           var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});
        
           $('#displayRequests').html(html);
       
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************ACCEPTED REQUEST  PAGINATION  ENDS**********************/

//REJECTED REQUESTS //

function loadRejectedrequests(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
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
  },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
}



 var postData = JSON.stringify(postData);
console.log(postData);
 //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";


if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}




    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
         totalEntries = data.totalCount;
        if (data.results.length == 0) {
            $("#displayNoRecords").show();
        }else{
       var template = document.getElementById('displayallRequests').innerHTML;
      
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       
       $('#displayRequests').html(html);
       var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.rejectedPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
   
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Rejected",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
}

 var postData = JSON.stringify(postData);
console.log(postData);
 //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
         
      
       var template = document.getElementById('displayallRequests').innerHTML;
      
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       
       $('#displayRequests').html(html);
     
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
     }
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}

/**************************** REJECTED REQUEST  PAGINATION **********************/
/*setTimeout(function(){
 // alert(displayPageNo); 
  var displayPageNo = totalEntries/2;
  displayPageNo = displayPageNo+1;
  $('.rejectedPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Rejected",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  }
}

 var postData = JSON.stringify(postData);
console.log(postData);
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
         
      
       var template = document.getElementById('displayallRequests').innerHTML;
      
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       
       $('#displayRequests').html(html);
     
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************REJECTED REQUEST  PAGINATION  ENDS**********************/



function loadpersonalDetails(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  $(".displayFormElements").hide();
  id = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
   
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+id+"";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";

}


  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);

   
     if(data.firstName == null && data.lastName == null && data.fatherName == null && data.dob == null && data.address == null && data.nationality == null&& data.gender == null&& data.maritalStatus == null&& data.companyName == null&& data.salary == null&& data.middleName == null && data.panNumber == null){
        $("#profile-submit-btn, #firstname, #lastname, #fathername,#address, .date, #nationality, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber").show();
        $("#profile-edit-btn").hide();
     } else if(data.firstName != "" && data.lastName!= "" && data.fatherName != "" && data.dob != "" && data.address!= "" && data.nationality != ""&& data.gender != ""&& data.maritalStatus!= "" && data.companyName!= ""&& data.salary!= ""&& data.panNumber!= ""){
        $("#profile-edit-btn").show();
        $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber").hide();
     } else if (data.firstName != "" && data.address == ""){
      //alert("poda");
        $("#profile-edit-btn").show();
        $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber").hide();
     }

     $("#firstname").val(data.firstName);
     $(".displayFirstName").html(data.firstName);


     $("#lastname").val(data.lastName);
      $(".displayLastName").html(data.lastName);

     $("#middlename").val(data.middleName);
     $(".displaymiddleName").html(data.middleName);

     $("#salary").val(data.salary);
     $(".displaysalary").html(data.salary);

     $("#panNumber").val(data.panNumber);
     $(".displaypanNumber").html(data.panNumber);

     $("#companyname").val(data.companyName);
     $(".displaycompanyName").html(data.companyName);





     $("#fathername").val(data.fatherName);
     $(".displayFatherName").html(data.fatherName);

     $("#dateofbirth").val(data.dob);
     $(".displaydateofbirth").html(data.dob);


     $("#nationality").val(data.nationality);
     $(".displaynationality").html(data.nationality);

     $("#address").val(data.address);
     $(".displayaddress").html(data.address);
  
      var $genderRadio = $('input:radio[name=gendervalue]');
      if($genderRadio.is(':checked') === false) {
          $genderRadio.filter("[value="+data.gender+"]").prop('checked', true);
      }

        if(data.gender == "M"){
          $(".displaygender").html("Male");
        }else if(data.gender == "F"){
          $(".displaygender").html("Female");
        }

      var $maritalStatusRadio = $('input:radio[name=maritalStatus]');
      if($maritalStatusRadio.is(':checked') === false) {
          $maritalStatusRadio.filter("[value="+data.maritalStatus+"]").prop('checked', true);
      }

      if(data.maritalStatus == "S"){
          $(".displaymaritalStatus").html("Single");
      }else if(data.maritalStatus == "M"){
          $(".displaymaritalStatus").html("Married");
       }



      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function loadprofessionalDetails(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  id = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/professional/"+id+"";
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/professional/"+id+"";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/professional/"+id+"";

}

  $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
      //alert(data.noOfJobsChanged);
      // console.log(data);
      if(data.employment == null && data.companyName == null && data.description == null && data.fieldOfStudy == null && data.highestQualification == null&& data.noOfJobsChanged == null && data.workExperience == null&& data.officeContactNumber == null&& data.yearOfPassing == null&& data.college == null){
        $("#myprofile-submit-btn, #employment, #companyname, #description,#designation ,  #fieldOfStudy, #highestQualification,#NoOfJobsChange,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").show();
        $("#myprofile-edit-btn").hide();
      } else if(data.noOfJobsChanged == 0) {
        $("#myprofile-edit-btn").show();
        $("#myprofile-submit-btn, #employment, #companyname, #description,#designation , #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").hide();
      } else if(data.employment != "" && data.companyName!= "" && 
                data.description != "" && data.fieldOfStudy != "" && 
                data.highestQualification != "" && data.noOfJobsChanged != ""  && 
                data.workExperience != "" && data.officeContactNumber != "" && 
                data.yearOfPassing != "" && data.college != ""){
        $("#myprofile-edit-btn").show();
        $("#myprofile-submit-btn, #employment, #companyname, #description,#designation , #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").hide();
      }

       $("#employment").val(data.employment);
       $(".displayemployment").html(data.employment);


       $("#companyname").val(data.companyName);
        $(".displaycompanyname").html(data.companyName);

       $("#description").val(data.description);
        $(".displaydesignation").html(data.description);

       $("#designation").val(data.designation);
        $(".displaydescription").html(data.designation);

       $("#fieldOfStudy").val(data.fieldOfStudy);
        $(".displayfieldOfStudy").html(data.fieldOfStudy);

       $("#highestQualification").val(data.highestQualification);
        $(".displayhighestQualifications").html(data.highestQualification);

       $("#NoOfJobsChanged").val(data.noOfJobsChanged);
        $(".displayNoOfJobsChanged").html(data.noOfJobsChanged);

      // $("#officeAddressId").val(data.officeAddressId);
       // $(".displayemployment").html(data.officeAddressId);

       $("#officeContactNumber").val(data.officeContactNumber);
        $(".displayofficeContactNumber").html(data.officeContactNumber);

       $("#workExperience").val(data.workExperience);
        $(".displayworkExperience").html(data.workExperience);

       $(".yearOfPassingValue").val(data.yearOfPassing);
        $(".displayyearOfPassing").html(data.yearOfPassing);

       $("#college").val(data.college);
       $(".displaycollege").html(data.college);
      },statusCode: {
            500: function (response) {
               $("#myprofile-submit-btn, #employment, #companyname, #description,#designation ,  #fieldOfStudy, #highestQualification,#NoOfJobsChange,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").show();
               $("#myprofile-edit-btn").hide();
            }
         },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function loadfinancialDetails(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  id = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
   //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/getfinancialDetails/"+id+"";


if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/getfinancialDetails/"+id+"";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/getfinancialDetails/"+id+"";

}

    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
      // console.log(data);

     if(data.monthlyEmi == null && data.creditAmount == null && data.existingLoanAmount == null && data.creditCardsRepaymentAmount == null && data.otherSourcesIncome == null&& data.netMonthlyIncome == null&& data.avgMonthlyExpenses == null){
        $("#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome, #avgmonthlyexpenses").show();
        $("#financial-edit-btn").hide();
     } else if(data.firstmonthlyEmiName != ""&& data.creditAmount!= "" && data.existingLoanAmount != "" && data.creditCardsRepaymentAmount != "" && data.otherSourcesIncome != ""&& data.netMonthlyIncome != ""&& data.avgMonthlyExpenses!= ""){
      $("#financial-edit-btn").show();
      $("#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome,#avgmonthlyexpenses").hide();

     }
     
      $("#monthlyEmi").val(data.monthlyEmi);
      //$(".displaymonthlyEmi").html(data.monthlyEmi);

      $("#creditamount").val(data.creditAmount);
      //$(".displaycreditamount").html(data.creditAmount);

      $("#existingloanamount").val(data.existingLoanAmount);
      //$(".displayexistingloanamount").html(data.existingLoanAmount);

      $("#creditcardsrepaymentamount").val(data.creditCardsRepaymentAmount);
     // $(".displaycreditcardsrepaymentamount").html(data.creditCardsRepaymentAmount);

      $("#othersourcesincome").val(data.otherSourcesIncome);
     // $(".displayothersourcesincome").html(data.otherSourcesIncome);

      $("#netmonthlyincome").val(data.netMonthlyIncome);
     // $(".displaynetmonthlyincome").html(data.netMonthlyIncome);

      $("#avgmonthlyexpenses").val(data.avgMonthlyExpenses);
     // $(".displayavgmonthlyexpenses").html(data.avgMonthlyExpenses);

      },
      statusCode: {
            500: function (response) {
      $("#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome,#avgmonthlyexpenses").show();
        $("#financial-edit-btn").hide();
            }
         },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}

function loadbankDetails(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  id = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/bankdetails/"+id+"";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/bankdetails/"+id+"";

}


  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/bankdetails/"+id+"";
    $.ajax({
      url:getStatUrl,
      type:"GET",

      success: function(data,textStatus,xhr){
       console.log(data);
       if(data.accountNumber == null && data.bankName == null && data.branchName == null && data.accountType == null && data.ifscCode == null&& data.address == null){
        $("#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address").show();
        $("#bank-edit-btn").hide();
     } else if(data.accountNumber != ""&& data.bankName!= "" && data.branchName != "" && data.accountType != "" && data.ifscCode != ""&& data.address != ""){
      $("#bank-edit-btn").show();
      $("#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address").hide();

     }
     
     $("#accountnumber").val(data.accountNumber);
      $(".displayaccountnumber").html(data.accountNumber);

      $("#bankname").val(data.bankName);
       $(".displaybankname").html(data.bankName);

      $("#branchname").val(data.branchName);
       $(".displaybranchname").html(data.branchName);

      
      //$("#accounttype option:selected").val(data.accountType);
      $("#accounttype  option[value='"+data.accountType+"']").attr('selected','selected');

       $(".displayaccounttype").html(data.accountType);

      $("#ifsccode").val(data.ifscCode);
       $(".displayifsccode").html(data.ifscCode);

      $("#address").val(data.address);
       $(".displayaddress").html(data.address);

      },
      statusCode: {
            500: function (response) {
       $("#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address").show();

        $("#bank-edit-btn").hide();
            }
         },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function loadAgreedloans(){
  $(".loadingSec").show();

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  //console.log(suserId);
  primaryType = sprimaryType;
  accessToken = saccessToken;

  fName = "lenderUserId";

      if(sprimaryType == "BORROWER"){
        fName = "borrowerUserId";
      }

 var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },
        
        "logicalOperator": "AND",
        
        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValues" : ["Agreed","Active","Closed"],
            "operator": "IN"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanAcceptedDate",
         "sortOrder" : "DESC"
      }

 var postData = JSON.stringify(postData);
console.log(postData);

 
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}

 //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
    
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",

      success: function(data,textStatus,xhr){
       console.log(data); 
        totalEntries = data.totalCount;
        if (data.results.length == 0) {
            $("#displayNoRecords").show();
        }else{
       var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayoffers').html(html);
        var displayPageNo = totalEntries/10;
       displayPageNo = displayPageNo+1;
  $('.agreedloansPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
  
 var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },
        
        "logicalOperator": "AND",
        
        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValues" : ["Agreed","Active","Closed"],
            "operator": "IN"
        },
        "page": {
          "pageNo": num,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }

 var postData = JSON.stringify(postData);
  console.log(postData);
 //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
 

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}

    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",

      success: function(data,textStatus,xhr){
       console.log(data); 
       
       var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayoffers').html(html);
     
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
     }
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
     $(".loadingSec").hide();
}

/**************************** AGREED LOAN  PAGINATION **********************/
/*setTimeout(function(){
 // alert(displayPageNo); 
  var displayPageNo = totalEntries/2;
  displayPageNo = displayPageNo+1;
  $('.agreedloansPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  //console.log(suserId);
  primaryType = sprimaryType;
  accessToken = saccessToken;
 var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Accepted",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  }
}

 var postData = JSON.stringify(postData);
console.log(postData);
 var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",

      success: function(data,textStatus,xhr){
       console.log(data); 
       
       var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayoffers').html(html);
     
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 
}, 1000);*/
/****************************AGREED LOAN  PAGINATION  ENDS**********************/



function signout(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var signoutUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/logout";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var signoutUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/logout";

}

    //var signoutUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/logout";

    $.ajax({
      url:signoutUrl,
      type:"POST",
      success: function(data,textStatus,xhr){
        writeCookie('sUserId', "");
        writeCookie('sUserType', "");
        writeCookie('saccessToken', "");
        window.location = "userlogin";
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
        window.location = "userlogin";
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",accessToken);
      }
   });
}

function userresponding(actionType, requestID){
      //$(".resptoLoanar").bind("click", function(){
        var getreactedName = actionType;
        var getreqID = requestID;
        //alert(actionType + requestID);
        $(".postreqID").attr("data-reqID", getreqID);
        $(".postreqID").attr("data-type", actionType);

        if(getreactedName == "Accepted"){
          var displayActionName = "Accept";
        }else{
           var displayActionName = "Reject";
        }
        $(".reactedName").html(displayActionName);
      //});
}


function participatedlenders(requestid) {
  //alert(1);
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
  
  /* postData= { "leftOperand": {
                    "fieldName": "parentRequestId",
                    "operator": "EQUALS",
                    "fieldValue": requestid
                },
                "logicalOperator": "AND",
                "rightOperand": {
                    "fieldName": "loanStatus",
                    "fieldValues": [
                        "Accepted",
                        "Agreed"
                    ],
                    "operator": "IN"
                },
                "page": {
                    "pageNo": 1,
                    "pageSize": 10
                
                }
            } */
      fName = "lenderUserId";

      if(sprimaryType == "BORROWER"){
        fName = "borrowerUserId";
      }
      
        var postData = {
               "leftOperand": {
                   "fieldName": "borrowerUserId",
                   "operator": "EQUALS",
                   "fieldValue": requestid
               },
               "logicalOperator": "AND",
               "rightOperand": {
                   "fieldName": "loanStatus",
                   "fieldValue": "Active",
                   "operator": "EQUALS"
               },
               "page": {
                   "pageNo": 1,
                   "pageSize": 10
               }
            }
            console.log(requestid);           
var postData = JSON.stringify(postData);
console.log(postData);
  
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}

  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
         $("#modal-participatedlenders").modal('show');
         totalEntries = data.totalCount;
        if (data.results.length == 0) {
             $(".nodata-pl").hide(); 
             //$("#displayNoRecords").show();
             $('#displayRequests').html('<tr id="displayNoRecords" class="displayRequests"><td colspan="8"><b>No LENDER found!</b></td></tr> ')
        }else{
          var template = document.getElementById('displayallparticipatedRequests').innerHTML;
       //console.log(template);
        Mustache.parse(template);
        var html = Mustache.render(template, data);
        var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayRequests').html(html);
     }
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });
}



function searchLoanlenderEntries(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  console.log('in search function');
  var userSelecctedOption = $('.choosenType').val();
  console.log("User selected "+userSelecctedOption);
  var minamtValue = $(".minAmount").val();
  var maxamtValue = $(".maxAmount").val();

  console.log(minamtValue  +" "+ maxamtValue);

  var minRoi = $(".minRoi").val();
  var maxRoi = $(".maxRoi").val();

  console.log(minRoi  +" "+ maxRoi);  

  var borrowerID = $(".borrowerID").val();
  console.log("borrowerID : "+ borrowerID);

  borrowerID = borrowerID.substr(2);

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
  if(primaryType == "LENDER"){
     var  fieldValueforSearch = "BORROWER";
  }else{
     var  fieldValueforSearch = "LENDER";
  }


if(userSelecctedOption == "amount"){
  var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
           "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue": minamtValue,
            "operator": "GTE"
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "fieldName": "loanRequestAmount",
                "fieldValue": maxamtValue,
                "operator": "LTE"
            }
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": 1,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
}else if (userSelecctedOption == "borrowerID"){
    
var postData =  { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerID,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.status",
                "fieldValue":"ACTIVE",
                "operator":"EQUALS"
              }
            },
            "logicalOperator":"AND",
            "rightOperand":{
              "leftOperand":{
                "fieldName":"parentRequestId",
                "operator":"NULL"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"loanOfferedAmount.loanOfferdStatus",
                "fieldValue":"LOANOFFERACCEPTED",
                "operator":"EQUALS"
              }
            },
            "page":{
              "pageNo":1,
              "pageSize":10
            },
            "sortBy":"loanRequestedDate",
            "sortOrder":"DESC"
          }



    /*var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
          "fieldName": "userId",
          "fieldValue": borrowerID,
          "operator": "EQUALS"
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": 1,
         "pageSize":40
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };*/
}else{
    var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
           "leftOperand": {
              "fieldName": "rateOfInterest",
              "fieldValue": minRoi,
              "operator": "GTE"
          },
          "logicalOperator": "AND",
          "rightOperand": {
              "fieldName": "rateOfInterest",
              "fieldValue": maxRoi,
              "operator": "LTE"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": 1,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
}


  var postData = JSON.stringify(postData);
  console.log(postData);
 

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


  //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
        console.log(totalEntries);
       //  $(".nodata-pl").hide();
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $("#loadborrowerloanListings").html("");
       $(".lenderLoanListingsPagination").hide();
       $('.searchPagination').show();
       $('#loadborrowerloanListings').html(html);

       var displayPageNo = totalEntries/9;
        displayPageNo = displayPageNo+1;
        $('.searchPagination').bootpag({
            total: displayPageNo,
            page: 1,
            maxVisible: 5,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num){
            //$(".content4").html("Page " + num); // or some ajax content loading...
          
          if(primaryType == "LENDER"){
             var  fieldValueforSearch = "BORROWER";
          }else{
             var  fieldValueforSearch = "LENDER";
          }
       
        if(userSelecctedOption == "amount"){
  var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
           "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue": minamtValue,
            "operator": "GTE"
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "fieldName": "loanRequestAmount",
                "fieldValue": maxamtValue,
                "operator": "LTE"
            }
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": num,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
}else if (userSelecctedOption == "borrowerID"){
    
var postData =  { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerID,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.status",
                "fieldValue":"ACTIVE",
                "operator":"EQUALS"
              }
            },
            "logicalOperator":"AND",
            "rightOperand":{
              "leftOperand":{
                "fieldName":"parentRequestId",
                "operator":"NULL"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"loanOfferedAmount.loanOfferdStatus",
                "fieldValue":"LOANOFFERACCEPTED",
                "operator":"EQUALS"
              }
            },
            "page":{
              "pageNo":num,
              "pageSize":10
            },
            "sortBy":"loanRequestedDate",
            "sortOrder":"DESC"
          }



    /*var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
          "fieldName": "userId",
          "fieldValue": borrowerID,
          "operator": "EQUALS"
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": 1,
         "pageSize":40
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };*/
}else{
    var postData =  {
     "leftOperand": {
      "leftOperand": {
         "fieldName": "userPrimaryType",
         "fieldValue": fieldValueforSearch,
         "operator": "EQUALS"
       },
       "logicalOperator": "AND",
       "rightOperand": {
           "fieldName": "user.status",
           "fieldValue": "ACTIVE",
           "operator": "EQUALS"
       }

     },
     "logicalOperator": "AND",
     "rightOperand": {
        "leftOperand": {
           "leftOperand": {
              "fieldName": "rateOfInterest",
              "fieldValue": minRoi,
              "operator": "GTE"
          },
          "logicalOperator": "AND",
          "rightOperand": {
              "fieldName": "rateOfInterest",
              "fieldValue": maxRoi,
              "operator": "LTE"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
           "leftOperand": {
             "fieldName": "parentRequestId",
             "operator": "NULL"
           },
           "logicalOperator": "AND",
           "rightOperand": {
               "fieldName": "user.emailVerified",
               "fieldValue": "true",
               "operator": "EQUALS"
           }
         }
     },
     "page": {
         "pageNo": num,
         "pageSize":9
     },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  };
}
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
     
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
         var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
         //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
          $.ajax({
            url:getStatUrl,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loanListiongsTpl').innerHTML; 
             Mustache.parse(template);
             var html = Mustache.to_html(template, {data: data.results});
             
             $('#loadborrowerloanListings').html(html);
            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
         });
        });
    
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });

}

function searchborrowerLoanEntries(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  console.log('in search function');
  var userSelecctedOption = $('.choosenType').val();
  console.log("User selected "+userSelecctedOption);
  var minamtValue = $(".minAmount").val();
  var maxamtValue = $(".maxAmount").val();

  console.log(minamtValue  +" "+ maxamtValue);

  var minRoi = $(".minRoi").val();
  var maxRoi = $(".maxRoi").val();

  console.log(minRoi  +" "+ maxRoi);  

  var userSearchID = $(".searchWithIDinput").val();
  userSearchID = userSearchID.substr(2);
  // alert(userSearchID);

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
  if(primaryType == "LENDER"){
     var  fieldValueforSearch = "BORROWER";
  }else{
     var  fieldValueforSearch = "LENDER";
  }

if(userSelecctedOption == "amount"){
  var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": fieldValueforSearch
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue": minamtValue,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue": maxamtValue,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize":9
    }
  }
}else if (userSelecctedOption == "searchWithID"){  
  var postData = {
	  "leftOperand":
	{
	  "leftOperand":
     {
		 "fieldName":"userPrimaryType",
		 "operator":"EQUALS",
		 "fieldValue":fieldValueforSearch
	},
   "logicalOperator":"AND",
   "rightOperand":{
	   "fieldName":"userId",
	   "fieldValue":userSearchID,
	   "operator":"EQUALS"}
	 },
   "logicalOperator":"AND",
    "rightOperand":
	{
	"fieldName":"parentRequestId",
	"operator":"NULL"
	},
	"page":{"pageNo":1,"pageSize":100}}
  
}else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": fieldValueforSearch
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue": minRoi,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue": maxRoi,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 9
    }
  }
}


  var postData = JSON.stringify(postData);
  console.log(postData);
 
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
  //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
        console.log(totalEntries);
       //  $(".nodata-pl").hide();
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $("#loadloanListings").html("");
       $(".borrowerLoanListingsPagination").hide();
       $('.searchborrowerPagination').show();
       $('#loadloanListings').html(html);

       var displayPageNo = totalEntries/9;
        displayPageNo = displayPageNo+1;
        $('.searchborrowerPagination').bootpag({
            total: displayPageNo,
            page: 1,
            maxVisible: 5,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num){
            //$(".content4").html("Page " + num); // or some ajax content loading...
          
          if(primaryType == "LENDER"){
             var  fieldValueforSearch = "BORROWER";
          }else{
             var  fieldValueforSearch = "LENDER";
          }
       
        if(userSelecctedOption == "amount"){
          var postData = {
            "leftOperand": {
                "fieldName": "userPrimaryType",
                "operator": "EQUALS",
                "fieldValue": fieldValueforSearch
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "leftOperand": {
                    "fieldName": "loanRequestAmount",
                    "fieldValue": minamtValue,
                    "operator": "GTE"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                    "fieldName": "loanRequestAmount",
                    "fieldValue": maxamtValue,
                    "operator": "LTE"
                }
            },
            "page": {
                "pageNo": num,
                "pageSize":9
            }
          }
        }else{
           var postData = {
            "leftOperand": {
                "fieldName": "userPrimaryType",
                "operator": "EQUALS",
                "fieldValue": fieldValueforSearch
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "leftOperand": {
                    "fieldName": "rateOfInterest",
                    "fieldValue": minRoi,
                    "operator": "GTE"
                },
                "logicalOperator": "AND",
                "rightOperand": {
                    "fieldName": "rateOfInterest",
                    "fieldValue": maxRoi,
                    "operator": "LTE"
                }
            },
            "page": {
                "pageNo": num,
                "pageSize":9
            }
          }
        }
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
       
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
         var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
       //  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
          $.ajax({
            url:getStatUrl,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loanListiongsTpl').innerHTML; 
             Mustache.parse(template);
             var html = Mustache.to_html(template, {data: data.results});
             
             $('#loadloanListings ').html(html);
            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
         });
        });
    
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });

}







function downloadProfilePic(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");


if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
 var getProfilePic = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PROFILEPIC";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var getProfilePic = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PROFILEPIC";

}


 //var getProfilePic = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PROFILEPIC";

 $.ajax({
    url:getProfilePic,
    type:"GET",
    success: function(data,textStatus,xhr){
     console.log(data);
     if(data.downloadUrl != ""){
        $(".userPicArea, .user-header img, .dropdown-toggle img").attr("src", data.downloadUrl);
        
     }
  },
    error: function(xhr,textStatus,errorThrown){
      console.log('Error Something');
    },
    beforeSend: function(xhr) {
      xhr.setRequestHeader("accessToken", saccessToken);
   }
 });
}

function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    var byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ia], {type:mimeString});
}

function readProfilePicture(input) {
 console.log("entering into function");
 var reader = new FileReader();
 var blob = dataURItoBlob(input);
 console.log(blob);
 var fd = new FormData();
 fd.append('PROFILEPIC',blob);

   console.log(fd);
   var actionURL = $("#userPICUpload").attr("action");

   
   //alert(fd);
   //return false;
   $.ajax({
       url: actionURL,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
           if(data != 0){
             // alert("image uploaded");
             $(".displayCropSection").hide("slow");
             window.location.reload();
           }else{
             alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       console.log('Error Something');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }

   });
  }




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

/*
function esignDone(loanRequestIDFromElement){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/uploadAgreement";
   
    var postData ={"Agreement":"esigned agreement file"};
    var postData = JSON.stringify(postData); 
    
    $.ajax({
      url:esignAgree,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#modal-agreement").modal("show");
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


*/

/*
function esignDone(loanRequestIDFromElement){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/uploadAgreement";
   
    $.ajax({
      url:esignAgree,
      type:"POST",
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#modal-agreement").modal("show");
      } ,
      statusCode : {
        400: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.responseJSON.errorMessage);
            var errorMessage =   jqXHR.responseJSON.errorMessage;
            if(errorMessage == "You had esigned this document already"){
              var placeerrorHTMLCode = "You've already completed esign with this agreement.";  
            }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
              var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
            }
            

            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");                   
        },
      500: function (jqXHR, textStatus, errorThrown) {
          var placeerrorHTMLCode = "Internal Server Error";
          $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
          $("#modal-agreement-already").modal("show");  
      }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}
*/

function signatureisDone(loanIDFromEsign){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  //var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";
  if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var esignAgree = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";

} 
    $.ajax({
      url:esignAgree,
      type:"POST",
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#modal-agreement").modal("show");
      } ,
      statusCode : {
        400: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.responseJSON.errorMessage);
            var errorMessage =   jqXHR.responseJSON.errorMessage;
            if(errorMessage == "You had esigned this document already"){
              var placeerrorHTMLCode = "You've already completed esign with this agreement.";  
            }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
              var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
            }
            

            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");                   
        },
      500: function (jqXHR, textStatus, errorThrown) {
          var placeerrorHTMLCode = "Internal Server Error";
          $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
          $("#modal-agreement-already").modal("show");  
      }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}

function esignDone(loanRequestIDFromElement){
  console.log("user clicked");
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  
  if(userisIn == "local"){
    var esignAgree =   "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/esign";
  }else{
    var esignAgree =   "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/esign";
  }

  loanIDFromEsign = loanRequestIDFromElement;
  $.ajax({
      url:esignAgree,
      type:"POST",
      contentType:"application/json",
      success: function(data,textStatus,xhr){
        console.log(data);
        eSignTransactionID = data.id;
        console.log(eSignTransactionID);
        openGateway(eSignTransactionID);
        //$("#modal-agreement").modal("show");
      } ,
      statusCode : {
        400: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.responseJSON.errorMessage);
            var errorMessage =   jqXHR.responseJSON.errorMessage;
            if(errorMessage == "You had esigned this document already"){
              var placeerrorHTMLCode = "You've already completed esign with this agreement.";  
            }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
              var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
            }
            

            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");                   
        },
      500: function (jqXHR, textStatus, errorThrown) {
          var placeerrorHTMLCode = "Internal Server Error";
          $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
          $("#modal-agreement-already").modal("show");  
      }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}



function esignDoneMobile(loanRequestIDFromElement){
  console.log("user clicked");
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  
  if(userisIn == "local"){
    var esignAgree =   "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/esign";
  }else{
    var esignAgree =   "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanRequestIDFromElement+"/esign";
  }

 loanIDFromEsign = loanRequestIDFromElement;
 var postData={ "eSignType":"MOBILE" };
 var postData = JSON.stringify(postData);
 console.log(postData);
 $('.loanRequestId').val(loanRequestIDFromElement);

  $.ajax({
      url:esignAgree,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        eSignTransactionID = data.id;
        console.log(eSignTransactionID);

        // openGateway(eSignTransactionID);
        $("#modal-mobile-otp").modal("show");
      } ,
      statusCode : {
        400: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.responseJSON.errorMessage);
            var errorMessage =   jqXHR.responseJSON.errorMessage;
            if(errorMessage == "You had esigned this document already"){
              var placeerrorHTMLCode = "You've already completed esign with this agreement.";  
            }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
              var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
            }
            

            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");                   
        },
      500: function (jqXHR, textStatus, errorThrown) {
          var placeerrorHTMLCode = "Internal Server Error";
          $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
          $("#modal-agreement-already").modal("show");  
      }
     },
      error: function(xhr,textStatus,errorThrown){
        //console.log('Error Something');
         console.log(arguments);
         if(arguments[0].responseJSON.errorCode==114){
              $("#modal-loanNotAppoved").modal('show');
             }
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}


function submitOTPeSign(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  loanIDFromEsign = $('.loanRequestId').val();
var enteredOtp = $(".otpValue").val();
 enteredOtp = enteredOtp.trim();
//var checkbox_val = $('.agreeCheckBox').val();
var checkbox_val = document.getElementById("agreeCheckBox").checked;


//var enteredCheckbox=$('input[name=checkbox]:checked').val();
   //alert(enteredOtp);
   //alert(checkbox_val);

   //console.log(enteredOtp);  
   console.log(checkbox_val);
  var isOTPerrmsgs = true;
  
  if(enteredOtp == ""){
    $('.displayOTPError').show();
     isOTPerrmsgs =  false;
  }else{
     $('.displayOTPError').hide();
  }

  if((checkbox_val == false)){
    $('.displayOTPTermsError').show();
     isOTPerrmsgs = false;
  }else{
     $('.displayOTPTermsError').hide();
  }

  

if(isOTPerrmsgs == true){


  if(userisIn == "local"){
  var esignAgree = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";
  }else{
    var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";

  } 







var postData={ "eSignType":"MOBILE","otpValue":enteredOtp };
 var postData = JSON.stringify(postData);
 console.log(postData);

    $.ajax({
      url:esignAgree,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#modal-agreement").modal("show");
        $("#modal-mobile-otp").modal("hide");
      } ,
      statusCode : {
        400: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.responseJSON.errorMessage);
            var errorMessage =   jqXHR.responseJSON.errorMessage;
            if(errorMessage == "You had esigned this document already"){
              var placeerrorHTMLCode = "You've already completed esign with this agreement.";  
            }else if(errorMessage == "Lender has to esign first before you esign. Please contact support"){
              var placeerrorHTMLCode = "Your lender has to esign First, We will let you once he is done with his eSign.";  
            }
            

            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");                   
        },
      500: function (jqXHR, textStatus, errorThrown) {
          var placeerrorHTMLCode = "Internal Server Error";
          $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
          $("#modal-agreement-already").modal("show");  
      }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
  }
  return isOTPerrmsgs;
}



$(".updateProfile-OnLoad").click(function(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  if(personalDetailsFilled == false){
    if(sprimaryType == "LENDER"){
      window.location = "lenderpersonalinfo";
    }else{
      window.location = "borrowerpersonalinfo";
    } 
  }
  
});

function loadLoading(){
    $(".loadingSec").show();

}

function stopLoading(){
    $(".loadingSec").hide();
}


function loadAllRequests(){
  loadLoading();
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
  var postData={
        "fieldName": "parentRequestId",
        "fieldValue" : globalLoanId,
        "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanRequestedDate",
         "sortOrder" : "DESC"
        }

    var postData = JSON.stringify(postData);
    console.log(postData);
     
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

     //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            $(".title-requested").html("Requests received from the borrowers");
            $(".offersSentLender").show();
            $(".requestsReceived").hide();
            console.log(data);
            totalEntries = data.totalCount;
            console.log(data.results);
            if (data.results.length == 0) {
                $("#displayNoRecords").show();
            }else{
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRequests').html(html);
                var displayPageNo = totalEntries/9;
          displayPageNo = displayPageNo+1;
          $('.acceptedPagination').bootpag({
              total: displayPageNo,
              page: 1,
              maxVisible: 5,
              leaps: true,
              firstLastUse: true,
              first: '←',
              last: '→',
              wrapClass: 'pagination',
              activeClass: 'active',
              disabledClass: 'disabled',
              nextClass: 'next',
              prevClass: 'prev',
              lastClass: 'last',
              firstClass: 'first'
          }).on("page", function(event, num){
          //$(".content4").html("Page " + num); // or some ajax content loading...
         
        var postData={
          "fieldName": "parentRequestId",
          "fieldValue" : globalLoanId,
          "operator": "EQUALS",
          "page": {
              "pageNo": num,
              "pageSize": 10
            },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        }


     var postData = JSON.stringify(postData);
    console.log(postData);
     //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

        
      if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
        
            console.log(data.results);
            
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRequests').html(html);
           
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
      }); 
           }
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });  
  stopLoading();
}

// loadLenderRequestsSent
function loadRequestsSent(){
  loadLoading();
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
  var postData={
        "leftOperand": {
          "fieldName": "userId",
          "fieldValue": userId,
          "operator": "EQUALS"
        },
        
        "logicalOperator": "AND",
        
        "rightOperand": {
            "fieldName": "parentRequest.userId",
            "operator": "NOT_NULL"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanRequestedDate",
         "sortOrder" : "DESC"
      }



    var postData = JSON.stringify(postData);
    console.log(postData);
     //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
       
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}


        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            $(".title-requested").html("Offers Sent to the Borrowers");
            $(".offersSentLender").hide();
            $(".requestsReceived").show();
            console.log(data);
            totalEntries = data.totalCount;
            //alert(data.totalCount);
            if (data.results.length == 0) {
                $("#displayNoRecords").show();
            }else{
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRequests').html(html);
                var displayPageNo = totalEntries/10;
                displayPageNo = displayPageNo+1;
                //alert(displayPageNo);
                $('.acceptedPagination').bootpag({
                    total: displayPageNo,
                    page: 1,
                    maxVisible: 5,
                    leaps: true,
                    firstLastUse: true,
                    first: '←',
                    last: '→',
                    wrapClass: 'pagination',
                    activeClass: 'active',
                    disabledClass: 'disabled',
                    nextClass: 'next',
                    prevClass: 'prev',
                    lastClass: 'last',
                    firstClass: 'first'
                }).on("page", function(event, num){
                //$(".content4").html("Page " + num); // or some ajax content loading...
         
        var postData={
            "leftOperand": {
              "fieldName": "userId",
              "fieldValue": userId,
              "operator": "EQUALS"
            },
            
            "logicalOperator": "AND",
            
            "rightOperand": {
                "fieldName": "parentRequest.userId",
                "operator": "NOT_NULL"
            },
            "page": {
              "pageNo": num,
              "pageSize": 10
            },
             "sortBy":"loanRequestedDate",
             "sortOrder" : "DESC"
          }


     var postData = JSON.stringify(postData);
    console.log(postData);
     //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

        if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}
      

        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
        
            console.log(data.results);
            
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRequests').html(html);
           
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
      }); 
           }
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });  
  stopLoading();
}



function loadActiveLoans(){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
 // fName = "lenderUserId";

  if(sprimaryType == "BORROWER"){
    fName = "borrowerUserId";
  }else{
    fName = "lenderUserId";
  }
  //alert(fName);
  /*var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },
        
        "logicalOperator": "AND",
        
        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue" : "Active",
            "operator": "EQUALS"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/

      var postData ={
        "leftOperand":{
          "fieldName":fName,
          "fieldValue":userId,
          "operator":"EQUALS"
        },
        "logicalOperator":"AND",
        "rightOperand":{
          "leftOperand":{
            "fieldName":"borrowerDisbursedDate",
            "operator":"NOT_NULL"
          },
          "logicalOperator":"AND",
          "rightOperand":{
            "fieldName":"loanStatus",
            "fieldValue":"Active",
            "operator":"EQUALS"
          }
        },
        "page":{
          "pageNo":1,
          "pageSize":10
        },
        "sortBy":"loanActiveDate",
        "sortOrder":"DESC"
      }

    var postData = JSON.stringify(postData);
    console.log(postData);
     //var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
       
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}


        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
            totalEntries = data.totalCount;
            console.log(data.results);
            if (data.results.length == 0) {
                $("#displayNoRecords").show();
            }else{
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
            $('#displayRequests').html(html);
            var displayPageNo = totalEntries/9;
            displayPageNo = displayPageNo+1;
          $('.acceptedPagination').bootpag({
              total: displayPageNo,
              page: 1,
              maxVisible: 5,
              leaps: true,
              firstLastUse: true,
              first: '←',
              last: '→',
              wrapClass: 'pagination',
              activeClass: 'active',
              disabledClass: 'disabled',
              nextClass: 'next',
              prevClass: 'prev',
              lastClass: 'last',
              firstClass: 'first'
          }).on("page", function(event, num){
          //$(".content4").html("Page " + num); // or some ajax content loading...
         
       /* var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },
        
        "logicalOperator": "AND",
        
        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue" : "Active",
            "operator": "EQUALS"
        },
        "page": {
          "pageNo": num,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/

      var postData ={
        "leftOperand":{
          "fieldName":fName,
          "fieldValue":userId,
          "operator":"EQUALS"
        },
        "logicalOperator":"AND",
        "rightOperand":{
          "leftOperand":{
            "fieldName":"borrowerDisbursedDate",
            "operator":"NOT_NULL"
          },
          "logicalOperator":"AND",
          "rightOperand":{
            "fieldName":"loanStatus",
            "fieldValue":"Active",
            "operator":"EQUALS"
          }
        },
        "page":{
          "pageNo":1,
          "pageSize":10
        },
        "sortBy":"loanActiveDate",
        "sortOrder":"DESC"
      }


     var postData = JSON.stringify(postData);
    console.log(postData);
    // var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

        
      if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

}

        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
        
            console.log(data.results);
            
               var template = document.getElementById('displayallRequests').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRequests').html(html);
           
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
      }); 
           }
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });  
  $(".loadingSec").hide();
}

function downloadAgreement(requestID){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    //console.log(suserId);
    primaryType = sprimaryType;
    accessToken = saccessToken;
    //var requestID = $(this).attr("data-reqid");
    //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+requestID+"/download";
      //alert(getStatUrl);
     if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+requestID+"/download";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+requestID+"/download";

}


      $.ajax({
        url:getStatUrl,
        type:"GET",

        success: function(data,textStatus,xhr){
          console.log(data);
          window.open(data.downloadUrl,'_blank');
           $('#modal-agreement').modal('show');
         },
        statusCode : {
            500: function (jqXHR, textStatus, errorThrown) {
            var placeerrorHTMLCode = "Internal Server Error";
            $("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
            $("#modal-agreement-already").modal("show");  
          }
        }, 
        error: function(xhr,textStatus,errorThrown){
          console.log('Error Something');
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken", accessToken ); 
        } 
     });
}


$(document).ready(function() {
  

  setTimeout(function(){
     $('.sendActivationLink').click( function() {
       suserId = getCookie("sUserId");
       sprimaryType = getCookie("sUserType");
       saccessToken = getCookie("saccessToken");
       //window.location = "borrowerraisealoanrequest"
      var userEmail = $(this).attr("data-email"); 
      var postData = {"email": userEmail };
      var postData = JSON.stringify(postData);
      var transedEmail = userEmail;
      var transedEmailLength =  transedEmail.length;
      console.log(transedEmailLength);
      transedEmail =  userEmail.replace(transedEmail.slice(4,-4), "*".repeat(transedEmailLength - 2));      // console.log(postData);
      //alert(transedEmail);
     /// return false;

       regUrl = baseUrl+"v1/user/resetpassword";
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function(data){
               //$("#modal-resetSuccess").modal('show');
               $("#emailMessage #inner-message").html("We've sent an activation link to your email. i.e "+ transedEmail)
              console.log(data);
             },
             statusCode: {
                 400: function (response) {
                   //alert('1');
                   $("#modal-resetpasswordError").modal("show");
                   //bootbox.alert('<span style="color:Red;">Error While Saving Outage Entry Please Check</span>', function () { });
                },
              }
           });

     });
  }, 2000);

});      


function transformEntry(item, type) {
    switch (type) {
        case 'email':
            var parts = item.split("@"), len = parts[0].length;
            return email.replace(parts[0].slice(1,-1), "*".repeat(len - 2));
        case 'phone':
            return item[0] + "*".repeat(item.length - 4) + item.slice(-3);
       default: 
            throw new Error("Undefined type: " + type);
    }        
}


/*
###########################################################################
########################## ESIGN SETUP BEGIN ##############################
################### Keep this code for ESIGN application ##################
###########################################################################
*/

    //Setup gateway
    let gatewayOptions = {
        company_display_name: 'OxyLoans',
        front_text_color: 'FFFFFF',
        background_color: '2C3E50',
        logo_url: 'http://182.18.139.198/FEOxyLoans/assets/images/squre.jpg',
        otp_allowed: 'y',
        fingerprint_allowed: 'n',
        iris_allowed: 'n',
        phone_auth: 'y',
        draggable_sign : 'n',
        google_sign: 'n'
    };

    //Generate gateway transaction at backend via rest API call. [Requires AGENCY ID & API KEY]
    // --on scuccess pass <<gateway transaction id>> below

    // document.getElementById("gatewayBtn").onclick = openGateway;

    //open gateway
    /* function openGateway(eSignTransactionID) {
      console.log('im at openGateway function')
        //create new gateway transaction
        let myAadhaarEsignGateway = new AadhaarAPIEsignGateway(eSignTransactionID, gatewayOptions,
       );
        openAadhaarGateway(myAadhaarEsignGateway);
    } */

    /************************************************
     *  Handler functions for different scenarios   *
     ************************************************/

    function handleEsignConsentDenied() {
        console.log('Handling consent denial at client end');
        //Handle the case when user denies consent
    }

    function handleAadhaarEsignSuccess(responseJSON) {
        signatureisDone(loanIDFromEsign);
        console.log('Handling EKYC Success at client end');
    }

    function handleAadhaarEsignFailure(errorJSON) {
        console.log('Handling EKYC failure at client end');
        //console.log(errorJSON);
        //Handle the case when esign fails
    }

    function handleAadhaarOTPFailure(errorJSON){
        console.log('Handling OTP failure cases at client end');
        //handle case when login OTP fails
    }

    function handleGatewayError(errorJSON) {
        console.log('Handling Gateway launch failure at client end');
        //console.log(errorJSON);
    }

    function handleGatewayTermination() {
        //Do not remove this function, even if not used.
        console.log('Handling Gateway Termination at client end');
    }

/*
###########################################################################
########################## ESIGN SETUP ENDS ###############################
################### Keep this code for ESIGN application ##################
###########################################################################
*/

function resetPassword(){
  var email = $('.email-user').html();
  console.log(email);
  regUrl = baseUrl+"v1/user/resetpassword";

  var postData = {"email":email};
  var postData = JSON.stringify(postData);
  console.log(postData);

  $.ajax({
      url: regUrl,
      type:"POST",
      data: postData,
      contentType: "application/json",
      dataType: "json",
      success: function(data){
         $("#modal-resetSuccess .modal-body").html("We've sent an email to reset password. You will be logged out from the application in next 3 sec. Please check your email.");
         $("#modal-resetSuccess").modal('show');
         
         setTimeout(function(){ 
            signout();
            //$(".modal").hide();
                  
        }, 4000);
        console.log(data);
        
       },
       statusCode: {
           400: function (response) {
             //alert('1');
             $("#modal-resetpasswordError").modal("show");
             //bootbox.alert('<span style="color:Red;">Error While Saving Outage Entry Please Check</span>', function () { });
          },
        }
     });
}


function getTokenforeNach(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");
 if(userisIn == "local"){
    var getTokenUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/enach";
  }else{
    var getTokenUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/enach";
  }
  $.ajax({
  url:getTokenUrl,
  type:"GET",
  success: function(data,textStatus,xhr){
   //console.log(data);
   tokenforeNach = data.token;
   //tokenforeNach  = tokenforeNach.toUpperCase();
   console.log(txnIdforeNACH);
   txnIdforeNACH = data.txnId;
   //alert(tokenforeNach);
   $("#btnSubmit").trigger("click");

  },
  error: function(xhr,textStatus,errorThrown){
    console.log('Error Something');
  },
  beforeSend: function(xhr) {
    xhr.setRequestHeader("accessToken", saccessToken); 
  } 
});
}

function posteMandateResponse(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");
 if(userisIn == "local"){
    var posteMandateResponseCall = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/merchant/ICICI/response";
  }else{
    var posteMandateResponseCall = "https://fintech.oxyloans.com/oxyloans/v1/merchant/ICICI/response";
  }
  $.ajax({
    url:posteMandateResponseCall,
    success: function(data,textStatus,xhr){

    },
    error: function(xhr,textStatus,errorThrown){
      console.log('Error Something');
    },
    beforeSend: function(xhr) {
      xhr.setRequestHeader("accessToken", saccessToken); 
    } 
  });
}


function viewEMICARD(){
  //alert(1);
$('.viewEMIcard').click( function() {
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    primaryType = sprimaryType;
    saccessToken = getCookie("saccessToken");
    var getLoanId = $(this).attr("data-loanid");
    if(userisIn == "local"){
        var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/"+getLoanId+"/emicard";
    }else{
        var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+primaryType+"/"+getLoanId+"/emicard";
    }
    $.ajax({
      url:updateEmiUrlCard,
      type:"GET",
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        //alert(data);
        console.log(data);
        var template = document.getElementById('emiRecordsCallTpl').innerHTML;
       //console.log(template);
        Mustache.parse(template);
       //var html = Mustache.render(template, data);
      

       var html = Mustache.to_html(template, {data: data.results});
       $('#displayEMIRecords').html(html);

        $("#modal-viewEMI").modal("show");
        $(".emiStatustrue").attr("disabled", "disabled");

      } ,
      statusCode : {
        400: function (response) {
            $("#modal-agreement-already").modal("show");                   
        }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
});
}



$(document).ready(function() {

  $('.getscore-btn').click( function() {
window.location.href="creditReportInfo";
 });


$('.updateCity').click( function() {
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
   
    var updatedCity=$(".cityCheck").val();

  if(userisIn == "local"){
        var updateCity = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/city";
    }else{
        var updateCity = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/city";
    }
  var postData ={
    "city":updatedCity
  }  
  var postData = JSON.stringify(postData);
 console.log(postData);


    $.ajax({
      url:updateCity,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
          $("#modal-checkCity").modal("hide");
      } ,
     
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });

});
});

/*function checkOutstandingAmount(loanId,lenderoutstandingamt){	
    var borroweroutstandingamt=$('.loanAmountPending').text();	
	borroweroutstandingamt = parseInt(borroweroutstandingamt);
	
  if(borroweroutstandingamt<=0){
		  $("#modal-checkOutstandingAmount").modal("show");
   // alert("Reached maximum limit. Please click here to  increase loan amount.");
	}
	else if(lenderoutstandingamt>0){	
	window.location.href="borrowerviewloanoffer?loanid="+loanId;
	}else{
          $("#modal-checkmaxAmount").modal("show");

		//alert("this lender reached his maximum amount to lend . Please select another lender");
	}


}*/


 



function loadpersonalDetailsforCreditReport(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    $(".displayFormElements").hide();
    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
     
  if(userisIn == "local"){
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+id+"";

  }else if(userisIn == "prod"){
  // https://fintech.oxyloans.com/oxyloans/
     var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";

  }else{
       var getStatUrl = "http://10.10.10.78:8181/v1/user/personal/"+id+"";

  }


    // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
      $.ajax({
        url:getStatUrl,
        type:"GET",
        success: function(data,textStatus,xhr){
         console.log("data",data);
       if(data.firstName == null && data.lastName == null && data.fatherName == null && data.dob == null && data.address == null && data.nationality == null&& data.gender == null&& data.maritalStatus == null){
          $("#profile-submit-btn, #firstname, #lastname, #fathername,#address, .date, #nationality, .genderInfo, .maritalStatusInfo").show();
          $("#profile-edit-btn").hide();
       } else if(data.firstName != "" && data.lastName!= "" && data.fatherName != "" && data.dob != "" && data.address!= "" && data.nationality != ""&& data.gender != ""&& data.maritalStatus!= ""){
          $("#profile-edit-btn").show();
          $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo").show();
       } else if (data.firstName != "" && data.address == ""){
          $("#profile-edit-btn").show();
          $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo").hide();
       }

       $("#firstname").val(data.firstName);  	  
	   $("#lastname").val(data.lastName);
       $("#mobile-2").val(data.mobileNumber);
       $("#email").val(data.email);       
       $("#pincode").val(data.pinCode);
	   $("#city").val(data.city);	
	   $("#dateofbirthCR").val(data.dob);
	  // $("#residentaddress").val(data.address);
       $("#panNumber").val(data.panNumber);   
          if(data.gender == "M" || data.gender == "Male"){
			$("#genderRadioMale").prop("checked", true);           
          }else if(data.gender == "F" || data.gender == "Female"){
            $("#genderRadioFeMale").prop("checked", true); 
          }
		
	  },
        error: function(xhr,textStatus,errorThrown){
          console.log('Error Something');
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken",saccessToken);
  }
   });
}

/*Experian call*/






/*Credit Report JS*/

 $(document).ready(function () {
  $('#chooseValue').on('change', function() {
    if($('#chooseValue').val() == 'passport') {
         $(".passport").show();
          $('.voterid, .aadhaar,.driverlicense').hide(); 
    } else if($('#chooseValue').val() == 'voterid'){
        $('.passport, .aadhaar,.driverlicense').hide();
        $(".voterid").show();
    } else if($('#chooseValue').val() == 'aadhaar'){
        $('.passport, .voterid,.driverlicense').hide();
        $(".aadhaar").show();
    }else if($('#chooseValue').val() == 'driverlicense'){
        $('.passport, .voterid,.aadhaar').hide();
        $(".driverlicense").show();
    } else {
        $('.passport, .voterid,.aadhaar,.driverlicense').hide();
    } 
});

 
$('#back-credit-report').click(function(){
window.location = "creditReportInfo";
 });


$('.termAndconditions').click(function(){
 $("#modal-termsSuccesss").modal("show");
 });


$('#decline-btn').click(function(){
window.location = "borrowerDashboard";
 });
 
$('#getcredireportbtn').click(function(){               
   $("#experianerrormessage").text("");  
   suserId = getCookie("sUserId");
   sprimaryType = getCookie("sUserType");
   saccessToken = getCookie("saccessToken");

         var firstname= $("#firstname").val();
         var middleName= "";
         var surName = $("#lastname").val();
         var mobileNo = $("#mobile-2").val();
         var email = $("#email").val();
         var pan = $("#panNumber").val();
         var gender= $("input[name='gender']:checked").val(); ;
         var dateOfBirth =$("#dateofbirthCR").val();
         var flatno= $("#residentaddress").val();
         var city = $("#city").val();
         var reason = "to get credit score for loan";
         var telephoneNo = "";
         var passport = "";
         var voterid= "";
         var aadhaar = "";
         var driverlicense = "";
         var state = "28";
         var pincode= $("#pincode").val();
		 var terms=$("input[type='checkbox'][name='acceptTerms']:checked").val();
	     var isValid = true;

		 if(terms == undefined){
		   $(".termsError").show();
		   isValid = false;
    	   }else{
	        $(".termsError").hide();
					
		 }
        if(firstname.length==0){
		   $(".firstnameError").show();
		   isValid = false;
    	   }else{
	        $(".firstnameError").hide();
					
		 }	
		if(surName.length==0){
				   $(".lastnameError").show();
				   isValid = false;
				   }else{
					$(".lastnameError").hide();
							
				 }	
		if(mobileNo.length==0){
				   $(".mobile-2Error").show();
				   isValid = false;
				   }else{
					$(".mobile-2Error").hide();
							
				 }			 
		if(email.length==0){
				   $(".emailError").show();
				   isValid = false;
				   }else{
					$(".emailError").hide();
							
				 }		
		if(pan.length==0){
				   $(".panNumberError").show();
				   isValid = false;
				   }else{
					$(".panNumberError").hide();
							
				 }	
		if(dateOfBirth.length==0){
				   $(".dateofbirthCRError").show();
				   isValid = false;
				   }else{
					$(".dateofbirthCRError").hide();
							
				 }	
		if(flatno.length==0){
				   $(".flatnoError").show();
				   isValid = false;
				   }else{
					$(".flatnoError").hide();
							
				 }		
		if(city.length==0){
				   $(".cityError").show();
				   isValid = false;
				   }else{
					$(".cityError").hide();
							
				 }		
		if(pincode.length==0){
				   $(".pincodeError").show();
				   isValid = false;
				   }else{
					$(".pincodeError").hide();
							
				 }			 

		  
 if(isValid==true){	 
	 dateOfBirth=GetDate($("#dateofbirthCR").val());
	  var postData = {
		"firstName":firstname,
		"surName":surName,
		"dateOfBirth":dateOfBirth,
		"gender":gender,
		"mobileNo":mobileNo,
		"email":email,
		"flatno":flatno,
		"city":city,
		"state":state,
		"pincode":pincode,
		"pan":pan,
		"reason":reason,
		"middleName":middleName,
		"telephoneNo":telephoneNo,
		"passport":passport,
		"voterid":voterid,
		"aadhaar":aadhaar,
		"driverlicense":driverlicense
		}
		  var postData = JSON.stringify(postData);
		  console.log("experian post data",postData);		 
		 if(userisIn == "local"){		  
			var creditReportUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/experian";

		}else if(userisIn == "prod"){		
			var creditReportUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/experian";

		}else{
				var creditReportUrl = "http://10.10.10.78:8181/v1/user/"+suserId+"/experian";			  
		}		 
  $.ajax({
      url: creditReportUrl,
      type:"POST",    
      data: postData,
      contentType: "application/json",
      dataType: "json",
      success: function(data){         
          $("#stepOneForm").hide();
          $("#stepThreeForm").show();
          
          $('.creditAccountActive').html(data.creditAccountActive);
          $('.creditAccountClosed').html(data.creditAccountClosed);
          $('.creditAccountTotal').html(data.creditAccountTotal);
          $('.outstandingBalanceAll').html(data.outstandingBalanceAll);
          $('.outstandingBalanceSecured').html(data.outstandingBalanceSecured);
          $('.outstandingBalanceUnSecured').html(data.outstandingBalanceUnSecured);
          $('.score').html(data.score);            
       },	   
       error: function(xhr,textStatus,errorThrown){		  
		   console.log('Error Something');
		   var text = xhr.responseJSON.errorMessage;          
		   $("#experianerrormessage").append(text + ".&nbsp;&nbsp;&nbsp;Please update your personal details in profile page.");
		   $("#modal-experianerror").modal("show");
		  // alert(JSON.stringify(xhr.responseJSON.errorMessage));
        },		
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken",saccessToken);
  }
        
     });
}
  return isValid;
});
});


function loadCreditReport(){
	
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");    
    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
     
  if(userisIn == "local"){
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/getexperian";
  }else if(userisIn == "prod"){
  // https://fintech.oxyloans.com/oxyloans/
     var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+id+"/getexperian";

  }else{
       var getStatUrl = "http://10.10.10.78:8181/v1/user/"+id+"/getexperian";

  }    
      $.ajax({
        url:getStatUrl,
        type:"GET",
        success: function(data,textStatus,xhr){
			
		  $('.creditAccountActive').html(data.creditAccountActive);
          $('.creditAccountClosed').html(data.creditAccountClosed);
          $('.creditAccountTotal').html(data.creditAccountTotal);
          $('.outstandingBalanceAll').html(data.outstandingBalanceAll);
          $('.outstandingBalanceSecured').html(data.outstandingBalanceSecured);
          $('.outstandingBalanceUnSecured').html(data.outstandingBalanceUnSecured);
          $('.score').html(data.score); 
	  },
        error: function(xhr,textStatus,errorThrown){
          console.log('Error Something');
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken",saccessToken);
  }
   });
	
	
}

function GetDate(str) {
var arr = str.split('/');
var month = "";
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var monthsintext = [1,2,3,4,5,6,7,8,9,10,11,12];
var i = 0;
for (i; i < months.length; i++) {
    if (monthsintext[i] == arr[1]) {
        break;
    }
}
month = months[i];
var formatddate = arr[0] + '-' + month + '-' + arr[2];
return formatddate;
}


/* ENACH STARTS*/

function handleResponse(res) {
    if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
        // success block
        //alert("success");
    } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
        // initiated block
        //alert("initiated");
    } else {
        // error block
        //alert("error");
    }
};
function saveEMandateResponse(merchantResponseString){
 
$(".loadingSec").show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    //console.log(suserId);
    primaryType = sprimaryType;
    accessToken = saccessToken;
    fName = "lenderUserId";
    if (sprimaryType == "BORROWER") {
        fName = "borrowerUserId";
    }
    if (userisIn == "local") {
        //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
        var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/enach/response";
    } else {
        // https://fintech.oxyloans.com/oxyloans/
        var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/loan/enach/response";
   }
    var postData = {
      "mandateResponse":merchantResponseString
    };
    var postData = JSON.stringify(postData);
    $.ajax({
        url: getStatUrl,
        type: "POST",
        data: postData,
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, xhr) {
            console.log(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('Error Something');
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken", saccessToken);
        }
    });
    $(".loadingSec").hide();
}
function activateECS(enachMandateId) {
    $(".loadingSec").show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    //console.log(suserId);
    primaryType = sprimaryType;
    accessToken = saccessToken;
    fName = "lenderUserId";
    if (sprimaryType == "BORROWER") {
        fName = "borrowerUserId";
    }
    var returnURL="";
    if (userisIn == "local") {
        //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
        var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/enach/" + enachMandateId;
        returnURL = "http://182.18.139.198/new/enachMandateResponse";
    } else {
        // https://fintech.oxyloans.com/oxyloans/
        var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/enach/" + enachMandateId;
        returnURL = "https://oxyloans.com/new/enachMandateResponse";
    }
    var postData = {};
    $.ajax({
        url: getStatUrl,
        type: "POST",
        data: postData,
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, xhr) {
            console.log(data);
            $.getScript("https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js");
            var configJson = {
                'tarCall': false,
                'features': {
                    'showPGResponseMsg': true,
                    'enableNewWindowFlow': true,
                    //for hybrid applications please disable this by passing false
                    'enableExpressPay': true,
                    'siDetailsAtMerchantEnd': true,
                    'enableSI': true
                },
                'consumerData': {
                    'deviceId': 'WEBSH1', //possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
                    'token': data.token,
                    'returnUrl': returnURL,
                    //'responseHandler': handleResponse,
                    'paymentMode': 'all',
                    'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png', //provided merchant logo will be displayed
                    'merchantId': data.merchantId,
                    'currency': 'INR',
                    'consumerId': data.user.displayId, //Your unique consumer identifier to register a eMandate/eSign
                    'consumerMobileNo': data.user.mobileNumber,
                    'consumerEmailId': data.user.email,
                    'txnId': data.txnId, //Unique merchant transaction ID
                    'items': [{
                        'itemId': 'FIRST',
                        'amount': data.totalAmount,
                        'comAmt': '0'
                    }],
                    'txnType': 'SALE',
                    'customStyle': {
                        'PRIMARY_COLOR_CODE': '#3977b7', //merchant primary color code
                        'SECONDARY_COLOR_CODE': '#FFFFFF', //provide merchant's suitable color code
                        'BUTTON_COLOR_CODE_1': '#1969bb', //merchant's button background color code
                        'BUTTON_COLOR_CODE_2': '#FFFFFF' //provide merchant's suitable color code for button text
                    },
                    //'accountNo': '910010016945587',    //Pass this if accountNo is captured at merchant side for eMandate/eSign
                    //'accountType': 'Saving',    //  Available options Saving, Current and CC for Cash Credit, only for eSign
                    //'accountHolderName': 'Name',  //Pass this if accountHolderName is captured at merchant side for eSign only(Note: For ICICI eMandate registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI)
                    //'ifscCode': 'ICIC0000001',        //Pass this if ifscCode is captured at merchant side for eSign only
                    'debitStartDate': data.debitStartDate,
                    'debitEndDate': data.debitEndDate,
                    'maxAmount': data.maxAmount,
                    'amountType': data.amountType,
                    'frequency': data.frequency //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
                }
            };
            $.pnCheckout(configJson);
            if (configJson.features.enableNewWindowFlow) {
                pnCheckoutShared.openNewWindow();
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('Error Something');
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken", saccessToken);
        }
    });
    $(".loadingSec").hide();
}

function loadSignedloans() {
    $(".loadingSec").show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    userId = suserId;
    //console.log(suserId);
    primaryType = sprimaryType;
    accessToken = saccessToken;
    fName = "lenderUserId";
    if (sprimaryType == "BORROWER") {
        fName = "borrowerUserId";
    }
    var postData = {
        "leftOperand": {
            "fieldName": fName,
            "fieldValue": userId,
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue": "Active",
            "operator": "EQUALS"
        },
        "page": {
            "pageNo": 1,
            "pageSize": 10
        },
        "sortBy": "loanAcceptedDate",
        "sortOrder": "ASC"
    }
    var postData = JSON.stringify(postData);
    console.log(postData);
    if (userisIn == "local") {
        //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
        var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/search";
    } else {
        // https://fintech.oxyloans.com/oxyloans/
        var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/search";
    }
    //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
    $.ajax({
        url: getStatUrl,
        type: "POST",
        data: postData,
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, xhr) {
            console.log(data);
            totalEntries = data.totalCount;
            if (data.results.length == 0) {
                $("#displayNoRecords").show();
            } else {
                var template = document.getElementById('displayallRequests').innerHTML;
                //console.log(template);
                Mustache.parse(template);
                var html = Mustache.render(template, data);
                var html = Mustache.to_html(template, {
                    data: data.results
                });
                //alert(html);
                $('#displayoffers').html(html);
                var displayPageNo = totalEntries / 10;
                displayPageNo = displayPageNo + 1;
                $('.acceptedPagination').bootpag({
                    total: displayPageNo,
                    page: 1,
                    maxVisible: 5,
                    leaps: true,
                    firstLastUse: true,
                    first: '←',
                    last: '→',
                    wrapClass: 'pagination',
                    activeClass: 'active',
                    disabledClass: 'disabled',
                    nextClass: 'next',
                    prevClass: 'prev',
                    lastClass: 'last',
                    firstClass: 'first'
                }).on("page", function(event, num) {
                    //$(".content4").html("Page " + num); // or some ajax content loading...
                    var postData = {
                        "leftOperand": {
                            "fieldName": fName,
                            "fieldValue": userId,
                            "operator": "EQUALS"
                        },
                        "logicalOperator": "AND",
                        "rightOperand": {
                            "fieldName": "loanStatus",
                            "fieldValue": "Active",
                            "operator": "EQUALS"
                        },
                        "page": {
                            "pageNo": num,
                            "pageSize": 10
                        },
                        "sortBy": "loanActiveDate",
                        "sortOrder": "DESC"
                    }
                    var postData = JSON.stringify(postData);
                    console.log(postData);
                    //var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
                    if (userisIn == "local") {
                        //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
                        var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/search";
                    } else {
                        // https://fintech.oxyloans.com/oxyloans/
                        var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/loan/" + primaryType + "/search";
                    }
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
                            var html = Mustache.render(template, data);
                            var html = Mustache.to_html(template, {
                                data: data.results
                            });
                            //alert(html);
                            $('#displayoffers').html(html);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log('Error Something');
                        },
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader("accessToken", saccessToken);
                        }
                    });
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log('Error Something');
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken", saccessToken);
        }
    });
    $(".loadingSec").hide();
}

/* ENACH ENDS*/






/************ New profile page *****************/


$(document).ready(function () {

    $("#select-beast-selectized").on('keypress', function(e) {
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

  $("#newprofile").click(function(){
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var enteredFirstname= $("#firstnamevalue").val();
         var middlename = $("#middletname").val();
         var enteredLastname = $("#lastnamevalue").val();
         var enteredPanNumber = $("#pannumber").val();
         var enteredDateofbirth=$("#dateofbirth").val();
         var enteredFathername = $("#fathername").val();
         var enteredbmobileNumber = $("#bmobileNumber").val();
         var enteredemailValue = $("#emailValue").val();
         var enteredLoanAmount = $("#select-beast").val();
         var enteredemploymentType=$('input[name=option-1]:checked').val();
         var enteredModeofTransactions=$('input[name=option-2]:checked').val();
         var enteredpermanentAddress = $("#permanentAddress").val(); 
         var enteredresidenceAddress = $("#residenceAddress").val();
         var enteredpincode= $("#pincode").val();
         var enteredstate= $("#state").val();
         var enteredname = $("#name").val(); 
         var enteredaccountno = $("#accountno").val();
         var enteredbankname= $("#bankname").val();
         var enteredIFSCCode= $(".IFSCCode").val();
         var enteredBranch = $("#Branch").val(); 
         var enteredcityValue = $("#cityValue").val();
       
        if($('input[name=option-1]:checked').val()== 'SALARIED') {
         var enteredtotalexperience = $("#totalexperience").val();
         var enteredcompany = $("#company").val();
         var enteredsalary = $("#salary").val(); 
              }else{
         var enteredtotalexperience = $("#experience").val();
         var enteredcompany = $("#companyName").val();
         var enteredsalary = $("#salaryAmount").val(); 
               }
       



          if($('#city').val() == 'Other') {
               var enteredcity = $("#others").val();   
              }else{
             var enteredcity = $("#city").val();
               }




    // var ifscRegex = /^[A-Z]{4}\d{7}$/i;
 var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;
    var panRegex=/^[A-Z]{5}\d{4}[A-Z]{1}/;

    enteredFirstname=enteredFirstname.trim();
    middlename=middlename.trim();
    enteredLastname=enteredLastname.trim();
    enteredPanNumber=enteredPanNumber.trim();
    enteredFathername=enteredFathername.trim();

 var employmentType = document.getElementsByName("option-1");
 var modeofTransactions= document.getElementsByName("option-2");
  var emp = false;
   var mot= false;
       var isValid = true;
      
       if(enteredFirstname == ""){
          $(".firstnameerror").show();
          isValid = false;
       }else{
          $(".firstnameerror").hide();
        
       }

       if(enteredLastname == ""){
          $(".lastnameerror").show();
          isValid = false;
       }else{
          $(".lastnameerror").hide();
          
       }

    
 if(!panRegex.test(enteredPanNumber)) {
        $(".pannumbererror").html("Please enter valid Pan Number.");
        $(".pannumbererror").show();
        isValid = false;
     } else{
        $(".pannumbererror").hide();
     }



    if(enteredDateofbirth == ""){
          $(".dateofbirtherror").show();
          isValid = false;
       }else{
          $(".dateofbirtherror").hide();
      
       }
    
      if( enteredFathername== ""){
          $(".fathernameerror").show();
          isValid = false;
       }else{
          $(".fathernameerror").hide();
      
       }

        if( enteredbmobileNumber== ""){
          $(".mobileNumbererror").show();
          isValid = false;
       }else{
          $(".mobileNumbererror").hide();
      
       }


      if( enteredemailValue== ""){
          $(".emailValueerror").show();
          isValid = false;
       }else{
          $(".emailValueerror").hide();
      
       }
     
     if( enteredLoanAmount== ""){
          $(".loanAmounterror").show();
          isValid = false;
       }else{
          $(".loanAmounterror").hide();
      
       }
     
       if(enteredemploymentType == "option-1"){
          $(".employmentError").show();
          isValid = false;
       }else{
          $(".employmentError").hide();
          
       }

      var i = 0;
      for(var i=0; i < employmentType .length; i++){
          if(employmentType[i].checked == true){
              emp = true;    
          }
      }
      if(!emp){
           $(".employmentError").show();
           isValid = false;
      }else{
          $(".employmentError").hide();
          
      }

if(sprimaryType=="BORROWER"){
    if(enteredtotalexperience == ""){
          $(".totalexperienceError").show();
          isValid = false;
       }else{
          $(".totalexperienceError").hide();
          
       }



    if(enteredcompany == ""){
          $(".companyError").show();
          isValid = false;
       }else{
          $(".companyError").hide();
          
       }


    if(enteredsalary == ""){
          $(".salaryError").show();
          isValid = false;
       }else{
          $(".salaryError").hide();
          
       } 

}
  if(enteredModeofTransactions == "option-1"){
          $(".ModeofTransactionsError").show();
          isValid = false;
       }else{
          $(".ModeofTransactionsError").hide();
          
       }

      var i = 0;
      for(var i=0; i < modeofTransactions .length; i++){
          if(modeofTransactions[i].checked == true){
              mot = true;    
          }
      }
      if(!mot){
           $(".ModeofTransactionsError").show();
           isValid = false;
      }else{
          $(".ModeofTransactionsError").hide();
          
      }

      if(enteredpermanentAddress == ""){
          $(".permanentAddressError").show();
          isValid = false;
       }else{
          $(".permanentAddressError").hide();
          
       }


        if(enteredresidenceAddress == ""){
          $(".residenceAddressError").show();
          isValid = false;
       }else{
          $(".residenceAddressError").hide();
          
       }



        if(enteredpincode == ""){
          $(".pincodeError").show();
          isValid = false;
       }else{
          $(".pincodeError").hide();
          
       }

        if(enteredcity == ""){
          $(".cityError").show();
          isValid = false;
       }else{
          $(".cityError").hide();
          
       }


      if(enteredname == ""){
          $(".nameError").show();
          isValid = false;
       }else{
          $(".nameError").hide();
          
       }


        if(enteredaccountno == ""){
          $(".accountnoError").show();
          isValid = false;
       }else{
          $(".accountnoError").hide();
          
       }



        if(enteredbankname == ""){
          $(".banknameError").show();
          isValid = false;
       }else{
          $(".banknameError").hide();
          
       }

 if(!ifscRegex.test(enteredIFSCCode)) {
        $(".IFSCCodeerror").html("Please enter valid IFSC code.");
        $(".IFSCCodeerror").show();
        isValid = false;
     } else{
        $(".IFSCCodeerror").hide();
     }


       if(enteredBranch == ""){
          $(".branchError").show();
          isValid = false;
       }else{
          $(".branchError").hide();
          
       }

        if(enteredcityValue == ""){
          $(".cityValueError").show();
          isValid = false;
       }else{
          $(".cityValueError").hide();
          
       }
//alert(enteredemploymentType);

   //return isValid; 

var postData =
{
"firstName":enteredFirstname,
"lastName":enteredLastname,
"middleName":middlename,
"fatherName":enteredFathername,
"dob":enteredDateofbirth,
"loanRequestAmount":enteredLoanAmount,
"panNumber":enteredPanNumber,
"address":enteredresidenceAddress,
"permanentAddress":enteredpermanentAddress,
"userName":enteredname,
"accountNumber":enteredaccountno,
"ifscCode":enteredIFSCCode,
"bankName":enteredbankname,
"branchName":enteredBranch,
"bankAddress":enteredcityValue,
//"modeOfTransactions":enteredModeofTransactions,
"pinCode":  enteredpincode,
"city":enteredcity,
"state":enteredstate,
"employment":enteredemploymentType,
"companyName":enteredcompany,
"workExperience":enteredtotalexperience,
"salary":enteredsalary
};
        var postData = JSON.stringify(postData);
        //console.log(postData);
       
        //regUrl = baseUrl+"v1/user/personal/"+userId+"";
 
  if(userisIn == "local"){
    regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/profile/"+userId+""
  }else{
    regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/profile/"+userId+"";
  }
  if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
                 $("#modal-personalprofileSuccess").modal('show');
                   
                },    
               error: function(xhr,textStatus,errorThrown){
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });
        
$("#lendernewprofile").click(function(){
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var enteredFirstname= $("#firstnamevalue").val();
         var middlename = $("#middletname").val();
         var enteredLastname = $("#lastnamevalue").val();
         var enteredPanNumber = $("#pannumber").val();
         var enteredDateofbirth=$("#dateofbirth").val();
         var enteredFathername = $("#fathername").val();
         var enteredbmobileNumber = $("#bmobileNumber").val();
         var enteredemailValue = $("#emailValue").val();
         var enteredpermanentAddress = $("#permanentAddress").val(); 
         var enteredresidenceAddress = $("#residenceAddress").val();
         var enteredpincode= $("#pincode").val();
         //var enteredcity= $("#city").val();
         var enteredstate= $("#state").val();
         var enteredname = $("#name").val(); 
         var enteredaccountno = $("#accountno").val();
         var enteredbankname= $("#bankname").val();
         var enteredIFSCCode= $(".IFSCCode").val();
         var enteredBranch = $("#Branch").val(); 
         var enteredcityValue = $("#cityValue").val();
       
               if($('#lendercityValue').val() == 'Other') {
               var enteredcity = $("#lenderothers").val();   
              }else{
             var enteredcity = $("#lendercityValue").val();
               }



     // var ifscRegex = /^[A-Z]{4}\d{7}$/i;
       var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;
       var panRegex=/[A-Z]{5}\d{4}[A-Z]{1}/;

    enteredFirstname=enteredFirstname.trim();
    middlename=middlename.trim();
    enteredLastname=enteredLastname.trim();
    enteredPanNumber=enteredPanNumber.trim();
    enteredFathername=enteredFathername.trim();


       var isValid = true;
      
       if(enteredFirstname == ""){
          $(".firstnameerror").show();
          isValid = false;
       }else{
          $(".firstnameerror").hide();
        
       }

       if(enteredLastname == ""){
          $(".lastnameerror").show();
          isValid = false;
       }else{
          $(".lastnameerror").hide();
          
       }

    
 if(!panRegex.test(enteredPanNumber)) {
        $(".pannumbererror").html("Please enter valid Pan Number.");
        $(".pannumbererror").show();
        isValid = false;
     } else{
        $(".pannumbererror").hide();
     }



    if(enteredDateofbirth == ""){
          $(".dateofbirtherror").show();
          isValid = false;
       }else{
          $(".dateofbirtherror").hide();
      
       }
    
      if( enteredFathername== ""){
          $(".fathernameerror").show();
          isValid = false;
       }else{
          $(".fathernameerror").hide();
      
       }

        if( enteredbmobileNumber== ""){
          $(".mobileNumbererror").show();
          isValid = false;
       }else{
          $(".mobileNumbererror").hide();
      
       }


      if( enteredemailValue== ""){
          $(".emailValueerror").show();
          isValid = false;
       }else{
          $(".emailValueerror").hide();
      
       }
     
   



      if(enteredpermanentAddress == ""){
          $(".permanentAddressError").show();
          isValid = false;
       }else{
          $(".permanentAddressError").hide();
          
       }


        if(enteredresidenceAddress == ""){
          $(".residenceAddressError").show();
          isValid = false;
       }else{
          $(".residenceAddressError").hide();
          
       }



        if(enteredpincode == ""){
          $(".pincodeError").show();
          isValid = false;
       }else{
          $(".pincodeError").hide();
          
       }

        if(enteredcity == ""){
          $(".cityError").show();
          isValid = false;
       }else{
          $(".cityError").hide();
          
       }


      if(enteredname == ""){
          $(".nameError").show();
          isValid = false;
       }else{
          $(".nameError").hide();
          
       }


        if(enteredaccountno == ""){
          $(".accountnoError").show();
          isValid = false;
       }else{
          $(".accountnoError").hide();
          
       }



        if(enteredbankname == ""){
          $(".banknameError").show();
          isValid = false;
       }else{
          $(".banknameError").hide();
          
       }

 if(!ifscRegex.test(enteredIFSCCode)) {
        $(".IFSCCodeerror").html("Please enter valid IFSC code.");
        $(".IFSCCodeerror").show();
        isValid = false;
     } else{
        $(".IFSCCodeerror").hide();
     }
       if(enteredBranch == ""){
          $(".branchError").show();
          isValid = false;
       }else{
          $(".branchError").hide();
          
       }

        if(enteredcityValue == ""){
          $(".cityValueError").show();
          isValid = false;
       }else{
          $(".cityValueError").hide();
          
       }
//alert(enteredemploymentType);

   //return isValid; 

var postData =
{
"firstName":enteredFirstname,
"lastName":enteredLastname,
"middleName":middlename,
"fatherName":enteredFathername,
"dob":enteredDateofbirth,
"panNumber":enteredPanNumber,
"address":enteredresidenceAddress,
"permanentAddress":enteredpermanentAddress,
"pinCode":  enteredpincode,
"city":enteredcity,
"state":enteredstate,
"userName":enteredname,
"accountNumber":enteredaccountno,
"ifscCode":enteredIFSCCode,
"bankName":enteredbankname,
"branchName":enteredBranch,
"bankAddress":enteredcityValue
};
        var postData = JSON.stringify(postData);
        //console.log(postData);
       
        //regUrl = baseUrl+"v1/user/personal/"+userId+"";
 
  if(userisIn == "local"){
    regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/profile/"+userId+""
  }else{
    regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/profile/"+userId+"";
  }
  if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
                   $("#modal-personalprofileSuccess").modal('show');  
                },    
               error: function(xhr,textStatus,errorThrown){
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });



  $("#pincode").on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode); 
if ($this.val().length > 5) {
  e.preventDefault();
    return false;   
   }  
 
  if (regex.test(str)) {     
    return true;
  }
  e.preventDefault();
  return false;

  });

   
   $("#pincode").on('keyup', function(e) {
   //$("#city").val("");
   $("#state").val("");
   var $this = $(this);
   if ($this.val().length == 6) { 
   var pincode=$("#pincode").val();
   //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+pincode+"/pincode";
     if(userisIn == "local"){
  var  getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+pincode+"/pincode"
  }else{
  var  getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+pincode+"/pincode";
  } 
    $.ajax({
        url:getStatUrl,
        type:"GET",       
        success: function(data,textStatus,xhr){

      if(data.size!=0){
     // $("#city").val(data.city);
      $("#state").val(data.state);
     // $("#lendercityValue-error").html("")  ;
     // $("#lendercityValue").removeClass("error");
      }else{
        //$("#labelpincode").html("Please enter the correct pincode")
      }   

         
     },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            }
      
    });   
   }  
    
  });


/********** borrower-profile************/
$('#city').on('change', function() {
 if($('#city').val() == 'Other') {
             $("#others").show(); 
        }else{
           $("#others").hide(); 
        }
});


  $("#borrower-profile-btn").click(function(){
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var enteredFirstname= $("#firstnamevalue").val();
         var middlename = $("#middletname").val();
         var enteredLastname = $("#lastnamevalue").val();
         var enteredPanNumber = $("#pannumber").val();
         var enteredDateofbirth=$("#dateofbirth").val();
         var enteredFathername = $("#fathername").val();
         var enteredbmobileNumber = $("#bmobileNumber").val();
         var enteredemailValue = $("#emailValue").val();
         var enteredLoanAmount = $("#select-beast").val();
         var enteredemploymentType=$('input[name=option-1]:checked').val();
        // var enteredtotalexperience = $("#totalexperience").val();
         //var enteredcompany = $("#company").val();
        // var enteredsalary = $("#salary").val();
       //  var enteredModeofTransactions=$('input[name=option-2]:checked').val();
         var enteredpermanentAddress = $("#permanentAddress").val(); 
         var enteredresidenceAddress = $("#residenceAddress").val();
         var enteredpincode= $("#pincode").val();
        // var enteredcity= $("#city").val();
         var enteredstate= $("#state").val();
        
 if($('input[name=option-1]:checked').val()== 'SALARIED') {
         var enteredtotalexperience = $("#totalexperience").val();
         var enteredcompany = $("#company").val();
         var enteredsalary = $("#salary").val(); 
              }else{
         var enteredtotalexperience = $("#experience").val();
         var enteredcompany = $("#companyName").val();
         var enteredsalary = $("#salaryAmount").val(); 
               }


             if($('#city').val() == 'Other') {
               var enteredcity = $("#others").val();   
              }else{
             var enteredcity = $("#city").val();
               }
       

    var panRegex=/[A-Z]{5}\d{4}[A-Z]{1}/;

    enteredFirstname=enteredFirstname.trim();
    middlename=middlename.trim();
    enteredLastname=enteredLastname.trim();
    enteredPanNumber=enteredPanNumber.trim();
    enteredFathername=enteredFathername.trim();

 var employmentType = document.getElementsByName("option-1");
 var modeofTransactions= document.getElementsByName("option-2");
  var emp = false;
  // var mot= false;
       var isValid = true;
      
       if(enteredFirstname == ""){
          $(".firstnameerror").show();
          isValid = false;
       }else{
          $(".firstnameerror").hide();
        
       }

       if(enteredLastname == ""){
          $(".lastnameerror").show();
          isValid = false;
       }else{
          $(".lastnameerror").hide();
          
       }

    
 if(!panRegex.test(enteredPanNumber)) {
        $(".pannumbererror").html("Please enter valid Pan Number.");
        $(".pannumbererror").show();
        isValid = false;
     } else{
        $(".pannumbererror").hide();
     }



    if(enteredDateofbirth == ""){
          $(".dateofbirtherror").show();
          isValid = false;
       }else{
          $(".dateofbirtherror").hide();
      
       }
    
      if( enteredFathername== ""){
          $(".fathernameerror").show();
          isValid = false;
       }else{
          $(".fathernameerror").hide();
      
       }

        if( enteredbmobileNumber== ""){
          $(".mobileNumbererror").show();
          isValid = false;
       }else{
          $(".mobileNumbererror").hide();
      
       }


      if( enteredemailValue== ""){
          $(".emailValueerror").show();
          isValid = false;
       }else{
          $(".emailValueerror").hide();
      
       }
     
     if( enteredLoanAmount== ""){
          $(".loanamounterror").show();
          isValid = false;
       }else{
          $(".loanamounterror").hide();
      
       }
     
       if(enteredemploymentType == "option-1"){
          $(".employmentError").show();
          isValid = false;
       }else{
          $(".employmentError").hide();
          
       }

      var i = 0;
      for(var i=0; i < employmentType .length; i++){
          if(employmentType[i].checked == true){
              emp = true;    
          }
      }
      if(!emp){
           $(".employmentError").show();
           isValid = false;
      }else{
          $(".employmentError").hide();
          
      }


  if(enteredtotalexperience == ""){
          $(".totalexperienceError").show();
          isValid = false;
       }else{
          $(".totalexperienceError").hide();
          
       }



    if(enteredcompany == ""){
          $(".companyError").show();
          isValid = false;
       }else{
          $(".companyError").hide();
          
       }


    if(enteredsalary == ""){
          $(".salaryError").show();
          isValid = false;
       }else{
          $(".salaryError").hide();
          
       }


 /*if(enteredtotalexperience == ""){
          $(".totalexperienceError").show();
          isValid = false;
       }else{
          $(".totalexperienceError").hide();
          
       }



    if(enteredcompany == ""){
          $(".companyError").show();
          isValid = false;
       }else{
          $(".companyError").hide();
          
       }


    if(enteredsalary == ""){
          $(".salaryError").show();
          isValid = false;
       }else{
          $(".salaryError").hide();
          
       } */


 /* if(enteredModeofTransactions == "option-1"){
          $(".ModeofTransactionsError").show();
          isValid = false;
       }else{
          $(".ModeofTransactionsError").hide();
          
       }

      var i = 0;
      for(var i=0; i < modeofTransactions .length; i++){
          if(modeofTransactions[i].checked == true){
              mot = true;    
          }
      }
      if(!mot){
           $(".ModeofTransactionsError").show();
           isValid = false;
      }else{
          $(".ModeofTransactionsError").hide();
          
      }*/

      if(enteredpermanentAddress == ""){
          $(".permanentAddressError").show();
          isValid = false;
       }else{
          $(".permanentAddressError").hide();
          
       }


        if(enteredresidenceAddress == ""){
          $(".residenceAddressError").show();
          isValid = false;
       }else{
          $(".residenceAddressError").hide();
          
       }



        if(enteredpincode == ""){
          $(".pincodeError").show();
          isValid = false;
       }else{
          $(".pincodeError").hide();
          
       }

        if(enteredcity == ""){
          $(".cityError").show();
          isValid = false;
       }else{
          $(".cityError").hide();
          
       }


     

var postData =
{
"firstName":enteredFirstname,
"lastName":enteredLastname,
"middleName":middlename,
"fatherName":enteredFathername,
"dob":enteredDateofbirth,
"loanRequestAmount":enteredLoanAmount,
"panNumber":enteredPanNumber,
"address":enteredresidenceAddress,
"permanentAddress":enteredpermanentAddress,
//"modeOfTransactions":enteredModeofTransactions,
"pinCode":  enteredpincode,
"city":enteredcity,
"state":enteredstate,
"employment":enteredemploymentType,
"companyName":enteredcompany,
"workExperience":enteredtotalexperience,
"salary":enteredsalary

}

        var postData = JSON.stringify(postData);
        //console.log(postData);
       
        //regUrl = baseUrl+"v1/user/personal/"+userId+"";
 
  if(userisIn == "local"){
    regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+userId+""
  }else{
    regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+userId+"";
  }
  console.log(regUrl);
  if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
                //alert(1);
                $("#headingTwo a").trigger("click");
                $("#modal-profileSuccess").modal('show'); 

                },    
               error: function(xhr,textStatus,errorThrown){
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });


/************ lender profile ************/


$('#lendercityValue').on('change', function() {
 if($('#lendercityValue').val() == 'Other') {
             $("#lenderothers").show(); 
        }else{
           $("#lenderothers").hide(); 
        }
});


  $("#lender-profile-btn").click(function(){
      

      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var enteredFirstname= $("#firstnamevalue").val();
         var middlename = $("#middletname").val();
         var enteredLastname = $("#lastnamevalue").val();
         var enteredPanNumber = $("#pannumber").val();
         var enteredDateofbirth=$("#dateofbirth").val();
         var enteredFathername = $("#fathername").val();
         var enteredbmobileNumber = $("#bmobileNumber").val();
         var enteredemailValue = $("#emailValue").val();
         var enteredpermanentAddress = $("#permanentAddress").val(); 
         var enteredresidenceAddress = $("#residenceAddress").val();
         var enteredpincode= $("#pincode").val();
         //var enteredcity= $("#city").val();
         var enteredstate= $("#state").val();
        
        if($('#lendercityValue').val() == 'Other') {
               var enteredcity = $("#lenderothers").val();   
              }else{
             var enteredcity = $("#lendercityValue").val();
               }
       
    var panRegex=/[A-Z]{5}\d{4}[A-Z]{1}/;

    enteredFirstname=enteredFirstname.trim();
    middlename=middlename.trim();
    enteredLastname=enteredLastname.trim();
    enteredPanNumber=enteredPanNumber.trim();
    enteredFathername=enteredFathername.trim();

 
       var isValid = true;
      
       if(enteredFirstname == ""){
          $(".firstnameerror").show();
          isValid = false;
       }else{
          $(".firstnameerror").hide();
        
       }

       if(enteredLastname == ""){
          $(".lastnameerror").show();
          isValid = false;
       }else{
          $(".lastnameerror").hide();
          
       }

    
 if(!panRegex.test(enteredPanNumber)) {
        $(".pannumbererror").html("Please enter valid Pan Number.");
        $(".pannumbererror").show();
        isValid = false;
     } else{
        $(".pannumbererror").hide();
     }



    if(enteredDateofbirth == ""){
          $(".dateofbirtherror").show();
          isValid = false;
       }else{
          $(".dateofbirtherror").hide();
      
       }
    
      if( enteredFathername== ""){
          $(".fathernameerror").show();
          isValid = false;
       }else{
          $(".fathernameerror").hide();
      
       }

        if( enteredbmobileNumber== ""){
          $(".mobileNumbererror").show();
          isValid = false;
       }else{
          $(".mobileNumbererror").hide();
      
       }


      if( enteredemailValue== ""){
          $(".emailValueerror").show();
          isValid = false;
       }else{
          $(".emailValueerror").hide();
      
       }
  

      if(enteredpermanentAddress == ""){
          $(".permanentAddressError").show();
          isValid = false;
       }else{
          $(".permanentAddressError").hide();
          
       }


        if(enteredresidenceAddress == ""){
          $(".residenceAddressError").show();
          isValid = false;
       }else{
          $(".residenceAddressError").hide();
          
       }



        if(enteredpincode == ""){
          $(".pincodeError").show();
          isValid = false;
       }else{
          $(".pincodeError").hide();
          
       }

        if(enteredcity == ""){
          $(".cityError").show();
          isValid = false;
       }else{
          $(".cityError").hide();
          
       }




var postData =
{
"firstName":enteredFirstname,
"lastName":enteredLastname,
"middleName":middlename,
"fatherName":enteredFathername,
"dob":enteredDateofbirth,
"panNumber":enteredPanNumber,
"address":enteredresidenceAddress,
"permanentAddress":enteredpermanentAddress,
"pinCode":  enteredpincode,
"city":enteredcity,
"state":enteredstate

}


        var postData = JSON.stringify(postData);
        //console.log(postData);
       
        //regUrl = baseUrl+"v1/user/personal/"+userId+"";
 
  if(userisIn == "local"){
    regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+userId+""
  }else{
    regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+userId+"";
  }
  console.log(regUrl);
  if(isValid == true){
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
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });





/****************** User Bank Details ********************/

 $("#user-bank-btn").click(function(){
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
        
         var enteredname = $("#name").val(); 
         var enteredaccountno = $("#accountno").val();
         var enteredbankname= $("#bankname").val();
         var enteredIFSCCode= $(".IFSCCode").val();
         var enteredBranch = $("#Branch").val(); 
         var enteredcityValue = $("#cityValue").val();
       
     //var ifscRegex = /^[A-Z]{4}\d{7}$/i;
     var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;

       var isValid = true;


      if(enteredname == ""){
          $(".nameError").show();
          isValid = false;
       }else{
          $(".nameError").hide();
          
       }


        if(enteredaccountno == ""){
          $(".accountnoError").show();
          isValid = false;
       }else{
          $(".accountnoError").hide();
          
       }



        if(enteredbankname == ""){
          $(".banknameError").show();
          isValid = false;
       }else{
          $(".banknameError").hide();
          
       }

 if(!ifscRegex.test(enteredIFSCCode)) {
        $(".IFSCCodeerror").html("Please enter valid IFSC code.");
        $(".IFSCCodeerror").show();
        isValid = false;
     } else{
        $(".IFSCCodeerror").hide();
     }



       

       if(enteredBranch == ""){
          $(".branchError").show();
          isValid = false;
       }else{
          $(".branchError").hide();
          
       }

        if(enteredcityValue == ""){
          $(".cityValueError").show();
          isValid = false;
       }else{
          $(".cityValueError").hide();
          
       }
//alert(enteredemploymentType);

   //return isValid; 

var postData =
{

"userName":enteredname,
"accountNumber":enteredaccountno,
"ifscCode":enteredIFSCCode,
"bankName":enteredbankname,
"branchName":enteredBranch,
"bankAddress":enteredcityValue

};
        var postData = JSON.stringify(postData);
        //console.log(postData);
       
        //regUrl = baseUrl+"v1/user/personal/"+userId+"";
 
  if(userisIn == "local"){
    regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+userId+""
  }else{
    regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+userId+"";
  }
  if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
                $("#headingThree a").trigger("click");
                $("#modal-bankSuccess").modal('show');   
                },    
               error: function(xhr,textStatus,errorThrown){
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });




});

/* personal get call for new page */

function loadpersonalallDetails(){
  $(".loadingSec").attr("style", "display:block");  

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  $(".displayFormElements").hide();
  id = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
   
if(userisIn == "local"){
 var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+id+"";
}else{
 var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
}
setTimeout(function(){ 
     //alert(userpersonalinfo +" "+ userbankDetailsInfo);

    if(userpersonalinfo == true && userbankDetailsInfo == false){
         $("#headingTwo a").trigger("click");
         $(".displayBankDetailsErrorIfnot").show();
         $(".displayBankDetailsErrorIfnot").attr("style", "width:50%!important");
    }else{
        $(".displayBankDetailsErrorIfnot").hide();
        //$("#headingTwo h4 a:after").attr("style", "top:-3px");
    }

    if((userpersonalinfo == true && userbankDetailsInfo == true)  && userkycStatus == false){

         $("#headingThree a").trigger("click");
         $(".displayKYCDetailsErrorIfnot").show();
    }else if(userpersonalinfo == true && userbankDetailsInfo == false && userkycStatus == false){
        $(".displayKYCDetailsErrorIfnot").show();

    }else{
       $(".displayKYCDetailsErrorIfnot").hide();
    }

  // var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
   
 
     $("#firstnamevalue").val(data.firstName);
     $("#lastnamevalue").val(data.lastName); 
     $("#middlename").val(data.middleName);
     $("#pannumber").val(data.panNumber);
     $("#dateofbirth").val(data.dob);
     $("#fathername").val(data.fatherName);
     $("#bmobileNumber").val(data.mobileNumber);
     $("#emailValue").val(data.email);
     $("#select-beast").val(data.loanRequestAmount);
     $("#select-beast-selectized").val(data.loanRequestAmount);
 
     //$("#totalexperience").val(data.workExperience);
    // $("#company").val(data.companyName);
    // $("#salary").val(data.salary);

     $("#residenceAddress").val(data.address);
     $("#permanentAddress").val(data.permanentAddress);
     
     $("#city").val(data.city);
     $("#state").val(data.state);
     $("#pincode").val(data.pinCode);
    
      $("#name").val(data.userName);
      $("#accountno").val(data.accountNumber);
      $(".IFSCCode").val(data.ifscCode);
      $("#bankname").val(data.bankName);
      $("#Branch").val(data.branchName);
      $("#cityValue").val(data.bankAddress);
      
      var userEmpType = data.employment;
  if(userEmpType === 'SALARIED') {
     $("#totalexperience").val(data.workExperience);
     $("#company").val(data.companyName);
     $("#salary").val(data.salary);
      } else if (userEmpType === 'SELFEMPLOYED') {
     $("#experience").val(data.workExperience);
     $("#companyName").val(data.companyName);
     $("#salaryAmount").val(data.salary);
      } 


      if(userEmpType === 'SALARIED') {
       $('#salDiv').addClass('form_radio_block1_show');
       $('#selfDiv').removeClass('form_radio_block1_show'); 
      } else if (userEmpType === 'SELFEMPLOYED') {
        $('#selfDiv').addClass('form_radio_block1_show');
        $('#salDiv').removeClass('form_radio_block1_show');
      } 

      // $("#option-1").val(data.employment);
     // $("#option-2").val(data.modeOfTransactions);
     
      var $employmentRadio = $('input:radio[name=option-1]');
      if($employmentRadio.is(':checked') === false) {
          $employmentRadio.filter("[value="+data.employment+"]").prop('checked', true);
      }


   
    var $modeOfTransactionsRadio = $('input:radio[name=option-2]');
      if($modeOfTransactionsRadio.is(':checked') === false) {
          $modeOfTransactionsRadio.filter("[value="+data.modeOfTransactions+"]").prop('checked', true);
      }

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }, 1000);
}


/* View EMI  starts*/


function getEMITABLE(loanId){
	
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanId;
    if(userisIn == "local"){
        var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/"+getLoanId+"/emicard";
    }else{
        var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/"+getLoanId+"/emicard";
    }
    $.ajax({
      url:updateEmiUrlCard,
      type:"GET",
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        //alert(data);
        console.log(data);
        var template = document.getElementById('emiRecordsCallTpl').innerHTML;
       //console.log(template);
        Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template,{data: data.results});
       $('#displayEMIRecords').html(html);

        $("#modal-viewEMIBorrower").modal("show");
        $(".emiStatustrue").attr("disabled", "disabled");
       
      } ,
      statusCode : {
        400: function (response) {
            $("#modal-agreement-already").modal("show");                   
        }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}

/* VIEW EMI ENDS*/

/* Payment GateWay Starts */

function loadpaymentDetailsPage(loanId,EmmiNumber){
   writeCookie('loanssquessequenceno', loanId);
   writeCookie('loansemsschedulenodd', EmmiNumber);
   window.location.href="onlinePayment";
}

function fetchPaymentDetails() {
  //$(".loadingSec").show();
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  userId = suserId;
  //console.log(suserId);
  primaryType = sprimaryType;
  accessToken = saccessToken;
  fName = "lenderUserId";  
   var postData = {
            "loanId":getCookie("loanssquessequenceno"), 
            "emiNumber":getCookie("loansemsschedulenodd")
        };    
		
	writeCookie('loanssquessequenceno', 'undefined');
    writeCookie('loansemsschedulenodd', 'undefined'); 
  if (sprimaryType == "BORROWER") {
    fName = "borrowerUserId";
  }
  var postData = JSON.stringify(postData);
  var returnURL = "";
  if (userisIn == "local") {
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +userId+ "/fetchPaymentDetails";
    returnURL = "http://localhost/oxyloans-ui/enachMandateResponse";
  } else {
    // https://fintech.oxyloans.com/oxyloans/
    var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/fetchPaymentDetails";
    returnURL = "https://oxyloans.com/new/enachMandateResponse";
  }
 $.ajax({
    url: getStatUrl,
    type: "POST",
    data: postData,
    contentType: "application/json",
    dataType: "json",
    success: function (data, textStatus, xhr) {
      console.log(data);
      $('#key').val(data.key);
      $('#salt').val(data.salt);
      $('#txnid').val(data.txnid);
      $('#hash').val(data.hash);
      $('#amount').val(data.amount);
      $('#amount_display').html(data.amount);
      $('#fname').val(data.firstname);
      $('#fname_display').html(data.firstname);
      $('#email').val(data.email);
      $('#email_display').html(data.email);
      $('#mobile').val(data.phone);
      $('#mobile_display').html(data.phone);
      $('#pinfo').val(data.productinfo);
      $('#pinfo_display').html(data.productinfo);
      $('#udf5').val(data.udf5);
      $('#surl').val(data.surl);
      $('#furl').val(data.furl);
    },
    error: function (xhr, textStatus, errorThrown) {
      console.log('Error Something');
    },
    beforeSend: function (xhr) {
      xhr.setRequestHeader("accessToken", saccessToken);
    }
  });
  //$(".loadingSec").hide();
}

/* Payment Gateway Ends */

/* update EMI after payment gateway success */

function updateTransactionStatus(transactionId, payUTransactionId, transactionSatus){
	
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");	      
if(userisIn == "local"){  
    var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+transactionId+"/emipaidbyborrowerusingpaymentgateway";
}else{
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+transactionId+"/emipaidbyborrowerusingpaymentgateway";

}
    var postData ={
		"comments": "emi from payment gateway",         
        "payuTransactionNumber":payUTransactionId,
        "payuStatus":transactionSatus     
      };
	
    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateEmiUrlCard,
      type:"POST",
      contentType:"application/json",
      dataType:"json",
        data: postData,
      success: function(data,textStatus,xhr){        
      } ,
      statusCode : {
        400: function (response) {                              
        }
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}

/* Update EMI ends */


function viewBorrowerDoc(documenteType){
	  var borrowerUserID = $('.placeUserIDHere').attr("data-userID") ;
	  var requestedDucmentType = documenteType;
	  
	  console.log(borrowerUserID +" "+documenteType);


	  suserId = getCookie("sUserId");
	  sprimaryType = getCookie("sUserType");
	  saccessToken = getCookie("saccessToken");
	  var doctype = doctype;

	  //var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";
	if(userisIn == "local"){
	  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
	  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+borrowerUserID+"/download/"+documenteType;

	}else{
	// https://fintech.oxyloans.com/oxyloans/
	  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+borrowerUserID+"/download/"+documenteType;

	}
	console.log(getPAN);
	   $.ajax({
	      url:getPAN,
	      type:"GET",
	      success: function(data,textStatus,xhr){
	       console.log(data);
	    if(data.downloadUrl != ""){
	          console.log(data.downloadUrl);
	       // $('a.colorbox').colorbox();
	          //window.open(data.downloadUrl,'_blank');
	          var sourcePath = data.downloadUrl;
	          var contentTypeCheck = ".pdf";

	          if(sourcePath.indexOf(contentTypeCheck) != -1){
	              //alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
	              window.open(data.downloadUrl,'_blank');
	          }else{
	            $.colorbox({href:data.downloadUrl});
	          }

	       }


	     /* if(data.downloadUrl != ""){
	          console.log(data.downloadUrl);
	          window.open(data.downloadUrl,'_blank');    
	       }*/
	       
	    },
	      error: function(xhr,textStatus,errorThrown){
	        console.log('Error Something');
	      },
	      beforeSend: function(xhr) {
	        xhr.setRequestHeader("accessToken", saccessToken);
	     }
	   });

	}




function favouriteThisBorrower(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  var borrowerUserID = $('.placeUserIDHere').attr("data-userID");
    
  var lenderUserId =suserId;
    
    console.log(lenderUserId+""+ borrowerUserID); 


  if(userisIn == "local"){
  var favouriteUrl= "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/favourite";

}else{
  var favouriteUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/favourite";
} 

  var postData ={
    "lenderUserId":lenderUserId,
    "borrowerUserId":borrowerUserID,
    "type":"FAVOURITE"    
      };
  
    var postData = JSON.stringify(postData);
    console.log(postData);
    $.ajax({
      url:favouriteUrl,
      type:"PATCH",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#favouriteBorrower").hide();
        $("#unfavouriteBorrower").show();

     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}


function unfavouriteThisBorrower(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  var borrowerUserID = $('.placeUserIDHere').attr("data-userID");
    
  var lenderUserId =suserId;
    
    console.log(lenderUserId+""+ borrowerUserID); 


  if(userisIn == "local"){
  var favouriteUrl= "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/favourite";

}else{
  var favouriteUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/favourite";
} 

  var postData ={
    "lenderUserId":lenderUserId,
    "borrowerUserId":borrowerUserID,
    "type":"UNFAVOURITE"    
      };
  
    var postData = JSON.stringify(postData);  
    $.ajax({
      url:favouriteUrl,
      type:"PATCH",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
         $("#favouriteBorrower").show();
        $("#unfavouriteBorrower").hide();
      
     },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }

   });
}



function loadfavouriteBorrowers(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
   
if(userisIn == "local"){
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/favouriteUsers";

}else{
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/favouriteUsers";

}

    $.ajax({
      url:getStatUrl,
      type:"GET",
     
      success: function(data,textStatus,xhr){
       console.log(data);

       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $(".oxyScore-00").html("YTR");
       $('#loadloanListings').html(html);

 var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.borrowerLoanListingsPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading.
  
if(userisIn == "local"){
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/favouriteUsers";

}else{
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/favouriteUsers";

}
    $.ajax({
      url:getStatUrl,
      type:"GET",
      
      success: function(data,textStatus,xhr){
       //alert(data);
       console.log(data);
       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
       $('#loadloanListings').html(html);
       $(".oxyScore-00").html("YTR");


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
    // $(".loadingSec").hide();
}


function uploadScrowTransactionScreesShot(input) {
  console.log(input);
 $(".loadingSec").show();
 
  suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");

 if (input.files && input.files[0]) {
   var reader = new FileReader();
 
   reader.onload = function(e) {
     $('.panUpload .image-upload-wrap').hide();

     $('.panUpload .file-upload-image').attr('src', e.target.result);
     $('.panUpload .file-upload-content').show();
    // $('.panUpload .file-upload-image').attr('href', e.target.result);

     $('.panUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);
        
   var fd = new FormData();
   var files = input.files[0];
   //alert(fd);
   fd.append('TRANSACTIONSS',files);
	if(userisIn == "local"){  
	 var formUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/lendertransactiondetails";

	}else{
	 var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/lendertransactiondetails";

	}  
  $.ajax({
       url: formUrl,
       type: 'post',
       data: fd,
       contentType: false,
       processData: false,
       success: function(data,textStatus,xhr){
		   
           if(data != 0){
             //$("#modal-fileUploadedSuccessfully").modal('show');
             $(".loadingSec").hide();
             var myfile=$("#pan").val();
             var filename = myfile.split("\\").pop();
       
             $('.transactiondetailsId').html(filename);
			 
			 $('#documnetId').val(data.documentId);
            
           }else{
               alert('file not uploaded');
           }
       },
     error: function(xhr,textStatus,errorThrown){
       console.log('Error Something');
     },
     beforeSend: function(xhr) {
       xhr.setRequestHeader("accessToken",saccessToken);
     }

   });

 } else {
  removeUpload();
 }
}

function downLoadTransactionSS(doctype){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var doctype = doctype;  
  var documnetId=$('#documnetId').val();
if(userisIn == "local"){
	
  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/"+doctype+"/"+documnetId;

}else{
	
  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/"+doctype+"/"+documnetId;

}
console.log(getPAN);
   $.ajax({
      url:getPAN,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
    if(data.downloadUrl != ""){
          console.log(data.downloadUrl);
       // $('a.colorbox').colorbox();
          //window.open(data.downloadUrl,'_blank');
          var sourcePath = data.downloadUrl;
          var contentTypeCheck = ".pdf";

          if(sourcePath.indexOf(contentTypeCheck) != -1){
              //alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
              window.open(data.downloadUrl,'_blank');
          }else{
            $.colorbox({href:data.downloadUrl});
          }

       }


     /* if(data.downloadUrl != ""){
          console.log(data.downloadUrl);
          window.open(data.downloadUrl,'_blank');    
       }*/
       
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}
$(document).ready(function () {
$("#btnsrcrowtrn").click(function(){
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
        
         var accountNumber= $("#transactionaccountnumber").val();
         var transactionAmount = $("#transactionamount").val();         
         var transactionDate=$("#transactiondatepicker").val();
		 var documentUploadedId=$("#documnetId").val();
		 
    accountNumber=accountNumber.trim();    
    transactionAmount=transactionAmount.trim();
    

 
       var isValid = true;
      
       if(accountNumber == ""){
          $(".accountNumbererror").show();
          isValid = false;
       }else{
          $(".accountNumbererror").hide();
        
       }

       if(transactionAmount == ""){
          $(".transactionAmounterror").show();
          isValid = false;
       }else{
          $(".transactionAmounterror").hide();
          
       }
       if(transactionDate == ""){
          $(".transactionDaterror").show();
          isValid = false;
       }else{
          $(".transactionDaterror").hide();
      
       }
		var postData =
		{
		"scrowAccountNumber":accountNumber,
		"transactionAmount":transactionAmount,
		"transactionDate":transactionDate,
		"documentUploadedId":documentUploadedId
		}
		
        var postData = JSON.stringify(postData);      
 
	  if(userisIn == "local"){
		regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/savelendertransaction"
	  }else{
		regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/savelendertransaction";
	  }
	  console.log(regUrl);
  if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"POST",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                console.log(data);
               $("#modal-transactionSuccess").modal('show');			   
                },    
               error: function(xhr,textStatus,errorThrown){
                  
                  console.log('error');
               },
              beforeSend: function(xhr) {
                  xhr.setRequestHeader("accessToken",saccessToken ); 
              } 
             
                 
             });
        }
       return isValid; 
          });
});

function loadWalletDetails(){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken; 
       
	if(userisIn == "local"){	 
		 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/getlenderwallettrns";
	}else{	
		 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/getlenderwallettrns";
	}
	var postData = {
	 "pageNo": 1,
          "pageSize": 10
        }
	var postData = JSON.stringify(postData);  
        $.ajax({
          url:actOnLoan,
          type:"POST",  
		  data:postData,		  
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
			  
			console.log(data);
            totalEntries = data.totalCount;
            console.log(data.results);
            if (data.results.length == 0) {
                $("#displayNoRecords").show();
            }			
			else{
               var template = document.getElementById('wallettransactiondetails').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});            
              $('#displaywallettrns').html(html);
			
            var displayPageNo = totalEntries/9;
            displayPageNo = displayPageNo+1;
          $('.acceptedPagination').bootpag({
              total: displayPageNo,
              page: 1,
              maxVisible: 5,
              leaps: true,
              firstLastUse: true,
              first: '←',
              last: '→',
              wrapClass: 'pagination',
              activeClass: 'active',
              disabledClass: 'disabled',
              nextClass: 'next',
              prevClass: 'prev',
              lastClass: 'last',
              firstClass: 'first'
          }).on("page", function(event, num){
          //$(".content4").html("Page " + num); // or some ajax content loading...
         
        var postData =  {
          "pageNo": num,
          "pageSize": 10
        }
     var postData = JSON.stringify(postData);        
     if(userisIn == "local"){	 
		 var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/getlenderwallettrns";
	}else{	
		 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/getlenderwallettrns";
	}

        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
        
            console.log(data.results);
            
			 var template = document.getElementById('wallettransactiondetails').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});            
              $('#displaywallettrns').html(html);
              
           
          },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });
      }); 
   }        
       },
          error: function(xhr,textStatus,errorThrown){
            console.log('Error Something');
          },
          beforeSend: function(xhr) {
            xhr.setRequestHeader("accessToken",saccessToken);
    }
       });  
  $(".loadingSec").hide();
  
}

function downLoadWalletTrnsImage(suserId,docId,doctype){
  
  
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var doctype = doctype;  
  var documnetId=docId;
if(userisIn == "local"){
	
  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/"+doctype+"/"+documnetId;

}else{
	
  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/"+doctype+"/"+documnetId;

}
console.log(getPAN);
   $.ajax({
      url:getPAN,
      type:"GET",
      success: function(data,textStatus,xhr){       
    if(data.downloadUrl != ""){
          console.log(data.downloadUrl);
       // $('a.colorbox').colorbox();
          //window.open(data.downloadUrl,'_blank');
          var sourcePath = data.downloadUrl;
          var contentTypeCheck = ".pdf";
          if(sourcePath.indexOf(contentTypeCheck) != -1){
              //alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
              window.open(data.downloadUrl,'_blank');
          }else{
            $.colorbox({href:data.downloadUrl});
          }

       }  
       
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}


function loadallMyLoanRequests(){
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
    

 var postData = {
  "leftOperand": {
    "fieldName":"userId",
    "fieldValue":userId,
    "operator":"EQUALS"
  },
"logicalOperator":"AND",
"rightOperand": {
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
"page": {
  "pageNo": 1,
  "pageSize":9
 }
}
  var postData = JSON.stringify(postData);
console.log(postData);  
if(userisIn == "local"){
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);

       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loadallloansListingsTpl').innerHTML;
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadallloansListings').html(html);

 var displayPageNo = totalEntries/9;
  displayPageNo = displayPageNo+1;
  $('.borrowerLoansRequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...

    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "BORROWER";
    }else{
       var  fieldValueforSearch = "LENDER";
    }

    var postData = {
  "leftOperand": {
    "fieldName":"userId",
    "fieldValue":userId,
    "operator":"EQUALS"
  },
"logicalOperator":"AND",
"rightOperand": {
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
"page": {
  "pageNo": num,
  "pageSize":9
 }
}
  var postData = JSON.stringify(postData);
console.log(postData);;
if(userisIn == "local"){
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}else{
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       console.log(data);
       totalEntries = data.totalCount;
       console.log(totalEntries);
      var template = document.getElementById('loadallloansListingsTpl').innerHTML;
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadallloansListings').html(html);


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  }); 

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
    // $(".loadingSec").hide();
}



/* Borrower Monthly Statements */


function borrowerMonthlyStatements(){
  
 suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

if(userisIn == "local"){
  var statement = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/pdf";
}else{
  var statement = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/pdf";

}

 console.log(statement);

   $.ajax({
      url:statement,
      type:"GET",
      success: function(data,textStatus,xhr){
      console.log(data);
       window.open(data.downloadUrl);          
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}

function loadofferDetails(){
 // alert(globalLoanId);
  var loanRequestId =globalLoanId;
  //console.log("loanRequestId is "+ loanRequestId);
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

if(userisIn == "local"){
  var statement = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/"+loanRequestId+"/loanofferdetails";
}else{
  var statement = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/"+loanRequestId+"/loanofferdetails";

}

 //console.log(statement);

   $.ajax({
      url:statement,
      type:"GET",
      success: function(data,textStatus,xhr){
      console.log(data);

     $("#loanAmount").html(data.loanOfferedAmount);
     $("#loanAmountFee").html(data.borrowerFee); 
     $("#duaration").html(data.duaration);
     $("#emiAmount").html(data.emiAmount);
     $("#netDisbursementAmount").html(data.netDisbursementAmount);
             
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}


function acceptLoanOffer(){
  var loanRequestId = "APBR"+globalLoanId;
 // alert("loanRequestId is "+ loanRequestId);
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    

if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loanOfferAccepetence";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/loanOfferAccepetence";
}
    var postData =  {
              "id":suserId,
              "loanRequestId":loanRequestId,
              "loanOfferStatus":"LOANOFFERACCEPTED"
              } 


    var postData = JSON.stringify(postData);    
    console.log(postData);
        
    $.ajax({
      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
         $("#modal-successfullAcceptedOffer").modal('show');
      } ,
     
          error: function (request, error) {
          //console.log("error");
        console.log(arguments);
          if(arguments[0].responseJSON.errorCode==108){
             $("#modal-acceptofferalready").modal('show');
           }
             },
             beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
     
     
    });
}


function rejectLoanOffer(){

    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    
    var loanRequestId = "APBR"+globalLoanId;
    

if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loanOfferAccepetence";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/loanOfferAccepetence";
}
    var postData =  {
              
              "id":suserId,
              "loanRequestId":loanRequestId,
              "loanOfferStatus":"LOANOFFERREJECTED"


} 


    var postData = JSON.stringify(postData);    
    console.log(postData);
        
    $.ajax({
      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
         $("#modal-offerRejected").modal('show');
      } ,
     
          error: function (request, error) {
           //console.log("error");
            console.log(arguments); 
             if(arguments[0].responseJSON.errorCode==108){
              $("#modal-alreadyAcceptedOffer").modal('show');
             }
             },
     
       beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
    });
}




$(document).ready(function() {
 $("#newloan-submit-btn").click(function(){
     var enteredloanRequestAmount= $("#newloanRequestAmount").val();
     var enteredrateOfInterest = $("#rateOfInterest").val();
     var enteredduration = $("#duration").val();
     var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
     var enteredloanPurpose=$(".loanPurpose").val();
     var enteredexpectedDate=$(".expectedDateValue").val();
     var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
     var woim = false;
     var isValid = true;
      
      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;


    enteredloanPurpose = enteredloanPurpose.trim();

     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount < 5000){
        $(".loanRequestAmountError").html("Please enter a value greater than or equal to 5000.");
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount > 5000000){
      if(primaryType =="LENDER"){
        $(".loanRequestAmountError").html("As per RBI guidelines lender can lend only 50 Lakhs only.");
        $(".loanRequestAmountError").show();
        isValid = false; 
    } if(primaryType =="BORROWER"){
        $(".loanRequestAmountError").html("As per RBI guidelines borrower can borrow only 50 Lakhs only.");
        $(".loanRequestAmountError").show();
         isValid = false; 
         } 
     }else{
        $(".loanRequestAmountError").hide();
         
     }
     console.log(enteredrateOfInterest);
     if(enteredrateOfInterest == ""){
        $(".rateOfInterestError").show();
        isValid = false;
     }else{
        $(".rateOfInterestError").hide();
      
     }

    if(enteredduration == ""){
        $(".durationError").show();
        isValid = false;
     }else{
        $(".durationError").hide();
    
     }

    if(enteredrepaymentMethod == ""){
        $(".repaymentMethodError").show();
        isValid = false;
     }else{
        $(".repaymentMethodError").hide();
      
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
    
    }


    if(enteredloanPurpose == ""){
        $(".loanPurposeError").show();
        isValid = false;
     }else{
        $(".loanPurposeError").hide();
      

     }

    if(enteredexpectedDate == ""){
        $(".expectedDateError").show();
        isValid = false;
     }else{
        $(".expectedDateError").hide();
      
     }

      
      var postData ={"loanRequestAmount":enteredloanRequestAmount,"rateOfInterest":enteredrateOfInterest,
      "duration":enteredduration,"repaymentMethod":enteredrepaymentMethod,"loanPurpose":enteredloanPurpose,
            "expectedDate":enteredexpectedDate};
       var postData = JSON.stringify(postData);
      
      
 if(userisIn == "local"){
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     // var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+id+"";
     var regUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/newrequest";
      
  }else if(userisIn == "prod"){
  // https://fintech.oxyloans.com/oxyloans/
     var regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/newrequest";

  }


      console.log(postData);

if(isValid == true){
        $.ajax({
            url: regUrl,
            type:"POST",
            data: postData,
            contentType:"application/json",
            dataType:"json",
              success: function(data,textStatus,xhr){
                     console.log(data);
                     $("#modal-raiseanewloan").modal('show');
                    setTimeout(function(){ 
                     $(".loadingSec").hide();
                     if(primaryType =="LENDER"){
                        window.location="lenderloanlistings"
                      }else{
                        window.location="loanlistings"
                      }
                  }, 15000);
                },
              error: function(xhr,textStatus,errorThrown){
                     console.log('Error Something');
                      console.log(arguments); 
             if(arguments[0].responseJSON.errorCode==114){
              $("#modal-offerAmountNotfullFilled").modal('show');
             }
                },

              beforeSend: function(xhr) {
                    xhr.setRequestHeader("accessToken",saccessToken);
           
               }
           });
      }
      return isValid;
        });
 });