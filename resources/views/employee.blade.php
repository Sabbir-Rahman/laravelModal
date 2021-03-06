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
{{--add data modal--}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="store" method="POST">

                {{csrf_field()}}
                <div class="modal-body">

                    <div class="mb-3">
                        <label>First name</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter first name">

                    </div>
                    <div class="mb-3">
                        <label>Last name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter last name">

                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">

                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address">

                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Enter mobile no">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save data</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--end add data modal--}}

{{--delete modal--}}

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete this entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="deleteEmployee" method="POST">

                {{csrf_field()}}
                <div class="modal-body">

                    <div class="mb-3">
                        <label><font color="red">Are you sure?All data related with this record also be deleted</font></label>
                        <input type="hidden" name="delete_input_id" id="cat_id" value="">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--end Delete modal--}}

<div class="container">
    <h1>Welcome from laravel modal</h1>
    @if(count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
@endif

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add data with modal
    </button>

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
                    <button type="button" class="btn btn-danger" data-catid="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>
<script>
    $('#deleteModal').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)

        var cat_id = button.data('catid')
        var modal = $('#deleteModal')

        console.log(cat_id)
        modal.find('.modal-body input').val(cat_id);
    })

</script>

</body>
</html>
