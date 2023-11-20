
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ config('app.url') }}">
    <meta name="web-url" content="{{ url('') }}">

	<title>پیشگامان | ناحیه کاربری</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{url('Templates/nextable/default/assets/media/image/favicon.png')}}">

	<!-- Theme Color -->
	<meta name="theme-color" content="#5867dd">

	<!-- Plugin styles -->
	<link rel="stylesheet" href="{{url('Templates/nextable/default/vendors/bundle.css')}}" type="text/css">

	<!-- App styles -->
	<link rel="stylesheet" href="{{url('Templates/nextable/default/assets/css/app.css')}}" type="text/css">
</head>

<body>

	<!-- begin::page loader-->
	<div class="page-loader">
		<div class="spinner-border"></div>
	</div>
	<!-- end::page loader -->

	<!-- begin::sidebar user profile -->
	<div class="sidebar" id="userProfile">
		<div class="text-center p-4">
			<figure class="avatar avatar-state-success avatar-lg mb-4">
				<img src="{{url('Templates/nextable/default/assets/media/image/avatar.jpg')}}" class="rounded-circle" alt="image">
			</figure>
			<h4 class="text-primary m-b-10">جان اسنو</h4>
			<p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
				رهبر تیم <a href="#" class="ml-2" data-toggle="tooltip" title="تنظیمات" data-sidebar-open="#settings"> <i class="ti-settings"></i> </a>
			</p>
		</div>
		<hr class="m-0">
		<div class="p-4">
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">
					تکمیل پروفایل
					<span class="float-right primary-font">%25</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">
					ذخیره سازی
					<span class="float-right primary-font">%77</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar bg-danger" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3 ">
					وظایف انجام شده
					<span class="float-right primary-font">%40</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3 pt-2">درباره</h6>
				<p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک</p>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">شهر</h6>
				<p class="text-muted">تبریز / ایران</p>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">شبکه های اجتماعی</h6>
				<ul class="list-inline mb-4">
					<li class="list-inline-item">
						<a href="#" class="btn btn-sm btn-floating btn-facebook">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#" class="btn btn-sm btn-floating btn-twitter">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#" class="btn btn-sm btn-floating btn-dribbble">
							<i class="fa fa-dribbble"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#" class="btn btn-sm btn-floating btn-whatsapp">
							<i class="fa fa-whatsapp"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#" class="btn btn-sm btn-floating btn-linkedin">
							<i class="fa fa-linkedin"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">تنظیمات</h6>
				<div class="form-group">
					<div class="form-item custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch11">
						<label class="custom-control-label" for="customSwitch11">مسدود کردن</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-item custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" checked id="customSwitch12">
						<label class="custom-control-label" for="customSwitch12">بیصدا کردن</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end::sidebar user profile -->

	<!-- begin::sidebar settings -->
	<div class="sidebar" id="settings">
		<header>
			<i class="ti-settings"></i> تنظیمات
		</header>
		<div class="p-4">
			<div class="mb-3">
				<h6 class="font-size-13 mb-3 text-muted">سیستم</h6>
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>به روز رسانی خودکار</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
							<label class="custom-control-label" for="customSwitch1"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>وضعیت کنونی</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch2" checked>
							<label class="custom-control-label" for="customSwitch2"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>پیشنهادات کاربران</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
							<label class="custom-control-label" for="customSwitch3"></label>
						</div>
					</li>
				</ul>
			</div>
			<div class="mb-3">
				<h6 class="font-size-13 mb-3 text-muted">حساب کاربری</h6>
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>امنیت حساب کاربری ارشد</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch4">
							<label class="custom-control-label" for="customSwitch4"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>حفاظت حساب کاربری</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch5" checked>
							<label class="custom-control-label" for="customSwitch5"></label>
						</div>
					</li>
				</ul>
			</div>
			<div class="mb-3">
				<h6 class="font-size-13 mb-3 text-muted">اعلان ها</h6>
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>اعلان های مرورگر</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch6">
							<label class="custom-control-label" for="customSwitch6"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>اعلان های موبایل</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch7">
							<label class="custom-control-label" for="customSwitch7"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>اشتراک ایمیل</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch8">
							<label class="custom-control-label" for="customSwitch8"></label>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between p-l-r-0 p-t-b-5">
						<span>اعلان های sms</span>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch9" checked>
							<label class="custom-control-label" for="customSwitch9"></label>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end::sidebar settings -->

	<!-- begin::navigation -->
	<div class="navigation">
		<div class="navigation-icon-menu">
			<ul>
                @foreach ($sidebar as $key => $menu)
                    @if($menu->type == 'header')
                    <li data-toggle="tooltip" title="{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}">
                        <a href="#navigation{{$menu->name}}" title="{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}">
                            <i class="{{$menu->icon ?? ''}}"></i>
                            <span class="badge badge-warning"></span>
                        </a>
                    </li>
                    @endif
                @endforeach
			</ul>
			<ul>
				<li data-toggle="tooltip" title="ویرایش پروفایل">
					<a href="#" class="go-to-page">
						<i class="icon ti-settings"></i>
					</a>
				</li>
				<li data-toggle="tooltip" title="خروج">
					<a href="login.html" class="go-to-page">
						<i class="icon ti-power-off"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="navigation-menu-body">
            @foreach ($sidebar as $mainkey => $mainMenu)
                @if($mainMenu->type == 'header')            
			        <ul id="navigation{{$mainMenu->name}}" @if($mainkey == 0) class="navigation-active" @endif>
                        @foreach ($sidebar as $key => $menu)
                        @if($mainMenu->id == $menu->parent_id || $mainMenu->id == $menu->id )
                            @if($menu instanceof Illuminate\Database\Eloquent\Collection)
                                <li>
                                    <a href="#">{{$key ?? '???'}}</a>
                                    <ul>
                                        @foreach($menu as $subItem)
                                        <li>
                                            <a href="{{$subItem->route ? route($subItem->route) : (url($subItem->url) ?? '#')}}{{$subItem->route ? '?action='.$subItem->url : ''}}">
                                                {{__($subItem->packeage.'::RoutName.'.($subItem->name ?? '???'))}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>                        
                            @else
                                @if($menu->type == 'header')
                                    <li class="navigation-divider">{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}</li>
                                @endif
                                @if($menu->type == '')
                                    <li>
                                        <a href="{{$menu->route ? route($menu->route) : (url($menu->url) ?? '#')}}{{$menu->route ? ($menu->url ? '?action='.$menu->url : '') : ''}}">
                                            {{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}
                                        </a>
                                    </li>
                                @endif                                              
                            @endif
                        @endif
                    @endforeach 
                    </ul>
                @endif
            @endforeach
		</div>
	</div>
	<!-- end::navigation -->

	<!-- begin::header -->
	<div class="header">

		<!-- begin::header logo -->
		<div class="header-logo">
			<a href="index.html">
				<img class="large-logo" src="{{url('Templates/nextable/default/assets/media/image/logo.png')}}" alt="image">
				<img class="small-logo" src="{{url('Templates/nextable/default/assets/media/image/logo-sm.png')}}" alt="image">
				<img class="dark-logo" src="{{url('Templates/nextable/default/assets/media/image/logo-dark.png')}}" alt="image">
			</a>
		</div>
		<!-- end::header logo -->

		<!-- begin::header body -->
		<div class="header-body">

			<div class="header-body-left">

				<h3 class="page-title">صفحه خالی</h3>

				<!-- begin::breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">داشبورد</a></li>
						<li class="breadcrumb-item active" aria-current="page">صفحه خالی</li>
					</ol>
				</nav>
				<!-- end::breadcrumb -->

			</div>

			<div class="header-body-right">
				<!-- begin::navbar main body -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<form>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="جستجو">
								<div class="input-group-append">
									<button class="btn btn-light" type="button">
										<i class="ti-search"></i>
									</button>
								</div>
							</div>
						</form>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">
							<i class="ti-plus"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
							<div class="p-3">
								<h6 class="font-size-13 m-b-15">دسترسی سریع</h6>
								<div class="row">
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-danger-bright bg-hover pt-3 pb-3 border-radius-1 text-danger text-center mb-3">
												<i class="fa fa-sitemap mb-2 font-size-20"></i>
												دسته‌بندی ها
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-info-bright bg-hover pt-3 pb-3 border-radius-1 text-info text-center mb-3">
												<i class="ti-game mb-2 font-size-20"></i>
												محصولات
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-warning-bright bg-hover pt-3 pb-3 border-radius-1 text-warning text-center">
												<i class="ti-bar-chart-alt mb-2 font-size-20"></i>
												گزارشات
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-secondary-bright bg-hover pt-3 pb-3 border-radius-1 text-secondary text-center">
												<i class="fa fa-share mb-2 font-size-20"></i>
												سایر
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link nav-link-notify" data-toggle="dropdown">
							<i class="ti-comment"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
							<div class="p-4 text-center" data-backround-image="assets/media/image/image1.png">
								<h6 class="m-b-0">پیام ها</h6>
								<small class="font-size-13 opacity-7 d-inline-block m-t-5">1 پیام خوانده نشده</small>
							</div>
							<div>
								<ul class="list-group list-group-flush">
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-success rounded-circle">آ</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													استیو راجرز
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">08:50 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 bg-secondary-bright hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-primary rounded-circle">ج</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													جان اسنو
													<i title="علامت خوانده شده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">10:23 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-danger rounded-circle">ک</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													استیو جابز
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">08:50 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-info rounded-circle">ن‌پ</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													ناتالی پورتمن
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">20:13 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="p-3 text-right">
								<ul class="list-inline small">
									<li class="list-inline-item">
										<a href="#">علامت خوانده شده به همه</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">
							<i class="ti-bell"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
							<div class="p-4 text-center" data-backround-image="assets/media/image/image1.png">
								<h6 class="m-b-0">اعلان ها</h6>
								<small class="font-size-13 opacity-7">2 اعلان خوانده نشده</small>
							</div>
							<div class="p-3">
								<div class="timeline">
									<div class="timeline-item">
										<div>
											<figure class="avatar avatar-state-danger avatar-sm m-r-15 bring-forward">
												<span class="avatar-title bg-info-bright text-info rounded-circle">
													<i class="fa fa-file-text-o font-size-20"></i>
												</span>
											</figure>
										</div>
										<div>
											<p class="m-b-5">
												<a href="#">استیو جابز</a> یک ضمیمه جدید به تیکت افزود
												<a href="#">گزارش باگ نرم افزار</a>
											</p>
											<small class="text-muted">
												<i class="fa fa-clock-o m-r-5"></i> 8 ساعت پیش
											</small>
										</div>
									</div>
									<div class="timeline-item">
										<div>
											<figure class="avatar avatar-state-danger avatar-sm m-r-15 bring-forward">
												<span class="avatar-title bg-warning-bright text-warning rounded-circle">
													<i class="fa fa-money font-size-20"></i>
												</span>
											</figure>
										</div>
										<div>
											<p class="m-b-5">
												<a href="#">کاترین</a> یک تیکت جدید ثبت کرد
												<a href="#">نحوه پرداخت</a>
											</p>
											<small class="text-muted">
												<i class="fa fa-clock-o m-r-5"></i> دیروز
											</small>
										</div>
									</div>
									<div class="timeline-item">
										<div>
											<figure class="avatar avatar-sm m-r-15 bring-forward">
												<span class="avatar-title bg-success-bright text-success rounded-circle">
													<i class="fa fa-dollar font-size-20"></i>
												</span>
											</figure>
										</div>
										<div>
											<p class="m-b-5">
												<a href="#">کاترین</a> تنظیمات دسته تیکت را تغییر داد
												<a href="#">پرداخت و صورتحساب</a>
											</p>
											<small class="text-muted">
												<i class="fa fa-clock-o m-r-5"></i> 1 روز پیش
											</small>
										</div>
									</div>
								</div>
							</div>
							<div class="p-3 text-right">
								<ul class="list-inline small">
									<li class="list-inline-item">
										<a href="#">علامت خوانده شده به همه</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link bg-none" data-sidebar-open="#userProfile">
							<div>
								<figure class="avatar avatar-state-success avatar-sm">
									<img src="{{url('Templates/nextable/default/assets/media/image/avatar.jpg')}}" class="rounded-circle" alt="image">
								</figure>
							</div>
						</a>
					</li>
				</ul>
				<!-- end::navbar main body -->

				<div class="d-flex align-items-center">
					<!-- begin::navbar navigation toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
						<a href="#">
							<i class="ti-menu"></i>
						</a>
					</div>
					<!-- end::navbar navigation toggler -->

					<!-- begin::navbar toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
						<a href="#">
							<i class="ti-arrow-down"></i>
						</a>
					</div>
					<!-- end::navbar toggler -->
				</div>
			</div>

		</div>
		<!-- end::header body -->

	</div>
	<!-- end::header -->

	<!-- begin::main content -->
	<main class="main-content">

		<div class="row">
            @if(($card ?? '' )!= '')
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">عنوان محتوا</h5>
                        @yield('content')                    
					</div>
				</div>
			</div>
            @else
                @yield('content')                    
            @endif
		</div>

	</main>
	<!-- end::main content -->

	<!-- begin::global scripts -->
	<script src="{{url('Templates/nextable/default/vendors/bundle.js')}}"></script>
	<!-- end::global scripts -->

	<!-- begin::custom scripts -->
	<script src="{{url('Templates/nextable/default/assets/js/app.js')}}"></script>
	<!-- end::custom scripts -->
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
            @vite($item)
        @endforeach
    @endif
</body>

</html>