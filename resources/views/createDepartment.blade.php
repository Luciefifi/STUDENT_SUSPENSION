@extends("layouts.master")

@section('title' , " create department|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">


    <div>
            @foreach ($errors->all() as $error)
            <li class='alert alert-danger'>{{ $error }}</li>
            @endforeach
        </div>
        <div class="card-title">
            <h4>create department</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">


             <form action='{{ route("department.add")}}' method='POST'>
                    @csrf
                    <div class="form-group">
                        <label>Department name</label>
                        <input type="text" class="form-control" placeholder="department name">
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
                            <option value={{ $school->id }}>{{ $school->name }}</option>

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