@extends("layouts.master")

@section('title' , " All schools|Student-suspension")


@section("content")



<!-- 'name',
        'user_type',
        'email',
        'password',
        'image' --> 

<div class="card">
    <div class="card-title">
        <h4>All Users </h4>

    </div>
    <div class="col-lg-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>user_type</th>
                            <th>User_email</th>
                            <th>user_image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <a href="/users/{{ $user->id }}" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</a>

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