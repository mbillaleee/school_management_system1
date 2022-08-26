@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            
            <div class="card-header">
               
            </div>
            <div class="card-body">
                <form action="{{ url('add/student/post') }}" class="form" method="post">
                	
                    @csrf
                    <h4>Student Information add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Name * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                @error('name')
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	
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