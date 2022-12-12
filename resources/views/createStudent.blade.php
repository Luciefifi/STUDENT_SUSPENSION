@extends("layouts.master")

@section('title' , " create student|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>create a student</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action=" {{route('student.add')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="first name" name="firstName">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastName">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>

                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" class="form-control" placeholder="registaration number" name="regNumber">
                    </div>


            </div>


            <div class="form-group">
                <label>Input Select</label>
                <select class="form-control" name="college_id">
                    @foreach($colleges as $college)
                    <option value={{ $college->id }}>{{ $college->name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Input Select</label>
                <select class="form-control" name="school_id">
                    @foreach($schools as $school)
                    <option value={{ $school->id }}>{{ $school->school_name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Input Select</label>
                <select class="form-control" name="department_id">
                    @foreach($departments as $department)
                    <option value={{ $department->id }}>{{ $department->department_name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Input Select</label>
                <select class="form-control" name="program_id">
                    @foreach($programs as $program)
                    <option value={{ $program->id }}>{{ $program->program_name }}</option>

                    @endforeach

                </select>
            </div>


            <div class="form-group">
                <label>Telephone</label>
                <input type="text" class="form-control" placeholder="phone number" name="telephone">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" placeholder="gender" name="gender">
            </div>


            <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection