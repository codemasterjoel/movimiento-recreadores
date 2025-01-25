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
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('img/logo.png')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-bold text-center">REGISTRAR NUEVO PERSONAL</h3>
                    <form>
                        <div class="row">
                            <div class="col-xl-4 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center"> {{-- campo cedula --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <!-- component -->
                                            <label>
                                                <input type="radio" value="1" {{isset($estatus) ? 'checked' : ''}} class="peer hidden"  name="framework" wire:model.live="estatus">
                                                <div class="hover:bg-blue-500 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm  border-gray-200 group peer-checked:border-blue-700  peer-checked:bg-blue-400">
                                                    <h2 class="font-medium text-gray-700">Activo</h2>
                                                </div>
                                            </label>

                                            <label>
                                                <input type="radio" value="0" {{isset($estatus) ? 'checked' : ''}} class="peer hidden" name="framework" wire:model.live="estatus">
                                                <div class="hover:bg-red-500 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm  border-gray-200 group peer-checked:border-red-500 peer-checked:text-white peer-checked:bg-red-400">
                                                    <h2 class="font-medium text-gray-700">Inactivo</h2>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4 pr-2">
                            <div class="col-xl-4 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center"> {{-- campo cedula --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="flex bg-cyan-900 text-white items-center font-bold whitespace-nowrap rounded-l-lg border-r-0 border-solid px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nacionalidad</span>
                                            <select wire:model.live="nacionalidad" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-900 bg-clip-padding px-3 py-[0.25rem] font-bold leading-[1.6] text-neutral-900 outline-2 transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary">
                                                <option value="">Seleccione</option>
                                                <option value="V">V</option>
                                                <option value="E">E</option>
                                            </select>
                                        </div>
                                        @error('nacionalidadId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center"> {{-- campo cedula --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <input wire:model="cedula" type="text"  class="w-full pl-3 border px-3 py-[0.25rem] border-solid text-neutral-900 font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900" onkeypress="$(this).mask('00000000')" maxlength="8">
                                            <input wire:click="consultar" type="button" value="Buscar" class="bg-gradient-primary px-2 py-[0.25rem] rounded-tr-lg rounded-br-lg text-white font-bold ">
                                        </div>
                                        @error('cedula') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold transition-colors">Nombre</span>
                                            <input wire:model="nombre" type="text" class="w-full pl-2 text-neutral-900 border rounded-r-lg font-bold outline-2 border-cyan-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                        </div>
                                        @error('nombre')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nivel Academico --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold transition-colors">Apellido</span>
                                            <input wire:model="apellido" type="text" class="w-full pl-2 border rounded-r-lg text-neutral-900 font-bold outline-2 border-cyan-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                        </div>
                                        @error('apellido')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex flex-wrap items-stretch pb-4">
                                <span class="flex bg-cyan-900 font-bold text-white items-center rounded-l-lg border border-r-0 border-solid px-3 border-neutral-900">Fecha de Nacimiento</span>
                                <input wire:model="fechaNacimiento" type="date" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-900 px-3 font-bold text-neutral-900 outline-2" />
                                @error('fechaNacimiento') <br><div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="relative flex flex-wrap items-stretch pb-4">
                                <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg px-3 py-[0.25rem] text-center text-base leading-[1.6]">Genero</span>
                                <select wire:model="generoId" class="relative m-0 -ml-px block min-w-0 flex-auto border border-solid outline-2 rounded-r-lg bg-clip-padding px-3 py-[0.25rem] font-bold leading-[1.6] border-slate-900 transition text-neutral-900 duration-200 ease-in-out">
                                    <option value="">Seleccione</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenina</option>
                                </select>
                                @error('generoId')<div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Telefono</span>
                                        <input wire:model="telefono" type="text" class="w-full pl-3 border border-solid rounded-r-lg font-bold outline-2 border-slate-900 text-slate-900" minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" />
                                    </div>
                                    @error('telefono')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Cuenta</span>
                                        <input wire:model="cuenta" type="number" class="w-full pl-3 border border-solid rounded-r-lg font-bold outline-2 border-slate-900 text-slate-900" minlength="20" placeholder="00000000000000000000" />
                                    </div>
                                    @error('cuenta')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Estado</span>
                                        <select class="w-full pl-3 border border-solid border-slate-900 text-slate-900 outline-2 font-bold rounded-r-lg " wire:model.live="estadoId" required>
                                            <option value="">Seleccione</option>
                                            @foreach( $estados as $estado )
                                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('estadoId')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Municipio</span>
                                            <select class="w-full pl-3 border font-bold border-solid rounded-r-lg outline-2 text-slate-900 border-slate-900" wire:model.live="municipioId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $municipios as $municipio )
                                                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('municipioId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            @endif

                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                            <select class="w-full pl-3 border border-solid font-bold border-slate-900 text-slate-900 rounded-r-lg outline-2" wire:model="parroquiaId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $parroquias as $parroquia )
                                                <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('parroquiaId') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-center pb-4"> {{-- campo Direccion --}}
                            <div class="w-full rounded-lg">
                              <div class="flex">
                                <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Dirección</span>
                                <input wire:model="direccion" type="text" class="w-full pl-3 border border-solid rounded-r-lg font-bold outline-2 border-slate-900 text-slate-900" onkeyup="this.value = this.value.toUpperCase();"/>
                              </div>
                              @error('direccion') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="flex items-center justify-center pb-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Nivel Academico</span>
                                            <select class=" flex-auto w-[1px] pl-3 border border-solid rounded-r-lg border-slate-900 text-slate-900 outline-2 font-bold" wire:model="nivelAcademicoId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $nivelesAcademicos as $nivelacademico )
                                                    <option value="{{ $nivelacademico->id }}">{{ $nivelacademico->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nivelAcademicoId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="flex items-center justify-center pb-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Profesión</span>
                                            <select class=" flex-auto w-[1px] pl-3 border border-solid rounded-r-lg border-slate-900 text-slate-900 outline-2 font-bold" wire:model="nivelAcademicoId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $nivelesAcademicos as $nivelacademico )
                                                    <option value="{{ $nivelacademico->id }}">{{ $nivelacademico->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nivelAcademicoId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="flex items-center justify-center pb-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Responsabilidad</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 outline-2 text-slate-900 font-bold rounded-r-lg" wire:model="responsabilidadId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $responsabilidades as $key => $value )
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('responsabilidadId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Correo</span>
                                        <input wire:model="correo" type="email" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" placeholder="usuario@correo.com" onkeyup="this.value = this.value.toUpperCase();"/>
                                    </div>
                                    @error('correo') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row"> {{-- campo Correo --}}
                            <div class="col-6">
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Serial</span>
                                        <input wire:model="serial" type="number" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
                                    </div>
                                    @error('serial') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Código</span>
                                        <input wire:model="serial" type="number" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
                                    </div>
                                    @error('serial') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 font-bold text-white py-2 rounded-lg mx-auto block mb-2" wire:click.prevent="guardar()" >GUARDAR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 font-bold text-white py-2 rounded-lg mx-auto block mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>