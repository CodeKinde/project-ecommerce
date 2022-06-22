@extends('frontend.main_master')
@section('content')
@section('title')
blog details
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>
                    @if (session()->get('language') == 'english')
                    {{ $details->title_en }}
                    @else
                    {{ $details->title_fr }}
                    @endif</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($details->post_image) }}" alt="">
	<h1>
      @if (session()->get('language') == 'english')
      {{ $details->title_en }}
      @else
      {{ $details->title_fr }}
      @endif
    </h1>
	<span class="author">John Doe</span>
	<span class="review">7 Comments</span>
	<span class="date-time">18/06/2016 11.30AM</span>
	<p>
      @if (session()->get('language') == 'english')
        {{$details->post_details_en}}
      @else
        {{$details->post_details_fr}}
      @endif
    </p>
	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
<div class="blog-post-author-details wow fadeInUp">
	<div class="row">
		<div class="col-md-2">
			<img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10">
			<h4>John Doe</h4>
			<div class="btn-group author-social-network pull-right">
				<span>Follow me on</span>
			    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
			    	<i class="twitter-icon fa fa-twitter"></i>
			    	<span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
			    	<li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>
			    	<li><a href=""><i class="icon fa fa-pinterest"></i>Pinterst</a></li>
			    	<li><a href=""><i class="icon fa fa-rss"></i>RSS</a></li>
			    </ul>
			</div>
			<span class="author-job">Web Designer</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</div>
					<div class="blog-review wow fadeInUp">
	<div class="row">
		<div class="col-md-12">
			<h3 class="title-review-comments">16 comments</h3>
		</div>
		<div class="col-md-2 col-sm-2">
			<img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
			<div class="blog-comments inner-bottom-xs">
				<h4>Jone doe</h4>
				<span class="review-action pull-right">
					03 Day ago &sol;
					<a href=""> Repost</a> &sol;
					<a href=""> Reply</a>
				</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
		</div>

	  </div>
   </div>
</div>
<div class="col-md-3 sidebar">

<div class="sidebar-module-container">

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
<!-- ==================================CATEGORY============================= -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
            @php
                $blogcategory = App\Models\BlogPostCategory::latest()->get();
            @endphp
        @foreach ($blogcategory as $category)
        <ul class="list-group">
            <a href="{{url('blog/post/category',$category->id)}}">
                <li class="list-group-item">
                    @if (session()->get('language') == 'english')
                    {{$category->blog_category_name_en}}
                    @else
                    {{$category->blog_category_name_fr}}
                    @endif
                </li>
            </a>
        </ul>
        @endforeach
	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ====================== CATEGORY : END ====================== -->
<!-- ====================== PRODUCT TAGS ================== -->
<@include('frontend.common.product_tags')
<!-- ============== PRODUCT TAGS : END ============================ -->
</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
