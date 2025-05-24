@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h4>Confirmation de suppression</h4>
                </div>
                <div class="card-body">
                    <p>Êtes-vous sûr de vouloir supprimer le fournisseur suivant ?</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Nom :</strong> {{ $supplier->first_name }} {{ $supplier->last_name }}</li>
                        <li class="list-group-item"><strong>Email :</strong> {{ $supplier->email }}</li>
                        <li class="list-group-item"><strong>Téléphone :</strong> {{ $supplier->phone }}</li>
                        <li class="list-group-item"><strong>Adresse :</strong> {{ $supplier->address }}</li>
                    </ul>

                    <form method="POST" action="{{ route('suppliers.destroy', $supplier->id) }}">
                        @csrf
                        @method('DELETE')

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Annuler</a>
                            <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
