@extends("app")

@section('head_title', 'My Courses | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>My Courses</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tp-breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">My Courses</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      
      @include("_particles.user_sidebar")
 @if(Auth::user()->user_role=='University user')
     <div class="col-md-9 col-sm-9 content-right bg-gry">
        <div class="row">
            <div class="bg-whit clearfix">
          <div class="col-md-12" id="aboutus">
            <h1>My Courses</h1> 

            @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
          @endif

        <div class="well-box">
          
          <table class="table table-bordered mb0">
          <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($listings as $i => $listing)
          <tr>
            <th scope="row">{{$i+1}}</th>
            <td>{{$listing->title}}</td>
            <td>
              @if($listing->status=='0')
                 <span class="label label-danger">Pending</span>
              @else
                  <span class="label label-success">Publish</span>
              @endif
            </td>
            <td>
              <a href="{{URL::to('edit_front_course/'.$listing->id)}}" class="btn btn-info">Edit</a> 
              <a href="{{URL::to('delete_front_course/'.$listing->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to commit delete and go back?')">Delete</a>
              </td>
          </tr>
          @endforeach
      
          
           
                  
          </tbody>
        </table>
        
        <div class="span12 pagination-center">
          <div class="dataTables_paginate paging_bootstrap pagination">
           
            @include('_particles.pagination', ['paginator' => $listings])
           
          </div>
        </div>
        <div class="clearfix"></div>
        </div>
          </div>
            </div>
        </div>
      </div>
 @else
 <script>window.location='/dashboard';</script>
 @endif
    </div>
  </div>
</div>
@endsection