@extends("layouts.master")

@section('title' , " Students|Student-suspension")


@section("content")

<!-- 'program_id' , 
'firstName', 
'lastName' , 
'email' ,
'regNumber' ,
 'telephone' ,
 'gender -->

<div class="card">
    <div class="card-title">
        <h4>All students </h4>

    </div>
    <div class="col-lg-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Registration Number</th>
                            <th>Telephone</th>
                            <th>gender</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <button type="button" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</button>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <button type="button" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</button>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <button type="button" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection