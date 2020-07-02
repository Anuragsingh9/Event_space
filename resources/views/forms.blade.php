<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
{{-- <form action="" method="post" enctype="multipart/form-data"> --}}

        @csrf
        title:<input type="text" name="title">
        header_text:<input type="text" name="header_text">
        space_mood:<input type="text" name="space_mood">
        description:<input type="text" name="description">
        date:<input type="date" name="date"> 
        start_time:<input type="text" name="start_time">
        end_time:<input type="text" name="end_time">
        address:<input type="text" name="address">
        city:<input type="text" name="city">
        image:<input type="file" name="image">
        type:<input type="text" name="type">
        workshop_id:<input type="text" name="workshop_id">
        bluejeans_settings:<input type="text" name="tags">
        event_fields:<input type="text" name="tags">
       


        
        
        <button type="submit">Click</button>

    </form>
    <div>
        @if (session('successs'))
            <div class="alert alert-success">
              
                {{ session('successs') }}
        @endif
     </div>

</body>
</html>