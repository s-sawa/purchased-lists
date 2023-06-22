<div class="modal-edit-container">
    <div class="modal-edit-body w-auto">
        <!-- 閉じるボタン -->
        <div class="modal-edit-close">×</div>
        <!-- モーダル内のコンテンツ -->
        <div class="modal-edit-content rounded bg-[#f1f1c1] w-auto">
            
            <form action="{{ url('list/update') }}" method="POST">
                @csrf
                <div class="mb-1 text-sm text-right">アイテム
                    <input id=item-name name="item_name" type="text" value="" class="rounded-lg">
                </div>
                <div class="mb-1 text-sm text-right">メーカー
                    <input id=item-maker name="item_maker" type="text" value="" class="rounded-lg">
                </div>
                <div class="mb-1 text-sm text-right">価格
                    <input id=item-value name="item_value" type="number" value="" class="rounded-lg">
                </div>
                <div class="text-sm mt-2 mb-2">欲しさレベル
                    <input id="want-level1" class="ml-2 text-left mb-1 " type="radio" name="want_level" value="1">
                    <label class="ml-1" for="want-level1">欲しいッ</label>
                    <input id="id" type="hidden" name="id" value="">
                    <input id="want-level2" class="ml-2 text-left mb-1 " type="radio" name="want_level" value="2">
                    <label class="ml-1" for="want-level2">検討</label>
                </div>
                <div class="text-center">
                    <x-button class="bg-blue-500 rounded-lg mt-1">更新</x-button>
                </div>
            </form>
            <div class="flex flex-col">
                {{-- <a id="delete-account" href="" class="bg-red-500
                    hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-3
                    text-center">アカウント削除</a>
                <p
                    class="inline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4  rounded focus:outline-none focus:shadow-outline mt-3 text-center">
                    キャンセル</p> --}}
            </div>
        </div>
    </div>
</div>