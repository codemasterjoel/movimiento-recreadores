<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <form>
                        <div class="grid grid-cols-2 gap-4"> 
                            <div class="flex items-center justify-center py-4"> {{-- campo cedula --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="flex bg-cyan-900 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Cédula</span>
                                        <input wire:model="cedula" type="text" class="w-full bg-white pl-2 text-base border font-semibold outline-0 rounded-r-lg border-slate-200" onkeypress="$(this).mask('00000000')" maxlength="8" title="debe colocar una cedula valida">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nombre y Apellido --}}
                            <span class="flex bg-cyan-900 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nombre y Apellido</span>
                            <input wire:model="nombreCompleto" type="text" class="rounded-r-lg relative m-0 block w-[1px] min-w-0 flex-auto text-uppercase border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" onkeyup="this.value = this.value.toUpperCase();"/>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Fecha de Nacimiento --}}
                                <span class="flex bg-cyan-900 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Fecha de Nacimiento</span>
                                <input wire:model="fechaNacimiento" type="date" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" />
                            </div>

                            <div class="flex items-center justify-center pb-4"> {{-- campo genero --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Genero</span>
                                        <select wire:model="generoId" class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                            <option value="">Seleccione</option>
                                                <option value="1">Femenima</option>
                                                <option value="2">Femenina</option>
                                                <option value="2">Masculino</option>
                                                <option value="3">Otro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Telefono</span>
                                        <input wire:model="telefono" type="text" class="w-full bg-white pl-2 text-base border rounded-r-lg font-semibold outline-0 border-slate-200" minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" />
                                    </div>
                                </div>
                            </div>
                            <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nivel Academico --}}
                                <span class="flex bg-cyan-900 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nivel Académico</span>
                                <select wire:model="nivelAcademicoId" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary">
                                    <option value="">Seleccione</option>
                                    @foreach( $nivelesAcademicos as $nivelacademico )
                                        <option value="{{ $nivelacademico->id }}">{{ $nivelacademico->nombre }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" /> --}}
                            </div>
                        </div>


                        <div class="grid grid-cols-3 gap-4"> {{-- campo estado --}}
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                <div class="flex">
                                    <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Estado</span>
                                    <select class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model.live="estadoId" required>
                                        <option value="">Seleccione</option>
                                        @foreach( $estados as $estado )
                                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>

                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="flex items-center justify-center pb-4">
                                    <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Municipio</span>
                                        <select class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model.live="municipioId" required>
                                            <option value="">Seleccione</option>
                                            @foreach( $municipios as $municipio )
                                                <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            @endif

                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="flex items-center justify-center pb-4">
                                    <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Parroquia</span>
                                        <select class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model="parroquiaId" required>
                                            <option value="">Seleccione</option>
                                            @foreach( $parroquias as $parroquia )
                                            <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-center pb-4"> {{-- campo Correo --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Correo</span>
                                <input wire:model="correo" type="email" class="w-full bg-white pl-2 text-base border rounded-r-lg font-semibold outline-0 border-slate-200" placeholder="usuario@correo.com" />
                              </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pb-4"> {{-- campo Direccion --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Dirección</span>
                                <input wire:model="direccion" type="text" class="w-full bg-white pl-2 text-base border rounded-r-lg font-semibold outline-0 border-slate-200" onkeyup="this.value = this.value.toUpperCase();"/>
                              </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModalPostulado()">SALIR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                {{-- <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button> --}}
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>