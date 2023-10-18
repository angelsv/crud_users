<x-layouts.app title="Usuarios" meta-description="CRUD usuarios">

    <h2 class="display-6 text-center mb-4">Gestión de Usuarios</h2>

    <div class="row">
        <div class="col-12 pb-4">
            
            <form action="{{ route('users.import') }}" method="POST">
                @csrf
                <button type="submit" class="ms-1 float-end btn btn-outline-secondary">
                    <i class="fa-solid fa-users"></i>
                    {{ __('Importar +10 usuarios') }}
                </button>
            </form>

            <a class="ms-1 float-end btn btn-outline-primary" href="{{ route('users.create') }}">
                <i class="fa-solid fa-user-plus"></i>
                {{ __('Crear usuario') }}
            </a>
        </div>
    </div>

    {{ $users->appends(request()->query())->links() }}

    <table class="table text-center table-hover table-striped">

        <caption style="display: none;">Usuarios</caption>

        <thead>
            <tr>
                <th>
                    <div class="">
                        @sortablelink('id', '#')
                    </div>
                </th>
                <th>
                    <div>
                        @sortablelink('firstname', 'Nombre')
                    </div>
                </th>
                <th>
                    <div>
                        @sortablelink('lastname', 'Apellido')
                    </div>
                </th>
                <th>
                    <div>
                        @sortablelink('birthday', 'Fecha Nac.')
                    </div>
                </th>
                <th>
                    <div>
                        @sortablelink('age', 'Edad')
                    </div>
                </th>
                <th>
                    Opciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="">
                    <td>
                        <a class="text-muted" href="{{ route('users.edit', $user) }}">
                            {{ $user->id }}</a>
                    </td>
                    <td>
                        <a class="text-muted" href="{{ route('users.edit', $user) }}">
                            {{ $user->firstname }}</a>
                    </td>
                    <td>
                        <a class="text-muted" href="{{ route('users.edit', $user) }}">
                            {{ $user->lastname }}</a>
                    </td>
                    <td>
                        <a class="text-muted" href="{{ route('users.edit', $user) }}">
                            {{ $user->birthday }}</a>
                    </td>
                    <td>
                        <a class="text-muted" href="{{ route('users.edit', $user) }}">
                            {{ $user->age }}</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <button type="button" class="btn btn-warning btn-sm"
                        data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $loop->index }}_">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal_delete_{{ $loop->index }}_" tabindex="-1"
                            aria-labelledby="modal_delete_{{ $loop->index }}_Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal_delete_{{ $loop->index }}_Label">Eliminar registro</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        ¿Realmente desea eliminar este registro?
                                    </p>
                                    <p class="text-help">Esta acción no se puede revertir</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>

                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
  

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->appends(request()->query())->links() }}


    <script>
        // const confirmDateOnSelect = document.getElementById('datepicker-close-without-confirmation');
        // new initTE.Datepicker(confirmDateOnSelect, {
        //     confirmDateOnSelect: true,
        // });
    </script>

</x-layouts.app>
