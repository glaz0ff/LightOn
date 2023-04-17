<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LightOn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<style>
    .main_menu{
        padding-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        max-width: 800px;
        margin: auto;
        opacity: 70%;
    }
    .background_video{
        width: 1920px;
        height: auto;
        position: fixed;
        right: 0;
        bottom: 0;
    }
    .form-check-input {
        background-color: rgba(4, 42, 192, 0.77);
    }
</style>
<div>
    <video class="background_video">
        <source src="images/cycle.mp4" type="video/mp4">
    </video>
    <div id="controls" class="hidden">
        <a id="playBtn">Play</a>
        <span id="timer">00:00</span>
        <input type="range" step="0.1" min="0" max="1" value="0" id="volume" />
    </div>

    <div class="main_menu">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 200px; height: 100px">
        </div>
    </div>
</div>

<script>
    // получаем все элементы
    var videoEl = document.getElementsByTagName('video')[0],
        playBtn = document.getElementById('playBtn'),
        vidControls = document.getElementById('controls'),
        volumeControl = document.getElementById('volume'),
        timePicker = document.getElementById('timer');

    // если браузер может воспроизводить видео удаляем класс
    videoEl.addEventListener('canplaythrough', function () {
        vidControls.classList.remove('hidden');
        videoEl.volume = volumeControl.value;
    }, false);
    // запускам или останавливаем воспроизведение
    playBtn.addEventListener('click', function () {
        if (videoEl.paused) {
            videoEl.play();
        } else {
            videoEl.pause();
        }
    }, false);

    videoEl.addEventListener('play', function () {

        playBtn.innerText = "Pause";
    }, false);

    videoEl.addEventListener('pause', function () {

        playBtn.innerText = "Play";
    }, false);

    volumeControl.addEventListener('input', function () {

        videoEl.volume = volumeControl.value;
    }, false);

    videoEl.addEventListener('ended', function () {
        videoEl.currentTime = 0;
    }, false);

    videoEl.addEventListener('timeupdate', function () {
        timePicker.innerHTML = secondsToTime(videoEl.currentTime);
    }, false);

    // рассчет отображаемого времени
    function secondsToTime(time){

        var h = Math.floor(time / (60 * 60)),
            dm = time % (60 * 60),
            m = Math.floor(dm / 60),
            ds = dm % 60,
            s = Math.ceil(ds);
        if (s === 60) {
            s = 0;
            m = m + 1;
        }
        if (s < 10) {
            s = '0' + s;
        }
        if (m === 60) {
            m = 0;
            h = h + 1;
        }
        if (m < 10) {
            m = '0' + m;
        }
        if (h === 0) {
            fulltime = m + ':' + s;
        } else {
            fulltime = h + ':' + m + ':' + s;
        }
        return fulltime;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>