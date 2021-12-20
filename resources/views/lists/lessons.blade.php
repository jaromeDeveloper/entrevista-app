<!doctype html>
<html lang="en">
<head>
    @include('parts.headers')
    <title>Students</title>
</head>
 <body>
    @include('parts.navs')
    <div class="card">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <th scope="row">{{ $lesson->id }}</th>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($lesson->created_at)) }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($lesson->updated_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
  </body>
</html>