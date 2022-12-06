@extends("layouts.master")

@section('title' , " All colleges|Student-suspension")


@section("content")

<div class="card">
    <div class="card-title">
        <h4>All Colleges </h4>

    </div>
    <div class="col-lg-6">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colleges as $college )
                        <tr>
                            <th scope="row">{{ $college->id }}</th>
                            <td>{{ $college->name }}</td>

                            <td class="color-primary">
                                
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <a href="/colleges/{{ $college->id }}"  class="btn btn-danger btn-outline m-b-10 m-l-5"> Delete</a>
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