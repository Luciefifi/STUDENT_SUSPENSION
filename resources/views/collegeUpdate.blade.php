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
                <h4>Create College</h4>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('college.edit') }}" method='POST'>
                        @csrf
                        <input type="hidden" name="id" value="{{ $college->id }}" />
                        <div class="form-group">
                            <label>college name</label>
                            <input type="text" name='name' value="{{$college->name}}" class="form-control" placeholder="college name">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
