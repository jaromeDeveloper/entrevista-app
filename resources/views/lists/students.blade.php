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
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->password }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($student->created_at)) }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($student->updated_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
            var items = document.getElementsByClassName('nav-link');
            for (var i = 0; i < items.length; i++) { items[i].addEventListener('click', printDetails); }

            function printDetails(e) {
                for (var i = 0; i < items.length; i++) {
                    if (items[i].classList.contains("active")) {
                    items[i].classList.toggle("active")
                    }
                }
                this.classList.add("active");
            }
    </script>
  </body>
</html>