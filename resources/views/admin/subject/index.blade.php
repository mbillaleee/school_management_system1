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
                @if(session('update_status'))
                <div class="alert alert-success">
                    {{ session('update_status') }}
                </div>
                @endif
                @if(session('delete_status'))
                <div class="alert alert-success">
                    {{ session('delete_status') }}
                </div>
                @endif
                <form action="{{ url('add/subject/post') }}" class="form" method="post">
                    @csrf
                    <h4>Student Class add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">

                           
                           
                            <div class="form-group">
                                <label for="">Subject Name * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="subject_name" value="" placeholder="Enter subject">
                                </div>
                                @error('subject_name')
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
                                    <th scope="col">Subject Name </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@forelse($subjects as $subject)
                            	<tr>
                            		<td> {{ $loop->index + 1 }} </td>
                                    <td>{{ $subject->subject_name }}</td>
                            		<td>
                                        <div class="btn-group" role="group">
                                            <a type="button" href="{{ url('update/subject') }}/{{ $subject->id }}" class="btn btn-info text-white">Update</a>
                                            <a type="button" href="{{ url('delete/subject') }}/{{ $subject->id }}" class="btn btn-danger text-white">Delete</a>
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