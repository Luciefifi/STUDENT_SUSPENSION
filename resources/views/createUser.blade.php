@extends("layouts.master")

@section('title' , " create user|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>create a user</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form>
<!-- 

                'name',
        'user_type',
        'email',
        'password',
        'image' -->
                    <div class="form-group">
                        <label>user name</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>user_type</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>image</label>
                        <input type="file" class="form-control" placeholder="school name">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection