 <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
                            <li class="nav-item start ">
                                <a href="{{URL::route('user.home')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Home</span>
                                   
                                </a>
                                
                            </li>
                            <li class="nav-item start ">
                                <a href="{{URL::route('user.user.edit')}}" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Edit Profile</span>
                                   
                                </a>
                                
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Activities</h3>
                            </li>
                          
                           
                           
                        
                             <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="title">Shops</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.shop.index')}}" class="nav-link ">
                                            <span class="title">View Shops</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> 
 
                                
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-gavel" aria-hidden="true"></i>
                                    <span class="title">Tools</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.rent.index')}}" class="nav-link ">
                                            <span class="title">View Tools</span>
                                        </a>
                                    </li>

                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.tool.index')}}" class="nav-link ">
                                            <span class="title">My Tools</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.book.index')}}" class="nav-link ">
                                            <span class="title">Booking History</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> 
 
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Labourers</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.emp.index')}}" class="nav-link ">
                                            <span class="title">Search Labourers</span>
                                        </a>
                                   </li>
                               </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-suitcase"></i>
                                    <span class="title">My Work</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('user.work.show')}}" class="nav-link ">
                                            <span class="title"> Work History</span>
                                            <span class="arrow"></span>
                                        </a>
                                   </li>
                                   <li class="nav-item  ">
                                        <a href="{{URL::route('user.work.index')}}" class="nav-link ">
                                            <span class="title"> Scheduled Work</span>
                                            <span class="arrow"></span>
                                        </a>
                                   </li>
                               </ul>
                            </li>
                             <!-- 
                            <!-- <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                            <span class="title">Real Estate</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <i class='fa fa-comment-dollar'></i>
                                                    <span class="title">Sales</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="{{URL::route('franchise.realestate.show',0)}}" class="nav-link ">
                                                            <span class="title">View</span>

                                                        </a>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                   <i class='fa fa-comments-dollar'></i>
                                                    <span class="title">Rent</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="{{URL::route('franchise.realestate.show',1)}}" class="nav-link ">
                                                            <span class="title">View</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <i class='fa fa-comment-dollar'></i>
                                                    <span class="title">Lease</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="{{URL::route('franchise.realestate.show',2)}}" class="nav-link ">
                                                            <span class="title">View</span>

                                                        </a>
                                                    </li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class='fa fa-gas-pump'></i>
                                    <span class="title">Petrol Pumb</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('franchise.pumb.index')}}" class="nav-link ">
                                            <span class="title">View Petrol Pumb</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    <span class="title">Taxi</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('franchise.taxi.index')}}" class="nav-link ">
                                            <span class="title">View Taxi</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class='fa fa-bullhorn'></i>
                                    <span class="title">Classifieds</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <span class="title">Matrimony</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{URL::route('franchise.matrimony.index')}}" class="nav-link ">
                                                    <span class="title">View</span>
                                                    
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            <span class="title">Used Items</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{URL::route('franchise.useditems.index')}}" class="nav-link ">
                                                    <span class="title">View</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                            <span class="title">Hospital</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{URL::route('franchise.hospital.index')}}" class="nav-link ">
                                                    <span class="title">View</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                                                           
                                                        
                            <li class="nav-item  ">
                                <a href="?p=" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">User</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('franchise.user.index')}}" class="nav-link ">
                                            <span class="title">View user</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-stethoscope"></i>
                                    <span class="title">Doctor</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{URL::route('franchise.doctor.index')}}" class="nav-link ">
                                            <span class="title">View</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li> -->
                                                   </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>