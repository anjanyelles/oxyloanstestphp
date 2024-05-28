<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>
<div class="content-wrapper">
    <section class="content-header hold-headsection">
        <h4 class="text  fw-bold  m-3 holdamount-text">
            Hold Interest Amount
        </h4>
    </section>
    <section class="content">
       <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row col-md-12 hold-amount-box">
                            <div class="row hold-interest-amount">
                              
                                <div class=" col-md-6 hold-interestamount-inputs-fields">
                                    <label for="" class="form-label">Lender Id :<em class="error">*</em> </label>
                                    <input type="text" class="form-control" name="" id="hold_InterestUser_id"
                                        placeholder="Enter the lender Id" aria-describedby="helpId">
                                    <label class="error error_Interest_Hold_UserId" style="display:none">Enter The User Id</label>
                                </div>

                                <div class=" col-md-6 hold-interestamount-inputs-fields">
                                    <label for="" class="form-label">Deal Id :<em class="error">*</em> </label>
                                    <input type="text" class="form-control" name="" id="holdUser_Interest_deal_id"
                                        placeholder="Enter the deal Id" aria-describedby="helpId" >

                                      <label class="error error_Interest_Hold_DealId" style="display:none">Enter The Deal Id</label>

                                </div>


                                <div class=" col-md-6 hold-interestamount-inputs-fields">
                                    <label for="" class="form-label">Hold Amount :<em class="error">*</em></label>
                                    <input type="text" class="form-control" name="" id="hold_Interest_amount"
                                        placeholder="Enter the hold amount" aria-describedby="helpId" placeholder="">
                                     <label class="error error_Interest_Hold_Amount" style="display:none">Enter The Hold Amount</label>

                                </div>

                                   <div class=" col-md-6 hold-interestamount-inputs-fields">
                                    <label for="" class="form-label"> Date:<em class="error">*</em></label>
                                    <input type="date" class="form-control" name="" id="hold_Date_amount"
                                    placeholder="Enter the hold amount" aria-describedby="helpId">

                                      <label class="error error_Interest_Hold_Date" style="display:none">Enter The Date</label>
                                </div>

                                <div class=" col-md-6 hold-interestamount-inputs-fields">
                                    <label for="" class="form-label">comments:<em class="error">*</em></label>
                                      <textarea name="" id="hold_comments" class="form-control hold-Interest_amount-text" rows="3"
                                        required="required" placeholder="Enter the comments"></textarea>

                                    <label class="error error_Interest_Comments" style="display:none">Enter The Comments</label>

                                </div>


                            </div>
                             </div>

                         <div class="submit_btn">
                             <button class="btn btn-success col-md-3" style="margin-left:25px" onclick="submitHoldINterestAmount();">Submit</button>
                         </div>

                      

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
</div>

<div class="modal modal-success fade" id="modal-holdrequestedSubmitted">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thanks!</h4>
            </div>
            <div class="modal-body">
                <p>
                <h2 style="font-size: 16px;">data is successfully saved!</h2>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
window.onload = holdamountList("currentUsers");
</script>

<script id="holdrequestUsersdetails" type="text/template">
    {{#data}}

  <tr>
    <td>LR {{userId}}</td>
    <td>{{holdAmount}} </td>
    <td>{{status}}</td>
    
    
  </tr>
  {{/data}}
  </script>



<?php include 'admin_footer.php';?>