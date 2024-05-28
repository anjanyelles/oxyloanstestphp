$(document).ready(function() {

$("#profile-edit-btn").click(function(){
  $(".udisplaysec, #profile-edit-btn").hide();
  $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality, .genderInfo, .maritalStatusInfo").show();
});

$("#myprofile-edit-btn").click(function(){
  $(".udisplaysec, #myprofile-edit-btn").hide();
  $("#myprofile-submit-btn, #employment, #companyname, #description, #designation, #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeAddressId,#officeContactNumber,#workExperience,.yearOfPassingValue,#college").show();
});

$("#address1-edit-btn").click(function(){
  $(".udisplaysec1, #address1-edit-btn").hide();
 $('#address1-submit-btn, .permanent_housenumberValue, .permanent_areaValue, .permanent_streetValue, .permanent_cityValue').show();
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



  // Check Cookie
  getUserDetails();
  // checkCookie();
  //getUserDetails();
  downloadProfilePic();
baseUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
folderName = "FEOxyLoans";
var userNameFromAPI;
 
 totalEntries = 0;

var date = new Date();
date.setDate(date.getDate()-1);
noprofileCheck = "yes";

  $('#dateofbirth').datepicker({
    format: 'dd/mm/yyyy',
    endDate: '-18y'
  });

  $(".userPicArea").mouseover(function(){
      $('.displayEditOption').show();  
  });

 $(".displayEditOption").mouseout(function(){
      $('.displayEditOption').hide();  
  });

 $(".displayEditOption").mouseout(function(){
    $('.displayCropSection').show();
    var userPicArea = $('.userPicArea').attr("src");    
    $(".getFromProfileSec").attr("src", userPicArea);
 });


//http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/17/dashboard/lender?current=true/false
//$('#datetimepicker1').datetimepicker();

//

// FORGOT SECTION VALIDATIONS//

 $(".phonenumber,.mobilenumberValue,#monthlyEmi,#creditamount,#existingloanamount,#creditcardsrepaymentamount,#othersourcesincome,#netmonthlyincome,#avgmonthlyexpenses,#officeContactNumber").on('keypress', function(e) {
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
        
         var enteredFirstname= $(".firstnameValue").val();
         var enteredLastname = $(".lastnameValue").val();
         var enteredFathername = $(".fathernameValue").val();
         var enteredDateofbirth=$(".dateofbirthValue").val();
         var enteredGender=$('input[name=gendervalue]:checked').val();
         var enteredMaritalStatus=$('input[name=maritalStatus]:checked').val();
        var enteredNationality=$("#nationality").val();


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
if(isValid == true){
          $.ajax({
              url: regUrl,
              type:"PATCH",
              data: postData,
              contentType:"application/json",
              dataType:"json",
              success: function(data,textStatus,xhr){
                   $("#modal-profileSuccess").modal('show');
                    setTimeout(function(){ 
                    if(primaryType == "LENDER")  {
                      window.location = "lenderprofessionalDetails";                                 
                    }else{
                       window.location = "borrowerprofessionalDetails";                                  
                    }

                    }, 5000);                   
               },
               error: function(xhr,textStatus,errorThrown){
                  // $("#modal-profile-error").modal('show');
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
     }else{
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
      
        enteredloanPurpose = enteredloanPurpose.trim();

     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount < 5000){
        $(".loanRequestAmountError").html("Please enter a value greater than or equal to 5000.");
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount > 1000000){
        $(".loanRequestAmountError").html("As per RBI guidelines lender can lend only 10 Lakhs only.");
        $(".loanRequestAmountError").show();
        isValid = false;   
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

    // return isValid;
    

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
$("#createloan-submit-btn").click(function(){
      
     var enteredloanRequestAmount= $(".loanRequestAmount").val();
     var enteredrateOfInterest = $(".rateOfInterest").val();
     var enteredduration = $(".durationValue").val();
     var enteredrepaymentMethod = $('input[name=repaymentMethod]:checked').val();
     var enteredloanPurpose=$(".loanPurpose").val();
     var enteredexpectedDate=$(".expectedDateValue").val();
     var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
     var woim = false;
     var isValid = true;

      enteredloanPurpose = enteredloanPurpose.trim();
    
     if(enteredloanRequestAmount == ""){
        $(".loanRequestAmountError").show();
        isValid = false;
     } else if ( enteredloanRequestAmount < 5000){
        $(".loanRequestAmountError").html("Please enter a value greater than or equal to 5000.");
        $(".loanRequestAmountError").show();
        isValid = false;
    } else if ( enteredloanRequestAmount > 50000){
        $(".loanRequestAmountError").html("As per RBI guidelines you can offer only 50000 to one borrower.");
        $(".loanRequestAmountError").show();
        isValid = false;
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
    

      suserId = getCookie("sUserId");
      sprimaryType = getCookie("sUserType");
      saccessToken = getCookie("saccessToken");
      userId = suserId;
      primaryType = sprimaryType;
      accessToken = saccessToken;
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
                     // var sprimaryType = data.primaryType;
             if(sprimaryType == "LENDER"){
              window.location = "investor";
             }else {
              window.location = "borrowerDashboard";
             }
              }, 5000);
                  
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
  alert(formData);

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var formUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/kyc";
  
 

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
            alert('data returned successfully');
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
    sendofferURL = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request";
    alert(sendofferURL);
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
    $(".emiValueIs").html(emivalue);

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

setTimeout(function(){ 
  $(".downloadAgreeent").click(function(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    //console.log(suserId);
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var requestID = $(this).attr("data-reqid");
    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+requestID+"/download";
      //alert(getStatUrl);
      $.ajax({
        url:getStatUrl,
        type:"GET",
        success: function(data,textStatus,xhr){
          console.log(data);
          window.open(data.downloadUrl,'_blank');
           $('#modal-agreement').modal('show');
         },
        error: function(xhr,textStatus,errorThrown){
          console.log('Error Something');
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("accessToken", accessToken ); 
        } 
     });

  });
}, 1000);


$(".deleteSession").click(function(){
    signout();
});



$('#type').on('change', function() {

  if($('#type').val() == 'amount') {
            $(".amount").show();
              $('.roi').hide(); 
        } else if($('#type').val() == 'roi'){
            $('.amount').hide();
            $(".roi").show();
        }
        else {
            $('.amount').hide(); 
             $('.roi').hide(); 
            
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
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    //alert("sprimaryType "+suserId+sprimaryType+" ACCESSTOKEN "+" "+saccessToken);
    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
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
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", accessToken ); 
      } 
   });
}

function getUserDetails(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    if(suserId != ""){
      if(sprimaryType == "LENDER"){
        $('.placeUserID').html("LR"+suserId);
      }else{
        $('.placeUserID').html("BR"+suserId);
      }
    }

        // Get User Name from Personal Details API
    var personalDetailsUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+suserId+"";
    $.ajax({
          url:personalDetailsUrl,
          type:"GET",
          success: function(data,textStatus,xhr){
           console.log(data);
           userNameFromAPI = data.firstName;
           
           if(userNameFromAPI == ""){
              userNameFromAPI = "User"; 
           }
           userlastNameFromAPI = data.lastName;

           if(userlastNameFromAPI == ""){
              userlastNameFromAPI = "Name"; 
           }

           var windowLocation = $(location). attr("href");
             if(noprofileCheck == "yes"){
                redirectUsertoProfile();
             }
          

           $(".displayUserName").html(userNameFromAPI +" "+userlastNameFromAPI);
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
               alert('1');
               bootbox.alert('<span style="color:Red;">Error While Saving Outage Entry Please Check</span>', function () { });
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

function redirectUsertoProfile(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  if(userNameFromAPI == null || userlastNameFromAPI == null){
      if(sprimaryType == "LENDER"){
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to Add a Loan Offer.");
      }else{
        $(".text-profileCheck").html("Please complete your profile and upload all valid documents to raise a Loan Request.");
      }

      
     $("#modal-checkProfile").modal("show");
      
      
    setTimeout(function(){ 
      if(sprimaryType == "LENDER"){
        window.location = "lenderpersonalinfo?userScore=0";
      }else{
        window.location = "borrowerpersonalinfo?userScore=0";
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

    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/dashboard/"+primaryType+"?current=false";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
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
   
   var postData =  {
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
       "pageSize":3
   },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
};




  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
  console.log(postData);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       

       //alert(html);
       $('#loadBorrowersListings').html(html);
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
  
 var postData =  {
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
       "pageNo": num,
       "pageSize":3
   },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
};

  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
  var postData = JSON.stringify(postData);
  console.log(postData);
  
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
  var postData =  {
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
       "pageSize":3
   },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
};


  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 3}};
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
       var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
		   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
     var postData =  {
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
};
  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 9}};
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
       totalEntries = data.totalCount;
        console.log(totalEntries);
       var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       //alert(html);
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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


     var postData =  {
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
};
  //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 9}};
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
               var postData =  {
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
       "pageNo": num,
       "pageSize":9
   },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
};
           // var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
 $(".loadingSec").show();
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
     $('.panUpload .image-upload-wrap').hide();

     $('.panUpload .file-upload-image').attr('src', e.target.result);
     $('.panUpload .file-upload-content').show();

     $('.panUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append('PAN',files);
   console.log(fd);
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

function readAADHAR(input) {
  $(".loadingSec").show();
 if (input.files && input.files[0]) {

   var reader = new FileReader();

   reader.onload = function(e) {
     $('.aadharUpload .image-upload-wrap').hide();

     $('.aadharUpload .file-upload-image').attr('src', e.target.result);
     $('.aadharUpload .file-upload-content').show();

     $('.aadharUpload .image-title').html(input.files[0].name);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   var files = input.files[0];
   fd.append('AADHAR',files);
   console.log(fd);
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
    alert(panUpload);


    var aadharUpload = $('.aadharFileUpload').val();
    alert(aadharUpload);

    var passportUpload = $('.passportFileUpload').val();
    alert(passportUpload);
    // var file = panUpload.files[0];
    // var formData = new FormData();
    // formData.append('file', file)

});


function setKYCvars(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");
 var formUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/kyc";
 $("#userKYCUpload").attr("action", formUrl);
}

function setProfilePicURL(){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var formUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/upload/uploadProfilePic";
  $("#userPICUpload").attr("action", formUrl);
}

function getKYC(){
suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");

var getPAN = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PAN";
var getPASSPORT = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
var getAADHAR = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/AADHAR";

              $.ajax({
                url:getPAN,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
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

}

function loaduserID(){
  suserId = getCookie("sUserId");
  $('.virtualID').html("OXYLR"+suserId);
}



function loadviewLoanoffer(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");


    userId = suserId;
    primaryType = sprimaryType;
    saccessToken = saccessToken;

    var loanRequestId  = $('.requestidFromClick').html(); 
    //alert(loanRequestId);
    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+loanRequestId+"";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
       $(".loanPurpose").html(data.loanPurpose);
       $(".rateOfInterest").html(data.rateOfInterest);
       $(".loanRequestedDate").html(data.loanRequestedDate);
       if(data.repaymentMethod == "PI"){
          $(".repaymentMethod").html("Principal Interest Flat");
       }else{
          $(".repaymentMethod").html("Interest");
       }

       $(".balAmount").html(data.loanRequestAmount - data.loanDisbursedAmount);
       //loanDisbursedAmount
       
       $(".loanRequestAmount").html(data.loanRequestAmount);
       $(".loanRequest").html(data.loanRequest);
       $(".duration").html(data.duration);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
        var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
        "pageNo": 1,
        "pageSize": 3
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"

};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"

};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var id = $(".postreqID").attr("data-reqID"); 
    var type = $(".postreqID").attr("data-type"); 

    // /{userId}/loan/{primaryType}/request/{loanRequestId}/{action}
    var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/"+id+"/"+type;
   
  
    $.ajax({
      url:actOnLoan,
      type:"PATCH",
      success: function(data,textStatus,xhr){
        console.log(data);
        
        $('#promptAccUser').modal('hide');
        $('.entrieBlock-'+id+' .userReacted').hide();
        $('.entrieBlock-'+id+' .loanStatus-sec').show();
        $('.entrieBlock-'+id+' .loanStatus-sec').html("You've "+type+ " this request.");
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
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
 
  var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/address";
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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    
  

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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    
  

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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    
  

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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

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
 var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+id+"";
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);

     if(data.firstName == null && data.lastName == null && data.fatherName == null && data.dob == null && data.nationality == null&& data.gender == null&& data.maritalStatus == null){
        $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality, .genderInfo, .maritalStatusInfo").show();
        $("#profile-edit-btn").hide();
     } else if(data.firstName != ""&& data.lastName!= "" && data.fatherName != "" && data.dob != "" && data.nationality != ""&& data.gender != ""&& data.maritalStatus!= ""){
      $("#profile-edit-btn").show();
      $("#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality, .genderInfo, .maritalStatusInfo").hide();

     }

     $("#firstname, .displayFirstName").val(data.firstName);
     $(".displayFirstName").html(data.firstName);


     $("#lastname").val(data.lastName);
      $(".displayLastName").html(data.lastName);


     $("#fathername").val(data.fatherName);
     $(".displayFatherName").html(data.fatherName);

     $("#dateofbirth").val(data.dob);
     $(".displaydateofbirth").html(data.dob);


     $("#nationality").val(data.nationality);
     $(".displaynationality").html(data.nationality);

   
  
      var $genderRadio = $('input:radio[name=gendervalue]');
      if($genderRadio.is(':checked') === false) {
          $genderRadio.filter("[value="+data.gender+"]").prop('checked', true);
      }
       $(".displaygender").html(data.gender);

      var $maritalStatusRadio = $('input:radio[name=maritalStatus]');
      if($maritalStatusRadio.is(':checked') === false) {
          $maritalStatusRadio.filter("[value="+data.maritalStatus+"]").prop('checked', true);
      }
        $(".displaymaritalStatus").html(data.maritalStatus);

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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/professional/"+id+"";
  


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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/getfinancialDetails/"+id+"";
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
      $(".displaymonthlyEmi").html(data.monthlyEmi);

      $("#creditamount").val(data.creditAmount);
      $(".displaycreditamount").html(data.creditAmount);

      $("#existingloanamount").val(data.existingLoanAmount);
      $(".displayexistingloanamount").html(data.existingLoanAmount);

      $("#creditcardsrepaymentamount").val(data.creditCardsRepaymentAmount);
      $(".displaycreditcardsrepaymentamount").html(data.creditCardsRepaymentAmount);

      $("#othersourcesincome").val(data.otherSourcesIncome);
      $(".displayothersourcesincome").html(data.otherSourcesIncome);

      $("#netmonthlyincome").val(data.netMonthlyIncome);
      $(".displaynetmonthlyincome").html(data.netMonthlyIncome);

      $("#avgmonthlyexpenses").val(data.avgMonthlyExpenses);
      $(".displayavgmonthlyexpenses").html(data.avgMonthlyExpenses);

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
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/bankdetails/"+id+"";
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
    "pageNo": 1,
    "pageSize": 10
  },
   "sortBy":"loanRequestedDate",
   "sortOrder" : "DESC"
}


 var postData = JSON.stringify(postData);
console.log(postData);
 var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    
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
 var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    
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
 var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    
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
    var signoutUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/logout";

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

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
  
   postData= { "leftOperand": {
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
            }
var postData = JSON.stringify(postData);
console.log(postData);
   var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/request/search";
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
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
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
        "pageNo": 1,
        "pageSize": 9
    },
     "sortBy":"loanRequestedDate",
     "sortOrder" : "DESC"
  }
}


  var postData = JSON.stringify(postData);
  console.log(postData);
  var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
         var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
  var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
         var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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

function readProfilePicture(input) {
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
     $('.getFromProfileSec .file-upload-image').attr('src', e.target.result);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   //var files = input.files[0];
   //alert(result);
   var files = result;
   //var files = input.files[0];
   fd.append('PROFILEPIC',files);

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


function downloadProfilePic(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");
 var getProfilePic = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PROFILEPIC";

 $.ajax({
    url:getProfilePic,
    type:"GET",
    success: function(data,textStatus,xhr){
     console.log(data);
     if(data.downloadUrl != ""){
        $(".userPicArea").attr("src", data.downloadUrl);
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


function readProfilePicture(input) {
  //alert(res;
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
     $('.getFromProfileSec .file-upload-image').attr('src', e.target.result);
   };

   reader.readAsDataURL(input.files[0]);

   var fd = new FormData();
   //var files = input.files[0];
   //alert(result);
   //var files = e.target.result;
   var files = input.files[0];
   fd.append('PROFILEPIC',files);

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
             downloadProfilePic();
             
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