

<h1><b>قراءات كبار جنوب القاهرة</b></h1>
                @auth 
                <div class="pull-top">
                    <form method = "GET" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                     @csrf
                    <button type="submit"> Log Out</button>
                    

                    
                <!-- <span class="text-xs font-bold uppercase" > Welcome back !</span> -->
                @endauth
                    </form>
                </div>


<div class="topnav">
  <a href="{{ route('users.create') }}">اضافة مستخدم</a>
  <a href="{{ route('users.index') }} ">مراقبين </a>
  <a href="{{ route('users.unadded') }}">قراء غير محملين </a>
  <a href="{{ route('users.inactive') }}">غير فعالين </a>
  <a href="{{ route('users.added') }}">قراء محملين </a>
  <style>
    h1{text-align: right;}
    .topnav {
    background-color: #333;
    overflow: hidden;
    
  }
  
  /* Style the links inside the navigation bar */
  .topnav a {
    float: right;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  /* Add a color to the active/current link */
  .topnav a.active {
    background-color: #04AA6D;
    color: white;


    
  }

  

    </style>
    </div>
    <!-- @csrf -->
  
   
                

@yield('content')