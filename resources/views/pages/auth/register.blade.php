<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:28:20 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Register | qrMap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Theme Config Js -->
        <script src="assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg">

        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200'/>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100'/>
                </g>
            </svg>
        </div>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            {{-- <div class="card-header py-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="assets/images/logo.png" alt="logo" height="22"></span>
                                </a>
                            </div> --}}

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Регистрация</h4>
                                </div>
                                <?php
      // echo DNS2D::getBarcodeHTML('https://qrmap.ru/organization/dbc-2/review', 'QRCODE');

                                ?>
                                
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session()->get('error') }}</strong>
                                    </div>
                                @endif
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="organization" class="form-label">Название Организации</label>
                                        <input class="form-control" type="text" value="{{old('organization_name')}}" name="organization_name" id="organization" placeholder="Введите название Организации" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="name" class="form-label">Имя представителя</label>
                                      <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}" placeholder="Введите имя представителя" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="example-email" class="form-label">Телефон номер:</label>
                                      <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="basic-addon1">+998</span>
                                        <input type="phone" required name="phone" id="example-email" aria-describedby="basic-addon1" name="example-email" class="form-control" placeholder="998765432" value="{{old('phone')}}">
                                      </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" value="{{old('email')}}" required placeholder="Введите e-mail">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Пароль</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}"  placeholder="Введите пароль">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Повторите пароль</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="confirm_password" value="{{old('confirm_password')}}" id="confirm_password" class="form-control" placeholder="Введите пароль ещё раз">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 text-center">
                                        <button class="btn btn-lg btn-primary" type="submit"> Регистрация </button>
                                    </div>

                                </form>
                                
                        <div class="row mt-3">
                          <div class="col-12 text-center">
                              <p class="text-muted">У вас уже есть аккаунт?<a href="{{route('login-page')}}" class="text-muted ms-1"><b>Вход</b></a></p>
                          </div> <!-- end col-->
                      </div>
                      <!-- end row -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        @include('sweetalert::alert')
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:28:20 GMT -->
</html>
