@php
    $tags_fr = App\Models\Product::groupBy('product_tags_fr')->select('product_tags_fr')->get();

    $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
@endphp
<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list">
        @if(session()->get('language') == 'english')
        @foreach ($tags_en as $tags)
        <a class="item" title="{{ $tags->product_tags_en }}" href="{{ url('product/tags/'.$tags->product_tags_en) }}">{{str_replace(',',' ',$tags->product_tags_en) }}</a>
        @endforeach
        @else
        @foreach ($tags_fr as $tags)
        <a class="item" title="{{ $tags->product_tags_fr }}" href="{{ url('product/tags/'.$tags->product_tags_fr) }}">{{ str_replace(',',' ',$tags->product_tags_fr) }}</a>
        @endforeach
        @endif
    </div>
      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
