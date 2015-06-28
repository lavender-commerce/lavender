
@if(!$products->count())

    <div class="none-found">

        <p>No products found.</p>

    </div>

@else

    <ul class="toolbar">

        <li>Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</li>

    </ul>

    <ul>

        @foreach($products as $product)

            <li>

                <a href="{{ $product->url() }}">{{ $product->name }}</a>

            </li>

        @endforeach

    </ul>

    @paginate($products)

@endif