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
                <form action="{{ url('add/mark/post') }}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Student Information add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <select class="form-control" name="name" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentnames as $studentname)
                                        <option value="{{ $studentname->name }}">{{ $studentname->name }}</option>
                                    @endforeach
                                </select>
                                 @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label class="form-label">Class</label>
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

                            <div class="form-group">
                                <label class="form-label">Subject</label>
                                <select class="form-control" name="subject_name" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentsubjects as $studentsubject)
                                        <option value="{{ $studentsubject->subject_name }}">{{ $studentsubject->subject_name }}</option>
                                    @endforeach
                                </select>
                                 @error('current_class')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="">Mark * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="mark" value="" placeholder="Enter mark">
                                </div>
                                @error('mark')
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject </th>
                                    <th scope="col">Mark </th>
                                    <th scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	
                            	<tr>
                            		
                            		<td>{{ $students }}</td>
                            		<td></td>
                            		<td></td>
                            		
                            		<td>
                            			<div class="btn-group" role="group">
                            				
                            			</div>
                            		</td>
                            	</tr>
                            	
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