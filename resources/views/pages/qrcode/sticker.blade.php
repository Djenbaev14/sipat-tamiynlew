<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center;color: #38475A;">
  <div class="card" style="background: #fff;border: 10px solid #38475A;padding: 20px 30px;border-radius: 10px;">
    <div class="card-text" style="font-size: 30px;font-weight: bold;">Хызмет көрсетиў сапасын бахалаң</div>
    <img style="display:block;margin-left:auto;margin-right:auto;margin-top:30px;margin-bottom:30px;" src="data:image/png;base64,{{base64_encode(file_get_contents(storage_path('app/qrcode/'.$web_name.'.png')))}}" width="300px">
    <div class="title" style="font-size: 30px;font-weight: bold;">Шағымларыңызды бизге жоллаң</div> 
  </div>
</body>
</html>