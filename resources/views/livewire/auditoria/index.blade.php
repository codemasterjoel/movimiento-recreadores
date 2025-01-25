<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold ">AUDITORIA DE SISTEMA</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <input wire:model.live="search" type="number" placeholder="Filtrar por Cedula" class="w-30 px-4 py-2 border border-solid text-neutral-900 border-neutral-900 font-bold outline-2 rounded-lg ">
                    </div>
                </div>
                @if(session()->has('message')== 'success')
                    @include('livewire.components.success')
                @endif
                @if(session()->has('message')== 'delete')
                    @include('livewire.components.delete')
                @endif
                
                @if ($auditorias->count())
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder text-dark">#</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder text-dark">Acción</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Módulo</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Id Registro</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Usuario</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder text-dark">Cambios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice =0; ?>
                                    @foreach ($auditorias as $auditoria)
                                    <?php $indice += 1; ?>
                                    <tr class="w-[800]">
                                        <td class="ps-4"><p class="font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                        <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{$auditoria->accion}}</p></td>
                                        <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{substr($auditoria->model_type, 11)}}</p></td>
                                        <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{$auditoria->model_id}}</p></td>
                                        <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">{{$auditoria->user->name}}</p></td>
                                        <td class="text-center text-uppercase"><p class="font-weight-bold mb-0">
                                            <?php $cambios = json_decode($auditoria->cambios); ?>
                                            @foreach ($cambios[0] as $key => $value)
                                                <?php echo "$key =>$value", PHP_EOL ?>;     
                                            @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                         {{$auditorias->links()}}
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