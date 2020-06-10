  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    
      <span class="brand-text font-weight-light">{{config('dashboard.nameApp')}}</span>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <div>
      @component('components.info')@endcomponent
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <!-- dashboard Route-->                 
            <li class="nav-item ">
              <a href="/home" class="nav-link {{ Request::is(Route::currentRouteName() == 'home') ? 'active' : '' }}">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                 الاحصائيات
                </p>
              </a>

            </li>
            
             <!-- users Route-->  
            <li class="nav-item ">
              <a href="/users" class="nav-link {{ Request::is(Route::currentRouteName() == 'users') ? 'active' : '' }}">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p>
                 المستخدميين
                </p>
              </a>
            </li>
            
             <!-- providers Route-->  
             <li class="nav-item ">
              <a href="/providers" class="nav-link {{ Request::is(Route::currentRouteName() == 'providers') ? 'active' : '' }}">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p>
                 المندوبين
                </p>
              </a>
            </li>   

             <!-- categories Route-->  
             <li class="nav-item ">
              <a href="/categories" class="nav-link {{ Request::is(Route::currentRouteName() == 'categories') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 الاقسام
                </p>
              </a>
            </li>   
             <!-- shop levels Route-->  
             <li class="nav-item ">
          
              <a href="/shop/levels" class="nav-link {{ Request::is(Route::currentRouteName() == 'shop.levels') ? 'active' : '' }}">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 مستوي المتجر
                </p>
              </a>
            </li> 
            
          <!-- admin Route-->  
          <li class="nav-item ">
          
          <a href="/admins" class="nav-link {{ Request::is(Route::currentRouteName() == 'admins') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            ادارة المسئولين
            </p>
          </a>
        </li> 

          <!-- Order Route-->  
          <li class="nav-item ">
          
          <a href="/orders" class="nav-link {{ Request::is(Route::currentRouteName() == 'orders') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            ادارة الطلبات
            </p>
          </a>
        </li>       

          <!-- balance recharging  Route-->  
          <li class="nav-item ">
          
          <a href="/balance/recharging" class="nav-link {{ Request::is(Route::currentRouteName() == 'Balance.recharging') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            شحن الرصيد 
            </p>
          </a>
        </li>   

          <!-- Bank account  Route-->  
          <li class="nav-item ">
          
          <a href="/Bank/account" class="nav-link {{ Request::is(Route::currentRouteName() == 'Bank.account') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
             الحسابات البنكية  
            </p>
          </a>
        </li>      
          <!-- ads  Route-->  
          <li class="nav-item ">
          
          <a href="/ads" class="nav-link {{ Request::is(Route::currentRouteName() == 'ads') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
ادارة الاعلانات
            </p>
          </a>
        </li>           

          <!-- codes  Route-->  
          <li class="nav-item ">
          
          <a href="/codes" class="nav-link {{ Request::is(Route::currentRouteName() == 'codes') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
 اكواد الخصم
            </p>
          </a>
        </li>           
        
          <!-- Notifications  Route-->  
          <li class="nav-item ">
          
          <a href="/Notifications " class="nav-link {{ Request::is(Route::currentRouteName() == 'Notifications') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          الاشعارات
            </p>
          </a>
        </li>    

          <!-- appSetting  Route-->  
          <li class="nav-item ">
          
          <a href="/appSetting " class="nav-link {{ Request::is(Route::currentRouteName() == 'appSetting') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          اعدادات النطبيق
            </p>
          </a>
        </li>          
        
        
        

                  <!-- complains  Route-->  
                  <li class="nav-item ">
          
          <a href="/complains " class="nav-link {{ Request::is(Route::currentRouteName() == 'complains') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
              الشكاوي
            </p>
          </a>
        </li>    
                  <!-- reports  Route-->  
                  <li class="nav-item ">
          
          <a href="/reports " class="nav-link {{ Request::is(Route::currentRouteName() == 'reports') ? 'active' : '' }}">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
              التقارير 
            </p>
          </a>
        </li>            
             
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>