<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
      <div class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
        @if(session()->has('yaregistrado')== 'yaregistrado')
          @include('livewire.components.yaregistrado')
        @endif
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
          <div class="min-h-screen flex items-center justify-center">
              <div class="p-4 w-full bg-white rounded-lg">
                  <div class="flex items-center justify-center">
                    <img src="{{asset('img/logo.png')}}" class="w-52">
                  </div>
                  <h3 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">REGISTRAR NUCLEO DE RECREACIÓN COMUNITARIO</h3>
                  <form>
                      <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                        <div class="w-full rounded-lg bg-gray-500">
                          <div class="flex">
                            <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                            <input wire:model="NombreJefe" type="text" class="w-full pl-3 border border-solid rounded-r-lg font-bold text-neutral-900 outline-2 border-slate-900" />
                          </div>
                        </div>
                      </div>
                      <div class="grid grid-cols-3 gap-4 pt-4">
                          <div class="flex items-center justify-center"> {{-- campo estado --}}
                              <div class="w-full rounded-lg">
                                <div class="flex">
                                    <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Estado</span>
                                    <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model.live="estadoId" required>
                                        <option value="">Seleccione</option>
                                        @foreach( $estados as $estado )
                                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>

                          @if (!is_null($municipios)) {{-- campo municipio --}}
                              <div class="flex items-center justify-center">
                                  <div class="w-full rounded-lg bg-gray-500">
                                  <div class="flex">
                                      <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Municipio</span>
                                      <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model.live="municipioId" required>
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
                              <div class="flex items-center justify-center">
                                  <div class="w-full rounded-lg bg-gray-500">
                                  <div class="flex">
                                      <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                      <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model="parroquiaId" required>
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

                      <div class="card card-subcategories card-plain">
                        <div class="card-header">
                          <h2 class=" mt-2 text-2xl text-cyan-400 font-bold text-center">ESTRUCTURA</h2>
                        </div>
                        <div class="card-body">
                          <ul class="nav nav-pills-primary nav-pills-icons justify-content-center">
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuOrganizador" href="#">
                                <div class=" bg-gradient-danger rounded-t-lg py-3 px-1 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">groups</i><br>JEFE DE NUCLEO
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuOrganizador" href="#">
                                <div class=" bg-gradient-info rounded-t-lg py-3 px-1 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">groups</i><br>ORGANIZADOR
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuFormador" data-toggle="tab" href="#">
                                <div class=" bg-gradient-primary rounded-t-lg py-3 px-3 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">auto_stories</i><br>FORMADOR
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuMovilizacion" data-toggle="tab" href="#">
                                <div class=" bg-gradient-secondary rounded-t-lg py-3 px-1 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">record_voice_over</i><br>COMUNICADOR
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                                {{-- PESTANA ORGANIZADOR --}}
                                @if ($ContentJefe)
                                  <br><h4 class="text-info">DATOS DEL JEFE DEL NUCLEO</h4>
                                  <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                    <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeJefe" />
                                    <div class="peer flex h-8 flex-row-reverse items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                        <span>SI</span>
                                        <span>NO</span>
                                    </div><h5 class="p-2"> Posee Jefe?</h5>
                                  </label>

                                  @if ($FormJefe)
                                    <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                      <div class="flex items-center justify-center py-4">
                                          <div class="w-full rounded-lg bg-gray-500">
                                              <div class="flex">
                                                  <input wire:model="CedulaJefe" type="number" class=" px-3 py-[0.25rem] w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                  <input wire:click="consultar('jefe')" type="button" value="Buscar" class="bg-gradient-primary px-3 py-[0.25rem] rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                        <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                            <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                            <input wire:model="NombreJefe" type="text" class="w-full text-neutral-900 pl-3 text-base border rounded-r-lg font-bold outline-2 border-slate-200" />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                                @endif
                            {{-- PESTANA ORGANIZADOR --}}
                            @if ($ContentOrganizador)
                                <br><h4 class="text-info">DATOS DEL ORGANIZADOR DEL NUCLEO</h4>
                                <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                  <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeOrganizador" />
                                  <div class="peer flex h-8 flex-row-reverse items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                      <span>SI</span>
                                      <span>NO</span>
                                  </div><h5 class="p-2"> Posee Organizador?</h5>
                                </label>

                                @if ($FormOrganizador)
                                  <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                    <div class="flex items-center justify-center py-4">
                                        <div class="w-full rounded-lg bg-gray-500">
                                            <div class="flex">
                                                <input wire:model="CedulaOrganizador" type="number" placeholder="Cedula Organizador de la Brigada" class=" px-3 py-[0.25rem] w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                <input wire:click="consultar('organizador')" type="button" value="Buscar" class="bg-gradient-primary px-3 py-[0.25rem] rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                      <div class="w-full rounded-lg bg-gray-500">
                                        <div class="flex">
                                          <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                          <input wire:model="NombreOrganizador" type="text" class="w-full text-neutral-900 pl-3 text-base border rounded-r-lg font-bold outline-2 border-slate-200" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endif
                            @endif
                            {{-- PESTANA FORMADOR --}}
                            @if ($ContentFormador)
                              <br><h4 class="text-info">DATOS DEL FORMADOR DEL NUCLEO</h4>
                              <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeFormador" />
                                <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>SI</span>
                                    <span>NO</span>
                                </div><h5 class="p-2"> Posee Formador?</h5>
                              </label>

                              @if ($FormFormador)
                                <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                  <div class="flex items-center justify-center py-4">
                                      <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                              <input wire:model="CedulaFormador" type="number" placeholder="Cedula Formador del la Brigada" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                              <input wire:click="consultar('formador')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                    <div class="w-full rounded-lg bg-gray-500">
                                      <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold hover:bg-cyan-500 transition-colors">Nombre</span>
                                        <input wire:model="NombreFormador" type="text" class="w-full text-neutral-900 pl-3 text-base border rounded-r-lg font-bold outline-2 border-slate-200" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            @endif
                            {{-- PESTANA MOVILIZADOR --}}
                            @if ($ContentComunicador)
                              <br><h4 class="text-info">DATOS DEL COMUNICADOR DE LA BRIGADA</h4>
                              <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeComunicador" />
                                <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>SI</span>
                                    <span>NO</span>
                                </div><h5 class="p-2"> Posee Comunicador?</h5>
                              </label>

                              @if ($FormComunicador)
                                <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                  <div class="flex items-center justify-center py-4">
                                      <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                              <input wire:model="CedulaComunicador" type="number" class="w-full bg-white text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                              <input wire:click="consultar('comunicador')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                    <div class="w-full rounded-lg bg-gray-500">
                                      <div class="flex">
                                        <span class="bg-cyan-900  rounded-tl-lg rounded-bl-lg p-2 text-white font-bold">Nombre</span>
                                        <input wire:model="NombreComunicador" type="text" class="w-full text-neutral-900 pl-3 border rounded-r-lg font-bold outline-2 border-slate-900" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            @endif
                            <div class="px-4 py-3 sm:px-6 sm:flex">                                  
                              <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                  <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button>
                                </span>
                              <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                  <a href="{{route('nbc')}}" class="btn w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">SALIR</a>
                                </span>
                              </div>
                            </div>
                      </div>
                    </form>
              </div>
          </div>
        </div>
  </div>
</div>

@section('js')
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection