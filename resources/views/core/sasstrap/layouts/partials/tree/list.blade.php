<li>

    @if(count($list['children']))

    <a class="expand" data-children="{{ count($list['children']) }}">[+]</a>

    @endif

    {!! $list['content'] !!}

    @if(count($list['children']))

    <ul class="tree-node" style="display: none;">

        @foreach($list['children'] as $child)

            @include('layouts.partials.tree.list', ['list' => $child])

        @endforeach

    </ul>

    @endif

</li>