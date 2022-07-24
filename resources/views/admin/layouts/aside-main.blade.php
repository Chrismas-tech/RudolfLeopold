<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('website.home')}}" target="_blank">
                <i class="bi bi-eye-fill"></i>
                <span>Go to your Website</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() !== 'admin.dashboard' ? 'collapsed' : ''}}" href=" {{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() !== 'admin.profile' ? 'collapsed' : ''}}" href=" {{route('admin.profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ 
                Route::current()->getName() !== 'products.all' && 
                Route::current()->getName() !== 'product-material.add' &&
                Route::current()->getName() !== 'product-digital.add' &&
                Route::current()->getName() !== 'product.add' &&
                Route::current()->getName() !== 'reviews.all' &&
                Route::current()->getName() !== 'options.all'
                ? 'collapsed' : ''
                }}" data-bs-target="#components-nav-1" data-bs-toggle="collapse" href="#">
                <i class="bi bi-currency-dollar"></i><span>E-Commerce</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>


            <ul id="components-nav-1" class="nav-content collapse 
            {{
                Route::current()->getName() == 'categories.all' || 
                Route::current()->getName() == 'products.all' || 
                Route::current()->getName() == 'product-material.add' ||
                Route::current()->getName() == 'product-digital.add' ||
                Route::current()->getName() == 'product.add' ||
                Route::current()->getName() == 'options.all' ||
                Route::current()->getName() == 'reviews.all'
                ? 'show' : ''
            }}" data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{route('categories.all')}}" class="{{ Route::current()->getName() == 'categories.all' ? 'active' : ''}}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Category Management</span>
                    </a>
                </li>


                <li>
                    <a href="{{route('products.all')}}" class="{{ Route::current()->getName() == 'products.all' ? 'active' : ''}}">
                        <i class="bi bi-inboxes-fill"></i><span>All Products
                            @if(Helpers::nb_products_database())
                            ({{Helpers::nb_products_database()}})
                            @endif
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('product-material.add')}}" class="{{ Route::current()->getName() == 'product-material.add' ? 'active' : ''}}">
                        <i class="bi bi-hammer"></i><span>Create Material Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('product-digital.add')}}" class="{{ Route::current()->getName() == 'product-digital.add' ? 'active' : ''}}">
                        <i class="bi bi-hammer"></i><span>Create Digital Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('options.all')}}" class="{{ Route::current()->getName() == 'options.all' ? 'active' : ''}}">
                        <i class="bi bi-card-list"></i><span>Product Options</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('reviews.all')}}" class="{{ Route::current()->getName() == 'reviews.all' ? 'active' : ''}}">
                        <i class="bi bi-star"></i><span>Product Reviews</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ 
                Route::current()->getName() !== 'youtube-videos.all' && 
                Route::current()->getName() !== 'photos.all' && 
                Route::current()->getName() !== 'tracks.all'
                ? 'collapsed' : ''
                }}" data-bs-target="#components-nav-2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-house-fill"></i><span>Website Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>


            <ul id="components-nav-2" class="nav-content collapse 
            {{
                Route::current()->getName() == 'youtube-videos.all' || 
                Route::current()->getName() == 'photos.all' || 
                Route::current()->getName() == 'tracks.all'
                ? 'show' : ''
            }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('photos.all')}}" class="{{ Route::current()->getName() == 'photos.all' ? 'active' : ''}}">
                        <i class="bi bi-images"></i><span>Album Photo</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('youtube-videos.all')}}" class="{{ Route::current()->getName() == 'youtube-videos.all' ? 'active' : ''}}">
                        <i class="bi bi-youtube"></i>
                        <span>Youtube Videos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('tracks.all')}}" class="{{ Route::current()->getName() == 'tracks.all' ? 'active' : ''}}">
                        <i class="bi bi-music-player-fill"></i><span>Music Player</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <form method="POST" action="{{route('admin.logout')}}">
                @csrf
                <a class="nav-link collapsed pointer" onclick="event.preventDefault();
                 this.closest('form').submit();">
                    <i class="bi bi-power"></i>
                    <span>Log Out</span>
                </a>
            </form>
        </li>
    </ul>
</aside>
