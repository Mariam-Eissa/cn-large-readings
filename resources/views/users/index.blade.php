@extends('users.home')

@section('content')


<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: right;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: right;
  background-color: #343636;
  color: white;
}

</style>

@if($users->count()>0)
<table id="customers">

        <tr>
        <th width="280px">تحكم</th>
        <th>الاسم بالكامل</th>
        <th>اسم</th>
            <th>م</th>
            
            
           
            
        </tr>
        <tr>
          
        @foreach($users as $user)
         
           
        <td>
                <form action="{{ route('users.edit',$user->id) }}" method="GET">
   
                   
    
                    
   
                    @csrf
                    @method('EDIT')
      
                    <button type="submit" class="btn btn-primary">تعديل الرقم السري </button> 
               </form>
            </td>    
        
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->user_name }}</td>
        <td> {{$user->id }} </td>
           
          

           
           
            <!-- </td> -->
           
             
        <!-- </a>  </td> 
           
           
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button> -->
                <!-- </form>
            </td> -->
        </tr>
        
        @endforeach
        
        
    </table>
  
@endif   
@endsection
      