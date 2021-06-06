@extends('layouts.auth')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Lecturers
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Lecturers</a></li>
      <li class="breadcrumb-item active">List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
          
          @foreach ($lecturers as $lecturer)

          <div class="col-6 col-md-6 col-lg-4 col-xl-3">
            <div class="box box-body pull-up">
              <div class="flexbox align-items-center">
                <label class="toggler toggler-yellow">
                  <input type="checkbox" checked>
                  <i class="fa fa-star"></i>
                </label>
                <div class="dropdown">
                  <a data-toggle="dropdown" href="#" aria-expanded="false"><i class="ion-android-more-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{url('lecturer/remove/'.$lecturer->id)}}"><i class="fa fa-fw fa-remove"></i> Remove</a>
                  </div>
                </div>
              </div>
              <div class="pt-3">
                <h3 class="m-0"><a href="#">{{$lecturer->user->name}}</a></h3>
                <span>Lecturer</span>
                <div class="bt-1 py-10 mt-10">
                  <p class="mb-0">{{$lecturer->about}}</p>
                </div>
                <div class="mt-1">
                    @foreach ($lecturer->courses ?? [] as $course)

                    <span class="badge-primary rounded p-1">{{$course->course_code}}</span>
                    @endforeach

                  </div>
              </div>
            </div>
          </div>
          @endforeach


      </div>
      
  </section>
  <!-- /.content -->
@endsection
