<!-- Portfolio Modals -->
@foreach($portfolio as $item)
    @foreach($item->block as $value)
        <div class="portfolio-modal modal fade" id="{{ $value->slug }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="modal-body">
                                <h2>{{ $value->name }}</h2>
                                <hr class="star-primary">
                                <a href="{{ $value->mediaData[0]->name }}" target="_blank">
                                    <img src="{{ Storage::url($value->mediaData[0]->images) }}" class="img-responsive img-centered" alt="">
                                </a>
                                <p>
                                    {{ $value->description }}
                                </p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="{{ $value->mediaData[0]->name }}" target="_blank" style="text-transform: none">{{ $value->name }}</a></strong>
                                    </li>
                                    <li>Date:
                                        <strong><a>{{ $value->descriptions }}</a></strong>
                                    </li>
                                    <li>Service:
                                        <strong><a>{{ $value->keywords }}</a></strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
