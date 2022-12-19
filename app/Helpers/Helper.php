<?php

if (!function_exists('randomAvatarUrl')) {
    function randomAvatarUrl($i = 0)
    {
        $arr = [
            'https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg',
            'https://phunugioi.com/wp-content/uploads/2020/01/anh-avatar-supreme-dep-lam-dai-dien-facebook.jpg',
            'https://khoinguonsangtao.vn/wp-content/uploads/2022/07/avatar-cute-2.jpg',
            'https://demoda.vn/wp-content/uploads/2022/03/avatar-nu-1.jpg',
            'https://batterydown.vn/wp-content/uploads/2022/05/1_anh-avatar-dep-cho-con-gai.jpg',
            'https://scr.vn/wp-content/uploads/2020/07/T%E1%BA%A3i-h%C3%ACnh-n%E1%BB%81n-%C4%91%E1%BA%B9p-nh%E1%BA%A5t-1.jpg',
            'http://uyenuong.net/wp-content/uploads/2022/05/Anh-avatar-dep-cho-con-trai2B2528342529.jpg',
            'https://st.quantrimang.com/photos/image/2021/09/23/AVT-Chibi-37.jpg',
            'https://allimages.sgp1.digitaloceanspaces.com/tipeduvn/2022/01/Top-Anh-Avatar-dep-doc-ngau-lam-hinh-dai-dien-Facebook-Zalo.jpg',
            'https://www.dungplus.com/wp-content/uploads/2019/10/anh-avatar-dep-nhat.jpg',
            'https://i.9mobi.vn/cf/Images/tt/2021/8/20/anh-avatar-dep-56.jpg',
            'https://thpt-phamhongthai.edu.vn/wp-content/uploads/2022/08/anh-avatar-viet-nam-cute-ngau-tuyet-dep-10.jpg',
            'https://trinhvantuyen.com/wp-content/uploads/2022/03/hinh-anh-avatar-cho-con-gai-1-600x600.jpg',
            'https://chungcuhatecolaroma.net.vn/wp-content/uploads/2022/10/anh-avatar-dep-cho-con-gai-2.jpg',
            'https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-de-thuong.jpg',
            'https://kynguyenlamdep.com/wp-content/uploads/2022/08/avatar-nu-dep-ngau-voi-sung.jpg',
            'https://symbols.vn/wp-content/uploads/2021/11/Hinh-avatar-co-gai-toc-ngan-de-thuong.jpg',
            'https://1.bp.blogspot.com/-WuC_iGiM3X8/YNCcCboEPEI/AAAAAAAAAn8/Uz5pMisPQr0lb_usPpaQHGC6Fv6JZi7LQCLcBGAsYHQ/s0/Avatar-Dep-Taihinhanh-Vn%2B%25281%2529.png',
            'https://toigingiuvedep.vn/wp-content/uploads/2021/05/avatar-nam-dep-doc.jpg',
            'https://allimages.sgp1.digitaloceanspaces.com/tipeduvn/2022/01/1643617000_765_Hinh-anh-avatar-dep-cho-con-gai-cute-da-phong.jpg',
            'https://khoinguonsangtao.vn/wp-content/uploads/2022/08/avatar-nu-can-mong-tay-bao-ngau.jpg',
            'https://huyhoangblog.com/wp-content/uploads/2021/09/avatar-doi-cute-8-1.jpg',
            'https://chungcuhatecolaroma.net.vn/wp-content/uploads/2022/10/anh-avatar-dep-cho-con-gai-4.jpg',
            'https://kiemtientuweb.com/ckfinder/userfiles/images/avt-cute/avatar-cute-1.jpg',
            'https://luattreem.vn/wp-content/uploads/2022/04/avatar-nam-cute-600x600-1.jpg',
            'https://forestcitymalaysia.com.vn/nhung-hinh-anh-dai-dien-dep/imager_7_4745_700.jpg',
            'https://haycafe.vn/wp-content/uploads/2022/03/avatar-facebook-doc.jpg',
            'http://3.bp.blogspot.com/-nwlDGZlQpRE/UjMi5q3oOEI/AAAAAAAAD6A/Z1Wf2jMh0gM/s1600/hinh-avatar-dep-cho-facebook-1.jpg',
            'https://img1.kienthucvui.vn/uploads/2021/01/09/anh-avatar-cho-con-gai-de-thuong-nhat_043115343.jpg',
            'https://thpt-phamhongthai.edu.vn/wp-content/uploads/2022/08/anh-avatar-viet-nam-cute-ngau-tuyet-dep-1.jpg',
            'https://wall.vn/wp-content/uploads/2020/03/hinh-avatar-de-thuong-61.jpg',
            'https://freenice.net/wp-content/uploads/2021/11/Hinh-anh-avatar-cho-con-gai-dep-dang-yeu.jpg',
            'https://inkythuatso.com/uploads/images/2022/03/avt-dep-chat-cho-con-trai-29-10-09-53.jpg',
            'https://mondaycareer.com/wp-content/uploads/2020/11/%E1%BA%A3nh-avatar-%C4%91%E1%BA%B9p-c%C3%B4-g%C3%A1i-%C4%91eo-k%C3%ADnh.jpg'
        ];
        if (is_int($i) && $i >= 0 && $i < count($arr)) {
            return $arr[$i];
        }
        else return $arr[0];
    }
}



if (!function_exists('statusEmployeeMean')) {
    function statusEmployeeMean($i = 0)
    {
        $arr = [
            'Quit Job',
            'Active',
            'Maternity Leave'
        ];

        if (is_int($i) && $i >= 0 && $i < count($arr)) {
            return $arr[$i];
        }
        else return $arr[0];
    }
}
