@extends("layouts.master")

@section('title' , " All programs|Student-suspension")


@section("content")

<div class="card">
    <div class="card-title">
        <h4>All programs </h4>

    </div>
    <div class="col-lg-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>school</th>
                            <th>department</th>
                            <th> program Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($programs as $program)
                        <tr>
                        <th scope="row"> {{ $program->id }} </th>
                    
                        <td> {{ $program->department->department_name }}</td>
                        <td>{{$program->program_name}}</td>

                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <a href="/programs/{{ $program->id }}" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</a>

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