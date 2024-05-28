<?php include 'admin_header.php';?>
<?php include 'admin_sidebar.php';?>

<?php
$urlfromBroweser = $_SERVER['REQUEST_URI'];
$dealId =  isset($_GET['id']) ? $_GET['id'] : '0';

?>
<div class="content-wrapper">
    <section class="content">
        <section class="content">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 ml-auto col-xl-6 mr-auto">
                        <p class="category">Deal Withdrawal Requests</p>
                        <!-- Nav tabs -->
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <i class="fa fa-money"> </i> Withdraw Request
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                            <i class="fa fa-money"> </i> Withdraw Initiated
                                        </a>
                                    </li>


                                </ul>
                            </div>
                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                </div>
                                                <div class="box-body">
                                                    <table id="example2" class="table table-bordered table-hover"
                                                        border="1">
                                                        <thead>
                                                            <tr>
                                                                <th>User Id</th>
                                                                <th>Amount</th>
                                                                <th>Amount Type</th>
                                                                <th>Requested On</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="withdrawalListUser">

                                                            <tr id="noRecordFound" class="noRecordFound">
                                                                <td colspan="8">No User found!</td>

                                                            </tr>
                                                            </tfoot>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                </div>
                                                <div class="box-body">
                                                    <table id="example2" class="table table-bordered table-hover"
                                                        border="1">
                                                        <thead>
                                                            <tr>
                                                                <th>User Id</th>
                                                                <th>Amount</th>
                                                                <th>Amount Type</th>
                                                                <th>Requested On</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="withdrawalListApprove">

                                                            <tr id="displayInitiated">
                                                                <td colspan="8 withdrawalListError">No User found!</td>

                                                            </tr>
                                                            </tfoot>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>


</div>

<script id="displaywithdrawalScript" type="text/template">
    {{#data}}
      <tr>
        <td>{{userId}}</td>
        <td>
           {{amount}}
        </td>
        <td>
          {{amountType}}
        </td>
        <td>{{requestedOn}}</td>
        <td>{{status}}</td>
        
        
       
    </tr>            
  {{/data}}
</script>

<script id="displaywithdrawalapprovedScript" type="text/template">
    {{#data}}
      <tr>
        <td>{{userId}}</td>
        <td>
           {{amount}}
        </td>
        <td>
          {{amountType}}
        </td>
        <td>{{requestedOn}}</td>
        <td>{{status}}</td>
        
       
    </tr>            
  {{/data}}
</script>
<style type="text/css">
button,
input {
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
}

,

a {
    color: #f96332;
}

.table th {
    background: #ccc;
}

a:hover,
a:focus {
    color: #f96332;
}

p {
    line-height: 1.61em;
    font-weight: 300;
    font-size: 1.2em;
}


.row {
    margin: 0px !important;
}

.container {
    width: 103%;
}

.category {
    text-transform: capitalize;
    font-weight: 700;
    color: #9A9A9A;
}

body {
    color: #2c2c2c;
    font-size: 14px;
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
    overflow-x: hidden;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
}

/*.nav-item .nav-link,
.nav-tabs .nav-link {
    -webkit-transition: all 300ms ease 0s;
    -moz-transition: all 300ms ease 0s;
    -o-transition: all 300ms ease 0s;
    -ms-transition: all 300ms ease 0s;
    transition: all 300ms ease 0s;
}*/

.card a {
    -webkit-transition: all 150ms ease 0s;
    -moz-transition: all 150ms ease 0s;
    -o-transition: all 150ms ease 0s;
    -ms-transition: all 150ms ease 0s;
    transition: all 150ms ease 0s;
}

[data-toggle="collapse"][data-parent="#accordion"] i {
    -webkit-transition: transform 150ms ease 0s;
    -moz-transition: transform 150ms ease 0s;
    -o-transition: transform 150ms ease 0s;
    -ms-transition: all 150ms ease 0s;
    transition: transform 150ms ease 0s;
}

[data-toggle="collapse"][data-parent="#accordion"][aria-expanded="true"] i {
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}


.now-ui-icons {
    display: inline-block;
    font: normal normal normal 14px/1 'Nucleo Outline';
    font-size: inherit;
    speak: none;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

@-webkit-keyframes nc-icon-spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@-moz-keyframes nc-icon-spin {
    0% {
        -moz-transform: rotate(0deg);
    }

    100% {
        -moz-transform: rotate(360deg);
    }
}

@keyframes nc-icon-spin {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

.now-ui-icons.objects_umbrella-13:before {
    content: "\ea5f";
}

.now-ui-icons.shopping_cart-simple:before {
    content: "\ea1d";
}

.now-ui-icons.shopping_shop:before {
    content: "\ea50";
}

.now-ui-icons.ui-2_settings-90:before {
    content: "\ea4b";
}

.nav-tabs {
    border: 0;
    padding: 15px 0.7rem;
}

.nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
    box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
}

.card .nav-tabs {
    border-top-right-radius: 0.1875rem;
    border-top-left-radius: 0.1875rem;
}

.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover {
    color: #ffffff;
    cursor: default;
    background-color: #00a65a;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
    border-radius: 20px;
    font-size: 14px;
    padding: 8px 23px;
    line-height: 1.5;
}



.nav-tabs>.nav-item>.nav-link {
    color: #888888;
    margin: 0;
    margin-right: 5px;
    background-color: transparent;
    border: 4px solid transparent;
    border-radius: 20px;
    font-size: 14px;
    padding: 8px 23px;
    line-height: 1.5;
}




.nav-tabs>.nav-item>.nav-link i.now-ui-icons {
    font-size: 14px;
    position: relative;
    top: 1px;
    margin-right: 3px;
}


.nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    color: #FFFFFF;
}

.card {
    border: 0;
    border-radius: 0.1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    margin-bottom: 30px;
    box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
}

.card .card-header {
    background-color: transparent;
    border-bottom: 0;
    background-color: transparent;
    border-radius: 0;
    padding: 0;
}

.card[data-background-color="orange"] {
    background-color: #f96332;
}

.card[data-background-color="red"] {
    background-color: #FF3636;
}

.card[data-background-color="yellow"] {
    background-color: #FFB236;
}

.card[data-background-color="blue"] {
    background-color: #2CA8FF;
}

.card[data-background-color="green"] {
    background-color: #15b60d;
}

[data-background-color="orange"] {
    background-color: #e95e38;
}

[data-background-color="black"] {
    background-color: #2c2c2c;
}

[data-background-color]:not([data-background-color="gray"]) {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) p {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) a:not(.btn):not(.dropdown-item) {
    color: #FFFFFF;
}

[data-background-color]:not([data-background-color="gray"]) .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
    color: #FFFFFF;
}


@font-face {
    font-family: 'Nucleo Outline';
    src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot");
    src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot") format("embedded-opentype");
    src: url("https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/fonts/nucleo-outline.woff2");
    font-weight: normal;
    font-style: normal;

}

.now-ui-icons {
    display: inline-block;
    font: normal normal normal 14px/1 'Nucleo Outline';
    font-size: inherit;
    speak: none;
    text-transform: none;
    /* Better Font Rendering */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}


footer {
    margin-top: 50px;
    color: #555;
    background: #fff;
    padding: 25px;
    font-weight: 300;
    background: #f7f7f7;

}

.footer p {
    margin-bottom: 0;
}

footer p a {
    color: #555;
    font-weight: 400;
}

footer p a:hover {
    color: #e86c42;
}

@media screen and (max-width: 768px) {

    .nav-tabs {
        display: inline-block;
        width: 100%;
        padding-left: 100px;
        padding-right: 100px;
        text-align: center;
    }

    .nav-tabs .nav-item>.nav-link {
        margin-bottom: 5px;
    }
}
</style>

<script type="text/javascript">
window.load = withdrawalList('<?php echo $dealId ?>');
</script>
<?php include 'admin_footer.php';?>