<x-layouts.app title="Crear usuario" description="Creación de un usuario">

    <x-slot name="header">
        <h2
            class="font-semibold
 text-xl text-gray-800 dark:text-gray-400
 leading-tight flex items-center
 justify-between">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    {{-- <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Create new idea</h1> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"> --}}

    <form class="my-4 max-w-3xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800"
        action="{{ route('users.import') }}" enctype="multipart/form-data" method="POST">

        <h5 class="mb-2 mt-0 text-xl font-medium leading-tight text-primary text-center">Carga masiva</h5>

        <p class="dark:text-slate-300 text-slate-600">Realice la carga masiva de usuarios mediante un archivo de Excel
        </p>
        <small class="dark:text-slate-300 text-slate-600">Los campos marcados con asterisco (*) son obligatorios</small>

        @csrf

        <div class="space-y-6 pt-5 pb-5">

            @if (
                session('import.getRowCount') ||
                session('import.getRowNumber') ||
                session('import.failures')
            )
                <div class="mb-4 rounded-lg bg-neutral-50 px-6 py-5 text-base text-neutral-600" role="alert">

                    <h4>Resultado de la carga de usuarios:</h4>
                    <ul>
                        <li
                            class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50">
                            Última fila leída: {{ session('import.getRowNumber') }}
                        </li>
                        <li
                            class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50">
                            Total registros procesados: {{ session('import.getRowCount') }}
                        </li>
                        @if (
                        session('import.errors') &&
                         !empty(session('import.errors')) &&
                          count(session('import.errors')))
                            <li
                                class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50">
                                Errores graves: {{ count(session('import.errors')) }}
                            </li>
                        @endif

                        @if (
                        session('import.failures') &&
                         !empty(session('import.failures')) &&
                          count(session('import.failures')))
                            <li
                                class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50">

                                <div id="accordion_failures">
                                    <div
                                        class="border
 border-t-0 border-neutral-200
 bg-white dark:border-neutral-600
 dark:bg-neutral-800">
                                        <h2 class="accordion-header mb-0" id="accordion_failures_heading1">
                                            <button
                                                class="group
 relative flex w-full items-center
 border-0 bg-white px-5 py-4 text-left text-base
 text-neutral-800 transition [overflow-anchor:none]
 hover:z-[2] focus:z-[3] focus:outline-none
 dark:bg-neutral-800 dark:text-white
 [&:not([data-te-collapse-collapsed])]:bg-white
 [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400
 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]
 [&[data-te-collapse-collapsed]]:rounded-b-[15px]
 [&[data-te-collapse-collapsed]]:transition-none"
                                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                                data-te-target="#accordion_failures_collapse1" aria-expanded="false"
                                                aria-controls="accordion_failures_collapse1">
                                                Inconsistencias encontradas: {{ count(session('import.failures')) }}
                                                <span
                                                    class="-mr-1
 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200 ease-in-out
 group-[[data-te-collapse-collapsed]]:mr-0
 group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-blue-300
 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="accordion_failures_collapse1" class="!visible hidden"
                                            data-te-collapse-item aria-labelledby="accordion_failures_heading1"
                                            data-te-parent="#accordion_failures">
                                            <div class="px-5 py-4">
                                                <ul class="">
                                                    @foreach (session('import.failures') as $failure)
                                                        <li
                                                            @if (!$loop->first) class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50" @endif>

                                                            <p class="mb-0 mt-0 text-base leading-relaxed">
                                                                <span
                                                                    class="inline-block
 whitespace-nowrap rounded-[0.27rem]
 bg-warning-100 px-[0.65em] pb-[0.25em]
 pt-[0.35em] text-center align-baseline
 text-[0.75em] font-bold leading-none
 text-warning-800">
                                                                    Fila {{ $failure->row() }}
                                                                </span>
                                                                En el campo <strong>{{ $failure->attribute() }}</strong>
                                                                se encontró el valor: <span
                                                                    class="inline-block
 whitespace-nowrap rounded-[0.27rem]
 bg-danger-100 px-[0.65em] pb-[0.25em]
 pt-[0.35em] text-center align-baseline
 text-[0.75em] font-bold leading-none
 text-danger-800">
                                                                    @if (
                                                                    empty($failure->values()[$failure->attribute()]))
                                                                        -- vacío --
                                                                    @else
                                                                        {{ $failure->values()[$failure->attribute()] }}
                                                                    @endif
                                                                </span>
                                                            </p>
                                                            <footer
                                                                class="block text-neutral-600 dark:text-neutral-400">
                                                                <ul>
                                                                    @foreach ($failure->errors() as $err)
                                                                        <li>- {{ $err }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </footer>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        @endif


                        @if (
                        session('import.errors') &&
                         !empty(session('import.errors')) &&
                          count(session('import.errors')))
                            <li
                                class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50">

                                <div id="accordion_errors">
                                    <div
                                        class="border
 border-t-0 border-neutral-200
 bg-white dark:border-neutral-600
 dark:bg-neutral-800">
                                        <h2 class="accordion-header mb-0" id="accordion_errors_heading1">
                                            <button
                                                class="group
 relative flex w-full items-center
 border-0 bg-white px-5 py-4 text-left text-base
 text-neutral-800 transition [overflow-anchor:none]
 hover:z-[2] focus:z-[3] focus:outline-none
 dark:bg-neutral-800 dark:text-white
 [&:not([data-te-collapse-collapsed])]:bg-white
 [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400
 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]
 [&[data-te-collapse-collapsed]]:rounded-b-[15px]
 [&[data-te-collapse-collapsed]]:transition-none"
                                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                                data-te-target="#accordion_errors_collapse1" aria-expanded="false"
                                                aria-controls="accordion_errors_collapse1">
                                                Problemas graves: {{ count(session('import.errors')) }}
                                                <span
                                                    class="-mr-1
 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200 ease-in-out
 group-[[data-te-collapse-collapsed]]:mr-0
 group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-blue-300
 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="accordion_errors_collapse1" class="!visible hidden"
                                            data-te-collapse-item aria-labelledby="accordion_errors_heading1"
                                            data-te-parent="#accordion_errors">
                                            <div class="px-5 py-4">
                                                <ul class="">
                                                    @foreach (session('import.errors') as $msg)
                                                        <li
                                                            @if (!$loop->first) class="w-full
 border-t-2 border-neutral-100
 border-opacity-100
 pt-4 mt-4
 dark:border-opacity-50" @endif>
                                                            {{ $msg }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        @endif

                    </ul>

                </div>
            @endif

            <!-- Section: Design Block -->
            <section
                class="rounded-t-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">

                <div id="accordionFlushExample">

                    <div class="rounded-none border border-t-0 border-l-0 border-r-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingOne">
                            <button
                                class="group
 relative flex w-full items-center rounded-none border-0
 py-4 px-5 text-left text-base font-bold transition
 [overflow-anchor:none] hover:z-[2] focus:z-[3]
 focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                data-te-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Ejemplo del archivo excel a cargar
                                <span
                                    class="ml-auto
 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200
 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-[#8FAEE0]
 dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646
 4.646a.5.5 0 0 1 .708 0L8
 10.293l5.646-5.647a.5.5 0 0
 1 .708.708l-6 6a.5.5 0 0
 1-.708 0l-6-6a.5.5 0 0
 1 0-.708z" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="!visible hidden border-0" data-te-collapse-item
                            aria-labelledby="flush-headingOne" data-te-parent="#accordionFlushExample">
                            <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                <table class="w-full border-collapse table-auto mt-6">
                                    <caption style="display: none;">Detalle</caption>
                                    <thead>
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2">name</th>
                                            <th class="border border-gray-300 px-4 py-2">email</th>
                                            <th class="border border-gray-300 px-4 py-2">document_type</th>
                                            <th class="border border-gray-300 px-4 py-2">document_number</th>
                                            <th class="border border-gray-300 px-4 py-2">is_active</th>
                                            <th class="border border-gray-300 px-4 py-2">role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">Juan Pérez</td>
                                            <td class="border border-gray-300 px-4 py-2">juan@example.com</td>
                                            <td class="border border-gray-300 px-4 py-2">CC</td>
                                            <td class="border border-gray-300 px-4 py-2">12345678</td>
                                            <td class="border border-gray-300 px-4 py-2">1</td>
                                            <td class="border border-gray-300 px-4 py-2">User</td>
                                        </tr>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">María Gómez</td>
                                            <td class="border border-gray-300 px-4 py-2">maria@example.com</td>
                                            <td class="border border-gray-300 px-4 py-2">NIT</td>
                                            <td class="border border-gray-300 px-4 py-2">ABCD1234</td>
                                            <td class="border border-gray-300 px-4 py-2">1</td>
                                            <td class="border border-gray-300 px-4 py-2">Admin</td>
                                        </tr>
                                        <!-- Puedes agregar más filas con datos de ejemplo aquí -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingTwo">
                            <button
                                class="group
 relative flex w-full items-center rounded-none border-0
 py-4 px-5 text-left text-base font-bold transition
 [overflow-anchor:none] hover:z-[2] focus:z-[3]
 focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                data-te-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Campos obligatorios
                                <span
                                    class="ml-auto
 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200
 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-[#8FAEE0]
 dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646
 4.646a.5.5 0 0 1 .708 0L8
 10.293l5.646-5.647a.5.5 0 0
 1 .708.708l-6 6a.5.5 0 0
 1-.708 0l-6-6a.5.5 0 0
 1 0-.708z" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="!visible hidden border-0" data-te-collapse-item
                            aria-labelledby="flush-headingTwo" data-te-parent="#accordionFlushExample">
                            <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                'email', 'name', 'document_type', 'document_number'
                            </div>
                        </div>
                    </div>

                    <div class="rounded-none border border-t-0 border-l-0 border-r-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingThree">
                            <button
                                class="group
 relative flex w-full items-center rounded-none border-0
 py-4 px-5 text-left text-base font-bold transition
 [overflow-anchor:none] hover:z-[2] focus:z-[3]
 focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                data-te-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Campos opcionales
                                <span
                                    class="ml-auto
 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200
 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-[#8FAEE0]
 dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646
 4.646a.5.5 0 0 1 .708 0L8
 10.293l5.646-5.647a.5.5 0 0
 1 .708.708l-6 6a.5.5 0 0
 1-.708 0l-6-6a.5.5 0 0
 1 0-.708z" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="!visible hidden rounded-b-lg" data-te-collapse-item
                            aria-labelledby="flush-headingThree" data-te-parent="#accordionFlushExample">
                            <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                <ul class="list-disc list-inside mt-2">
                                    <li>
                                        is_active: En caso de NO encontrarse, se establece con valor = 1 (activo)
                                    </li>
                                    <li>
                                        role: En caso de NO encontrarse, se establece con valor = 'user'
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <h2 class="mb-0" id="flush-headingFOur">
                            <button
                                class="group
 relative flex w-full items-center rounded-none border-0
 py-4 px-5 text-left text-base font-bold transition
 [overflow-anchor:none] hover:z-[2] focus:z-[3]
 focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary
 [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]
 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                data-te-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                Campos actualizables
                                <span
                                    class="ml-auto
 h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec]
 transition-transform duration-200
 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0
 group-[[data-te-collapse-collapsed]]:fill-[#212529]
 motion-reduce:transition-none dark:fill-[#8FAEE0]
 dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646
 4.646a.5.5 0 0 1 .708 0L8
 10.293l5.646-5.647a.5.5 0 0
 1 .708.708l-6 6a.5.5 0 0
 1-.708 0l-6-6a.5.5 0 0
 1 0-.708z" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="!visible hidden rounded-b-lg" data-te-collapse-item
                            aria-labelledby="flush-headingFOur" data-te-parent="#accordionFlushExample">
                            <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                                <p>
                                    Campos que se actualizan cuando el "document_number" ya existe:
                                </p>
                                <p>
                                    'name', 'email', 'document_type', 'is_active', 'role'
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Section: Design Block -->

            {{-- Archivo de excel --}}
            <div class="mb-3">
                <label for="import_users" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">
                    Archivo de excel (*)
                </label>
                <input
                    class="relative
 m-0 block w-full min-w-0 flex-auto rounded
 border border-solid border-neutral-300
 bg-clip-padding px-3 py-[0.32rem] text-base
 font-normal text-neutral-700 transition
 duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem]
 file:overflow-hidden file:rounded-none
 file:border-0 file:border-solid file:border-inherit
 file:bg-neutral-100 file:px-3 file:py-[0.32rem]
 file:text-neutral-700 file:transition file:duration-150
 file:ease-in-out file:[border-inline-end-width:1px]
 file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200
 focus:border-primary focus:text-neutral-700
 focus:shadow-te-primary focus:outline-none
 dark:border-neutral-600 dark:text-neutral-200
 dark:file:bg-neutral-700 dark:file:text-neutral-100
 dark:focus:border-primary"
                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    type="file" id="import_users" name="import_users" required />

                @error('import_users')
                    <div class="absolute
 w-full text-sm text-neutral-500
 peer-focus:text-primary dark:text-neutral-200
 dark:peer-focus:text-primary"
                        data-te-input-helper-ref>
                        <p class="text-red-500 text-xs italic">
                            {{ $message }}
                        </p>
                    </div>
                @enderror

            </div>

        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm
 font-semibold underline border-2
 border-transparent rounded dark:text-slate-300
 text-slate-600 focus:border-slate-500
 focus:outline-none"
                href="{{ route('users.index') }}">{{ __('Atrás') }}</a>

            <button
                class="inline-flex
 items-center px-4 py-2
 text-xs font-semibold tracking-widest text-center
 text-white uppercase transition duration-150
 ease-in-out border-2 border-transparent
 rounded-md dark:text-sky-200 bg-sky-800
 hover:bg-sky-700 active:bg-sky-700
 focus:outline-none focus:border-sky-500"
                type="submit">{{ __('Guardar') }}</button>
        </div>

    </form>

    {{-- </div>
            </div>
        </div>
    </div> --}}

</x-layouts.app>
