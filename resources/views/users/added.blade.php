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
        <th width="280px">حذف</th>
        <th width="280px">لم يتم التعامل</th>
        <th width="280px">تم التعامل</th>
        <th width="280px">عدد المحمل</th>
        <th width="280px">رقم الدفتر</th>
        <th>الاسم بالكامل</th>
       
        </tr>
        <tr>
          
        @foreach($users as $user)
         
            
         <td>
                {{-- <form action="{{ route('users.addb', $user->id) }}" method="GET"> --}}
      
                    <a type="submit"  href =" {{route('users.addb', $user->id) }}" class="btn btn-primary">تحميل دفتر</a> 
                    <div>
                    <a type="submit"  href =" {{route('users.delbook', $user->id) }}" class="btn btn-primary">حذف</a> 
                    </div>
               {{-- </form> --}}
            </td>  
        
       
      @if($user->userareas->count() > 1)
        <td>{{ $user->cnt }}</td>
        <td>{{ $user->finished }}</td>
        <td>{{ $user->cnt }}</td>
        <td>{{ $user->ids}}</td> 
        <td>{{ $user->full_name }}</td>

        @else 
        <td>{{ $area->cnt }}</td>
        <td>{{ $area->finished }}</td>
        <td>{{ $area->cnt }}</td>
        <td>{{ $area->file_no}}</td> 
        <td>{{ $user->full_name }}</td>
           
        @endif     
      
           
           
            
           
        </tr>
        
        @endforeach
       
        
    </table>
  
  @endif 
@endsection
      