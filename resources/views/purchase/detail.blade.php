<p>{{ $list->item_value }}</p>
<div class="fusen">
    <ul>
        <li>
            <p class="font text-xl font-bold ml-3">{{ $list->item_name }}</p>
            <p class="ml-3">メーカー：{{ $list->item_maker }}</p>
            <p class="ml-3">値段　　：￥{{ number_format($list->item_value) }}</p>
            <a href="detail/{{ $list->id }}" class="text-lg"><i class="fa fa-edit absolute bottom-1 right-1"></i></a>
        </li>
    </ul>
</div>