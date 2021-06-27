<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .w-5{
                display:none;
            }
        </style>
        <title>Student Management System</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
    @if(session('fail'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{session('signup')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    
    <div class="container col-sm-6">
        <h2> Signup User</h2>
        <form method="post" action="usersignup">
        @csrf
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
            <div><span style="color:red">@error('name'){{$message}}@enderror</span></div>
            <label>UserName</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email/Mobile No" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
            <div><span style="color:red">@error('email'){{$message}}@enderror</span></div>
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" >
            <div><span style="color:red">@error('password'){{$message}}@enderror</span></div>
            <label> Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            <div class="form-group col-md-4 my-4">
                <button class="btn btn-sm btn btn-primary"> Signup</button>
            </div> 
            <div class="form-group col-md-4">
                <a class="nav-link " href="/">Signin</a>
            </div>
        </form>   
    </div>
  </body>
</html>