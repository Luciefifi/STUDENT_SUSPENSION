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
                <form>
                    <div class="form-group">
                        <label>program name</label>
                        <input type="text" class="form-control" placeholder="program name">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection