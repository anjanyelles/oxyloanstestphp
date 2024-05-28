<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Highest Paid Borrowers
        </h1>
    </section><br />

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
            <div class="col-xs-2 text-center city" style="display: none;">
                <!--  <input type="text" name="city" class="form-control city cityInputs autocomplete" placeholder="City"> -->
                <select class="form-control" name="city" id="monthvalue" class="form-control city">
                    <option value=""> Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="col-xs-2 text-center amount" style="display: none;">
                <input type="text" name="amount" class="form-control year" placeholder="Enter The Year">
            </div>
            <div class="col-xs-3 text-center">
                <button type="button" class="btn bg-gray pull-left search-btn" onclick="highestpaidborrowersearch();"><i
                        class="fa fa-angle-double-right"></i> <b>Search</b>
                </button>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <h3 class="box-title">Paid Borrowers info</h3>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="runningLoansPagination pull-right">
                                <!-- <h4>Choose Month And Year</h4> -->
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Loan Owner Name</th>
                                    <th>Total Paid Amount</th>
                                    <!-- <th>Paid Date </th> -->
                                    <!-- <th>Paid Amount</th> -->

                                </tr>
                            </thead>
                            <tbody id="displayRecords">

                                <tr>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tfoot>
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




<div class="modal modal-warning fade" id="modal-alreadyDoneSendOffer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p id="text1">Current Month Paid Borrowers Data has not Found Please Search The Previous Month </p>
            </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"
                        id="highest">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<style type="text/css">
#example2 {

    font-family: arial;
    box-sizing: border-box;

}

th,
td {
    border: 1px solid lightgrey;
    text-align: left;
}

th {
    background-color: #6482BD;
    color: white;
}

td,
tr:nth-child(odd) {
    background-color: lightgrey;
}
</style>
<script id="displayRecordsTpl" type="text/template">
    {{#data}}
      <tr>
        <td>

          {{loanOwnerName}}
           <br/>
            
        </td>
        <td class ="{{loanOwnerName}}">
          <b>Total Paid :- {{amount}}</b><br/><br/>
          <div  class="hide result-sree"></div>
          <div class="hide result-saral"></div>
          <div class="hide result-gogineni"></div>
          <div  class="hide result-lucky"></div>
          <div  class="hide result-lv"></div>
          <div  class="hide result-padmini"></div>
          <div  class="hide result-sharanya"></div>
          <div  class="hide result-toll"></div>
        </td>
        <!-- <td>{{indvidualPaymentsByOwner.paid_date}}</td> -->
        <!-- <td>{{individualAmountByOwner.individualAmountByOwner}}</td> -->

        

      </tr>   
  {{/data}}
</script>
<script type="text/javascript">
window.onload = highestpaidborrowers();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>S