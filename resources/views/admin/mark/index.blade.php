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
                         <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="form-label">Name</label><br>
                                <select class="form-control" name="student_id" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentnames as $studentname)
                                        <option value="{{ $studentname->id }}">{{ $studentname->name }}</option>
                                    @endforeach
                                </select>
                                 @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label class="form-label">Class</label><br>
                                <select class="form-control" name="class_id" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentclasses as $studentclass)
                                        <option value="{{ $studentclass->id }}">{{ $studentclass->class_name }}</option>
                                    @endforeach
                                </select>
                                 @error('current_class')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label class="form-label">Subject</label><br>
                                <select class="form-control" name="subject_id" id="">
                                    <option value="">--select one--</option>
                                    @foreach($studentsubjects as $studentsubject)
                                        <option value="{{ $studentsubject->id }}">{{ $studentsubject->subject_name }}</option>
                                    @endforeach
                                </select>
                                 @error('current_class')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="">Mark</label><br>
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
                                    <th scope="col">Result </th>
                                </tr>
                            </thead>
                            <tbody>
                            	
                            	@foreach($marks as $mark)
                                <tr>
                                    <td>{{ $mark->student_name }}</td>
                                    <td>{{ $mark->class_name }}</td>
                                    <td>{{ $mark->subject_name  }}</td>
                                    <td>{{ $mark->mark }}</td>
                                    <td>
                                        @if($mark->mark > 29 )
                                        <span class="text-info">Pass</span>
                                        @else
                                        <span class="text-danger">Fail</span>
                                        @endif
                                    </td>
                                    
                                </tr>

                                @endforeach                            	
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