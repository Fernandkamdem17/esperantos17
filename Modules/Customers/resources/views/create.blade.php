<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Inscription Client</h2>

            <!-- Message global d'erreur -->
            

            <form method="POST" action="{{route('customers.register.verification')}}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" >
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
                    @error('name')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
                    {{-- @error('surname')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror --}}
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                    @error('email')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" >
                    @error('phone')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="coordonnates_gps" class="form-label">Coordonnées GPS</label>
                    <input type="text" class="form-control" id="coordonnates_gps" name="coordonnates_gps" value="{{ old('coordonnates_gps') }}" >
                    @error('coordonnates_gps')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="account_balance" class="form-label">Solde Compte</label>
                    <input type="number" step="0.01" class="form-control" id="account_balance" name="account_balance" value="{{ old('account_balance') }}" >
                    @error('account_balance')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="credit_limit" class="form-label">Limite de crédit</label>
                    <input type="number" step="0.01" class="form-control" id="credit_limit" name="credit_limit" value="{{ old('credit_limit') }}" >
                    @error('credit_limit')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password1" name="password" >
                    @error('password')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirmer votre Mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password_confirmation" >
                    @error('password_confirmation')
                        <small class="invalid-feedback d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="/login" class="text-decoration-underline">Se connecter</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
