<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Monthly Transfers EMI Amount To The Lenders
        </h1>
    </section>

    <div class="cls"></div>
    </br>
    </br>
    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-xs-3 text-center">
                <select class="form-control choosenType" id="Search">
                    <option value="">-- Choose Month and year --</option>
                    <option value="amount&city">MONTH&YEAR</option>
                </select>
                <span class="errorsearch" style="display: none;">Please Choose Month And Year.</span>
            </div>

            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control amount" id="lenderid" placeholder="Lender ID">
            </div>

            <div class="col-xs-2 text-center city" style="display: none;">
                <select class="form-control" name="city" id="monthvalue" class="form-control city">
                    <option value=""> Select Month</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col-xs-2 text-center amount" style="display: none;">
                <select id="selectElementId">
                    <option value=""> Select year</option>
                </select>
            </div>

            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="lendersemiamountsearch();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>


        <div class="cls"></div>

        <div class="row customFormQ">
            <div class="cls"></div>
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="acceptedPagination">
                                        <ul class="pagination bootpag">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Lender ID</th>
                                    <th>Lender Name</th>
                                    <th>Lender Account Number</th>
                                    <th>EMI Amount</th>
                                    <th>DueDateOn</th>


                                    <!-- <th>Transaction Screen Shot</th>
                  <th>Status</th>   -->
                                </tr>
                            </thead>
                            <tbody id="displaywallettrns" class="displaywallettrns">
                                <!-- <td><a href="lenderAcceptedoffers?appNumber={{loanRequestId}}">{{loanRequest}}</a></td>
            -->
                                </tfoot>
                        </table>
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


<script id="wallettransactiondetails" type="text/template">
    {{#data}}
                <tr> 
                  <td><a href="javascript:void(0)" class="viewLoanLenders"onclick="viewLenderemi({{lenderId}})">LR{{lenderId}}</a>
                  </td>
                  <td>{{lenderName}}</td>
                  <td>{{lenderAccountNumber}}</td>
                  <td>{{sumOfEmiAmount}}</td>
                   <td>{{dueOnDate}}</td>
                </tr>






<tr>
  <td style="display:none;" colspan="14" class="viewrunningLoanLenders  viewrunningLoanLenders-{{lenderId}}">

      <div class="col-md-6 pull-right">
                    <div class="interstedPagination1 pull-right">
                      <ul class="pagination bootpag">
                    </ul>
                  </div>

                </div>
        
       <table class="table table-bordered table-hover">
              <thead>
               <tr style="background-color: aqua; border: 3px solid lightgrey;">
               
                  <th>borrower Name</th>
                  <th>loan Id</th>
                  <th>disbursement Date</th>
                  <th>emi Amount</th>
                  <th>borrowerId</th>
                   <th>emiDueOn</th>
                  <th>emiPaidOn</th>
              </tr>
              </thead>
              <tbody id="viewrunningLoanLenders-{{lenderId}}">                   
               <tr id="displayNoLoanRecords" class="displayNoLoanRecords" >
                    <td colspan="8">No Offers found!</td>
                </tr>  
                </tbody>   
              </tfoot>
            </table>
      </td>
</br>
</br>
    </tr>
            {{/data}}
  </script>

<script type="text/javascript">
$(document).ready(function() {
    noprofileCheck = "no";
    noROICheck = "no";
    //loadWalletDetails();   
    lendersemiamount();
});
</script>



<script>
var min = 2015,
    max = 2030,
    select = document.getElementById('selectElementId');

for (var i = min; i <= max; i++) {
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
}
</script>
<style type="text/css">
#selectElementId {
    box-sizing: border-box;
    height: 35px;
    width: 100px;
}
</style>
<script id="loadLendersRunningloans" type="text/template">
    {{#data}}
      <tr style="border: 3px solid lightgrey;">
       
        <td>{{borrowerName}}</td>
       <td>{{loanId}}</td>
        <td>{{disbursementDate}}</td>
           <td>{{emiAmount}}</td>
              <td>BR{{borrowerId}}</td>
               <td>{{emiDueOn}}</td>
               <td>{{emiPaidOn}}</td>


      </tr>
  {{/data}}
</script>

<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>

<?php include 'admin_footer.php';?>