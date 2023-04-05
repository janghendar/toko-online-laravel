@php
    $visibility_class = '';

    if (request()->routeIs('frontend.dynamic.page')) {
        if (isset($page_post) && !$page_post->breadcrumb_status) {
            $visibility_class = 'd-none';
        }
    }

    if (request()->routeIs('homepage')) {
        $visibility_class = 'd-none';
        if (isset($page_details) && $page_details->breadcrumb_status) {
            $visibility_class = '';
        }
    }
@endphp
<div class="breadcrumb-area bg {{ $visibility_class }}"
        {!! render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_bg')) !!}
>
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <div class="content">
                        <ul class="page-list">
                            <li class="list-item"><a href="{{url('/')}}">{{ __('Home') }}</a></li>
                            @if(Route::currentRouteName() === 'frontend.dynamic.page')
                                <li class="list-item"><a href="#">{{$page_post->title ?? $page_name ?? ''}}</a></li>
                            @elseif(Route::currentRouteName() === 'frontend.products.single')
                                <li class="list-item"><a href="#">@yield('page-title')</a></li>
                            @else
                                <li class="list-item"><a href="#">@yield('page-title')</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
