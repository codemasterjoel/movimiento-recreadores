<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold">REGISTRO DE 1x10</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <input wire:model.live="search" type="number" placeholder="Filtrar por Cedula" class=" font-bold text-slate-900 w-30 px-4 py-2 border border-solid border-slate-900 rounded-lg">
                        <button wire:click="crear()" class="btn bg-gradient-primary btn-sm mb-0 font-bold" type="button">+&nbsp; NUEVO REGISTRO</button>
                    </div>
                </div>

                @if(session()->has('success')== 'success')
                    @include('livewire.components.success')
                @endif
                @if(session()->has('message')== 'delete')
                    @include('livewire.components.delete')
                @endif

                @if($modal)
                    @include('livewire.registro1x10ffm.crear')
                @endif
                @if($integranteModal)
                    @include('livewire.registro1x10ffm.integrante')
                @endif  
                
                @if ($registro1x10->count())
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">#</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Cedula</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">nombre completo</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">estado</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">municipio</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">telefono</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice =0; ?>
                                    @foreach ($registro1x10 as $lsb)
                                    <?php $indice += 1; ?>
                                    <tr><td class="ps-4"><p class="text-xs font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                        <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0">{{ (isset($lsb->cedula) ? $lsb->cedula : "") }}</p></td>
                                        <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{ (isset($lsb->NombreCompleto) ? $lsb->NombreCompleto : "") }}</td>
                                        <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{ (isset($lsb->estado->nombre) ? $lsb->estado->nombre : "") }}</td>
                                        <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{ (isset($lsb->municipio->nombre) ? $lsb->municipio->nombre : "") }}</td>
                                        {{-- <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$lsb->parroquia->nombre}}</td> --}}
                                        <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{ (isset($lsb->telefono) ? $lsb->telefono : "") }}</td>
                                        {{-- <td class="text-center text-uppercase"><p class="text-xs font-weight-bold">{{$lsb->estatus ? 'activo' : 'inactivo'}}</p></td> --}}
                                        <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar lsb">
                                            {{-- <a wire:click="editar('')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a> --}}
                                            <a wire:click="integrante('{{$lsb->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">patient_list</span></a>
                                            {{-- <button wire:click="editar()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button> --}}
                                            {{-- <a wire:click="borrar('')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$registro1x10->links()}}
                    </div>
                @else   
                    <div class="card-dody px-4 pt-2 py-8 pb-2">
                        <strong class="px-4 mt-8">No existen Resultados</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>