
<h5>Package Details:</h5>
<ul>
    <li>
        <h6>Package 1</h6>
        <ul>
            <li>
                <label>Weight: </label>
                <input readonly value="{{ $weight = 30 }} {{ $weight_unit = 'lbs' }}"/>
            </li>
            <li>
                <label>Height: </label>
                <input readonly value="{{ $height = 24 }} {{ $measure_unit = 'inches' }}"/>
            </li>
            <li>
                <label>Length: </label>
                <input readonly value="{{ $length = 6.5 }} {{ $measure_unit = 'inches' }}"/>
            </li>
            <li>
                <label>Width: </label>
                <input readonly value="{{ $width = 6.5 }} {{ $measure_unit = 'inches' }}"/>
            </li>
            <li>
                <label>Origin: </label>
                <input readonly value="{{ $store_location_summary = config('store.address') }}"/>
            </li>
            <li>
                <label>Destination: </label>
                <input readonly value="{{ $customer_location_summary = 'not set' }}"/>
            </li>
        </ul>
    </li>
</ul>