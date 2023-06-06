<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Nieuw aanmeldformulier Comakership</title>
</head>

<body>
    <style>
        .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }
      
      .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
      }
      
      .styled-table th,
      .styled-table td {
          padding: 12px 15px;
      }
      
      .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
      }
      
      .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }
      
      .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
      }
      </style>

    <table class="styled-table">
        <thead>
            <tr>
                <th></th>
                <th>{{$assignment->student1->first_name}} {{$assignment->student1->last_name}}</th>
                @isset($assignment->student2)
                <th>{{$assignment->student2->first_name}} {{$assignment->student2->last_name}}</th>
                @endisset
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Student nummer</td>
                <td>{{$assignment->student1->student_number}}</td>
                @isset($assignment->student2)
                <td>{{$assignment->student2->student_number}}</td>
                @endisset
            </tr>
            <tr>
                <td>email</td>
                <td>{{$assignment->student1->email}}</td>
                @isset($assignment->student2)
                <td>{{$assignment->student2->email}}</td>
                @endisset
            </tr>
            <tr>
                <td>ec</td>
                <td>{{$assignment->student1->ec}}</td>
                @isset($assignment->student2)
                <td>{{$assignment->student2->ec}}</td>
                @endisset
            </tr>
            <tr>
                <td>modules</td>
                <td>{{$assignment->student1->modules}}</td>
                @isset($assignment->student2)
                <td>{{$assignment->student2->modules}}</td>
                @endisset
            </tr>
            <tr>
                <td>Vorige Comakership</td>
                <td>{{$assignment->student1->previous_comakership}}</td>
                @isset($assignment->student2)
                <td>{{$assignment->student2->previous_comakership}}</td>
                @endisset
            </tr>
        </tbody>
    </table>
    <table class="styled-table">
        @foreach ($categories as $category)
        <tr><th colspan="2"> {{$category->description}}</th></tr>
            @foreach ($category->questions as $question)
            <tr>
                <td>{{$question->description}}</td>
                <td>{{isset($answers)? $answers[$question->id]->answer:''}}</td>
            </tr>
            @endforeach
        @endforeach
    </table>
</body>

</html>