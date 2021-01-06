@extends('layouts.app')
@section('title')
Profile 
@stop
@section('content')
<div class="pageHeader">
<div class="container">
    <div class="row">
    <h3>Profile</h3>
    </div>
   </div>
</div>


<div style="color:white" class="container">
    <div class="row">
   

<ul class="nav nav-pills">
    <li class="active"><a style="color:white" data-toggle="pill" href="#profile">Profile</a></li>
    <li><a style="color:white" data-toggle="pill" href="#email">Email</a></li> 
    <li><a style="color:white" data-toggle="pill" href="#password">Password</a></li> 
  </ul>
  <p></p>
  <div class="tab-content">

    <div id="profile" class="tab-pane fade in active">
 
 {!! Form::open([ 'url' => 'profile' , 'method' => 'POST' ,'class' => 'form-horizontal']) !!}
 

<div class="form-group">
    {!! Form::label('name','Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">    {!! Form::text('name',$user->name,[ 'class' => 'form-control', 'required' => "reduired"]) !!}
</div>
</div>
 
   
 
<div class="pull-right">

    {!! Form::submit("Update Profile" , [ 'class' => 'btn btn-primary']) !!}
</div>
 
    {!! Form::close() !!}

   
              
                  




 </div>    <div id="email" class="tab-pane fade">
                  
 {!! Form::open([ 'url' => 'profile', 'method' => 'POST' ,'class' => 'form-horizontal']) !!}
 

<div class="form-group">
    {!! Form::label('email','Email', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">    {!! Form::text('email',$user->email,[ 'class' => 'form-control', 'required' => "reduired"]) !!}
</div>
</div>
 
   
 
<div class="pull-right">

    {!! Form::submit("Update Email" , [ 'class' => 'btn btn-primary']) !!}
</div>
 
    {!! Form::close() !!}
      
                  


</div>
 <div id="password" class="tab-pane fade">


    
 {!! Form::open([ 'url' => 'profile/password', 'method' => 'POST' ,'class' => 'form-horizontal']) !!}
 

<div class="form-group">
    {!! Form::label('password','Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">    {!! Form::password('password',[ 'class' => 'form-control', 'required' => "reduired"]) !!}
</div>
</div>
 
   
 
<div class="pull-right">

    {!! Form::submit("Update Password" , [ 'class' => 'btn btn-primary']) !!}
</div>
 
    {!! Form::close() !!}
                  
</div>

</div>
</div> 




   </div>
   </div>
<p></p>
@endsection
