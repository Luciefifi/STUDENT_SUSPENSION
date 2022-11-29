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
<!-- 'program_id' , 
'firstName', 
'lastName' , 
'email' ,
'regNumber' ,
 'telephone' ,
 'gender -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>
                    
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>


                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" placeholder="school name">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="file" class="form-control" placeholder="school name">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection