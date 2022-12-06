@extends('layouts.master')

@section('title', ' All schools|Student-suspension')


@section('content')

    <div class="card">
        <div class="card-title">
            <h4>All schools </h4>

        </div>
        <div class="col-lg-6">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>College</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schools as $school)
                                <tr>
                                    <th scope="row">{{ $school->id }}</th>
                                    <th scope="row">{{ $school->college->name }}</th>

                                    <td>{{ $school->school_name }}</td>

                                    <td class="color-primary">
                                        <button type="button"
                                            class="btn btn-primary btn-outline m-b-10 m-l-5">Update</button>
                                            <a href="/schools/{{ $school->id }}"  class="btn btn-danger btn-outline m-b-10 m-l-5"> Delete</a>


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
