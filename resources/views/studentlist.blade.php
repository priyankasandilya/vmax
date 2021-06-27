@extends('layout')
@section('content')
@if(session('addstatus'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{session('addstatus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('updatestatus'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('updatestatus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('deletestatus'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('deletestatus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<h2>Student List  </h2>
<table class="table">
    <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Gender</th>
        <th>Profile Photo</th>
        <th>Action</th>
    </tr>
    @php ($i = 1)
    @foreach($studentlists as $studentlist)
    <tr>
        <th>{{$i}}</th>
        <th>{{$studentlist->name}}</th>
        <th>{{$studentlist->email}}</th>
        <th>{{$studentlist->class}}</th>
        <th>{{$studentlist->gender}}</th>
        @inject('StudentProfile', 'App\Http\Controllers\StudentController')
        <th>
        @if($studentlist->profilepic)
        <img src="{{$StudentProfile::getStudentImageURL($studentlist->profilepic)}}" style="padding:1px;" height='50' width='90' border="1px">
        @else
        <img src="storage/img/human.png" style="padding:1px;" height='50' width='90' border="1px">
        @endif
        </th>
        <th>
            <a href="edit/{{$studentlist->id}}"><i style="color:green" class="fa fa-edit"></i></a>
            <a href="/delete{{$studentlist->id}}"><i style="color:red;" class="fa fa-trash"></i></a>
        </th>
    </tr>
    @php ($i = $i+1)
    @endforeach
</table>
<span>
    <!-- {{$studentlists->appends(['sort' => 'votes'])->links()}} -->
   {{$studentlists->links('pagination::bootstrap-4')}}
</span>     
@stop
