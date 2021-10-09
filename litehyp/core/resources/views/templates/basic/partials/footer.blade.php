@php
    $footer = getContent('footer.content', true);
    $medias = getContent('footer.element');
    $policy = getContent('policy_pages.element');
@endphp

<!-- footer start -->
<footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2 col-md-3 text-md-start text-center">
          <a href="{{ route('home') }}" class="footer-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}"" alt="image"></a>
        </div>
        <div class="col-lg-10 col-md-9 mt-md-0 mt-3">
          <ul class="inline-menu d-flex flex-wrap justify-content-md-end justify-content-center align-items-center">
            @foreach($policy as $singlePolicy)
            <li><a href="{{ route('privacy.page', ['slug'=> slug($singlePolicy->data_values->title), 'id'=>$singlePolicy->id]) }}">{{ __($singlePolicy->data_values->title) }}</a></li>
            @endforeach
        </div>
      </div><!-- row end -->
      <hr class="mt-3">
      <div class="row align-items-center">
        <div class="col-md-6 text-md-start text-center">
          <p>{{ __($footer->data_values->text) }}</p>
        </div>
        <div class="col-md-6 mt-md-0 mt-3">
          <ul class="inline-social-links d-flex align-items-center justify-content-md-end justify-content-center">
            @foreach($medias as $media)
            <li><a href="{{ $media->data_values->soial_media_link }}" target="_blank"> @php echo $media->data_values->icon; @endphp </a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->
