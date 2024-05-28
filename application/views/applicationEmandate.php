<?php include 'header.php';?>
<?php include 'borrowersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                        <table id="myborrowingsData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>Lender Name</th>
                                    <th>Application Id</th>
                                    <th>Loan Amount</th>
                                    <th>Rate of Interest</th>
                                    <th>Interest Type</th>
                                    <th>Tenure</th>
                                    <th>Enach Status</th>
                                    <th>Is ECS Activated</th>
                                </tr>
                            </thead>
                            <tbody id="displayAppLevelEnach" class="displayRequests mobileDiv_3">
                                <tr id="displayApp" class="displayRequests" style="display:none;">
                                    <td colspan="8">No data found!</td>
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
<script id="displayAppLevelEnachScript" type="text/template">
    {{#data}}
<tr class="divBlock_Mob_001">
    <td>

 <span class="lable_mobileDiv">Name</span>
    {{lenderUser.firstName}} {{name}}</td>
    <td>
 <span class="lable_mobileDiv">Application Id</span>
    {{applicationId}}</td>
    <td>
   <span class="lable_mobileDiv">loan Amount</span>
    {{amountToActivate}}</td>
    <td>

       <span class="lable_mobileDiv">roi</span>
        {{rateOfInterest}} %
        <span style='display:none' class="loanTypeisI loanTypeis{{durationType}} "> %  Per Month</span>
        <span style='display:none' class="loanTypeisDays loanTypeis{{durationType}}"> Per Day</span>
        </td>
   <td>
 <span class="lable_mobileDiv">Interest Type</span>

    {{type}}</td>
    <td> 

   <span class="lable_mobileDiv">duration</span>


        {{duration}}
       
    </td>
    <td>
   <span class="lable_mobileDiv">Enach Status</span>

    {{enachMandateStatus}}</td>
    <td>
         <span class="lable_mobileDiv">Enach</span>

          {{#enachActivatedStatus}}
           <span class="badge badge-success" style="border-radius:0px!important">ECS Activated</span> 

  
          {{/enachActivatedStatus}}

          {{^enachActivatedStatus}}
           <button type="button" class="btn btn-warning pull-left btn-xs " onclick="AppLevelactivateECS({{id}})">
            <i class="fa fa-angle-double-right" data-reqid = "{{id}}" ></i> <b>Activate ECS</b></button>
          {{/enachActivatedStatus}}

     
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
    applicationLevelEnach();
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