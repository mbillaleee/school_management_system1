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
                @if(session('delete_status'))
                <div class="alert alert-danger">
                    {{ session('delete_status') }}
                </div>
                @endif
                <form action="{{ url('add/student/post') }}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Student Information add</h4>
                    <div class="row">
                         <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Name </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="" placeholder="Enter student name">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Mobile </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="mobile" value="" placeholder="Enter mobile number">
                                </div>
                                @error('mobile')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Email </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="email" value="" placeholder="Enter email">
                                </div>
                                @error('email')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Image </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="file" class="form-control" name="image" value="">
                                </div>
                                @error('image')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Present Address </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="present_address" value=""  placeholder="Enter present address">
                                </div>
                                @error('present_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Permanent Address </label><br>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="permanent_address" value="" placeholder="Enter permanent address">
                                </div>
                                @error('permanent_address')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label class="form-label">Class</label><br>
                                <select class="form-control" name="current_class" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentclasses as $studentclass)
                                        <option value="{{ $studentclass->class_name }}">{{ $studentclass->class_name }}</option>
                                    @endforeach
                                </select>
                                 @error('current_class')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Add student</button>
                </form>
            </div>
        </div>
        <div class="card mt-5">
            <div>
                <div class="card-header">
                <h3>Student</h3>
            </div>
            <div class="card-body">
                <h4>Student Information show</h4>
                <div class="row">
                    <div class="col-lg-10">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Present Adress</th>
                                    <th scope="col">Permanent Adress</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@forelse($students as $student)
                            	<tr>
                            		<td> {{ $loop->index + 1 }} </td>
                            		<td>{{ $student->name }}</td>
                            		<td>{{ $student->mobile }}</td>
                            		<td>{{ $student->email }}</td>
                            		<td>{{ $student->present_address }}</td>
                            		<td>{{ $student->permanent_address }}</td>
                            		<td>{{ $student->current_class }}</td>
                            		<td>
                            			<img src="{{ asset('uploads/students')}}/{{ $student->image }}" width="50" alt="Image not found">
                            		</td>
                            		<td>
                            			<div class="btn-group" role="group">
                            				<a type="button" href="{{ url('update/student') }}/{{ $student->id }}" class="btn btn-info text-white">Update</a>
                            				<a type="button" href="{{ url('delete/student') }}/{{ $student->id }}" class="btn btn-danger text-white">Delete</a>
                            			</div>
                            		</td>
                            	</tr>
                            	@empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger ">No data to show</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection