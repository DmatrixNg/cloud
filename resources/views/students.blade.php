@extends('layouts.auth')

@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>
      Members List
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Student</a></li>
      <li class="breadcrumb-item active">Student List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="box">
          <div class="box-body">
              <div class="table-responsive">
                <table id="example5" class="table table-hover">
                  <thead class="d-none">
                      <tr>
                         
                          <th>&nbsp;</th>
                          <th>&nbsp;</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach (auth()->user()->lecturer ? auth()->user()->lecturer->students() : [] as $student)
                

                      <tr>
                          <td class="w-20"><i class="fa fa-star text-yellow pt-15"></i></td>

                          <td class="w-300">
                              <p class="mb-0">
                                <a href="#"><strong>{{ $student->name }}</strong></a>
                                <small class="sidetitle">{{ $student->email }}</small>
                              </p>
                              <p class="mb-0">Student</p>
                          </td>

                      </tr>
                      @endforeach



                  </tbody>
                </table>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
      </div>
  </section>
  <!-- /.content -->
@endsection
