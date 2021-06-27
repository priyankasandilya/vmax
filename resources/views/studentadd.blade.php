@extends('layout')
@section('content')
<div class="col-sm-6">
    <form method="post" action="addstudent" enctype="multipart/form-data">
    @csrf
        <h2> Add Student</h2>
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
        <span style="color:red">@error('name'){{$message}}@enderror</span>
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter Email">
        <span style="color:red">@error('email'){{$message}}@enderror</span>
        <label>Class</label>
        <select class="form-control" name="class">
            <option>Select</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            <option value="Graduation">Graduation</option>
            <option value="Post Graduation">Post Graduation</option>
        </select>
        <label>Gender</label><br>
        <input type="radio" name="gender" value="male"> <label for="male">male</label>
        <input type="radio" name="gender" value="female"> <label for="female">Female</label><br>
        <label>Profile Pic </label>
        <input type="file" class="form-control" name="profilepic" accept=".jpg,.jpeg,.png">
        <span style="color:red">@error('profilepic'){{$message}}@enderror</span>
        <div class="form-group my-4">
            <button class=" btn btn-md btn btn-primary">Add</button>
        </div>
    </form>
</div>
@stop