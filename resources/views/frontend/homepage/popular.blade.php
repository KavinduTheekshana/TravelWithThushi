   <!-- ***Home destination html start from here*** -->
   <section class="home-destination">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 offset-lg-2 text-sm-center">
             <div class="section-heading">
                <h5 class="sub-title">UNCOVER PLACE</h5>
                <h2 class="section-title">POPULAR DESTINATION</h2>
                <p>Explore the must-see destinations of Sri Lanka, including ancient cities, pristine beaches, and natural wonders.</p>
             </div>
          </div>
       </div>
       <div class="destination-section">
          <div class="row">
            @foreach ($destinations as $destination)
             <div class="col-lg-4 col-md-6">
                <article class="destination-item" style="background-image: url({{asset(url($destination->image))}});">
                   <div class="destination-content">
                      <div class="rating-start-wrap">
                         <div class="rating-start">
                            <span style="width: 100%"></span>
                         </div>
                      </div>
                      <span class="cat-link">
                         <a href="{{ route('destinations.single', ['slug' => $destination->slug]) }}">{{$destination->location}}</a>
                      </span>
                      <h3>
                         <a href="{{ route('destinations.single', ['slug' => $destination->slug]) }}">{{$destination->title}}</a>
                      </h3>
                      <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($destination->description)), 50, '... read more') }}</p>
                   </div>
                </article>
             </div>
             @endforeach
          </div>
          <div class="section-btn-wrap text-center">
             <a href="destination.html" class="round-btn">More Destination</a>
          </div>
       </div>
    </div>
 </section>
 <!-- ***Home destination html end here*** -->