<div class="main-content mt-5">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        @if(session()->has('yaregistrado')== 'yaregistrado')
          @include('livewire.components.yaregistrado')
        @endif
        <div>    
          <div class="min-h-screen flex items-center justify-center">
              <div class="p-4 w-full bg-white rounded-lg">
                  <h3 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">REGISTRAR ESTRUCTURA</h3>
                  <form>
                      <div class=" flex items-stretch pt-4"> {{-- campo Nombre del NBC --}}
                          <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-900 px-3 py-[0.25rem] text-center">NIVEL DE JERARQUIA</span>
                          <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model.live="nivelId" required>
                            <option value="">Seleccione</option>
                            @foreach( $niveles as $nivel )
                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                          </select>
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
                      <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                          <div class="flex items-center justify-center py-4">
                              <div class="w-full rounded-lg">
                                  <div class="flex">
                                      <input wire:model="CedulaJefe" type="number" placeholder="Cedula" class="w-full px-3 py-[0.25rem] border text-neutral-900 font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                      <input wire:click="consultar('jefe')" type="button" value="Buscar" class="bg-gradient-primary rounded-tr-lg px-2 rounded-br-lg text-white font-bold transition-colors">
                                  </div>
                              </div>
                          </div>
                          <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                              <div class="w-full rounded-lg bg-gray-500">
                                <div class="flex">
                                  <span class="bg-cyan-900 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                  <input wire:model="NombreJefe" type="text" class="w-full pl-3 border border-solid rounded-r-lg font-bold text-neutral-900 outline-2 border-slate-900" />
                                </div>
                              </div>
                          </div>
                      </div>

                      <div class="card card-subcategories card-plain">
                        <div class="card-header">
                          <h2 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">ESTRUCTURA</h2>
                        </div>
                        <div class="card-body">
                          <ul class="nav nav-pills-primary nav-pills-icons justify-content-center">
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
                                    <i class="material-icons">directions_run</i><br>COMUNICADOR
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuDefensa" data-toggle="tab" href="#">
                                <div class=" bg-gradient-success rounded-t-lg py-3 px-4 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">military_tech</i><br>CONTROL Y SEGUIMIENTO  
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" wire:click="MenuProductivo" data-toggle="tab" href="#">
                                <div class=" bg-gradient-danger rounded-t-lg py-3 px-2 text-white">
                                  <div class="card-icon text-center">
                                    <i class="material-icons">grass</i><br>SECRETARIO GENERAL
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                            {{-- PESTANA ORGANIZADOR --}}
                            @if ($ContentOrganizador)
                                <br><h4 class="text-info">DATOS DEL ORGANIZADOR DE LA BRIGADA</h4>
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
                              <br><h4 class="text-info">DATOS DEL FORMADOR DE LA BRIGADA</h4>
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
                            @if ($ContentMovilizador)
                              <br><h4 class="text-info">DATOS DEL MOVILIZADOR DE LA BRIGADA</h4>
                              <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeMovilizador" />
                                <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>SI</span>
                                    <span>NO</span>
                                </div><h5 class="p-2"> Posee Comunicador?</h5>
                              </label>

                              @if ($FormMovilizador)
                                <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                  <div class="flex items-center justify-center py-4">
                                      <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                              <input wire:model="CedulaMovilizador" type="number" placeholder="Cedula Movilizador de la Brigada" class="w-full bg-white text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                              <input wire:click="consultar('movilizador')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                    <div class="w-full rounded-lg bg-gray-500">
                                      <div class="flex">
                                        <span class="bg-cyan-900  rounded-tl-lg rounded-bl-lg p-2 text-white font-bold">Nombre</span>
                                        <input wire:model="NombreMovilizador" type="text" class="w-full text-neutral-900 pl-3 border rounded-r-lg font-bold outline-2 border-slate-900" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            @endif
                            {{-- PESTANA DEFENSA --}}
                            @if ($ContentDefensa)
                              <br><h4 class="text-info">DATOS DE EL DE DEFENSA DE LA BRIGADA</h4>
                              <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeDefensa" />
                                <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>SI</span>
                                    <span>NO</span>
                                </div><h5 class="p-2"> ¿Posee el de Control y Seguimiento?</h5>
                              </label>

                              @if ($FormDefensa)
                                <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                  <div class="flex items-center justify-center py-4">
                                      <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                              <input wire:model="CedulaDefensa" type="number" placeholder="Cedula Defensa del la Brigada" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                              <input wire:click="consultar('defensa')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                    <div class="w-full rounded-lg bg-gray-500">
                                      <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                        <input wire:model="NombreDefensa" type="text" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            @endif
                            {{-- PESTANA PRODUCTIVO --}}
                            @if ($ContentProductivo)
                              <br><h4 class="text-info">DATOS DEL PRODUCTOR DE BRIGADA</h4>
                              <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeProductivo" />
                                <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>SI</span>
                                    <span>NO</span>
                                </div><h5 class="p-2"> ¿Posee Secretario General?</h5>
                              </label>

                              @if ($FormProductivo)
                                <div class="grid grid-cols-2 gap-4"> {{-- campo cedula --}}
                                  <div class="flex items-center justify-center py-4">
                                      <div class="w-full rounded-lg bg-gray-500">
                                          <div class="flex">
                                              <input wire:model="CedulaProductivo" type="number" placeholder="Cedula Productor de la Brigada" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                              <input wire:click="consultar('productor')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                    <div class="w-full rounded-lg bg-gray-500">
                                      <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                        <input wire:model="NombreProductivo" type="text" class="w-full pl-2 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
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
  </div>
</div>

<script>
  var marker;
  var coords = {};
  initMap = function () 
  {
    navigator.geolocation.getCurrentPosition(
      function (position){
        coords =  {
          lng: position.coords.longitude,
          lat: position.coords.latitude
        };
        setMapa(coords);
      },function(error){console.log(error);});
  }
  function setMapa (coords)
  {
    var map = new google.maps.Map(document.getElementById('map'),
    {
      zoom: 13,
      center:new google.maps.LatLng(coords.lat,coords.lng),
    });
    marker = new google.maps.Marker({
      map: map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      position: new google.maps.LatLng(coords.lat,coords.lng),

    });
    marker.addListener( 'dragend', function (event)
    {
      document.getElementById("latitud").value = this.getPosition().lat();
      document.getElementById("longitud").value = this.getPosition().lng();
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>

{{-- <script>

  var BING_KEY = 'AuhiCJHlGzhg93IqUH_oCpl_-ZUrIE6SPftlyGYUvr9Amx5nzA-WqGcPquyFZl4L'

  var map = L.map('map').setView([7.1195102, -67.0456545], 6)

  var bingLayer = L.tileLayer.bing(BING_KEY).addTo(map)
  
</script> --}}

@section('js')
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection