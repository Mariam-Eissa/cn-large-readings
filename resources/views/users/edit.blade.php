@extends('users.home')

@section('content')
<style>

form {
 
  text-align: right;
}
</style>

<form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">             
            <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">الرقم السري</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">تاكيد الرقم السري </label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"   autocomplete="current-password">
    </div>
</div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
   
    </form>
@endsection