@extends('admin.layout')


@section('title')
    Attendance
@endsection


@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/attendance.css');}}">
@endsection


@section('content')
    <h3 class="i-name">Real-time Attendance</h3>

    <div class="tool-board">
        <form class="show">
            <label for="show-text">Show</label>
            <div class="show-input">
                <input type="text" list="nrows" size="10" name="show-text">
                <!-- <i class="fa-solid fa-chevron-down"></i> -->
                <datalist id="nrows">
                    <option value="10"></option>
                    <option value="15"></option>
                    <option value="20"></option>
                    <option value="25"></option>
                </datalist>
            </div>
        </form>
        <ul class="print">
            <li><a href="{{ route('admin.attendance.exportcsv') }}">CSV</a></li>
            <li><a href="{{ route('admin.attendance.exportpdf') }}">PDF</a></li>
            <li><a href="#">PRINT</a></li>
        </ul>
    </div>

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Office</td>
                    <td>Timkeeper</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $staff)
                    <tr>
                        <td class="id">
                            <p>{{ $staff->employee_id }}</p>
                        </td>
                        <td class="name">
                            <h5>{{ $staff->first_name }} {{ $staff->last_name }}</h5>
                        </td>
                        <td class="office">
                            <p>{{ $staff->office_name }}</p>
                        </td>
                        <td class="timekeeper">
                            <p>{{ $staff->timekeeper_id }}</p>
                        </td>
                        <td class="date">
                            <p>{{ $staff->timekeeping_at }}</p>
                        </td>
                        <td class="time">
                            <p>{{ $staff->timekeeping_at }}</p>
                        </td>
                        <td class="status">
                            <p class="pass">{{ $staff->employee_id }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
