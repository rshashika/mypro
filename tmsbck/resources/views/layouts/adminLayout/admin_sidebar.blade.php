<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <center>  <img src="" alt="Logo" class=" img-circle elevation-3" style="max-height: 44px !important;border-radius: 40%;" ></center> 
      <h6 class="brand-text" style="font-weight: 600; text-align: center; margin-top: 4px;"> SmartWay</h6>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) class="user-panel mt-3 pb-3 mb-3 d-flex" -->
      <!-- <div class="user-panel  pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://img.icons8.com/fluency/48/000000/user-male-circle.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php $admin=Session::get('adminSession'); ?>
          <a href="#" class="d-block">{{$admin}}</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="margin-top: 4.2rem!important;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li> 
         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="https://img.icons8.com/external-itim2101-flat-itim2101/25/000000/external-students-online-education-itim2101-flat-itim2101.png"/>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-student') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-students') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/25/000000/external-teachers-literature-flaticons-lineal-color-flat-icons-3.png"/>
              <p>
                Teachers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-teacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-teachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/25/000000/external-class-university-flaticons-flat-flat-icons-2.png"/>
              <p>
                Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-class') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-classes') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
           @if(Session::get('adminDetails')['superadmin']==1)
         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/25/000000/external-class-university-flaticons-flat-flat-icons-2.png"/>
              <p>
                Fees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-feescat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Fees Category </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/add-fees') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Student Fees</p>
                </a>
              </li>
            </ul>
          </li> -->
          @endif
         
         {{--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/25/000000/external-class-university-flaticons-flat-flat-icons-2.png"/>
              <p>
                Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-expensecat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Exp Category </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/add-expense') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Expenses</p>
                </a>
              </li>
            </ul>
          </li> --}}
    
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/25/000000/external-class-online-education-flaticons-lineal-color-flat-icons-5.png"/>
              <p>
                Attendence
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-attendence') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Attendence </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/add-attendenceteach') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Attendence </p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/25/000000/external-payments-automotive-dealership-flaticons-lineal-color-flat-icons-4.png"/>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>
              </p>
             </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-paymentcat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-paymentreg') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Payments</p>
                </a>
              </li>
             {{--  <li class="nav-item">
                <a href="{{ url('/admin/view-paymentmon') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Payments</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ url('/admin/add-payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-payment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/25/000000/external-payments-automotive-dealership-flaticons-lineal-color-flat-icons-4.png"/>
              <p>Employee
               <i class="fas fa-angle-left right"></i>
              </p>
             </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-eloccate') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Payment Cat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/add-employeepayment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Payments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="https://img.icons8.com/color/25/000000/admin-settings-male.png"/>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/add-admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add admin </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/view-admins') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="https://img.icons8.com/fluency/24/000000/report-file.png"/>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/view-reports') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ url('/admin/add-attendence') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Today Classes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/add-payment') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Tution Payments </p>
            </a>
          </li> -->
         
          
           <!-- <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
              <img src="https://img.icons8.com/color/24/000000/shutdown--v1.png"/>
              <p> Log Out </p>
            </a>
          </li>  -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>