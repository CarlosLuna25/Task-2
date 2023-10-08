<div>
    <svg class="h-5 w-5 text-current cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        wire:click="OpenModal()"> >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
    </svg>
    <x-edit-modal class="h-auto" wire:model='modalProduct'>
        <x-slot name="content">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded ">
                <div class="w-full flex justify-start text-gray-600 mb-3">

                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4"> Edit Stock of
                    {{$product->product->title}} ({{$product->product->sku}})
                </h1>
                <label for="Product Title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Product
                    price
                </label>
                <div class="relative mb-5 mt-2">
                    <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                      
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          

                    </div>
                    <input type="number" id="title" wire:model='productAux.price'
                    class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                        placeholder="0" />
                </div>


                <div class="flex items-center justify-start w-full">
                    <button wire:click="save()"
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    <button
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                        wire:click="closeCancel">Cancel</button>
                </div>
                <button
                    class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                    wire:click="closeCancel()" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </x-slot>
    </x-edit-modal>
</div>