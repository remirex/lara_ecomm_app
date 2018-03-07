<section id="like-prod" class="text-center">
    <div class="container">

        <h5>You May Like</h5>

        <div class="row">

            @foreach($prodMayYouLike as $product)

                <div class="col-lg-3 products">
                    <a href="{{ route('show' , $product->slug)}}">
                        <img src="{{ asset('images/products/'.$product->slug.'.jpg') }}">
                        <p>{{ $product->name }}</p>
                        <p>{{ $product->presentPrice() }}</p>
                    </a>
                </div>

            @endforeach

        </div>
    </div>
</section><!-- /.like-prod -->