@extends('layouts.app')
@section('title')
New Post
@stop
@section('content')
<div class="pageHeader">
<div class="container">
    <div class="row">
    <h3>New Post</h3>
    </div>
   </div>
</div>


<div class="container content">
    <div class="row"><div class="pull-right">
 </div> 

      {!! Form::open([ 'url' => url('post/new'),'class' => 'form-horizontal']) !!}
{{ csrf_field() }}

<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('title','Title' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::text('title',null,[ 'class' => 'form-control input', 'required' => "reduired"]) !!}
   </span>
</span>



<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('cover','Cover Image' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::text('cover',null,[ 'class' => 'form-control input']) !!}
   </span>
</span>


<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('cat','Category' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::select('cat',$categories,null,[ 'class' => 'form-control input', 'required' => "reduired"]) !!}
   </span>
</span>


<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('message','Message' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::textarea('message',null,[ 'class' => 'form-control input' , 'required' => "reduired"]) !!}
   </span>
</span>    


<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('tags','Tags' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::text('tags',null,[ 'class' => 'form-control input']) !!}
   </span> 
</span>



<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('status','Status' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::select('status',[ '1' => 'Published' , '0' => 'Draft'],null,[ 'class' => 'form-control input', 'required' => "reduired"]) !!}
   </span>
</span>


 
<div >

<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('seokeyword','SEO Keyword' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::text('seokeyword',null,[ 'class' => 'form-control input']) !!}
   </span>
</span>




<span class="form-group">              
  <span class="col-md-2 control-label">
     {!! Form::label('seodesc','SEO Description' , ['class' => '']) !!}
    </span> 
   <span class="col-md-8">
     {!! Form::text('seodesc',null,[ 'class' => 'form-control input']) !!}
   </span>
</span>


     </div>


<p>

  <span class="form-group">              
     <span class="col-md-8">
      {!! Form::submit('Submit' , [ 'class' => 'btn btn-primary' ,'onclick' => "$(this).closest('form').submit();" ]) !!}
    </span>
  </span>



</p>

      {!! Form::close() !!}

     </div>
</div>
@endsection

@section('js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: ' preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 }); 

</script> 
@stop