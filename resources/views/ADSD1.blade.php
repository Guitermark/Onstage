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
        <legend>Student gegevens</legend>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Gegevens student 1</label>
                <br>
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" name="student_1[first_name]" id="first_name"
                  placeholder="Voornaam">
                <br>
                <label for="last_name">Tussenvoegsel & achternaam</label>
                <input type="text" class="form-control" name="student_1[last_name]" id="last_name"
                  placeholder="Achternaam">
                <br>
                <label for="student_number">Studentnummer</label>
                <input type="text" class="form-control" name="student_1[student_number]" id="student_number"
                  placeholder="Studentnummer">
                <br>
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="student_1[email]" id="email" placeholder="E-mail">
              </div>
            </div>
            <div class="col">
              
              <div class="form-group">
                <label>Gegevens student 2</label>
                <br>
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" name="student_2[first_name]" id="first_name" placeholder="Voornaam">
                <br>
                <label for="last_name">Tussenvoegsel & achternaam</label>
                <input type="text" class="form-control" name="student_2[last_name]" id="last_name" placeholder="Achternaam">
                <br>
                <label for="student_number">Studentnummer</label>
                <input type="text" class="form-control" name="student_2[student_number]" id="student_number"
                placeholder="Studentnummer">
                <br>
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="student_2[email]" id="email" placeholder="E-mail">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group col-md-6">
                <label>Drempels student 1</label>
                <br>
                <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                <input type="ec" class="form-control" name="student_1[ec]" id="ec" placeholder="45">
                <br>
                <label for="modules">Welke module's staan nog open?</label>
                <br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Software Development"
                    name="student_1[modules][project software development]" value="project software development">
                  <label class="form-check-label">
                    Project Software Development
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren"
                    name="student_1[modules][database, ontwerpen, modelleren en programmeren]"
                    value="database, ontwerpen, modelleren en programmeren">
                  <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1"
                    name="student_1[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1">
                  <label class="form-check-label">Professionele vaardigheden 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)"
                    name="student_1[modules][OO programmeren met een web framework (Laravel)]"
                    value="OO programmeren met een web framework (Laravel)">
                  <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Frameworks"
                    name="student_1[modules][Project Frameworks]" value="Project Frameworks">
                  <label class="form-check-label">Project Frameworks</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 1"
                    name="student_1[modules][Software Development 1]" value="Software Development 1">
                  <label class="form-check-label">Software Development 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1"
                    name="student_1[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1">
                  <label class="form-check-label">Project ADSD Laboratorium 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2"
                    name="student_1[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2">
                  <label class="form-check-label">Professionele vaardigheden 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 2"
                    name="student_1[modules][Software Development 2]" value="Software Development 2">
                  <label class="form-check-label">Software Development 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Quality"
                    name="student_1[modules][Software Quality]" value="Software Quality">
                  <label class="form-check-label">Software Quality</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2"
                    name="student_1[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2">
                  <label class="form-check-label">Project ADSD Laboratorium 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Product Ownership"
                    name="student_1[modules][Product Ownership]" value="Product Ownership">
                  <label class="form-check-label">Product Ownership</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule"
                    name="student_1[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule">
                  <label class="form-check-label">Technisch Keuzemodule</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Security"
                    name="student_1[modules][Software Security]" value="Software Security">
                  <label class="form-check-label">Software Security</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Comakership Development in programmeertaal naar keuze"
                    name="student_1[modules][Comakership Development in programmeertaal naar keuze]"
                    value="Comakership Development in programmeertaal naar keuze">
                  <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                </div>
              </div>
              
            </div>
            <div class="col">
              <div class="form-group col-md-6">
                <label>Drempels student 2</label>
                <br>
                <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                <input type="ec" class="form-control" name="student_2[ec]" id="ec" placeholder="45">
                <br>
                <label for="modules">Welke module's staan nog open?</label>
                <br>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Software Development"
                    name="student_2[modules][project software development]" value="project software development">
                  <label class="form-check-label">
                    Project Software Development
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren"
                    name="student_2[modules][database, ontwerpen, modelleren en programmeren]"
                    value="database, ontwerpen, modelleren en programmeren">
                  <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1"
                    name="student_2[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1">
                  <label class="form-check-label">Professionele vaardigheden 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)"
                    name="student_2[modules][OO programmeren met een web framework (Laravel)]"
                    value="OO programmeren met een web framework (Laravel)">
                  <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project Frameworks"
                    name="student_2[modules][Project Frameworks]" value="Project Frameworks">
                  <label class="form-check-label">Project Frameworks</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 1"
                    name="student_2[modules][Software Development 1]" value="Software Development 1">
                  <label class="form-check-label">Software Development 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1"
                    name="student_2[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1">
                  <label class="form-check-label">Project ADSD Laboratorium 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2"
                    name="student_2[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2">
                  <label class="form-check-label">Professionele vaardigheden 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Development 2"
                    name="student_2[modules][Software Development 2]" value="Software Development 2">
                  <label class="form-check-label">Software Development 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Quality"
                    name="student_2[modules][Software Quality]" value="Software Quality">
                  <label class="form-check-label">Software Quality</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2"
                    name="student_2[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2">
                  <label class="form-check-label">Project ADSD Laboratorium 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Product Ownership"
                    name="student_2[modules][Product Ownership]" value="Product Ownership">
                  <label class="form-check-label">Product Ownership</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule"
                    name="student_2[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule">
                  <label class="form-check-label">Technisch Keuzemodule</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Software Security"
                    name="student_2[modules][Software Security]" value="Software Security">
                  <label class="form-check-label">Software Security</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Comakership Development in programmeertaal naar keuze"
                    name="student_2[modules][Comakership Development in programmeertaal naar keuze]"
                    value="Comakership Development in programmeertaal naar keuze">
                  <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Start studenten gegevens -->

        <!-- Drempelcheck student 1 -->

        <!-- Drempelcheck student 2 -->

        <!-- Einde gegevens studenten -->
      </fieldset>

      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">
            Aanvraag versturen
          </button>
        </div>
      </div>

    </form>
  </div>

</div>
@endsection