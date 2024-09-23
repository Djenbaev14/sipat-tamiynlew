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
        <link href="{{asset('assets/css/rating.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/recorder.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <style>
             /* .emoji-container {
            display: flex;
            justify-content: space-around;
                }

                .emoji-container label {
                    cursor: pointer;
                    transition: transform 0.2s;
                    border: none;
                }

                .emoji-container input[type="radio"] {
                    display: none;
                }

                .emoji-container input[type="radio"]:checked + label {
                    transform: scale(1.3);
                } */
                 
                .box {
                display: flex;
                align-items: center;
                justify-content: center;
                }

                .container {
                width: 400px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                }

                .star-widget {
                display: flex;
                gap: 40px;
                }

                .star-widget label {
                font-size: 24px;
                color: #444;

                transition: color 0.3s ease;
                }

                .star-widget input {
                display: none;
                }

                .star-widget label {
                font-size: 45px;
                color: #444;
                cursor: pointer;
                position: relative;

                opacity: 0.3;
                }

                .star-widget label::after {
                content: "Жаман";
                position: absolute;
                font-size: 14px;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                border-radius: 5px;

                transition: opacity 0.2s, visibility 0.2s;
                }

                .star-widget label#label-3::after {
                content: "Унамады";
                }

                .star-widget label#label-4::after {
                content: "Жақсы";
                }

                .star-widget label#label-5::after {
                content: "Зор";
                }

                .star-widget label:hover {
                opacity: 0.8;
                }

                .star-widget input:checked ~ label {
                opacity: 1;
                }

                .uploadOuter {
                text-align: center;
                padding-bottom: 20px;
                strong {
                    padding: 0 10px
                }
                }
                .dragBox {
                width: 100%;
                height: 100px;
                margin: 0 auto;
                position: relative;
                text-align: center;
                font-weight: bold;
                line-height: 95px;
                color: #999;
                border: 1px solid #ccc;
                border-radius: 10px;
                display: inline-block;
                transition: transform 0.3s;
                input[type="file"] {
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    opacity: 0;
                    top: 0;
                    left: 0;
                }
                }
                .draging {
                transform: scale(1.1);
                }
                #preview {
                text-align: center;
                img {
                    width:245px;
                }
                }
        </style>
    </head>
    
    <body class="authentication-bg position-relative">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
              <div class="row justify-content-center align-items-center">
                  <div class="col-md-4" style="width: 380px">
                    <h3 class="card-title text-dark mb-3">{{$organization->name}}</h3>
                    @if ($bool)
                      <p>Сиз жане пикир билдир алмайсыз </p>
                    @else
                      {{-- <p class="card-text">Lorem ipsum dolor sit amet.</p> --}}
                      <!-- File Upload -->
                      <form action="{{route('review.store',$organization->web_name)}}" method="post"  enctype="multipart/form-data" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                      data-upload-preview-template="#uploadPreviewTemplate">
                      
                      @csrf
                      <input type="hidden" name="organization_id" value="{{$organization->id}}">
                      <div class="card border" >
                          <div class="card-body">
                              <h3 class="card-title text-center text-dark mb-3">Хызмет көрсетиў сапасын бахалаң *</h3>

                              
                                <div class="box mb-4">
                                    <div class="container">
                                    <div class="star-widget">
                                        <div>
                                        <input type="radio" name="rating" value="5" id="rate-5" />
                                        <label for="rate-5" id="label-5">
                                            <img src="{{asset('assets/emoji/nice.svg')}}" alt="" />
                                        </label>
                                        </div>
                                        <div>
                                        <input type="radio" name="rating" value="4" id="rate-4" />
                                        <label for="rate-4" id="label-4">
                                            <img src="{{asset('assets/emoji/norm.svg')}}" alt="" />
                                        </label>
                                        </div>
                                        <div>
                                        <input type="radio" name="rating" value="3" id="rate-3" />
                                        <label for="rate-3" id="label-3">
                                            <img src="{{asset('assets/emoji/good.svg')}}" alt="" />
                                        </label>
                                        </div>
                                        <div>
                                        <input type="radio" name="rating" value="2" id="rate-2" />
                                        <label for="rate-2" id="label-2">
                                            <img src="{{asset('assets/emoji/bad.svg')}}" alt="" />
                                        </label>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                  <textarea class="form-control rounded" name="text" style="resize: none" id="example-textarea" placeholder="Усыныс ямаса шағымыңызды қалдырың" rows="5" value="{{old('text')}}"></textarea>
                                  @error('text')
                                  <span class="text-danger" style="font-size: 13px">Необходимо заполнить «Отзыв»</span>
                                  @enderror
                                </div>
                                
                                <div class="uploadOuter">
                                  <span class="dragBox" >
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm40-80h480L570-480 450-320l-90-120-120 160Zm-40 80v-560 560Z"/></svg>
                                    Сүўрет жүклең
                                  <input type="file" onChange="dragNdrop(event)" name="file"  ondragover="drag()" ondrop="drop()" id="uploadFile"  />
                                  </span>
                                </div>
                                <div id="preview"></div>

                          </div> <!-- end card-body-->
                      </div> <!-- end card-->
                      

                        {{-- <div class="mb-3">
                          <label class="form-label">Телефон номер <span class="text-muted">(необязательно)</span></label>
                          <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="basic-addon1">+998</span>
                            <input type="phone" name="phone" aria-describedby="basic-addon1" class="form-control" placeholder="998765432" value="{{old('phone')}}">
                          </div>
                        </div> --}}
                                                                      
 
                        <div class="mb-3 ">
                          <button class="btn btn-lg btn-primary w-100 rounded" type="submit"> Жибериу </button>
                        </div>
                      </form>

                    @endif

                  </div> <!-- end col-->

              </div>
                      <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <footer class="footer text-center text-sm-left mt-3">
            Қарақалпақстан Республикасы Жоқарғы Кеңеси  2024
        </footer>

        @include('sweetalert::alert')
        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/recorder.js')}}"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
                   
        <script>
          // Define form element
            const form = document.getElementById('kt_docs_formvalidation_image_input');

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'avatar': {
                            validators: {
                                notEmpty: {
                                    message: 'Please select an image'
                                },
                                file: {
                                    extension: 'jpg,jpeg,png',
                                    type: 'image/jpeg,image/png',
                                    message: 'The selected file is not valid'
                                },
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );
        </script>  
        <script>
            function dragNdrop(event) {
                var fileName = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("preview");
                var previewImg = document.createElement("img");
                previewImg.setAttribute("src", fileName);
                preview.innerHTML = "";
                preview.appendChild(previewImg);
            }
            function drag() {
                document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
            }
            function drop() {
                document.getElementById('uploadFile').parentNode.className = 'dragBox';
            }
        </script> 
        <!-- plugin js -->
        <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
        <!-- init js -->
        <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>
            
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2"></script>

    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:28:20 GMT -->
</html>

