<div class="row">
    <div class="col-lg-12">
        <!--====================  navigation section ====================-->

        <div class="navigation-top-topbar pt-10 pb-10">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 text-center text-md-left">
                    <!--=======  header top social links  =======-->



                    <div class="search-bar">
                        <form action="#">
                            <input type="search" placeholder="Cari tanaman...">
                            <button type="submit"> <i class="icon-search"></i></button>
                        </form>
                    </div>


                    <!--=======  End of header top social links  =======-->
                </div>

                <div class="col-lg-4 offset-lg-4 col-md-6">
                    <!--=======  header top dropdown container  =======-->

                    <div class="headertop-dropdown-container justify-content-center justify-content-md-end">
                        <div class="header-top-single-dropdown">
                            <a href="javascript:void(0)" class="active-dropdown-trigger" id="user-options">My
                                Account <i class="ion-ios-arrow-down"></i></a>
                            <!--=======  dropdown menu items  =======-->

                            <div
                                class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu extra-small-mobile-fix">
                                <ul>
                                    <li><a href="{{ url('register')}}">Register</a></li>
                                    <li><a href="{{ url('login')}}">Login</a></li>
                                </ul>
                            </div>

                            <!--=======  End of dropdown menu items  =======-->
                        </div>
                    </div>

                    <!--=======  End of header top dropdown container  =======-->
                </div>
            </div>
        </div>

        <!--====================  End of navigation section  ====================-->
    </div>
</div>