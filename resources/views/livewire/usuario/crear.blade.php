<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
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
            <div class="min-h-screen flex justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-semibold text-center pb-4">REGISTRO DE USUARIOS</h3>
                    <form>
                        <div class="flex items-center justify-center pb-4"> {{-- campo Nivel --}}
                            <div class="w-full rounded-lg bg-red-500 text-white">
                                <div class="flex">
                                    <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold ">Nivel de Usuario</span>
                                    <select class="block w-[1px] min-w-0 px-4 flex-auto py-2 border rounded-r-lg text-gray-900 font-bold focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model.live="nivelId" required>
                                        <option value="">Seleccione</option>
                                        @foreach( $niveles as $nivel )
                                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('nivelId')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-center pb-4"> {{-- campo Area --}}
                            <div class="w-full rounded-lg bg-red-500 text-white">
                                <div class="flex">
                                    <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Àrea de Trabajo</span>
                                    <select class="block w-[1px] min-w-0 px-4 flex-auto py-2 border rounded-r-lg text-gray-900 font-bold focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model="areaId" required>
                                        <option value="">Seleccione</option>
                                        @foreach( $areas as $area )
                                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('areaId')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>
                        @if ($nivelId > 1)
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 flex rounded-tl-lg rounded-bl-lg text-white font-bold ">Estado estado</span>
                                        <select class=" flex-auto block w-[1px] min-w-0 px-4 py-2 border rounded-r-lg text-gray-900 font-bold focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model.live="estadoId" required>
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
                        @endif
                        @if (!is_null($municipios) and $nivelId > 2) {{-- campo municipio --}}
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Municipio</span>
                                        <select class="w-full px-4 py-2 border rounded-r-lg text-gray-900 font-bold focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model.live="municipioId" required>
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
                        @if (!is_null($parroquias) and $nivelId == 4) {{-- campo Parroquia --}}
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Parroquia</span>
                                        <select class="w-full px-4 py-2 border rounded-r-lg text-gray-900 focus:outline-none font-bold focus:ring-2 focus:ring-cyan-500" wire:model.live="parroquiaId" required>
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
                        <div class="flex items-center justify-center pb-4"> {{-- campo Usuario --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Usuario</span>
                                <input wire:model="name" type="text" class="w-full pl-2 text-base border rounded-r-lg font-bold outline-0 border-slate-900 text-neutral-900 border-solid" />
                              </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pb-4"> {{-- campo Correo --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Correo</span>
                                <input wire:model="email" type="email" class="w-full pl-2 text-base border rounded-r-lg font-bold outline-0 border-slate-900 text-neutral-900 border-solid" />
                              </div>
                            </div>
                        </div>
                        @if ($showPassword)
                        <div class="flex items-center justify-center pb-4"> {{-- campo contraseña --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Contraseña</span>
                                <input wire:model="password" type="password" class="w-full pl-2 text-base border rounded-r-lg font-bold outline-0 border-slate-900 text-neutral-900 border-solid" />
                              </div>
                            </div>
                        </div>
                        @endif
                        <div class="px-4 py-3 sm:px-6 sm:flex">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>