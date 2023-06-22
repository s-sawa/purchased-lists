<x-app-layout>
    <x-slot name="content">
        <div class="md:flex ">
            {{-- 入力フォーム欄 --}}
            <div class="py-2 md:border-r-2">
                <div class="text-center mb-2">
                    <span class="border-b-2 border-t-2 py-0.5">欲しいものメモ</span>
                </div>
                <form id="inputForm" action="{{ route('lists_store') }}" method="post">
                    {{-- 脆弱性対策 --}}
                    @csrf
                    <div id="form-content">
                        <div class="flex flex-col mb-2">
                            <label class="ml-2 text-left" for="">アイテム</label>
                            <input class="mx-2 rounded-lg" name="item_name" type="text">
                            @error('item_name')
                            <i class="fa fa-warning i text-red-500 ml-4 mt-1">
                                <span class="text-xs text-danger">{{ $message }}</span>
                            </i>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label class="ml-2 text-left" for="">メーカー</label>
                            <input class="mx-2 rounded-lg" name="item_maker" type="text">
                            @error('item_maker')
                            <i class="fa fa-warning i text-red-500 ml-4 mt-1">
                                <span class="text-xs text-danger">{{ $message }}</span>
                            </i>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label class="ml-2 text-left" for="">価格</label>
                            <input class="mx-2 rounded-lg" name="item_value" type="number">
                            @error('item_maker')
                            <i class="fa fa-warning i text-red-500 ml-4 mt-1">
                                <span class="text-xs text-danger">{{ $message }}</span>
                            </i>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <span class="ml-2 text-left" for="">欲しさレベル</span>
                            <div>
                                <input id="radio1" class="ml-2 text-left mb-1 " type="radio" name="want_level"
                                    value="1">
                                <label class="ml-1" for="radio1">とても欲しいッ</label>
                            </div>
                            <div>
                                <input id="radio2" class="ml-2 text-left mb-1 " type="radio" name="want_level"
                                    value="2">
                                <label class="ml-1" for="radio2">欲しいかも</label><br>
                                @error('want_level')
                                <i class="fa fa-warning i text-red-500 ml-4 mt-1">+
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                </i>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="inputButton"
                                class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-4  rounded-lg focus:outline-none focus:shadow-outline"
                                type="submit">メモ</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="md:flex mx-auto">
            {{-- <div class="aa"> --}}
                <div class="m-2 mr-6 p-2">
                    <p class="text-center">とても欲しいッ</p>
                    @foreach($lists->where('want_level', 1) as $list)
                    <div id="list-{{ $list->id }}" class="fusen">
                        <ul>
                            <li>
                                <p class="font text-xl font-bold ml-3">{{ $list->item_name }}</p>
                                <p class="ml-3">メーカー：{{ $list->item_maker }}</p>
                                <p class="ml-3">価格　　：￥{{ number_format($list->item_value) }}</p>
                                <i id="edit" class="fa fa-edit fa-lg absolute top-3 right-1 cursor-pointer"
                                    onclick="openEditModal({{ $list->id }})"></i>
                                <i id="delete" class="fa fa-trash fa-lg absolute bottom-3 right-1 cursor-pointer"
                                    onclick="deleteAjax({{ $list->id }})"></i>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="m-2 ml-6 p-2">
                    <p class="text-center">欲しいかも</p>
                    @foreach($lists->where('want_level', 2) as $list)
                    <div id="list-{{ $list->id }}" class="fusen ">
                        <ul>
                            <li>
                                <p class="font text-xl font-bold ml-3">{{ $list->item_name }}</p>
                                <p class="ml-3">メーカー：{{ $list->item_maker }}</p>
                                <p class="ml-3">価格　　：￥{{ number_format($list->item_value) }}</p>
                                <i id="edit" class="fa fa-edit fa-lg absolute top-3 right-1"
                                    onclick="openEditModal({{ $list->id }})"></i>
                                <i id="delete" class="fa fa-trash fa-lg absolute bottom-3 right-1 cursor-pointer"
                                    onclick="deleteAjax({{ $list->id }})"></i>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>