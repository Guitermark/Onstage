<!DOCTYPE html>
<html>

<head>
    <title>{{$title}}</title>
</head>

<body>
    <div style="display:flex; gap:1rem">
        <a href="{{route('user.grade', ['question'=> $assignment->id, 'key'=> (string) $assignment->grade_key, 'accept'=>true])}}"><button
                style="padding:1rem 2rem; border-radius: 9999px; color:white; border:none; cursor: pointer; background-color: green; font-size: 20px; font-weight: bolder;">Accepteer
                aanmelding</button></a>
        <a href="{{route('user.grade', ['question'=> $assignment->id, 'key'=> (string) $assignment->grade_key, 'accept'=>false])}}"><button
                style="padding:1rem 2rem; border-radius: 9999px; color:white; border:none; cursor: pointer; background-color: tomato; font-size: 20px; font-weight: bolder;">Weiger
                aanmelding</button></a>
    </div>
</body>

</html>