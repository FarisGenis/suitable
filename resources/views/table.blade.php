<div id="suitable1">

    <div class="ui menu top attached">
        @if($title)
        <div class="item borderless">
            <h4>{!! $title !!}</h4>
        </div>
        @endif
        <div class="item borderless">

        </div>
        <div class="right menu">
            <div class="ui right aligned item">
                <form method="GET" action="">
                    <div class="ui transparent icon input">
                        <input class="prompt" name="search" value="{{ request('search') }}" type="text" placeholder="Cari...">
                        <i class="search link icon"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(!empty($toolbars))
        <div class="ui menu attached">
            @foreach($toolbars as $toolbar)
                <div class="item borderless">
                    {!! $toolbar !!}
                </div>
            @endforeach
            <div class="menu right">
            </div>
        </div>
    @endif

    <table class="ui table attached">
        <thead>
        <tr>
            @foreach($headers as $text)
                <th>{!! $text !!}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="collection">
        @forelse($collection as $data)
            <tr>
                @foreach($fields as $field)
                    <td>{!! $builder->renderCell($field, $data) !!}</td>
                @endforeach

            </tr>

        @empty
            <tr>
                <td colspan="{{ count($fields) }}" class="warning center aligned" style="font-size: 1.5rem;padding:40px;font-style: italic">Data tidak tersedia</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="ui menu bottom attached">
        <div class="item borderless">
            <small>{!! sui_pagination($collection)->summary() !!}</small>
        </div>
        @if(!$collection->isEmpty())
            {!! sui_pagination($collection)->render('attached bottom right') !!}
        @endif
    </div>
</div>

@push(config('suitable.script_placeholder'))
    @include('suitable::checkall.script', compact('id'))
@endpush