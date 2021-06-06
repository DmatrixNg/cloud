@extends('layouts.auth')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Post
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Lecture</a></li>
      <li class="breadcrumb-item active">Note</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="box box-hover-shadow">
			  <div class="box-header with-border">
				<h4 class="box-title">{{$post->title}}</h4>
			  </div>
              <div class="box-body">
                {!! $post->body !!}
              </div>
            </div>
          </div>

          <div class="col-md-10 col-12">
            <div class="box box-hover-shadow">
			  <div class="box-header with-border">
				<h4 class="box-title">Uploaded Files</h4>
			  </div>
              <div class="box-body">
                  @foreach ($post->attachments as $item)
                      
                  <a href="{{asset($item->path)}} "target="_blank" rel="noopener noreferrer">{{$item->name}}</a>
                  @endforeach
              </div>
            </div>
          </div>
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
@endsection
