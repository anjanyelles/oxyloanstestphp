<?php include 'header.php';?>
<?php include 'lendersidebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Membership Payment


        </h1>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">

            <div class="row">
                <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
                    <input type="hidden" name="appId" id="appId" value="" />
                    <input type="hidden" name="orderId" id="orderId" value="" />
                    <input type="hidden" name="orderAmount" id="orderAmount" value="" />
                    <input type="hidden" name="orderCurrency" id="orderCurrency" value="" />
                    <input type="hidden" name="orderNote" id="orderNote" value="" />
                    <input type="hidden" name="customerName" id="customerName" value="" />
                    <input type="hidden" name="customerEmail" id="customerEmail" value="" />
                    <input type="hidden" name="customerPhone" id="customerPhone" value="" />
                    <input type="hidden" name="returnUrl" id="returnUrl" value="" />
                    <input type="hidden" name="notifyUrl" id="notifyUrl" value="" />
                    <input type="hidden" name="signature" id="signature" value="" />
                </form>
            </div>


            <div class="col-md-12 paynewmembership">
                <div class="box box-primary">
                    <div class="box-header"></div>
                    <div class="box-body">
                     
                        <!-- /PRICE ITEM -->

                           <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>1 Month Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong> 1000 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">1</b> Month Membership
                                </li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                                
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-primary" href="#"
                                    onclick="paynewmembershipSeptember('MONTHLY')">Subscribe </a>
                            </div>
                        </div>


                                  <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>3 Months plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong>2900+18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">3</b> Months Membership
                                </li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                             
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-success" href="#"
                                    onclick="paynewmembershipSeptember('QUARTERLY')">Subscribe </a>
                            </div>
                        </div>


                            <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>6 Months Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong>5600 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">6</b> Months Membership
                                </li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                             
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-info" href="#"
                                    onclick="paynewmembershipSeptember('HALFYEARLY')">Subscribe </a>
                            </div>
                        </div>




                             <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>1 Year Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong>9800 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">1</b> Year Membership</li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                          
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-primary" href="#"
                                    onclick="paynewmembershipSeptember('PERYEAR')">Subscribe </a>
                            </div>
                        </div>


                   


                       

                      



                            <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>5 Years Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong>50000 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">5</b> Years Membership</li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                               
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-success" href="#"
                                    onclick="paynewmembershipSeptember('FIVEYEARS')">Subscribe </a>

                            </div>
                        </div>


                           <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>10 Years Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong>90000 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">10</b> Years Membership</li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation</li>
                            
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-info" href="#"
                                    onclick="paynewmembershipSeptember('TENYEARS')">Subscribe </a>
                            </div>
                        </div>


                               <div class="panel price panel-red">
                            <div class="panel-heading  text-center">
                                <h3>Life Time Plan</h3>
                            </div>
                            <div class="panel-body text-center">
                                <p class="lead" style="font-size:21px"><strong> 100000 + 18 % GST</strong></p>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> <b class="paymembership_tenture">14</b> Years Membership</li>
                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Deals
                                    Participation </li>
                               
                            </ul>
                            <div class="panel-footer">
                                <a class="btn btn-lg btn-block btn-primary" href="#"
                                    onclick="paynewmembershipSeptember('LIFETIME')">Subscribe </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PRICE ITEM -->




            </div>


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<div class="modal modal-success fade" id="modal-success-unsubscribeNotification">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Update</h5>
            </div>
            <div class="modal-body">
                <p>
                    You have unsubscribed from the oxyloans renewal, and you will no longer receive renewal
                    notifications.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">

function hidealertbox() {
  setTimeout(()=>{
    $("#modal-validitydate-expired").modal("hide");
    $("#modal-validitydate-expiring").modal("hide");
  }, 400); 
};

hidealertbox();
    
</script>

<?php include 'footer.php';?>