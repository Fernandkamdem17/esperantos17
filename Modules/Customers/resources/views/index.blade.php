<x-customers::layouts.master>
    <h1>Bienvenue {{Auth::user()->username}}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Log Out</button>
    </form>

   @if (session('success'))
    <p>{{ session('success') }}</p>
@endif

    <p>Module: {!! config('customers.name') !!}</p>
</x-customers::layouts.master>
