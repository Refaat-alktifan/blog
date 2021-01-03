<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Settings;
use App\Posts;
use MercurySeries\Flashy\Flashy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    $sett = Settings::all();
    foreach ($sett as $setts) {
    $this->settings[$setts->name] = $setts->value;
    }
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('id','DESC')->paginate(10);
        return view('home',compact('posts'));
    }


    /**
    * New Post
    **/
    public function newPost()
    { 
        $categories = explode(',',$this->settings['categories']);
          foreach($categories as $key=>$value){
            $cat[$value] = $value;
        }
        $categories = $cat;
        return view('admin.newPost',compact('categories'));
    }


    /**
    * Store post
    **/
    public function storePost()
    {
        $request = Request::all();
        $request['author'] = Auth::user()->name;
        $request['slug'] = str_slug($request['title']);

        Posts::create($request);
        Flashy::message('Post added successfully.');        
        return redirect('home');
    }


    /**
    * Edit Post
    **/
    public function editPost($id)
    {
        $post = Posts::findOrFail($id);
        $categories = explode(',',$this->settings['categories']);
          foreach($categories as $key=>$value){
            $cat[$value] = $value;
        }
        $categories = $cat;
        return view('admin.editPost', compact('post','categories'));
    }


    /**
    * Update Post
    **/
     public function updatePost($id)
        {
           $data = Posts::findOrFail($id);
           $request  = Request::all();
           $data->update($request);
           Flashy::message('Post Updated Successfully');
           return redirect('home');
        }
     
    /**
    * Delete Post
    **/
    public function deletePost($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        Flashy::message('Post deleted successfully');        
        return redirect('home');
        
    }

/**
* User Profile page
*/
public function profile()
{
$user = Auth::user();
return view('admin.profile', compact('user'));
}
/**
* User profile data update
*/
public function updateProfile()
{ 
$input = Request::all();
$user = Auth::user();
$user->update($input);
Flashy::message('Your profile updated successfully');        
return redirect('home');
}
/**
* User password update.
*/
public function updateProfilePassword()
{
$input = Request::all();
$user = Auth::user();
$account['password'] = bcrypt($input['password']);
$user->update($account);
Flashy::message('Your password updated successfully');
return redirect('home');
}
/**
*   Manage staffs
*/
public function users()
{ 
$users = User::paginate('10');
return view('admin.manageUser', compact('users'));
}

/**
* Add new staff
*/
public function userAdd()
{         
return view('admin.newUser' );
}
/**
* Add user to database
*/
public function storeUser()
{        
$request = Request::all(); 
$data['name'] = $request['name'];
$data['email'] = $request['email']; 
$data['password'] = bcrypt($request['password']);
User::create($data);
Flashy::message('Staff added successfully.');
return redirect('manage/user');
}
/**
* Edit staff
*/
public function editUser($id)
{        
$user = User::findOrFail($id);
 $selected = explode(',',$user->department);
return view('admin.editUser', compact('user','selected'));
}
/**
* Update staff details
*/
public function updateUser($id)
{        
$user=User::findOrFail($id);
$request = Request::all();  
$data['name'] = $request['name'];
$data['email'] = $request['email']; 
$user->update($data);
Flashy::message('Staff updated successfully.');
return redirect('manage/user');
}

/**
* Settings page.
*/
public function settings()
{

$settings = Settings::all();
foreach ($settings as $sett) {
$data[$sett->name] = $sett->value;
} 
return view('admin.settings', compact('data'));
}

/**
* Update settings
*/
public function updateSettings()
{       
$requests = Request::all();
foreach ($requests as $req => $k) {
if($req != "_token")
{ 
if($k){
$settings = Settings::where('name',$req)->first();
$settings->update(['value' => $k]);
}
}
}
Flashy::message('Settings updated');
return redirect('manage/settings');
}
}
