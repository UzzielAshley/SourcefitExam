@extends('profiles.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Database</h2>
            </div>
            <div class="pull-right">
                <!-- <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create New Profile</a> -->
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $profile->name }}</td>
            <td>{{ $profile->address }}</td>
            <td>{{ $profile->contact }}</td>
            <td>{{ $profile->email }}</td>
            <td>{{ $profile->birthdate }}</td>
            <td>
                <form action="{{ route('profiles.destroy',$profile->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('profiles.show',$profile->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pull-left">
                <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create New Profile</a>
            </div>
  
    {!! $profiles->links() !!}
      
@endsection