<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          @php
              $brands = App\Models\Brand::orderBy('id','desc')->get();
          @endphp
          @foreach ($brands as $item)
          <div class="item m-t-15">
         <a href="#" class="image">
        <img data-echo="{{ asset($item->brand_image) }}" src="{{ asset($item->brand_image) }}" alt="" style="width: 95px; height:80px;"> </a>
       </div>
       @endforeach

        <!--/.item-->
      </div>
      <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

  </div>
