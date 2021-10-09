@php
    $coundown = getContent('overView.element');
@endphp

<!-- overview section start -->
<div class="overview-section pb-50">
    <div class="container">
        <div class="row gy-sm-0 gy-4 overview-wrapper wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
            @foreach($coundown as $overView)
                <div class="col-sm-4 overview-item">
                    <div class="overview-card">
                        <div class="overview-card__icon">
                        @php echo $overView->data_values->icon; @endphp
                        </div>
                        <div class="overview-card__content">
                        <h3 class="amount text--base text-shadow--base">{{ $overView->data_values->text }}</h3>
                        <p>{{ __($overView->data_values->title) }}</p>
                        </div>
                    </div>
                </div><!-- overview-item end -->
            @endforeach
        </div>
    </div>
    </div>
    <!-- overview section end -->
