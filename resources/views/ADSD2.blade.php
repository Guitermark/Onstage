@extends('layouts.app')

@section('title', 'Questions')

@section('content')

<div class="row">

  <div class="col-md-8 offset-md-2">
    <form role="form" method="POST" action="/users">
      @csrf
      <legend class="text-center">Aanmelding Comakership</legend>
      <!-- Start van het formulier -->
      <fieldset>
        <!-- Start studenten gegevens -->
        <legend>Student gegevens</legend>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Gegevens student</label>
                <br>
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" name="student1[first_name]" id="first_name"
                  placeholder="Voornaam" @isset($assignment) value="{{$assignment->student1->first_name}}" @endisset>
                <br>
                <label for="last_name">Tussenvoegsel & achternaam</label>
                <input type="text" class="form-control" name="student1[last_name]" id="last_name"
                  placeholder="Achternaam" @isset($assignment) value="{{$assignment->student1->last_name}}" @endisset>
                <br>
                <label for="student_number">Studentnummer</label>
                <input type="text" class="form-control" name="student1[student_number]" id="student_number"
                  placeholder="Studentnummer" @isset($assignment) value="{{$assignment->student1->student_number}}"
                  @endisset>
                <br>
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="student1[email]" id="email" placeholder="E-mail"
                  @isset($assignment) value="{{$assignment->student1->email}}" @endisset>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <!-- Drempelcheck student 1 -->
              <div class="form-group col-md-6">
                <label>Drempels student</label>
                <br>
                <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                <input type="ec" class="form-control" name="student1[ec]" id="ec" placeholder="45" @isset($assignment)
                  value="{{$assignment->student1->ec}}" @endisset>
                <br>
                <label for="modules">Welke module's staan nog open?</label>
                <br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Software Development"
                    name="student1[modules][project software development]" value="project software development"
                    @if(isset($assignment) && in_array("project software development",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">
                    Project Software Development
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren"
                    name="student1[modules][database, ontwerpen, modelleren en programmeren]"
                    value="database, ontwerpen, modelleren en programmeren" @if(isset($assignment) &&
                    in_array("Database, Ontwerpen, Modelleren en programmeren",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1"
                    name="student1[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1"
                    @if(isset($assignment) && in_array("Professionele vaardigheden 1",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Professionele vaardigheden 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)"
                    name="student1[modules][OO programmeren met een web framework (Laravel)]"
                    value="OO programmeren met een web framework (Laravel)" @if(isset($assignment) && in_array("OO
                    programmeren met een web framework (Laravel)",explode('|', $assignment->student1->modules))) checked
                  @endif>
                  <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Frameworks"
                    name="student1[modules][Project Frameworks]" value="Project Frameworks" @if(isset($assignment) &&
                    in_array("Project Frameworks",explode('|', $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Project Frameworks</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 1"
                    name="student1[modules][Software Development 1]" value="Software Development 1"
                    @if(isset($assignment) && in_array("Software Development 1",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Software Development 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1"
                    name="student1[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1"
                    @if(isset($assignment) && in_array("Project ADSD Laboratorium 1",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Project ADSD Laboratorium 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2"
                    name="student1[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2"
                    @if(isset($assignment) && in_array("Professionele vaardigheden 2",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Professionele vaardigheden 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 2"
                    name="student1[modules][Software Development 2]" value="Software Development 2"
                    @if(isset($assignment) && in_array("Software Development 2",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Software Development 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Quality"
                    name="student1[modules][Software Quality]" value="Software Quality" @if(isset($assignment) &&
                    in_array("Software Quality",explode('|', $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Software Quality</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2"
                    name="student1[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2"
                    @if(isset($assignment) && in_array("Project ADSD Laboratorium 2",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Project ADSD Laboratorium 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Product Ownership"
                    name="student1[modules][Product Ownership]" value="Product Ownership" @if(isset($assignment) &&
                    in_array("Product Ownership",explode('|', $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Product Ownership</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule"
                    name="student1[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule" @if(isset($assignment)
                    && in_array("Technisch Keuzemodule",explode('|', $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Technisch Keuzemodule</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Security"
                    name="student1[modules][Software Security]" value="Software Security" @if(isset($assignment) &&
                    in_array("Software Security",explode('|', $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Software Security</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"
                    id="Comakership Development in programmeertaal naar keuze"
                    name="student1[modules][Comakership Development in programmeertaal naar keuze]"
                    value="Comakership Development in programmeertaal naar keuze" @if(isset($assignment) &&
                    in_array("Comakership Development in programmeertaal naar keuze",explode('|',
                    $assignment->student1->modules))) checked @endif>
                  <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                </div>
              </div>
            </div>
            <!--Einde Drempelcheck student 1 -->
          </div>
        </div>
        <!-- Einde gegevens studenten -->
      </fieldset>

      <fieldset>
        <!-- Start studenten gegevens -->
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-group">
                @foreach ($categories as $category)
                <legend>{{$category->description}}</legend>
                @foreach ($category->questions as $question)
                <label for="question-{{$question->id}}">{{$question->description}}</label>
                <input name="questions[{{$question->id}}]" class="form-control"
                  value="{{isset($answers)? $answers[$question->id]->answer:''}}" id="question-{{$question->id}}"
                  type="{{$question->type}}">
                <br>
                @endforeach
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- Einde gegevens studenten -->
      </fieldset>
      {{-- <div class="form-group">
        <label for="TestText">TestText</label>
        <input type="TestText" class="form-control" id="assignment[description]" name="assignment[description]"
          placeholder="Enter assignment TEMP">
      </div> --}}
      @if(Request::get('graduate'))
      <input type="checkbox" hidden checked name="graduate">
      @endif

      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" name="submit" value="save" class="btn btn-primary">
            Aanvraag versturen
          </button>
          <button type="submit" name="submit" value="temp" class="btn btn-primary">
            Tussentijds opslaan
          </button>
        </div>
      </div>

    </form>
  </div>

</div>
@endsection