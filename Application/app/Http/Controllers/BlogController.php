<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Posts;
use App\Settings;
use Request;

class BlogController extends Controller
{

/*
* Load basic settings
*/
public function __construct()
{ 
$sett = Settings::all();
foreach ($sett as $setts) {
$this->settings[$setts->name] = $setts->value;
}
}
	/**
	* Home Page of Blog
	**/
    public function index()
    {
              $sett = $this->settings;
     	$categories = explode(',',$this->settings['categories']);
    	
        if($sett['highlight'] == "True"){
          $highlight = Posts::orderBy('id','DESC')->first();
          if(count((array)$highlight) != 0)
            $posts = Posts::orderBy('id','DESC')->where('status','1')->where('id','!=',$highlight->id)->paginate(10);
          else
            $posts = Posts::orderBy('id','DESC')->where('status','1')->paginate(10);

        }
        else
        {
          $highlight = Posts::orderBy('id','DESC')->where('status','1')->first();
          $posts = Posts::orderBy('id','DESC')->where('status','1')->paginate(10);

        }

      	$rposts = Posts::orderBy('id',RAND())->where('status','1')->get()->take(10);
 

        return view('welcome', compact('highlight','posts','categories','rposts','sett'));
    }


    /**
    * View Blog Post
    **/
    public function viewPost($slug,$id)
    {
         $sett = $this->settings;
      $post = Posts::findOrFail($id);
      $categories = explode(',',$this->settings['categories']);
      $rposts = Posts::orderBy('id',RAND())->get()->take(10);

      $comment = $this->settings['enable_comment'];
      $disqus = $this->settings['disqus'];
             $tags = explode(',',$post->tags);


       return view('post', compact('post','rposts','categories','comment','disqus','sett','tags'));   
    }


    /**
    * View Category
    **/
    public function viewCategory($slug)
    {
         $sett = $this->settings;
        $posts = Posts::where('cat',$slug)->where('status','1')->paginate(10);
      $categories = explode(',',$this->settings['categories']);
      $rposts = Posts::orderBy('id',RAND())->where('status','1')->get()->take(10);
 
       return view('category', compact('posts','rposts','categories','slug','sett'));   
    }

    public function search()
    {
      $slug = Request::get('search');
          $sett = $this->settings;
        $posts = Posts::where(function($q)use($slug) {
          $q->where('title', 'LIKE', '%'.$slug.'%')
            ->orWhere('message','LIKE', '%'.$slug.'%');
      })->where('status','1')->paginate(10);
      $categories = explode(',',$this->settings['categories']);
      $rposts = Posts::orderBy('id',RAND())->where('status','1')->get()->take(10);
 
       return view('category', compact('posts','rposts','categories','slug','sett'));   
    }
}
