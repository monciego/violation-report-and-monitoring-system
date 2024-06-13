@props(["data", "headers", "empty_message"])
@unless ($data->isEmpty())
<div class="overflow-x-auto">
    <table class="table-auto w-full">
        <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm">
            <tr>
                @foreach ($headers as $header)
                <th class="p-2">
                    <div class="font-semibold text-left">{{ $header }}</div>
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="text-sm font-medium divide-y divide-slate-100">
            @foreach ($data as $row)
            <tr>
                @foreach ($row as $cell)
                <td class="p-2">
                    <div class="text-slate-800 capitalize">
                        {!! $cell !!}
                    </div>
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex-col flex items-center justify-center">
    <div>
        <img src="" alt="{{ $empty_message}}">
    </div>
    <div>
        <h1 class="text-center font-bold text-xl mt-8 uppercase">
            {{ $empty_message }}
        </h1>
    </div>
</div>
@endunless