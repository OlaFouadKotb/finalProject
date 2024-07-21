<div id="drink" class="tm-page-content">
<nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="{{route('drink')}}" class="tm-tab-link {{request()->is('about') ? 'active' : ''}}" data-id="cold">Iced Coffee</a>
                </li>
                <li>
                  <a href="{{route('drink')}}" class="tm-tab-link {{request()->is('drink') ? 'active' : ''}}" data-id="hot">Hot Coffee</a>
                </li>
                <li>
                  <a href="{{route('drink')}}" class="tm-tab-link {{request()->is('drink') ? 'active' : ''}}" data-id="juice">Fruit Juice</a>
                </li>
              </ul>
            </nav>