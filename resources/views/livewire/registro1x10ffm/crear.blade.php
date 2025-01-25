<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen px-4 pb-8 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        @if(session()->has('yaregistrado')== 'yaregistrado')
            @include('livewire.components.yaregistrado')
        @endif
        @if(session()->has('noencontrada')== 'noencontrada')
            @include('livewire.components.noencontrada')
        @endif
        @if(session()->has('noexiste')== 'success')
            @include('livewire.components.noexiste')
        @endif
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="max-w-md w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('assets/img/logo.png')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-bold text-center">REGISTRAR JEFE DE 1X10</h3>
                    <form>
                        <div class="flex items-center justify-center pt-4"> {{-- campo cedula --}}
                            <div class="w-full rounded-lg text-white">
                                <div class="flex">
                                    <input wire:model="cedula" type="number" placeholder="Cedula" class=" text-gray-900 pl-3 border border-solid font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                    <input wire:click="consultar" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                </div>
                                @error('cedula')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        @if ($mostrar == true)
                            <div class="flex items-center justify-center pb-4"> {{-- campo cedula --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="flex bg-cyan-900 font-bold text-white rounded-l-lg border border-r-0 border-solid border-neutral-900 px-3 py-[0.25rem]">Nombre</span>
                                        <input type="text" class="w-full rounded-r-lg text-gray-900 pl-3 border border-r-0 border-solid border-neutral-900 font-bold" wire:model="nombreCompleto">
                                        {{-- <input wire:model="nombreCompleto" type="text" class="rounded-0 font-bold relative m-0 block w-[1px] min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base leading-[1.6] text-gray-400 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" /> --}}
                                    </div>
                                    @error('nombreCompleto')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo genero --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Genero</span>
                                        <select wire:model="generoId" class="w-full pl-3 border border-solid border-slate-900 font-bold text-gray-900 outline-2 rounded-r-lg ">
                                            <option value="">Seleccione</option>
                                            @foreach ($generos as $genero)
                                                <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('generoId')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Telefono</span>
                                        <input wire:model="telefono" type="text" class="w-full text-gray-900 border border-solid border-slate-900 outline-2 pl-3 rounded-r-lg font-bold " minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" required/>
                                    </div>
                                    @error('telefono')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Estado</span>
                                        <select class="w-full pl-3 border border-solid border-slate-900 outline-2 rounded-r-lg text-gray-900 font-bold " wire:model.live="estadoId" required>
                                            <option value="">Seleccione</option>
                                            @foreach( $estados as $estado )
                                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('estadoId')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg bg-red-500 text-white">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Municipio</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 rounded-r-lg text-gray-900 font-bold outline-2 " wire:model.live="municipioId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $municipios as $municipio )
                                                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('municipioId')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg bg-red-500 text-white">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 rounded-r-lg text-gray-900 font-bold outline-2" wire:model.live="parroquiaId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $parroquias as $parroquia )
                                                <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('parroquiaId')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($centros))
                                <div class="flex items-center justify-center pb-4">
                                    <div class="w-full rounded-lg bg-red-500 text-white">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Centro</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 rounded-r-lg text-gray-900 font-bold outline-2" wire:model="centroId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $centros as $centro )
                                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('centroId')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block mb-2 font-bold" wire:click="cerrarModal()">SALIR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block mb-2 font-bold" wire:click.prevent="guardar()"  >GUARDAR</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>