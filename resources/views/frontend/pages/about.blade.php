<!-- About Section -->
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1">
                <table class="table">
                    @if(count($about) > 0)
                        @foreach($about as $item)
                            <tr>
                                <td><i>{{ $item->name }}:</i></td>
                                <td>{!! $item->content !!}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table">
                    @if(count($about_featured) > 0)
                        @foreach($about_featured as $item)
                            <tr>
                                <td><i>{{ $item->name }}:</i></td>
                                <td class="text-justify">{!! $item->content !!}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>