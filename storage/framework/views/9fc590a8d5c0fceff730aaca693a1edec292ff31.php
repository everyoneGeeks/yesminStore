
 <div class="col-md-4">
                        <div class="cart-summary user-account">
                            <div class="user-prief">
                                <img src="<?php echo e(asset('img/user-image.svg')); ?>" alt="" style="
    width: 45px;
">
                                <div class="user-info">
                                    <h6><?php echo e($user->name); ?></h6>
                                    <p><?php echo e($user->email); ?></p>
                                </div>
                            </div>
                            <h4><?php echo e(App::getLocale() == 'ar' ? " لوحة التحكم ":"Dashboard"); ?></h4>
                            <ul class="list-style-group list-unstyled">
                                <li class="list-style-item">
                                    <a href="/orders" class="active"><img src="<?php echo e(asset('img/Cart-c.svg')); ?>" alt=""> <?php echo e(App::getLocale() == 'ar' ? "الطلبات":"orders"); ?>  <span><?php echo e(\App\Orders::where('user_id',\Auth::guard('users')->user()->id)->count()); ?></span></a>
                                </li>
                                <li class="list-style-item">
                                    <a href="/wishlist"><img src="<?php echo e(asset('img/Whishlist.svg')); ?>" alt=""> <?php echo e(App::getLocale() == 'ar' ? "المفضلة":"wishlist"); ?>   <span><?php echo e(\App\wishList::where('user_id',\Auth::guard('users')->user()->id)->count()); ?></span></a>
                                </li>
                            </ul>
                            <h4><?php echo e(App::getLocale() == 'ar' ? "اعدادات الحساب ":"Account settings"); ?></h4>
                            <ul class="list-style-group list-unstyled">
                                <li class="list-style-item">
                                    <a href="/profile"><img src="<?php echo e(asset('img/User profile.svg')); ?>" alt=""><?php echo e(App::getLocale() == 'ar' ? "معلومات الحساب":"profile info"); ?> </a>
                                </li>
                                <li class="list-style-item">
                                    <a href="/address"><img src="<?php echo e(asset('img/Location.svg')); ?>" alt=""> <?php echo e(App::getLocale() == 'ar' ? "العناوين":"addresses"); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>