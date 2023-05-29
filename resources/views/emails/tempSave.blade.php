@if($redo)
<h1>Je opdracht is afgewezen</h1>
@endif
<a href="{{route('questions.edit', ['question'=> $assignment->id, 'key'=> (string) $assignment->edit_key])}}"><button
        style="padding:1rem 2rem; border-radius: 9999px; color:white; border:none; cursor: pointer; background-color: teal; font-size: 20px; font-weight: bolder;">Aanvullen
        aanmelding</button></a>