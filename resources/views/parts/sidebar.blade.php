 <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/img/be-icon-57x57px.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>{{$currentUser->name}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="{{ Help::set_active(['/','']) }}">
                            <a href="/">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                       
					    <li class="{{ Help::set_active(['accounting*']) }} treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Accounting</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/accounting"><i class="fa fa-angle-double-right"></i> Main</a></li>
                                <li><a href="/accounting/deposits"><i class="fa fa-angle-double-right"></i> Deposits</a></li>
                                <li><a href="/accounting/offerings"><i class="fa fa-angle-double-right"></i> Offerings</a></li>
                                <li><a href="/accounting/gifts"><i class="fa fa-angle-double-right"></i> Gifts</a></li>
                                <li><a href="/accounting/expenses"><i class="fa fa-angle-double-right"></i> Expenses</a></li>
                            </ul>
                        </li>
					   
					    <li class="{ Help::set_active(['calendar*']) }}">
                            <a href="/calendar">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                            </a>
                        </li>
					   
                        <li class="{ Help::set_active(['people*']) }} treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>People</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/people"><i class="fa fa-angle-double-right"></i> All</a></li>
                            </ul>
                        </li>



						<!--
                        <li>
                            <a href="pages/mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                       -->
                    </ul>
                </section>
                <!-- /.sidebar -->