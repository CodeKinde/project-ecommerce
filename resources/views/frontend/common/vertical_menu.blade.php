<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @php
            $categories = App\Models\Category::orderBy('id','asc')->get();
        @endphp
        @foreach ($categories as $category)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $category->category_icon }}" aria-hidden="true"></i>
            @if (session()->get('language') == 'english')
            {{ $category->category_name_en }}
            @else
            {{ $category->category_name_fr }}
            @endif </a>
             <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
             @php
                $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','asc')->get();
            @endphp
                <!-- /.col -->
                @foreach ($subcategories as $subcategory)
                <div class="col-sm-12 col-md-3">
                    <ul class="links list-unstyled">
                      <li><a href="#">
                        <h2 class="title">
                       @if (session()->get('language') == 'english')
                        {{ $subcategory->subcategory_name_en }}
                        @else
                        {{ $subcategory->subcategory_name_fr }}
                        @endif </h2></a></li>
                    </ul>
                @php
                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('id','asc')->get();
                @endphp
                    @foreach ($subsubcategories as $subsubcategory)
                    <ul class="links list-unstyled">
                        <li><a href="#">
                         @if (session()->get('language') == 'english')
                          {{ $subsubcategory->subsubcategory_name_en }}
                          @else
                          {{ $subsubcategory->subsubcategory_name_fr }}
                          @endif </a></li>
                      </ul>
                      @endforeach<!-- end foreach sub subcategory -->
                  </div>
                @endforeach<!-- end foreach subcategory -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          </li>
          @endforeach<!-- end foreach category -->

        </li>
        <!-- /.menu-item -->



      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
