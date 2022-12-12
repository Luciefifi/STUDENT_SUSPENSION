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
            <h4>update school</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('school.edit') }}" method='POST'>
                    @csrf
                    <input type="hidden" name="id" value="{{ $school->id }}" />
                    <div class="form-group">
                        <label>school name</label>
                        <input type="text" class="form-control" value="{{ $school->school_name }}" placeholder="school name" name="school_name">
                    </div>
                    <div class="form-group">
                        <label>College</label>
                        <select class="form-control" name="college_id">
                            @foreach($colleges as $college)
                                <option value={{ $college->id }} {{ $school->college->name==$college->name ? 'selected' : '' }}>{{ $college->name }}</option>
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