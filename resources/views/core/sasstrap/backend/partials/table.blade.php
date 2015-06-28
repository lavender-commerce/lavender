
<div class="row">

    <div class="six columns">

        @yield('mass_actions')

    </div>

    <div class="six columns right">

        @yield('new_button')

    </div>

</div>
<table id="entity-table" class="u-max-full-width">

    <thead>

        <tr>

            @foreach($headers as $header)

                <th>{!!$header!!}</th>

            @endforeach

            @if($edit_url)

                <th class="no-sort"></th>

            @endif


        </tr>

    </thead>

    <tbody>

    @foreach($rows as $row)

        <tr>

            @foreach($row->attributesToArray() as $key => $value)

                <td>{!! $row->$key()->backend() !!}</td>

            @endforeach

            @if($edit_url)

                <td><a href="{{ url($edit_url, [$row->id]) }}">edit</a></td>

            @endif

        </tr>

    @endforeach

    </tbody>

</table>

<script>

    $(document).ready( function () {

        $('#entity-table').DataTable({
            order: [
                [ {{ isset($sort_column) ? $sort_column : 0 }}, "{{ isset($sort_dir) ? $sort_dir : 'desc' }}" ]
            ],
            columnDefs: [{
                targets: 'no-sort',
                searchable: false,
                orderable: false
            }]
        });

    } );

</script>