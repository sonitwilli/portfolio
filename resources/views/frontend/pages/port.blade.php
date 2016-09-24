<!-- Portfolio Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Portfolio</h2>
                <hr class="star-primary">
            </div>
        </div>

        @foreach($portfolio as $item)
        <h1>{{ $item->name }}</h1><br>
        <div class="row">
            @foreach($item->block as $value)
            <div class="col-sm-4 portfolio-item">
                <a href="#{{ $value->slug }}" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="{{ Storage::url($value->images) }}" class="img-responsive" alt="">
                </a>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>