<!DOCTYPE>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			{{config('app.name', 'PermataMall')}} | {{$page->title ?? ''}}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>

		<link href="{!! asset('public/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('public/assets/assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('public/assets/assets/demo/default/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{!! asset('public/assets/css/sweetalert2.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('public/assets/css/jquery.modal.min.css') !!}" />
		<link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="{{ route('Mitra.index') }}" class="m-brand__logo-wrapper">
										<img alt="" src="{!! asset('public/assets/images/textonly-363x129.png') !!}" width="150" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>									
									<!-- END -->
									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">									
								</ul>
							</div>
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">										
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click" data-dropdown-persistent="true">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url({!! asset('public/assets/assets/app/media/img/misc/notification_bg.jpg') !!}); background-size: cover;">
														<span class="m-dropdown__header-title">
															9 New
														</span>
														<span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Produk
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
																		Informasi
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
																		Logs
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Perubahan Module Tampilan
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						<!-- 14 mins -->
																					</span>
																				</div>
																				
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" m-scrollabledata-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						Dalam Pengembangan
																					</a>
																					<span class="m-list-timeline__time">
																						<!-- Just now -->
																					</span>
																				</div>					
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>										
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													@if(HelperGetProfile()->foto_profile != "")
													<img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.HelperGetProfile()->id_mitra.'/'.HelperGetProfile()->foto_profile }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													@else
													<img src="{!! asset('public/assets/images/user-not-found.png') !!}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													@endif
												</span>
												<span class="m-topbar__username m--hide">
													Nick
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url({!! asset('public/assets/assets/app/media/img/misc/user_profile_bg.jpg') !!}); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																@if(HelperGetProfile()->foto_profile != "")
																	<img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.HelperGetProfile()->id_mitra.'/'.HelperGetProfile()->foto_profile }}" class="m--img-rounded m--marginless" alt=""/>
																@else
																	<img src="{!! asset('public/assets/images/user-not-found.png') !!}" class="m--img-rounded m--marginless" alt=""/>
																@endif																
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	{{ decrypt(Session::get('id_token_xmtrusr_name')) }}
																</span>																
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="{{ route('Mitra.Profile.index') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					Profil Saya
																				</span>
																				<!-- <span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span> -->
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="{{ route('Mitra.Profile.password') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Ubah Password
																		</span>
																	</a>
																</li>
																<!-- <li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Messages
																		</span>
																	</a>
																</li> -->
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			FAQ
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Support
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="{{ route('logout') }}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>										
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->		
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "  data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  {{ set_active(['Mitra.index']) }}" aria-haspopup="true" >
								<a  href="{{ route('Mitra.index') }}" class="m-menu__link ">
									<i class="m-menu__link-icon la la-home"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item {{ set_active(['Mitra.Product.index']) }}" aria-haspopup="true" >
								<a  href="{{ route('Mitra.Product.index') }}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-folder-2"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Produk
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>		



							<!-- produk mitra =============================================================================== -->
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Produk Kamu
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							@foreach(HelperProductMitra() as $ListProdukKamuNavbar)
			            		@if($ListProdukKamuNavbar->id_master_kategori == 19)
			            		<li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded {{ set_active_toolbar(['Mitra.Product.data','Mitra.exDaftar','Mitra.Product.List','Mitra.Product.jadwal_privat','Mitra.Product.history_privat','Mitra.Product.panduan_privat','Mitra.Product.hak_kewajiban_privat','Mitra.Product.jadwal_detail_privat']) }}" aria-haspopup="true" data-menu-submenu-toggle="hover">
								    <a href="#" class="m-menu__link m-menu__toggle">
								        <i class="m-menu__link-icon flaticon-profile"></i>
								        <span class="m-menu__link-text">
								            Les {{ $ListProdukKamuNavbar->kategori }}
								        </span>
								        <i class="m-menu__ver-arrow la la-angle-right"></i>
								    </a>
								    <div class="m-menu__submenu" style="">
								        <span class="m-menu__arrow"></span>
								        <ul class="m-menu__subnav">
								            <li class="m-menu__item {{ set_active(['Mitra.Product.data','Mitra.exDaftar','Mitra.Product.List']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Product.data') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Layanan Les Privat
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item {{ set_active(['Mitra.Product.jadwal_privat','Mitra.Product.jadwal_detail_privat']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Product.jadwal_privat') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Jadwal Les
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item {{ set_active(['Mitra.Product.history_privat']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Product.history_privat') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Histori
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item {{ set_active(['Mitra.Product.panduan_privat']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Product.panduan_privat') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Panduan Les Privat
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item {{ set_active(['Mitra.Product.hak_kewajiban_privat']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Product.hak_kewajiban_privat') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Hak & Kewajiban
								                    </span>
								                </a>
								            </li>												            
								        </ul>
								    </div>
								</li>
								@elseif($ListProdukKamuNavbar->id_master_kategori == 24)
								<li class="m-menu__item m-menu__item--submenu m-menu__item--expanded {{ set_active_toolbar(['Mitra.Belanja.index','Mitra.Belanja.Product.index','Mitra.Belanja.Product.create','Mitra.Belanja.Product.edit','Mitra.Belanja.Product.Gambar']) }}" aria-haspopup="true" data-menu-submenu-toggle="hover">
								    <a href="#" class="m-menu__link m-menu__toggle">
								        <i class="m-menu__link-icon flaticon-cart	"></i>
								        <span class="m-menu__link-text">
								            {{ $ListProdukKamuNavbar->kategori }} 
								            <span class="m-nav__link-badge">
												<span class="m-badge m-badge--success">
													&nbsp;Beta&nbsp;
												</span>
											</span>
								        </span>
								        <i class="m-menu__ver-arrow la la-angle-right"></i>
								    </a>
								    <div class="m-menu__submenu" style="">
								        <span class="m-menu__arrow"></span>
								        <ul class="m-menu__subnav">
								            <li class="m-menu__item {{ set_active(['Mitra.Belanja.index']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Belanja.index') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Dashboard
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item {{ set_active(['Mitra.Belanja.Product.index','Mitra.Belanja.Product.create','Mitra.Belanja.Product.edit','Mitra.Belanja.Product.Gambar']) }}" aria-haspopup="true">
								                <a href="{{ route('Mitra.Belanja.Product.index') }}" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Barang
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item " aria-haspopup="true">
								                <a href="" class="m-menu__link ">
								                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
								                    <span class="m-menu__link-text">
								                        Order
								                    </span>
								                </a>
								            </li>
								            <li class="m-menu__item" aria-haspopup="true" >
												<a class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								                        <span></span>
								                    </i>
													<span class="m-menu__link-title">
														<span class="m-menu__link-wrap">
															<span class="m-menu__link-text">
																Lapak Libur
															</span>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--success">
															    <label>
															        <input type="checkbox" name="">
															        <span></span>
															    </label>
															</span>
														</span>
													</span>
												</a>
											</li>												            
								        </ul>
								    </div>
								</li>
				            	@endif								            
				            @endforeach

				            <!-- akhir produk mitra ====================================================================== -->

							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Module
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item {{ set_active(['Mitra.Profile.index']) }}" aria-haspopup="true" >								
								<a href="{{ route('Mitra.Profile.index') }}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-profile-1"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Profil
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item" aria-haspopup="true" >
								<a  href="" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-settings"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Pengaturan
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>					
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    {{$page->title ?? ''}}
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    @isset ($page->breadcrumbs)
                                        @foreach ($page->breadcrumbs as $element)
                                            <li class="m-nav__separator">
                                                -
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="{{$element['url']}}" class="m-nav__link">
                                                    <span class="m-nav__link-text">
                                                        {{$element['title']}}
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
					<div class="m-content">
						@yield('content')
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; PT PERMATAMALL NUSANATRA
<!-- 								<a href="#" class="m-link">
									Keenthemes
								</a> -->
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<!-- <li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											About
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#"  class="m-nav__link">
										<span class="m-nav__link-text">
											Privacy
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											T&C
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											Purchase
										</span>
									</a>
								</li> -->
								<li class="m-nav__item m-nav__item">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    	<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!--begin::Base Scripts -->
		<script src="{!! asset('public/assets/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
		<script src="{!! asset('public/assets/assets/demo/default/base/scripts.bundle.js') !!}" type="text/javascript"></script>
		<script type="text/javascript" src="{!! asset('public/assets/js/sweetalert2.min.js') !!}"></script> 
	    <script src="{!! asset('public/assets/js/jquery.modal.min.js') !!}"></script>  
	    <script type="text/javascript">
	    	var Select2 = function() {
		    	$(".m-select2").select2()
			}();
			jQuery(document).ready(function() {
			    Select2.init()
			});
	    </script>
		<!--end::Base Scripts -->   
		@yield('script')

		<style type="text/css">
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--expanded>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--expanded>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			}
			.m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
			    color: #3db05d;
			    font-weight: bold;
			}
			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-bullet.m-menu__link-bullet--dot>span, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-bullet.m-menu__link-bullet--dot>span {
			    background-color: #399f4f;
			    font-weight: bold;
			}

			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text {
			    color: #3eb960;
			    font-weight: bold;
			}

			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-icon, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-icon {
			    color: #33ac60;
			    font-weight: bold;
			}

			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item:hover>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item:hover>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			    font-weight: bold;
			}

			.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item:hover>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item:hover>.m-menu__link .m-menu__link-text {
			    color: #ffffff;
			    font-weight: bold;
			}
		</style>
	</body>
	<!-- end::Body -->
</html>
