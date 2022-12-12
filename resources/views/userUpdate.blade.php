@extends("layouts.master")

@section('title' , " create user|Student-suspension")


@section("content")


<div class="col-lg-6">
    <div class="card">
        <div class="card-title">
            <h4>Update a user</h4>

        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action='{{ route('user.edit') }}' method='POST'>
                     @csrf
                    <input type='hidden' name='id' value={{ $user->id }}  />
                    <div class="form-group">
                        <label>user name</label>
                        <input type="text" class="form-control" value={{ $user->name }} placeholder="user name" name="name">
                    </div>

                    <div class="form-group">
                        <label>User type</label>
                        <select class="form-control" name="user_type">
                            @foreach($roles as $role)
                                <option value={{ $role->name }} {{$user->user_type==$role->name ? 'selected' : ''}}>{{ $role->name }}</option>

                                 {{-- <option value={{ $college->id }} {{ $school->college->name==$college->name ? 'selected' : '' }}>{{ $college->name }}</option> --}}
                            @endforeach

                        </select>    
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" value='{{ $user->email }}' placeholder="user email" name="email">
                    </div>

                    

                    <div class="form-group">
                        <label>image</label>
                        <input type="file" class="form-control" placeholder="your picture" name="image">
                    </div>


                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection