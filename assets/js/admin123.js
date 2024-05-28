$(document).ready(function() {

	$(".viewPan").colorbox();
    $(".viewaadhar").colorbox({rel:'viewaadhar'});
	$(".viewpassport").colorbox({rel:'viewpassport'});


 viewEMICARD(); 

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
    var getStatUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/ADMIN/request/"+requestID+"/download";
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


//*********     LENDER/BORROWER LOAN APPLICATION SEARCH STARTS **********//
$('#lenderSearch,#borrowerSearch').on('change', function() {
   if($('#lenderSearch,#borrowerSearch').val() == 'name') {
            $(".name").show();
            $('.id').hide();
            $('.amount').hide(); 
            $('.roi').hide(); 
            $('.oxyscore').hide(); 
             

        } else if($('#lenderSearch,#borrowerSearch').val() == 'id'){
            $('.name').hide();
            $('.amount').hide(); 
            $('.roi').hide(); 
            $('.oxyscore').hide(); 
            $(".id").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'amount'){
            $('.name').hide();
            $('.roi').hide(); 
             $('.id').hide();
            $('.oxyscore').hide(); 
            $(".amount").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'roi'){
            $('.name').hide();
            $('.id').hide();
            $('.oxyscore').hide(); 
            $('.amount').hide(); 
            $(".roi").show();
        }else if($('#lenderSearch,#borrowerSearch').val() == 'oxyscore'){
            $('.name').hide();
            $('.id').hide();
            $('.amount').hide(); 
            $('.roi').hide(); 
            $(".oxyscore").show();
        }
        else {
             $('.name').hide(); 
             $('.id').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.oxyscore').hide(); 
            
        } 
});
//*********     LENDER/BORROWER LOAN APPLICATION SEARCH ENDS  **********//


//*********     RUNNING/CLOSED LOANS  SEARCH STARTS **********//

$('#Search').on('change', function() {

  if($('#Search').val() == 'loan id') {
            $(".loanid").show();
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
        } else if($('#Search').val() == 'application id'){
            $(".applicationid").show();
             $('.loanid').hide();  
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
        }else if($('#Search').val() == 'lender id'){
             $(".lenderid").show();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
        
        }else if($('#Search').val() == 'borrowerid'){
        	 $('.borrowerid').show(); 
        	 $(".city").hide();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
        }else if($('#Search').val() == 'roi'){
             $(".roi").show();
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
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
        }
        else {
             $('.loanid').hide(); 
             $('.applicationid').hide(); 
             $('.lenderid').hide(); 
             $('.borrowerid').hide(); 
             $('.roi').hide(); 
             $('.amount').hide(); 
             $('.city').hide(); 
            
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
    
  var adminUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/dashboard/"+primaryType+"?current=false";
  
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
  "pageSize": 200
},
"sortBy": "loanActiveDate",
"sortOrder": "DESC"
}
   var postData = JSON.stringify(postData);
  var adminUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";
  
    $.ajax({
      url:adminUrl,
      type:"POST",
      data: postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
         var template = document.getElementById('adminUserstatus').innerHTML;
       //console.log(template);
        Mustache.parse(template);
       //var html = Mustache.render(template, data);
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

function responsepaidinfo(loanId, primaryType){
    //Are you sure? 
   var adminUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanId+"/feepaid?primaryType="+primaryType;
  
    $.ajax({
      url:adminUrl,
      type:"POST",
      success: function(data,textStatus,xhr){
      console.log(data);
     // alert(1);
      $("#modal-feeStatus").modal("show");
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

    var getLenders = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

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
        
          var getLenders = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
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

    var getLenders = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

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
         var displayPageNo = totalEntries/10;
         displayPageNo = displayPageNo+1;
         $(".viewPan").colorbox();

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

        $(".viewPan").colorbox();
        //var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
        var postData = JSON.stringify(postData);
        console.log(postData);
        
          var getLenders = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
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

    var postData = {
            "fieldName": "loanStatus",
            "fieldValue" : recordsType,
            "operator": "EQUALS",
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }


     var postData = JSON.stringify(postData);
    console.log(postData);
    var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
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
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }



      //viewEMICARD()
     var postData = JSON.stringify(postData);
    console.log(postData);
     var actOnLoan = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

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
        var currComment = $(this).attr("data-currComment")
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

    var updateCommentUrl = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/"+getLoanId+"/comment";

    var postData =  {"comments": hereisUpdatedComment};

    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateCommentUrl,
      type:"PATCH",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){
        console.log(data);
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

function viewEMICARD(){
$('.viewEMIcard').click( function() {
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = $(this).attr("data-loanid");
    var updateEmiUrlCard = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/"+getLoanId+"/emicard";

   //"/{userId}/loan/{primaryType}/{loanId}/emicard"

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



function updatingEMI(loanid, emino){
    suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");
    var getLoanId = loanid;
    var emiNo = emino;
    var updateEmiUrlCard = "http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/emipaid";

    var postData =  {"comments": ""};
    var postData = JSON.stringify(postData);    

    $.ajax({
      url:updateEmiUrlCard,
      type:"POST",
      contentType:"application/json",
      dataType:"json",
        data: postData,
      success: function(data,textStatus,xhr){
        $("#modal-viewEMI").modal("hide");
        $("#modal-updataedEMI").modal("show");
        
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