<div class="main-content mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                            <div>
                                <h5 class="mb-2 font-bold">REGISTRO DE NUCLEO DE RECREACIÓN COMUNITARIO</h5>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <input wire:model.live="search" type="text" placeholder="Filtrar por Nombre" class="w-30 px-4 py-2 border border-solid rounded-lg outline-2 font-bold">
                                <button wire:click="crear()" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; NUEVO NBC</button>
                            </div>
                        </div>
                        @if(session()->has('success')== 'success')
                            @include('livewire.components.success')
                        @endif
                        @if(session()->has('editado')== 'editado')
                            @include('livewire.components.editado')
                        @endif
                        @if(session()->has('mensaje')== 'delete')
                            @include('livewire.components.delete')
                        @endif
                        @if($modal)
                            @include('livewire.n-b-c.crear')   
                        @endif  

                        @if ($nrcs->count())
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-dark font-weight-bolder">#</th>
                                                <th class="text-center text-uppercase text-dark font-weight-bolder">Codigo</th>
                                                <th class="text-center text-uppercase text-dark font-weight-bolder">nombre</th>
                                                <th class="text-center text-uppercase text-dark font-weight-bolder">estado</th>
                                                <th class="text-center text-uppercase text-dark font-weight-bolder">municipio</th>
                                                <th class="text-center text-uppercase text-dark font-weight-bolder">acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $indice =0; ?>
                                            @foreach ($nrcs as $nrc)
                                            <?php $indice += 1; ?>
                                            <tr><td class="ps-4"><p class=" font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                                <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{$nrc->codigo}}</p></td>
                                                <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nrc->nombre) ? $nrc->nombre : ''}}</p></td>
                                                <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nrc->estado->nombre) ? $nrc->estado->nombre : ''}}</p></td>
                                                <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nrc->municipio->nombre) ? $nrc->municipio->nombre : ''}}</p></td>
                                                <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar nrc">
                                                    <a href="{{route('nrc.editar', [$nrc->id])}}" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a>
                                                    <a wire:click="borrar('{{$nrc->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{$nrcs->links()}}
                            </div>
                        @else
                            <div class="card-dody px-4 pt-2 py-8 pb-2">
                                <strong class="px-4 mt-8 font-bold">No existen Resultados</strong>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>

