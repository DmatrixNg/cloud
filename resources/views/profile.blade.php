@extends('layouts.auth')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Members Profile
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">{{Str::title(Auth::user()->role )}}</a></li>
      <li class="breadcrumb-item active">{{Str::title(Auth::user()->role )}}'s Profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xl-4 col-lg-5">

        <!-- Profile Image -->
        <div class="box bg-yellow bg-deathstar-dark">
          <div class="box-body box-profile">

            <h2 class="profile-username text-center mb-0">{{auth()->user()->name}}</h2>

            <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i>{{auth()->user()->email}}</h4>
            <p class="text-center mt-0">{{auth()->user()->lecturer->about ?? ""}}</p>



          </div>
          <!-- /.box-body -->
        </div>

       @foreach (auth()->user()->lecturer ? auth()->user()->lecturer->courses : [] as $course)

       <div class="box bg-info bg-deathstar-dark">
           <div class="box-body box-profile">

             <h2 class="profile-username text-center mb-0">{{$course->course}}</h2>

             <h4 class="text-center mt-0"><i class="fa fa-graduation-cap mr-10"></i>{{$course->course_code}}</h4>
             <p class="text-center mt-0">{{$course->level}}</p>



           </div>
           <!-- /.box-body -->
         </div>
       @endforeach
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-xl-8 col-lg-7">
        <div class="box box-solid bg-black">
          <div class="box-header with-border">
            <h3 class="box-title">Personal details</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <form action="{{route('profile.update')}}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name='name' value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email Adress</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}" placeholder="{{auth()->user()->email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="about" value="" placeholder="About {{auth()->user()->name}}">{{auth()->user()->lecturer->about ?? ""}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-yellow">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.row -->
        </div>
        
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-solid bg-black">
          <div class="box-header with-border">
            <h3 class="box-title">Course Registeration</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <form action="{{route('course.store')}}" method="post">
                  @csrf
                  <input type="hidden" value="{{auth()->user()->lecturer->id ?? null}}" name="lecturer_id">
            <div class="row">
                    <div class="col-12">
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Level</label>
                          <div class="col-sm-10">
                            <input class="form-control @error('level') is-invalid @enderror" name="level" type="text" placeholder="e.g 400">
                            @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Course</label>
                          <div class="col-sm-10">
                            <input class="form-control @error('course') is-invalid @enderror" name="course" type="text" placeholder="e.g Computer Science">
                            @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Course Code</label>
                          <div class="col-sm-10">
                            <input class="form-control @error('course_code') is-invalid @enderror" type="text" name="course_code" placeholder="e.g CSC 403">
                            @error('course_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-yellow">Add Course</button>
                          </div>
                        </div>

                    </div>
                </form>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.box -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
@endsection
