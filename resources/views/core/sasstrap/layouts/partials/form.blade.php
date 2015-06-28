
<form onsubmit="preventDoubleSubmit(this)" {!! attr($options) !!} >

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @foreach($fields as $field)

        <div class='field'>

            {!! $field !!}

        </div>

    @endforeach

</form>