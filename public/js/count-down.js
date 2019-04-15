"use strict";

function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML) === 1) {

        // var url = "<?php echo $this->m_base_url?>";
        var url = "http://localhost:8888/WheeliesBikes";
        //local
        // location.href = url;
        // location.origin = url;
        // console.log(location.origin);
        var sln = location.href.length;
        console.log(location.href);
        console.log(sln);
    }
    i.innerHTML = parseInt(i.innerHTML) - 1;

}


setInterval(function () {
    countdown();
}, 1000);