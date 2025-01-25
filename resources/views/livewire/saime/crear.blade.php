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
            <div class="min-h-screen flex justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-bold text-center">REGISTRO INTERNO DE SAIME</h3>
                    <form>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center py-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Nacionalidad</span>
                                        <select wire:model="letra" class="w-full px-4 py-2 border rounded-r-lg font-bold text-neutral-900 border-solid border-neutral-900 outline-2" required>
                                            <option value="">Seleccione</option>
                                            <option value="V">VENEZOLANO</option>
                                            <option value="E">EXTRANJERO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center py-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Cedula</span>
                                        <input wire:model="cedula" type="number" class="w-full  pl-2 text-base border font-bold outline-2 text-neutral-900 rounded-r-lg border-neutral-900">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">1er Nombre</span>
                                        <input wire:model="nombre1" type="text" class="block w-[1px] min-w-0 flex-auto bg-white pl-2 text-base text-neutral-900 border rounded-r-lg font-bold outline-2 border-neutral-900" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">2do Nombre</span>
                                        <input wire:model="nombre2" type="text" class="block w-[1px] min-w-0 flex-auto bg-white pl-2 text-base border text-neutral-900 rounded-r-lg font-bold outline-2 border-neutral-900" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">1er Apellido</span>
                                        <input wire:model="apellido1" type="text" class="block w-[1px] min-w-0 flex-auto bg-white pl-2 text-base text-neutral-900 border rounded-r-lg font-bold outline-2 border-neutral-900" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">2do Apellido</span>
                                        <input wire:model="apellido2" type="text" class="block w-[1px] min-w-0 flex-auto bg-white pl-2 text-base border text-neutral-900 rounded-r-lg font-bold outline-2 border-neutral-900" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Fecha de Nacimiento --}}
                                <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Fecha de Nacimiento</span>
                                <input wire:model="fechaNacimiento" type="date" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-900 bg-clip-padding px-3 py-[0.25rem] text-base font-bold  text-neutral-900 " />
                            </div>

                            <div class="flex items-center justify-center pb-4"> {{-- campo genero --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Genero</span>
                                        <select wire:model="generoId" class="w-full px-4 py-2 border rounded-r-lg border-solid border-neutral-900 text-neutral-900 font-bold outline-2">
                                            <option value="">Seleccione</option>
                                            @foreach ($generos as $genero)
                                                <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input wire:model="generoId" type="text" class="w-full bg-white pl-2 text-base rounded-r-lg font-bold outline-2 border-neutral-900" />
                                        <input wire:model="generoIdHidden" type="hidden" class="w-full bg-white pl-2 text-base rounded-r-lg font-bold outline-2 border-neutral-900" /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>