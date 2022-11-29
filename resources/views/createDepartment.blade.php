@extends("layouts.master")

@section('title' , " create department|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>create department</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form>
                    <div class="form-group">
                        <label>Department name</label>
                        <input type="text" class="form-control" placeholder="department name">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection