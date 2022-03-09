@php
$img=DB::table('slider')->first();


$specialist=DB::table('users')
        ->join('category','users.specialist_id','category.id')
        ->select('users.*','category.categoty_name')
        ->where('users.roll_id',3)->where('users.user_status',1)
        ->orderBy('users.id','desc')->limit(6)
        ->get();

$special=DB::table('category')->get();
@endphp
@extends('layouts.users.app')

@section('content')
    
    <!-- BannerCol Start-->
    <section id="home" >
          <div class="row">
         
               <img style="width: 100%; height:900px;" src="{{asset($img->slider_1)}}" alt="">
                   
                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                              <div class="container">
                                        
                              </div>
                         </div>
                     </div>
              
              </div>
          </div>
     </section>
    <!-- BannerCol End-->
    @php  
     $category=DB::table('category')->get();
    @endphp

    <div class="subscribe_bg wdt_100">
      <div class="container">
        <h3 class="black-color mar_btm23">Find Out  <span class="lytgreen-head">Teacher For Search</span></h3>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 subscribe_txt">
            <p>Finding  Teacher for version wise search and search teacher name, Thank You . </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="subscribe_search">
              <form action="{{ route('search.teacher') }}"method="post" class="navbar-form navbar-left">
                   @csrf
              <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                
                                <select class="form-control" name="names">
                                <option selected disabled>Categories</option>
                                  @foreach($special as $list)
                                    <option value="{{ $list->id }}"> {{$list->categoty_name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                            </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


                  
                
    <!-- Services Start
    <div class="pad_94_70 why_choose_col wdt_100">
      <div class="container">
        <h3 class="black-color mar_btm15">Find Out  <span class="green-head">Teacher For Search</span></h3>
        <br/>
        <br/>
        
        <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
            <form action="{{ route('search.teacher') }}"method="post">
                   @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                
                                    <select class="form-control" name="names">
                                    <option selected disabled>All Categories</option>
                                      @foreach($special as $list)
                                        <option value="{{ $list->id }}"> {{$list->categoty_name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
      </div>
    </div>
     Services End-->

     <!--start search -->
    



     <br/>
     <br/>
     <div class="col-lg-12 col-md-12 col-sm-12  wdt_mar_t" >
     <br/>
     <br/><br/> <br/><br/><br/><br/>
           <div class="container" style="text-align:center;">
            <h3 class="black-color mar_btm40">All <span class="lytgreen-head" >Teacher Available</span> Here</h3>
            <hr>
            </div>
            <ul class="shop_prd_list">
              @foreach($specialist as $lists)
              <li><span class="prd_img"><a href="#" class="image_hover"><img src="{{asset($lists->image)}}" alt="image" class="zoom_img_effect"></a></span>
                <h6>{{$lists->name}} ({{$lists->categoty_name}})</h6><h6 class="">Amount : {{$lists->salary}} TK</h6><span class="prd_star_img"></span><a href="{{ url('profile/details/'.$lists->id) }}" class="view-all hvr-bounce-to-right shop_add_cart">Profile Details</a> <a href="{{ url('message/'.$lists->id) }}" class="view-all hvr-bounce-to-right shop_add_cart">Message</a>
                
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


    <!--end search-->

  
  
    <!-- Project Start-->

    <!-- Galary Start Start
    <div class="project_Gal wdt_100 pad_94_0">
      <div class="container">
        <h3 class="mar_btm60">Aggricaltural <span class="green-head">Gallery</span></h3>
      </div>
      <div id="photo_gallery" data-ride="carousel" class="carousel slide five_shows_one_move variant_four_project">
        <div class="controls pull-right gallery_controls"><a href="#photo_gallery" data-slide="prev" class="left fa fa-chevron-left"></a><a href="#photo_gallery" data-slide="next" class="right fa fa-chevron-right"></a></div>
        
        <div class="row">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="project_full_col"><span class="default_hidden"><img src="{{asset($img->slider_1)}}" alt="image" class="zoom_img_effect img-responsive"></span>
                  
                </div>
              </div>
            </div>
            
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="project_full_col"><span class="default_hidden"><img src="{{asset($img->slider_2)}}" alt="image" class="zoom_img_effect img-responsive"></span>
                 
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="project_full_col"><span class="default_hidden"><img src="{{asset($img->slider_3)}}" alt="image" class="zoom_img_effect img-responsive"></span>
                  
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="project_full_col"><span class="default_hidden"><img src="{{asset($img->slider_4)}}" alt="image" class="zoom_img_effect img-responsive"></span>
                  
                </div>
              </div>
            </div>
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="project_full_col"><span class="default_hidden"><img src="{{asset($img->slider_5)}}" alt="image" class="zoom_img_effect img-responsive"></span>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 Galary End Start-->
    <!-- Project End-->
    <div class="client_bg pad_94_100 wdt_100">
      <div class="container">
        <h3 class="black-color mar_btm30">Get In <span class="lytgreen-head">Touch</span></h3>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 get_touch_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.7399040776495!2d-6.261147484122739!3d53.34791197997939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1%20%20%20%20%20%20%20%20!3m3!3m2!1sen!2sus!4v1462581622087" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 get_touch_form">
            <form id="contact-form" method="post">
              <div class="messages"></div>
              <div class="form-group">
                <input id="form_name" type="text" name="name" value="Name" onblur="if(value=='') value = 'Name'" onfocus="if(value=='Name') value = ''" class="form-control fnt_diff">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <input id="form_lastname" type="text" name="surname" value="Email" onblur="if(value=='') value = 'Email'" onfocus="if(value=='Email') value = ''" class="form-control fnt_diff">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <input id="form_email" type="email" name="email" value="Subject" onblur="if(value=='') value = 'Subject'" onfocus="if(value=='Subject') value = ''" class="form-control fnt_diff">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <textarea id="form_mess1" name="message" placeholder="Message" rows="4" class="form-control fnt_diff"></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <input type="submit" value="submit now" class="btn submit_now">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="subscribe_bg wdt_100">
      <div class="container">
        <h3 class="black-color mar_btm23">Subscribe Our <span class="lytgreen-head">Newsletter</span></h3>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 subscribe_txt">
            <p>Totam rem aperiam, eaque ipsa quae ab illo invent ore verit atis et quasi architecto beatae vitae dict eaque ipsa quae ab.Teritatis et quasi architecto.</p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="subscribe_search">
              <form role="search" class="navbar-form navbar-left">
                <input type="text" value="Enter your email address" onblur="if(value=='') value = 'Enter your email address'" onfocus="if(value=='Enter your email address') value = ''" class="form-control">
                <button type="submit" class="btn btn-default">submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection