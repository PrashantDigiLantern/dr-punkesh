    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="{{url('admin/dashboard')}}" class="logo">
                
            @if(session('useradmin')['super_org_id']=='1')
            <img style="padding-left: 0px; width: 74%;" src="{{url('/images/home-logo.png')}}">
          @else
          @if(session('userinfo')['org_logo']!=NULL)
          <img src="{{$_SERVER['BACK_FRONT'].'images/orgnization/'.session('userinfo')['org_logo']}}" style="width:158px;height:33px;">
          @else
          {{session('userinfo')['user_org_name']}}
          @endif
          @endif
            
            </a> 
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="top-nav clearfix ">
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">Admin</span>
                        <span class="online-status"></span>
                        <img src="{{url('/images/dummy-user.png')}}" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                        <a class="dropdown-item" href="{{url('/admin/logout')}}">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>

        </div>
    </header>
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Home </span>
                            </a>
                            <ul class="sub">
        						<li>
                                    <a href="{{url('/admin/slider')}}" class="active">Slider</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ourservice')}}">Our Service & Exclusive</a>
                                </li>
                                 <li>
                                    <a href="{{url('/admin/hometechnology')}}">Home Technology</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/homepicture')}}">Before After Pictures</a>
                                </li>
                               
        					</ul>
                        </li> -->
                        <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>About</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/aboutlist')}}">About Clinic</a></li>
        						<li><a href="{{url('/admin/membership')}}">Membership</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Doctor </span>
                            </a>
                            <ul class="sub">
        						<li>
                                    <a href="{{url('/admin/doctor-list')}}" class="active">Doctor List</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/doctor-certificate')}}">Doctor Certificates</a>
                                </li>
                               
        					</ul>
                        </li> -->
                        <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Forms</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/contact-list')}}">Address List</a></li>
                                <li><a href="{{url('/admin/contact')}}">Contact us</a></li>
                                <li><a href="{{url('/admin/appointment')}}">Appointment</a></li>
                                <li><a href="{{url('/admin/social-media')}}">Social Media</a></li>
                            </ul>
                        </li> -->

                        <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Footer</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/footer')}}">Footer Logo</a></li>
                                <li><a href="{{url('/admin/footer-menu')}}">Footer Menu</a></li>
                            </ul>
                        </li> -->
                       
                
                    @foreach( Session::get('userinfo')['user_menu_permissions'] as $menu)
                    @if($menu['mnu_dropdown']=='No')
                    <li>
                        <a class="" href="{{url('/admin/'.$menu['mnu_url'])}}">
                            <i class="{{ $menu['mnu_icon']}}"></i>
                            <span>{{ $menu['mnu_name']}}</span>
                        </a>
                    </li>
                    @else
                    <li class="bold"> <a class="" href="{{ url('/admin/'.$menu['mnu_url']) }}"><i class="{{ $menu['mnu_icon']}}"></i><span> {{ $menu['mnu_name']}} </span></a>
                        <ul class="sub">
                            @foreach( Session::get('userinfo')['user_operation_permissions'] as $operation)
                            @if( $menu['mnu_id'] == $operation['cfg_mun_id'] )
                            <li> <a href="{{ url('/admin/'.$operation['op_link'])}}"> {{ $operation['op_name']}} </a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach


                </ul>
                <!-- <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{url('/admin/dashboard')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
						
						<li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Menu </span>
                            </a>
                            <ul class="sub">
        						<li>
                                    <a href="{{url('/admin/primary-menu')}}" class="active">Primary Menu List</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/secondary-menu')}}">Secondary Menu List</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/third-menu')}}">Third Menu List</a>
                                </li>
                               
        					</ul>
                        </li>
                        
                        <li>
                            <a class="" href="{{url('/admin/seo')}}">
                               <i class="fa fa-camera-retro"></i>
                                <span>Seo Page</span>
                            </a>
                        </li>

                        !-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Home </span>
                            </a>
                            <ul class="sub">
        						<li>
                                    <a href="{{url('/admin/slider')}}" class="active">Slider</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ourservice')}}">Our Service & Exclusive</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/hometechnology')}}">Home Technology</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/homepicture')}}">Before After Pictures</a>
                                </li>
                               
        					</ul>
                        </li> -->
                <!-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>About</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/about')}}">About Clinic</a></li>
                                 <li><a href="{{url('/admin/concern')}}">Concern</a></li>
        						<li><a href="{{url('/admin/membership')}}">Membership</a></li>
                            </ul>
                        </li> --
                       <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Services</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/service-category')}}">Service Category</a></li>
                                <li><a href="{{url('/admin/service')}}">Service</a></li>
                                <li><a href="{{url('/admin/service-faq')}}">Service FAQ</a></li>
                            </ul>
                        </li>
                        !-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Exclusive Treatments</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/exclusive')}}">Exclusive Treatments</a></li>
                                <li><a href="{{url('/admin/exclusive-faq')}}">Exclusive FAQ</a></li>
                            </ul>
                        </li>
                      
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Bridal Dermatology</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/bridal')}}">Bridal Dermatology</a></li>
                                <li><a href="{{url('/admin/bridal-faq')}}">Bridal Dermatology FAQ</a></li>
                            </ul>
                        </li> --

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Result</span>
                            </a>
                            <ul class="sub">
                            <li><a href="{{url('/admin/service-result-category')}}">Result Category</a></li>
                            <li><a href="{{url('/admin/result-service')}}">Result Service</a></li>
                            <li><a href="{{url('/admin/service-result-inner')}}">Result Inner</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Video</span>
                            </a>
                            <ul class="sub">
                            <li><a href="{{url('/admin/service-video-category')}}">Video Category</a></li>
                            <li><a href="{{url('/admin/video-service')}}">Video Service</a></li>
                            <li><a href="{{url('/admin/service-video-inner')}}">Video Inner</a></li>
                            </ul>
                        </li>

                        !-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Doctor</span>
                            </a>
                            <ul class="sub">
                            <li><a href="{{url('/admin/doctor-list')}}">Doctor List</a></li>
                            <li><a href="{{url('/admin/doctor-detail')}}">Doctor Inner</a></li>
                            </ul>
                        </li> --

						<li>
                            <a class="" href="{{url('/admin/technology')}}">
                               <i class="fa fa-camera-retro"></i>
                                <span>Technology</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{url('/admin/gallery')}}">
                               <i class="fa fa-camera-retro"></i>
                                <span>Gallery</span>
                            </a>
                        </li>
						

                        !-- <li class="sub-menu">
                            <a href="javascript:;">
                              <i class="fa fa-camera-retro"></i>
                                <span>Faq</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/faq')}}"> Faq</a></li>
        					</ul>
                        </li> -->

                <!-- <li>
                            <a class="" href="{{url('/admin/faq')}}">
                               <i class="fa fa-camera-retro"></i>
                                <span>Faq</span>
                            </a>
                        </li> --

						<li>
                            <a class="" href="{{url('/admin/testimonials')}}">
                               <i class="fa fa-rss-square"></i>
                                <span>Testimonial</span>
                            </a>
                        </li>

                        <li>
                            <a class="" href="{{url('/admin/blogs')}}">
                               <i class="fa fa-rss-square"></i>
                                <span>Blog</span>
                            </a>
                        </li>
					
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-server"></i>
                                <span>Press & Media</span>
                            </a>
                            <ul class="sub">
                            <li><a href="{{url('/admin/pressmedia-category')}}">Press & Media Category</a></li>
                            <li><a href="{{url('/admin/pressmedia')}}">Press & Media Inner</a></li>
                            </ul>
                        </li>

                        !-- <li>
                            <a class="" href="{{url('/admin/testimonials')}}">
                               <i class="fa fa-rss-square"></i>
                                <span>Press & Media</span>
                            </a>
                        </li> --

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>Forms</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{url('/admin/contact-detail')}}">Contact Detail</a></li>
                                <li><a href="{{url('/admin/contact')}}">Contact us</a></li>
                                <li><a href="{{url('/admin/appointment')}}">Appointment</a></li>
                                <li><a href="{{url('/admin/social-media')}}">Social Media</a></li>
                            </ul>
                        </li>
                    </ul> -->
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>