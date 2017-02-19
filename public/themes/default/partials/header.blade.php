<nav class="navbar navbar-static-top" role="navigation">

    <!-- Sidebar toggle button-->

    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" style="margin: 0;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu pull-left">
  <ul>
<li><a href="/knowledge_base">Knowledge Base</a></li>
<li><a href="/projects">Projects</a></li>
<li><a href="/invoices">Invoices</a></li>
<li><a href="/contracts">Contracts</a></li>
<li><a href="/estimates">Estimates</a></li>
<li><a href="/proposals">Proposals</a></li>
<li><a href="/tickets">Support</a></li>
  </ul>
    </div>


    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav pull-right">
            <?php if (Auth::check()): ?>

            {{--@include('notification::partials.notifications')--}}

            <?php endif; ?>

            <li><a href="{{ URL::to('/') }}" target="_blank"><i
                            class="fa fa-eye"></i>view website</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-flag"></i>
                    <span>
                        EN
                        <i class="caret"></i>
                    </span>
                </a>
                <ul class="dropdown-menu language-menu">
                        <li>
                            EN
                        </li>

                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>
                        fullname




                        <i class="caret"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <img src="gravatar" class="img-circle" alt="User Image"/>
                        <p>
                            fullname
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ URL::route('logout')  }}" class="btn btn-default btn-flat">
                            sign out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="pull-right">
            xtra
        </div>
    </div>
</nav>
