@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table">
                <thead>
                    <th>emp_ID</th>
                    <th>emp_name</th>
                    <th>emp_contact</th>
                    <th>city</th>
                    <th>dept_ID</th>
                    <th>desig_ID</th>
                    <th>eORa</th>
                    <th>update</th>
                    <th>Action</th>
                    <th>Action</th>
                </thead>
                @if(($data))
                    @foreach($data as $row) 
                        <tr><td>{{$row['emp_ID']}}</td>
                            <td>{{$row['emp_name']}}</td>
                            <td>{{$row['emp_contact']}}</td>
                            <td>{{$row['city']}}</td>
                            <td>{{$row['dept_ID']}}</td>
                            <td>{{$row['desig_ID']}}</td>
                            <td>{{$row['eORa']}}</td>
                            <td>{{$row['updateDate']}}</td>
                            <td><a href="{{ route('edit', ['id' => $row['emp_ID']]) }}">EDIT</a></td>
                            <td><a href="{{ route('delete', ['id' => $row['emp_ID']]) }}">DELETE</a></td>
                    @endforeach
                @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
