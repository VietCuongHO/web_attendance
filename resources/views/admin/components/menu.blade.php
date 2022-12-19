<section id="menu">
    <div class="logo">
        <img src="{{asset('assets/img/logoBK.png');}}" alt="">
        <h2>HCMUT</h2>
    </div>
    <ul class="items">
        <li><i class="fa-solid fa-gauge"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><i class="fa-regular fa-user"></i><a href="{{route('admin.staff.list')}}">Staff List</a></li>
        <li><i class="fa-regular fa-clock"></i><a href="{{route('admin.attendance.list')}}">Attendance</a></li>
        <li><i class="fa-regular fa-file-lines"></i><a href="{{route('admin.report.list')}}">Attendance Report</a></li>
    </ul>
</section>
