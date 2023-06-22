<!-- resources/views/components/errors.blade.php -->
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="flex justify-start text-left p-4  bg-red-500 text-white rounded-lg border-2 border-white">
    {{-- <div><strong>入力した文字を修正してください。</strong></div> --}}
    {{-- <div class=""> --}}
        <ul class="">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    {{-- {{ $errors }} --}}
    {{-- </div> --}}
</div>
@endif