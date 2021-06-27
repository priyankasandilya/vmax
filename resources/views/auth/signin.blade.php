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
        @if(session('signup'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('signup')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        @if(session('loginfail'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('loginfail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        @if(session('passfail'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('passfail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <div class=" container col-sm-6">
            <h2> Login User</h2>
            <form method="post" action="usersignin">
            @csrf
                    <label>UserName</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                    <div ><span style="color:red">@error('email'){{$message}}@enderror</span></div>
 
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                    <div><span style="color:red">@error('password'){{$message}}@enderror</span></div>
                        
                    <div class="row my-4">
                        <div class="form-group col-md-4 ">
                        <button type="submit" class="btn btn-sm btn btn-primary"> Login</button>
                        </div>
                        <div class="form-group col-md-4">
                        <a class="nav-link " href="signup">Create a new account</a>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-4 ">
                            <input type="checkbox" name="rememberme"> Remember me
                        </div>
                        <div class="form-group col-md-4">
                            <a href="#">Forgot Password</a>
                        </div>
                      </div>  
                     
                
            </form>   
        </div>
    </body>
</html>