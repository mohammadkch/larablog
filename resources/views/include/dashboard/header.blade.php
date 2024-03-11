<div class="page-header">
    <div class="header-wrapper m-0">
        <div class="header-logo-wrapper p-0">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="img-fluid main-logo" src="{{ asset('assets/back/images/logo/1.png') }}" alt="logo">
                    <img class="img-fluid white-logo" src="{{ asset('assets/back/images/logo/1-white.png') }}" alt="logo">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                <a href="index.html">
                    <img src="{{ asset('assets/back/images/logo/1.png') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

        <form class="form-inline search-full" action="javascript:void(0)" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                               placeholder="جستجو کنید ..." name="q" title="" autofocus>
                        <i class="close-search" data-feather="x"></i>
                        <div class="spinner-border Typeahead-spinner" role="status">
                            <span class="sr-only">لطفا صبر کنید ...</span>
                        </div>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <i class="ri-notification-line"></i>
                        <span class="badge rounded-pill badge-theme">4</span>
                    </div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <i class="ri-notification-line"></i>
                            <h6 class="f-18 mb-0">پیام ها</h6>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-primary"></i>پردازش محصولات<span
                                    class="pull-right">10 دقیقه</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-success"></i>تکمیل سفارش<span
                                    class="pull-right">1 ساعت</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-info"></i>بلیط های تولید شده<span
                                    class="pull-right">3 ساعت</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-circle me-2 font-danger"></i>تحویل کامل<span
                                    class="pull-right">6 ساعت</span>
                            </p>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="javascript:void(0)">نمایش تمام پیام ها</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="mode">
                        <i class="ri-moon-line"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 me-0">
                    <div class="media profile-media">
                        <img class="user-profile rounded-circle" src="{{ asset('assets/back/images/users/4.jpg') }}" alt="">
                        <div class="user-name-hide media-body">
                            <span>@guest()  احمدی@endguest @auth() {{ $user->name }} @endauth()</span>
                            <p class="mb-0 font-roboto">مدیر<i class="middle ri-arrow-down-s-line"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="all-users.html">
                                <i data-feather="users"></i>
                                <span>کاربران</span>
                            </a>
                        </li>
                        <li>
                            <a href="order-list.html">
                                <i data-feather="archive"></i>
                                <span>سفارشات</span>
                            </a>
                        </li>
                        <li>
                            <a href="support-ticket.html">
                                <i data-feather="phone"></i>
                                <span>تیکت پشتیبانی</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile-setting.html">
                                <i data-feather="settings"></i>
                                <span>تنظیمات</span>
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                               href="javascript:void(0)">
                                <i data-feather="log-out"></i>
                                <span>خروج</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
