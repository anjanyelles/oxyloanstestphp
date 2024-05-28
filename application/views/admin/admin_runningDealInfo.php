<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealName =  isset($_GET['dealName']) ? $_GET['dealName'] : 'NORMAL';
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            AUM (Running Deals Info)
        </h1>
    </section>
    <div class="cls"></div>
    </br>
    </br>
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
                            <div class="row">
                                <div class="col-md-12">

                                    <a href="runningDealInfo?dealName=NORMAL"><button class="btn btn-default">Normal
                                            Deal</button></a>
                                    <a href="runningDealInfo?dealName=ESCROW"><button class="btn btn-info">Escrow
                                            Deal</button></a>
                                    <a href="runningDealInfo?dealName=EQUITY"><button class="btn btn-success">Equity
                                            Deal</button></a>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-4">
                                <h5 class="participatonAmount">Total <?php echo$dealName?> Amount:INR <span
                                        class="allDealsParticipationSum">100000</span></h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="participatonAmount"> Achieved <?php echo$dealName?> Amount :INR
                                    <span class="allDealsParticipationachived">100000</span>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="participatonAmount"> Current <?php echo$dealName?> Value:INR
                                    <span class="allDealsCurrentAmount">100000</span>
                                </h5>
                            </div>
                        </div>
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>Deal Name</th>
                                    <th>Deal Amount</th>
                                    <th>Total Participation</th>
                                    <th>Current Deal Amount</th>

                                </tr>
                            </thead>
                            <tbody id="displayRunningInfo" class="displaywallettrns">
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script type="text/javascript">
$(document).ready(function() {
    runningDealInformation('<?php echo$dealName?>');
});
</script>
<script id="runningDealsInformation" type="text/template">
    {{#data}}
  <tr>
    
    <td>{{dealName}}</td>
    <td>{{dealAmount}}</td>
    <td>{{totalPaticipation}}</td>
    <td>{{dealCurrentAmount}}</td>
    
  </tr>
  {{/data}}
  </script>

<style type="text/css">
#selectElementId {
    box-sizing: border-box;
    height: 35px;
    width: 100px;
}
</style>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'admin_footer.php';?>