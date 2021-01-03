@extends('layouts.app')
@section('title')
Blog
@stop
@section('content')
<div class="main">
    <div class="container">
        <h3>Blog</h3>
    </div>
</div>
<div class="container">
<div class="row">
      <div class="col-md-8"> 
 @if (  $sett['highlight'] == "True")
     @if (count((array)$highlight) != 0)
          <div class="highlight">
            @if ($highlight->cover != "")
                <img src="{{ url('img/load.gif') }}"  data-src="{{ $highlight->cover }}" class="lazy img-responsive">            
            @endif        
            <div class="desc">  
            <p class="pull-right"><span class="cat-style"><a href="{{ url('category/'.$highlight->cat) }}">{{ $highlight->cat }}</a></span>  <span class="date-style"> {{ date('M, d, Y' , strtotime($highlight->created_at)) }} </span> </p>
            <h4 class="heading"><A href="{{ url('post/'.$highlight->slug.'/'.$highlight->id) }}">{{ $highlight->title }}</A></h4>
         </div>
        </div>
 @endif
 @endif
        <div class="row">

             @foreach($posts as $post)
                <div class="col-md-6">
                <div class="post">
                     @if ($post->cover != "")
                        <img src="{{ url('img/load.gif') }}" data-src="{{ $post->cover }}"  class="lazy img-responsive">            
                    @endif        
             <div class="desc">  
                <p class="pull-right"><span class="cat-style"><a href="{{ url('category/'.$post->cat) }}">{{ $post->cat }}</a></span>  <span class="date-style"> {{ date('M, d, Y' , strtotime($post->created_at)) }} </span> </p>

                <h4  class="heading"><A href="{{ url('post/'.$post->slug.'/'.$post->id) }}">{{ $post->title }}</A></h4>
                </div>
                </div>
                
            </div> 

             @endforeach
          
        </div>

        {{ $posts->render() }}

        @if (count((array)$posts) == 0 && count($highlight) == 0)
        <div class="alert alert-warning"> There is no post.</div>
        @endif

        <div class="row advertisement  text-center">   
            {!! $sett['adcontent'] !!}
        </div>    
    </div>
    
    <div class="col-md-4">
    
    @if ( $sett['show_cat'] =="True" )
        <div class="category">
            <h4>    Categories    </h4>
            <hr>
            <div class="cat-nav">
                <ul>            
                     @foreach($categories as $cat)
                       <li><a href="{{ url('category/'.$cat) }}">{{ $cat }}</a></li>
                     @endforeach
                </ul>
                 @if (count($categories) == 0)
                    <div class="alert alert-warning"> There is no category.</div>
            @endif
        </div>
            </div>
    @endif
    
    @if ( $sett['show_new_post'] =="True" )
     <div class="latest-post">
        <h4>    Latest Post    </h4>
        <hr>
                 <div class="cat-nav">
            <ul>
                 @foreach($rposts as $post)
                   <li><a href="{{ url('post/'.$post->slug.'/'.$post->id) }}">{{ $post->title }}</a></li>
                 @endforeach
                  
                   

            </ul>
             @if (count($rposts) == 0)
                    <div class="alert alert-warning"> There is no new post.</div>
            @endif
        </div>
    </div>
    @endif


  
<div class="advertisement text-center">   
    {!! $sett['adsidebar'] !!}
   </div>
    </div>


</div>

</div>
@stop