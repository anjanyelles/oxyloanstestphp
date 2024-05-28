<?php include 'header1.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="beforeLoginContentWrapper">
    <div class="col-xs-12 leftBoxStyles">
     <div class="row col-xs-12" style="margin:12% auto;">
        <div class="col-12 text-center">
            <span class="text-bold"><code>Note : </code> Multiple users are mapped with the given WhatsApp number. To proceed, please select the user you want to log in </span>
        </div>
    



         <div class="whatsappusers">
             
         </div>
         
     </div>
        <!-- /.login-box -->


        <!-- iCheck -->
    </div>
</div>



<script>

function fetchmultipleuser() {

   const value = JSON.parse(sessionStorage.getItem("whatsapploginUsers"));
   console.log(value);


    for (let i = 0; i < value.length; i++) {
                        $(".whatsappusers").append(
                            `<div class="card col-md-4"> <div class="card-header text-center"><img src="<?php echo base_url(); ?>/assets/images/user1.png" class="img-circle"alt="User Image" style="height: 60px!important;width: 60px!important;"></div> <div class="card-body"><h5 class="card-title text-center">${value[i].userId}</h5><div class="card-text  text-center"><div> User name : ${value[i].name}</div><div>Email : ${value[i].email}</div> </div></div><div class="card-footer text-body-secondary text-center"><button  class="btn btn-primary" type="submit" onclick="whatsapploginverification('${value[i].userId}')">Login</a></div></div>`
                        );
                    }
}




fetchmultipleuser();

function whatsapploginverification(userid) {

let baseUrl="";

       if(window.location.href.includes('http://localhost/')){
        baseUrl="http://ec2-15-207-239-145.ap-south-1.compute.amazonaws.com:8080/oxyloans/";

       }else if(window.location.href.includes('https://www.oxyloans.com/')){
           baseUrl="https://fintech.oxyloans.com/oxyloans/";
       }else {
        baseUrl="http://ec2-15-207-239-145.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
       }

        var postData = {
            
        };

        var postData = JSON.stringify(postData);
        
        var whatsAppLoginUrls = baseUrl + "v1/user/whatsapp-login-after-otp-verification/"+userid.substring(2);
        $.ajax({
            url: whatsAppLoginUrls,
            type: "POST",
            data: postData,
            contentType: "application/json",
            dataType: "json",
            success: function (data) {


                 console.log(data);

              writeCookie("saccessToken", data.accessToken);
              
                userID = data.id;
                userType = data.primaryType;
                var sId = data.id;
                writeCookie("sUserId", sId);
                var sUserType = data.primaryType;
                writeCookie("sUserType", sUserType);

                if (sUserType == "LENDER") {
                    window.location = "idb";
                } else if (sUserType == "ADMIN") {
                    window.location = "admin/dashboard";
                } else if (sUserType == "PAYMENTSADMIN") {
                    window.location = "admin/paymentsUpload";
                } else if (sUserType == "PARTNERADMIN") {
                    window.location = "admin/createUtmforpartnerDealer";
                }else if (sUserType == "STUDENTADMIN") {
                    window.location = "admin/viewListOfFds";
                } else {
                    window.location = "borrowerDashboard";
                }
            },
            statusCode: {
                200: function (response) {
                    //alert('1');
                    console.log("Login Successs");
                },
                401: function (response) {
                    //alert('Invalid username or password.');
                    $(".erroruser").show();
                },
                400: function (response) {
                    alert("1");
                    bootbox.alert(
                        '<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
                        function () {}
                    );
                },
                404: function (response) {
                    alert("1");
                    bootbox.alert(
                        '<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
                        function () {}
                    );
                },
            },
        }).done(function (data, textStatus, xhr) {



            console.log(data);
    
          console.log(xhr.getResponseHeader("accessToken"));
           accessToken = xhr.getResponseHeader("accessToken");
          writeCookie("saccessToken", accessToken);

       //   var sUserType = data.primaryType;

       // if (sUserType == "LENDER") {
       //       window.location = "idb";
       //   } else if(sUserType == "ADMIN") {
       //       window.location = "admin/dashboard";
       //   } else if(sUserType == "PAYMENTSADMIN") {
       //       window.location = "admin/paymentsUpload";
       //   } else if(sUserType == "PARTNERADMIN") {
       //       window.location = "admin/createUtmforpartnerDealer";
       //   }else if(sUserType == "STUDENTADMIN") {
       //     window.location = "admin/viewListOfFds";
       //   } else {
       //       window.location = "borrowerDashboard";
       //   }
     });
    
}
</script>





















<!-- Get user's whatsapp number and name -->
<!-- 
 <script type="text/javascript" src="https://otpless.com/auth.js"></script>
<script type="text/javascript">
  function otpless(otplessUser) {
   Otplessintegration(otplessUser);
}
</script>  -->

<?php include 'footer.php';?>