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

#column2 img {
    float:left;
    padding:5px;
}

.left {
    float:left;
    padding:5px;
}
    
</style>

</head>
<body>
      
    {{ $data->client_name; }}  
    {{ $data->client_address; }} 
    {{ $todaysDate; }} 

    <div id="column2">
        <div class="left">
            <img src="{{ $logo }}" style="left:0px; top:-100%; height:100%; width:100%" />
        </div>
    </div>
</body>
</html>