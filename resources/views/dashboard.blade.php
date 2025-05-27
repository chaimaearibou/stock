@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="display-4 mb-4">Welcome to Stock Management System</h2>
    <p class="lead mb-5">Manage your inventory and customers efficiently</p>

    <div class="row row-cols-1 row-cols-md-3 g-3 mb-5">
        <div class="col">
            <a href="/customers" class="btn btn-primary w-100 btn-lg">List of Customers</a>
        </div>
        <div class="col">
            <a href="/suppliers" class="btn btn-success w-100 btn-lg">List of Suppliers</a>
        </div>
        <div class="col">
            <a href="/products" class="btn btn-info text-white w-100 btn-lg">List of Products</a>
        </div>
        <div class="col">
            <a href="/products-by-category" class="btn btn-warning text-dark w-100 btn-lg">Products by Category</a>
        </div>
        <div class="col">
            <a href="/products-by-supplier" class="btn btn-secondary w-100 btn-lg">Products by Supplier</a>
        </div>
        <div class="col">
            <a href="/products-by-store" class="btn btn-dark w-100 btn-lg">Products by Store</a>
        </div>
        <div class="col">
            <a href="{{ route('orders.index') }}" class="btn btn-danger w-100 btn-lg">Orders by Customer</a>
        </div>
    </div>

    {{-- Cookie Section --}}
    <div class="card mb-4 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-light">
            <strong>Cookie Test</strong>
        </div>
        <div class="card-body">
            <h5>Hello 
                @if(Cookie::has("UserName"))
                    {{ Cookie::get("UserName") }}
                @endif
            </h5>
            <form method="POST" action="{{ route('saveCookie') }}">
                @csrf
                <div class="mb-3">
                    <label for="txtCookie" class="form-label">Type your name</label>
                    <input type="text" class="form-control" id="txtCookie" name="txtCookie">
                </div>
                <button type="submit" class="btn btn-primary">Save Cookie</button>
            </form>
        </div>
    </div>

    {{-- Session Section --}}
    <div class="card mb-4 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-light">
            <strong>Session Test</strong>
        </div>
        <div class="card-body">
            <h5>Hello 
                @if(Session::has("SessionName"))
                    {{ Session("SessionName") }}
                @endif
            </h5>
            <form method="POST" action="{{ route('saveSession') }}">
                @csrf
                <div class="mb-3">
                    <label for="txtSession" class="form-label">Type your name</label>
                    <input type="text" class="form-control" id="txtSession" name="txtSession">
                </div>
                <button type="submit" class="btn btn-primary">Save Session</button>
            </form>
        </div>
    </div>

    {{-- Avatar Upload --}}
    <div class="card mb-5 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-light">
            <strong>Upload Your Picture</strong>
        </div>
        <div class="card-body text-center">
            <form method="POST" action="{{ route('saveAvatar') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="avatarFile" class="form-label">Choose your picture</label>
                    <input type="file" class="form-control" id="avatarFile" name="avatarFile">
                </div>
                <button type="submit" class="btn btn-primary">Save Picture</button>
            </form>
            @if(!empty($pic))
                <div class="mt-4">
                    <img src="{{ asset('storage/avatars/' . $pic) }}" alt="Avatar" class="img-thumbnail rounded-circle" style="width: 150px;">
                </div>
            @endif
        </div>
    </div>

    {{-- Charts --}}
<div class="container my-5">

    {{-- Category Chart --}}
    <div class="card mb-5 shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Produits par Catégorie</h4>
        </div>
        <div class="card-body">
            <div style="height: 600px;">
                @include('partials._category_chart')
            </div>
        </div>
    </div>

    {{-- Store Chart --}}
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Produits par Magasin</h4>
        </div>
        <div class="card-body">
            <div style="height: 500px;">
                @include('partials.store_shart')
            </div>
        </div>
    </div>

</div>

</div>
@endsection
