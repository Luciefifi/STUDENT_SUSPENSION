@extends("layouts.master")

@section('title' , " create program|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>create program</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">

                <form  action='{{ route("program.add")}}' method ="POST" >
                @csrf
                    <div class="form-group">
                        <label>program name</label>
                        <input type="text" class="form-control" placeholder="program name" name="program_name">
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


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection