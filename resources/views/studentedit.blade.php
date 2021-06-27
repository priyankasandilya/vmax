@extends('layout')
@section('content')
<div class="col-sm-6">
    <form method="post" action="/editstudent" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h2> Student Edit </h2>
    <input type="hidden" name="id" value="{{$studentdata->id}}">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$studentdata->name}}">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$studentdata->email}}">
        <label>Class</label>
        <select class="form-control" name="class">
            <option value="{{$studentdata->class}}">{{$studentdata->class}}</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
            <option value="Graduation">Graduation</option>
            <option value="Post Graduation">Post Graduation</option>
        </select>
        <label>Gender</label><br>
        <input type="radio" name="gender" value="male" {{ $studentdata['gender'] == 'male' ? 'checked' : ''}}> <label for="male">male</label>
        <input type="radio" name="gender" value="female" {{ $studentdata['gender'] == 'female' ? 'checked' : ''}}> <label for="female">Female</label><br>
        <label>Profile Pic </label>
        <input type="hidden" class="form-control" name="profilepicold" value="{{$studentdata->profilepic}}" >
        <input type="file" class="form-control" name="profilepic" accept=".jpg,.jpeg,.png">
        <button class="my-4 btn btn-md btn btn-primary">Update</button>
    </form>
</div>
@stop