<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <left>
            <h4>
                Mapped Users
            </h4>
        </left>
        <div class="row">

            <input type="hidden" name="reflender" id="l_partnerUtm" value="">
            <input type="hidden" name="nrirefLinkU" id="nR_partnerUtm" value="">
            <input type="hidden" name="borrowerRefLinkU" id="b_partnerUtm" value="">



            <div class="pull-right classcopyrefLink">
                <input type="text" id="nrirefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyNrirefLink('#nR_partnerUtm');" class="btn btn-primary btn-md  btn-ref-nri"
                    data-toggle="tooltip" title="Share This link" data-placement="right"><i class="fa fa-plane nriimage"
                        aria-hidden="true"></i> Invite an NRI</button>

            </div>
            <div class="pull-right classcopyrefLink">
                <input type="text" id="borrowerRefLinkU" style="display: none;"
                    value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <button onclick="copyBorrowerrefLink('#b_partnerUtm');" class="btn btn-warning btn-ref-borrower"
                    data-toggle="tooltip" title="Share This link" data-placement="bottom">Invite a Borrower <i
                        class="fa fa-clipboard fa_copyRefLink" aria-hidden="true"></i></button>

            </div>
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
                <div class="box box-primary col-md-12">
                    <div class="box-header col-md-2">
                        <div class="pull-left">
                            <div class="row">
                                <div class="col-md-12 mappcheckUser">
                                    <span><input type="checkbox" name="city" id="checkboxId"><label
                                            class="mapfield">City</label></span>
                                    <span><input type="checkbox" name="state" id="checkboxId"><label
                                            class="mapfield">State</label></span>
                                    <span><input type="checkbox" name="pincode" id="checkboxId"><label
                                            class="mapfield">Pincode</label></span>
                                    <span><input type="checkbox" name="locality" id="checkboxId"><label
                                            class="mapfield">Locality</label></span>
                                    <span><input type="checkbox" name="education" id="checkboxId"><label label
                                            class="mapfield">Education</label></span>
                                    <span><input type="checkbox" name="passion" id="checkboxId"><label label
                                            class="mapfield">Passion</label></span>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="acceptedPagination">
                                <ul class="pagination bootpag">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body showingMappedUserData col-md-10">
                        <table id="usermappedData" class="table table-bordered table-hover">
                            <thead class="mobileDiv_4">
                                <tr>
                                    <th>User Name & City</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Locality </th>
                                    <th>Education</th>
                                    <th>Passion</th>
                                    <th>Loan Request info</th>

                                </tr>
                            </thead>
                            <tbody id="displayMappedUsers" class="displaywallettrns mobileDiv_3">
                                <tr id="displayNoRecords" class="displayRequests" style="display: none;">
                                    <td colspan="8">No User found!</td>
                                </tr>

                                </tfoot>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
<!-- /.content-wrapper -->
<script id="UserMappedDataList" type="text/template">
    {{#data}}
  <tr class="divBlock_Mob_001">
    <td>
    <span class="lable_mobileDiv">User Name & city</span>
    {{name}} </br>

    City :{{city}}
    </td>
    <td>
        <span class="lable_mobileDiv">State</span>

        {{state}}
    </td>
    <td>
    <span class="lable_mobileDiv">  Pincode</span>
   {{pinCode}}
    </td>
    <td>
     <span class="lable_mobileDiv">  Locality</span>
{{locality}}
    </td>
    <td>
     <span class="lable_mobileDiv">  Education</span>
   

{{#education}}
<b>{{education}}</b>
{{/education}}

{{^education}}
  No Data
{{/education}}


    </td>
  
      <td>
     <span class="lable_mobileDiv">    Passion</span>
{{#passion}}
<b>{{passion}}</b>
{{/passion}}

{{^passion}}
  No Data
{{/passion}}

    </td>

  <td>
  <span class="lable_mobileDiv">Loan Request</span>

Amount : {{requestedAmount}}</br>
RoI : {{rateOfInterest}} %</br>
Duration : {{duration}} M</br>
    </td>
  }
  }
    
  </tr>
  {{/data}}
  </script>
<script type="text/javascript">
$(document).ready(function() {
    mappedUsersFormSystem(true, true, true, true, true, true);
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    const checkbox = $("input[type=checkbox]");
    checkbox.change(function(event) {
        const city = $("input[name=city]").is(":checked");
        const state = $("input[name=state]").is(":checked");
        const pincode = $("input[name=pincode]").is(":checked");
        const locality = $("input[name=locality]").is(":checked");
        const education = $("input[name=education]").is(":checked");
        const passion = $("input[name=passion]").is(":checked");
        mappedUsersFormSystem(city, state, pincode, locality, education, passion);

    });
});
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<?php include 'footer.php';?>