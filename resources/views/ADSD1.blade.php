@extends('layouts.app')

@section('title', 'Questions')

@section('content')


<div class="row">

  <div class="col-md-8 offset-md-2">
    @if(isset($assignment))
    <form role="form" method="POST" action="/users/{{$assignment->id}}">
      @method('PUT')
      <input type="hidden" name="edit_key" value="{{Request::get('key')}}">
      @else
      <form role="form" method="POST" action="/users">
        @endif
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
                  <label>Gegevens student 1</label>
                  <br>
                  <label for="first_name">Voornaam</label>
                  <input type="text" class="form-control" name="student_1[first_name]" id="first_name"
                    placeholder="Voornaam" @isset($assignment) value="{{$assignment->student1->first_name}}" @endisset>
                  <br>
                  <label for="last_name">Tussenvoegsel & achternaam</label>
                  <input type="text" class="form-control" name="student_1[last_name]" id="last_name"
                    placeholder="Achternaam" @isset($assignment) value="{{$assignment->student1->last_name}}" @endisset>
                  <br>
                  <label for="student_number">Studentnummer</label>
                  <input type="text" class="form-control" name="student_1[student_number]" id="student_number"
                    placeholder="Studentnummer" @isset($assignment) value="{{$assignment->student1->student_number}}"
                    @endisset>
                  <br>
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="student_1[email]" id="email" placeholder="E-mail"
                    @isset($assignment) value="{{$assignment->student1->email}}" @endisset>
                </div>
              </div>
              @if(!$graduate)
              <div class="col">

                <div class="form-group">
                  <label>Gegevens student 2</label>
                  <br>
                  <label for="first_name">Voornaam</label>
                  <input type="text" class="form-control" name="student_2[first_name]" id="first_name"
                    placeholder="Voornaam" @isset($assignment) value="{{$assignment->student2->first_name}}" @endisset>
                  <br>
                  <label for="last_name">Tussenvoegsel & achternaam</label>
                  <input type="text" class="form-control" name="student_2[last_name]" id="last_name"
                    placeholder="Achternaam" @isset($assignment) value="{{$assignment->student2->last_name}}" @endisset>
                  <br>
                  <label for="student_number">Studentnummer</label>
                  <input type="text" class="form-control" name="student_2[student_number]" id="student_number"
                    placeholder="Studentnummer" @isset($assignment) value="{{$assignment->student2->student_number}}"
                    @endisset>
                  <br>
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="student_2[email]" id="email" placeholder="E-mail"
                    @isset($assignment) value="{{$assignment->student2->email}}" @endisset>
                </div>
              </div>
              @endif
            </div>
            <div class="row">
              <div class="col">
                <!-- Drempelcheck student 1 -->
                <div class="form-group col-md" id="student_1_missing">
                  <label>Drempels student 1</label>
                  <br>
                  <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                  <input type="ec" class="form-control" name="student_1[ec]" id="ec" placeholder="45"
                    @isset($assignment) value="{{$assignment->student1->ec}}" @endisset>
                  <br>
                  <label for="modules">Welke module's staan nog open?</label>
                  <br>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project Software Development"
                      name="student_1[modules][project software development]" value="project software development"
                      @if(isset($assignment) && in_array("project software development",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">
                      Project Software Development
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren"
                      name="student_1[modules][database, ontwerpen, modelleren en programmeren]"
                      value="database, ontwerpen, modelleren en programmeren" @if(isset($assignment) &&
                      in_array("database, ontwerpen, modelleren en programmeren",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1"
                      name="student_1[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1"
                      @if(isset($assignment) && in_array("Professionele vaardigheden 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Professionele vaardigheden 1</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)"
                      name="student_1[modules][OO programmeren met een web framework (Laravel)]"
                      value="OO programmeren met een web framework (Laravel)" @if(isset($assignment) && in_array("OO
                      programmeren met een web framework (Laravel)",explode('|', $assignment->student1->modules)))
                    checked
                    @endif>
                    <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project Frameworks"
                      name="student_1[modules][Project Frameworks]" value="Project Frameworks" @if(isset($assignment) &&
                      in_array("Project Frameworks",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project Frameworks</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Development 1"
                      name="student_1[modules][Software Development 1]" value="Software Development 1"
                      @if(isset($assignment) && in_array("Software Development 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Development 1</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1"
                      name="student_1[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1"
                      @if(isset($assignment) && in_array("Project ADSD Laboratorium 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project ADSD Laboratorium 1</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2"
                      name="student_1[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2"
                      @if(isset($assignment) && in_array("Professionele vaardigheden 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Professionele vaardigheden 2</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Development 2"
                      name="student_1[modules][Software Development 2]" value="Software Development 2"
                      @if(isset($assignment) && in_array("Software Development 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Development 2</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Quality"
                      name="student_1[modules][Software Quality]" value="Software Quality" @if(isset($assignment) &&
                      in_array("Software Quality",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Quality</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2"
                      name="student_1[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2"
                      @if(isset($assignment) && in_array("Project ADSD Laboratorium 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project ADSD Laboratorium 2</label>
                  </div>
                  @if($graduate)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Product Ownership"
                      name="student_1[modules][Product Ownership]" value="Product Ownership" @if(isset($assignment) &&
                      in_array("Product Ownership",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Product Ownership</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule"
                      name="student_1[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule"
                      @if(isset($assignment) && in_array("Technisch Keuzemodule",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Technisch Keuzemodule</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Security"
                      name="student_1[modules][Software Security]" value="Software Security" @if(isset($assignment) &&
                      in_array("Software Security",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Security</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox"
                      id="Comakership Development in programmeertaal naar keuze"
                      name="student_1[modules][Comakership Development in programmeertaal naar keuze]"
                      value="Comakership Development in programmeertaal naar keuze" @if(isset($assignment) &&
                      in_array("Comakership Development in programmeertaal naar keuze",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                  </div>
                  <br>
                  <label for="previous_comakership">
                    Gelieve aan te geven welke Comakership-project je reeds hebt uitgevoerd en bij welke organisatie. Beschrijf kort de inhoud van het CoMakership</label>
                  <input type="text" class="form-control" name="student_1[previous_comakership]" id="previous_comakership" placeholder="Comakership"
                    @isset($assignment) value="{{$assignment->student1->previous_comakership}}" @endisset>
                </div>
                  @endif
                </div>
              </div>
              <!--Einde Drempelcheck student 1 -->
              <!-- Drempelcheck student 2 -->
              @if(!$graduate)
              <div class="col">
                <div class="form-group col-md" id="student_2_missing">
                  <label>Drempels student 2</label>
                  <br>
                  <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                  <input type="ec" class="form-control" name="student_2[ec]" id="ec" placeholder="45"
                    @isset($assignment) value="{{$assignment->student2->ec}}" @endisset>
                  <br>
                  <label for="modules">Welke module's staan nog open?</label>
                  <br>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project Software Development"
                      name="student_2[modules][project software development]" value="project software development"
                      @if(isset($assignment) && in_array("project software development",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">
                      Project Software Development
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren"
                      name="student_2[modules][database, ontwerpen, modelleren en programmeren]"
                      value="database, ontwerpen, modelleren en programmeren" @if(isset($assignment) &&
                      in_array("database, ontwerpen, modelleren en programmeren",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">database, ontwerpen, modelleren en programmeren</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1"
                      name="student_2[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1"
                      @if(isset($assignment) && in_array("Professionele vaardigheden 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Professionele vaardigheden 1</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)"
                      name="student_2[modules][OO programmeren met een web framework (Laravel)]"
                      value="OO programmeren met een web framework (Laravel)" @if(isset($assignment) && in_array("OO
                      programmeren met een web framework (Laravel)",explode('|', $assignment->student1->modules)))
                    checked
                    @endif>
                    <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project Frameworks"
                      name="student_2[modules][Project Frameworks]" value="Project Frameworks" @if(isset($assignment) &&
                      in_array("Project Frameworks",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project Frameworks</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Development 1"
                      name="student_2[modules][Software Development 1]" value="Software Development 1"
                      @if(isset($assignment) && in_array("Software Development 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Development 1</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1"
                      name="student_2[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1"
                      @if(isset($assignment) && in_array("Project ADSD Laboratorium 1",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project ADSD Laboratorium 1</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2"
                      name="student_2[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2"
                      @if(isset($assignment) && in_array("Professionele vaardigheden 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Professionele vaardigheden 2</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Development 2"
                      name="student_2[modules][Software Development 2]" value="Software Development 2"
                      @if(isset($assignment) && in_array("Software Development 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Development 2</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Software Quality"
                      name="student_2[modules][Software Quality]" value="Software Quality" @if(isset($assignment) &&
                      in_array("Software Quality",explode('|', $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Software Quality</label>
                  </div>
                  <div class="form-check">
                    <input data-required="true" class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2"
                      name="student_2[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2"
                      @if(isset($assignment) && in_array("Project ADSD Laboratorium 2",explode('|',
                      $assignment->student1->modules))) checked @endif>
                    <label class="form-check-label">Project ADSD Laboratorium 2</label>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
          <!-- Einde gegevens studenten -->
        </fieldset>

        <fieldset>
          <!-- Start studenten gegevens -->
          <div id="modular_questions_error" style="display: none">
            Te weinig studiepunten, helaas pindakaas
          </div>
          
          <div class="container" id="modular_questions">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  @foreach ($categories as $category)
                  <legend>{{$category->description}}</legend>
                  @if($category->custom_input == 'competentie')
                  <table class="table">
                    <thead>
                      <tr>
                        <td></td>
                        <td>Niv 1</td>
                        <td>Niv 2</td>
                        <td>Niv 3</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Analyseren</td>
                        <td><input type="radio" name="analyseren" @checked(isset($assignment) && $assignment->analyse_level == 1) id="" value="1"/></td>
                        <td><input type="radio" name="analyseren" @checked(isset($assignment) && $assignment->analyse_level == 2) id="" value="2"/></td>
                        <td><input type="radio" name="analyseren" @checked(isset($assignment) && $assignment->analyse_level == 3) id="" value="3"/></td>
                      </tr>
                          <tr>
                        <td>Adviseren</td>
                        <td><input type="radio" name="adviseren" @checked(isset($assignment) && $assignment->advise_level == 1) id="" value="1"/></td>
                        <td><input type="radio" name="adviseren" @checked(isset($assignment) && $assignment->advise_level == 2) id="" value="2"/></td>
                        <td><input type="radio" name="adviseren" @checked(isset($assignment) && $assignment->advise_level == 3) id="" value="3"/></td>
                      </tr>
                          <tr>
                        <td>Ontwerpen</td>
                        <td><input type="radio" name="ontwerpen" @checked(isset($assignment) && $assignment->design_level == 1) id="" value="1"/></td>
                        <td><input type="radio" name="ontwerpen" @checked(isset($assignment) && $assignment->design_level == 2) id="" value="2"/></td>
                        <td><input type="radio" name="ontwerpen" @checked(isset($assignment) && $assignment->design_level == 3) id="" value="3"/></td>
                      </tr>
                      <tr>
                        <td>Realiseren</td>
                        <td><input type="radio" name="realiseren" @checked(isset($assignment) && $assignment->build_level == 1) id="" value="1"/></td>
                        <td><input type="radio" name="realiseren" @checked(isset($assignment) && $assignment->build_level == 2) id="" value="2"/></td>
                        <td><input type="radio" name="realiseren" @checked(isset($assignment) && $assignment->build_level == 3) id="" value="3"/></td>
                      </tr>
                      <tr>
                        <td>Manage & control</td>
                        <td><input type="radio" name="manage" @checked(isset($assignment) && $assignment->manage_level == 1) id="" value="1"/></td>
                        <td><input type="radio" name="manage" @checked(isset($assignment) && $assignment->manage_level == 2) id="" value="2"/></td>
                        <td><input type="radio" name="manage" @checked(isset($assignment) && $assignment->manage_level == 3) id="" value="3"/></td>
                      </tr>
                    </tbody>
                  </table>
                  @endif
                  @foreach ($category->questions as $question)
                  <label for="question-{{$question->id}}">{{$question->description}}</label>
                  <textarea name="questions[{{$question->id}}]" class="form-control"
                     id="question-{{$question->id}}"
                    type="{{$question->type}}">{{isset($answers)? $answers[$question->id]->answer:''}}
                  </textarea>
                  <br>
                  @endforeach
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Einde gegevens studenten -->
        </fieldset>


        @if($graduate)
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

<script>
  document.addEventListener("DOMContentLoaded", () => {
  
    const allInput = [...document.getElementById('student_1_missing').querySelectorAll('input'), ...document.getElementById('student_2_missing').querySelectorAll('input')]
    
    allInput.forEach(item => {
      item.addEventListener('change', e => {
        blockContent(checkPassed() || (e.target.checked && e.target.dataset.required))
      })
    })
  });


function checkPassed() {
  const missingStudent1  = document.getElementById('student_1_missing').querySelectorAll('input:checked')
  const missingStudent2  = document.getElementById('student_2_missing').querySelectorAll('input:checked')
  return(missingStudent1.length > 1 || missingStudent2.length > 1)
}

function blockContent(block){
  const modularQuestions =  document.getElementById('modular_questions')
  const modularQuestionsError =  document.getElementById('modular_questions_error')
  if(block) {
    modularQuestions.style.display = 'none'
    modularQuestionsError.style.display = 'block'
  } 
  else{
    modularQuestions.style.display = 'block'
    modularQuestionsError.style.display = 'none'
  }
}
</script>