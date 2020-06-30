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
        @csrf
        space_name:<input type="text" name="space_name">
        space_short_name:<input type="text" name="space_short_name">
        space_mood:<input type="text" name="space_mood">
        max_capacity:<input type="text" name="max_capacity">
        space_image_url:<input type="text" name="space_image_url"> 
        space_icon_url:<input type="text" name="space_icon_url">
        is_vip_space:<input type="text" name="is_vip_space">
        opening_hours:<input type="text" name="opening_hours">
        event_id:<input type="text" name="event_id">
        tags:<input type="text" name="tags">

         {{-- State:<input type="text" name="state">
        Pincode:<input type="text" name="pincode"><br>
        Adhar:<input type="text" name="adhar">  --}}
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