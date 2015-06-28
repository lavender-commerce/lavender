<ul {!! attr($options) !!}>

    @foreach($values as $value)

        <li>

            <input type="{{ $type }}" name="{{ $value['name'] }}" value="{{ $value['value'] }}" {{ $value['checked'] ? 'checked' : '' }}/>

            <span>{{ $value['label'] }}</span>

        </li>

    @endforeach

</ul>
