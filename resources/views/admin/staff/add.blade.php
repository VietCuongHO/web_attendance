@extends('admin.layout')


@section('title')
    Add Staff
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/add.css') }}">
@endsection


@section('content')
    <h3 class="i-name">Staff List / Add New Staff</h3>

    <form class="board" action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4>Add New Staff</h4>
        <div class="input-container">
            <div class="container-top">
                <div class="board-left">
                    <div class="long form" >
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name">
                    </div>
                    <div class="long form" >
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name">
                    </div>

                    <div  class="long form" >
                        <label for="numberphone">Phone</label>
                        <input type="text" name="numberphone">
                    </div>
                    <div  class="long form" >
                        <label for="address">Address</label>
                        <input type="text" name="address">
                    </div>
                    <div class="long form" >
                        <label for="birth_day">Date of birth</label>
                        <input type="date" name="birth_day">
                    </div>
                    <div class="form">
                        <label>Gender</label>
                        <div>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="male" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" id="female" value="0" {{ old('gender') === '0' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="long form" >
                        <label for="department">Department</label>
                        <input type="text" name="department">
                    </div>
                    <div class="long form" >
                        <label for="position">Position</label>
                        <input type="text" name="position">
                    </div>
                    <div class="long form" >
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" accept="img/*">
                    </div>
                    <div class="long form" >
                        <label for="office_id">Office ID</label>
                        <input type="number" name="office_id">
                    </div>
                    {{-- <div class="long form" >
                        <label for="note">Content</label>
                        <textarea id="editor" name="note" rows="10"></textarea>
                    </div> --}}
                </div>
                <div class="board-right">
                    <div class="short form">
                        <label for="name">User Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form">
                        <label>Role</label>
                        <div>
                            <label for="admin">Admin</label>
                            <input type="radio" name="fl_admin" id="admin" value="1" {{ old('fl_admin') === '1' ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label for="user">User</label>
                            <input type="radio" name="fl_admin" id="user" value="0" {{ old('fl_admin') === '0' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="short form" >
                        <label for="email">Email</label>
                        <input type="email" name="email">
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
                        <label for="image_url[]">Face</label>
                        <input type="file" name="image_url[]" accept="img/*" multiple>
                    </div>
                </div>
            </div>
            <h5 style="margin-bottom: 15px">About Contract</h5>
            <div class="container-bottom">
                <div class="board-left">
                    <div class="row">
                        <div class="form">
                            <label for="join_day">Join day</label>
                            <input type="date" name="join_day" >
                        </div>
                        <div class="form">
                            <label for="left_day">Left day</label>
                            <input type="date" name="left_day">
                        </div>
                    </div>
                </div>
                <div class="board-right">
                    <div class="short form">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary">
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection --}}
