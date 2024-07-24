

<div id="special" class="tm-page-content">
    <div class="tm-special-items">
        @if($specialProducts->isEmpty())
            <p>No special items available.</p>
        @else
            @foreach($specialProducts as $product)
                <div class="tm-black-bg tm-special-item">
                    <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->title }}">
                    <div class="tm-special-item-description">
                        <h2 class="tm-text-primary tm-special-item-title">{{ $product->title }}</h2>
                        <p class="tm-special-item-text">{{ $product->content }}</p>
                        <p class="tm-special-item-text">Price: ${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>