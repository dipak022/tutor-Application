@php
$img=DB::table('slider')->first();
$specialist=DB::table('users')
        ->join('category','users.specialist_id','category.id')
        ->select('users.*','category.categoty_name')
        ->where('users.roll_id',3)->where('users.user_status',1)
        ->orderBy('users.id','desc')->limit(100)
        ->get();
@endphp


@extends('layouts.users.app')

@section('content')
    
</br>
</br>
</br>
</br>

    <!-- Content_Section Start-->
    <div class="pad_84_70 wdt_100">
      <div class="container">
        <div class="row">
          <div class="filter-section">
            <div class="col-sm-12 col-xs-12">
              <div class="filter-container isotopeFilters">
                <ul class="list-inline filter">
                  <li class="active"><a></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <!-- /nimble-portfolio-filter-->
          <div class="portfolio-section port-col">
            <div class="isotopeContainer">
            <div class="col-lg-12 col-md-12 col-sm-12  wdt_mar_t">
            <h3 class="black-color mar_btm40">All Teacher  <span class="lytgreen-head">Available Here</span></h3>
            <ul class="shop_prd_list">
              @foreach($specialist as $list)
              <li><span class="prd_img"><a href="#" class="image_hover"><img src="{{asset($list->image)}}" alt="image" class="zoom_img_effect"></a></span>
                <h6>{{$list->name}} ({{$list->categoty_name}})</h6><span class="prd_star_img"></span><a href="{{ url('profile/details/'.$list->id) }}" class="view-all hvr-bounce-to-right shop_add_cart">Profile Details</a> <a href="{{ url('message/'.$list->id) }}" class="view-all hvr-bounce-to-right shop_add_cart">Message</a>
              </li>
             @endforeach
            </ul>
            <div aria-label="Page navigation">
              <ul class="pagination">
                <!-- <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>-->
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#" aria-label="Next"><span aria-hidden="true"><img src="{{asset('users/')}}/images/blog_page/next_icon.png"></span></a></li>
              </ul>
            </div>
          </div>
          </div>
          <!-- /nimble-portfolio-->
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    
    
@endsection