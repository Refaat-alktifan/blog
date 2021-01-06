@extends('layouts.app')
@section('title')
{{ $post->title }}
@stop

@section('meta')
    <meta name="description" content="{{ $post->seodesc }}"/>
    <meta name="keywords" content="{{ $post->seokeyword }}"/>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->title }}" />
    <meta property="og:url" content="{{ url('post/'.$post->slug.'/'.$post->id) }}" />
    <meta property="og:image" content="{{ url($post->cover) }}" />
    <meta property="og:site_name" content="{{ url('/') }}" />
    <meta property="article:tag" content="{{ $post->cat }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/icon.min.css" />
    <script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="{{ url('js/whatsapp.js') }}";h.appendChild(s);}</script>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId={{ $sett["fcomments"] }}';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection

@section('content')
<div class="main">
    <div class="container">
        <h3>{{ $post->title }}</h3>
    </div>
</div>



    <div class="container">
    <div class="row">
         <div style="color:white" class="col-md-8"> 
              <div class="post-details">
            @if ($post->cover != "")
                <img src="{{ url('img/load.gif') }}"  data-src="{{ $post->cover }}" class="lazy img-responsive">            
            @endif      
          </div>
            <p>
By {{ $post->author }} <span class="date-style"> {{ date('M, d, Y' , strtotime($post->created_at)) }} </span> <span class="cat-style"><a href="{{ url('category/'.$post->cat) }}">{{ $post->cat }}</a></span> </p>
        {!! $post->message !!}
        <p>Tags:
                @foreach($tags as $tag)
                                    <span class="label label-default">{{ $tag }}</span>
             @endforeach</p>

@if ($sett['post_share'] == "True")
<p>Share On
<a target="_BLANK" href="http://www.facebook.com/share.php?u={{ url('post/'.$post->slug.'/'.$post->id) }}&title={{ $post->title }}" class="ui facebook button"><i class="fa fa-facebook"></i> Facebook</a>
   <a target="_BLANK" href="https://plus.google.com/share?url={{ url('post/'.$post->slug.'/'.$post->id) }}" class="ui red button"><i class="fa fa-google-plus"></i>  Google</a>
  <a target="_BLANK" href="http://twitter.com/home?status={{ $post->title }}+{{ url('post/'.$post->slug.'/'.$post->id) }}" class="ui twitter button"><i class="fa fa-twitter"></i>  Twitter</a>
   <a target="_BLANK" href="http://www.linkedin.com/shareArticle?mini=true&url={{ url('post/'.$post->slug.'/'.$post->id) }}" class="ui linkedin button"><i class="fa fa-linkedin"></i>  Linkedin</a> 
   <a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href=""  class="ui green button"><i class="icon whatsapp"></i> Whatsapp</a>
  <a href="javascript:window.open('https://t.me/share/url?url='+encodeURIComponent(window.location.href))" target="_blank"   class="ui twitter button"><i class="icon telegram"></i> Telegram</a>
</p>

@endif

        @if ($comment == "true")
    <div class="divider"></div>

@if($sett['commentsystem'] == "facebook")
    <div class="fb-comments" data-href="{{ url('post/'.$post->slug.'/'.$post->id) }}" data-numposts="5"></div>
@else
        <div id="disqus_thread"></div>
<script> 
    var disqus_config = function () {
        this.page.url = "{{ url('post/'.$post->slug.'/'.$post->id) }}";   
        this.page.identifier = {{ $post->id }};  
    };
    (function() { 
        var d = document, s = d.createElement('script');
        s.src = '{{ $disqus }}';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

        @endif
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


<div class="advertisement  text-center">   
    {!! $sett['adsidebar'] !!}
   </div>
   

</div>

    </div>
    </div>
@stop