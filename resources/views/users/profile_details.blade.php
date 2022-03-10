

@extends('layouts.users.app')

@section('content')
<style>
	/* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }
  .checked{
	  color:#ffd900;
  }

/* End of Star Rating */
</style>
    
</br>
</br>
</br>
</br>

<div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="wdt_100">
              <div class="prd_large_img"><span class="image_hover"><img src="{{asset($specialist->image)}}" alt="image" class="zoom_img_effect"></span></div>
              <div class="prd_detail_desc">
                <h3 class="black-color mar_btm18"> <span class="lytgreen-head">{{$specialist->name}}</span></h3>
                <p>Subject : {{$specialist->subject}} - ({{$specialist->categoty_name}})</p>
			         	<p>University Name : {{$specialist->university_name}} </p>
                <p>Degree : {{$specialist->degree}} </p>
                <p>Exparience : {{$specialist->experience}} </p>
                <p>Salary Per Month : {{$specialist->salary}} </p>
                <p>Email :{{$specialist->email}}</p>
                <p>Phone :{{$specialist->phone}}</p>
                <p> {!!$specialist->details!!}</p>
                
                <a href="{{ url('message/'.$specialist->id) }}" class="view-all hvr-bounce-to-right shop_add_cart add_cart_second_btn">Message</a>
              </div>
            </div>
          </div>
<!-- start review Show -->

 <!-- Project End-->
 <div class="client_bg pad_94_100 wdt_100">
      
    </div>
    <div class="subscribe_bg wdt_100">
      <div class="container">
        <h3 class="black-color mar_btm23">User Review <span class="lytgreen-head">Section</span></h3>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 subscribe_txt">
            <p>All Review show here </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="rating-css" >
            <h2 class="black-color mar_btm23"> Review here for <span class="lytgreen-head" style="color:orange;"> {{ $specialist->name }}</span></h2>
            @foreach($rating_details as $rat)
            <h2><b >Reviewer Name : <span style="color:orange;">{{$rat->name}}</span></b></h2>
            <h2><b >Comment: <span style="color:orange;">{{$rat->comment}}</span></b></h2>
						<div class="star-icon">
            <span style="color:black;"><b>Ratings  :  </b> </span>
						@for($i=1; $i<=$rat->review; $i++)

						<span><i class="fa fa-star checked" style="color:orange;"></i></span>
						@endfor
					
						<span style="color:orange;">({{$rat->review}}review)</span>
				    </div>
            <hr>
             @endforeach
			   	</div>
          
				
				  
          
          </div>
        </div>
      </div>
    </div>
<!-- end review  -->
	<!-- Content_Section Start-->
   <div class="wdt_100 pad_94_100">
      <div class="container">
        <h3 class="black-color mar_btm1">Give The <span class="lytgreen-head">Review Section</span></h3>
        
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  <form class="add-contact-form" method="post" action="{{ route('store.review') }}" enctype="multipart/form-data">    
               @csrf
              <div class="messages"></div>
              <div class="row">
                
                <div class="col-md-12">
				<div id="review" style="text-align:center;">
					@if(Auth::user())
						<h2><strong>{{  Auth::user()->name }}</strong></h2>
						<h4>{{Auth::user()->email}}</h4>
					@else
						<h2 ><strong>At Frist Login Your Account</strong></h2>
						<h4 class=""><a href="{{url('login')}}">Click Login Here</a></h4>
					@endif
					</div>
                </div>
				
			  <div class="col-md-12">
			    <h6 id="review-title" style="text-align:center;">Write a review here for {{ $specialist->name }}.</h6>
			  </div>
			  <br/><br/><br/><br/><br/><br/>
              @guest
			 
			  <div class="col-md-12">
			    <h2 id="review-title" style="text-align:center;"> Please Login Your account !! then show the review section ,thank you.</h2>
			  </div>
			  @else
              <div class="row">
				<div class="rating-css">
						<div class="star-icon">
							<input type="radio" value="1" name="teacher_rating" checked id="rating1">
							<label for="rating1" class="fa fa-star"></label>
							<input type="radio" value="2" name="teacher_rating" id="rating2">
							<label for="rating2" class="fa fa-star"></label>
							<input type="radio" value="3" name="teacher_rating" id="rating3">
							<label for="rating3" class="fa fa-star"></label>
							<input type="radio" value="4" name="teacher_rating" id="rating4">
							<label for="rating4" class="fa fa-star"></label>
							<input type="radio" value="5" name="teacher_rating" id="rating5">
							<label for="rating5" class="fa fa-star"></label>
				       </div>
				</div>
              </div>
			  <input type="hidden"  name="teacher_id" value="{{ $specialist->id }}" >
			<div class="row" >
				<div class="col-md-12" >
					<div class="form-group" style="width: 400px; margin-left: 400px;height: 100px;">
					<input id="subject" type="text" name="comment" placeholder="Any Possitave Comment" required="" class="form-control" >
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-12" >
					<div class="form-group" style=" text-align:center;">
					<button style="text-align:center;" type="submit" value="submit now" class="btn btn-success">Review Submit</button>
					</div>
				</div>
			</div>
			@endguest

			  
        </div>
			
						
			
					
		</form>
          </div>
         
         
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    
    
@endsection