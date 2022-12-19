@extends('admin.layout')


@section('title')
    Edit Staff
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/add.css') }}">
@endsection


@section('content')
    <h3 class="i-name">Staff List / Edit Staff</h3>

    <form class="board" action="{{ route('admin.staff.update', $staff->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h4>Edit Staff</h4>
        <div class="input-container">
            <div class="container-top">
                <div class="board-left">
                    <div class="long form" >
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{ $staff->first_name }}">
                    </div>
                    <div class="long form" >
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="{{ $staff->last_name }}">
                    </div>

                    <div  class="long form" >
                        <label for="numberphone">Phone</label>
                        <input type="text" name="numberphone" value="{{ $staff->numberphone }}">
                    </div>
                    <div  class="long form" >
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $staff->address }}">
                    </div>
                    <div class="long form" >
                        <label for="birth_day">Date of birth</label>
                        <input type="date" name="birth_day" value="{{ $staff->birth_day }}">
                    </div>
                    <div class="form">
                        <label>Gender</label>
                        <div>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="male" value="1" {{ $staff->gender == '1' ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" id="female" value="0" {{ $staff->gender == '0' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="long form" >
                        <label for="department">Department</label>
                        <input type="text" name="department" value="{{ $staff->department }}">
                    </div>
                    <div class="long form" >
                        <label for="position">Position</label>
                        <input type="text" name="position" value="{{ $staff->position }}">
                    </div>
                    <div class="long form" >
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" accept="img/*">
                    </div>
                    <div class="long form" >
                        <label for="office_id">Office ID</label>
                        <input type="number" name="office_id" value="{{ $staff->office_id }}">
                    </div>
                </div>
                <div class="board-right">
                    <div class="short form">
                        <label for="name">User Name</label>
                        <input type="text" name="name" value="{{ $account->name }}">
                    </div>
                    <div class="form">
                        <label>Role</label>
                        <div>
                            <label for="admin">Admin</label>
                            <input type="radio" name="fl_admin" id="admin" value="1" {{ $account->fl_admin == '1' ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label for="user">User</label>
                            <input type="radio" name="fl_admin" id="user" value="0" {{ $account->fl_admin == '0' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="short form" >
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $account->email }}">
                    </div>
                    <div class="short form">
                        <label for="password">Password</label>
                        <input type="text" name="password">
                    </div>
                    <div class="short form">
                        <label for="confirm">Confirm Password</label>
                        <input type="text" name="confirm">
                    </div>
                    <div class="short form">
                        <label for="face">Face</label>
                        <input type="file" name="face[]" accept="img/*" multiple>
                    </div>
                </div>
            </div>
            <h5 style="margin-bottom: 15px">About Contract</h5>
            <div class="container-bottom">
                <div class="board-left">
                    <div class="row">
                        <div class="form">
                            <label for="join_day">Join day</label>
                            <input type="date" name="join_day" value="{{ $staff->join_day }}" >
                        </div>
                        <div class="form">
                            <label for="left_day">Left day</label>
                            <input type="date" name="left_day" value="{{ $staff->left_day }}">
                        </div>
                    </div>
                </div>
                <div class="board-right">
                    <div class="short form">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" value="{{ $staff->salary }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-save">
            <button type="submit">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Save</span>
            </button>
        </div>
    </form>
    @if (session('Success'))
        {{ session('Success') }}
    @endif

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif
@endsection

{{-- @section('scripts')

@endsection --}}
