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
    @if (Session::has("post_create"))
        <p>{{ Session::get("post_create") }}</p>
        
    @endif
    <form method="POST" action="{{ route('create.post') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <span style="color:red">
            @error('title')
                {{ $message }}
                
            @enderror
        </span>
        <br><br>
        <input type="file" name="post_pic" >
        <span style="color:red">
            @error('post_pic')
                {{ $message }}
            @enderror
        </span>
        <br><br>
        <textarea type="text" name="body" placeholder="Enter Text for posts" rows="5" cols="30"></textarea>
        <span style="color:red">
            @error('body')
                {{ $message }}
                
            @enderror
        </span>
        <br><br>
        <input type="submit" name="submit" value="submit">
        <br><br>
    </form>
</body>
</html>