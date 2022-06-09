@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Ecommerce</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li>
          <a href="{{ url("admin/dashboard")}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'brand.view') ? 'active' : '' }}">
            <a href="{{ route('brand.view') }}"><i class="ti-more"></i>Brands</a></li>
          </ul>
        </li>

        <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="package"></i>
              <span>Toutes Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'category.view') ? 'active' : '' }}">
              <a href="{{ route('category.view') }}"><i class="ti-more"></i>Categorie</a></li>

              <li class="{{ ($route == 'subcategory.view') ? 'active' : '' }}">
              <a href="{{ route('subcategory.view') }}"><i class="ti-more"></i>Sub Categorie</a></li>

               <li class="{{ ($route == 'sub-subcategory.view') ? 'active' : '' }}">
                <a href="{{ route('sub-subcategory.view') }}"><i class="ti-more"></i>Sub Sub Categorie</a></li>

            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Produits</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'product.view') ? 'active' : '' }}">
              <a href="{{ route('product.view') }}"><i class="ti-more"></i>Produit</a></li>
            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/slider') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="inbox"></i>
              <span>Sliders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'slider.view') ? 'active' : '' }}">
              <a href="{{ route('slider.view') }}"><i class="ti-more"></i>Slider</a></li>

            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/coupon') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="inbox"></i>
              <span>Coupons</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'coupon.view') ? 'active' : '' }}">
              <a href="{{ route('coupon.view') }}"><i class="ti-more"></i>Coupons</a></li>

            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/coupon') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="inbox"></i>
              <span>Zone d'expédition</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'division.view') ? 'active' : '' }}">
              <a href="{{ route('division.view') }}"><i class="ti-more"></i>Division</a></li>

              <li class="{{ ($route == 'district.view') ? 'active' : '' }}">
                <a href="{{ route('district.view') }}"><i class="ti-more"></i>District</a></li>

            <li class="{{ ($route == 'state.view') ? 'active' : '' }}">
                <a href="{{ route('state.view') }}"><i class="ti-more"></i>State</a></li>


            </ul>
          </li>


        <li class="header nav-small-cap">User Interface</li>


		<li class="treeview">
          <a href="#">
            <i data-feather="server"></i>
			<span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
          </ul>
        </li>

      </ul>
    </section>

  </aside>
