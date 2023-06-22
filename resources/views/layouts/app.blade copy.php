<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fusen {
            width: 300px;
            /*幅はお好きに*/
            position: relative;
            z-index: 0;
        }

        .fusen ul {
            list-style: none;
        }

        .fusen ul li {
            font-size: 0.9em;
            margin: 1.6em 0;
            padding: 1em;
            position: relative;
            background: linear-gradient(to right, #ffffcc 0%, #f1f1c1 0.5%, #f1f1c1 13%, #ffffcc 16%);
            /*グラデーションで折り目っぽく*/
        }

        .fusen ul li::after {
            /*BOXを微妙に斜めにして配置、シャドウで立体感を出す*/
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            margin: auto;
            background: rgba(0, 0, 0, .5);
            box-shadow: 0 5px 5px rgb(0 0 0 / 30%);
            transform: rotate(1deg);
            top: 6%;
            right: .5%;
            left: 2%;
            bottom: 8%;
        }

        .fusen ul li:nth-child(odd) {
            /* 奇数番のli */
            background: linear-gradient(to right, #ffffcc 0%, #f1f1c1 0.5%, #f1f1c1 13%, #ffffcc 16%);
        }

        .fusen ul li:nth-child(even) {
            /* 偶数番のli */
            background: linear-gradient(to right, #FDF8E6 0%, #F5ECDA 0.5%, #F5ECDA 13%, #FDF8E6 16%);
            margin: 1.6em 0em !important;
        }

        .font {
            font-family: 'Hannotate TC', sans-serif;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class=" bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $content }}
        </main>
        <form action="{{ url('list/update') }}" method="POST" >
            @csrf
            <div id="modal" class="bg-slate-200 hidden">
                <input id=item-name name="item_name" type="text" value="">
                <input id=item-maker name="item_maker" type="text" value="">
                <input id=item-value name="item_value" type="number" value="">


                <input id="radio1" class="ml-2 text-left mb-1 " type="radio" name="want_level" value="1">
                <label class="ml-1" for="radio1">欲しいッ</label>
                <input id="id" type="hidden" name="id" value="">
                <input id="radio2" class="ml-2 text-left mb-1 " type="radio" name="want_level" value="2">
                <label class="ml-1" for="radio2">検討</label>
                <x-button class="bg-blue-500 rounded-lg">更新</x-button>
            </div>
        </form>
    </div>
    <script>
        $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        function modaletest(id){
                // function modaltest
            $.when(
                $("#modal").removeClass('hidden')
            ).done(function(){
                $.ajax({
                    method:'POST',
                    // url:"/ajax",
                    url:"{{ route('ajax') }}",
                    data: {id : id },
                    dataTyoe: "json",
                }).done(function(res){
                    console.log(res.item_name);
                    // $("#modal").append(res.item_name);
                    $("#item-name").val(res.item_name);
                    $("#item-maker").val(res.item_maker);
                    $("#item-value").val(res.item_value);
                    $("#id").val(res.id);
                })
            }).fail(function(){
                alert("ajax error")
            });
        };
        // function modaletst() {
        //     alert("a")
        // }
    </script>
</body>

</html>