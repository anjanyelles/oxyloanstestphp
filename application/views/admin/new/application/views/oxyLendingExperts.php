<?php include 'header1.php';?>
<div class="oxyLendingContentWrapper">
    <div class="col-xs-12">
        <div class="head-Text row info">
            <h1 class="oxylender-content">
                Our Existing lenders in the last 18 months, our 200 lenders earned 24% monthly returns, please talk to
                them and seek Expert guidance, start creating a P2P account & earn monthly 2% returns.
            </h1>
        </div>
        <div class="input-group-btn-search">
            <div class="experts-search">
                <input type="text" class="form-control-expert expertId" placeholder="Enter Lender ID">
            </div>
            <div class="input-group-append">
                <button type="submit" class="input-group-text btn btn-lg" onclick="searchExperts();">search</button>
            </div>
            <div class="search-Lender-details col-sm-12" style="display: none;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="experts-Row">
                            <th>Lender Name</th>
                            <th>Lender ID</th>
                            <th>Lender Mobile</th>
                            <th>Lender Email</td>
                            <th>Seek</td>
                        </tr>
                    </thead>
                    <tbody id="searchData">

                        </tfoot>
                </table>
            </div>
            <div class="expertsDate-system  row col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="pull-right" style="font-size: 30px; margin-right:100px;">Our Experts Lenders</h1>
                    </div>
                    <div class="col-md-4">
                        <div class="dashBoardPagination pull-right">
                            <ul class="pagination bootpag">
                            </ul>
                        </div>
                    </div>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="experts-Row">
                            <th>Lender Name</th>
                            <th>Lender ID</th>
                            <th>Lender Mobile</th>
                            <th>Lender Email</td>
                            <th>Seek</td>
                        </tr>
                    </thead>
                    <tbody id=displayExpertsData>

                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script id="getLendingExpertsData" type="text/template">
    {{#data}}
<tr>
<td>{{userName}}</td>
<td>{{userId}}</td>
<td>{{mobileNumber}}</td>
<td>{{email}}</td>
<td>
<a href="seekAdvice?expertEmail={{email}}&userId={{userId}}&userName={{userName}}">
<button class="btn  btn-primary btn-lg btn-Seek" onclick="askExperts();"><i class="fa fa-ball"></i>Ask Expert</button></a>
</td>
</tr>
{{/data}}
</script>
<script id="searchExpertsData" type="text/template">
    {{#data}}
<tr>
<td>{{userName}}</td>
<td>{{userId}}</td>
<td>{{mobileNumber}}</td>
<td>{{email}}</td>
<td>
<a href="seekAdvice?expertEmail={{email}}&userId={{userId}}&userName={{userName}}">
<button class="btn  btn-primary btn-lg btn-Seek" onclick="askExperts();"><i class="fa fa-ball"></i>Ask Expert</button></a>
</td>
</tr>
{{/data}}
</script>
<script type="text/javascript">
window.onload = getlistOfUniqueLenders();
</script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<?php include 'footer.php';?>