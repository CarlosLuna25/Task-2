<div>
    <svg class="h-5 w-5 text-current cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        wire:click="OpenModal()">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
    </svg>

    <x-edit-modal class="h-auto" wire:model='modalEdit'>
     
        <x-slot name="content">


            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded ">
                <div class="w-full flex justify-start text-gray-600 mb-3">
                    
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4"> Edit {{$productAux->title}}
                </h1>
                <label for="Product Title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Product
                    Title</label>
                <input id="title" wire:model='productAux.title'
                    class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                    placeholder="James" />
                <label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">sku</label>
                <div class="relative mb-5 mt-2">
                    <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>

                    </div>
                    <input id="sku" wire:model='productAux.sku'
                        class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border"
                        placeholder="SKU" />
                </div>
         
                <label for="provider"
                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Provider</label>
                <div class="relative mb-5 mt-2">
                   
                    <select wire:model="productAux.provider_id"
                        class="  w-full border text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal border-gray-300 rounded-md p-2 mb-4  transition ease-in-out duration-150"
                        id="product">
                        @foreach ( App\Models\provider::all() as $item)
                        <option value="{{$item->id}}" @if ($product->provider_id==$item->id ) {{'selected'}}  @endif   >{{ $item->name }}</option>
                        
                        @endforeach
                    </select>

                </div>
                <label for="provider"
                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Store</label>
                <div class="relative mb-5 mt-2">
                   
                    <select wire:model="productAux.store_id"
                        class=" w-full border text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal border-gray-300 rounded-md p-2 mb-4  transition ease-in-out duration-150"
                        id="product">
                        @foreach ( App\Models\provider_store::all() as $item)
                        <option value="{{$item->id}}" @if ($product->store_id==$item->id ) {{'selected'}}  @endif   >{{ $item->name }}</option>
                        
                        @endforeach
                    </select>

                </div>
                <label for="provider"
                    class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Group</label>
                <div class="relative mb-5 mt-2">
                   
                    <select wire:model="productAux.group_id"
                        class="  w-full border text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal border-gray-300 rounded-md p-2 mb-4  transition ease-in-out duration-150"
                        id="product">
                        @foreach ( App\Models\product_group::all() as $item)
                        <option value="{{$item->id}}" @if ($product->group_id==$item->id ) {{'selected'}}  @endif   >{{ $item->name }}</option>
                        
                        @endforeach
                    
                    </select>

                </div>
                <label for="cvc" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Description</label>
                <div class="relative mb-5 mt-2">
                    
                    <textarea wire:model='productAux.description' id="description"
                        class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-20 flex items-center pl-3 text-sm border-gray-300 rounded border"
                        placeholder="MM/YY" ></textarea>
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