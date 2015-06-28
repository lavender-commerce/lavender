<div class="table" id="cart-table">

    <div class="thead">

        <div class="row">

            <div class="six columns">Name</div>

            <div class="four columns right">Qty</div>

            <div class="two columns right">Subtotal</div>

        </div>

    </div>

    <div class="tbody">

    @foreach($items as $item)

        <div class="row">

            <div class="six columns">

                {{ $item->product->name }}

            </div>

            <div class="four columns right">

                @form('cart_item_update', ['item' => $item])

            </div>

            <div class="two columns right">

                {{ $item->getSubtotal(true) }}

            </div>

        </div>

    @endforeach

    </div>

    <div class="tfoot">

        <div class="row"></div>

    </div>

</div>