<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$gmailcode =  isset($_GET['code']) ? $_GET['code'] : '';
// echo "<script>alert('$gmailcode');</script>";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <left>
            <h1>
                My Gmail Contacts
            </h1>
        </left>
        <div class="pull-right classcopyrefLink">
            <input type="hidden" id="gmailcode" name="gmailcode" class="text-fld1" value="<?php echo $gmailcode;?>">
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="pull-right">
                            <input id="selectAll" type="checkbox"><label for='selectAll'>Invite All</label>
                        </div>
                        <table id="example2" class="table table-bordered table-hover"><br />
                            <thead>

                                
                                <tr>
                                    <th>Email</th>
                                    <th>Contact Name</th>
                                    <th>Invite</th>
                                </tr>
                            </thead>
                            <tbody id="gmailcontacts">
                                <tr id="gmailContactsNoData" style="display:none">
                                    <td colspan="8">No data found</td>
                                </tr>

                                </tfoot>
                        </table></br>
                        <div class="row col-md-6">
                            <button type="button" class="btn btn-lg btn-secondary pull-right col-xs-5"
                                onclick="previewLink();">Preview</button>
                            <button type="button" class="btn btn-lg btn-success pull-left col-xs-5"
                                onclick="bulkinvitelender();">invite</button>

                        </div>
                    </div>


                    <div class="pull-left col-xs-2 sbtBtnsPs">
                        <div class="pull-right">
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- form start -->

            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-previewEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Here is the email invitation preview</h4>
            </div>
            <div class="modal-body emailcontent">
                <p>Subject:-<span class="usrNameEmails"></span></p>
                <br />
                <p class="pull-right">Date:- <span class="getDate" style="padding: 0px;"></span></p>
                <br />
                <div class="clear" id="subjectbulk"></div>
                <div class="row">
                    <p>Hi <span class="getfrndName" style="padding: 0px;"></span></p><br />
                    <p>Greetings from <i class="usrNameEmail"></i>! I am an existing lender in OxyLoans.com!
                        OXYLOANS.com– RBI Approved Peer 2 Peer Lending Platform. OxyLoans enables every individual to
                        Lend Money Like A Bank.</p><br />
                    <p class="getEmailMessage quote-text" id="contentbulk"></p>
                    <br />
                    <p><a href="javascript:void(0)">Please join as a Lender / Investor and start earning monthly
                            income.</a></p>
                    <p></p><br />
                    <p>OxyLoans is founded and run by Mr.Radhakrishna Thatavarti! Please review his linkedin profile, <a
                            href="https://www.linkedin.com/in/oxyradhakrishna/"
                            target="_blank">https://www.linkedin.com/in/oxyradhakrishna/</a>. I am sending this
                        e-mail on my own interest, I have experienced good response directly from the founder and
                        respective team. Please feel free to reach me on 221455225</p><br />
                    <p>
                        Thanks & Regards,<br />
                    <p class="usrNameEmail"></p>
                    </p><br />
                    <p></p><br />
                </div>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script id="Gmailcontacts" type="text/template">
    {{#data}}
  <tr>
     <td>{{emailAddress}}</td>
    <td>{{contactName}}</td>
    <td><input type="checkbox"  name="type"  id="selectAll" value="{{contactName}}-{{emailAddress}}"></td>
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
window.onload = Gmailcontacts();
$(document).ready(function() {
    emailcontent();
    getlendercontacts();

    setTimeout(()=>{
    emailcontent();
    getlendercontacts(); 
},2000);
   
});
</script>
<script>
$('#selectAll').on('click', function() {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});
</script>
<div class="modal modal-success fade" id="modal-alreadyDoneSendOffers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thank you for referring. your's friend.</br>
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" id="emailredirection"
                        data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-warning fade" id="modal-alreadyLenderReferred">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Thank you for referring. your's friend.</br>
                </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" id="emailredirection"
                        data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>