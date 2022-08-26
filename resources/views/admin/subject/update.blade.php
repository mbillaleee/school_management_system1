@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            
            <div class="card-header">
               
            </div>
            <div class="card-body">
            	
            	@if(session('update_status'))
                <div class="alert alert-success">
                    {{ session('update_status') }}
                </div>
                @endif
                <form action="{{ url('update/class/post') }}" class="form" method="post">
                    @csrf
                    <h4>Student Class add</h4>
                    <div class="row">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="">Class * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="hidden" name="class_id" value="{{ $class_id }}">
                                    <input type="text" class="form-control" name="class_name" value="{{ $class_name }}" placeholder="Enter Class">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                           
                            
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Update class</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection