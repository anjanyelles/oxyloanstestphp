<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['id']) ? $_GET['id'] : '0';;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h3>
                        View Deal Info
                    </h3>
                </div>
                <div class="col-xs-6">
                    <span class="pull-right">
                        <a href="viewDeals" class="btn btn-info">
                            &larr; &nbsp;Back to Deals
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="col-md-6">

                            <h4>Participated Value:- <span class="pinfo"></span></h4>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="dashBoardPagination pull-right">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                            <div class="searchborrowerPagination pull-right" style="display: none;">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr id="example">
                                    <th>Deal Name</th>
                                    <th>Lender Id</th>

                                    <th>Date</th>
                                    <th>Paticipated Amount</th>
                                    <th>RoI</th>
                                    <th>Fee Status</th>
                                    <th>Agreement Status</th>
                                </tr>
                            </thead>
                            <tbody id="displayDealsData" class="mobileDiv_3">
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Deal Nader gul</td>
                                    <td>200</td>
                                    <td>Mahender Reddy</td>
                                    <td>29%</td>
                                    <td>26%</td>
                                    <td>Initiated</td>
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
    <script id="displayDealsScript" type="text/template">
        {{#data}}
    <tr class="divBlock_Mob_001">
      <td>

<span class="lable_mobileDiv">Deal Name</span>

      {{dealName}}</td>
      <td>
        <span class="lable_mobileDiv">LenderId</span>
        LR{{lenderId}}
      </td>
      
      <td>
 <span class="lable_mobileDiv">registeredDate</span>

      {{registeredDate}}</td>
      <td>
 <span class="lable_mobileDiv">Amount</span>

        <span >{{paticipatedAmount}}</span>
      <input value="{{paticipatedAmount}}" class="paticipatedAmountVal hide" />
    </td>
    <td>


    <span class="lable_mobileDiv">Roi</span>
    {{rateOfInterest}}</td>
    <td>

     <span class="lable_mobileDiv">feeStatus</span>
    {{feeStatus}}</td>
    <td>
      <span class="lable_mobileDiv">Status</span>
      {{#paticipatedState}}
      Not Yet Done
      {{/paticipatedState}}
      {{^paticipatedState}}
      Generated
      {{/paticipatedState}}
    </td>
  </tr>
  {{/data}}
  </script>
    <script type="text/javascript">
    window.onload = viewDealLenders(<?php echo $dealId; ?>);
    var sum;
    $(document).on("load", ".paticipatedAmountVal", function() {
        sum = 0;
        $(".paticipatedAmountVal").each(function() {
            sum += +$(this).val();
            console.log(sum)
        });
        $(".pinfo").html(sum);
    });
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">