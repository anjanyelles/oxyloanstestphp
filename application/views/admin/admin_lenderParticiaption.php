<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Display lenderParticiaption
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title"> </h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="approvedPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchapprovedPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <label for="name" class="col-sm-4 col-form-label" id="names"> </h4>Deal ID :</h4></label>
                            <div class="col-sm-4">
                                <input type="text" name="dealid" class="form-control" placeholder="ENTER THE DEAL ID"
                                    id="dealId" required="required" />
                            </div>

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-xm btn-primary" id="profit-submit-btn"
                                    onclick=" displaylenderParticiaption();">Submit</button>

                            </div>

                        </div>
                        <div class="box-body lendersparticiaption" style="display: none;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr id="example">

                                        <th>Deal ID</th>
                                        <th>Disbursment Amount Pending</th>
                                        <th>Lenders Participated Amount</th>
                                        <th>Disbursment</th>
                                    </tr>
                                </thead>
                                <tbody id="particiaptionList">


                                    </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<script id="particiaptionListTpl" type="text/template">
    {{#data}}
      <tr>    
        <td>{{dealId}}</td>
         <td>{{sumOfDisbursmentAmountPending}}</td>
          <td>{{sumOfLendersParticipatedAmount}}</td>
           <td><center><button type="button" class="btn btn-success  btn-sm userDisbursed" onclick="parparticiaptionDisbursed('{{dealId}}')"> <b>Disburse</b></button></center></td>

      </tr>   
  {{/data}}
</script>
<div class="modal  fade" id="modal-Disbursementdate-Particiaption">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Disbursement Date</h4>
            </div>
            <div class="modal-body">
                <form>

                    <label> Disbursement Date<em class="mandatory">*</em> </label>
                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input type="text" class="form-control borrowerDisbursementDate dobformat"
                            id="dealDisbursementDate" placeholder="DD/MM/YYYY" name="borrowerDisbursementDate">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn  btn-primary btn-sm saveEmidateBtn" id="dealparticiaptionid"
                        onclick="dealIdDisbursment();">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-success fade" id="modal-disbursementdatesuccess-dealLevel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Successfully entered the disbursement date,Now this record seen in running loans.
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




<script type="text/javascript">
$(document).ready(function() {

    $('#dealDisbursementDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('#borrowerDisbursementsDate').datepicker({
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        // startDate: new Date(),
        autoclose: true
    });
});
</script>


<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>


<style type="text/css">
/* .btn-APPROVED{opacity: 0.5; cursor: not-allowed;}*/
#user-DISBURSED {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);

    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>

<?php include 'admin_footer.php';?>