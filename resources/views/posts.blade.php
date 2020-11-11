<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        a{text-decoration: none;}
    </style>
</head>
<body>
    @if (Session::has("post-delete"))
        <p>{{ Session::get("post-delete") }}</p>
    
    @endif
  <table border="1" cellspacing="0" cellpadding="10">
      <thead>
            <tr>
              <th>Sr</th>
              <th>Title</th>
              <th>Body</th>
              <th>Post Pic</th>
              <th>Action</th>
            </tr>
      </thead>
      <tbody>
          <?php $sr = 1; ?>
          @foreach ($posts as $post)
              <tr>
                    <td>{{ $sr++ }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['body'] }}</td>
                    <td><img width="50px" src="{{ asset('images/'. $post['post_pic']) }}" alt="post pic" /></td>
                    <td>
                        <a href="{{ url('/post' . '/' . $post['id']) }}"><button>View</button></a>
                        <a href="{{ url('/post-edit' . '/' . $post['id']) }}"><button>Edit</button></a>
                        <a href="{{ url('/post-delete' . '/' . $post['id']) }}"><button>Delete</button></a>
                    </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</body>
</html>