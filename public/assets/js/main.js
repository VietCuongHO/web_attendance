var boxNoti = document.getElementById('list-notifi')
var boxAcc = document.getElementById('list-acc')
var down = false

function toggleNotifi() {
    if (down) {
        boxNoti.style.visibility = 'hidden'
        boxNoti.style.opacity = 0
        down = false
    }
    else {
        boxNoti.style.opacity = 1; 
        boxNoti.style.visibility = 'visible'
        boxAcc.style.visibility = 'hidden'
        boxAcc.style.opacity = 0
        down = true;
    }
}

function toggleAcc() {
    if (down) {
        boxAcc.style.visibility = 'hidden'
        boxAcc.style.opacity = 0
        down = false
    }
    else {
        boxAcc.style.opacity = 1; 
        boxAcc.style.visibility = 'visible'
        boxNoti.style.visibility = 'hidden'
        boxNoti.style.opacity = 0
        down = true;
    }
}




