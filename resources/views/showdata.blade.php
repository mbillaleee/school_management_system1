@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            
            <div class="card-header">
               
            </div>
            <div class="card-body">
                <form action="" class="form" method="post">
                	
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
                            <div class="form-group">
                                <label for="">Mobile * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Email * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Image *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="file" class="form-control" name="image" value="">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="">Present Address * </label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Permanent Address *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                @error('name')
                                    <br><span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Class *</label>
                                <div class="form-check-inline col-lg-10">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
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
                            		<td>{{ $student->address }}</td>
                            		<td>{{ $student->class }}</td>
                            		<td>{{ $student->image }}</td>
                            		<td>
                            			<input type="button" value="Edit" class="btn btn-info">
                            			<input type="button" value="Delete" class="btn btn-danger">
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