<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  
  <style>
    @font-face {
      font-family: 'Arvo';
      font-style: normal;
      font-weight: 400;
      src: url(https://fonts.gstatic.com/s/arvo/v22/tDbD2oWUg0MKqScQ7Q.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
        /*======================
            404 page
        =======================*/
        
        
        .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
        }
        
        .page_404  img{ width:100%;}
        
        .four_zero_four_bg{
        
        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }
        
        
        .four_zero_four_bg h1{
        font-size:80px;
        }
        
          .four_zero_four_bg h3{
              font-size:80px;
              }
              
              .link_404{			 
          color: #fff!important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;}
          .contant_box_404{ margin-top:-50px;}
      </style>
</head>
<body>
  <section class="page_404">
    <div class="container">
      <div class="row">	
      <div class="col-sm-12 ">
      <div class="col-sm-10 col-sm-offset-1  text-center">
      <div class="four_zero_four_bg">
        <h1 class="text-center ">404</h1>
      
      
      </div>
      
      <div class="contant_box_404">
      <h3 class="h2">
      Look like you're lost
      </h3>
      
      <p>the page you are looking for not avaible!</p>
      
      <a href="{{route('organization.index')}}" class="link_404">Go to Home</a>
    </div>
      </div>
      </div>
      </div>
    </div>
  </section>
</body>
</html>