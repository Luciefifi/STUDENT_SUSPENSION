@extends("layouts.master")

@section('title' , " All Departments|Student-suspension")


@section("content")

<div class="card">
    <div class="card-title">
        <h4>All Departments </h4>

    </div>
    <div class="col-lg-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>College</th>
                            <th>School</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <th scope="row">{{ $department->id }}</th>
                            <td>{{ $department->college->name }}</td>
                            <td>{{ $department->school->school_name }}</td>
                            <td>{{$department->department->department_name}}</td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <button type="button" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</button>

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