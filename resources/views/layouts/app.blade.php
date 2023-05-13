<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Belajar Online | SMK N 5 Surakarta</title>

    @vite([
    'resources/css/app.css',
    'resources/css/dataTable.css',
    'resources/js/app.js'
    ])

    <link rel="stylesheet" href="/build/assets/app-3099a82e.css">
    {{--
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <script src="{{asset('/build/assets/app-55be165b.js')}}" defer></script> --}}

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script src="https://cdn.tiny.cloud/1/hjh2ydb5bt5025sjy10akrhj5t9lrxh5fngx95sry7yo373s/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body style="">
    <nav class="navbar bg-base-100 border-b-[1px] fixed z-10">
        <div class="container">
            <div class="flex-1">
                <a href="{{ url('/') }}" class="btn btn-ghost normal-case text-xl">Belajar Online</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    {{-- @if (auth()->user()->hasRole('admin'))
                    <x-modal-tambah-user />
                    @endif --}}
                    @role('admin')
                    <x-modal-tambah-user />
                    @else
                    @endrole
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    {{-- @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif --}}
                    @else
                    <div class="dropdown dropdown-end">
                        <a tabindex="0" href="#" role="button" class="btn btn-ghost  font-semibold">
                            {{ Auth::user()->tipe }}
                            <box-icon name='chevron-down'></box-icon>
                        </a>

                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <a class="w-full font-semibold" {{--
                                    href="{{route('edit-profile', ['user' => Auth::user()->id])}}"> --}}
                                    href="{{route('edit-profile')}}">

                                    <box-icon type='solid' name='user-detail'></box-icon>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a class="w-full font-semibold" href=" {{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <box-icon name='log-in'></box-icon>
                                    {{ __('Logout') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="pb-4 pt-20  px-8">
        @yield('content')
    </main>

    <div id="message">
    </div>
    <x-toast-message />
    {{-- @if (session()->has('message'))
    {{session('message')}}
    @endif --}}

</body>

<script src="/build/assets/app-1b06c5af.js"></script>

<script>
    const copyButtons = document.querySelectorAll('#copyText');
    
    copyButtons.forEach(button => {
        button.addEventListener('click', event => {
            const copyText = button.getAttribute('data-copy');
            
            navigator.clipboard.writeText(copyText)
            .then(() => {
                document.getElementById("message").innerHTML = "<div x-data='{show: true}' x-init='setTimeout(() => show = false, 3000)'' x-show='show'  class='toast'> <div class='alert alert-info'> <div> <span>Berhasil disalin</span> </div> </div> </div>";
            })
            .catch(error => {
                console.error('Error copying text: ', error);
            });
        });
    });
    
  
</script>


</html>