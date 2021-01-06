@extends('layouts.app')
@section('title')
Settings
@stop
@section('content')
<div class="main">
<div class="container">
    <div class="row">
    <h3>Settings</h3>
    </div>
   </div>
</div>

<div style="color:white" class="container">
    <div class="row">


<ul class="nav nav-pills">
    <li class="active"><a style="color:white"  data-toggle="pill" href="#general">General</a></li>
    <li><a style="color:white" data-toggle="pill" href="#comments">Comments</a></li> 
    <li><a style="color:white" data-toggle="pill" href="#widgets">Widgets</a></li> 
  </ul>
  <p><hr></p>
  <div class="tab-content"> 
        <div id="general" class="tab-pane fade in active">
             
<form method="POST" action="{{ url('manage/settings') }}"> 

 {{ csrf_field() }}

 <div class="form-group">
    <div class="row">
    <label for="categories" class="col-md-4 control-label">Categories</label> 
    <div class="col-md-8">
    <textarea class="form-control" id="categories" name="categories" class="form-control">{{ $data['categories'] }}</textarea>
  </div></div></div>


 
 <div class="form-group">
    <div class="row">
    <label for="highlight" class="col-md-4 control-label">Highlight Post</label> 
    <div class="col-md-8">
  <select name="highlight" class="form-control">
   <option name="false">False</option>
   <option name="true" {{ ($data['highlight'] == "True")?'selected':'' }}>True</option>
  </select>
   </div></div></div>



 <div class="form-group">
    <div class="row">
    <label for="post_share" class="col-md-4 control-label">Enable Post Share</label> 
    <div class="col-md-8">
  <select name="post_share" class="form-control">
   <option name="false">False</option>
   <option name="true" {{ ($data['post_share'] == "True")?'selected':'' }}>True</option>
  </select>
   </div></div></div>
 
<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Save">
</div>

</form>
        </div>
      <div id="comments" class="tab-pane fade in">
           
<form method="POST" action="{{ url('manage/settings') }}"> 

 {{ csrf_field() }}

 

 <div class="form-group">
    <div class="row">
    <label for="disqus" class="col-md-4 control-label">Enable Comments</label> 
    <div class="col-md-8">
  <select name="comment" class="form-control">
   <option value="false">False</option>
   <option value="true" {{ ($data['disqus'] == "true")?'selected':'' }}>True</option>
  </select>
   </div></div></div>



 <div class="form-group">
    <div class="row">
    <label for="commentsystem" class="col-md-4 control-label">Comment System</label> 
    <div class="col-md-8">
  <select name="commentsystem" class="form-control">
   <option value="facebook">Facebook</option>
   <option value="disqus" {{ ($data['disqus'] == "disqus")?'selected':'' }}>Disqus</option>
  </select>
   </div></div></div>



 <div class="form-group">
    <div class="row">
    <label for="disqus" class="col-md-4 control-label">Disqus Source</label> 
    <div class="col-md-8"><input id="disqus" name="disqus"   class="form-control" value="{{ $data['disqus'] }}"  type="text"></div></div></div>





 <div class="form-group">
    <div class="row">
    <label for="fcomments" class="col-md-4 control-label">Facebook App Id </label> 
    <div class="col-md-8"><input id="fcomments" name="fcomments"   class="form-control" value="{{ $data['fcomments'] }}"  type="text"></div></div></div>


 
<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Save">
</div>

</form>
        </div>
        <div id="widgets" class="tab-pane fade in">


      
<form method="POST" action="{{ url('manage/settings') }}"> 

 {{ csrf_field() }}

 

 <div class="form-group">
    <div class="row">
    <label for="show_cat" class="col-md-4 control-label">Categories Widget</label> 
    <div class="col-md-8">
  <select name="show_cat" class="form-control">
   <option name="false">False</option>
   <option name="true" {{ ($data['show_cat'] == "True")?'selected':'' }}>True</option>
  </select>
   </div></div></div>



 

 <div class="form-group">
    <div class="row">
    <label for="show_new_post" class="col-md-4 control-label">Latest Post Widget</label> 
    <div class="col-md-8">
  <select name="show_new_post" class="form-control">
   <option name="false">False</option>
   <option name="true" {{ ($data['show_new_post'] == "True")?'selected':'' }}>True</option>
  </select>
   </div></div></div>






 <div class="form-group">
    <div class="row">
    <label for="show_new_post" class="col-md-4 control-label">Sidebar Advertisement</label> 
    <div class="col-md-8">
  
  <textarea class="form-control tinymceeditor" name="adsidebar">{{ $data['adsidebar'] }}</textarea>
   </div></div></div>


 
 <div class="form-group">
    <div class="row">
    <label for="show_new_post" class="col-md-4 control-label">Content Advertisement</label> 
    <div class="col-md-8">
  
  <textarea class="form-control tinymceeditor" name="adcontent">{{ $data['adcontent'] }}</textarea>
   </div></div></div>


 



 
<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Save">
</div>

</form>



        </div>

  </div>      
    

    </div>
</div>
@endsection

@section('js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: '.tinymceeditor',
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
 

