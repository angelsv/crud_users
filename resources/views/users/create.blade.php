<x-layouts.app title="Crear usuario" description="Creación de un usuario">

    <form action="{{ route('users.store') }}" method="POST">

        <h3>Creación de usuarios</h3>
        <p class="help-text">Este formulario contiene campos obligatorios marcados con asterisco (*)</p>

        @csrf

        @include('users.form-fields')

        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>

    </form>

</x-layouts.app>
