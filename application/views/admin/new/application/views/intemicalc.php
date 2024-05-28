<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            EMI Calculator
        </h1><br />
    </section><br />
    <section class="content displayEmiCalInfo">
        <div class="row">
            <div class="box col-xs-12 box-primary">
                <div class="box-body calCulateEmi">
                    <div class="EmicalInputs card_inputs col-md-7 row">
                        <label class="col-md-2">Loan Amount : </label>
                        <input type="text" name="emiAmout" class="col-md-2" id="emiamount" placeholder="Loan Amount">
                        <label class="col-md-2">Roi :</label>
                        <select class="emicalRoi">
                            <option value="">Choose Roi Type</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                        </select>
                    </div></br></br></br>
                    <div class="EmicalInputs card_inputs col-md-7 row">
                        <label class="col-md-2">Tenure :</label>
                        <select class="emicalTenure col-md-2">
                            <option value="">Choose Tenure</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>

                        </select>
                        <label class="col-md-2">EMI Type:</label>
                        <select class="calEmiType">
                            <option value="">Choose Calculation Type</option>
                            <option value="REDUCE">Reduce</option>
                            <option value="FLAT">Flat</option>
                        </select>

                    </div></br></br>
                    <button type="button" class="btn btn-md btn-primary" id="emiSubBtns"
                        onclick="getEmiData();">Submit</button>
                    <div class="emaiTableData">
                        <h4>Your EMI Info</h4>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr id="example">
                                    <th>So</th>
                                    <th>EMI Amount</th>
                                    <th>Interest Amount</th>
                                    <th>Principal Amount</th>
                                    <th>Outstanding</th>
                                </tr>
                            </thead>
                            <tbody id="displayEmiCalculatorInfo">
                                <tr id="displayNoRecords" class="displayRequests">
                                    <td colspan="8">No Data found!</td>
                                </tr>
                                </tfoot>
                        </table>

                    </div>

                </div>
            </div>
    </section>
</div>
<script id="viewgetCalData" type="text/template">
    {{#data}}
    <tr>
      <td>{{emiNumber}}</td>
      <td>{{emiAmount}}</td>
      <td>{{interestAmount}}</td>
      <td>{{principalAmount}}</td>
      <td>{{balanceAndOutstanding}}</td>
    </tr>
    {{/data}}
    </script>
<script src="<?php echo base_url(); ?>/assets/js/mustache.js"></script>