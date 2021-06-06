@extends('layouts.auth')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Add Courses
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Courses</a></li>
      <li class="breadcrumb-item active">Add Courses</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-12">
             <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Add courses</h3>

                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <form action="{{route('course.student.store')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Course</label>

                                        <select class="form-control select2 w-p100" multiple="multiple" name="courses[]" data-placeholder="Select courses">
                                            @foreach ($courses as $course)
                                            @if (!in_array($course->id,$studentCourse))

                                            <option value="{{$course->id}}">{{$course->course_code}}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                    </div>

                                 <button type="submit" class="btn btn-danger">Add Course</button>

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>

    </section>
@endsection

