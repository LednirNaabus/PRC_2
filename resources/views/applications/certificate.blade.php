<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Certificate</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style>
    .gfg {
        position: relative;
        left:0px; top:0px; height:90%; width:99%
    }

    .first-txt {
        position: absolute;
        top: 300px;
        left: 298px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
        font-size: 20px;
    }

    .second-txt {
        position: absolute;
        top: 335px;
        left: 200px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
        font-size: 20px;
    }

    .third-txt {
        position: absolute;
        top: 370px;
        left: 275px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 900;
        font-size: 20px;
    }
</style>
</head>
<body>
      

    <div class="gfg">
        <img src="{{ $logo }}"style="left:0px; top:0px; height:100%; width:100%" />
        <span class="first-txt">{{ $data->client_name; }} </span>
        <span class="second-txt">{{ $data->client_address; }} </span>
        <span class="third-txt">{{ $todaysDate; }} </span>
    </div>
</body>
</html>