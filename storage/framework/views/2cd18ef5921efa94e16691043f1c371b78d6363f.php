  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
    
      <span class="brand-text font-weight-light"><?php echo e(config('dashboard.nameApp')); ?></span>
    </a>

<!-- Sidebar -->
    <div class="sidebar">
      <div>
      <?php $__env->startComponent('components.info'); ?><?php echo $__env->renderComponent(); ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <!-- dashboard Route-->                 
            <li class="nav-item ">
              <a href="/admin/home" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'home') ? 'active' : ''); ?>">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                 الاحصائيات
                </p>
              </a>

            </li>
            

            

             <!-- categories Route-->  
             <li class="nav-item ">
              <a href="/admin/categories" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'categories') ? 'active' : ''); ?>">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 الاقسام
                </p>
              </a>
            </li> 

                         <!-- categories Route-->  
             <li class="nav-item ">
              <a href="/admin/subcategoies" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'subcategoies') ? 'active' : ''); ?>">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 الاقسام الفرعية
                </p>
              </a>
            </li>   



             <!-- partyThemes Route-->  
             <li class="nav-item ">
              <a href="/admin/partyThemes" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'partyThemes') ? 'active' : ''); ?>">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 نوع الحفل   
                </p>
              </a>
            </li> 

             <!-- characters Route-->  
             <li class="nav-item ">
              <a href="/admin/characters" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'characters') ? 'active' : ''); ?>">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
                 نوع شخصيات كرتونية    
                </p>
              </a>
            </li> 

             <!-- occasion Route-->  
             <li class="nav-item ">
              <a href="/admin/occasion" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'occasion') ? 'active' : ''); ?>">
                <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
                <p>
              المناسبات 
                </p>
              </a>
            </li> 

            
           <!-- product  Route-->  
          <li class="nav-item ">
          
          <a href="/admin/products" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'products') ? 'active' : ''); ?>">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
          المنتجات
            </p>
          </a>
        </li>   

        <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                ادارة الطلبات
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/admin/orders" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>الطلبات الجديدة </p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/admin/orders/accept" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders.accept') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>الطلبات قيد التوصيل </p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/admin/orders/done" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders.done') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> الطلبات المنتهية </p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/admin/orders/cancel" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders.cancel') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> الطلبات المرفوضة </p>
                  </a>
                </li>
                
                  <li class="nav-item">
                <a href="/admin/orders/ComplainOrders" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders.ComplainOrders') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>  شكاوي الطلبات  </p>
                  </a>
                </li>
                
                
                <li class="nav-item">
                <a href="/admin/orders/returnOrder" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'orders.returnOrder') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>   الطلبات المرتجعة   </p>
                  </a>
                </li>
                
              </ul>
            </li>

             <!-- users Route-->  
             <li class="nav-item ">
              <a href="/admin/users" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'users') ? 'active' : ''); ?>">
                <i class="nav-icon  fa fa-users" aria-hidden="true"></i>
                <p>
                 المستخدميين
                </p>
              </a>
            </li>

          <!-- ads  Route-->  
          <li class="nav-item ">
          
          <a href="/admin/ads" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'ads') ? 'active' : ''); ?>">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
ادارة الاعلانات
            </p>
          </a>
        </li>           

          <!-- codes  Route-->  
          <li class="nav-item ">
          
          <a href="/admin/codes" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'codes') ? 'active' : ''); ?>">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
 اكواد الخصم
            </p>
          </a>
        </li>      



 
        
        
        



                <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                اعدادات النطبيق
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/admin/appSetting" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'appSetting') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> الصفحات </p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/admin/appSetting/links" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'appSetting.links') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>  مواقع التواصل الاجتماعي </p>
                  </a>
                </li>

                <li class="nav-item">
                <a href="/admin/appSetting/close" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'appSetting.close') ? 'active' : ''); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>    غلق الموقع  </p>
                  </a>
                </li>

              </ul>
            </li> 

                  <!-- admin Route-->  
          <li class="nav-item ">
          
          <a href="/admin/admins" class="nav-link <?php echo e(Request::is(Route::currentRouteName() == 'admins') ? 'active' : ''); ?>">
            <i class="nav-icon  fa  fa-book" aria-hidden="true"></i>
            <p>
            ادارة المسئولين
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