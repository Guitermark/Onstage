<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/app.css" rel="stylesheet">
    <!-- Onderstaande maakt letters klein, maar wel mooier, moet dit nog oplossen -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Comakership</title>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <form role="form" method="POST" action="/users">
                    @csrf
                    <legend class="text-center">Aanmelding Comakership</legend>
<!-- Start van het formulier -->
                    <fieldset>
                        <legend>Student gegevens</legend>
<!-- Start studenten gegevens -->
                            <div class="form-group col-md-6">
                                <label>Gegevens student 1</label>
                                <br>
                                <label for="first_name">Voornaam</label>
                                <input type="text" class="form-control" name="student_1[first_name]" id="first_name" placeholder="Voornaam">
                                <br>
                                <label for="last_name">Tussenvoegsel & achternaam</label>
                                <input type="text" class="form-control" name="student_1[last_name]" id="last_name" placeholder="Achternaam">
                                <br>
                                <label for="student_number">Studentnummer</label>
                                <input type="text" class="form-control" name="student_1[student_number]" id="student_number" placeholder="Studentnummer">
                                <br>
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="student_1[email]" id="email" placeholder="E-mail">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Gegevens student 2</label>
                                <br>
                                <label for="first_name">Voornaam</label>
                                <input type="text" class="form-control" name="student_2[first_name]" id="first_name" placeholder="Voornaam">
                                <br>
                                <label for="last_name">Tussenvoegsel & achternaam</label>
                                <input type="text" class="form-control" name="student_2[last_name]" id="last_name" placeholder="Achternaam">
                                <br>
                                <label for="student_number">Studentnummer</label>
                                <input type="text" class="form-control" name="student_2[student_number]" id="student_number" placeholder="Studentnummer">
                                <br>
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="student_2[email]" id="email" placeholder="E-mail">
                            </div>
<!-- Drempelcheck student 1 -->
                        <div class="form-group col-md-6">
                            <label>Drempels student 1</label>
                            <br>
                            <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                            <input type="ec" class="form-control" name="student_1[ec]" id="ec" placeholder="45">
                            <br>
                            <label for="modules">Welke module's staan nog open?</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project Software Development" name="student_1[modules][project software development]" value="project software development">
                                <label class="form-check-label">
                                    Project Software Development
                                </label>
                              </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren" name="student_1[modules][database, ontwerpen, modelleren en programmeren]" value="database, ontwerpen, modelleren en programmeren">
                                <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1" name="student_1[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1">
                                <label class="form-check-label">Professionele vaardigheden 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)" name="student_1[modules][OO programmeren met een web framework (Laravel)]" value="OO programmeren met een web framework (Laravel)">
                                <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project Frameworks" name="student_1[modules][Project Frameworks]" value="Project Frameworks">
                                <label class="form-check-label">Project Frameworks</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Development 1" name="student_1[modules][Software Development 1]" value="Software Development 1">
                                <label class="form-check-label">Software Development 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1" name="student_1[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1">
                                <label class="form-check-label">Project ADSD Laboratorium 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2" name="student_1[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2">
                                <label class="form-check-label">Professionele vaardigheden 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Development 2" name="student_1[modules][Software Development 2]" value="Software Development 2">
                                <label class="form-check-label">Software Development 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Quality" name="student_1[modules][Software Quality]" value="Software Quality">
                                <label class="form-check-label">Software Quality</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2" name="student_1[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2">
                                <label class="form-check-label">Project ADSD Laboratorium 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Product Ownership" name="student_1[modules][Product Ownership]" value="Product Ownership">
                                <label class="form-check-label">Product Ownership</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule" name="student_1[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule">
                                <label class="form-check-label">Technisch Keuzemodule</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Security" name="student_1[modules][Software Security]" value="Software Security">
                                <label class="form-check-label">Software Security</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Comakership Development in programmeertaal naar keuze" name="student_1[modules][Comakership Development in programmeertaal naar keuze]" value="Comakership Development in programmeertaal naar keuze">
                                <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                              </div>
                        </div>

<!-- Drempelcheck student 2 -->
                        <div class="form-group col-md-6">
                            <label>Drempels student 2</label>
                            <br>
                            <label for="ec">Aantal (tot nog toe) behaalde EC's</label>
                            <input type="ec" class="form-control" name="student_2[ec]" id="ec" placeholder="45">
                            <br>
                            <label for="modules">Welke module's staan nog open?</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project Software Development" name="student_2[modules][project software development]" value="project software development">
                                <label class="form-check-label">
                                    Project Software Development
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Database, Ontwerpen, Modelleren en Programmeren" name="student_2[modules][database, ontwerpen, modelleren en programmeren]" value="database, ontwerpen, modelleren en programmeren">
                                <label class="form-check-label">Database, Ontwerpen, Modelleren en Programmeren</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 1" name="student_2[modules][Professionele vaardigheden 1]" value="Professionele vaardigheden 1">
                                <label class="form-check-label">Professionele vaardigheden 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="OO programmeren met een web framework (Laravel)" name="student_2[modules][OO programmeren met een web framework (Laravel)]" value="OO programmeren met een web framework (Laravel)">
                                <label class="form-check-label">OO programmeren met een web framework (Laravel)</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project Frameworks" name="student_2[modules][Project Frameworks]" value="Project Frameworks">
                                <label class="form-check-label">Project Frameworks</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Development 1" name="student_2[modules][Software Development 1]" value="Software Development 1">
                                <label class="form-check-label">Software Development 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 1" name="student_2[modules][Project ADSD Laboratorium 1]" value="Project ADSD Laboratorium 1">
                                <label class="form-check-label">Project ADSD Laboratorium 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Professionele vaardigheden 2" name="student_2[modules][Professionele vaardigheden 2]" value="Professionele vaardigheden 2">
                                <label class="form-check-label">Professionele vaardigheden 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Development 2" name="student_2[modules][Software Development 2]" value="Software Development 2">
                                <label class="form-check-label">Software Development 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Quality" name="student_2[modules][Software Quality]" value="Software Quality">
                                <label class="form-check-label">Software Quality</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Project ADSD Laboratorium 2" name="student_2[modules][Project ADSD Laboratorium 2]" value="Project ADSD Laboratorium 2">
                                <label class="form-check-label">Project ADSD Laboratorium 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Product Ownership" name="student_2[modules][Product Ownership]" value="Product Ownership">
                                <label class="form-check-label">Product Ownership</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Technisch Keuzemodule" name="student_2[modules][Technisch Keuzemodule]" value="Technisch Keuzemodule">
                                <label class="form-check-label">Technisch Keuzemodule</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Software Security" name="student_2[modules][Software Security]" value="Software Security">
                                <label class="form-check-label">Software Security</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="Comakership Development in programmeertaal naar keuze" name="student_2[modules][Comakership Development in programmeertaal naar keuze]" value="Comakership Development in programmeertaal naar keuze">
                                <label class="form-check-label">Comakership Development in programmeertaal naar keuze</label>
                              </div>
                        </div>

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
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>


{{-- @foreach ($categories as $category)
    <h1>{{$category->description}}</h1>
    @foreach ($category->questions as $question)
    <h2>{{$question->description}} </h2>

    @endforeach
@endforeach --}}