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
        volume: silent;
    }
    .form-check-input:checked {
        background-color: #fd850d;
        border-color: #fd710d;
    }
    h1 {
        font-size: 80px;
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(4,42,192,1) 12%, rgba(253,133,13,1) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
<div>
    <video autoplay="" muted="" loop class="background_video">
        <source src="images/cycle.mp4" type="video/mp4">
    </video>
    <div class="main_menu">
        <h1>LightOn</h1>
        <div class="form-check form-switch" style="padding-top: 10px">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" style="width: 200px; height: 100px">
        </div>
    </div>
</div>

<script>
    async function onClick()
    {
        let response = await fetch("/switch");
        response = await response.json();
    }
    window.onload = async function onLoad()
    {
        let response = await fetch("/switchinfo");
        response = await response.json();
        if(response === true)
            document.querySelector("form-check-input").setAttribute("checked", "true");
        else
            document.querySelector("form-check-input").removeAttribute("checked");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>