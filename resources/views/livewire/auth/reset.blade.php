<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <h3 class="text-xl text-red-500 font-bold ">INGRESE EL CORREO PARA RECUPERAR LA CONTRASEÑA.</h3>
                    <div class="card card-plain">
                        <div class="card-body">
                            <form>
                                <div>
                                    <label class=" text-neutral-900 font-bold text-uppercase" for="email">{{ __('Correo') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model.live="email" id="email" type="email" class="form-control border border-solid text-neutral-900 border-neutral-900 outline-2 font-bold" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="text-center">
                                    <button wire:click.prevent="recoverPassword()" type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0 font-bold">{{ __('Recuperar Contraseña') }}</button>
                                </div>
                            </form>
                            @if ($showSuccesNotification)
                                <div wire:model.live="showSuccesNotification" class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text text-white uppercase">se ha enviado un correo para cambiar la contraseña</span>
                                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($showFailureNotification)
                                <div wire:model.live="showFailureNotification" class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text text-white uppercase">este correo no se encuentra registrado</span>
                                    <button wire:click="$set('showFailureNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><strong>X</strong></button>
                                </div>
                            @endif
                        </div>
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">

                                <a href="{{route('login')}}" class="btn w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">SALIR</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>