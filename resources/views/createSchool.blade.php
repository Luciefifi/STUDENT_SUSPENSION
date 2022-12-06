@extends('layouts.master')

@section('title', ' create college|Student-suspension')


@section('content')


<div class="col-lg-6">
    <div class="card">

        <div>
            @foreach ($errors->all() as $error)
            <li class='alert alert-danger'>{{ $error }}</li>
            @endforeach
        </div>
        <div class="card-title">
            <h4>create a school</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action='{{ route("school.add")}}' method='POST'>
                    @csrf
                    <div class="form-group">
                        <label>school name</label>
                        <input type="text" class="form-control" placeholder="school name" name="school_name">
                    </div>
                    <div class="form-group">
                        <label>Input Select</label>
                        <select class="form-control" name="college_id">
                            @foreach($colleges as $college)
                            <option value={{ $college->id }}>{{ $college->name }}</option>

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