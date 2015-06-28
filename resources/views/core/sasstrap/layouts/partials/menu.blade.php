<ul>

    @foreach($items as $index => $item)

        <li class="item item-{{ $index }}">

            @if(!is_null($item->href)) <a href="{{ $item->href }}">{{ $item->text }}</a>

            @else {{ $item->text }}

            @endif

            @if($children = $item->children)

                @include('layouts.partials.menu', ['items' => $children])

            @endif

        </li>

    @endforeach

</ul>