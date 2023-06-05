<!DOCTYPE html>
<html>

<head>
    <title>{{$title}}</title>
</head>

<body>
    Beste {{$assignment->student1->first_name}} @if($assignment->student2) en {{$assignment->student2->first_name}} @endif,
    <br>
    Hierbij willen wij u laten weten dat uw aanvraag voor het Comaker-programma is goedgekeurd. Hieronder vindt u de
    details van uw inzending. Gelieve het .pdf bestand te uploaden op OnStage bij de stap "Aanmeldingsformulier".
    <br>
    Team ADSD wenst u veel succes met het beginnen van uw Afstudeer Comakership.
    <br>
    Hoogachtend,
    <br>
    Arie Ismaiel - Comakership Coördinator
</body>

</html>