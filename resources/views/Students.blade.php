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
                            <th>FName</th>
                            <th>LName</th>
                            <th>Email</th>
                            <th>Reg. no</th>
                            <!-- <th>Level</th> -->
                            <th>school</th>
                            <th>department</th>
                            <th>program</th>
                            <th>phone</th>
                            <th>gender</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td> {{ $student->school->school_name }} </td>
                        <td> {{ $student->department->department_name }}</td>
                        <td>{{$student-> program->program_name}}</td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->regNumber}}</td>
                        <td>{{$student->telephone}}</td>
                        <td>{{$student->gender}}</td>
                            <td class="color-primary">
                                <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                <a href="/Students/{{ $student->id }}" class="btn btn-danger btn-outline m-b-10 m-l-5">Delete</a>

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