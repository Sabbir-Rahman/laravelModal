<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<body>





<div class="container">
    {{--edit data modal--}}

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editing id {{$data['id']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/abc" method="POST" >

                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="hidden" name="id" id="edit-fname" value="{{$data['id']}}" class="form-control" placeholder="Enter first name">

                        </div>
                        <div class="mb-3">
                            <label>First name</label>
                            <input type="text" name="fname" id="edit-fname" value="{{$data['fname']}}" class="form-control" placeholder="Enter first name">

                        </div>
                        <div class="mb-3">
                            <label>Last name</label>
                            <input type="text" name="lname" id="edit-lname" value="{{$data['lname']}}" class="form-control" placeholder="Enter last name">

                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="edit-email" value="{{$data['email']}}" class="form-control" placeholder="Enter email">

                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" name="address" id="edit-address" value="{{$data['address']}}" class="form-control" placeholder="Enter Address">

                        </div>
                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="number" name="mobile" id="edit-mobile" value="{{$data['mobile']}}" class="form-control" placeholder="Enter mobile no">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update data</button>
                    </div>
                </form>
            </div>
        </div>

    {{--end edit data modal--}}

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>

</body>
</html>
