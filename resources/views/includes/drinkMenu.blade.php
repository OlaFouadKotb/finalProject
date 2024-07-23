<!-- resources/views/drinkMenu.blade.php -->
<div id="drink" class="tm-page-content">
    <!-- Drink Menu Page -->
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            <li>
                <a href="{{ route('categories', ['category' => 'iced-coffee']) }}" 
                   class="tm-tab-link {{ request('category') == 'iced-coffee' ? 'active' : '' }}" 
                   data-id="cold">Iced Coffee</a>
            </li>
            <li>
                <a href="{{ route('categories', ['category' => 'hot-coffee']) }}" 
                   class="tm-tab-link {{ request('category') == 'hot-coffee' ? 'active' : '' }}" 
                   data-id="hot">Hot Coffee</a>
            </li>
            <li>
                <a href="{{ route('categories', ['category' => 'fruit-juice']) }}" 
                   class="tm-tab-link {{ request('category') == 'fruit-juice' ? 'active' : '' }}" 
                   data-id="juice">Fruit Juice</a>
            </li>
        </ul>
    </nav>
    @foreach($beverages as $beverage)
    <div class="tm-list">
   
            <div class="tm-list-item">          
                <img src="{{ asset('assets/img/.$beverage->image') }}" alt="Image" class="tm-list-item-img">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">${{ $beverage->price }}</span></h3>
                    <p class="tm-list-item-description">{{ $beverage->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
