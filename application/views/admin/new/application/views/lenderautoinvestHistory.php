<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lender Auto Invest History
        </h1>
    </section><br />

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title" style="color: #008B8B; ">Lender info</h3><br />
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="displaylenderdetails">
                                        <span><b>UserId :</b></span> <span class="displayUserId"></span><br />
                                        <span><b>Name :</b></span> <span class="displayName"></span><br />
                                        <span><b>City :</b></span> <span class="displaycity"></span><br />
                                        <span><b>Email :</b></span> <span class="displayEmail"></span><br />
                                        <span><b>Mobile Number :</b></span> <span class="displayMobileNumber"></span>

                                    </h4>

                                </div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <div class="lendersautoinvestPagination pull-right">
                                    <ul class="pagination bootpag">
                                    </ul>
                                </div>

                                <div class="searchlendersautoinvestPagination pull-right" style="display: none;">
                                    <ul class="pagination bootpag">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" border="1">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>S#</th>
                                    <th>Created on</th>
                                    <th>Deal Type</th>
                                    <th>status</th>
                                    <th>Edit</th>
                                    <!-- <th>Oxyscore</th> -->
                                    <!--  <th>Employment Type & Salary Range</th>
                                    <th>Max Loan Amount</th>
                                    <th>Duration & ROI</th> -->

                                    <!-- <th>Status</th> -->
                                </tr>
                            </thead>
                            <tbody id="loadlendersautoinvestList" class=" mobileDiv_3">

                                <tr class="noRecordHistory" style="display:none">
                                    <th colspan="8">No Data found</th>
                                </tr>


                            </tbody>
                        </table>
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


<div class="modal modal-success fade" id="modal-diableAvtoInvestment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks</h4>
            </div>
            <div class="modal-body auto-invest-modal">
                <p id="text1"></br>
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


<script id="loadlendersAutoinvestListHistory" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">

         <td>
        <span class="lable_mobileDiv">so</span>
       {{so}}  

        </td>
       <td>
        <span class="lable_mobileDiv">createdOn</span>
       {{createdDate}}  

        </td>
        <td>
        <span class="lable_mobileDiv">dealType</span>
       {{dealType}}  

        </td>
         <td>
        <span class="lable_mobileDiv">status</span>
       {{status}}  

        </td>
         <td class="col-md-4">
        <span class="lable_mobileDiv">Edit</span>

        <button class="btn btn-{{btncolor}} btn-xs auto_status" onclick="disbaleAutoInvest('{{id}}','{{status}}');">{{buttonsStatus}}</button>
         
        </td>
  
      
      </tr>


  {{/data}}
</script>

<!-- <script id="loadlendersAutoinvestListTpl" type="text/template">
    {{#data}}
      <tr class="divBlock_Mob_001">
       <td>
<span class="lable_mobileDiv">createdOn</span>
       {{createdOn}}  

     </td>
       <td>
        <span class="lable_mobileDiv">riskCategory</span>
       {{riskCategory}}

     </td>
       <td>
         <span class="lable_mobileDiv">gender</span>
       {{gender}}
     </td>
       <td>
        <span class="lable_mobileDiv">city</span>
       {{city}}

     </td>
       <td>
          <span class="lable_mobileDiv">oxyScore</span>
       {{oxyScore}}
     </td>
         <td>
           <span class="lable_mobileDiv">Employment&Salary</span>
         <b> Employment Type:</b>{{employmentType}} <br/>
        <b>Salary Range:</b> {{salaryRange}} <br/>
       </td>
       <td>
         <span class="lable_mobileDiv">maxAmount</span>
       {{maxAmount}}
     </td>
       <td>
           <span class="lable_mobileDiv">Duration& ROI</span>
        <b>Duration:</b> {{duration}}<br/>
        <b>RateOfInterest:</b> {{rateOfInterest}} <br/>
       </td>
        
         <td>
          <span class="lable_mobileDiv">status</span>
         {{status}} 
          </td>   
      </tr>


  {{/data}}
</script> -->




<script type="text/javascript">
window.onload = loadlendersAutoinvesthistory();
window.onload = loadAutoHistory();
</script>

<style type="text/css">
#example2 tr th,
#example2 tr td {
    border: 1px solid #000;
}

#example2 tr th {
    background-color: #D3D3D3;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'footer.php';?>