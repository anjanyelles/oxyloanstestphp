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
           
        }else if($('#lenderSearch,#borrowerSearch').val() == 'id'){
             $('.name,.roi,.amount,.oxyscore,.mobileNumber,.city').hide();
         
            $(".id").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'amount&city'){
            $('.name,.roi,.id,.oxyscore,.mobileNumber').hide();
            $(".city").show();
            $(".amount").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'amount'){
            $('.name,.roi,.id,.oxyscore,.mobileNumber,.city').hide();
            $(".amount").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'roi'){
            $('.name,.roi,.id,.amount,.oxyscore,.mobileNumber,.city').hide();

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
        $('.applicationid,.oxyscore,.lenderid,.borrowerid,.roi,.amount,.city,.mobileNumber,.userName').hide(); 
             
        } else if($('#Search').val() == 'appID'){
             $(".applicationid").show();
             $('.loanid,.oxyscore,.lenderid,.borrowerid,.roi,.amount,.city,.mobileNumber,.userName').hide(); 
        }else if($('#Search').val() == 'lenderID'){
             $(".lenderid").show();
             $('.loanid,.oxyscore,.applicationid,.borrowerid,.roi,.amount,.city,.mobileNumber,.userName').hide();
        }else if($('#Search').val() == 'borrowerID'){
           $('.borrowerid').show();
          $('.loanid,.oxyscore,.applicationid,.lenderid,.roi,.amount,.city,.mobileNumber,.userName').hide(); 
            
        }else if($('#Search').val() == 'roi'){
             $(".roi").show();
            $('.loanid,.oxyscore,.applicationid,.lenderid,.borrowerid,.amount,.city,.mobileNumber,.userName').hide(); 
        }
        else if($('#Search').val() == 'amount&city'){
           $(".amount").show();
           $('.city').show(); 
           $('.loanid,.oxyscore,.applicationid,.lenderid,.borrowerid,.roi,.mobileNumber,.userName').hide();   
             
        }  else if($('#Search').val() == 'amount'){
           $(".amount").show();
           $('.loanid,.oxyscore,.applicationid,.lenderid,.city,.borrowerid,.roi,.mobileNumber,.userName').hide();   
             
        } else if($('#Search').val() == 'city'){
             $(".city").show();
             $('.loanid,.oxyscore,.applicationid,.lenderid,.borrowerid,.amount,.roi,.mobileNumber,.userName').hide(); 
            

        }else if($('#Search').val() == 'mobileNumber'){
           $('.mobileNumber').show();
            $('.loanid,.oxyscore,.applicationid,.lenderid,.borrowerid,.amount,.roi,.city,.userName').hide(); 
 
        } else if($('#Search').val() == 'userName'){
             $('.userName').show(); 
       $('.loanid,.oxyscore,.applicationid,.lenderid,.borrowerid,.amount,.roi,.city,mobileNumber').hide(); 
  
       } else if($('#Search').val() == 'oxyscore'){
             $(".oxyscore").show();
             $('.loanid,.lenderid,.borrowerid,.roi,.amount,.city,.mobileNumber,.userName,.applicationid').hide(); 
        }else {
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
             $('.mobileNumber').hide(); 
             $('.userName').hide();
              $('.oxyscore').hide(); 

            
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

   var postData ={
    "leftOperand":{
      "fieldName":"loanStatus",
      "fieldValue":recordsType,
      "operator":"EQUALS"
    },
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"borrowerDisbursedDate",
  "operator":"NOT_NULL"
},
"page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanId",
         "sortOrder" : "DESC"
 
}

  /*  var postData = {
            "fieldName": "loanStatus",
            "fieldValue" : recordsType,
            "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanId",
         "sortOrder" : "DESC"
      }*/


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
         
            var postData ={
     "leftOperand":{
      "fieldName":"loanStatus",
      "fieldValue":recordsType,
      "operator":"EQUALS"
    },
"logicalOperator":"AND",
"rightOperand":{
  "fieldName":"borrowerDisbursedDate",
  "operator":"NOT_NULL"
},
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



function updatingEMI(loanid, emino, thisEMI){
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
        $("."+thisEMI).addClass("btn-success")
         
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
    var city = $("#cityValue").val();
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
  
  var city = $("#cityValue").val();

  console.log(city); 

  console.log(minRoi  +" "+ maxRoi);  

  var oxyscore = $(".oxyscore").val();
  console.log(oxyscore);

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
            "fieldValue":mobileNumber
        },
        "leftOperand": {
            "fieldName":"userPrimaryType",
            "fieldValue":userType,
            "operator":"EQUALS"
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
                "fieldValue":userName
            },
            "leftOperand": {
                "fieldName": "user.personalDetails.lastName",
                "operator": "LIKE",
                "fieldValue":userName
            }
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue":userType,
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
},
                "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
}




  }else if(userSelecctedOption == "amount&city"){

  var postData={ 
            "leftOperand": {
              
              "leftOperand": {
                   "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                          "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                         "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName":"loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
               
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":minRoi,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":maxRoi,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":minamtValue,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator":"LTE"
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
              "fieldName":"userId",
              "fieldValue":borrowerid,
              "operator":"EQUALS"
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
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersList').html(html);
      $(".dashBoardPagination").hide();
       $('.searchborrowerPagination').show();
      for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
              var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
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
                    "fieldValue":mobileNumber
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
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
        }else if(userSelecctedOption == "userName"){
          var postData = {
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                    "logicalOperator": "OR",
                    "rightOperand": {
                        "fieldName": "user.personalDetails.firstName",
                        "operator": "LIKE",
                        "fieldValue":userName
                    },
                    "leftOperand": {
                        "fieldName": "user.personalDetails.lastName",
                        "operator": "LIKE",
                        "fieldValue":userName
                    }
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
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
},
                "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
}

          }else if(userSelecctedOption == "amount&city"){

    var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
  
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":minRoi,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":maxRoi,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":minamtValue,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":maxamtValue,
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
                      "fieldName":"userId",
                      "fieldValue":borrowerid,
                      "operator": "EQUALS"
                    },
                    "logicalOperator": "AND",
                    "rightOperand": {
                      "fieldName":"parentRequestId",
                      "operator":"NULL"
                    },
                    "page": {
                      "pageNo":num,
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
            totalEntries = data.totalCount;
            console.log(totalEntries);
       var template = document.getElementById('loadBorrowersListTpl').innerHTML; 
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
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
 
 var city = $(".city input").val();
 
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
}else if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "id",
      "fieldValue":loanId ,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 10
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
            "pageSize": 10
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
          "pageSize": 10
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
}else if(userSelecctedOption == "city"){

var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
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
      "fieldValue":fieldValueforSearch,
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
      
       $('.runningLoansPagination').hide();
       $('.searchrunningloansPagination').show();
      
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;
      //alert("loading is done");

        $('.searchrunningloansPagination').bootpag({
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
}else if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "lenderUserId",
      "fieldValue": loanId,
      "operator": "EQUALS",
      "page": {
          "pageNo": num,
          "pageSize": 10
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
            "pageNo": num,
            "pageSize": 10
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
          "pageNo": num,
          "pageSize": 10
      },
      "sortBy": "loanActiveDate",
      "sortOrder": "ASC"
  }
} else if(userSelecctedOption == "city"){

var postData={
  "leftOperand":{
    "leftOperand":{
      "leftOperand":{
        "fieldName":"userPrimaryType",
        "fieldValue":fieldValueforSearch,
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
      "fieldValue":fieldValueforSearch,
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
},
                "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
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
           var template = document.getElementById('displayRecordsTpl').innerHTML;
         Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#displayRecords').html(html);
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

 var city = $("#cityValue").val();
 console.log(city);
  /*if(userSelecctedOption == "city"){
    var city = $(".city input").val();
    console.log(city);
  }*/
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
}else if(userSelecctedOption == "amount&city"){

    var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"LENDER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "LENDER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue": minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue": maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               }
             }
  
}
else if(userSelecctedOption == "mobileNumber"){
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
            "fieldValue": usertype,
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
},
            "page": {
                "pageNo": 1,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
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
       $('.dashBoardPagination').hide();
       $('.searchlenderPagination').show();
      
      
      for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].lenderKycDocuments.length; j++){
              var docType=data.results[i].lenderKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].lenderUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;

        $('.searchlenderPagination').bootpag({
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
}else if(userSelecctedOption == "amount&city"){
       var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"LENDER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "LENDER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                          "fieldName":"loanRequestAmount",
                          "fieldValue": minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue": maxamtValue,
                       "operator": "LTE"
                }
                        
               }
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
},
            "page": {
                "pageNo": num,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
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
    var personalDetailsUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/personal/"+userID+"";
  }else{
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

    if(userisIn == "local"){
        var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else{
        var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }

var postData= 
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

function viewLoanRequestsAccepted(loanID,id){
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanID;
    var userId=id;

    if(userisIn == "local"){
        var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else{
        var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }

var postData= {
  "leftOperand":{
    "leftOperand":{
      "fieldName":"user.id",
      "fieldValue":userId,
      "operator":"EQUALS"
    },
"logicalOperator":"AND",

"rightOperand":{
  "leftOperand":{
    "fieldName":"parentRequestId",
    "operator":"NOT_NULL"
  },"logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"loanStatus",
    "fieldValue":"Accepted",
    "operator":"EQUALS"
  }
}
},
"logicalOperator":"OR",

"rightOperand":{
  "leftOperand":{
    "fieldName":"parentRequestId",
    "fieldValue":getLoanId,
    "operator":"EQUALS"
  },
  "logicalOperator":"AND",
  "rightOperand":{
    "fieldName":"loanStatus",
    "fieldValue":"Accepted",
    "operator":"EQUALS"
  }
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
        $(".viewLoanRequestsAccepted-"+loanID).show();

           if (data.results.length == 0) {
            $("#displayNoLoanRecords").show();
        }else{
       var template = document.getElementById('loadloanRequestsAccepted').innerHTML;
       Mustache.parse(template);
       var html = Mustache.to_html(template, {data: data.results});
        $('#viewLoanRequestsAccepted-'+loanID).html(html);

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
   

}

function updateDisbursementDate(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var hereisUpdatedBorrowerdate = $(".borrowerDisbursementDate").val();
    var getLoanId= $('.saveEmidateBtn').attr("data-loanid");
  
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




function borrowerFeeamount(id){

     $("#modal-borrowerFeeRoi").modal("show");
     $(".saveEmidateBtn").attr("data-clickedid",id);
    // alert(loanid);

}

function updateBorrowerFeeROI(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var UpdatedBorrowerFeeROI = $(".borrowerFeeRoi").val();
    var getId= $('.saveEmidateBtn').attr("data-clickedid");
   // console.log(getId);
if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/ADMIN/borrowerfee";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/ADMIN/borrowerfee";
}
    var postData =  
{"id":getId,

  "roi":UpdatedBorrowerFeeROI
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
        //alert('updated');
       $("#modal-borrowerFeesuccess").modal("show");                   

      } ,
     
          error: function (request, error) {
             console.log(arguments);
            
             if(arguments[0].responseJSON.errorCode==118){
               $("#modal-borrowerFeeError").modal("show");            
             }
          
             },
      /*error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },*/
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}




function userRiskcalculate(id){
//$("#modal-riskCalculation").modal("show"); 

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
  userId =id;
$(".riskCalculationBtn").attr("data-clickedid",userId);
if(userisIn == "local"){
   var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/getprofileandexperian";
}else{
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/getprofileandexperian";

}
    $.ajax({
      url:getStatUrl,
      type:"GET",
      success: function(data,textStatus,xhr){
       console.log(data);
      $("#modal-riskCalculation").modal("show"); 
    
    if(data.employementType=="SALARIED")
    {
      $("#diaplaySalary").html(data.salary);
      $("#diaplayExperiance").html(data.experinace);
      $("#diaplayCompaney").html(data.companyName);
      $("#diaplayScore").html(data.experinaScore);
    } else{
      $("#diaplayIncome").html(data.netIncome);
      $("#diaplayOrganizationfound").html(data.organizationFound);
      $("#diaplayOrganization").html(data.organization);
      $("#diaplayScore").html(data.experinaScore);
     
    } 


      $("#experianPoints").val(data.riskProfileDto.cibilScore);
      $("#salaryPoints").val(data.riskProfileDto.salaryOrIncome);
      $("#companeyPoints").val(data.riskProfileDto.companyOrOrganization);
      $("#experiancePoints").val(data.riskProfileDto.experianceOrExistenceOfOrganization);
      $("#gradeValue").val(data.riskProfileDto.grade);


      /*$("#diaplaySalary").html(data.salary);
      $("#diaplayExperiance").html(data.experinace);
      $("#diaplayCompaney").html(data.companyName);
      $("#diaplayScore").html(data.experinaScore);

      $("#diaplayIncome").html(data.netIncome);
      $("#diaplayOrganizationfound").html(data.organizationFound);
      $("#diaplayOrganization").html(data.organization);
      $("#diaplayScore").html(data.experinaScore); */
      },
      error: function(xhr,textStatus,errorThrown){
        //console.log('Error Something');
        console.log(arguments);
            //$(".modal-body #text").html(arguments[0].responseJSON.errorMessage);

             if(arguments[0].responseJSON.errorCode==119){
               $("#modal-riskCalWithoutScore").modal("show");            
             }
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
}


function riskCalculation(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    
    var cibilScorePoints  = $(".experian").val();
    var salaryOrIncomePoints  = $(".salary").val();
    var companyOrOrganizationPoints  = $(".companey").val();
    var experianceOrExistenceOfOrganizationPoints  = $(".experiance").val();
    var grade  = $("#gradeValue").val();

var isValid = true;
      
       if(cibilScorePoints == ""){
          $(".experianPointsError").show();
          isValid = false;
       }else if(cibilScorePoints > 25){
         $(".experianPointsError").html("You can't enter more than 25 points.");
         $(".experianPointsError").show();
           isValid = false;

        }else{
          $(".experianPointsError").hide();
        
       }
       

       if(salaryOrIncomePoints == ""){
          $(".salaryPointsError").show();
          isValid = false;
       }else if(salaryOrIncomePoints > 25){
         $(".salaryPointsError").html("You can't enter more than 25 points.");
         $(".salaryPointsError").show();
           isValid = false;

        }else{
          $(".salaryPointsError").hide();
        
       }
       

       if(companyOrOrganizationPoints == ""){
          $(".companeyPointsError").show();
          isValid = false;
       }else if(companyOrOrganizationPoints > 25){
         $(".companeyPointsError").html("You can't enter more than 25 points.");
         $(".companeyPointsError").show();
           isValid = false;

        }else{
          $(".companeyPointsError").hide();
        
       }
        

        if(experianceOrExistenceOfOrganizationPoints == ""){
          $(".experiancePointsError").show();
          isValid = false;
       }else if(experianceOrExistenceOfOrganizationPoints > 25){
         $(".experiancePointsError").html("You can't enter more than 25 points.");
         $(".experiancePointsError").show();
           isValid = false;

        }else{
          $(".experiancePointsError").hide();
        
       }




    var getId= $('.riskCalculationBtn').attr("data-clickedid");
if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/calculateprofilerisk";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/calculateprofilerisk";
}
    var postData =  {
                       "id":getId,
                       "salaryOrIncomePoints":salaryOrIncomePoints,

                       "companyOrOrganizationPoints":companyOrOrganizationPoints,

                       "experianceOrExistenceOfOrganizationPoints":experianceOrExistenceOfOrganizationPoints,

                       "cibilScorePoints":cibilScorePoints,
                       "grade":grade

}


    var postData = JSON.stringify(postData);    
    console.log(postData);
     if(isValid == true){      
    $.ajax({
      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
        //alert('updated');
        $("#modal-riskCalculation").modal("hide"); 
         $("#modal-sucessriskCalculation").modal("show"); 
      } ,
     
          error: function (request, error) {
             console.log("error");
          
             },
     
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
    }
        return isValid;
}

    
function userSendOffer(loanreqid,id){

     $("#modal-Sendofferamount").modal("show");
     $(".sendLoanoffer").attr("data-clickedid",id);
      $(".sendLoanoffer").attr("data-reqid",loanreqid);
}




function sendUserOffer(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    
    var loanOfferAmount  = $("#loanOfferAmount").val();
    var rateOfInterest  = $("#rateOfInterest").val();
    var tenure  = $("#tenure").val();
    var processingFee  = $("#processingFee").val();
    var comments  = $("#comments").val();

var isValid = true;
      
       if(loanOfferAmount == ""){
          $(".loanAmountError").show();
          isValid = false;
       }else{
          $(".loanAmountError").hide();
        
       }


       if(rateOfInterest == ""){
          $(".roiError").show();
          isValid = false;
       }else{
          $(".roiError").hide();
        
       }


       if(tenure == ""){
          $(".tenureError").show();
          isValid = false;
       }else{
          $(".tenureError").hide();
        
       }

       if(processingFee == ""){
        $(".processingFeeError").html("Please Select fee percentage to autopopulate the fee amount.");
          $(".processingFeeError").show();
          isValid = false;
       }else{
          $(".processingFeeError").hide();
        
       }

var loanReqId=$(".sendLoanoffer").attr("data-reqid");
var userId= $(".sendLoanoffer").attr("data-clickedid");
if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/sendOffer";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/sendOffer";
}
    var postData =  {
                       "loanOfferedAmount":loanOfferAmount,
                       "loanRequestedId":loanReqId,
                        "rateOfInterest":rateOfInterest,
                        "duration":tenure,
                        "fee":processingFee,
                        "comments":comments

}


    var postData = JSON.stringify(postData);    
    console.log(postData);
  if(isValid == true){      
    $.ajax({
      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
         $("#modal-Sendofferamount").modal("hide");
        $("#modal-SendOfferSent").modal("show");
      } ,
     
          error: function (request, error) {
             //console.log("error");
             console.log(arguments);
            $(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);

             if(arguments[0].responseJSON.errorCode==108){
               $("#modal-alreadyDoneSendOffer").modal("show");            
             }
          
             },
     
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
       }
        return isValid;

}




$(document).ready(function() {

 $("#experianPoints, #salaryPoints,#companeyPoints,#experiancePoints").on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
if ($this.val().length > 1) {
    e.preventDefault();
    return false;
  }
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;

  });

$("#cibilScoreValue").on('keypress', function(e) {
 var $this = $(this);
 var regex = new RegExp("^[0-9\b]+$");
 var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
if ($this.val().length > 2) {
    e.preventDefault();
    return false;
  }
  if (regex.test(str)) {
    return true;
  }
  e.preventDefault();
  return false;

  });
$("#cibilScoreValue").on('keyup', function(e) {
  $(".cibilError").hide();
  });

 $("#loanOfferAmount, #percentageValue").change(function(){   

    var loanValue = $("#loanOfferAmount").val();
    var percentagevalue = $("#percentageValue").val();
    var processingFees= loanValue*percentagevalue/100;
    var processingFeesGST=(processingFees*18/100);
    var totalprocessingFee=processingFees+processingFeesGST;

    $(".displayprocessingFees").val(totalprocessingFee);
    
});

$("#experianPoints, #salaryPoints,#companeyPoints,#experiancePoints").keyup(function(){   
    var experianPoints =parseInt($('#experianPoints').val());
    var salaryPoints = parseInt($('#salaryPoints').val());
    var companeyPoints = parseInt($('#companeyPoints').val());
    var experiancePoints = parseInt($('#experiancePoints').val());
    
    var totalPoints = experianPoints+salaryPoints+companeyPoints+experiancePoints;
  
    if(experianPoints != "" && salaryPoints != "" && companeyPoints != "" && experiancePoints != ""){
        if(totalPoints <=25){
          $("#gradeValue").val('D');
        }else if(totalPoints > 26 && totalPoints < 50){
          $("#gradeValue").val('C');
        }else if(totalPoints > 51 && totalPoints < 75){
          $("#gradeValue").val('B');
        }else if(totalPoints >76 && totalPoints < 100){
          $("#gradeValue").val('A');
        }
    }
    console.log(totalPoints );
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
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/0/getlenderwallettrns";
  }else{  
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/0/getlenderwallettrns";
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
           // console.log(data.results);
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
     var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/0/getlenderwallettrns";
  }else{  
     var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/0/getlenderwallettrns";
  }

        $.ajax({
          url:actOnLoan,
          type:"POST",
          data:postData,
          contentType:"application/json",
          dataType:"json",
          success: function(data,textStatus,xhr){
            console.log(data);
        
            //console.log(data.results);
            
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

    
function lenderwalletTransactionApprove(documentId){

     $("#modal-approveComments").modal("show");
     $(".saveApproveCommentsBtn").attr("data-clickedid",documentId);
     $('#' + documentId).prop("disabled", true);
      
}


function updatewalletApproveComments(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var comments= $(".approveComment").val();
   var id= $(".saveApproveCommentsBtn").attr("data-clickedid");

if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/updateescrowwallettransaction/"+id+"";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/updateescrowwallettransaction/"+id+"";
}

var postData ={
         "comments":comments,
         "status": "approved"
    }
  var postData = JSON.stringify(postData);  

    $.ajax({

      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
        $("#modal-transactionAprrove").modal("show"); 
        $('#' + id).prop("disabled", true);
         //$('#' + id).prop("disabled", false);
      
      } ,
     
          error: function (request, error) {
             console.log("error");
             },
     
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}


function lenderwalletTransactionReject(documentId){

     $("#modal-rejectComments").modal("show");
     $(".saveRejectCommentsBtn").attr("data-clickedid",documentId);
      $('#' + documentId).prop("disabled", true);

}


function updatewalletRejectComments(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
     

     var comments= $(".approveComment").val();
   var id= $(".saveRejectCommentsBtn").attr("data-clickedid");
   

if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/updateescrowwallettransaction/"+id+"";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/updateescrowwallettransaction/"+id+"";
}


 var postData ={
         "comments": comments,
          "status": "rejected"
    }
  var postData = JSON.stringify(postData);  
    $.ajax({

      url:updateCommentUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
        $("#modal-transactionReject").modal("show"); 
        $('#' + id).prop("disabled", true);
         //$('#' + id).prop("disabled", false);
      
      } ,
     
          error: function (request, error) {
             console.log("error");
             },
     
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
}



function searchwalletUsers(){

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  var userSelecctedOption = $('.choosenType').val();
  console.log("userSelecctedOption: "+ userSelecctedOption);

 var firstName=$(".firstName").val();
 var lastName=$(".lastName").val();
 console.log("Name "+firstName +" " +lastName); 
  
  var lenderid = $(".id input").val();
  lenderid = lenderid.substr(2);
  
  console.log("lender id "+lenderid);
if(userSelecctedOption == "name"){
  var postData = {
       
        "page": {
            "pageNo": 1,
            "pageSize": 10
        },
        "firstName": firstName,
        "lastName": lastName
    } 
}

var postData = JSON.stringify(postData);
  console.log(postData);
if(userisIn == "local"){
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/searchlenderwallet ";

}else{
  var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/searchlenderwallet ";

}

    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
        var template = document.getElementById('wallettransactiondetails').innerHTML;
        Mustache.parse(template);
        var html = Mustache.to_html(template, {data: data.results});            
        $('#displaywallettrns').html(html);
         $('.acceptedPagination').hide();
         $('.searchlenderwalletPagination').show();
      
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;

        $('.searchlenderwalletPagination').bootpag({
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
        
       
      if(userSelecctedOption == "name"){
   var postData =  {
       
        "page": {
            "pageNo": num,
            "pageSize": 10
        },
        "firstName": firstName,
        "lastName": lastName
    } 
}
        var postData = JSON.stringify(postData);
        console.log(postData);
 
       
if(userisIn == "local"){
         var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}else{
         var getStatUrl = " https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";

}

          $.ajax({
            url:getStatUrl,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
            var template = document.getElementById('wallettransactiondetails').innerHTML;
            Mustache.parse(template);
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
    
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });

}



function loadExpiredBorrowerApplications(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");


if(userisIn == "local"){
    var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
}else{
    var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

}
    

var postData={
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":"BORROWER",
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
      "fieldValue":0,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFEREXPIRED",
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
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
       Mustache.parse(template);
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
      
   var postData={
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":"BORROWER",
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
      "fieldValue":0,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFEREXPIRED",
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
      
        var postData = JSON.stringify(postData);
        console.log(postData);
 if(userisIn == "local"){
 var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
}else{
  var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
}
          $.ajax({
            url:getLenders,
            type:"POST",
            data:postData,
            contentType:"application/json",
            dataType:"json",
            success: function(data,textStatus,xhr){
             console.log(data);
             var template = document.getElementById('loadBorrowersListTpl').innerHTML;
             Mustache.parse(template);
             var html = Mustache.to_html(template, {data: data.results});
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



function usercibilScore(id){

     $("#modal-cibilScore").modal("show");
     $(".savecibilscoreBtn").attr("data-clickedid",id);
     
}




function updateCibilScore(){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    
    var enteredcibilSore  = $("#cibilScoreValue").val();
    var userId= $(".savecibilscoreBtn").attr("data-clickedid");

var isValid = true;
    
     if(enteredcibilSore == ""){
        $(".cibilError").show();
        isValid = false;
     } else if ( enteredcibilSore > 900){
        $(".cibilError").html("Cibil Score not grater than 900.");
        $(".cibilError").show();
        isValid = false;
    }



if(userisIn == "local"){
  var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/creditScoreByPaisabazaar";
}else{
    var updateCommentUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/creditScoreByPaisabazaar";
}
    var postData =  {"creditScoreByPaisabazaar":enteredcibilSore}


    var postData = JSON.stringify(postData);    
    console.log(postData);
    if(isValid == true){      
    $.ajax({
      url:updateCommentUrl,
      type:"PATCH",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
         console.log(data);
        $("#modal-cibilScore").modal("hide");
         alert('updated');
      // $("#modal-SendOfferSent").modal("show");
      } ,
     
          error: function (request, error) {
             console.log("error");
             },
     
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
      }
    });
   }

   return isValid;   

}


function cicReport(){
 
 suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

if(userisIn == "local"){
  var statement = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/getcicreport";
}else{
  var statement = "https://fintech.oxyloans.com/oxyloans/v1/user/getcicreport";

}

 console.log(statement);

   $.ajax({
      url:statement,
      type:"POST",
      success: function(data,textStatus,xhr){
      window.open(data.downloadUrl,'_blank');
      console.log(data);        
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken", saccessToken);
     }
   });

}




function loadofferAcceptedUsers(){
 
   suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
 
    if(userisIn == "local"){
  var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }else {
    var updateEmiUrlCard = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
    }

var postData ={
  "leftOperand":{
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":"BORROWER",
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.adminComments",
      "fieldValue":"INTERESTED",
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
    "pageSize":9
  },
  "sortBy":"loanRequestedDate",
  "sortOrder":"DESC"
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
    "leftOperand":{
      "fieldName":"userPrimaryType",
      "fieldValue":"BORROWER",
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "fieldName":"user.adminComments",
      "fieldValue":"INTERESTED",
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
    "pageSize":9
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



function searchUsersIntrested(userType){
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
    var city = $("#cityValue").val();
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
  
  var city = $("#cityValue").val();

  console.log(city); 

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
            "fieldValue":mobileNumber
        },
        "leftOperand": {
            "fieldName":"userPrimaryType",
            "fieldValue":userType,
            "operator":"EQUALS"
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
                "fieldValue":userName
            },
            "leftOperand": {
                "fieldName": "user.personalDetails.lastName",
                "operator": "LIKE",
                "fieldValue":userName
            }
        },
        "leftOperand": {
            "fieldName": "userPrimaryType",
            "fieldValue":userType,
            "operator": "EQUALS"
        }
    },
    "logicalOperator": "AND",
    "rightOperand": {
 "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 10
    },
    "sortBy": "loanRequestedDate",
    "sortOrder": "DESC"
  }
} else if(userSelecctedOption == "city"){

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
       "rightOperand": {
      "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    },
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
   "rightOperand": {
 "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    },
},
                "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
}




  }else if(userSelecctedOption == "amount&city"){

  var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                          "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                          "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName":"loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
               
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":minRoi,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":maxRoi,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":minamtValue,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize":9
    }
  }
}else{
     var postData = {
    "leftOperand":{
      "fieldName":"userId",
      "fieldValue":borrowerid,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.adminComments",
        "fieldValue":"INTERESTED",
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
       var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersInterestedList').html(html);
      $(".interstedPagination").hide();
       $('.searchinterstedPagination').show();
      for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
              var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
      bindCommentsClick();
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;

        $('.searchinterstedPagination').bootpag({
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
                    "fieldValue":mobileNumber
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
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
        }else if(userSelecctedOption == "userName"){
          var postData = {
            "leftOperand": {
                "logicalOperator": "AND",
                "rightOperand": {
                    "logicalOperator": "OR",
                    "rightOperand": {
                        "fieldName": "user.personalDetails.firstName",
                        "operator": "LIKE",
                        "fieldValue":userName
                    },
                    "leftOperand": {
                        "fieldName": "user.personalDetails.lastName",
                        "operator": "LIKE",
                        "fieldValue":userName
                    }
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
                    "operator": "EQUALS"
                }
            },
            "logicalOperator": "AND",
               "rightOperand": {
            "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    },
            "page": {
                "pageNo": num,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
          }
        } else if(userSelecctedOption == "city"){
         
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
       "rightOperand": {
      "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    },
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
   "rightOperand": {
 "leftOperand": {
            "fieldName": "user.adminComments",
            "fieldValue":"INTERESTED",
            "operator": "EQUALS"
        },
        "logicalOperator": "AND",
       "rightOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
      }
    }
},
                "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                "sortOrder": "DESC"
}

          }else if(userSelecctedOption == "amount&city"){

    var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
  
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":minRoi,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":maxRoi,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":minamtValue,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":maxamtValue,
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
    "leftOperand":{
      "fieldName":"userId",
      "fieldValue":borrowerid,
      "operator":"EQUALS"
    },
    "logicalOperator":"AND",
    "rightOperand":{
      "leftOperand":{
        "fieldName":"parentRequestId",
        "operator":"NULL"
      },
      "logicalOperator":"AND",
      "rightOperand":{
        "fieldName":"user.adminComments",
        "fieldValue":"INTERESTED",
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
            totalEntries = data.totalCount;
            console.log(totalEntries);
 var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
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

function searchUsersofferAccepted(userType){
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
    var city = $("#cityValue").val();
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
  
  var city = $("#cityValue").val();

  console.log(city); 

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
            "fieldValue":mobileNumber
        },
        "leftOperand": {
            "fieldName":"userPrimaryType",
            "fieldValue":userType,
            "operator":"EQUALS"
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
  
var  postData = {
   "leftOperand": {
    "leftOperand": {
    "fieldName": "user.personalDetails.firstName",
    "operator": "LIKE",
    "fieldValue":userName
   },
   "logicalOperator": "OR",
    "rightOperand": {
    "fieldName": "user.personalDetails.lastName",
    "operator": "LIKE",
    "fieldValue":userName
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
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"

    }
 },
 "page": {
                "pageNo": 1,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
}
} else if(userSelecctedOption == "city"){

var postData={
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
 "rightOperand": {
   "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NULL"
        },
   "logicalOperator": "AND",
       "rightOperand": {
      "fieldName": "loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"
      }
    },
     "page": {
         "pageNo": 1,
          "pageSize": 10
         },
         "sortBy": "loanRequestedDate",
         "sortOrder": "DESC"

}
 }else if(userSelecctedOption == "amount&city"){

  var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                          "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                          "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName":"loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
               
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":minRoi,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":maxRoi,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":minamtValue,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize":9
    }
  }
}else{
     var postData = { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerid,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.adminComments",
                "fieldValue":"INTERESTED",
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
       var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersInterestedList').html(html);
      $(".interstedPagination").hide();
       $('.searchinterstedPagination').show();
      for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
              var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
      bindCommentsClick();
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;

        $('.searchinterstedPagination').bootpag({
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
                    "fieldValue":mobileNumber
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
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
        }else if(userSelecctedOption == "userName"){
          var  postData = {
   "leftOperand": {
    "leftOperand": {
    "fieldName": "user.personalDetails.firstName",
    "operator": "LIKE",
    "fieldValue":userName
   },
   "logicalOperator": "OR",
    "rightOperand": {
    "fieldName": "user.personalDetails.lastName",
    "operator": "LIKE",
    "fieldValue":userName
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
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"

    }
 },
 "page": {
                "pageNo": num,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
}       
 } else if(userSelecctedOption == "city"){
         
var postData={
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
 "rightOperand": {
   "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NULL"
        },
   "logicalOperator": "AND",
       "rightOperand": {
      "fieldName": "loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"
      }
    },
     "page": {
         "pageNo": num,
          "pageSize": 10
         },
         "sortBy": "loanRequestedDate",
         "sortOrder": "DESC"

}
          }else if(userSelecctedOption == "amount&city"){

    var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
  
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":minRoi,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":maxRoi,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":minamtValue,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize":9
    }
  }
}else{
   var postData =  { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerid,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.adminComments",
                "fieldValue":"INTERESTED",
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
            totalEntries = data.totalCount;
            console.log(totalEntries);
 var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
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



function searchUsersApprovedtoEsign(userType){
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
    var city = $("#cityValue").val();
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
  
  var city = $("#cityValue").val();

  console.log(city); 

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
            "fieldValue":mobileNumber
        },
        "leftOperand": {
            "fieldName":"userPrimaryType",
            "fieldValue":userType,
            "operator":"EQUALS"
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
  
var  postData = {
   "leftOperand": {
    "leftOperand": {
    "fieldName": "user.personalDetails.firstName",
    "operator": "LIKE",
    "fieldValue":userName
   },
   "logicalOperator": "OR",
    "rightOperand": {
    "fieldName": "user.personalDetails.lastName",
    "operator": "LIKE",
    "fieldValue":userName
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
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"

    }
 },
 "page": {
                "pageNo": 1,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
}
} else if(userSelecctedOption == "city"){

var postData={
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
 "rightOperand": {
   "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NULL"
        },
   "logicalOperator": "AND",
       "rightOperand": {
      "fieldName": "loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"
      }
    },
     "page": {
         "pageNo": 1,
          "pageSize": 10
         },
         "sortBy": "loanRequestedDate",
         "sortOrder": "DESC"

}
 }else if(userSelecctedOption == "amount&city"){

  var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                          "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                          "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName":"loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": 1,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
               
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":minRoi,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"rateOfInterest",
            "fieldValue":maxRoi,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName":"userPrimaryType",
        "operator":"EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":minamtValue,
            "operator":"GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName":"loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator":"LTE"
        }
    },
    "page": {
        "pageNo": 1,
        "pageSize":9
    }
  }
}else{
         var postData =  { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerid,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.adminComments",
                "fieldValue":"INTERESTED",
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
   }       

  var postData = JSON.stringify(postData);
  console.log(postData);
  
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
       var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersInterestedList').html(html);
      $(".interstedPagination").hide();
       $('.searchinterstedPagination').show();
      for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
              var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
      bindCommentsClick();
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;

        $('.searchinterstedPagination').bootpag({
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
                    "fieldValue":mobileNumber
                },
                "leftOperand": {
                    "fieldName": "userPrimaryType",
                    "fieldValue":userType,
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
        }else if(userSelecctedOption == "userName"){
          var  postData = {
   "leftOperand": {
    "leftOperand": {
    "fieldName": "user.personalDetails.firstName",
    "operator": "LIKE",
    "fieldValue":userName
   },
   "logicalOperator": "OR",
    "rightOperand": {
    "fieldName": "user.personalDetails.lastName",
    "operator": "LIKE",
    "fieldValue":userName
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
      "fieldName":"loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"

    }
 },
 "page": {
                "pageNo": num,
                "pageSize": 10
            },
            "sortBy": "loanRequestedDate",
            "sortOrder": "DESC"
}       
 } else if(userSelecctedOption == "city"){
         
var postData={
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
 "rightOperand": {
   "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NULL"
        },
   "logicalOperator": "AND",
       "rightOperand": {
      "fieldName": "loanOfferedAmount.loanOfferdStatus",
      "fieldValue":"LOANOFFERACCEPTED",
      "operator": "EQUALS"
      }
    },
     "page": {
         "pageNo": num,
          "pageSize": 10
         },
         "sortBy": "loanRequestedDate",
         "sortOrder": "DESC"

}
          }else if(userSelecctedOption == "amount&city"){

    var postData={ 
            "leftOperand": {
              
              "leftOperand": {
              "fieldName": "user.primaryType",
              "fieldValue":"BORROWER",
              "operator": "EQUALS"
            },
            "logicalOperator": "AND",
            "rightOperand": {
              "fieldName": "user.city",
              "fieldValue":city,
              "operator": "EQUALS"
            }
            },
             "logicalOperator": "AND",
             "rightOperand": {
               "leftOperand": {
                 "leftOperand": {
                   "fieldName":"parentRequestId",
                   "operator":"NULL"
                    },
                     "logicalOperator": "AND",
                     "rightOperand": {
                      "fieldName": "userPrimaryType",
                         "fieldValue": "BORROWER",
                         "operator": "EQUALS"
                     }
                     },
                      "logicalOperator": "AND", 
                       "rightOperand": {
                        "leftOperand": {
                   "fieldName":"loanRequestAmount",
                          "fieldValue":minamtValue,
                          "operator": "GTE"
                    },
                     "logicalOperator": "AND",
                       "rightOperand": {
                        "fieldName": "loanRequestAmount",
                        "fieldValue":maxamtValue,
                       "operator": "LTE"
                }
                        
               }
               },

               "page": {
                  "pageNo": num,
                  "pageSize": 10
                },
                "sortBy": "loanRequestedDate",
                 "sortOrder": "DESC"
             }
  
}else if(userSelecctedOption == "roi"){
   var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":minRoi,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "rateOfInterest",
            "fieldValue":maxRoi,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize": 9
    }
  }
}else if(userSelecctedOption == "amount"){
 var postData = {
    "leftOperand": {
        "fieldName": "userPrimaryType",
        "operator": "EQUALS",
        "fieldValue":"BORROWER"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "leftOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":minamtValue,
            "operator": "GTE"
        },
        "logicalOperator": "AND",
        "rightOperand": {
            "fieldName": "loanRequestAmount",
            "fieldValue":maxamtValue,
            "operator": "LTE"
        }
    },
    "page": {
        "pageNo": num,
        "pageSize":9
    }
  }
}else{ var postData =  { 
            "leftOperand":{
              "leftOperand":{
                "fieldName":"userId",
                "fieldValue":borrowerid,
                "operator":"EQUALS"
              },
              "logicalOperator":"AND",
              "rightOperand":{
                "fieldName":"user.adminComments",
                "fieldValue":"INTERESTED",
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
            totalEntries = data.totalCount;
            console.log(totalEntries);
 var template = document.getElementById('loadBorrowersInterestedListTpl').innerHTML; 
       //var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                      Mustache.parse(template);
        // var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
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




function searchUsersDisbursedloans(){

  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");
 
  var userSelecctedOption = $('.choosenType').val();
  var lenderid = $(".lenderid input").val();
 lenderid = lenderid.substr(2);

  var borrowerid = $(".borrowerid input").val();
  borrowerid = borrowerid.substr(2);

var loanId=$(".loanid  input").val();
 loanId = loanId.substr(2);
 
 console.log("loanId "+loanId);
 console.log("lender id "+lenderid);
 console.log("borrowerid is :"+ borrowerid);
    

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

 if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "id",
      "fieldValue":loanId,
      "operator": "EQUALS",
      "page": {
          "pageNo": 1,
          "pageSize": 10
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
          "fieldValue": "Accepted",
          "operator": "EQUALS"
        },
        "page": {
            "pageNo": 1,
            "pageSize": 10
        }
       
  }
} else {
  var postData = {
      "leftOperand": {
        "fieldName": "borrowerUserId",
        "fieldValue": borrowerid,
        "operator": "EQUALS",
      },
      "logicalOperator": "AND",
      "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValue": "Accepted",
          "operator": "EQUALS"
        },      
      "page": {
          "pageNo": 1,
          "pageSize": 10
      }
  }
} 
  var postData = JSON.stringify(postData);
  console.log(postData);
if(userisIn == "local"){
  var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
}else{
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
       var template = document.getElementById('loadBorrowersListTpl').innerHTML;
                   Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
      $('#loadBorrowersList').html(html);
      
       for (var i = 0; i < data.results.length; i++) {
          for(j=0;j< data.results[i].borrowerKycDocuments.length; j++){
              var docType=data.results[i].borrowerKycDocuments[j].documentSubType;
             $(".user-ViewDocs"+data.results[i].borrowerUser.id+" .show"+docType).attr("style", "display:block");
            
          }        
     }         
       $('.approvedPagination').hide();
       $('.searchapprovedPagination').show();
      
      var displayPageNo = totalEntries/10;
      displayPageNo = displayPageNo+1;
      //alert("loading is done");

        $('.searchapprovedPagination').bootpag({
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
       
       if(userSelecctedOption == "loanID"){
  var postData = {
      "fieldName": "id",
      "fieldValue":loanId ,
      "operator": "EQUALS",
      "page": {
          "pageNo": num,
          "pageSize": 10
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
          "fieldValue": "Accepted",
          "operator": "EQUALS"
        },
        "page": {
            "pageNo": num,
            "pageSize": 10
        }
  }
} else {
  var postData = {
      "leftOperand": {
        "fieldName": "borrowerUserId",
        "fieldValue": borrowerid,
        "operator": "EQUALS",
      },
      "logicalOperator": "AND",
      "rightOperand": {
          "fieldName": "loanStatus",
          "fieldValue": "Accepted",
          "operator": "EQUALS"
        },      
      "page": {
          "pageNo": num,
          "pageSize": 10
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
           var template = document.getElementById('loadBorrowersListTpl').innerHTML;
         Mustache.parse(template);
         var html = Mustache.render(template, data);
         var html = Mustache.to_html(template, {data: data.results});
      
           $('#loadBorrowersList').html(html);
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


