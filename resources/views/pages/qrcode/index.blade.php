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
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="mt-3 mb-1">QR коды ҳəм силтемеси
                      </h4>
                  </div>
              </div>
          </div>
          <!-- end page title -->
          <div class="row mt-3">
              <div class="col-12">
                @forelse ($companies as $organization)
                  <div class="card">
                      <div class="row g-0 align-items-center p-3">
                          <div class="col-md-9">
                              <div class="card-body">
                                  {{-- <h4 class="card-title"><b>{{$organization->name}}</b></h4>
                                  <input class="js-copytextarea w-100 border-0 mb-2 text-muted" readonly type="text" value="{{$host}}/organization/{{$organization->web_name}}/review">
                                  <button class="js-textareacopybtn btn btn-sm btn-outline-info rounded" style="font-size: 12px"><i class="ri-file-copy-line" style="margin-right: 10px"></i>Скопировать ссылку</button> --}}
                                  <div class="shareArticle">
                                    <div class="shareLink">
                                      <div class="permalink">
                                        <input class="textLink" id="text" type="text" name="shortlink" value="{{$host}}/organization/{{$organization->web_name}}/review" id="copy-link" readonly="">
                                        <span class="copyLink" id="copy" tooltip="Copy to clipboard">
                                          <i class="fa-regular fa-copy"></i>
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                              </div> 
                          </div> <!-- end col -->
                          
                          <div class="col-md-3">
                            <div class="mb-2">
                              <a href="{{route('savePngQrCode',$organization->web_name)}}" class="btn btn-info rounded" style="width: 250px">QR-код ты жүклеп алыў</a>
                            </div>
                            {{-- <div class="mb-2">
                              <a href="{{route('saveStickerQrCode',$organization->web_name)}}" class="btn btn-info rounded" style="width: 250px">Скачать макет наклейки</a>
                            </div>
                            <div class="mb-2">
                              <a href="/organization/generate-qrcode-raw/{{$organization->web_name}}" class="btn btn-info rounded" style="width: 250px">Скачать макет A6</a>
                            </div> --}}
                        </div>
                      </div> <!-- end row-->
                  </div> <!-- end card-->
                @empty
                    
                @endforelse
              </div><!-- end col-->
          </div> <!-- end row-->
          <p>
          </p>
    </div> <!-- container -->

  </div> <!-- content -->
</div>
@endsection
@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
    .shareArticle {
      display: flex;
      flex-flow: column;
      align-items: center;
      width: 100%;
      padding: 15px;
    }
    
    .shareLink {
      .permalink {
        position: relative;
        border-radius: 30px;
        .textLink {
          text-align: center;
          padding: 12px 60px 12px 30px;
          height: 45px;
          width: 450px;
          font-size: 16px;
          letter-spacing: .3px;
          color: #494949;
          border-radius: 25px;
          border: 1px solid #f2f2f2;
          background-color: #f2f2f2;
          outline: 0;
          appearance: none;
          transition: all .3s ease;
          @media (max-width: 767px) {
            width: 100%;
          }
          &:focus {
            border-color: #d8d8d8;
          }
          &::selection {
            color: #fff;
            background-color: #39AFD1;
          }
        }
        .copyLink {
          position: absolute;
          top: 50%;
          right: 25px;
          cursor: pointer;
          transform: translateY(-50%);
          &:hover {
            &:after {
              opacity: 1;
              transform: translateY(0) translateX(-50%);
            }
          }
          &:after {
            content: attr(tooltip);
            width: 140px;
            bottom: -40px;
            left: 50%;
            padding: 5px;
            border-radius: 4px;
            font-size: 0.8rem;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            background-color: #000000;
            color: #ffffff;
            transform: translateY(-10px) translateX(-50%);
            transition: all 300ms ease;
                text-align: center;
          }
          i {
            font-size: 20px;
            color: #39AFD1;
          }
        }
      }
    }
      </style>
@endpush
@push('js')
  <script>
    const input = document.getElementById("text");
    const copyButton = document.getElementById("copy");

    const copyText = (e) => {
      // window.getSelection().selectAllChildren(textElement);
      input.select(); //select input value
      document.execCommand("copy");
      e.currentTarget.setAttribute("tooltip", "Copied!");
    };

    const resetTooltip = (e) => {
      e.currentTarget.setAttribute("tooltip", "Copy to clipboard");
    };

    copyButton.addEventListener("click", (e) => copyText(e));
    copyButton.addEventListener("mouseover", (e) => resetTooltip(e));

  </script>
  <script>
      var copyTextareaBtn = document.getElementsByClassName('js-textareacopybtn');
      var copyTextarea = document.getElementsByClassName('js-copytextarea');
      Array.from(copyTextareaBtn).forEach((item,index) =>{
          
          item.addEventListener('click', function(event) {
            copyTextarea[index].focus();
            copyTextarea[index].select();

            try {
              var successful = document.execCommand('copy');
              var msg = successful ? 'successful' : 'unsuccessful';
              console.log('Copying text command was ' + msg);
            } catch (err) {
              console.log('Oops, unable to copy');
            }
          });
      });


  </script>
@endpush

@push('css')
    <style>
       .tooltiptext {
        visibility: hidden;
        width: 140px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
      }

      .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
      }

      .tooltiptext {
        visibility: visible;
        opacity: 1;
      }
    </style>
@endpush

