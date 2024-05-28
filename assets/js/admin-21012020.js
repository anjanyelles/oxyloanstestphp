userisIn = "prod";

$(document).ready(function() {
  //$(".viewPan").colorbox();
    // $(".viewaadhar").colorbox({rel:'viewaadhar'});
   // $(".viewpassport"s).colorbox({rel:'viewpassport'});

  console.log(userisIn);
  viewEMICARD(); 
totalEntries=0;
$(".deleteSession").click(function(){
    signout();
});

 $('.sendActivationLink').click( function() {

 });

 $('.btn-submitFeeinfo').click( function() {
    var loanIDis = $('.loandId').val();
    var userType = $('.userType').val();
    var amount = $('.enteredFeeValue').val();

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanIDis+"/feepaid?primaryType="+userType;
}else{
// https://fintech.oxyloans.com/oxyloans/
    var adminUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+loanIDis+"/feepaid?primaryType="+userType;
}

    //var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanIDis+"/feepaid?primaryType="+userType;
    var postData ={"feePaid":amount};
    var postData = JSON.stringify(postData);
    console.log(postData);

    $.ajax({
      url:adminUrl,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
          $('#modal-feeStatus').modal('show');
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });
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
    //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/ADMIN/request/"+requestID+"/download";
      //alert(getStatUrl);
     
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/ADMIN/request/"+requestID+"/download";
}else{
// https://fintech.oxyloans.com/oxyloans/
    var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/ADMIN/request/"+requestID+"/download";
}


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


//*********     LENDER/BORROWER LOAN APPLICATION SEARCH STARTS **********//
$('#lenderSearch,#borrowerSearch').on('change', function() {
   if($('#lenderSearch,#borrowerSearch').val() == 'name') {
            $(".name").show();
            $('.id,.roi,.amount,.oxyscore,.mobileNumber,.city').hide();
           

        } else if($('#lenderSearch,#borrowerSearch').val() == 'id'){
             $('.name,.roi,.amount,.oxyscore,.mobileNumber,.city').hide();
         
            $(".id").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'amount'){
            $('.name,.roi,.id,.oxyscore,.mobileNumber,.city').hide();

            $(".amount").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'roi'){
            $('.name,.roi,.amount,.oxyscore,.mobileNumber,.city').hide();

            $(".roi").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'oxyscore'){
           $('.name,.roi,.amount,.id,.mobileNumber,.city').hide();
            $(".oxyscore").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'city'){
           $('.name,.roi,.amount,.id,.mobileNumber,.oxyscore').hide();
            $(".city").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'mobileNumber'){
           $('.name,.roi,.amount,.id,.city,.oxyscore').hide();
            $(".mobileNumber").show();
      }else {
              $('.name,.roi,.amount,.id,.oxyscore,.mobileNumber,.city').hide();
            
        } 
});
//*********     LENDER/BORROWER LOAN APPLICATION SEARCH ENDS  **********//


//*********     RUNNING/CLOSED LOANS  SEARCH STARTS **********//

$('#Search').on('change', function() {

  if($('#Search').val() == 'loanID') {
             $(".loanid").show();
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide();
             $('.mobileNumber').hide(); 
        } else if($('#Search').val() == 'appID'){
             $(".applicationid").show();
             $('.loanid').hide();  
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
              $('.mobileNumber').hide(); 
        }else if($('#Search').val() == 'lenderID'){
             $(".lenderid").show();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
         $('.mobileNumber').hide(); 
        }else if($('#Search').val() == 'borrowerID'){
           $('.borrowerid').show(); 
           $(".city").hide();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide();
              $('.mobileNumber').hide();  
        }else if($('#Search').val() == 'roi'){
             $(".roi").show();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
              $('.mobileNumber').hide(); 
        }
        else if($('#Search').val() == 'amount'){
           $(".amount").show();
            $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide();  
             $('.city').hide(); 
        } else if($('#Search').val() == 'city'){
           $(".city").show();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
              $('.mobileNumber').hide(); 

        }else if($('#Search').val() == 'mobileNumber'){
           $('.mobileNumber').show(); 
             $(".city").hide();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             
        } else if($('#Search').val() == 'userName'){
             $('.userName').show(); 
            $('.mobileNumber').hide(); 
             $(".city").hide();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
        } else if($('#Search').val() == 'city'){
             $('.city').show(); 
             $('.userName').hide(); 
             $('.mobileNumber').hide(); 
             $(".city").hide();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
        } else {
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
             $('.mobileNumber').hide(); 

            
        } 
});

//*********     RUNNING/CLOSED LOANS  SEARCH ENDS **********//

  
      
});


// ***************** DASHBOARD DATA*****************///
 
 function loadadminDashbord (){
    //alert(1);
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    
  //var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/dashboard/"+primaryType+"?current=false";
  
  if(userisIn == "local"){
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/dashboard/"+primaryType+"?current=false";
  }else{
  // https://fintech.oxyloans.com/oxyloans/
   var adminUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+id+"/dashboard/"+primaryType+"?current=false";
  }


    $.ajax({
      url:adminUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
        console.log(data);
        $(".registeredusers").html(data.registeredUsersCount);
        $(".totalLenders").html(data.lendersCount);
        $(".totalBorrowers").html(data.borrowersCount);
        $(".todaysUsers").html(data.todayRegisteredUsersCount);
        $(".totalborrowersRequestedAmount").html(data.borrowersRequestedAmount);
        $(".totallendersCommitedAmount").html(data.lendersCommitedAmount);
        $(".toatalAgreements").html(data.noOfAggrements);
        $(".totalConversationStage").html(data.noOfConversationRequests);
       
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });
 
 }       

//***************** DASHBOARD DATA ENDS*****************//



///**************** Latest loan Agreements************//

function loadadminLatestloanAgreements(){
       
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
     var postData ={
        "leftOperand": {
          "leftOperand": {
            "fieldName": "lenderFeePaid",
            "fieldValue": "false",
            "operator": "EQUALS"
          },
          "logicalOperator": "OR",
          "rightOperand": {
            "fieldName": "borrowerFeePaid",
            "fieldValue": "false",
            "operator": "EQUALS"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValues": [
            "Active"
          ],
          "operator": "IN"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
        "sortBy": "loanId",
        "sortOrder": "DESC"
        }
   var postData = JSON.stringify(postData);
   //var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";
  console.log(postData);

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
   var adminUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";

}

    $.ajax({
      url:adminUrl,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        var template = document.getElementById('adminuserstatus').innerHTML;
        Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
       $('#displaylists').html(html);
         var displayPageNo = data.totalCount/3;
        displayPageNo = displayPageNo+1;
        $('.latestloanAgreementsPagination').bootpag({
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
          var postData ={
            "leftOperand": {
              "leftOperand": {
                "fieldName": "lenderFeePaid",
                "fieldValue": "false",
                "operator": "EQUALS"
              },
              "logicalOperator": "OR",
              "rightOperand": {
                "fieldName": "borrowerFeePaid",
                "fieldValue": "false",
                "operator": "EQUALS"
              }
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "loanStatus",
              "fieldValues": [
                "Active"
              ],
              "operator": "IN"
            },
            "page": {
              "pageNo": num,
              "pageSize": 10
            },
            "sortBy": "loanId",
            "sortOrder": "DESC"
            }
   var postData = JSON.stringify(postData);
  
  //var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";
  
  if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var adminUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";

}
    $.ajax({
      url:adminUrl,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        var template = document.getElementById('adminuserstatus').innerHTML;
        Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
       $('#displaylists').html(html);
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

///**************** Latest loan Agreements ENDS************//
 
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
    if(suserId == ""){
       window.location = "userlogin";   
    }
     
}


function feePaidClick(id, userType){
      // Modal BoxOpen
      // Input with submit Button
      // On Submit  send the ajax call  
      var loanId = id;
      var primaryType = userType;
      var amount = $('.enteredFeeValue').val();
      $("#modal-feePaid").modal("show");
      $(".loandId").val(loanId);
       $(".userType").val(primaryType);
      responsepaidinfo(loanId, primaryType, amount)     
}


function responsepaidinfo(loanId, primaryType, amount){

    //Are you sure? 
   //var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanId+"/feepaid?primaryType="+primaryType;
    
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
   var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanId+"/feepaid?primaryType="+primaryType;

}else{
// https://fintech.oxyloans.com/oxyloans/
   var adminUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+loanId+"/feepaid?primaryType="+primaryType;

}



    $.ajax({
      url:adminUrl,
      type:"POST",
      success: function(data,textStatus,xhr){
      console.log(data);
     // alert(1);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });
}





function loadLendersApplications(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

   // var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}


    var postData =  {
          "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": "LENDER",
           "operator": "EQUALS"
           },
           
           "logicalOperator": "AND",

           "rightOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
           },
           "page": {
           "pageNo": 1,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        };

    var postData = JSON.stringify(postData);    
    console.log(postData);
    $.ajax({
      url:getLenders,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
      data:postData,
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       // console.log(totalEntries);
       var template = document.getElementById('loadLendersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
         $('#loadLendersList').html(html);
   for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].lenderKycDocuments.length; j++){
           var docType=data.results[i].lenderKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].lenderUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }


         bindCommentsClick();
        
         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
 /*888888888888888*/
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
      
        
     var postData =  {
          "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": "LENDER",
           "operator": "EQUALS"
           },
           
           "logicalOperator": "AND",

           "rightOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
           },
           "page": {
           "pageNo": num,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        };


        //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
        var postData = JSON.stringify(postData);
        console.log(postData);
        if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
          var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
          var getLenders = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}
          //var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
          $.ajax({
            url:getLenders,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loadLendersListTpl').innerHTML;
             //console.log(template);
             Mustache.parse(template);
             //var html = Mustache.render(template, data);
             var html = Mustache.to_html(template, {data: data.results});
             

             //alert(html);
             $('#loadLendersList').html(html);
             bindCommentsClick();   
          

            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
         });
        });  
         /*888888888888888*/         
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });

    

}

function loadBorrowerApplications(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    //var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}
    var postData =  {
          "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": "BORROWER",
           "operator": "EQUALS"
           },
           
           "logicalOperator": "AND",

           "rightOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
           },
           "page": {
           "pageNo": 1,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        };

    var postData = JSON.stringify(postData);    

    $.ajax({
      url:getLenders,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
      data:postData,
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       // console.log(totalEntries);
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
         $('#loadBorrowersList').html(html);

  for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
           var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }


         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
         //$(".viewPan").colorbox();
          bindCommentsClick();

         /*888888888888888*/
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
      
        
     var postData =  {
          "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": "BORROWER",
           "operator": "EQUALS"
           },
           
           "logicalOperator": "AND",

           "rightOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
           },
           "page": {
           "pageNo": num,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        };

        //$(".viewPan").colorbox();
        //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
        var postData = JSON.stringify(postData);
        console.log(postData);
        if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
          var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
          var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}
         // var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
          $.ajax({
            url:getLenders,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loadBorrowersListTpl').innerHTML;
             //console.log(template);
             Mustache.parse(template);
             //var html = Mustache.render(template, data);
             var html = Mustache.to_html(template, {data: data.results});
             

             //alert(html);
             $('#loadBorrowersList').html(html);
             bindCommentsClick();
                  

            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
         });
        });  
         /*888888888888888*/
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });

}



function loadLoans(recordsType){
    
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
    //alert(recordsType);

    var postData = {
            "fieldName": "loanStatus",
            "fieldValue" : recordsType,
            "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanId",
         "sortOrder" : "DESC"
      }


     var postData = JSON.stringify(postData);
    console.log(postData);
   

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}


   // var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
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
               var template = document.getElementById('displayRecordsTpl').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
            $('#displayRecords').html(html);
            var displayPageNo = totalEntries/10;
            displayPageNo = displayPageNo+1;
          $('.runningLoansPagination').bootpag({
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
            "fieldName": "loanStatus",
            "fieldValue" : recordsType,
            "operator": "EQUALS",
              "page": {
                "pageNo": num,
                "pageSize": 10
              },
               "sortBy":"loanId",
               "sortOrder" : "DESC"
            }



      //viewEMICARD()
     var postData = JSON.stringify(postData);
    console.log(postData);
     //var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

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
            
               var template = document.getElementById('displayRecordsTpl').innerHTML;
                         Mustache.parse(template);
               var html = Mustache.render(template, data);
               var html = Mustache.to_html(template, {data: data.results});
            
               $('#displayRecords').html(html);
               viewEMICARD();
           
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


function bindCommentsClick(){
   $('.updateComments').click( function() {
        $("#modal-comments").modal("show");
        var laonID = $(this).attr("data-loanid");
        var currComment = $('.updateComments-'+laonID).html();
        $(".adminComment").val(currComment);
        $(".saveCommentBtn").attr("data-clickedid", laonID);
  });
}



function postComment(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getUpdatedComment = $(".adminComment").val();
    var getLoanId= $('.saveCommentBtn').attr("data-clickedid");
    var hereisUpdatedComment = $(".adminComment").val();

    //var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/"+getLoanId+"/comment";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/"+getLoanId+"/comment";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/"+getLoanId+"/comment";

}
    var postData =  {"comments": hereisUpdatedComment};

    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateCommentUrl,
      type:"PATCH",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        // console.log(data);
        // console.log("------- "+getLoanId+" "+hereisUpdatedComment);
        $(".updateComments-"+getLoanId).html(hereisUpdatedComment);
        $("#modal-commentSuccesss").modal("show");
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



function postOxyscore(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    //var getUpdatedOxyscore= $(".userOxyScore").val();
    var getuserID = $('.postOxyscore').attr("data-clickedid");
    var hereisUpdatedOxyscore = $(".userOxyScore").val();

    console.log(hereisUpdatedOxyscore);
    console.log(getuserID);
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var updateOxyscoreUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+getuserID+"/oxyscore";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var updateOxyscoreUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+getuserID+"/oxyscore";

}

    //var updateOxyscoreUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+getuserID+"/oxyscore";

    var postData =  {"oxyScore": hereisUpdatedOxyscore};

    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateOxyscoreUrl,
      type:"PATCH",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $("#modal-oxyscoreSuccesss").modal("show");
      } ,
    
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}

function viewEMICARD(){
$('.viewEMIcard').click( function() {
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = $(this).attr("data-loanid");
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



function viewDoc(userID,doctype){
  console.log(userID);
  console.log(doctype);
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var doctype = doctype;

  //var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/"+doctype;

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userID+"/download/"+doctype;

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
		     var typeContacts  =  ".txt";
          if(sourcePath.indexOf(contentTypeCheck) != -1){
              alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
              window.open(data.downloadUrl,'_blank');
          }else if(sourcePath.indexOf(typeContacts) != -1){              
              window.open(data.downloadUrl,'_blank');
          }
		  else{
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



function updatingEMI(loanid, emino){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanid;
    var emiNo = emino;
    //var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/emipaid";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/emipaid";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/emipaid";

}
    var postData =  {"comments": ""};
    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateEmiUrlCard,
      type:"POST",
      contentType:"application/json",
      dataType:"json",
        data: postData,
      success: function(data,textStatus,xhr){
        // $("#modal-viewEMI").modal("hide");
        //$("#modal-updataedEMI").modal("show");
         
      } ,
      statusCode : {
        400: function (response) {
            //$("#modal-agreement-already").modal("show");                   
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


function updateEMIStatus(loanid, emino){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanid;
    var emiNo = emino;
    //var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/eminotreceived";
   // var postData =  {"comments": ""};
   // var postData = JSON.stringify(postData);    
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/eminotreceived";

}else{
// https://fintech.oxyloans.com/oxyloans/
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/eminotreceived";

}
    $.ajax({
      url:updateEmiUrlCard,
      type:"PATCH",
      success: function(data,textStatus,xhr){
      console.log(data);
      } ,
      statusCode : {
        400: function (response) {
            //$("#modal-agreement-already").modal("show");                   
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

function oxyscore(userID){
    $("#modal-oxyscore").modal("show");
    var userID = userID;
    $(".postOxyscore").attr("data-clickedid", userID);
}



function UpdatePreclose(){
  $('.loadingSec').show();
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var localLoanId = $(".getLoanID").attr("data-loanId");

    loanId = localLoanId;



if(userisIn == "local"){
    var precloseUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanId+"/loanpreclose";
}else{
    var precloseUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/"+loanId+"/loanpreclose";

}
    $.ajax({
      url:precloseUrl,
      type:"POST",
      success: function(data,textStatus,xhr){
        $('.loadingSec').hide();
        $("#modal-preclose").modal("show");
      },
      error: function(xhr,textStatus,errorThrown){
        
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",accessToken);
      }
   });
}





function searchUsers(userType){

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  console.log('in search function');
  var userSelecctedOption = $('.choosenType').val();
  console.log("userSelecctedOption: "+ userSelecctedOption);
  var lenderid = $(".lenderid input").val();
  lenderid = lenderid.substr(2);

  var borrowerid = $(".borrowerid input").val();
  borrowerid = borrowerid.substr(2);

var loanId=(".loanid").val();
  loanId = loanId.substr(2);

  console.log("lender id "+lenderid);
  console.log("User Type: "+ userType);
  console.log("borrowerid is :"+ borrowerid);
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
     var  fieldValueforSearch = "LENDER";
  }else{
     var  fieldValueforSearch = "BORROWER";
  }

if(userSelecctedOption == "amount"){
  var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": userType
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
}else if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "lenderUserId",
      "fieldValue": lenderid,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
}else if(userSelecctedOption == "lenderID"){
  var postData = {
      "fieldName": "lenderUserId",
      "fieldValue": loanId,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else if(userSelecctedOption == "borrowerID"){
  var postData = {
      "fieldName": "borrowerUserId",
      "fieldValue": borrowerid,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": userType
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
  // var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

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
       //  $(".nodata-pl").hide();
       var template = document.getElementById('displayRecordsTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#displayRecords').html(html);
      var displayPageNo = totalEntries/10;
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
         var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

}

         //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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



function searchUsersPhase1(userType){
 suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  console.log('in search function');
  var userSelecctedOption = $('.choosenType').val();
  console.log("userSelecctedOption: "+ userSelecctedOption);
  var lenderid = $(".lenderid input").val();
  lenderid = lenderid.substr(2);

  var borrowerid = $(".borrowerid input").val();
  borrowerid = borrowerid.substr(2);

  if(userSelecctedOption == "mobileNumber"){
    var mobileNumber = $(".mobileNumber input").val();
    console.log(mobileNumber);
  }

  if(userSelecctedOption == "userName"){
    var userName = $(".userName input").val();
    console.log(userName);
  }

  if(userSelecctedOption == "city"){
    var city = $(".city input").val();
    console.log(city);
  }

  console.log("lender id "+lenderid);
  console.log("User Type: "+ userType);
  console.log("borrowerid is :"+ borrowerid);
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
     var  fieldValueforSearch = "LENDER";
  }else{
     var  fieldValueforSearch = "BORROWER";
  }
if(userSelecctedOption == "mobileNumber"){
  var postData ={
    "leftOperand": {
        "logicalOperator": "AND",
        "rightOperand": {
           "fieldName": "user.mobileNumber",
            "operator": "EQUALS",
            "fieldValue": mobileNumber
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": userType,
            "operator": "EQUALS"
        }
    },

    "logicalOperator": "AND",

    "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
    },
    "page": {
        "pageNo": 1,
        "pageSize": 10
    },
    "sortBy": "loanRequestedDate",
    "sortOrder": "DESC"
  }
}else if(userSelecctedOption == "userName"){
  var postData = {
    "leftOperand": {
        "logicalOperator": "AND",
        "rightOperand": {
            "logicalOperator": "OR",
            "rightOperand": {
                "fieldName": "user.personalDetails.firstName",
                "operator": "LIKE",
                "fieldValue": userName
            },
            "leftOperand": {
                "fieldName": "user.personalDetails.lastName",
                "operator": "LIKE",
                "fieldValue": userName
            }
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": userType,
            "operator": "EQUALS"
        }
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
    },
    "page": {
        "pageNo": 1,
        "pageSize": 100
    },
    "sortBy": "loanRequestedDate",
    "sortOrder": "DESC"
  }
} else if(userSelecctedOption == "city"){
 /* var postData = {
        "leftOperand": {
          "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": userType,
            "operator": "EQUALS"
          },
          "logicalOperator": "AND",
          "rightOperand": {
            "fieldName": "user.personalDetails.address",
            "fieldValue": city,
            "operator": "LIKE"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
          "fieldName": "parentRequestId",
          "operator": "NULL"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 100
        },
        "sortBy": "loanRequestedDate",
        "sortOrder": "DESC"
        }*/

var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":userType,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.city",
        "fieldValue":city,
        "operator":"ILIKE"
      }
    },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      }
    },
"logicalOperator":"OR",
"rightOperand":{
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":userType,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.personalDetails.address",
      "fieldValue":city,
      "operator":"ILIKE"
    }
  },
  "logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"parentRequestId",
    "operator":"NULL"
  }
}
}




  }else{
     var postData = { 
            "leftOperand": {
              "fieldName": "userId",
              "fieldValue": borrowerid,
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "parentRequestId",
              "operator": "NULL"
            },
            "page": {
              "pageNo": 1,
              "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
   }       

  var postData = JSON.stringify(postData);
  console.log(postData);
  // var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/Borrower/request/search";
  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
  //var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
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
       //  $(".nodata-pl").hide();
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersList').html(html);
      bindCommentsClick();
      var displayPageNo = totalEntries/10;
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
       userSelecctedOption  = $('.choosenType').val();
       // alert(userSelecctedOption);
       if(userSelecctedOption == "mobileNumber"){
      var postData ={
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                   "fieldName": "user.mobileNumber",
                    "operator": "EQUALS",
                    "fieldValue": mobileNumber
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue": userType,
                    "operator": "EQUALS"
                }
            },

            "logicalOperator": "AND",

            "rightOperand": {
                "fieldName": "parentRequestId",
                "operator": "NULL"
            },
            "page": {
                "pageNo": 1,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
        }else if(userSelecctedOption == "userName"){
          var postData = {
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                    "logicalOperator": "OR",
                    "rightOperand": {
                        "fieldName": "user.personalDetails.firstName",
                        "operator": "LIKE",
                        "fieldValue": userName
                    },
                    "leftOperand": {
                        "fieldName": "user.personalDetails.lastName",
                        "operator": "LIKE",
                        "fieldValue": userName
                    }
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue": userType,
                    "operator": "EQUALS"
                }
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "fieldName": "parentRequestId",
                "operator": "NULL"
            },
            "page": {
                "pageNo": 1,
                "pageSize": 100
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
        } else if(userSelecctedOption == "city"){
          /*var postData = {
                "leftOperand": {
                  "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue": userType,
                    "operator": "EQUALS"
                  },
                  "logicalOperator": "AND",
                  "rightOperand": {
                    "fieldName": "user.personalDetails.address",
                    "fieldValue": city,
                    "operator": "LIKE"
                  }
                },
                "logicalOperator": "AND",
                "rightOperand": {
                  "fieldName": "parentRequestId",
                  "operator": "NULL"
                },
                "page": {
                  "pageNo": 1,
                  "pageSize": 100
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
                }*/
var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":userType,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.city",
        "fieldValue":city,
        "operator":"ILIKE"
      }
    },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      }
    },
"logicalOperator":"OR",
"rightOperand":{
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":userType,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.personalDetails.address",
      "fieldValue":city,
      "operator":"ILIKE"
    }
  },
  "logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"parentRequestId",
    "operator":"NULL"
  }
}
}




          }else{
             var postData = { 
                    "leftOperand": {
                      "fieldName": "userId",
                      "fieldValue": borrowerid,
                      "operator": "EQUALS"
                    },
                    "logicalOperator": "AND",
                    "rightOperand": {
                      "fieldName": "parentRequestId",
                      "operator": "NULL"
                    },
                    "page": {
                      "pageNo": 1,
                      "pageSize": 10
                    },
                    "sortBy": "loanRequestedDate",
                    "sortOrder": "DESC"
                  }
   }
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
        if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
         var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}
         //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
             bindCommentsClick();
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

function searchRunningloans(){

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  console.log('in search function');
  var userSelecctedOption = $('.choosenType').val();
  console.log("userSelecctedOption: "+ userSelecctedOption);
 
  var lenderid = $(".lenderid input").val();
 lenderid = lenderid.substr(2);

  var borrowerid = $(".borrowerid input").val();
  borrowerid = borrowerid.substr(2);

var loanId=$(".loanid  input").val();
 loanId = loanId.substr(2);
 

 console.log("loanId "+loanId);
 console.log("lender id "+lenderid);
 console.log("borrowerid is :"+ borrowerid);
  
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
     var  fieldValueforSearch = "LENDER";
  }else if(primaryType == "ADMIN"){
     var  fieldValueforSearch = "ADMIN";
  }else{
    var  fieldValueforSearch = "BORROWER";
  }

if(userSelecctedOption == "amount"){
  var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": userType
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
}else if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "id",
      "fieldValue":loanId ,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
}else if(userSelecctedOption == "lenderID"){
  var postData = {
      "leftOperand": {
        "fieldName": "lenderUserId",
        "fieldValue": lenderid,
        "operator": "EQUALS",
      },
      "logicalOperator": "AND",
      "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValue": "Active",
          "operator": "EQUALS"
        },
        "page": {
            "pageNo": 1,
            "pageSize": 200
        },
        "sortBy": "loanId",
        "sortOrder": "ASC"
  }
} else if(userSelecctedOption == "borrowerID"){
  var postData = {
      "leftOperand": {
        "fieldName": "borrowerUserId",
        "fieldValue": borrowerid,
        "operator": "EQUALS",
      },
      "logicalOperator": "AND",
      "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValue": "Active",
          "operator": "EQUALS"
        },      
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": userType
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
  // var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

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
        $('.totalActiveLoans').show();
        $('.totalActiveLoans').html("Total Active Loans are "+totalEntries);
       //  $(".nodata-pl").hide();
       var template = document.getElementById('displayRecordsTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#displayRecords').html(html);
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;
      //alert("loading is done");

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
        "fieldValue": userType
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
}else if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "lenderUserId",
      "fieldValue": loanId,
      "operator": "EQUALS",
      "page": {
          "pageNo": num,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
}else if(userSelecctedOption == "lenderID"){
  var postData = {
      "fieldName": "lenderUserId",
      "fieldValue":  lenderid,
      "operator": "EQUALS",
      "page": {
          "pageNo": num,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else if(userSelecctedOption == "borrowerID"){
  var postData = {
      "fieldName": "borrowerUserId",
      "fieldValue": borrowerid,
      "operator": "EQUALS",
      "page": {
          "pageNo": num,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": userType
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
        "pageSize": 9
    }
  }
}
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
       
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
 var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

}

         //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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





function searchLenderUers(usertype){

suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  var userSelecctedOption = $('.choosenType').val();
  console.log("userSelecctedOption: "+ userSelecctedOption);
  
  var lenderid = $(".id input").val();
  lenderid = lenderid.substr(2);

 

 console.log("lender id "+lenderid);
 console.log("usertype "+usertype);

 var Name=$(".name input").val();
   console.log("Name "+Name);

  if(userSelecctedOption == "mobileNumber"){
    var mobileNumber = $(".mobileNumber input").val();
    console.log(mobileNumber);
  }


  if(userSelecctedOption == "city"){
    var city = $(".city input").val();
    console.log(city);
  }
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
     var  fieldValueforSearch = "LENDER";
  }else{
    var  fieldValueforSearch = "BORROWER";
  }

if(userSelecctedOption == "amount"){
  var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":usertype
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
}else if(userSelecctedOption == "mobileNumber"){
  var postData ={
    "leftOperand": {
        "logicalOperator": "AND",
        "rightOperand": {
           "fieldName": "user.mobileNumber",
            "operator": "EQUALS",
            "fieldValue": mobileNumber
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": fieldValueforSearch,
            "operator": "EQUALS"
        }
    },

    "logicalOperator": "AND",

    "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
    },
    "page": {
        "pageNo": 1,
        "pageSize": 10
    },
    "sortBy": "loanRequestedDate",
    "sortOrder": "DESC"
  }
}else if(userSelecctedOption == "city"){
 /* var postData = {
        "leftOperand": {
          "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": fieldValueforSearch,
            "operator": "EQUALS"
          },
          "logicalOperator": "AND",
          "rightOperand": {
            "fieldName": "user.personalDetails.address",
            "fieldValue": city,
            "operator": "LIKE"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
          "fieldName": "parentRequestId",
          "operator": "NULL"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 100
        },
        "sortBy": "loanRequestedDate",
        "sortOrder": "DESC"
        }*/
var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":usertype,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.city",
        "fieldValue":city,
        "operator":"ILIKE"
      }
    },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      }
    },
"logicalOperator":"OR",
"rightOperand":{
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":usertype,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.personalDetails.address",
      "fieldValue":city,
      "operator":"ILIKE"
    }
  },
  "logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"parentRequestId",
    "operator":"NULL"
  }
}
}




}else if(userSelecctedOption == "name"){
          var postData = {
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                    "logicalOperator": "OR",
                    "rightOperand": {
                        "fieldName": "user.personalDetails.firstName",
                        "operator": "LIKE",
                        "fieldValue": Name
                    },
                    "leftOperand": {
                        "fieldName": "user.personalDetails.lastName",
                        "operator": "LIKE",
                        "fieldValue": Name
                    }
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue": fieldValueforSearch,
                    "operator": "EQUALS"
                }
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "fieldName": "parentRequestId",
                "operator": "NULL"
            },
            "page": {
                "pageNo": 1,
                "pageSize": 100
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
}else if(userSelecctedOption == "id"){
  var postData = {
      "leftOperand": {
              "fieldName": "userId",
              "fieldValue": lenderid,
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "parentRequestId",
              "operator": "NULL"
            },
            "page": {
              "pageNo": 1,
              "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
  }
} else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": usertype
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
  // var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

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
       //  $(".nodata-pl").hide();
       var template = document.getElementById('loadLendersListTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadLendersList').html(html);
      var displayPageNo = totalEntries/10;
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
        "fieldValue":usertype
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
}else if(userSelecctedOption == "mobileNumber"){
  var postData ={
    "leftOperand": {
        "logicalOperator": "AND",
        "rightOperand": {
           "fieldName": "user.mobileNumber",
            "operator": "EQUALS",
            "fieldValue": mobileNumber
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": fieldValueforSearch,
            "operator": "EQUALS"
        }
    },

    "logicalOperator": "AND",

    "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
    },
    "page": {
        "pageNo": num,
        "pageSize": 10
    },
    "sortBy": "loanRequestedDate",
    "sortOrder": "DESC"
  }
}else if(userSelecctedOption == "city"){
  /*var postData = {
        "leftOperand": {
          "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue": fieldValueforSearch,
            "operator": "EQUALS"
          },
          "logicalOperator": "AND",
          "rightOperand": {
            "fieldName": "user.personalDetails.address",
            "fieldValue": city,
            "operator": "LIKE"
          }
        },
        "logicalOperator": "AND",
        "rightOperand": {
          "fieldName": "parentRequestId",
          "operator": "NULL"
        },
        "page": {
          "pageNo": num,
          "pageSize": 100
        },
        "sortBy": "loanRequestedDate",
        "sortOrder": "DESC"
        }*/

var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":usertype,
        "operator":"EQUALS"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.city",
        "fieldValue":city,
        "operator":"ILIKE"
      }
    },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      }
    },
"logicalOperator":"OR",
"rightOperand":{
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":usertype,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.personalDetails.address",
      "fieldValue":city,
      "operator":"ILIKE"
    }
  },
  "logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"parentRequestId",
    "operator":"NULL"
  }
}
}

        
}else if(userSelecctedOption == "name"){
          var postData = {
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                    "logicalOperator": "OR",
                    "rightOperand": {
                        "fieldName": "user.personalDetails.firstName",
                        "operator": "LIKE",
                        "fieldValue": Name
                    },
                    "leftOperand": {
                        "fieldName": "user.personalDetails.lastName",
                        "operator": "LIKE",
                        "fieldValue": Name
                    }
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue": fieldValueforSearch,
                    "operator": "EQUALS"
                }
            },
            "logicalOperator": "AND",
            "rightOperand": {
                "fieldName": "parentRequestId",
                "operator": "NULL"
            },
            "page": {
                "pageNo": num,
                "pageSize": 100
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
}else if(userSelecctedOption == "id"){
  var postData = {
      "leftOperand": {
              "fieldName": "userId",
              "fieldValue": lenderid,
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "parentRequestId",
              "operator": "NULL"
            },
            "page": {
              "pageNo": num,
              "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
  }
} else{
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue": usertype
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
        "pageSize": 9
    }
  }
}
        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
       
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}else{
// https://fintech.oxyloans.com/oxyloans/
         var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}

         //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
          $.ajax({
            url:getStatUrl,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loadLendersListTpl').innerHTML; 
             Mustache.parse(template);
             var html = Mustache.to_html(template, {data: data.results});
             
             $('#loadLendersList ').html(html);
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

function viewPAN(userID){
  console.log(userID);
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  //var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";
if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";

}else{
// https://fintech.oxyloans.com/oxyloans/
  var getPAN = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userID+"/download/PAN";

}
   $.ajax({
      url:getPAN,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
       if(data.downloadUrl != ""){
          //$('.pan-image-upload-wrap, .pan-uploadedButton').hide();
          // $('.pan-file-upload-content').show();
          //$(".panImage").attr('src',data.downloadUrl); 
          console.log(data.downloadUrl);
          window.open(data.downloadUrl,'_blank');
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

function getKYC(){
 suserId = getCookie("sUserId");
 sprimaryType = getCookie("sUserType");
 saccessToken = getCookie("saccessToken");

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
var getPASSPORT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
var getAADHAR = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/AADHAR";
var getBANKSTATEMENT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";
}else{
// https://fintech.oxyloans.com/oxyloans/
var getPASSPORT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
var getAADHAR = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/AADHAR";
var getBANKSTATEMENT = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";
}


//var getPASSPORT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
//var getAADHAR = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/AADHAR";
//var getBANKSTATEMENT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";

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

              $.ajax({
                url:getBANKSTATEMENT,
                type:"GET",
                success: function(data,textStatus,xhr){
                 console.log(data);
                 if(data.downloadUrl != ""){
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

}


function signout(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
if(userisIn == "local"){
    var signoutUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/logout";
}else{
    var signoutUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/logout";

}
    $.ajax({
      url:signoutUrl,
      type:"POST",
      success: function(data,textStatus,xhr){
        writeCookie('sUserId', "");
        writeCookie('sUserType', "");
        writeCookie('saccessToken', "");
        window.location = "https://oxyloans.com/new/userlogin";
        //window.location = "userlogin";

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
        window.location = "https://oxyloans.com/new/userlogin";
        //window.location = "userlogin";
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",accessToken);
      }
   });
}


/*

function updateComments(laonID){
    console.log(laonID);
    $("#modal-comments").modal("show");
    var laonID = $(this).attr("data-loanid");
    var currComment = $(this).attr("data-currComment")
    $(".adminComment").val(currComment);
    $(".saveCommentBtn").attr("data-clickedid", laonID);
}

*/



function changePrimarytype(userType,id){
   $('#modal-change-primarytype').modal('show');
   $(".yesChangeUsesr").attr("data-reqID", id);
   $(".yesChangeUsesr").attr("data-type", userType);
}

function displayLoanInformation(loanID){
  $(".displayAllLoansInfo").hide();
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanID;
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
        $(".displayLoanInformation-"+loanID).show();
        var template = document.getElementById('emiRecordsCallTpl').innerHTML;
       //console.log(template);
        Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
        $('#displayEMIRecordsAtAT-'+loanID).html(html);
        //$("#modal-viewEMI").modal("show");
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

function loadEMIsBasedOnRequest(){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  var yearNumber = $(".year").val();
  var monthNumber = $(".month").val();
  console.log("yearNumber " + yearNumber);
  if(yearNumber == "" || yearNumber == null){
    var today = new Date();
    var yearNumber = today.getFullYear(); // Returns 2019
    var monthNumber = today.getMonth(); // Returns month-1
    monthNumber = monthNumber+1;
  }else{
    yearNumber = yearNumber;
    monthNumber = monthNumber;
  }

  if(userisIn == "local"){
      var postDataURL = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/pending/"+yearNumber+"/"+monthNumber;
  }else{
      var postDataURL = "https://fintech.oxyloans.com/oxyloans/v1/user/loan/pending/"+yearNumber+"/"+monthNumber;
  }
  console.log(postDataURL);



      var postData = {
        "fieldName": "loanStatus",
        "fieldValue": "Active",
        "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 50
        },
         "sortBy":"loanId",
         "sortOrder" : "DESC"
      }  
    var postData = JSON.stringify(postData);   
    $('.loadingSec').show();
     $.ajax({
        url:postDataURL,
        type:"POST",
        data:postData,
        contentType:"application/json",
        dataType:"json",
        success: function(data,textStatus,xhr){
         console.log(data);
         var jsonData = data.results;
         $('#downloadPendingEMIInfo').html(jsonData);
         var template = document.getElementById('loadPendingEMIsListTpl').innerHTML; 
         Mustache.parse(template);
         var html = Mustache.to_html(template, {data: data.results});
         //console.log(html);
          $('#loadPendingEMIsList').html(html);
          viewEMICARD();
          $('.loadingSec').hide();
          

          var displayPageNo = data.totalCount/50;
         displayPageNo = displayPageNo+1;
         console.log(data.results.totalCount);
        /*888888888888888*/
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
                  var postData =  {
                      "page": {
                        "pageNo": num,
                        "pageSize": 50
                      },
                      "sortBy":"loanId",
                      "sortOrder" : "DESC"
                  };

                  var postData = JSON.stringify(postData);
                  console.log(postData);
                        $.ajax({
                            url:postDataURL,
                            type:"POST",
                            data:postData,
                            contentType:"application/json",
                            dataType:"json",
                            success: function(data,textStatus,xhr){
                             console.log(data);
                             var jsonData = data.results;
                             $('#downloadPendingEMIInfo').html(jsonData);
                             var template = document.getElementById('loadPendingEMIsListTpl').innerHTML; 
                             Mustache.parse(template);
                             var html = Mustache.to_html(template, {data: data.results});
                             //console.log(html);
                              $('#loadPendingEMIsList').html(html);
                              viewEMICARD();
                              $('.loadingSec').hide();
                              
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

function downloadReportClick(){
  console.log("clicked");
  var dataElementName = $(this).attr("data-varName"); 
  var data = $("#"+dataElementName).html();
  console.log(data);
  data = JSONData;
  downloadReport(JSONData, "EMIs Information", "OxyLoans-Admin-EMI")
}

$(document).ready(function() {
$(".yesChangeUsesr").click(function(){
  $('#modal-change-primarytype').modal('hide');
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    id = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;

    var outSideUserid = $(this).attr("data-reqID");
    var outSidePrimarytype = $(this).attr("data-type");
 console.log(outSideUserid);
  console.log(outSidePrimarytype);

if(userisIn == "local"){
    var primarytypeUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+outSideUserid+"/changeprimarytype/"+outSidePrimarytype+"";
}else{
    var primarytypeUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+outSideUserid+"/changeprimarytype/"+outSidePrimarytype+"";

}

    $.ajax({
      url:primarytypeUrl,
      type:"PATCH",
      success: function(data,textStatus,xhr){
         console.log(data);


      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",accessToken);
      }
   });
});
});


function downloadReport(JSONData, ReportTitle, ShowLabel) {
  console.log("downloading");
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = 'sep=,' + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}



function updateUserStatus(id, status){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
   
  if(userisIn == "local"){
    var updateUserStatus = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/updateuserstatus";
  }else{
    var updateUserStatus = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/updateuserstatus";
  }

    if(status == "ACTIVE"){
      status = "REGISTERED";
    }else{
      status = "ACTIVE";
    }
  //  alert(id+" "+status);  
    var postData ={"id":id, "status": status};
    var postData = JSON.stringify(postData);
    console.log(postData);


  $.ajax({
      url:updateUserStatus,
      type:"PATCH",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
       // alert("user activated");
       $("#modal-useractivate").modal("show");                   

        $('#' + id).prop("disabled", true); 
      },
  statusCode : {
        400: function (response) {
            $("#modal-approveuserKycNotUploaded").modal("show");                   
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

function viewLoanRecord(userID){
  $('.loadingSec').show();
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  alert(userID);
  $('.loadingSec').hide();
  /*Featching Loans Records*/
  var postData = {
      "fieldName": "borrowerUserId",
      "fieldValue": userID,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 100
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  };

  var postData = JSON.stringify(postData);

 if(userisIn == "local"){
     //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
  }else{
  // https://fintech.oxyloans.com/oxyloans/
   var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

  }


  /**************************/
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
       var template = document.getElementById('displayRecordsTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#displayRecords').html(html);
      var displayPageNo = totalEntries/10;
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
       
      
        var postData = {
            "fieldName": "borrowerUserId",
            "fieldValue": userID,
            "operator": "EQUALS",
            "page": {
                "pageNo": num,
                "pageSize": 100
            },
            "sortBy": "loanActiveDate",
            "sortOrder": "ASC"
        }

        var postData = JSON.stringify(postData);
        console.log(postData);
        //alert(1);
       
      if(userisIn == "local"){
        //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
        var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
      }else{
      // https://fintech.oxyloans.com/oxyloans/
       var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

      }

         //var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
/***********************************/




}

function getUserPersonalDetails(userID){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  /*Featching Personal Records*/
  if(userisIn == "local"){
    //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
    var personalDetailsUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+userID+"";
  }else{
   // https://fintech.oxyloans.com/oxyloans/
    var personalDetailsUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+userID+"";
  }

    $.ajax({
      url:personalDetailsUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
        alert(userID);
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





/**************** autocomplete ***************/

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
// var cities = ["Delhi", "Mumbai", "Kolkata", "Chennai", "Bangalore", "Hyderabad", "Pune", "Visakhapatnam", "Vijayawada"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

$(document).ready(function() {
  $( function() {
    var cities = ["Delhi", "Mumbai", "Kolkata", "Chennai", "Bangalore", "Hyderabad", "Pune", "Visakhapatnam", "Vijayawada"];
    $( ".cityInputs" ).autocomplete({
      source: cities
    });
  } );

   setTimeout(function(){ 
      // autocomplete(document.getElementsByClassName("city"), cities);
   }, 5000);
});



/********************* L1,L2,L3 functions Start **********************/ 



function userIntrested(userType,id,adminComments){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
   
  if(userisIn == "local"){
  var updateUserStatus = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
  }else {
    var updateUserStatus = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
  }

 
//console.log(updateUserStatus);
var postData = {"id":id,
"email":"admin@oxyloans.com",
"adminComments":"INTERESTED"
}


    var postData = JSON.stringify(postData);   
  console.log(postData);
  $.ajax({
      url:updateUserStatus,
      type:"PATCH",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        //alert("Updated");
      $("#modal-useractivate").modal("show");                   
      $('#' + id).prop("disabled", true);  
       
        //$(this).addClass("btn-Intrested");
      },
       statusCode : {
        400: function (response) {
            $("#modal-notuploadeddocs").modal("show");

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



function loadIntrestedApplications(){
 
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
 
    if(userisIn == "local"){
  var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else {
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }


/*var postData ={
  "leftOperand":
  {"logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"user.adminComments",
    "operator":"EQUALS",
    "fieldValue":"INTERESTED"
  },"leftOperand":{
    "fieldName":"userPrimaryType",
    "fieldValue":"BORROWER",
    "operator":"EQUALS"
  }
},
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
"page":{
  "pageNo":1,
  "pageSize":10
},
"sortBy":"loanRequestedDate",
"sortOrder":"DESC"
}*/

var postData ={
  "leftOperand":{
    "fieldName":"user.adminComments",
    "fieldValue":"INTERESTED",
    "operator":"EQUALS"
  },
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
 "page": {
           "pageNo": 1,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"

}

 var postData = JSON.stringify(postData);   


   $.ajax({
      url:updateEmiUrlCard,
       data: postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",

      success: function(data,textStatus,xhr){
        console.log(data);
         totalEntries = data.totalCount;
       var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML;
      
       Mustache.parse(template);
      
       var html = Mustache.to_html(template, {data:data.results});
        $('#loadBorrowersInterestedList').html(html);
 for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
           var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }


        bindCommentsClick();

         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
         //$(".viewPan").colorbox();
          bindCommentsClick();

         /*888888888888888*/
         $('.interstedPagination').bootpag({
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
      
        

var postData ={
  "leftOperand":{
    "fieldName":"user.adminComments",
    "fieldValue":"INTERESTED",
    "operator":"EQUALS"
  },
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
 "page": {
           "pageNo": num,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"

}

 var postData = JSON.stringify(postData);   





 
    if(userisIn == "local"){
  var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else {
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }
         
   $.ajax({
      url:updateEmiUrlCard,
       data: postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",

      success: function(data,textStatus,xhr){
        console.log(data);
         totalEntries = data.totalCount;
       var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML;
      
       Mustache.parse(template);
      
       var html = Mustache.to_html(template, {data:data.results});
        $('#loadBorrowersInterestedList').html(html);
        bindCommentsClick();

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



function viewLoanRequests(loanID,id){
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanID;
    var userId=id;
   // alert(userId);
    //alert(getLoanId);
    if(userisIn == "local"){
        var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else{
        var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }

var postData= /*{
  "leftOperand":{
    "leftOperand":{
      "fieldName":"user.adminComments",
      "fieldValue":"INTERESTED",
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"parentRequestId",
      "operator":"NOT_NULL"
    }
  },
"logicalOperator":"OR",

"rightOperand":{
  "fieldName":"parentRequestId",
  "fieldValue":loanID,
  "operator":"EQUALS"
}
}*/
{"leftOperand":
{"leftOperand":{
  "fieldName":"user.id",
  "fieldValue":userId,
  "operator":"EQUALS"
},
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"parentRequestId",
  "operator":"NOT_NULL"
}
},
"logicalOperator":"OR",
"rightOperand":{
  "fieldName":"parentRequestId",
  "fieldValue":loanID,
  "operator":"EQUALS"
}
}

var postData = JSON.stringify(postData);   

    $.ajax({
      url:updateEmiUrlCard,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        $(".viewLoanRequests-"+loanID).show();

           if (data.results.length == 0) {
            $("#displayNoLoanRecords").show();
        }else{
       var template = document.getElementById('loadloanRequestsIntrested').innerHTML;
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
        $('#viewLoanRequestsIntrested-'+loanID).html(html);

              $('#loadBorrowersInterestedList').html(html);
for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].lenderKycDocuments.length; j++){
           var docType=data.results[i].lenderKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].lenderUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }

       
        }
      } ,
    
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}




function userApproved(loanid,lenderid){
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
   var getloanid=loanid;
  // alert(loanid);
   //alert(lenderid);


    //loanid = loanid.substr(2);
  if(userisIn == "local"){
   var updateUserStatus = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
  }else {
    var updateUserStatus = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
  }
  postData = {
"adminComments":"APPROVED",
"loanId":getloanid
}
  
 
//alert(loanid);
    var postData = JSON.stringify(postData);   
  console.log(postData);
  $.ajax({
      url:updateUserStatus,
      type:"PATCH",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
       // alert("Updated");
       $("#modal-userloanApprove").modal("show"); 
                       
        $('#' + lenderid).prop("disabled", true);

      },
       statusCode : {
        400: function (response) {
            $("#modal-userloanApprovestage").modal("show");                   
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


function loadApprovedApplications(){
 
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
 
    if(userisIn == "local"){
   var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else {
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }
   



/*var postData ={
  "leftOperand":
  {"logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"user.adminComments",
    "operator":"EQUALS",
    "fieldValue":"APPROVED"
  },"leftOperand":{
    "fieldName":"userPrimaryType",
    "fieldValue":"BORROWER",
    "operator":"EQUALS"
  }
},
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"parentRequestId",
  "operator":"NULL"
},
"page":{
  "pageNo":1,
  "pageSize":10
},
"sortBy":"loanRequestedDate",
"sortOrder":"DESC"
}*/



 var postData ={
  "fieldName":"adminComments",
 "fieldValue":"APPROVED",
 "operator":"EQUALS",
 "page":{
  "pageNo":1,
  "pageSize":10
},
"sortBy":"loanRequestedDate",
"sortOrder":"DESC"
}
  var postData = JSON.stringify(postData);   

   $.ajax({
      url:updateEmiUrlCard,
      data:postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
     
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       // console.log(totalEntries);
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data:data.results});
         $('#loadBorrowersList').html(html);

  for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
           var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }


                 bindCommentsClick();

         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
         //$(".viewPan").colorbox();
          bindCommentsClick();

         /*888888888888888*/
         $('.approvedPagination').bootpag({
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
      
         var postData ={
  "fieldName":"adminComments",
 "fieldValue":"APPROVED",
 "operator":"EQUALS",
 "page":{
  "pageNo":num,
  "pageSize":10
},
"sortBy":"loanRequestedDate",
"sortOrder":"DESC"
}
  var postData = JSON.stringify(postData);

    if(userisIn == "local"){
   var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else {
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }
      
$.ajax({
      url:updateEmiUrlCard,
      data:postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
     
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       // console.log(totalEntries);
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data:data.results});
         $('#loadBorrowersList').html(html);
                 bindCommentsClick();
 },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   })
})

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });

}


function loadDisbursedApplications(){
 
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
 
    if(userisIn == "local"){
    var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
    }else{
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
    }

  var postData = /*{
            "fieldName": "loanStatus",
            "fieldValue" :"Active",
            "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/
{
  "fieldName":"adminComments",
"fieldValue":"DISBURSED",
"operator":"EQUALS",
"page":{
  "pageNo":1,
  "pageSize":10
},
"sortBy":"loanActiveDate",
"sortOrder":"DESC"
}

     var postData = JSON.stringify(postData);
    console.log(postData);

   $.ajax({
      url:updateEmiUrlCard,
      data:postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
   
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data:data.results});
         $('#loadBorrowersList').html(html);


         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
          
         /*888888888888888*/
         $('.disbursedPagination').bootpag({
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
      
         var postData ={
  "fieldName":"adminComments",
"fieldValue":"DISBURSED",
"operator":"EQUALS",
"page":{
  "pageNo":num,
  "pageSize":10
},
"sortBy":"loanActiveDate",
"sortOrder":"DESC"
}

  var postData = JSON.stringify(postData);

 if(userisIn == "local"){
    var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
    }else{
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
    }
 

   $.ajax({
      url:updateEmiUrlCard,
      data:postData,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
   
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data:data.results});
         $('#loadBorrowersList').html(html);
 },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   })
})
      
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   });

}

function userDisbursed(loanid){

     $("#modal-Disbursementdate").modal("show");
     $(".saveEmidateBtn").attr("data-loanid",loanid);
    // alert(loanid);

}

function updateDisbursementDate(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var hereisUpdatedBorrowerdate = $(".borrowerDisbursementDate").val();
    var getLoanId= $('.saveEmidateBtn').attr("data-loanid");
   // console.log(getId);
if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/report";
}
    var postData =  {
 "loanId":getLoanId,
"disbursedDate":hereisUpdatedBorrowerdate,
"adminComments":"DISBURSED"
}

    var postData = JSON.stringify(postData);    
  console.log(postData);
        
    $.ajax({
      url:updateCommentUrl,
      type:"PATCH",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         
        // alert('updated');
       $("#modal-disbursementdatesuccess").modal("show");                   

      } ,
      statusCode : {
        400: function (response) {
            $("#modal-loanActive").modal("show");                   
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



/*

function viewUserUploadedDocs(userId){
 // alert(1);
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  var userId = userId;

  // alert(userId);

if(userisIn == "local"){
  //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
  var getDocsCall = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/document";
//var updateCommentUrl="http://10.10.10.78:8181/v1/user/"+suserId+"/loan/ADMIN/emiStartdate";
}else if(userisIn == "prod"){
// https://fintech.oxyloans.com/oxyloans/
    var getDocsCall = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/document";
}else {
   getDocsCall ="http://10.10.10.78:8181/v1/user/"+userId+"/document";
} 

    $.ajax({
      url:getDocsCall,
      type:"GET",
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
         $(".viewUserUploadedDocs-"+userId).hide();
         $('.displayUploadedDocs-'+userId).show();
          for (var i = 0; i < data.length; i++) {
            var docType = data[i].documentSubType;
              console.log(docType);
              $(".show"+docType+"-"+userId).show();
          }
          if(data.length == 0){
            alert("Please ask user to upload the documents");
          }
      } ,
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });

} */






function viewloaninfo(loanid){
  
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  // var getLoanId = $(this).attr("data-loanid");
var loanId=loanid;
if(userisIn == "local"){
  var getDocsCall = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
}else{
    var getDocsCall = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
}



var postData={"fieldName":"loanId","fieldValue":loanId,"operator":"EQUALS"}
     var postData = JSON.stringify(postData);    
  console.log(postData);


    $.ajax({
      url:getDocsCall,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
          
       var template = document.getElementById('userloanstatus').innerHTML;
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data:data.results});
         $('#displayloanRecords').html(html);
          $("#modal-viewuserdetails").modal("show");
      } ,
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
 
}

function loadeNACHActiveUSers(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    //var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
        if(userisIn == "local"){
          //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
                  var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

        }else{
        // https://fintech.oxyloans.com/oxyloans/
                  var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

        }

        var postData =  {"fieldName":"enachMandate.mandateStatus", "fieldValue":"SUCCESS", "operator":"EQUALS" }

    var postData = JSON.stringify(postData);    

    $.ajax({
      url:getLenders,
      dataType:"json",
      contentType:"application/json",
      type:"POST",
      data:postData,
      success: function(data,textStatus,xhr){
        console.log(data);
        totalEntries = data.totalCount;
       // console.log(totalEntries);
       var template = document.getElementById('displayRecordsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //alert(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
         $('#displayRecords').html(html);

  for (var i = 0; i < data.results.length; i++) {
       for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
           var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
          $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
         
       }        
  }


         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
         //$(".viewPan").colorbox();
          bindCommentsClick();

         /*888888888888888*/
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
      
        
     var postData =  {
          "leftOperand": {
           "fieldName": "userPrimaryType",
           "fieldValue": "BORROWER",
           "operator": "EQUALS"
           },
           
           "logicalOperator": "AND",

           "rightOperand": {
           "fieldName": "parentRequestId",
           "operator": "NULL"
           },
           "page": {
           "pageNo": num,
           "pageSize":10
           },
          "sortBy":"loanRequestedDate",
          "sortOrder" : "DESC"
        };

        //$(".viewPan").colorbox();
        //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
        var postData = JSON.stringify(postData);
        console.log(postData);
        if(userisIn == "local"){
          //http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
                  var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

        }else{
        // https://fintech.oxyloans.com/oxyloans/
                  var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

        }
         // var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
          $.ajax({
            url:getLenders,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loadBorrowersListTpl').innerHTML;
             //console.log(template);
             Mustache.parse(template);
             //var html = Mustache.render(template, data);
             var html = Mustache.to_html(template, {data: data.results});
             

             //alert(html);
             $('#loadBorrowersList').html(html);
             bindCommentsClick();
                  

            },
            error: function(xhr,textStatus,errorThrown){
              console.log('Error Something');
            },
            beforeSend: function(xhr) {
              xhr.setRequestHeader("accessToken",saccessToken);
      }
         });
        });  
         /*888888888888888*/
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
   }); 
}