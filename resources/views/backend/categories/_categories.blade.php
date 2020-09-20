@if($tr)
    @foreach($categories as $categoryItem)
        <tr>
            <td class="text-left">{{$delimiter ?? ''}}{{$categoryItem->title_ua ?? '' }}</td>
            <td class="text-left">{{$delimiter ?? ''}}{{$categoryItem->title_ru ?? '' }}</td>
            <td class="text-center align-middle">{{$categoryItem->status}}</td>

            <td class="text-center align-middle">
                <a class="btn btn-primary" href="{{ route('categories.edit', $categoryItem) }}">Редагувати</a>
            </td>
            <td class="text-center align-middle">
                <form class="inline" method="POST" action="{{route('categories.destroy', $categoryItem->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="button" onclick="myConfirm(this)" class="btn btn-danger btn-xs">Видалити</button>
                </form>
            </td>
        </tr>


        @isset($categoryItem->children)
            @include('backend.categories._categories', [
                    'categories'=> $categoryItem->children,
                    'delimiter'=>' - '.$delimiter,
                    'tr'=>true
                    ])
        @endisset
    @endforeach

@else
    @foreach($categories as $categoryItem)
        <option value="{{$categoryItem->id ?? '' }}"
                @isset($category->id)
                    @if ($category->parent_id == $categoryItem->id)
                        selected
                    @endif

                @endisset
        >
            {{$delimiter ?? ''}}{{$categoryItem->title_ua   ?? ''}}/{{$delimiter ?? ''}}{{$categoryItem->title_ru   ?? ''}}

        </option>

        @isset($categoryItem->children)
            @include('backend.categories._categories', [
                    'categories'=> $categoryItem->children,
                    'delimiter'=>' - '.$delimiter
                    ])
        @endisset
    @endforeach
@endif
