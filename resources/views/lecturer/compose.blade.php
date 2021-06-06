@extends('layouts.auth')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Compose
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Compose</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row ">
      
        <div class="col-lg-4 col-12">
            <div class="box" style="max-height: 700px;
            min-height: 43px;
            overflow: scroll;">
				<div class="box-header with-border">
              		<h5 class="box-title">Recent posts</h5>
				</div>
				<div class="box-body p-0">
				  <div class="media-list media-list-hover media-list-divided">
                      @foreach (auth()->user()->composes as $compose)
                          
                      <span class="media media-single" >
                          <a href="{{route('compose.show',[$compose->id])}}">
                        <img class="w-80" src="{{asset($compose->attachment->path)}}" alt="...">
                          </a>
                          
                          <div class="media-body">
                            <a href="{{route('compose.show',[$compose->id])}}">
                          <h6>{{$compose->title}}</h6>
                          <small class="text-fader">{{$compose->course->course_code}}</small>
                        </a>
                        </div>
                        <a href="composer/delete/{{$compose->id}}"> Delete</a>
                    </span>
                      @endforeach
		
				  </div>
				</div>
             
            </div>
          </div>
      <div class="col-lg-8 col-12">
          <form action="{{route('compose.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box box-solid bg-black">
                <div class="box-header with-border">
                    <h3 class="box-title">Compose </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <select class="form-control select2 w-p100" multiple="multiple" name="courses[]" data-placeholder="Select courses">
                            @foreach (auth()->user()->lecturer ? auth()->user()->lecturer->courses : [] as $course)
                            
                            <option value="{{$course->id}}">{{$course->course_code}}</option>
                            
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name='title' placeholder="Title:">
                    </div>
                    <div class="form-group">
                      <textarea id="compose-textarea" name="body" class="form-control h-300">
                          <p>Your Message Here....</p>
                        </textarea>
                    </div>
                    <div class="form-group">
                  <div class="btn btn-info btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment">
                    </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>
            </div>
            <!-- /.box-footer -->
        </div>
    </form>
    <!-- /. box -->
    
    <!-- /.col -->
</div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection
