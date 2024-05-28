<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Activate Enach
        </h1>
        <div class="pull-left" style="display: none;">
            <small>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan Requests</li>
                </ol>
            </small>
        </div>
    </section>
    <div class="cls"></div>
    <!-- Main content -->
    <section class="content">
        <div class="cls"></div>
        <div class="row customFormQ">
            <div class="cls"></div>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="enach" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Lender Name</th>
                                    <th>Loan ID</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Interest Amount</th>
                                    <th>Tenure</th>
                                    <th>Status</th>
                                    <th>Is ECS Activated</th>
                                </tr>
                            </thead>
                            <tbody id="displayRequests" class="displayRequests mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Offers found!</td>
                                </tr>
                            </tbody>
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
<script type="text/javascript" src="https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"></script>
<script id="displayallRequests" type="text/template">
    {{#data}}
<tr class="divBlock_Mob_001">
    <td>

 <span class="lable_mobileDiv">Name</span>
    {{lenderUser.firstName}} {{lenderUser.lastName}}</td>
    <td>
 <span class="lable_mobileDiv">loanRequest</span>
    {{loanRequest}}</td>
    <td>
 <span class="lable_mobileDiv">loanRequestAmount</span>
    {{loanRequestAmount}}</td>
    <td>

      <span class="lable_mobileDiv">roi</span>
        {{rateOfInterest}}
        <span style='display:none' class="loanTypeisI loanTypeis{{durationType}} "> % Per Month</span>
        <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Per Day</span>
    </td>
    <td>
    <span class="lable_mobileDiv">emiAmount</span>

    {{emiAmount}}</td>
    <td>

    <span class="lable_mobileDiv">duration</span>

        {{duration}}
        <span style='display:none' class="loanTypeisI loanTypeis{{durationType}}"> Months</span>
        <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Days</span>
    </td>
    <td>
  <span class="lable_mobileDiv">loanStatus</span>

    {{loanStatus}}</td>
    <td>


        <span class="lable_mobileDiv">Enach</span>
        {{#enachSuccess}}
        <span class="badge badge-success" style="border-radius:0px!important">ECS Activated</span>
        {{/enachSuccess}}
     
        {{#enachInitiated}}
        {{#enachMandateResponseForEmi.mandateStatus}}
        <button type="button" class="btn btn-warning pull-left btn-xs " onclick="activateECS({{enachMandateResponseForEmi.mandateId}})">
        <i class="fa fa-angle-double-right" data-reqid = "{{enachMandateId}}" ></i> <b>Activate ECS For Interest</b></button>
        {{/enachMandateResponseForEmi.mandateStatus}}
        {{/enachInitiated}}
        {{#enachInitiated}}
        {{#enachMandateResponseForPrincipal.mandateStatus}}
        <button type="button" class="btn btn-warning pull-left btn-xs " onclick="activateECS({{enachMandateResponseForPrincipal.mandateId}})">
        <i class="fa fa-angle-double-right" data-reqid = "{{enachMandateResponseForPrincipal.mandateId}}" ></i> <b>Activate ECS For Principal</b></button>
        {{/enachMandateResponseForPrincipal.mandateStatus}}
        {{/enachInitiated}}
        
        
    </td>
</tr>
{{/data}}
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<script type="text/javascript">
$("#modal-checkEsign,#modal-checkEnach").modal("hide");
$(document).ready(function() {

    $(".loadingSec").show();
}, 3000);

setTimeout(function() {
    loadActiveLoanss();
}, 1000);
</script>
<style type="text/css">
span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeisDays {
    display: inline !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisI.loanTypeisI,
span.loanTypeisI.loanTypeis {
    display: inline !important;
}

span.loanTypeisI.loanTypeisDays {
    display: none !important;
}

span.loanTypeisDays.loanTypeisI {
    display: none !important;
}

span.loanTypeisDays.loanTypeis {
    display: none !important;
}

span.loanTypeisDays.loanTypeisMonths {
    display: none !important;
}
</style>
<?php include 'footer.php';?>