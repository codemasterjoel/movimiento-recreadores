<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('assets/img/logo.png')}}" class="w-52">
                    </div>
                    @if(session()->has('integranteGuardado')== 'success')
                        @include('livewire.components.success')
                    @endif
                    @if(session()->has('integranteEliminado')== 'success')
                        @include('livewire.components.delete')
                    @endif
                    @if(session()->has('yaregistrado')== 'success')
                        @include('livewire.components.yaregistrado')
                    @endif
                    @if(session()->has('noencontrada')== 'noencontrada')
                        @include('livewire.components.noencontrada')
                    @endif
                    <h3 class="text-2xl text-cyan-400 font-extrabold text-center">REGISTRAR INTEGRANTE DEL 1X10</h3>
                    <h2 class="text-2xl text-cyan-800 font-semibold text-center">{{$jefeNombreCompleto}}</h2>
                    {{$existelsb2}}
                    <form>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="grid grid-cols-3 gap-4"> 
                                    <div class="flex items-center justify-center py-4"> {{-- campo cedula --}}
                                        <div class="w-full rounded-lg bg-gray-500">
                                            <div class="flex">
                                                <input wire:model="cedulaIntegrante" type="number"  class=" bg-white pl-2 text-base border font-semibold outline-0 rounded-tl-lg rounded-bl-lg border-slate-200">
                                                <input type="button" wire:click="consultarIntegrante" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-semibold transition-colors">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nombre y Apellido --}}
                                            <span class="flex bg-cyan-300 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nombre</span>
                                            {{-- <input wire:model="nombreCompletoIntegrante" type="text" class=" bg-white pl-2 text-base font-semibold outline-0 border-slate-200 rounded-r-lg" /> --}}
                                            <input wire:model="nombreCompletoIntegrante" type="text" class=" relative m-0 block w-[1px] min-w-0 flex-auto border border-solid rounded-r-lg border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Telefono</span>
                                                    <input wire:model="telefonoIntegrante" type="text" class="w-full bg-white pl-2 border text-base font-semibold outline-0 border-slate-200" minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" />
                                                    <input wire:click="guardarIntegrante" type="button" value="Guardar" class="bg-gradient-to-r from-cyan-400 to-cyan-600 p-2 rounded-tr-lg rounded-br-lg text-white font-semibold transition-colors">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('cedulaIntegrante')
                                    {{$message}}
                                @enderror <br>
                                @error('nombreCompletoIntegrante')
                                    {{$message}}
                                @enderror<br>
                                @error('telefonoIntegrante')
                                    {{$message}}
                                @enderror
                                
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-gray-700 font-semibold text-xxs font-weight-bolder opacity-7">#</th>
                                            <th class="text-center text-uppercase text-gray-700 font-semibold text-xxs font-weight-bolder opacity-7">Cedula</th>
                                            <th class="text-center text-uppercase text-gray-700 font-semibold text-xxs font-weight-bolder opacity-7">nombre completo</th>
                                            <th class="text-center text-uppercase text-gray-700 font-semibold text-xxs font-weight-bolder opacity-7">telefono</th>
                                            <th class="text-center text-uppercase text-gray-700 font-semibold text-xxs font-weight-bolder opacity-7">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $indice =0; ?>
                                        @foreach ($integrantes as $integrante)
                                        <?php $indice += 1; ?>
                                        <tr><td class="ps-4"><p class="text-xs font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0">{{$integrante->cedula}}</p></td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$integrante->nombreCompleto}}</td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$integrante->telefono}}</td>
                                            @if (auth()->user()->nivel_id == 1)
                                                <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Integrante">
                                                    {{-- <a href="#" wire:click="editarIntegrante('{{$integrante->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a> --}}
                                                    <a href="#" wire:click="borrarIntegrante('{{$integrante->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                            {{-- <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button>
                            </span> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>