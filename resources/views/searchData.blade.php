<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

</head>
<body>

<div class="container">

    <br><br><br><br>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Data Table</a>
            <form action="search" method="POST" class="d-flex">
                @csrf
                <h6><font color="#dcdcdc">Search By:</font></h6>&nbsp&nbsp
                <select name="search_option" class="form-select" aria-label="Default select example">
                    <option value="fname" selected>First name</option>
                    <option value="lname">Last name</option>
                    <option value="email">Email</option>
                    <option value="address">Address</option>
                    <option value="mobile">Mobile</option>
                </select>

                &nbsp&nbsp&nbsp&nbsp
                <input class="form-control me-2" type="search" name="search_data" placeholder="Search"
                       aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <table id="datatable" class="table table-dark table-striped">
        <thead>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Mobile</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td scope="row">{{$employee['id']}}</td>
                <td scope="row">{{$employee['fname']}}</td>
                <td scope="row">{{$employee['lname']}}</td>
                <td scope="row">{{$employee['email']}}</td>
                <td scope="row">{{$employee['address']}}</td>
                <td scope="row">{{$employee['mobile']}}</td>
                <td>
                    <a href="{{route('form.edit',$employee->id)}}" class="btn btn-primary">EDIT</a>
                    <a href="{{route('delete',$employee->id)}}" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>

</body>
</html>
