@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            
            <div class="card-header">
               
            </div>
            <div class="card-body">
            	
            	@if(session('success_message'))
            	<div class="alert alert-success">
            		{{ session('success_message') }}
            	</div>
            	@endif
                <form action="{{ url('update/student/post') }}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Student Information add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Name  </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <input type="text" class="form-control" name="name" value="{{ $student_name }}" placeholder="Enter student name">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Mobile  </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="mobile" value="{{ $student_mobile }}" placeholder="Enter mobile number">
                                </div>
                                @error('mobile')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Email </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="email" value="{{ $student_email }}" placeholder="Enter email">
                                </div>
                                @error('email')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>




                            <div class="form-group">
                                <label for="">Image </label><br>

                                <div class="form-check-inline col-lg-10">
                                    <img src="{{ asset('uploads/students')}}/{{ $student_image }}" alt="No image found">
                                </div>
                                @error('image')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">New Image </label><br>

                                <div class="form-check-inline col-lg-10">
                                    <input type="file" class="form-control" name="new_image">
                                </div>
                                @error('image')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Present Address </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="present_address" value="{{ $student_present_address }}"  placeholder="Enter present address">
                                </div>
                                @error('present_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Permanent Address </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="permanent_address" value="{{ $student_permanent_address }}" placeholder="Enter permanent address">
                                </div>
                                @error('permanent_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label class="form-label">Class</label><br>
                                <select class="form-control" name="student_current_class" id="" value="{{ $student_current_class }}">
                                    <option value="">--select one--</option>
                                    @foreach($studentclasses as $studentclass)
                                        <option value="{{ $studentclass->student_current_class }}">{{ $studentclass->student_current_class }}</option>
                                    @endforeach
                                </select>
                                 @error('current_class')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Update student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection