<?php include 'header1.php';?>
<!-- wrapper starts -->
<?php
   $urlfromBroweser = $_SERVER['REQUEST_URI'];
  
  $userID =  isset($_GET['id']) ? $_GET['id'] : '0';
  $userName =  isset($_GET['Name']) ? $_GET['Name'] : '';
  $UserEmail =  isset($_GET['Email']) ? $_GET['Email'] : '';
  $UseGender =  isset($_GET['Gender']) ? $_GET['Gender'] : '';
  $emailverified =  isset($_GET['emailVerified']) ? $_GET['emailVerified'] : 'false';
  $userLastname =  isset($_GET['lastname']) ? $_GET['lastname'] : '';
  $utm =  isset($_GET['Utm']) ? $_GET['Utm'] : '';
  $uniqueNumber="0";
  

  if($utm!=''){
   $utmValue="Facebook";
  }else{
    $utmValue="Gmail";
  }

?>
<div class="main-cont">
    <div class="container">
        <div class="middle-block">
            <div class="form-block1 block-loan">
                <div class="loginThroughEmail">
                    <center>
                        <h3 style="color:#149bd7;">
                            Registration</h3>
                    </center>
                    <br /><br />
                    <div class="clear"></div>
                    <form id="gmailUserSection" autocomplete="off" method="post">
                        <div class="lenderstep1 mar15">
                            <div class="form-lft">
                                <label for="first name">User Name<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" id="gmailUserfirstname" name="gmailUserfirstname"
                                        placeholder="Enter User Name">
                                    <input type="hidden" id="googleId" class="text-fld1" value="<?php echo $userID;?>">
                                    <input type="hidden" id="userEmail" class="text-fld1"
                                        value="<?php echo $UserEmail;?>">
                                    <input type="hidden" id="uniqueNumber" class="text-fld1"
                                        value="<?php echo $uniqueNumber;?>">
                                    <input type="hidden" id="utmSource" class="text-fld1"
                                        value="<?php echo $utmValue;?>">
                                    <input type="hidden" id="emailverified" name="emailverified" class="text-fld1"
                                        value="<?php echo $emailverified;?>">

                                    <input type="hidden" id="userLastname" name="userLastname" class="text-fld1"
                                        value="<?php echo $userLastname;?>">


                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Register Type<i>*</i></label>
                                <div class="fld-block">
                                    <select name="primaryType" id="gmailprimaryType" class="form-control">
                                        <option value="" class="text-middle"> Choose Register Type </option>
                                        <option value="LENDER">Lender</option>
                                        <option value="BORROWER">Borrower</option>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Mobile No<i>*</i></label>
                                <div class="fld-block">
                                    <em class="mobile1">+91</em>
                                    <div class="mobile22">
                                        <input type="text" placeholder="xxx-xxx-xxxx" id="gmailUsermobileNumber"
                                            name="lmobileNumber" class="mobile2">
                                    </div>
                                    <input type="text" style="display: none;" placeholder="Account Type" id="acctype"
                                        value="NONNRI" name="lenderpincode" class="text-fld1">

                                    <div class="verify_btn">
                                        <button type="button" class="btn  btn-success btn-gtextchange"
                                            id="gmailUsermobileverifybutton" onclick="verifyGmailUserNumber();">
                                            <span>Send OTP</span></button>
                                        <span class="sucessotp" style="display:none; color: green;"><b>OTP
                                                Sent</b></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>OTP<i>*</i></label>
                                <div class="fld-block">
                                    <input type="text" placeholder="OTP" id="gmailUserotpvalue" name="lenderotpvalue"
                                        class="text-fld1">
                                    <span class="errorotp" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <input type="hidden" id="gmailUsermobilesession">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>

                            <div class="form-lft">
                                <label>Email ID<i>*</i></label>
                                <div class="fld-block">
                                    <input type="email" placeholder="E-mail..." name="glenderemailValue"
                                        id="glenderemailValue" value="" class="text-fld text-fld1">
                                    <span class="erroremail" style="display:none; color: red;">Invalid OTP value please
                                        check.</span>
                                    <input type="hidden" id="lendermobilesession">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>City<i>*</i></label>
                                <div class="fld-block">
                                    <input type="city" placeholder="Enter your city" name="usercity" id="usercity"
                                        value="" class="text-fld text-fld1">
                                    <span class="erroremail" style="display:none; color: red;">Enter Your city</span>

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="form-lft">
                                <label>Loan Amount<i>*</i></label>
                                <select id="select-beast" class="select1" placeholder="Enter or Select the Amount..."
                                    name="lenderamtvalue">
                                    <option value="">Enter or Select the Lending Amount...</option>
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
                                <div class="clear"></div>
                            </div>
                            <div class="form-lft">
                                <label>Gender<i>*</i></label>
                                <div class="gendar-block">
                                    <label class="redioboxes"><img
                                            src="<?php echo base_url(); ?>assets/images/icon1.png" alt="icon1"
                                            id="lendermaleradio">
                                        <input type="radio" name="lendergender" value="Male"
                                            <?php echo ($UseGender=='Male')?'checked':'' ?> id="lendergenderRadioMale"
                                            class="lendergenderRadiocls">
                                        <span class="checkmark checkman"></span>
                                        <small>Male</small>
                                    </label>
                                    <label class="redioboxes"><img
                                            src="<?php echo base_url(); ?>assets/images/icon2.png" alt="icon2"
                                            id="lenderfemaleradio">
                                        <input type="radio" name="lendergender" value="Female"
                                            <?php echo ($UseGender=='Female')?'checked':'' ?>
                                            id="lendergenderRadioFeMale" class="lendergenderRadiocls">
                                        <span class="checkmark"></span>
                                        <small>Female</small>
                                    </label>

                                </div>

                                <div class="clear"></div>
                                <div class="clear"></div></br>

                            </div>
                            <div class="col-md-8 pull-right">
                                <button type="submit col-md-1"
                                    class="f-submitBtn btn-primary btn-flat    col-md-6">Submit</button>
                                <!--  <button type="button col-xs-12" class="f-submitBtn btn btn-flat btn-frwd" data-toggle="modal" data-target="#myModal"><img data-toggle="tooltip" title="Next" src="<?php echo base_url(); ?>assets/images/arrow.png" alt="arrow"></button> -->

                                <!--  <input type="submit" class="f-submitBtn btn-success btn-flat col-md-6"> -->
                            </div>
                            <div class="clear"></div>
                            <div class="clear"></div>
                        </div>

                    </form>
                </div>

            </div>


        </div>

    </div>
</div>

<div class="modal modal-warning fade" id="modal-mobileerror">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Oops!</h4>
            </div>
            <div class="modal-body">
                <p>The mobile has already been registered. Please Login.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right loginbtn" data-dismiss="modal">Login</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


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
<script type="text/javascript">
$(document).ready(function() {
    $("#gmailUserfirstname").val("<?php echo $userName?>");
    $("#glenderemailValue").val("<?php echo $UserEmail?>");


});
</script>
<?php include 'footer.php';?>