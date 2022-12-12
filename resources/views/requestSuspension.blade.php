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

                <form  action='{{ route("suspension.request")}}' method ="POST" >
                @csrf
                <div class="form-group">
                        <label>first name</label>
                        <input type="text" class="form-control" placeholder="program name" name="firstname">
                </div>

                    <div class="form-group">
                        <label>last name</label>
                        <input type="text" class="form-control" placeholder="program name" name="lastname">
                    </div>
                    <div class="form-group">
                        <label>regNumber</label>
                        <input type="number" class="form-control" placeholder="program name" name="regNumber">
                    </div>

                    <div class="form-group">
                        <label>level</label>
                        <input type="text" class="form-control" placeholder="program name" name="level">
                    </div>

                    <div class="form-group">
                        <label>from</label>
                        <input type="date" class="form-control" placeholder="program name" name="from">
                    </div>

                    <div class="form-group">
                        <label>to</label>
                        <input type="date" class="form-control" placeholder="program name" name="to">
                    </div>

                    <div class="form-group">
                        <label>Reasond</label>
                        <textarea class="form-control" rows="3" placeholder="Reasons" name='reasons'></textarea>
                    </div>
                    <div class="form-group">
                        <label>program name</label>
                        <input type="text" class="form-control" placeholder="program name" name="reasons">
                    </div>

                    <div class="form-group">
                        <label>supporting document</label>
                        <input type="file" class="form-control" placeholder="program name" name="supporting_doc">
                    </div>                   

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection