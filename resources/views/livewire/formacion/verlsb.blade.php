<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-bold text-center">DATOS DEL PERSONAL</h3>
                    <form>
                        <div class="grid grid-cols-2 gap-4">
                            {{-- <div class="flex items-center justify-center">
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <input wire:model="cedula" type="number" class="w-full bg-white pl-2 text-base border font-bold outline-0 rounded border-slate-900" disabled>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="flex items-center justify-center pb-4 py-4"> {{-- campo cedula --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                  <div class="flex">
                                    <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Cedula</span>
                                        <input wire:model="cedula" type="text" class="w-full bg-white pl-2 text-base border text-neutral-900 rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                  </div>
                                </div>
                            </div>
                            <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                <input type="checkbox" value="1" class="peer sr-only" wire:model.live="estatus" />
                                <div class=" peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-16 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                    <span>Activo</span>
                                    <span>Inactivo</span>
                                </div>
                            </label>
                        </div>                        
                        <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nombre y Apellido --}}
                            <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nombre y Apellido</span>
                            <input wire:model="nombreCompleto" type="text" class="rounded-0 relative m-0 block w-[1px] min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-bold leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" disabled/>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Fecha de Nacimiento --}}
                                <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Fecha de Nacimiento</span>
                                <input wire:model="fechaNacimiento" type="date" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-bold leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" disabled/>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo genero --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Genero</span>
                                        <input wire:model="genero" type="text" class="rounded-0 relative m-0 block w-[1px] min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-bold leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Telefono</span>
                                        <input wire:model="telefono" type="text" class="w-full bg-white text-neutral-900 pl-2 text-base border rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo Avanzada --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                  <div class="flex">
                                    <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Avanzada</span>
                                        <input wire:model="avanzada" type="text" class="w-full bg-white pl-2 text-base border text-neutral-900 rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Estado</span>
                                        <input wire:model="estado" type="text" class="w-full bg-white pl-2 text-base text-neutral-900 border rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo municipio --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Municipio</span>
                                        <input wire:model="municipio" type="text" class="w-full bg-white pl-2 text-neutral-900 text-base border rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo parroquia --}}
                                <div class="w-full rounded-lg bg-gray-500">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Parroquia</span>
                                        <input wire:model="parroquia" type="text" class="w-full bg-white pl-2 text-neutral-900 text-base border rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex flex-wrap items-stretch pb-4"> {{-- campo Nivel Academico --}}
                                <span class="flex bg-cyan-900 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nivel Academico</span>
                                <input wire:model="nivelAcademico" type="text" aria-label="Last name" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-bold leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" disabled/>
                            </div>
                            <div class="flex items-center justify-center pb-4"> {{-- campo Responsabilidad --}}
                                <div class="w-full rounded-lg">
                                    <div class="flex">
                                        <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Responsabilidad</span>
                                        <input wire:model="responsabilidad" type="text" class="rounded-0 relative m-0 block w-[1px] min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-bold leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pb-4"> {{-- campo Correo --}}
                            <div class="w-full rounded-lg bg-gray-500">
                              <div class="flex">
                                <span class="bg-cyan-900 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold ">Correo</span>
                                <input wire:model="correo" type="email" class="w-full bg-white pl-2 text-neutral-900 text-base border rounded-r-lg font-bold outline-0 border-slate-200" disabled/>
                              </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 sm:px-6 sm:flex">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModalLuchador()">SALIR</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>