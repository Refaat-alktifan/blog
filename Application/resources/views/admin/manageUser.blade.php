@extends('layouts.app')
@section('title')
Manage Staff
@stop
@section('content')
<div class="pageHeader">
<div class="container">
    <div class="row">
    <h3>Manage Staff
    <div class="pull-right"> <a href="{{ url('manage/user/add') }}" class="btn btn-default">New Staff</a></div>

    </h3>
    </div>
   </div>
</div>

<div class="container">
    <div class="row">
     


                 <table class="ui table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th> 
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>


 @foreach($users as $user)
   
   <tr>
   <td>{{ $user->name }}</td>
   <td>{{ $user->email }}</td>
   <td><a href="{{ url('manage/user/'.$user->id) }}" class="btn btn-primary">Edit</a></td>

       </td>
       </tr>
     @endforeach
 
  </tbody>
</table>



{{ $users->render() }}

 

    </div>
</div>
<p></p>
@endsection
