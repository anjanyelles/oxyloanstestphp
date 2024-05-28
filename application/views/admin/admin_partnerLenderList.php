<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="pull-left col-md-6">
            <h1 class="text-bold">
                Registered Lenders
            </h1>
        </div>
        <div class="pull-left col-md-6" style="display: none;">
        </div>
    </section>
    <div class="cls"></div>
    <section class="content"></br></br>
        <div class="row customFormQ">
            <div class="cls"></div>
            <div class="col-md-12">
                <div class="box box-secondary">
                    <div class="box-header MobDiv_05">
                        Registered Lenders
                    </div>
                    <div class="box-body editlendergroup">
                        </br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">
                                    <th>name</th>
                                    <th>userId</th>
                                    <th>mobileNumber</th>
                                    <th>email</th>

                                </tr>
                            </thead>
                            <tbody id="loadDealsInfo" class="displayoffers mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="12">No User found!</td>
                                </tr>
                            </tbody>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>
<div class="modal  fade" id="update-paretner-details-mobile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Your Number & Email</h4>
            </div>
            <div class="modal-body">
                <label>phone Number</label>
                <input type="text" name="whastappnumber" id="partnerPhone" class="form-control partnerPhone"></br>
                <label>Email</label>
                <input type="text" name="whastappnumber" id="partnerEmail" class="form-control partnerEmail">
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-info" onclick="partnerUpdateNumberEmail();">Submit</button>
                    <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-sucessfully-updated">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>Your are successfully updated the Email& Mobile</br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<script id="displayInterestScript" type="text/template">
    {{#data}}
<tr class="divBlock_Mob_001">
  <td>
<span class="lable_mobileDiv">name</span>
  {{name}}

</td>
  <td>
<span class="lable_mobileDiv">userId</span>
  {{userId}}</td>
  <td>
     <span class="lable_mobileDiv">mobileNumber</span>
    {{mobileNumber}}
  </td>
  <td>
<span class="lable_mobileDiv">email</span>
    {{email}}
  </td>
</tr>
{{/data}}
</script>
<script type="text/javascript">
window.onload = getListOfLendersList();
window.onload = updateEmailMobile();
</script>
<?php include 'admin_footer.php';?>