<x-layouts.app :title="$user->email" :meta-description="$user->role">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <x-slot name="header">
        <h2
            class="font-semibold
 text-xl text-gray-800 dark:text-gray-400
 leading-tight flex items-center
 justify-between">
            Información del usuario
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-gray-200">


                    <div class="mx-auto max-w-4xl">

                        <div class="px-4 sm:px-0">

                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">
                                    Usuario
                                </h3>

                                <div class="flex items-center justify-between gap-2">

                                    @if (
                                        Auth::user()->role == env('ADMIN_ROLE_NAME', 'admin')
                                        )

                                        <a href="{{ route('users.edit', $user) }}"
                                            class="self-auto
 flex items-center justify-between rounded bg-warning
 px-4 pb-[5px] pt-[6px] text-xs font-medium uppercase
 leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b]
 transition duration-150 ease-in-out hover:bg-warning-600
 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)]
 focus:bg-warning-600
 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)]
 focus:outline-none focus:ring-0
 active:bg-warning-700
 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)]
 dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)]
 dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]
 dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]
 dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="w-5 h-5">
                                                <path
                                                    d="M5.433
 13.917l1.262-3.155A4 4 0
 017.58 9.42l6.92-6.918a2.121 2.121
 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154
 1.262a.5.5 0 01-.65-.65z"
 />
                                                <path
                                                    d="M3.5 5.75c0-.69.56-1.25
 1.25-1.25H10A.75.75 0 0010
 3H4.75A2.75 2.75 0 002
 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75
 2.75 0 0017 15.25V10a.75.75 0
 00-1.5 0v5.25c0 .69-.56 1.25-1.25
 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                            </svg>

                                            Editar
                                        </a>
                                        @endif
                                        
                                        @if (
                                        Auth::user()->role == env('ADMIN_ROLE_NAME', 'admin') &&
                                        Auth::user()->id !== $user->id
                                        )
    
                                            <button
                                                class="self-auto
 flex items-center justify-between
 rounded bg-danger px-4 pb-[5px]
 pt-[6px] text-xs font-medium
 uppercase leading-normal text-white
 shadow-[0_4px_9px_-4px_#dc4c64]
 transition duration-150 ease-in-out
 hover:bg-danger-600
 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]
 focus:bg-danger-600
 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]
 focus:outline-none
 focus:ring-0 active:bg-danger-700
 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]
 dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)]
 dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]
 dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]
 dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                                type="button" data-te-toggle="modal"
                                                data-te-target="#modal_delete_idea" data-te-ripple-init>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="w-5 h-5">
                                                    <path fill-rule="evenodd"
                                                        d="M8.75
1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75
 0 10.23 1.482l.149-.022.841 10.518A2.75
 2.75 0 007.596 19h4.807a2.75 2.75 0
 002.742-2.53l.841-10.52.149.023a.75.75
 0 00.23-1.482A41.03 41.03 0 0014
 4.193V3.75A2.75 2.75 0 0011.25
 1h-2.5zM10 4c.84 0 1.673.025
 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69
 0-1.25.56-1.25 1.25v.325C8.327
 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0
 00-1.5.06l.3 7.5a.75.75 0
 101.5-.06l-.3-7.5zm4.34.06a.75.75 0
 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                        clip-rule="evenodd" />
                                                </svg>


                                                Eliminar
                                            </button>

                                            {{-- Proceso para borrar --}}
                                                @php
                                                    $modal_title = '¿Realmente desea eliminar este usuario?';
                                                    $modal_body = 'Recuerde que esta acción no se puede deshacer';
                                                @endphp

                                            <div data-te-modal-init
                                                class="fixed
 left-0 top-0 z-[1055] hidden h-full
 w-full overflow-y-auto overflow-x-hidden
 outline-none"
                                                id="modal_delete_idea" tabindex="-1"
                                                aria-labelledby="modal_delete_idea_Title" aria-modal="true"
                                                role="dialog">
                                                <div data-te-modal-dialog-ref
                                                    class="pointer-events-none
 relative flex min-h-[calc(100%-1rem)]
 w-auto translate-y-[-50px] items-center
 opacity-0 transition-all duration-300
 ease-in-out min-[576px]:mx-auto
 min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)]
 min-[576px]:max-w-[500px]">
                                                    <div
                                                        class="pointer-events-auto
 relative flex w-full flex-col rounded-md
 border-none bg-white dark:bg-gray-800
 bg-clip-padding text-current shadow-lg
 outline-none">
                                                        <div
                                                            class="flex flex-shrink-0
                                                             items-center justify-between
                                                              rounded-t-md border-b-2
                                                               border-neutral-100 border-opacity-100
                                                                p-4 dark:border-opacity-50">
                                                            <!--Modal title-->
                                                            <h5 class="text-xl
 font-medium leading-normal text-neutral-800
 dark:text-neutral-200"
                                                                id="modal_delete_idea_Title">
                                                                {{ $modal_title }}
                                                            </h5>
                                                            <!--Close button-->
                                                            <button type="button"
                                                                class="box-content
 rounded-none border-none
 hover:no-underline hover:opacity-75
 focus:opacity-100 focus:shadow-none
 focus:outline-none"
                                                                data-te-modal-dismiss aria-label="Close">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-6 w-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <!--Modal body-->
                                                        <div class="relative p-4">
                                                            <p>{{ $modal_body }}</p>
                                                        </div>

                                                        <!--Modal footer-->
                                                        <div
                                                            class="flex
 flex-shrink-0 flex-wrap items-center
 justify-end rounded-b-md border-t-2
 border-neutral-100 border-opacity-100
 p-4 dark:border-opacity-50">
                                                            <button type="button"
                                                                class="inline-block
 rounded bg-primary-100 px-6 pb-2
 pt-2.5 text-xs font-medium uppercase
 leading-normal text-primary-700 transition
 duration-150 ease-in-out hover:bg-primary-accent-100
 focus:bg-primary-accent-100 focus:outline-none
 focus:ring-0 active:bg-primary-accent-200"
                                                                data-te-modal-dismiss data-te-ripple-init
                                                                data-te-ripple-color="light">
                                                                Cancelar
                                                            </button>

                                                                <form action="{{ route('users.destroy', $user) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <button type="submit"
                                                                        class="ml-1
 inline-block rounded bg-danger
 px-6 pb-2 pt-2.5 text-xs font-medium
 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca]
 transition duration-150 ease-in-out hover:bg-danger-600
 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
 focus:bg-danger-600
 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
 focus:outline-none focus:ring-0 active:bg-danger-700
 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
 dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)]
 dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
 dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
 dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                                        data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        Eliminar
                                                                    </button>

                                                                </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                </div>

                            </div>


                            <p
                            class="mt-1
                             max-w-2xl text-sm leading-6 text-gray-500
                              dark:text-gray-400">
                              Datos del usuario</p>
                        </div>

                        <div class="mt-6 border-t border-gray-100 dark:border-gray-500">

                            <dl class="divide-y divide-gray-100 dark:divide-gray-500">

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">Nombre completo/Razón Social</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->name }}
                                    </dd>
                                </div>

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">Tipo de documento</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->document_type }}
                                    </dd>
                                </div>

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">
                                        Número de documento</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->document_number }}
                                    </dd>
                                </div>

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">
                                        Correo electrónico</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->email }}
                                    </dd>
                                </div>

                                @if (
                                Auth::user()->role == env('ADMIN_ROLE_NAME', 'admin')
                                )
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">
                                        Rol</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->role }}
                                    </dd>
                                </div>
                                @endif
                                
                                @if (
                                Auth::user()->role == env('ADMIN_ROLE_NAME', 'admin')
                                )
               <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">
                                        Estado</dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        @if ($user->is_active)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </dd>
                                </div>
                                @endif

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm
 font-medium leading-6 text-gray-900
 dark:text-gray-100">Creación
                                    </dt>
                                    <dd
                                        class="mt-1
 text-sm leading-6 text-gray-700
 dark:text-gray-300 sm:col-span-2 sm:mt-0">
                                        {{ $user->created_at }}
                                    </dd>
                                </div>


                            </dl>

                        </div>



                        {{-- <hr class="pb-4 mt-4">
                        <a class="mr-auto text-sm
 font-semibold underline border-2
 border-transparent rounded dark:text-slate-300
 text-slate-600 focus:border-slate-500
 focus:outline-none"
                            href="{{ route('users.index') }}">
                            {{ __('Atrás') }}
                        </a> --}}

                    </div>

                </div>
            </div>
        </div>
    </div>


    
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-gray-200">


                    <div class="mx-auto max-w-4xl">

                        @if (!$certifications->isEmpty() )
                        <div class="px-4 sm:px-0">
                            <h3
                                class="text-base
                                 font-semibold leading-7
                                  text-gray-900 dark:text-gray-100
                                   flex items-center justify-between">
                                Certificados
                            </h3>

                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">
                                Disponibles para descarga
                            </p>

                        </div>

                        <div class="mt-6 border-t border-gray-100 dark:border-gray-500">


                            @if (count($certifications) > 10)

                            <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400 text-center">
                                Filtrar
                            </p>

                            <div class="pt-2 pb-4 text-gray-900 dark:text-gray-100">
                                <form method="GET" action="{{ route('certifications.index') }}">
                
                                    <div class="grid grid-flow-col gap-4 pb-6">
                
                
                                        <div class="relative" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full
                 rounded border-0 bg-transparent px-3
                 py-[0.32rem] leading-[1.6] outline-none
                 transition-all duration-200 ease-linear
                 focus:placeholder:opacity-100
                 peer-focus:text-primary
                 data-[te-input-state-active]:placeholder:opacity-100
                 motion-reduce:transition-none
                 dark:text-neutral-200
                 dark:placeholder:text-neutral-200
                 dark:peer-focus:text-primary
                 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="vigencia" name="vigencia" value="{{ request()->input('vigencia') }}"
                                                placeholder="Vigencia" />
                                            <label for="vigencia"
                                                class="pointer-events-none absolute
                 left-3 top-0 mb-0 max-w-[90%] origin-[0_0]
                 truncate pt-[0.37rem] leading-[1.6] text-neutral-500
                 transition-all duration-200 ease-out
                 peer-focus:-translate-y-[0.9rem]
                 peer-focus:scale-[0.8]
                 peer-data-[te-input-state-active]:-translate-y-[0.9rem]
                 peer-data-[te-input-state-active]:scale-[0.8]
                 motion-reduce:transition-none dark:text-neutral-200
                 dark:peer-focus:text-primary">
                                                Vigencia
                                            </label>
                                        </div>
                
                                        <div class="relative" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full
                 rounded border-0 bg-transparent px-3
                 py-[0.32rem] leading-[1.6] outline-none
                 transition-all duration-200 ease-linear
                 focus:placeholder:opacity-100
                 peer-focus:text-primary
                 data-[te-input-state-active]:placeholder:opacity-100
                 motion-reduce:transition-none
                 dark:text-neutral-200
                 dark:placeholder:text-neutral-200
                 dark:peer-focus:text-primary
                 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="periodo" name="periodo" value="{{ request()->input('periodo') }}"
                                                placeholder="Período" />
                                            <label for="periodo"
                                                class="pointer-events-none
                 absolute left-3 top-0 mb-0 max-w-[90%]
                 origin-[0_0] truncate pt-[0.37rem] leading-[1.6]
                 text-neutral-500 transition-all duration-200
                 ease-out peer-focus:-translate-y-[0.9rem]
                 peer-focus:scale-[0.8] peer-focus:text-primary
                 peer-data-[te-input-state-active]:-translate-y-[0.9rem]
                 peer-data-[te-input-state-active]:scale-[0.8]
                 motion-reduce:transition-none dark:text-neutral-200
                 dark:peer-focus:text-primary">
                                                Período
                                            </label>
                                        </div>
                
                                        <div class="relative" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full
                 rounded border-0 bg-transparent px-3
                 py-[0.32rem] leading-[1.6] outline-none
                 transition-all duration-200 ease-linear
                 focus:placeholder:opacity-100
                 peer-focus:text-primary
                 data-[te-input-state-active]:placeholder:opacity-100
                 motion-reduce:transition-none
                 dark:text-neutral-200
                 dark:placeholder:text-neutral-200
                 dark:peer-focus:text-primary
                 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="nit_emisor" name="nit_emisor"
                                                 value="{{ request()->input('nit_emisor') }}"
                                                placeholder="Nit Emisor" />
                                            <label for="nit_emisor"
                                                class="pointer-events-none
                 absolute left-3 top-0 mb-0 max-w-[90%]
                 origin-[0_0] truncate pt-[0.37rem] leading-[1.6]
                 text-neutral-500 transition-all duration-200
                 ease-out peer-focus:-translate-y-[0.9rem]
                 peer-focus:scale-[0.8] peer-focus:text-primary
                 peer-data-[te-input-state-active]:-translate-y-[0.9rem]
                 peer-data-[te-input-state-active]:scale-[0.8]
                 motion-reduce:transition-none dark:text-neutral-200
                 dark:peer-focus:text-primary">
                                                Nit Emisor
                                            </label>
                                        </div>
                
                                    </div>
                
                                    <div class="grid grid-flow-col auto-cols-auto gap-4">
                
                                        <div class="relative" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full
                 rounded border-0 bg-transparent px-3
                 py-[0.32rem] leading-[1.6] outline-none
                 transition-all duration-200 ease-linear
                 focus:placeholder:opacity-100
                 peer-focus:text-primary
                 data-[te-input-state-active]:placeholder:opacity-100
                 motion-reduce:transition-none
                 dark:text-neutral-200
                 dark:placeholder:text-neutral-200
                 dark:peer-focus:text-primary
                 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="cod_fideicomiso" name="cod_fideicomiso"
                                                value="{{ request()->input('cod_fideicomiso') }}"
                                                 placeholder="Nit Emisor" />
                                            <label for="cod_fideicomiso"
                                                class="pointer-events-none
                 absolute left-3 top-0 mb-0 max-w-[90%]
                 origin-[0_0] truncate pt-[0.37rem] leading-[1.6]
                 text-neutral-500 transition-all duration-200
                 ease-out peer-focus:-translate-y-[0.9rem]
                 peer-focus:scale-[0.8] peer-focus:text-primary
                 peer-data-[te-input-state-active]:-translate-y-[0.9rem]
                 peer-data-[te-input-state-active]:scale-[0.8]
                 motion-reduce:transition-none dark:text-neutral-200
                 dark:peer-focus:text-primary">
                                                Fideicomiso
                                            </label>
                                        </div>
                
                                        <div class="relative">
                                            <select
                                            id="type_id" name="type_id" data-te-select-init
                                            data-te-select-placeholder="Seleccione una opción">
                                                <option value=" "
                                                 @if (request()->input('type_id') == null)
                                                  selected @endif>
                                                  -- Todos --
                                                </option>
                
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"
                                                        @if (request()->input('type_id') == $type->id) selected @endif>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                
                                            </select>
                                            <label data-te-select-label-ref for="role">Tipo</label>
                                        </div>
                
                                        <!--Submit button-->
                                        <div class="relative">
                
                                            <div class="inline-flex w-full" role="group">
                                                <button type="submit"
                                                    class="w-full
                 inline-block rounded-l border-2 border-primary
                 px-6 pb-[6px] pt-2 text-xs font-medium uppercase
                 leading-normal text-primary transition duration-150
                 ease-in-out hover:border-primary-600 hover:bg-neutral-500
                 hover:bg-opacity-10 hover:text-primary-600
                 focus:border-primary-600 focus:text-primary-600
                 focus:outline-none focus:ring-0 active:border-primary-700
                 active:text-primary-700 dark:hover:bg-neutral-100
                 dark:hover:bg-opacity-10"
                                                    data-te-ripple-init data-te-ripple-color="light">
                                                    Filtrar
                                                </button>
                
                                                @if (request()->input('vigencia') ||
                                                        request()->input('periodo') ||
                                                        request()->input('nit_emisor') ||
                                                        request()->input('cod_fideicomiso') ||
                                                        request()->input('type_id'))
                                                    <a href="{{ route('certifications.index') }}"
                                                        class="-ml-0.5
                 inline-block border-2 rounded-r border-primary
                 px-6 pb-[6px] pt-2 text-xs font-medium uppercase
                 leading-normal text-primary transition duration-150
                 ease-in-out hover:border-primary-600 hover:bg-neutral-500
                 hover:bg-opacity-10 hover:text-primary-600
                 focus:border-primary-600 focus:text-primary-600
                 focus:outline-none focus:ring-0 active:border-primary-700
                 active:text-primary-700 dark:hover:bg-neutral-100
                 dark:hover:bg-opacity-10"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Limpiar
                                                    </a>
                                                @endif
                
                                            </div>
                                        </div>
                
                
                                    </div>
                
                                </form>
                
                            </div>


                            <hr>

                            @endif

                            
                            {{ $certifications->appends(request()->query())->links() }}

                    <div class="flex flex-col">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <caption style="display: none;">Detalle</caption>
                                        <thead
                                            class="border-b
 bg-white font-medium dark:border-neutral-500
 dark:bg-neutral-600">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('vigencia', 'Vigencia')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('periodo', 'Período')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('nit_emisor', 'NIT Emisor')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('document_number', 'Documento')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('type.name', 'Tipo')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('ciudad', 'Ciudad')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <div class="flex items-center gap-1">
                                                        @sortablelink('departamento', 'Departamento')
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-5 h-5">
                                                        <path fill-rule="evenodd"
                                                            d="M4.5 2A1.5
 1.5 0 003 3.5v13A1.5 1.5 0 004.5 18h11a1.5 1.5 0
 001.5-1.5V7.621a1.5 1.5 0 00-.44-1.06l-4.12-4.122A1.5
 1.5 0 0011.378 2H4.5zm4.75 6.75a.75.75 0 011.5
 0v2.546l.943-1.048a.75.75 0 011.114 1.004l-2.25
 2.5a.75.75 0 01-1.114 0l-2.25-2.5a.75.75 0
 111.114-1.004l.943 1.048V8.75z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-4">
                                            Opciones
                                        </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($certifications as $certification)
                                                <tr
                                                    class="
                                    border-b transition
 duration-300 ease-in-out
 hover:bg-neutral-100
 dark:hover:bg-neutral-600
                                    dark:border-neutral-500 bg-white dark:bg-neutral-700
                                 
                       ">
                                                    <td class=" px-6 py-4 font-medium">
                                                        {{ $certification->vigencia }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->periodo }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->nit_emisor }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->document_number }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->type->name }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->ciudad }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        {{ $certification->departamento }}
                                                    </td>
                                                    <td class=" px-6 py-4">
                                                        <form
                                                            action="{{ route('certifications.pdf') }}"
                                                            method="POST">
                                                            @csrf

    <input type="hidden" value="{{ $certification->type_id }}" name="type_id" />
    <input type="hidden" value="{{ $certification->document_number }}" name="document_number" />
    <input type="hidden" value="{{ $certification->nit_emisor }}" name="nit_emisor" />
    <input type="hidden" value="{{ $certification->vigencia }}" name="vigencia" />
    <input type="hidden" value="{{ $certification->periodo }}" name="periodo" />
    <input type="hidden" value="{{ $certification->ciudad }}" name="ciudad" />
    <input type="hidden" value="{{ $certification->departamento }}" name="departamento" />
    
                                                            <button type="submit"
                                                                data-te-ripple-init data-te-ripple-color="light"
                                                                class="inline-block
     rounded-full bg-primary p-2 uppercase
     leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca]
     transition duration-150 ease-in-out hover:bg-primary-600
     hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
     focus:bg-primary-600
     focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
     focus:outline-none
     active:bg-primary-700
     active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
     dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)]
     dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
     dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
     dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    class="w-5 h-5">
                                                                    <path d="M8 10a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.5
     2A1.5 1.5 0 003 3.5v13A1.5 1.5 0
     004.5 18h11a1.5 1.5 0 001.5-1.5V7.621a1.5
     1.5 0 00-.44-1.06l-4.12-4.122A1.5 1.5 0
     0011.378 2H4.5zm5 5a3 3 0 101.524
     5.585l1.196 1.195a.75.75 0
     101.06-1.06l-1.195-1.196A3
     3 0 009.5 7z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
    
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ $certifications->appends(request()->query())->links() }}



                        </div>

                        @else
    <h3 class="mt-1
    max-w-2xl text-sm leading-6 text-gray-500
     dark:text-gray-400">
     No se encontraron certificados relacionados con el documento <strong>{{ $user->document_number }}</strong></h3>
    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.app>
