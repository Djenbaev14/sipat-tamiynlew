<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:28:20 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        
        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/hyper-config.js')}}"></script>

        <!-- App css -->
        <link href="{{asset('assets/css/app-saas.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/recorder.css')}}" rel="stylesheet" type="text/css" />
    </head>
    
    <body class="authentication-bg position-relative">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
              <div class="row justify-content-center align-items-center">
                  <div class="col-md-4" style="width: 380px">
                    <h3 class="card-title text-dark mb-2">Рахмет!</h3>
                    <p class="card-text"> Сиздиң пикириңиз {{$organization->name}} администрацияына табыслы жиберилди.</p>
                      
                  </div> <!-- end col-->

              </div>
                      <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/recorder.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

    </body>

</html>

