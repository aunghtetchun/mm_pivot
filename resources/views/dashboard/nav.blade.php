@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('home') }}">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>

            @component("component.nav-item")
                @slot("icon") <i class="feather-file"></i> @endslot
                @slot("name") Sample @endslot
                @slot("link") {{ route('sample') }} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent
            @component("component.nav-title") Blog & Category Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Category @endslot
                @slot("link") {{ route('blog_category.create') }} @endslot
            @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Blog @endslot
                @slot("link") {{ route('blog.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Blog List @endslot
                @slot("link") {{ route('blog.index') }} @endslot
                @slot("count") {{\App\Blog::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent
            @component("component.nav-title") Product & Category Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Category @endslot
                @slot("link") {{ route('product_category.create') }} @endslot
            @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Product @endslot
                @slot("link") {{ route('product.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Product List @endslot
                @slot("link") {{ route('product.index') }} @endslot
                @slot("count") {{\App\Product::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Gallery Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Gallery @endslot
                @slot("link") {{ route('gallery.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Gallery List @endslot
                @slot("link") {{ route('gallery.index') }} @endslot
                @slot("count") {{\App\Gallery::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Team Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Team @endslot
                @slot("link") {{ route('team.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Team List @endslot
                @slot("link") {{ route('team.index') }} @endslot
                @slot("count") {{\App\Team::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Partner Management @endcomponent

            @component("component.nav-item")
                @slot("icon") <i class="feather-plus-circle"></i> @endslot
                @slot("name") Add Partner @endslot
                @slot("link") {{ route('partner.create') }} @endslot
            @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Partner List @endslot
                @slot("link") {{ route('partner.index') }} @endslot
                @slot("count") {{\App\Partner::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Contact Management @endcomponent

            @component("component.nav-item-count")
                @slot("icon") <i class="feather-list"></i> @endslot
                @slot("name") Contact List @endslot
                @slot("link") {{ route('contact.index') }} @endslot
                @slot("count") {{\App\Contact::count()}} @endslot
            @endcomponent

            @component('component.nav-spacer') @endcomponent

            @component("component.nav-title") Profile Management @endcomponent
            @component("component.nav-item")
                @slot("icon") <i class="feather-user"></i> @endslot
                @slot("name") Edit Profile @endslot
                @slot("link") {{ route('profile.edit') }} @endslot
            @endcomponent




        @component('component.nav-spacer') @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


@endauth
