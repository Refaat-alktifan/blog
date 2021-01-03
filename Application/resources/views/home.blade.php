@extends('layouts.app')
@section('title')
Posts
@stop

@section('content')
<div class="main">
    <div class="container">
        <h3>Posts
            <div class="pull-right"> <a href="{{ url('post/new') }}" class="btn btn-default">New Post</a></div>
</h3>
    </div>
</div>


<div class="container">
	<table class="ui table">
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Category</th>
			<th>Created On</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>

		 @foreach($posts as $post)
		   <tr>
		   	<td>{{ $post->title }}</td>
		   	<td>{{ $post->author }}</td>
		   	<td>{{ $post->cat }}</td>
		   	<td>{{ date("M,d,Y" ,strtotime($post->created_at)) }}</td>
		   	<td>
			@if ($post->status == 1)
			 Published @else Draft
			@endif
		   	</td>
		   	<td> 
		   		<a href="{{ url('post/'.$post->slug.'/'.$post->id) }}" target="_blank" class="btn btn-sm btn-primary">View</a>
		   		<a href="{{ url('post/edit/'.$post->id) }}"  class="btn btn-sm btn-primary">Edit</a>
		   		<a href="{{ url('post/delete/'.$post->id) }}" onclick='return confirm("Are you sure you want to delete?");' class="btn btn-sm btn-danger">Delete</a>

		   	 </td>
		   </tr>
		 @endforeach

		 @if(count($posts) == 0)
		<tr><td colspan="6">There is no posts.</td></tr>
		@endif
	</table>

{{ $posts->render() }}

</div>

@endsection
