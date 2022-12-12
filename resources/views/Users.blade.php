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
    <div class="col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>user_type</th>
                        <th> user_email</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach($users as $user )
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td> {{ $user->name}}</td>
                            <td> {{$user->user_type}}</td>
                            <td> {{$user->email}}</td>
                        
                            <td> {{$user->image}} </td>

                            <td class="color-primary">
                                <a href="/users/{{ $user->id }}/update" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</a>
                                <a href="/users/{{ $user->id }}" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection