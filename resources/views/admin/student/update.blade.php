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
                <form action="{{ url('add/student/post') }}" class="form" method="post">
                    @csrf
                    <h4>Student Information add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Name * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="{{ $student_name }}" placeholder="Enter student name">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Mobile * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="mobile" value="" placeholder="Enter mobile number">
                                </div>
                                @error('mobile')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Email * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="email" value="" placeholder="Enter email">
                                </div>
                                @error('email')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Image *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="file" class="form-control" name="image" value="">
                                </div>
                                @error('image')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Present Address * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="present_address" value=""  placeholder="Enter present address">
                                </div>
                                @error('present_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Permanent Address *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="permanent_address" value="" placeholder="Enter permanent address">
                                </div>
                                @error('permanent_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Class *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="current_class" value="">
                                </div>
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