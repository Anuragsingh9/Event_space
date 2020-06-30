<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .pad{
        margin-left: 64px;
      }
  </style>
</head>
<body>

<div class="col-md-6">
  
<form class="form-horizontal" action="/update/{{$event->id}}" method="POST">
    @csrf
    <input type="hidden" value="{{$event->id}}">

    space_name:<input type="text" name="space_name" value="{{$event->space_name}}">
    space_short_name:<input type="text" name="space_short_name" value="{{$event->space_short_name}}">
    space_mood:<input type="text" name="space_mood" value="{{$event->space_mood}}">
    max_capacity:<input type="text" name="max_capacity" value="{{$event->max_capacity}}">
    space_image_url:<input type="text" name="space_image_url" value="{{$event->space_image_url}}"> 
    space_icon_url:<input type="text" name="space_icon_url" value="{{$event->space_icon_url}}">
    is_vip_space:<input type="text" name="is_vip_space"value="{{$event->is_vip_space}}">
    opening_hours:<input type="text" name="opening_hours" value="{{$event->opening_hours}}">
    event_id:<input type="text" name="event_id" value="{{$event->event_id}}">
    tags:<input type="text" name="tags" value="{{$event->tags}}">
    
    


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
