<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <a href="{{ route('fetchall.posts') }}">See All Posts</a>
    <br><br>

    @if (Session::has("post-update"))
        <p>{{ Session::get("post-update") }}</p>
        
    @endif
    <form method="POST" action="{{ url('/post-update' . '/' . $post['id']) }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Enter title" value="{{ $post['title'] }}">
        <br><br>
        <input type="file" name="post_pic" >
        <br><br>

        <img width="50px" src="{{ asset('images/'. $post['post_pic']) }}" alt="post pic" />
        <br><br>
        <textarea type="text" name="body"  rows="5" cols="30" value="{{ $post['body'] }}">{{ $post['body'] }}</textarea>
        <br><br>
        <input type="submit" name="submit" value="submit">
        <br><br>
    </form>
</body>
</html>