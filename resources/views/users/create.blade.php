@extends('users.home')

@section('content')

<style> 
* {box-sizing: border-box}

        h1{text-align: right;}
   
/* Add padding to containers */
.container {
  padding: 16px;
  text-align: right;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  text-align: right;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  text-align: right;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #323433;
  color: white;
  font-size: 150%;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    
   
    </style>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('users.store') }}" method ="POST" >
      @csrf
      @method('post')
  <div class="container"  >
      <h1>تسجيل مستخدم جديد</h1>
   
    <hr>


    <label for="user_name"><b>الاسم</b></label>
    <input type="text" placeholder="ادخل اسم" name="user_name" id="user_name" required text-align="right">


    <label for="fullname"><b>الاسم بالكامل</b></label>
    <input type="text" placeholder="ادخل الاسم كامل" name="fullname" id="fullname" required>

    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الدور</strong>
                <select  class="form-control" name="role" id="" >
                    <option value="0" disabled ></option>
                    @foreach($roles as $role)
                   
                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                    
                    @endforeach
                </select>
                <!-- <input type="text" name="user_id" class="form-control" placeholder="Enter UserID"> -->
            </div>
        </div>

    <label for="password"><b>الرقم السري</b></label>
    <input type="password" placeholder="ادخل رقم سري " name="password" id="psw" required class="form-control @error('password') is-invalid @enderror" >
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

    <label for="password_confirmation"><b>اعادة الرقم السري</b></label>
    <input type="password" placeholder="اعادة ادخال رقم سري" name="password_confirmation" id="psw-repeat" required class="form-control @error('password') is-invalid @enderror">
    <hr>

    
    <button type="submit" class="registerbtn">حفظ</button>
  </div>

  
</form>
@endsection
  
