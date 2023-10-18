<x-layouts.app :title="$user->firstname" :meta-description="$user->lastname">
    
    <h3>Actualización de usuarios</h3>
    <p class="help-text">Este formulario contiene campos obligatorios marcados con asterisco (*)</p>

    <form action="{{ route('users.update', $user) }}" method="POST">

        @csrf
        @method('PATCH')

        @include('users.form-fields')

        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>

    </form>

</x-layouts.app>
