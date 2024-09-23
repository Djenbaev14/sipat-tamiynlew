@extends('layouts.main')

@section('title', 'Все новости')

@section('breadcrumb')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="content-page">
  <div class="content">
      <!-- Start Content-->
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row ">
              <div class="col-12">
                  <div class="page-title-box mb-3">
                      <h2 class="mt-3 mb-1">Мекеме косыу
                      </h2>
                      {{-- <p>В этом разделе представлены настройки по Организации. Общие настройки размещены в разделе «Функции и оплата».
                      </p> --}}
                  </div>
              </div>
          </div>
          <!-- end page title -->

          <form action="{{route('organization.Cstore')}}" method="post">
            @csrf
            <div class="card">
              <div class="card-body">
                <label class="font-weight-bold mb-1" style="font-size:16px">Мекеме аты</label>
                <input type="text" class="form-control" name="organization_name" placeholder="Мекеме атын киритин" value="{{old('organization_name')}}">
              </div> <!-- end card-body-->
              <div class="card-body">
                <label class="font-weight-bold mb-1" style="font-size:16px">Бириктирилген адам</label>
                <input type="text" class="form-control" name="name" placeholder="Бириктирилген адамды киритин" value="{{old('name')}}">
              </div> <!-- end card-body-->
              <div class="card-body">
                <label class="font-weight-bold mb-1" style="font-size:16px">Логин</label>
                <input type="text" class="form-control" name="login" placeholder="Логин киритин" value="{{old('login')}}">
              </div> <!-- end card-body-->
              <div class="card-body">
                <label class="font-weight-bold mb-1" style="font-size:16px">Телефон номер</label>
                <input type="text" class="form-control" name="phone" placeholder="Телефон номер киритин" value="{{old('phone')}}">
              </div> <!-- end card-body-->
              <div class="card-body">
                <label class="font-weight-bold mb-1" style="font-size:16px">Парол</label>
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" name="password" placeholder="Парол киритин" value="{{old('password')}}">
                  <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                  </div>
                </div>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
            
            

              <input type="submit" value="Сақлаў" class="btn btn-auto btn-primary rounded mt-3">
          </form>
    </div> <!-- container -->

  </div> <!-- content -->
</div>
@endsection


@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.2/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
    <script src="{{asset('assets/js/cloneDate.js')}}" type="text/javascript"></script>
    <script>
        $('a#add-more').cloneData({
            mainContainerId: 'main-container', // Main container Should be ID
            cloneContainer: 'container-item', // Which you want to clone
            removeButtonClass: 'remove-item', // Remove button for remove cloned HTML
            removeConfirm: true, // default true confirm before delete clone item
            removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message
            //append: '<a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger remove-social-media">Remove</a>', // Set extra HTML append to clone HTML
            minLimit: 1, // Default 1 set minimum clone HTML required
            maxLimit: 5, // Default unlimited or set maximum limit of clone HTML
            defaultRender: 1,
            init: function () {
                console.info(':: Initialize Plugin ::');
            },
            beforeRender: function () {
                console.info(':: Before rendered callback called');
            },
            afterRender: function () {
                console.info(':: After rendered callback called');
                //$(".selectpicker").selectpicker('refresh');
            },
            afterRemove: function () {
                console.warn(':: After remove callback called');
            },
            beforeRemove: function () {
                console.warn(':: Before remove callback called');
            }

        });

        /*$('.select2').select2({
            placeholder: 'Select a month'
        });*/

        $(document).ready(function () {
            $('.datepicker').datepicker();
        });

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        /*CKEDITOR.editorConfig = function (config) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;

        };*/
        //CKEDITOR.replace('editor1');


    </script>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <script>
    try {
      fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
        return true;
      }).catch(function(e) {
        var carbonScript = document.createElement("script");
        carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
        carbonScript.id = "_carbonads_js";
        document.getElementById("carbon-block").appendChild(carbonScript);
      });
    } catch (error) {
      console.log(error);
    }
    </script>
@endpush


