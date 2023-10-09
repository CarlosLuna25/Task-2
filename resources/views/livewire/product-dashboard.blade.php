<div class="">


    <div class="antialiased bg-gray-100 text-gray-600 overflow-y-auto px-4 py-5">
        <div class="flex  ">
            <!-- Table -->

            <div class="px-4 mx-auto table-fix bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Products</h2>
                </header>
                <div class="p-3">
                    <div class="px-6 py-4 flex min-w-full ">

                       
                        <!-- Buscador con Icono -->
                        <div class="flex items-center w-full mt-2 p-4">
                            <div class="relative w-full">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-search text-gray-200"></i>
                                </span>
                                <input type="text" wire:model.live="search"
                                    class="pl-10 pr-4 py-2 rounded-full border border-gray-300 w-full text-sm placeholder-gray-400"
                                    placeholder="Search..." />
                            </div>
                        </div>



                    </div>
                    <table class=" w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Description</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Provider</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Store</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Price</div>

                                </th>
                                @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Is available</div>
                                </th>
                                @endif

                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Actions</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-200">
                            @foreach ($products as $product)

                            <tr class="mt-1 border-bottom-1">
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{$product->title}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$product->description}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-grey-500">{{$product->provider->name}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class=" text-center font-medium text-grey-500">{{$product->store->name}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                              
                                    <div class="text-left font-medium text-green-500">${{$product->prices[0]->price}}
                                    </div>
                                </td>
                                @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                <td class="p-2 whitespace-nowrap">

                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 {{$product->edit == NULL || $product->edit == 'Available' ? 'bg-green-200' : ($product->edit == 'Edited'? 'bg-orange-300' : 'bg-yellow-200' )  }} opacity-50 rounded-full"></span>
                                        <span class="relative">{{$product->edit == NULL || $product->edit == 'Available'
                                            ? 'Available' : $product->edit}}
                                        </span>
                                    </span>



                                </td>
                                @endif
                                <td>
                                    <div class="flex text-blue-900">
                                        <!-- edit button -->
                                        @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                        @livewire('edit-product',['product'=>$product], key($product->id))
                                        @endif

                                       



                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>