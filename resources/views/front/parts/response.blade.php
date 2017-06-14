@if (Session::has('response'))
    <? $response = Session::get('response', 'array'); ?>
    @if($response['type'] === 'box')
        <div id='message_box'>
    @elseif($response['type'] === 'string')
        <div id='message_string'>
    @else
        <div>
    @endif
            <div class="mess_text {{ $response['class'] }}">{{ $response['text'] }}</div>
        </div>
@endif