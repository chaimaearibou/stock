@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h1 class="text-primary fw-bold ">Update Supplier</h1>

        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-bar-left"></i>
            Back
        </a>
    </div>
    <form class="row g-3 needs-validation" method="POST" action="{{ route('suppliers.update', $supplier) }}">
        @method('PUT')
        @csrf
        {{-- * first name div --}}
        <div class="col-md-4 position-relative">
            <label for="first_name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required
                value="{{ old('first_name', $supplier->first_name) }}">
        </div>
        {{-- * last name div --}}
        <div class="col-md-4 position-relative">
            <label for="last_name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required
                value="{{ old('last_name', $supplier->last_name) }}">
        </div>
        {{-- * email div --}}
        <div class="col-md-4 position-relative">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required
                value="{{ old('email', $supplier->email) }}">
        </div>
        {{-- * adresse div --}}
        <div class="col-md-4 position-relative">
            <label for="adress" class="form-label">Adress</label>
            <input type="text" class="form-control" id="address" name="address" required
                value="{{ old('address', $supplier->address) }}">
        </div>
        {{-- *phone div --}}
        <div class="col-md-4 position-relative">
            <label for="phone" class="form-label">contact</label>
            <input type="text" class="form-control" id="phone" name="phone" required
                value="{{ old('phone', $supplier->phone) }}">
        </div>
        <div class="col-12 justify-content-center d-flex">
            <button class="btn btn-primary" type="submit">Update form</button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

@endsection
