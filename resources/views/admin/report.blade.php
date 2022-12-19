@extends('admin.layout')


@section('title')
    Report
@endsection


@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/report.css');}}">
@endsection


@section('content')
    <h3 class="i-name">Attendance Report</h3>

    <div class="filter">

        <div class="filter-depart">
            <form>
                <label for="depart">Department</label>
                <div class="filter-input">
                    <input type="text" list="departs" name="depart">
                    <!-- <i class="fa-solid fa-chevron-down"></i> -->
                </div>
                <datalist id="departs">
                    <option>Software</option>
                    <option>Finance</option>
                    <option>Guard</option>
                    <option>Health</option>

                </datalist>
            </form>
            <div class="filter-btn">
                <span>Filter</span>
            </div>
        </div>

        <div class="filter-date">
            <form>
                <label for="start-date">Start date</label>
                <div class="filter-input">
                    <input type="date" name="start-date">
                </div>
            </form>
            <form>
                <label for="end-date">End date</label>
                <div class="filter-input">
                    <input type="date" name="end-date">
                </div>
            </form>
            <div class="get-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Get</span>
            </div>
        </div>
    </div>

    <div class="tool-board">
        <form class="show">
            <label for="show-text">Show</label>
            <div class="show-input">
                <input type="text" list="nrows" size="10" name="show-text">
                <!-- <i class="fa-solid fa-chevron-down"></i> -->
            </div>
            <datalist id="nrows">
                <option value="10"></option>
                <option value="15"></option>
                <option value="20"></option>
                <option value="25"></option>
            </datalist>
        </form>
        <ul class="print">
            <li><a href="#">CSV</a></li>
            <li><a href="#">PDF</a></li>
            <li><a href="#">PRINT</a></li>
        </ul>
    </div>

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Reason</td>
                    <td>Date</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="id">
                        <p>1912820</p>
                    </td>
                    <td class="name">
                        <h5>Ho Viet Cuong</h5>
                    </td>
                    <td class="date">
                        <p>E, may cham cong tui bi sai kia</p>
                    </td>
                    <td class="date">
                        <p>Fri 14-10-2022 9:00:22</p>
                    </td>
                    <td class="workhour">
                        <p></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
