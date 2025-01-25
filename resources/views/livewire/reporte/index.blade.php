<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h3 class="text-2xl text-cyan-400 font-semibold text-center">REPORTES</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">
                        {{-- MENU DEL REPORTE --}}
                        <ul class="nav nav-pills-primary nav-pills-icons justify-content-center">
                            <li class="nav-item">
                            <a class="nav-link" wire:click="ReporteLuchador" href="#">
                                <div class=" bg-gradient-info rounded-t-lg py-3 px-3 text-white">
                                <div class="card-icon text-center">
                                    <i class="material-icons">groups</i><br>REPORTE DE LSB
                                </div>
                                </div>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" wire:click="ReporteFormacion" data-toggle="tab" href="#">
                                <div class=" bg-gradient-primary rounded-t-lg py-3 px-3 text-white">
                                <div class="card-icon text-center">
                                    <i class="material-icons">auto_stories</i><br>REPORTE FORMACION
                                </div>
                                </div>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" wire:click="ReporteNBC" data-toggle="tab" href="#">
                                <div class=" bg-gradient-secondary rounded-t-lg py-3 px-3 text-white">
                                <div class="card-icon text-center">
                                    <i class="material-icons">groups</i><br>REPORTE DE NBC
                                </div>
                                </div>
                            </a>
                            </li>
                        </ul>
                        
                        {{-- FILTRO DEL REPORTE LSB --}}
                        @if ($ContentLuchador)
                            <div class="col-md-12 px-4 pt-4">
                                <form action="/reportelsb" method="GET">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                            <div class="flex">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Estado</span>
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
                                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Municipio</span>
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
                                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Parroquia</span>
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
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nivel Academico --}}
                                            <span class="flex bg-cyan-300 font-semibold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nivel Académico</span>
                                            <select wire:model="nivelAcademicoId" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary">
                                                <option value="">Seleccione</option>
                                                @foreach( $nivelesAcademicos as $nivelacademico )
                                                    <option value="{{ $nivelacademico->id }}">{{ $nivelacademico->nombre }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" /> --}}
                                        </div>

                                        <div class="flex items-center justify-center pb-4"> {{-- campo Responsabilidad --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                            <div class="flex">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Responsabilidad</span>
                                                <select class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" wire:model="responsabilidadId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $responsabilidades as $responsabilidad )
                                                        <option value="{{ $responsabilidad->id }}">{{ $responsabilidad->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4"> 
                                        <div class="flex items-center justify-center pb-4"> {{-- campo Avanzada --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Avanzada</span>
                                                    <select class="w-full px-4 py-2 rounded-r-lg focus:outline-none border focus:ring-2 focus:ring-cyan-500" wire:model="avanzadaId" required>
                                                        <option value="">Seleccione</option>
                                                        @foreach( $avanzadas as $avanzada )
                                                            <option value="{{ $avanzada->id }}">{{ $avanzada->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center pb-4"> {{-- campo genero --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Genero</span>
                                                    <select wire:model="generoId" class="w-full px-4 py-2 border rounded-r-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                                        <option value="">Seleccione</option>
                                                        @foreach ($generos as $genero)
                                                            <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <input wire:model="generoId" type="text" class="w-full bg-white pl-2 text-base rounded-r-lg font-semibold outline-0 border-slate-200" />
                                                    <input wire:model="generoIdHidden" type="hidden" class="w-full bg-white pl-2 text-base rounded-r-lg font-semibold outline-0 border-slate-200" /> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <table>
                                            <tr>
                                                <td>                      
                                                    <ol class="switches">
                                                        <li>
                                                        <input type="hidden" name="estatus" value="0">
                                                        <input type="checkbox" id="estatus" name="estatus" value="1" checked>
                                                        <label for="estatus">
                                                            <span>¿EL LSB SE ENCUENTRA ACTIVO?</span>
                                                            <span></span>
                                                        </label>
                                                        </li>
                                                    </ol>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 pt-2">
                                            <button type="submit" class="bg-gradient-to-r btn from-cyan-400 to-cyan-600 text-white" wire:click.prevent="guardar()">GENERAR REPORTE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

                        {{-- FILTRO DEL REPORTE NBC --}}
                        @if ($ContentFormacion)
                            <div class="col-md-12">
                                <div class="collapse" id="filtrocollapseNBC">
                                <div class="card card-chart">
                                    <div class="card-body">
                                    <form class="form" action="/reportenbc" method="GET">
                                        <div class="rows">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label>ESTADO:</label>
                                            <select class="form-control" name="estadonbc" id="estadonbc">
                                                <option value="">Seleccione</option>
                                                @foreach( $estados as $key => $value )
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label>MUNICIPIO:</label>
                                            <select class="form-control" name="municipionbc" id="municipionbc">
                                                <option value="">Seleccione</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>PARROQUIA:</label>
                                                <select class="form-control" name="parroquianbc" id="parroquianbc">
                                                <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="rows">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <label>POSEE ORGANIZAR</label>
                                            <select class="form-control" name="organizador" id="organizador">
                                                <option value="">Seleccione</option>
                                                <option value="NO">NO</option>
                                                <option value="SI">SI</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <label>POSEE FORMADOR</label>
                                            <select class="form-control" name="organizador" id="organizador">
                                                <option value="">Seleccione</option>
                                                <option value="NO">NO</option>
                                                <option value="SI">SI</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <label>POSEE MOVILIZADOR</label>
                                            <select class="form-control" name="organizador" id="organizador">
                                                <option value="">Seleccione</option>
                                                <option value="NO">NO</option>
                                                <option value="SI">SI</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <label>POSEE DEFENSA</label>
                                            <select class="form-control" name="organizador" id="organizador">
                                                <option value="">Seleccione</option>
                                                <option value="NO">NO</option>
                                                <option value="SI">SI</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <label>POSEE PRODUCTIVO</label>
                                            <select class="form-control" name="organizador" id="organizador">
                                                <option value="">Seleccione</option>
                                                <option value="NO">NO</option>
                                                <option value="SI">SI</option>
                                            </select>
                                            </div>
                                        </div>
                                        </div><br>
                                        <div class="rows">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-outline-success">GENERAR REPORTE</button>
                                            </div>
                                        </div><br>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif

                        {{-- FILTRO DEL REPORTE SOCIAL --}}
                        @if ($ContentNBC)
                            <div class="col-md-12">
                                <div class="collapse" id="filtrocollapseSOCIAL">
                                    <div class="card card-chart">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                        <h4 class="card-title"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>