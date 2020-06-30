<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <a href="/create"><button class="btn btn-success">Add</button></a>
  </div>
<div class="container">
  
  <table class="table">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>comments</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>



      </tr>
    </thead>
    <tbody>
        @foreach ($show as $event)
            
        
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$event->space_name}}</td>
        <td>{{$event->space_short_name}}</td>
        <td>{{$event->space_mood}}</td>
        <td>{{$event->max_capacity}}</td>
        <td>{{$event->space_image_url}}</td>
        <td>{{$event->space_icon_url}}</td>
        <td>{{$event->is_vip_space}}</td>
        <td>{{$event->opening_hours}}</td>
        <td>{{$event->event_id}}</td>
         <td>{{$event->tags}}</td>
      {{-- <td><a href="/edit/{{$event['id']}}"><button class="btn btn-success">Edit</button></a></td> --}}
      {{-- <td><a href="/show/{{$event['id']}}"><button class="btn btn-success">Show</button></a></td> --}}

        {{-- <td><a href="/delete/{{$event['id']}}"><button class="btn btn-success">Delete</button></a></td> --}}

      </tr>      
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

