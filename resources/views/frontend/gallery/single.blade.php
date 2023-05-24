@foreach ($gallery as $image)
<div class="single-gallery grid-item">
    <figure class="gallery-img">
        <a href="{{asset(url($image->image))}}" data-fancybox="gallery">
            <img src="{{asset(url($image->image))}}" alt="">
        </a>
    </figure>
</div>
@endforeach
