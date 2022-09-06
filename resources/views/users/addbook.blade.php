<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #323433;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  /* width: 100%;
  overflow: auto; */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  text-align: center;
  /* right: 0; */
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  
}

.container {
  padding: 16px;
  text-align: center;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #656363}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #656363;
}
</style>


<div class="container"  >

<hr>
{{-- @dd($uid); --}}
<form action="{{ route('users.storeb',$uid) }}" method ="post" >
    @csrf
    @method('put')

    {{-- <div class="dropdown"> --}}
  {{-- <button class="dropbtn">حدد مراقب</button> --}}
  {{-- <div class="dropdown-content"> --}}
    <div>

      <select name="top_user">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->full_name}}</option>
        @endforeach
      </select>
    </div>
  {{-- </div> --}}
{{-- </div> --}}

@foreach($files as $file)

<input type="checkbox" id="file_{{$file->cust_file_no}}" name="file[]" value="{{$file->cust_file_no}}" onchange="addbook()">
<label for="file"> {{$file->cust_file_no_name}} </label> <br>

@endforeach

<button type="submit" class="btn btn-primary">حفظ</button>
</div>
</form>





