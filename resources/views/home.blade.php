@extends('layouts.auth')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>{{Str::title(Auth::user()->role )}}'s panel</small>
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @if (Auth::user()->role == 'lecturer')
    <div class="row">
        <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body pull-up bg-primary bg-deathstar-white">
                <div class="flexbox">
                    <span class="ion ion-ios-person-outline font-size-50"></span>
                    <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->lecturer ? auth()->user()->lecturer->students() : []))}}</span>
                </div>
                <div class="text-right">Student</div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body pull-up bg-danger bg-deathstar-white">
                <div class="flexbox">
                    <span class="ion ion-ios-copy-outline font-size-50"></span>
                    <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->lecturer ? auth()->user()->lecturer->courses : []))}}</span>
                </div>
                <div class="text-right">Courses</div>
            </div>
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        
        <div class="col-xl-3 col-md-6 col-12">
            <div class="box box-body pull-up">
                <div class="flexbox">
                    <span class="ion ion-ios-paper-outline text-purple font-size-50"></span>
                    <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->composes))}}</span>
                </div>
                <div class="text-right">Article</div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
            <div class="box box-body pull-up">
                <div class="flexbox">
                <span class="ion ion-ios-briefcase-outline text-red font-size-50"></span>
                <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->materials))}}</span>
              </div>
              <div class="text-right">Materials</div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    @else
    <div class="row">
        <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body pull-up bg-primary bg-deathstar-white">
                <div class="flexbox">
                    <span class="ion ion-ios-person-outline font-size-50"></span>
                    
                    <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->my_lecturer()))}}</span>
                </div>
                <div class="text-right">Lecturer</div>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12 ">
            <div class="box box-body pull-up bg-danger bg-deathstar-white">
                <div class="flexbox">
                    <span class="ion ion-ios-copy-outline font-size-50"></span>
                    <span class="font-size-40 font-weight-200">{{number_format(count(auth()->user()->courses))}}</span>
                </div>
                <div class="text-right">Courses</div>
            </div>
        </div>
        <!-- /.col -->
        
        
        
    </div>
    @php
    $courses = [];
    foreach (auth()->user()->courses as $course) {
        $courses[] = $course->id;
    }
     @endphp
    @foreach (\App\Models\Compose::whereIn('course_id', $courses)->get() as $item)
        
    <div class="col-12">
        <div class="box">

          <div class="row no-gutters">
            <div class="col-md-8">
              <div class="box-body">
                <h4><a href="#">{{$item->title}}</a></h4>
                <p><span>{{$item->created_at->format('M d, Y')}}</span></p>

                <p>{!! Str::limit($item->body,200) !!}</p>

                <div class="flexbox align-items-center mt-3">
                  <a class="btn btn-info" href="{{route('compose.show',[$item->id])}}">Read more</a>

                
                </div>
              </div>
            </div>

            <div class="col-4 bg-img d-none d-md-block" style="background-image: url({{asset($item->attachment->path ?? "")}})"></div>
          </div>
        </div>
      </div>
    @endforeach
    @endif
</section>
    
    
    
    
    <!-- /.content -->
@endsection
