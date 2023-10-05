<div>
    <svg wire:click='openModalR' class=" ml-2 h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    </svg>
    <x-dialog-modal wire:model='modalReview' maxWidth='xl'>
        <x-slot name="title">

        </x-slot>
        <x-slot name="content">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex flex-col ml-3">
                        <div class="font-medium leading-none">Original attributes</div>
                        @if ($change->table_name=='product')
                        <p class="text-sm text-gray-600 leading-none mt-5"> Title: {{$original->title}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Provider: {{$original->provider->name}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Store: {{$original->store->name}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Description: {{$original->description}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> SKU: {{$original->sku}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Group: {{$original->group->name}}
                        </p>
                        @endif

                    </div>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex flex-col ml-3 ">
                        <div class="font-medium leading-none">Edited attributes</div>
                        @if ($change->table_name=='product')
                        <p class="text-sm text-gray-600 leading-none mt-5"> Title: {{$ChangedAtt->title}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Provider: {{ App\Models\provider::where('id',$ChangedAtt->provider_id )->first()->name }}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Store: {{App\Models\provider_store::where('id',$ChangedAtt->store_id )->first()->name}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Description: {{$ChangedAtt->description}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> SKU: {{$ChangedAtt->sku}}
                        </p>
                        <p class="text-sm text-gray-600 leading-none mt-5"> Group: {{App\Models\product_group::where('id',$ChangedAtt->group_id )->first()->name}}
                        </p>
                        @endif
                    </div>
                </div>

            </div>
            <div class="flex items-center justify-between p-4">
                

            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-start w-full">
                <button wire:click="save()"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Accept
                    changes</button>
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-red-500 transition duration-150 text-white ease-in-out hover:border-red-700 hover:bg-red-300 border rounded px-8 py-2 text-sm"
                    wire:click="Reject()">Reject</button>
                    <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-200 transition duration-150 text-gray-700 ease-in-out hover:border-red-700 hover:bg-red-300 border rounded px-8 py-2 text-sm"
                    wire:click="cancelChanges()">Cancel</button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>