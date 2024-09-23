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
                    @if (auth()->user()->role_id==1)
                        <div class="page-title-right">
                            <a class="btn btn-primary" href="{{route('organization.create')}}">Мекеме косу</a>
                        </div>
                    @endif
                      <h4 class="page-title">Мекемелер
                      </h4>
                  </div>
              </div>
          </div>
          <!-- end page title -->

          <div class="row mt-3">
              <div class="col-12">
                @forelse ($companies as $organization)
                  <div class="card">
                      <div class="row g-0 align-items-center">
                          <div class="col-md-3">
                              <img src="{{asset('assets/images/organization/organization.png')}}" width="300px" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-9">
                              <div class="card-body">
                                  <h2 class="card-title"><b>{{$organization->name}}</b></h2>
                                  <div class="d-flex align-items-center">
                                    <div class="h4">
                                        <div class="rateit rateit-mdi" data-rateit-mode="font" data-rateit-icon="󰓒"  data-rateit-value="{{$surveries->where('organization_id',$organization->id)->avg('rating')}}" data-rateit-ispreset="true" data-rateit-readonly="true">
                                        </div>
                                    </div>&nbsp;&nbsp;
                                    <div class="">{{number_format($surveries->where('organization_id',$organization->id)->avg('rating'),2)}} / 5</div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="text-muted text-decoration-underline" href="/reviews?organization_id={{$organization->id}}">{{$surveries->where('organization_id',$organization->id)->count()}} отзывов</a>
                                  </div>
                                  {{-- <a href="{{route('organization.update',$organization->web_name)}}" class="btn btn-sm btn-outline-info rounded " style="font-size: 12px"><i class="ri-settings-3-line" style="margin-right: 10px"></i> Настройки и редактирование</a> --}}
                              </div> <!-- end card-body-->
                          </div> <!-- end col -->
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

@push('js')
    <!-- plugin js -->
    <script src="assets/js/vendor/dropzone.min.js"></script>
    <!-- init js -->
    <script src="assets/js/ui/component.fileupload.js"></script>
@endpush





