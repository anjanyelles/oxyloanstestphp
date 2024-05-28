  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="<?php echo base_url(); ?>/assets/dist/img/user2-160x160.jpg" class="img-circle"
                      alt="User Image">
              </div>
              <div class="pull-left info">
                  <p>Subash Sure</p>
                  <a href="#">BR1001234</a>
              </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                              class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">Users Navigation</li>
              <li class="active treeview">
                  <a href="borrower.php">
                      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
              </li>
              <li><a href="mid.php"><i class="fa fa-book"></i> <span>My Multichain ID</span></a>
              </li>
              <li class="treeview">
                  <a href="verifyyourIdentity.php">
                      <i class="fa fa-files-o"></i>
                      <span>Verify your Identity</span>
                  </a>
              </li>
              <li><a href="loanlistings.php"><i class="fa fa-circle-o text-aqua"></i> <span>Loan Listings</span></a>
              </li>

              <li class="treeview active">
                  <a href="#">
                      <i class="fa fa-th"></i> <span>My Borrowings</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>

                  <ul class="treeview-menu">
                      <li class="active"><a href="loanrequests"><i class="fa fa-circle-o"></i> Loan Requests</a></li>
                      <li><a href="addloanrequest"><i class="fa fa-circle-o"></i> Raise a loan request</a></li>
                      <li><a href="agreedLoans.php"><i class="fa fa-circle-o"></i> Agreed Loans</a></li>
                  </ul>
              </li>
              <li><a href="payments.php"><i class="fa fa-credit-card text-yellow"></i> <span>Payments | EMIs</span></a>
              </li>
              <li><a href="faq.php"><i class="fa fa-circle-o text-green"></i> <span>Oxyloans FAQ</span></a></li>

              <li class="treeview active">
                  <a href="#"><i class="fa fa-th"></i></i> <span>My Profile</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="personalinfo">Personal info</a></li>
                      <li> <a href="professionalDetails">Professional Details</a></li>
                      <li><a href="address">Address Details</a></li>
                  </ul>
              </li>
              <li><a href="#"><i class="fa ion-stats-bars"></i> <span>OXY Products</span></a>
              </li>

              <li><a href="logout.php"><i class="fa fa-circle-o text-yellow"></i> <span>Sign Out</span></a></li>

          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>