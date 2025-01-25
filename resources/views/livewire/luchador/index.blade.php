<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold">REGISTRO DE MOVIMIENTO DE RECREADORES</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <input wire:model.live="search" type="number" placeholder="Filtrar por Cedula" class="w-30 px-4 py-2 border border-solid rounded-lg outline-2 font-bold">
                        <button wire:click="crear()" class="btn bg-gradient-primary btn-sm mb-0 font-weight-bolder" type="button">+&nbsp; NUEVO REGISTRO</button>
                    </div>
                </div>
                @if($modal)
                    @include('livewire.luchador.crear')   
                @endif  
                
                @if ($recreadores->count())
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark font-weight-bolder">#</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">cedula</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">nombre</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">estado</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">municipio</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">estatus</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice =0; ?>
                                    @foreach ($recreadores as $recreador)
                                    <?php $indice += 1; ?>
                                    <tr class="w-[800]">
                                        <td class="ps-4"><p class="font-weight-bold text-dark mb-0"><?php echo $indice; ?></p></td>
                                        <td class="text-center text-uppercase"><p class="text-dark font-weight-bold mb-0">{{$recreador->letra}}{{$recreador->cedula}}</p></td>
                                        <td class="text-center text-uppercase"><p class="text-dark font-weight-bold mb-0">{{isset($recreador->nombre) ? $recreador->nombre : ''}} {{$recreador->apellido}}</p></td>
                                        <td class="text-center text-uppercase"><p class="text-dark font-weight-bold mb-0">{{$recreador->estado->nombre}}</p></td>
                                        <td class="text-center text-uppercase"><p class="text-dark font-weight-bold mb-0">{{isset($recreador->municipio->nombre) ? $recreador->municipio->nombre : ''}}</p></td>
                                        <td class="text-center text-uppercase"><p class=" font-weight-bold mb-0 {{$recreador->estatus ? 'text-cyan-100 bg-cyan-500' : 'text-red-100 bg-red-500'}} rounded-lg">{{$recreador->estatus ? 'activo' : 'inactivo'}}</p></td>
                                        {{-- <td class="text-center text-uppercase"><p class=" font-weight-bold">{{$recreador->estatus ? 'activo' : 'inactivo'}}</p></td> --}}
                                        <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Recreador">
                                            {{-- <a wire:click="ficharecreador('{{$recreador->id}}')" rel="tooltip" title="Generar Ficha" type="button" class="text-warning font-bold py-2 px-2"><i class="material-icons">contact_page</i></a> --}}
                                            {{-- <a wire:click="carnet('{{$recreador->id}}')" rel="tooltip" title="Generar Carnet" type="button" class="text-danger font-bold py-2 px-2"><i class="material-icons">contact_page</i></a> --}}
                                            <a wire:click="editar('{{$recreador->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a>
                                            <a wire:click="borrar('{{$recreador->id}}')" class="text-danger font-bold py-2 px-2"><span class="material-symbols-outlined">person_cancel</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$recreadores->links()}}
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