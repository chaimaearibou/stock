@extends('layouts.app')

@section('content')
    <div class="text-center py-5">
        <h2 class="display-4 mb-4">Welcome to Stock Management System</h2>
        <p class="lead mb-4">Manage your inventory and customers efficiently</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/customers" class="btn btn-primary btn-lg shadow-sm">List of Customers</a>
            <a href="/suppliers" class="btn btn-success btn-lg shadow-sm">List of Suppliers</a>
            <a href="/products" class="btn btn-info btn-lg shadow-sm">List of Products</a>
            <a href="/products-by-category" class="btn btn-warning btn-lg shadow-sm">Products by Category</a>
            <a href="/products-by-supplier" class="btn btn-secondary btn-lg shadow-sm">Products by Supplier</a>
            <a href="/products-by-store" class="btn btn-dark btn-lg shadow-sm">Products by Store</a>
            <a href="{{ route('orders.index') }}" class="btn btn-danger btn-lg shadow-sm">Orders by Customer</a>
        </div>
        <br><br><br><br><br>
        {{-- ! cookies part  --}}
        {{-- <div class="justify-content-center gap-3">
        <div>
            <h1>
                Hello
                @if (Cookie::has('UserName'))
                        {{Cookie::get("UserName")}}
                @endif
            </h1>
        </div> --}}
        {{-- <div>
            <form method="POST" action="saveCookie">
                @csrf
                <label for="txtCookie">{{__('Type your name')}}</label>
                <input type="text" id = "txtCookie" name = "txtCookie" />
                <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{__('Save Cookie') }}
                </button>
            </form>
        </div>
    </div> --}}
        {{-- <br><br><br><br><br> --}}
        {{-- <div>
            <div>
                <h1>
                    Hello
                    @if (Session::has('SessionName'))
                            {{Session("SessionName")}}
                    @endif
                </h1>
            </div>
            <div>
                <form method="POST" action="saveSession">
                    @csrf
                    <label for="txtSession">{{__('Type your name')}}</label>
                    <input type="text" id = "txSession" name = "txtSession" />
                    <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{__('Save Session') }}
                    </button>
                </form>
            </div>
    </div>
    <div>
        <form method="POST" action="saveAvatar"  enctype="multipart/form-data" >
            @csrf
            <label for="avatarFile">@lang('Choose your picture')</label>
            <input type="file" id = "avatarFile"  name = "avatarFile" />
            <button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{__('Save picture') }} {{ trans("for your account") }}
            </button>
            <img style = "width:200px; border-radius:50%" src="{{"storage/avatars/".$pic}}" alt="">
        </form>
    </div> --}}
    {{-- </div>
    </div> --}}
@endsection
