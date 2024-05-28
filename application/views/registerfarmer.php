<?php include 'header1.php';?>
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  //echo $urlfromBroweser;
  $utmValue =  "";

  if(isset($_GET['utm'])) {
     $utmValue = $_GET['utm'];
     //echo $city;
  }
  
  if($utmValue == ""){
      $utmValue = "Web";
  }
  //$receivedEmailToken = $_GET['emailToken'];
?>
<div class="main-cont">
    <div class="container">
        <div class="middle-block">
            <div class="form-block1 block-loan">
                <center>
                    <h3 style="color:#149bd7;">Register as a Borrower</h3>
                </center><br>

                <form id="registerborrowernonotication" autocomplete="off" method="post">

                    <div class="form-lft">
                        <label>Mobile No<i>*</i></label>
                        <div class="fld-block">
                            <input type="text" placeholder="xxx-xxx-xxxx" id="bmobileNumber" name="bmobileNumber"
                                class="text-fld text-fld1" />

                            <input type="text" style="display: none;" class="form-control borroweruserType"
                                placeholder="Enter amount" id="borroweruserType" name="borroweruserType"
                                value="BORROWER">

                        </div>
                    </div>

                    <br /><br />
                    <div class="form-lft">
                        <label for="first name">First Name<i>*</i></label>
                        <div class="fld-block">
                            <input type="text" id="firstname" name="firstname" class="text-fld1"
                                placeholder="First Name as per PAN card">
                            <!-- UTM Value -->
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="form-lft">
                        <label>Last Name<i>*</i></label>
                        <div class="fld-block">
                            <input type="text" placeholder="Last Name as per PAN card" id="lastname" name="lastname"
                                class="text-fld1">
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="form-lft">
                        <label>Email ID<i>*</i></label>
                        <div class="fld-block verify_block">
                            <input type="email" placeholder="E-mail..." name="emailValue" id="emailValue"
                                class="text-fld text-fld1">

                            <div class="clear"></div>
                            <label id="emailerror" style="color:red; font-size:11px; width:100%; display:none;">please
                                enter your email id</label>
                        </div>
                        <div class="clear"></div>
                    </div>


                    <div class="form-lft">
                        <label>Birth Date<i>*</i></label>
                        <div class="fld-block">
                            <input type="text" placeholder="dd/mm/yyyy" id="dateofbirth" name="dob" class="text-fld1">
                            <i><img src="<?php echo base_url(); ?>assets/images/calender.png" alt="calender" id=""></i>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="form-lft">
                        <label>Loan Amount<i>*</i></label>
                        <select id="select-beast" class="select1" placeholder="Enter or Select the Amount..."
                            name="borrowerAmtValue">
                            <option value="">Enter or Select the Amount...</option>
                            <option value="10000">10000</option>
                            <option value="20000">20000</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="60000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                            <option value="100000">100000</option>
                        </select>
                        <!--<label class="other-amt">Other Amount:</label>
                              <div class="fld-block form-other-amount">
                                <input type="text" class="text-fld1" id="borrowerAmtValue" name="borrowerAmtValue">
                                <div class="clear"></div>
                             </div> -->
                        <div class="clear"></div>
                    </div>


                    <div class="form-lft">
                        <label>Gender<i>*</i></label>
                        <div class="gendar-block">

                            <label class="redioboxes"><img src="<?php echo base_url(); ?>assets/images/icon1.png"
                                    alt="icon1" id="maleradio">
                                <input type="radio" name="gender" value="M" id="genderRadioMale">
                                <span class="checkmark checkman"></span>
                                <small>Male</small>
                            </label>
                            <label class="redioboxes"><img src="<?php echo base_url(); ?>assets/images/icon2.png"
                                    alt="icon2" id="femaleradio">
                                <input type="radio" name="gender" value="F" id="genderRadioFeMale">
                                <span class="checkmark"></span>
                                <small>Female</small>
                            </label>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>



                    <br /><br />



                    <div class="form-lft form-otp">
                        <label>State</label>
                        <div class="fld-block">
                            <input type="text" placeholder="Auto Fill with Pin Code" class="text-fld1" name="stateValue"
                                id="stateValue" readonly="true">
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>



                    <div class="form-lft form-mob">
                        <label>City<i>*</i></label>
                        <div class="fld-block citydrop">

                            <input type="text" name="others" id="cityValue" placeholder='Enter City' />

                            <div class="clear"></div>
                        </div>

                    </div>

                    <div class="clear"></div>
                    <div class="form-lft">
                        <label for="pin code" id="labelpincode">PIN Code<i>*</i></label>
                        <div class="fld-block">
                            <input type="text" placeholder="PIN Code" id="pincode" name="pincode" class="text-fld1">
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <button id="submitDataNotification" class="btn btn-success" style="width: 100%">SUBMIT</button>


                </form>
            </div>
        </div>
    </div>
</div>


<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>

<!-- container ends -->
<!-- wrapper ends -->
<!-- SET: SCRIPTS -->



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.default.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dd.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css?oxyloans=<?php echo time(); ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css?oxyloans=<?php echo time(); ?>">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script src="<?php echo base_url(); ?>assets/js/moment.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/myscript.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/animation.js?oxyloans=<?php echo time(); ?>"></script>

<script src="<?php echo base_url(); ?>assets/js/selectize.js?oxyloans=<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dd.js?oxyloans=<?php echo time(); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- END: SCRIPTS -->
<script>
$(function() {
    $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:2019",
        dateFormat: "dd/mm/yy"
    });
});
</script>

<style type="text/css">
.lbchkbox label {
    font-style: 0px;
}

.form-block1 {
    overflow-y: scroll;
}
</style>
<?php include 'footer.php';?>