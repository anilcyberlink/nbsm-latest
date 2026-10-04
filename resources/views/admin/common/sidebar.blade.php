<aside id="sidebar_left" class="nano nano-primary affix">

    <div class="sidebar-left-content nano-content">

        <header class="sidebar-header">
            <div class="sidebar-widget search-widget hidden">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>
        </header>

        <ul class="nav sidebar-menu">

            <li class="sidebar-label pt15">Navigations</li>


            {{-- Dashboard --}}
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title">Dashboard</span>
                </a>
            </li>


            {{-- Manage Banners --}}
            @if (checkAuth(1))
                <li class="{{ request()->is('admin/banner*') ? 'active' : '' }}">
                    <a href="{{ url('admin/banner') }}">
                        <span class="fa fa-file-image-o text-info"></span>
                        <span class="sidebar-title">Manage Banners</span>
                    </a>
                </li>
            @endif


            {{-- Manage Posts --}}
            @if (checkAuth(2))

                @php
                    $managePostsActive =
                        request()->is('type/posttype*') ||
                        request()->is('admin/postcategory*') ||
                        request()->is('admin/contact-us*') ||
                        request()->is('admin/legal-documents*') ||
                        request()->is('admin/blogs*') ||
                        request()->is('admin/our-team*') ||
                        request()->is('admin/about*') ||
                        request()->is('admin/terms-and-conditions*') ||
                        request()->is('admin/services*') ||
                        request()->is('admin/industries*') ||
                        request()->is('admin/international*') ||
                        request()->is('admin/doing-business-in-nepal') ||
                        request()->is('admin/resources*');
                @endphp

                <li class="{{ $managePostsActive ? 'active' : '' }}">

                    <a class="accordion-toggle {{ $managePostsActive ? 'menu-open' : '' }}">

                        <span class="fa fa-archive"></span>

                        <span class="sidebar-title">Manage Posts</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        {{-- Post Types --}}
                        <li class="{{ request()->is('type/posttype*') ? 'active' : '' }}">
                            <a href="{{ url('type/posttype') }}">
                                <span class="fa fa-arrows"></span>
                                Post Types
                            </a>
                        </li>


                        {{-- Post Categories --}}
                        <li class="{{ request()->is('admin/postcategory*') ? 'active' : '' }}">
                            <a href="{{ url('admin/postcategory') }}">
                                <span class="fa fa-arrows"></span>
                                Post Categories
                            </a>
                        </li>


                        {{-- Dynamic Post Types --}}
                        @if ($posttype)

                            @foreach ($posttype as $row)
                                @php
                                    $postActive = request()->is('admin/' . $row->uri . '*');
                                    $postTypeEditActive = request()->is('type/posttype/' . $row->id . '/edit');
                                @endphp

                                <li class="{{ $postActive || $postTypeEditActive ? 'active' : '' }}">

                                    @if (has_posts($row->id))
                                        <a href="{{ url('admin/' . $row->uri) }}">
                                        @else
                                            <a href="{{ url('type/posttype/' . $row->id . '/edit') }}">
                                    @endif

                                    <span class="fa fa-arrows-h"></span>

                                    {{ $row->post_type }}

                                    </a>

                                </li>
                            @endforeach

                        @endif

                    </ul>

                </li>

            @endif


            {{-- Manage Trades --}}
            @if (checkAuth(3))
                @php
                    $tradesActive = request()->is('admin/our-trades*');
                @endphp

                <li class="{{ $tradesActive ? 'active' : '' }}">

                    <a href="{{ url('admin/our-trades') }}"
                        class="accordion-toggle {{ $tradesActive ? 'menu-open' : '' }}">

                        <span class="fa fa-files-o text-info"></span>

                        <span class="sidebar-title">Manage Trades</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <?php /*?> ?> ?> ?> ?> ?> ?> ?> ?>

                        <li>
                            <a href="{{ url('admin/portfoliocategory') }}">
                                <span class="fa fa fa-arrows-h"></span>
                                Portfolio Category
                            </a>
                        </li>

                        <?php */?>

                        <li class="{{ request()->is('admin/our-trades*') ? 'active' : '' }}">
                            <a href="{{ url('admin/our-trades') }}">
                                <span class="fa fa-arrows-h"></span>
                                Trades
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Proposal / Contact --}}
            @if (checkAuth(15))
                <li class="{{ request()->is('admin/proposal-request*') ? 'active' : '' }}">
                    <a href="{{ url('admin/proposal-request') }}">
                        <span class="fa fa-file-text-o text-info"></span>
                        <span class="sidebar-title">Proposal</span>
                    </a>
                </li>
            @endif


            {{-- Manage Photo Gallery --}}
            @if (checkAuth(4))
                @php
                    $galleryActive = request()->is('admin/imagecategory*') || request()->is('admin/imagegallery*');
                @endphp

                <li class="{{ $galleryActive ? 'active' : '' }}">

                    <a href="{{ url('admin/imagegallery') }}"
                        class="accordion-toggle {{ $galleryActive ? 'menu-open' : '' }}">

                        <span class="fa fa-file-image-o text-info"></span>

                        <span class="sidebar-title">Manage Photo Gallery</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/imagecategory*') ? 'active' : '' }}">
                            <a href="{{ url('admin/imagecategory') }}">
                                <span class="fa fa-arrows-h"></span>
                                Gallery Category
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/imagegallery*') ? 'active' : '' }}">
                            <a href="{{ url('admin/imagegallery') }}">
                                <span class="fa fa-arrows-h"></span>
                                Photos
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Manage Video Gallery --}}
            @if (checkAuth(5))
                @php
                    $videoGalleryActive = request()->is('admin/videocategory*') || request()->is('admin/videogallery*');
                @endphp

                <li class="{{ $videoGalleryActive ? 'active' : '' }}">

                    <a href="{{ url('admin/videogallery') }}"
                        class="accordion-toggle {{ $videoGalleryActive ? 'menu-open' : '' }}">

                        <span class="fa fa-file-video-o text-info"></span>

                        <span class="sidebar-title">Manage Video Gallery</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/videocategory*') ? 'active' : '' }}">
                            <a href="{{ url('admin/videocategory') }}">
                                <span class="fa fa-arrows-h"></span>
                                Video Category
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/videogallery*') ? 'active' : '' }}">
                            <a href="{{ url('admin/videogallery') }}">
                                <span class="fa fa-arrows-h"></span>
                                Videos
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Manage Circular --}}
            @if (checkAuth(6))

                @php
                    $circularActive = request()->is('admin/circular*') || request()->is('admin/circulartype*');
                @endphp

                <li class="{{ $circularActive ? 'active' : '' }}">

                    <a href="{{ url('admin/circular') }}"
                        class="accordion-toggle {{ $circularActive ? 'menu-open' : '' }}">

                        <span class="fa fa-files-o text-info"></span>

                        <span class="sidebar-title">Manage Circular</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/circulartype*') ? 'active' : '' }}">
                            <a href="{{ url('admin/circulartype') }}">
                                <span class="fa fa-arrows-h"></span>
                                Circular Type
                            </a>
                        </li>

                        @if ($circulartype)

                            @foreach ($circulartype as $circular)
                                <li
                                    class="{{ request()->is('admin/circular/' . $circular->id . '*') ? 'active' : '' }}">

                                    <a href="{{ route('admin.circular.index', $circular->id) }}">
                                        <span class="fa fa-arrows-h"></span>
                                        {{ ucfirst($circular->circular_type) }}
                                    </a>

                                </li>
                            @endforeach

                        @endif

                    </ul>

                </li>

            @endif


            {{-- Manage Tender --}}
            @if (checkAuth(7))
                @php
                    $tenderActive =
                        request()->routeIs('tender.*') ||
                        request()->routeIs('tender-category.*') ||
                        request()->routeIs('awarded-vender.*');
                @endphp

                <li class="{{ $tenderActive ? 'active' : '' }}">

                    <a class="accordion-toggle {{ $tenderActive ? 'menu-open' : '' }}">

                        <span class="fa fa-files-o text-info"></span>

                        <span class="sidebar-title">Manage Tender</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->routeIs('tender.*') ? 'active' : '' }}">
                            <a href="{{ route('tender.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Tender
                            </a>
                        </li>

                        <li class="{{ request()->routeIs('tender-category.*') ? 'active' : '' }}">
                            <a href="{{ route('tender-category.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Tender Category
                            </a>
                        </li>

                        <li class="{{ request()->routeIs('awarded-vender.*') ? 'active' : '' }}">
                            <a href="{{ route('awarded-vender.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Awarded Venders
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Manage Members --}}
            @if (checkAuth(8))
                @php
                    $membersActive =
                        request()->is('admin/member*') ||
                        request()->is('admin/department*') ||
                        request()->routeIs('init.*');
                @endphp

                <li class="{{ $membersActive ? 'active' : '' }}">

                    <a href="{{ url('admin/member') }}"
                        class="accordion-toggle {{ $membersActive ? 'menu-open' : '' }}">

                        <span class="glyphicon glyphicon-user text-info"></span>

                        <span class="sidebar-title">Manage Members</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/member*') ? 'active' : '' }}">
                            <a href="{{ url('admin/member') }}">
                                <span class="fa fa-arrows-h"></span>
                                Members
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/department*') ? 'active' : '' }}">
                            <a href="{{ url('admin/department') }}">
                                <span class="fa fa-arrows-h"></span>
                                Department Setup
                            </a>
                        </li>

                        <li class="{{ request()->routeIs('init.*') ? 'active' : '' }}">
                            <a href="{{ route('init.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Init Setting
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Manage Users --}}
            @if (checkAuth(9))
                @php
                    $usersActive =
                        request()->routeIs('user.*') ||
                        request()->routeIs('role.*') ||
                        request()->routeIs('adminmenu.*');
                @endphp

                <li class="{{ $usersActive ? 'active' : '' }}">

                    <a class="accordion-toggle {{ $usersActive ? 'menu-open' : '' }}">

                        <span class="glyphicon glyphicon-user text-info"></span>

                        <span class="sidebar-title">Manage Users</span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Users
                            </a>
                        </li>

                        <li class="{{ request()->routeIs('role.*') ? 'active' : '' }}">
                            <a href="{{ route('role.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                User Roles
                            </a>
                        </li>

                        <li class="{{ request()->routeIs('adminmenu.*') ? 'active' : '' }}">
                            <a href="{{ route('adminmenu.index') }}">
                                <span class="fa fa-arrows-h"></span>
                                Admin Menus
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Newsletter Subscribers --}}
            @if (checkAuth(10))
                <li class="{{ request()->is('newsletter/subcribers*') ? 'active' : '' }}">

                    <a href="{{ url('newsletter/subcribers') }}">

                        <span class="fa fa-users text-info"></span>

                        <span class="sidebar-title">
                            Newsletter Subcribers
                        </span>

                    </a>

                </li>
            @endif


            {{-- Download Info --}}
            @if (checkAuth(11))
                <li class="{{ request()->routeIs('dwninfo.*') ? 'active' : '' }}">

                    <a href="{{ route('dwninfo.index') }}">

                        <span class="fa fa-download text-info"></span>

                        <span class="sidebar-title">
                            Download Info
                        </span>

                    </a>

                </li>
            @endif


            {{-- Manage Rightshare --}}
            @if (checkAuth(13))
                @php
                    $rightshareActive =
                        request()->is('admin/rightshare_company*') ||
                        request()->is('admin/rightshare_eligibility*') ||
                        request()->is('admin/rightshare_holderlist*');
                @endphp

                <li class="{{ $rightshareActive ? 'active' : '' }}">

                    <a class="accordion-toggle {{ $rightshareActive ? 'menu-open' : '' }}">

                        <span class="glyphicon glyphicon-user text-info"></span>

                        <span class="sidebar-title">
                            Manage Rightshare
                        </span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/rightshare_company*') ? 'active' : '' }}">
                            <a href="{{ url('admin/rightshare_company') }}">
                                <span class="fa fa-arrows-h"></span>
                                RightShare Company
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/rightshare_eligibility*') ? 'active' : '' }}">
                            <a href="{{ url('admin/rightshare_eligibility') }}">
                                <span class="fa fa-arrows-h"></span>
                                RightShare Eligibility
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/rightshare_holderlist*') ? 'active' : '' }}">
                            <a href="{{ url('admin/rightshare_holderlist') }}">
                                <span class="fa fa-arrows-h"></span>
                                RightShare Holderlist
                            </a>
                        </li>

                    </ul>

                </li>
            @endif


            {{-- Manage Tax Liability --}}
            @if (checkAuth(14))
                @php
                    $taxliabilityActive =
                        request()->is('admin/taxliability_company*') ||
                        request()->is('admin/taxliability_eligibility*') ||
                        request()->is('admin/taxliability_holderlist*');
                @endphp

                <li class="{{ $taxliabilityActive ? 'active' : '' }}">

                    <a class="accordion-toggle {{ $taxliabilityActive ? 'menu-open' : '' }}">

                        <span class="glyphicon glyphicon-user text-info"></span>

                        <span class="sidebar-title">
                            Manage Taxliability
                        </span>

                        <span class="caret"></span>

                    </a>

                    <ul class="nav sub-nav">

                        <li class="{{ request()->is('admin/taxliability_company*') ? 'active' : '' }}">
                            <a href="{{ url('admin/taxliability_company') }}">
                                <span class="fa fa-arrows-h"></span>
                                Taxliability Company
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/taxliability_eligibility*') ? 'active' : '' }}">
                            <a href="{{ url('admin/taxliability_eligibility') }}">
                                <span class="fa fa-arrows-h"></span>
                                Taxliability Eligibility
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/taxliability_holderlist*') ? 'active' : '' }}">
                            <a href="{{ url('admin/taxliability_holderlist') }}">
                                <span class="fa fa-arrows-h"></span>
                                Taxliability Holderlist
                            </a>
                        </li>

                    </ul>

                </li>
            @endif




            <li class="{{ request()->is('admin/contact*') ? 'active' : '' }}">
                <a href="{{ url('admin/contact') }}">
                    <span class="fa fa-phone text-info"></span>
                    <span class="sidebar-title">Contact Inquiries</span>
                </a>
            </li>

            {{-- Settings --}}
            @if (checkAuth(12))
                <li class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">

                    <a href="{{ route('settings.index') }}">

                        <span class="fa fa-cogs text-info"></span>

                        <span class="sidebar-title">
                            Settings
                        </span>

                    </a>

                </li>
            @endif


            <div class="sidebar-toggle-mini">
                <a href="">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>

        </ul>

    </div>

</aside>
