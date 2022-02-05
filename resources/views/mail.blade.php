<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    @foreach($content->content_attributes as $contentAttribute)
        <label for="{{$contentAttribute['key']}}">{{$contentAttribute['key']}}</label><br>
        @if($contentAttribute['input_type']=='input_text')
            <input type="text" id="{{$contentAttribute['key']}}" name="{{$contentAttribute['key']}}"
                   value="{{$contentAttribute['value']}}"><br>
        @elseif($contentAttribute['input_type']=='input_number')
            <input type="number" id="{{$contentAttribute['key']}}" name="{{$contentAttribute['key']}}"
                   value="{{$contentAttribute['value']}}"><br>
        @else
            <input type="date" id="{{$contentAttribute['key']}}" name="{{$contentAttribute['key']}}"
                   value="{{$contentAttribute['value']}}"><br>
        @endif
    @endforeach

</form>

</body>
</html>