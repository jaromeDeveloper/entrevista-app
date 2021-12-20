<!doctype html>
<html lang="en">
<head>
    @include('parts.headers')
    <title>Students</title>
</head>
 <body>
    @include('parts.navs')
    <div class="card">
        <div class="row" style="height:550px;">
            
            <div class="col-4" style="margin-top:120px">
            <!-- Selected Student -->
                <select class=" form-select student" name="student">
                    <option value="">Students</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->email}}</option>
                    @endforeach
                </select>
            <!-- End Selected Student -->

            <!-- Alert Student -->
                <div class="alert alert-dark" role="alert">
                    Selected Student <span class="result"></span>
                </div>
            <!-- End Alert Student -->
            </div>

            <div class="col-4" >
            
                <span> <code>Select (ctrl + select ) lessons to assign</code></span>
            <!-- Select lessons -->    
            <div id="select_lesson">
                <select class="form-select"  class="form-select lesson_select" name="lesson_select" id="idlesson_select" multiple style="height:245px;">
                        <option value="">Selected Value</option>
                </select>
            </div>
            <!-- End Select lessons -->  
            
            <!-- Button Register lessons -->  
                <div class="d-grid gap-2">
                    <button type="button" id="register" class="btn btn-primary btn-lg">Assign <i class="fas fa-arrow-right"></i> </button>
                </div>
            <!-- End Button Register lessons -->  
            </div>

            <div class="col-3">
                <span> <code>Select (ctrl + select )  lessons to remove </code></span>
                <!-- Selected lessons --> 
                <div id="selected_lesson">
                <select class="form-select"   class="form-select lesson_selected" name="lesson_selected" id="idlesson_selected" multiple style="height:245px;">
                    <option value="">Selected Value</option>
                </select>
                </div>
                <!-- End Selected lessons --> 
            </div>

        </div>
    
        <div class="row">

        <div class="resulta"></div>

        </div>
    </div>

    <!-- JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

            //value navlink active
            if(window.location.pathname == '/list/lessons'){
                var elementRemove = document.getElementById("studentsLink");
                elementRemove.classList.remove("active");

                var elementAdd = document.getElementById("lessonsLink");
                elementAdd.classList.add("active");

            }else{
                var elementRemove = document.getElementById("studentsLink");
                elementRemove.classList.remove("active");

                var elementAdd = document.getElementById("asingLink");
                elementAdd.classList.add("active");
            }
    </script>

    <script>

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // token application
        const selectElement = document.querySelector('.student');
        var pid = 0;

        document.querySelector('.student').addEventListener('change', (event) => {

            pid = event.target.value; // value select student

             // select_lession
            optionsLessons = ''; // string by the element option of select_lession
            var component = ''; // string by the component selected select_lession

            // selected_lession
            optionsLessonsSelected = ''; // string by the element option of select_lession
            var componentSelected = ''; // string by the component selected select_lession


            if(pid == null){
                component = '<select class="form-select"  class="form-select lesson_select" name="lesson_select" id="idlesson_select" multiple style="height:245px;">'+''+'</select>'; // build string of component selected_lesson
                var elements = document.querySelectorAll('[id="select_lesson"]'); // select component lessons_select
                elements[0].innerHTML = component; // replace element select_lesson

                componentSelected = '<select class="form-select"  class="form-select lesson_select" id="idlesson_selected" name="lesson_select"  multiple style="height:245px;">'+''+'</select>'; // build string of component selected_lesson
                var elementsSelected = document.querySelectorAll('[id="selected_lesson"]'); // selected component lessons_select
                elementsSelected[0].innerHTML = componentSelected; // replace element selected_lesson
            }else{
                // document.addEventListener('click', function (event) { //Query Ajax  
                refreshList(pid);
            }
        });
        

    </script>

    <script>
            document.getElementById('register').addEventListener('click', function () {
                var lessonsSelected = '';                
                var options = document.getElementById('idlesson_select').selectedOptions;
                lessonsSelected = Array.from(options).map(({ value }) => value);
                // find row on array and remove
                
                fetch('http://localhost:8000/relationship/students/lessons/assign',{ // promise with vainilla, get value lessons Selected and No Selected by one student
                            headers: { 
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": csrfToken
                                },
                            method: 'post',
                            body: JSON.stringify({
                                    pid: pid,
                                    lessons:lessonsSelected
                            })
                    }).then(function(response) {
                        response.json().then(json => {  // response of the promise
                        var message = Object.values(json);
                            if( message[0][0]['Mensaje'] == 'Se inserto correctamente'){
                                //refresh list
                                lessonsSelected = [];
                                optionsLessonsSelected = '';
                                optionsLessons = '';
                                // clean list
                                component = '<select class="form-select"  class="form-select lesson_select" name="lesson_select" id="idlesson_select" multiple style="height:245px;">'+''+'</select>'; // build string of component selected_lesson
                                var elements = document.querySelectorAll('[id="select_lesson"]'); // select component lessons_select
                                elements[0].innerHTML = component; // replace element select_lesson

                                componentSelected = '<select class="form-select"  class="form-select lesson_select" name="lesson_select" id="idlesson_selected" multiple style="height:245px;">'+''+'</select>'; // build string of component selected_lesson
                                var elementsSelected = document.querySelectorAll('[id="selected_lesson"]'); // selected component lessons_select
                                elementsSelected[0].innerHTML = componentSelected; // replace element selected_lesson

                                refreshList(pid); // refresh elements
                                
                                
                            }

                    });


                    }).catch(function(error) {
                        console.log(error);
                    });
            });
    </script>

    <script>
        function refreshList(pid){
             fetch('http://localhost:8000/relationship/list/lessons/assign',{ // promise with vainilla, get value lessons Selected and No Selected by one student
                        headers: { 
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": csrfToken
                            },
                        method: 'post',
                        //credentials: "same-origin",
                        body: JSON.stringify({
                                pid: pid
                        })
                }).then(function(response) {
                    response.json().then(json => {  // response of the promise
                        var lists = Object.values(json); // take out elements of array
  
                        for(var x=0; x<lists[0].lessons.length; x++ ){ // for select_lession
                            optionsLessons += '<option value="'+lists[0].lessons[x].id+'">'+lists[0].lessons[x].name+'</option>';
                        }
                        
                        for(var x=0; x<lists[0].lessons_selected.length; x++ ){ // for selected_lession
                            optionsLessonsSelected += '<option value="'+lists[0].lessons_selected[x].id+'">'+lists[0].lessons_selected[x].name+'</option>';
                        }

                        componentSelected = '<select class="form-select"  class="form-select lesson_select" name="lesson_select" multiple style="height:245px;">'+ optionsLessonsSelected+'</select>'; // build string of component selected_lesson
                        var elementsSelected = document.querySelectorAll('[id="selected_lesson"]'); // selected component lessons_select
                        elementsSelected[0].innerHTML = componentSelected; // replace element selected_lesson


                        component = '<select class="form-select"  class="form-select lesson_select" name="lesson_select" id="idlesson_select" multiple style="height:245px;">'+ optionsLessons+'</select>'; // build string of component selected_lesson
                        var elements = document.querySelectorAll('[id="select_lesson"]'); // select component lessons_select
                        elements[0].innerHTML = component; // replace element select_lesson

                    });


                }).catch(function(error) {
                    console.log(error);
                });
            }

    </script>
    

  </body>
</html>