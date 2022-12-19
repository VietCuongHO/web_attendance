<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>

    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border: none;
        outline: none;
        text-decoration: none;
        list-style: none;
        font-family: "Montserrat", sans-serif;
        }

        body {
        width: 100%;
        background-color: #e5e7eb;
        position: relative;
        display: flex;
        }

        #menu {
        background-color: #1E2774;
        width: 300px;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        }
        #menu .logo {
        display: flex;
        align-items: center;
        color: #fff;
        padding: 30px 0 0 30px;
        }
        #menu .logo img {
        width: 40px;
        margin-right: 15px;
        }
        #menu .items {
        margin-top: 40px;
        }
        #menu .items li {
        padding: 15px 0;
        transition: 0.3s ease;
        }
        #menu .items li i {
        color: rgb(134, 141, 151);
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-size: 14px;
        margin: 0 10px 0 25px;
        }
        #menu .items li a {
        color: rgb(134, 141, 151);
        font-weight: 400;
        transition: 0.3s ease;
        }
        #menu .items li:hover {
        background-color: #253047;
        cursor: pointer;
        }
        #menu .items li:hover i, #menu .items li:hover a {
        color: #f3f4f6;
        }
        #menu .items li:nth-child(1) {
        border-left: 4px solid #fff;
        }

        #interface {
        width: calc(100% - 300px);
        position: relative;
        }
        #interface .navigation {
        position: fixed;
        width: calc(100% - 300px);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 15px 30px;
        border-bottom: 3px solid #594ef7;
        }
        #interface .navigation .n1 .search {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 14px;
        border: 1px solid #d7dbe6;
        border-radius: 4px;
        }
        #interface .navigation .n1 .search input {
        font-size: 14px;
        }
        #interface .navigation .n1 .search i {
        margin-right: 14px;
        }
        #interface .navigation .n2 {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        }
        #interface .navigation .n2 .notification {
        position: relative;
        }
        #interface .navigation .n2 .notification-icon {
        cursor: pointer;
        margin-right: 20px;
        position: relative;
        }
        #interface .navigation .n2 .notification-icon i {
        font-size: 19px;
        font-weight: 400;
        }
        #interface .navigation .n2 .notification-icon span {
        position: absolute;
        font-size: 13px;
        background-color: #f00;
        color: #fff;
        padding: 2px;
        left: 10px;
        top: -10px;
        border-radius: 50%;
        }
        #interface .navigation .n2 .notification-icon:hover i {
        font-weight: 700;
        transition: 0.3s ease;
        }
        #interface .navigation .n2 .notification-box {
        opacity: 0;
        transition: 1s opacity, 250ms height;
        visibility: hidden;
        position: absolute;
        width: 310px;
        padding: 30px;
        background-color: #222553;
        border-radius: 10px;
        top: 35px;
        right: 10px;
        transition: all 0.3s;
        }
        #interface .navigation .n2 .notification-box::before {
        position: absolute;
        content: "";
        width: 16px;
        height: 16px;
        background-color: #222553;
        border-top-left-radius: 30px;
        top: -11px;
        right: 19px;
        }
        #interface .navigation .n2 .notification-box h3 {
        color: #dadada;
        font-size: 18px;
        margin-bottom: 4px;
        font-weight: 500;
        padding: 10px;
        border-bottom: 1px solid #eee;
        color: #828987;
        }
        #interface .navigation .n2 .notification-box h3 span {
        color: #f00;
        }
        #interface .navigation .n2 .notification-box .noti-item {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 15px 5px;
        margin-bottom: 15px;
        cursor: pointer;
        }
        #interface .navigation .n2 .notification-box .noti-item:last-child {
        margin: 0;
        }
        #interface .navigation .n2 .notification-box .noti-item img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 15px;
        }
        #interface .navigation .n2 .notification-box .noti-item .noti-text h5 {
        color: #dadada;
        }
        #interface .navigation .n2 .notification-box .noti-item .noti-text p {
        color: #7d8193;
        }
        #interface .navigation .n2 .account {
        position: relative;
        }
        #interface .navigation .n2 .account-avatar img {
        display: block;
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
        }
        #interface .navigation .n2 .account-avatar img:hover {
        opacity: 0.7;
        cursor: pointer;
        }
        #interface .navigation .n2 .account-box {
        opacity: 0;
        transition: 1s opacity, 250ms height;
        visibility: hidden;
        position: absolute;
        width: 310px;
        padding: 30px;
        background-color: #222553;
        border-radius: 10px;
        top: 40px;
        right: 0;
        transition: all 0.3s;
        }
        #interface .navigation .n2 .account-box::before {
        position: absolute;
        content: "";
        width: 16px;
        height: 16px;
        background-color: #222553;
        border-top-left-radius: 30px;
        top: -10px;
        right: 19px;
        }
        #interface .navigation .n2 .account-box .profile {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        }
        #interface .navigation .n2 .account-box .profile img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
        user-select: none;
        }
        #interface .navigation .n2 .account-box .profile .info {
        margin-left: 15px;
        }
        #interface .navigation .n2 .account-box .profile .info h3 {
        color: #dadada;
        font-size: 18px;
        margin-bottom: 4px;
        }
        #interface .navigation .n2 .account-box .profile .info p {
        color: #7d8193;
        font-size: 16px;
        font-weight: 500;
        }
        #interface .navigation .n2 .account-box .btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 250px;
        height: 53px;
        color: #e5e5e5;
        background-color: #1a1c29;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 30px;
        transition: all 0.3s;
        }
        #interface .navigation .n2 .account-box .btn i {
        margin-right: 5px;
        }
        #interface .navigation .n2 .account-box .btn:hover {
        background-color: #515677;
        }
        #interface .navigation .n2 .account-box .function li {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        }
        #interface .navigation .n2 .account-box .function li:last-child {
        margin: 0;
        }
        #interface .navigation .n2 .account-box .function li a {
        color: #e5e5e5;
        font-weight: 500;
        font-size: 16px;
        }
        #interface .navigation .n2 .account-box .function li i {
        color: #e5e5e5;
        margin-right: 10px;
        }
        #interface .i-name {
        margin-top: 70px;
        color: #444a53;
        padding: 30px 30px 0 30px;
        font-size: 24px;
        font-weight: 700;
        }
        #interface .tool-board {
        margin: 30px 30px 0 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }
        #interface .tool-board .print {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 0 12px;
        }
        #interface .tool-board .print li {
        padding: 4px 6px;
        background-color: #fff;
        border-radius: 5px;
        }
        #interface .tool-board .print li:hover a {
        color: #594ef7;
        transition: all 0.3s;
        }
        #interface .tool-board .print li a {
        color: #1a1c29;
        }
        #interface .tool-board .btn-add {
        display: flex;
        align-items: center;
        background-color: #323FAE;
        padding: 8px 14px;
        border-radius: 19px;
        color: #fff;
        font-size: 14px;
        }
        #interface .tool-board .btn-add i {
        margin-right: 10px;
        }
        #interface .tool-board .btn-add a {
        color: #fff;
        }
        #interface .search-table {
        margin: 30px 30px 0 30px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        }
        #interface .search-table div {
        display: flex;
        align-items: center;
        padding: 10px 14px;
        border: 1px solid #d7dbe6;
        border-radius: 19px;
        background-color: #fff;
        }
        #interface .search-table div input {
        font-size: 14px;
        }
        #interface .search-table div i {
        margin-right: 14px;
        }
        #interface .board {
        margin: 30px;
        overflow: auto;
        background-color: #fff;
        border-radius: 8px;
        }
        #interface .board img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 15px;
        }
        #interface .board h5 {
        font-weight: 600;
        font-style: 14px;
        }
        #interface .board p {
        font-weight: 400;
        font-size: 13px;
        color: #787d8d;
        }
        #interface .board .person {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: start;
        }
        #interface .board table {
        border-collapse: collapse;
        }
        #interface .board table tr {
        border-bottom: 1px solid #eef0f3;
        }
        #interface .board table thead td {
        font-style: 14px;
        text-transform: capitalize;
        font-weight: 400;
        background-color: #f9fafb;
        text-align: start;
        padding: 15px;
        }
        #interface .board table tbody td {
        padding: 10px 15px;
        }
        #interface .board table tbody .status .active {
        background-color: #107216;
        padding: 2px 10px;
        display: inline-block;
        border-radius: 40px;
        color: #fff;
        }
        #interface .board table tbody .edit a {
        font-size: 14px;
        font-weight: 600;
        color: #554cd1;
        }

        /*# sourceMappingURL=staff.css.map */
    </style>
</head>
<body>
    <section id="interface">
    <h3 class="i-name">Staff List</h3>

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Date of birth</td>
                    <td>Email</td>
                    <td>ID</td>
                    <td>Department</td>
                    <td>Position</td>
                    <td>Join date</td>
                    <td>Address</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td class="name">
                            <h5>{{ $item->last_name }} {{ $item->first_name }}</h5>
                        </td>
                        <td class="birth">
                            <p>{{ $item->birth_day }}</p>
                        </td>
                        <td class="email">
                            <p>cuong.ho1912820@hcmut.edu.vn</p>
                        </td>
                        <td class="id">
                            <p>{{ $item->id }}</p>
                        </td>
                        <td class="depart">
                            <p>{{ $item->department }}</p>
                        </td>
                        <td class="position">
                            <p>{{ $item->position }}</p>
                        </td>
                        <td class="date">
                            <p>{{ $item->join_day }}</p>
                        </td>
                        <td class="address">
                            <p>{{ $item->address }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
</body>
</html>
