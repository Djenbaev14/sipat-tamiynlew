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
                      <h4 class="mt-3 mb-3">Отзывы
                      </h4>
                      {{-- <p>Мы рекомендуем вам ответить зарегистрированным пользователям или вступить с ними в диалог, потому что эти пользователи указали свой e-mail при отправке отзыва и ожидают ответа.
                      </p>
                      <p>
                        Вы также можете отправить любой понравившийся отзыв в 2GIS либо Google Карты, если он не был продублирован автором отзыва. Оплата производится не с общего баланса, а другим способом.
                      </p>
                  </div> --}}
              </div>
          </div>
          <!-- end page title -->

          <form action="{{route('organization.reviews')}}" method="GET">
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <label for="simpleinput" class="form-label" data-mdb-clear-button="true">Рейтинг</label>
                  <select name="rating" class="form-control">
                    <option hidden <?=$rating ? '' : 'selected';?> value="">Все</option>
                    @for ($i = 2; $i < 6; $i++)
                      <option <?=($rating==$i) ? 'selected' : '';?> value="{{$i}}">{{$i}}<i class="ri-star-s-fill"></i></option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="simpleinput" class="form-label">Компания</label>
                  
                  <select name="organization_id" class="form-control">
                    <option hidden <?=$organization_id ? '' : 'selected';?> value="">Все</option>
                    @foreach ($companies as $organization)
                        <option <?=($organization_id==$organization->id) ? 'selected' : '';?> value="{{$organization->id}}">{{$organization->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-6">
                  <label for="simpleinput" class="form-label">Дата</label>
                  <div class="calendar-dates d-flex align-items-center ">
                    <div class="calendar-date w-50">
                      <input type="date" class="form-control" name="start_date" value="{{$start_date}}">
                    </div>
                    <div class="calendar-div">-</div>
                    <div class="calendar-date w-50">
                      <input type="date" class="form-control" name="end_date" value="{{$end_date}}">
                    </div>
                </div>
              </div>
              
              <div class="col-6 ">
                <button class="btn btn-primary mt-3" type="submit" > Филт </button>
                <a href="/reviews" class="btn btn-success mt-3">Тазалау</a>
              </div>
            </div>
          </form>
          <div class="row mt-3">
            <div class="col">
              <div class="card p-2" style="background-color:#D6D8D9; text-align: right;">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->count()}}</span>
                ВСЕГО
              </div>
            </div>
            <div class="col">
              <div class="card p-2" style="background-color:#F7BABF;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->where('rating',1)->count()}}</span>
                Ужасно
              </div>
            </div>
            <div class="col">
              <div class="card p-2" style="background:#EECFD1;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->where('rating',2)->count()}}</span>
                Плохо
              </div>
            </div>
            <div class="col">
              <div class="card p-2 " style="background:#F6D4C6;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->where('rating',3)->count()}}</span>
                Средне
              </div>
            </div>
            <div class="col">
              <div class="card p-2" style="background:#D1ECF1;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->where('rating',4)->count()}}</span>
                Хорошо
              </div>
            </div>
            <div class="col">
              <div class="card p-2" style="background:#D4EDDA;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{$reviews->where('rating',5)->count()}}</span>
                Отлично
              </div>
            </div>
            <div class="col">
              <div class="card p-2" style="background:#FEFEFE;text-align: right">
                <span class="fw-bold" style="font-size: 22px">{{number_format($reviews->avg('rating'),2)}} / 5</span>
                Рейтинг
              </div>
            </div>
          </div>
          <div class="row mt-3">
              <div class="col-12">
                  @forelse ($reviews as $review)
                    <div class="card p-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-3">
                                <img src="assets/images/user/avatar.png" width="80px" class="img-fluid rounded-start" alt="...">
                                <p>Анонимный пользователь</p>
                            </div>
                            <div class="col-md-7">
                              <div class="row">
                                <div class="col-4">
                                    <div class="rateit rateit-mdi" data-rateit-mode="font" data-rateit-icon="󰓒"  data-rateit-value="{{$review->rating}}" data-rateit-ispreset="true" data-rateit-readonly="true">
                                  </div>
                                  <p>{{$review->organization->name}}</p>
                                  <span class="card-text">{{$review->created_at}}</span><br><br>
                                  <span class="card-text">{{$review->text}}</span><br>
                                </div>
                              </div>
                            </div> <!-- end col -->
                            <div class="col-md-2">
                              <img src="{{asset('assets/reviews_image/'.$review->file)}}" width="150px" alt="">
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-->
                  @empty
                  @endforelse
              </div><!-- end col-->
          </div> <!-- end row-->
    </div> <!-- container -->

  </div> <!-- content -->
</div>
@endsection

@push('css')
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/select.css')}}">
@endpush
@push('js')
  <script src="{{asset('assets/js/select.js')}}"></script>
  <script>
      // pureScriptSelect('#select');
      pureScriptSelect('#multiSelect');
      pureScriptSelect('#selectImg');
      pureScriptSelect('#selectIcon');
  </script>
@endpush



