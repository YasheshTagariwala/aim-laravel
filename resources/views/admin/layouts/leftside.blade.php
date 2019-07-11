<aside class="left-sidebar">
    <section class="sidebar-user-panel">
        <div id="user-panel-slide-toggleable">
            <!--div class="user-panel-profile-picture">
                <img src="{{url('/')}}/assets/img/africainn.png" alt="Africa Innovation">
            </div-->
                <img src="{{url('/')}}/assets/img/africainn.png" alt="Africa Innovation" height="140" width="200">
            <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span> Logged in as <strong> AIM Admin</strong></span>
            <!-- <a href="{{url('/')}}/assets/app-pages/profile/update.html" class="user-panel-action-link"><span class="fa fa-pencil"></span> Manage your account</a> -->
        </div>
        <!-- <button class="user-panel-toggler" data-slide-toggle="user-panel-slide-toggleable"><span class="fa fa-chevron-up" data-slide-toggle-showing></span><span class="fa fa-chevron-down" data-slide-toggle-hidden></span></button> -->
    </section>
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">
            Admin Panel
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}">
                <span class="typcn typcn-home sidebar-nav-link-logo"></span> Dashboard
            </a>
        </li>
        <!--li class="sidebar-nav-link ">
            <a href="{{url('/new')}}">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> My Details
            </a>
        </li-->
        <li class="sidebar-nav-link sidebar-nav-link-group active">
            <a data-subnav-toggle>
                <span class="typcn typcn-th-list sidebar-nav-link-logo"></span> Users
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Entrepreneur
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/supporter">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Supporter
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/investor">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Investor
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/organization">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Organization
                        </a>
                    </li>                  
                </ul>
        </li>

        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/temp_user">
                <span class="typcn typcn-clipboard sidebar-nav-link-logo"></span> Waiting Users
            </a>
        </li>

        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/user_invites">
                <span class="typcn typcn-document sidebar-nav-link-logo"></span> Invite Users
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/userlogs">
                <span class="typcn typcn-business-card sidebar-nav-link-logo"></span> User Logs
            </a>
        </li>
        <li class="sidebar-nav-link sidebar-nav-link-group  active">
            <a data-subnav-toggle>
                <span class="typcn typcn-document sidebar-nav-link-logo"></span> Entrepreneur
                <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
            </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_profile">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Profile Details
                        </a>
                    </li>
                    <!-- <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_management">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Management
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_company">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Company
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_funding">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Funding
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_market">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Market
                        </a>
                    </li>
                    <li class="sidebar-nav-link">
                        <a href="{{url('/admin')}}/entrepreneur_businessplan">
                        <span class="typcn typcn-user sidebar-nav-link-logo"></span> Business Plan
                        </a>
                    </li>         -->           
                </ul>
        </li>
        <!-- <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/investor_profile">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> Investors
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/marketplace_settings">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> Market
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/organization_profile">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> Organization
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/supporter_profile">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> Supporters
            </a>
        </li> 

        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/products">
                <span class="typcn typcn-user sidebar-nav-link-logo"></span> Products
            </a>
        </li>-->
        <li class="sidebar-nav-link  active">
            <a href="{{url('/admin')}}/contacts">
                <span class="typcn typcn-contacts sidebar-nav-link-logo"></span> Contacts
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/messages">
                <span class="typcn typcn-mail sidebar-nav-link-logo"></span> Messages
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/blog">
                <span class="typcn typcn-mail sidebar-nav-link-logo"></span> Blogs
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/subscriptions">
                <span class="typcn typcn-download sidebar-nav-link-logo"></span> Subscriptions
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/products">
                <span class="typcn typcn-download sidebar-nav-link-logo"></span> Products
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/orders">
                <span class="typcn typcn-download sidebar-nav-link-logo"></span> Orders
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/funds">
                <span class="typcn typcn-download sidebar-nav-link-logo"></span> Investments
            </a>
        </li>
        <li class="sidebar-nav-link  active ">
            <a href="{{url('/admin')}}/donations">
                <span class="typcn typcn-download sidebar-nav-link-logo"></span> Donations
            </a>
        </li>
    </ul>
</aside>          