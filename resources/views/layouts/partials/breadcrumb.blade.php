@if (isset($breadcrumbs) && count($breadcrumbs))
  <div class="axil-breadcrumb-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8">
          <div class="inner">
            <ul class="axil-breadcrumb">
              @foreach ($breadcrumbs as $key => $breadcrumb)
                <li class="axil-breadcrumb-item">
                  <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                </li>
                @if ($key < count($breadcrumbs) - 1)
                  <li li class="separator"></li>
                @endif
              @endforeach
            </ul>
            <h1 class="title">{{$breadcrumb['label']}}</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="inner">
            <div class="bradcrumb-thumb">
              <img src="{{ asset('assets/images/product/product-45.png') }}" alt="Image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
