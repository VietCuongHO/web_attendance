@extends('admin.layout')


@section('title')
    Staff List
@endsection


@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/staff.css');}}">
@endsection


@section('content')
    <h3 class="i-name">Staff List</h3>

    <div class="tool-board">
        <ul class="print">
            <li><a href="{{ route('admin.staff.exportcsv') }}">CSV</a></li>
            <li><a href="{{ route('admin.staff.exportpdf') }}">PDF</a></li>
            <li><a href="#">PRINT</a></li>
        </ul>
        <div class="btn-add">
            <i class="fa-solid fa-plus"></i>
            <a href="{{ route('admin.staff.create') }}">New Employee</a>
        </div>
    </div>

    <div class="search-table">
        <div>
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search" size="10">
        </div>
    </div>

    <div class="board">
        @if (session('success'))
            {{ session('success') }}
        @endif
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Date of birth</td>
                    <td>Email</td>
                    <td>ID</td>
                    <td>Department</td>
                    <td>Position</td>
                    <td>Join date</td>
                    <td>Address</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $staff)
                    <tr>
                        <td class="name">
                            <h5>{{ $staff->last_name }} {{ $staff->first_name }}</h5>
                        </td>
                        <td class="gender">
                            <p>{{ $staff->gender }}</p>
                        </td>
                        <td class="birth">
                            <p>{{ $staff->birth_day }}</p>
                        </td>
                        <td class="email">
                            <p>cuong.ho1912820@hcmut.edu.vn</p>
                        </td>
                        <td class="id">
                            <p>{{ $staff->id }}</p>
                        </td>
                        <td class="depart">
                            <p>{{ $staff->department }}</p>
                        </td>
                        <td class="position">
                            <p>{{ $staff->position }}</p>
                        </td>
                        <td class="date">
                            <p>{{ $staff->join_day }}</p>
                        </td>
                        <td class="address">
                            <p>{{ $staff->address }}</p>
                        </td>
                        <td class="edit"><a href="{{ route('admin.staff.edit', $staff->id) }}">Edit</a></td>
                        <td class="delete"><a href="{{ route('admin.staff.delete', $staff->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        {!! $list->links() !!}
        </table>
    </div>
@endsection
