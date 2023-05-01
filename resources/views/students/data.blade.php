@extends('layout.main')

@section('content')
@if (session()->has("username"))
<h5>
    Hello, {{ session()->get("username") }}
    <a href="/logout">Log Out</a>
</h5>
@endif
<h3>Data Students</h3>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
        <i class="fas fa-plus-circle"></i>Add New Data
    </button>
    </div>
    <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!! </strong> {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
@endif
        <div class="alert alert-info">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Student</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $row->idstudents }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ ($row->gender=='M')?'Male' : 'Female' }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->emailaddress }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                            <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display : inline" method="POST" action="{{ url('students/'.$row->idstudents) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete Data" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
<script>
   function deleteData(name){
    message = confirm('Are you sure to delete the data?');
    if(message) return true;
    else return false;
   }
</script>
@endsection