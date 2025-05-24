@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h1 class="text-primary fw-bold ">Add new Supplier</h1>

        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
            </svg>
            Back
        </a>
    </div>
    <form class="row g-3 needs-validation" method="POST" action="{{ route('suppliers.store') }}">
        @csrf
        {{-- * first name div --}}
        <div class="col-md-4 position-relative">
            <label for="first_name" class="form-label">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required
                value="{{ old('first_name') }}">
        </div>
        {{-- * last name div --}}
        <div class="col-md-4 position-relative">
            <label for="last_name" class="form-label">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required
                value="{{ old('last_name') }}">
        </div>
        {{-- * email div --}}
        <div class="col-md-4 position-relative">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>
        {{-- * adresse div --}}
        <div class="col-md-4 position-relative">
            <label for="adress" class="form-label">Adress</label>
            <input type="text" class="form-control" id="address" name="address" required value="{{ old('address') }}">
        </div>
        {{-- *phone div --}}
        <div class="col-md-4 position-relative">
            <label for="phone" class="form-label">contact</label>
            <input type="text" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}">
        </div>
        <div class="col-12 justify-content-center d-flex">
            <button class="btn btn-primary" type="submit">Submit form</button>
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
