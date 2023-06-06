@if($redo)
<h1>Aanvraag afgekeurd</h1>

<body>
        Beste {{$assignment->student1->first_name}} @if($assignment->student2) en {{$assignment->student2->first_name}}
        @endif,
        <br>
        Wij willen u bedanken voor uw aanmeldingsformulier. Helaas moeten wij u laten weten dat uw aanvraag afgekeurd is
        vanwege enkele kwesties die in uw inzending zijn aangetroffen.
        <br>
        <br>
        <div>
        Opmerkingen: {{$assignment->feedback}}
        </div>
        <br>
        <br>
        Om deze reden dient u uw formulier te verbeteren en opnieuw in te dienen. Wij adviseren u om de opmerkingen van
        de beoordelaar zorgvuldig te bestuderen en deze te gebruiken om uw aanvraag te verbeteren.
        <br>
        U kunt het formulier wijzigen door op de volgende link te klikken: <a id="adjust"
                href="{{route('questions.edit', ['question'=> $assignment->id, 'key'=> (string) $assignment->edit_key])}}"><button
                        style="padding:1rem 2rem; border-radius: 9999px; color:white; border:none; cursor: pointer; background-color: teal; font-size: 20px; font-weight: bolder;">Aanvullen
                        aanmelding</button></a> .
        <br>
        Wij kijken uit naar uw verbeterde inzending.
        <br>
        Hoogachtend,
         <br>
        Arie Ismaiel - Comakership Coördinator
</body>
@else
<a id="adjust"
        href="{{route('questions.edit', ['question'=> $assignment->id, 'key'=> (string) $assignment->edit_key])}}"><button
                style="padding:1rem 2rem; border-radius: 9999px; color:white; border:none; cursor: pointer; background-color: teal; font-size: 20px; font-weight: bolder;">Aanvullen
                aanmelding</button></a>
@endif