


<div class="container">
    <h1>Special Items</h1>
    <div class="row">
        @foreach($specialProducts as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    @if($product->image)
                        <img src="{{ asset('assets/img/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                    @else
                        <img src="{{ asset('assets/img/default.png') }}" class="card-img-top" alt="{{ $product->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->content }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        @if($product->published)
                            <p class="card-text"><span class="badge badge-success">Published</span></p>
                        @else
                            <p class="card-text"><span class="badge badge-secondary">Not Published</span></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
