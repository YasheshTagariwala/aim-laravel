<aside class="left-sidebar">
    <section class="sidebar-user-panel">
        <div id="user-panel-slide-toggleable">
            <!--div class="user-panel-profile-picture">
                <img src="{{url('/')}}/assets/img/africainn.png" alt="Africa Innovation">
            </div-->
                <img src="{{url('/')}}/assets/img/africainn.png" alt="Africa Innovation" height="140" width="200">
            <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span> Logged in as <strong> Tyrone G</strong></span>
            <a href="{{url('/')}}/assets/app-pages/profile/update.html" class="user-panel-action-link"><span class="fa fa-pencil"></span> Manage your account</a>
        </div>
        <!-- <button class="user-panel-toggler" data-slide-toggle="user-panel-slide-toggleable"><span class="fa fa-chevron-up" data-slide-toggle-showing></span><span class="fa fa-chevron-down" data-slide-toggle-hidden></span></button> -->
    </section>
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">
            Admin Panel
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/')}}">
                <span class="typcn typcn-home sidebar-nav-link-logo"></span> Dashboard
            </a>
        </li>
        <li class="sidebar-nav-link ">
            <a href="{{url('/new')}}">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> My Details
            </a>
        </li>
        <li class="sidebar-nav-link sidebar-nav-link-group ">
            <a data-subnav-toggle>
                <span class="typcn typcn-document sidebar-nav-link-logo"></span> Entrepreneurs
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="{{url('/')}}/assets/log-in.html">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Profile
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/')}}/assets/forgot-password.html">
                        <span class="typcn typcn-tags sidebar-nav-link-logo"></span> Categories
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/')}}/assets/sign-up.html">
                        <span class="typcn typcn-plus-outline sidebar-nav-link-logo"></span> Business Stage
                        </a>
                    </li>                    
                </ul>
        </li>
        
    </ul>
</aside>          