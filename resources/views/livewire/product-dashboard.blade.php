<div>


    <div class="antialiased bg-gray-100 text-gray-600 h-screen px-4 py-5">
        <div class="flex flex-col justify-center ">
            <!-- Table -->

            <div class=" w-full px-4   mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Products</h2>
                </header>
                <div class="p-3">
                    <div class="px-6 py-4 flex min-w-full ">

                        <input class="min-w-10 border-gray-200 rounded" placeholder="Search" wire:model.live="search"
                            type="text">
                        @if ( Auth::user()->role == 'Teamleader' )
                        <a class=" ml-3 rounded-lg  relative w-36 h-10 cursor-pointer flex items-center border border-green-500 bg-green-500 group hover:bg-green-500 active:bg-green-500 active:border-green-500"
                            href="sss">
                            <span
                                class="text-white font-semibold ml-8 transform group-hover:translate-x-20 transition-all duration-300">Add
                                Item</span>
                            <span
                                class="absolute right-0 h-full w-10 rounded-lg bg-green-500 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                                <svg class="svg w-8 text-white" fill="none" height="24" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    width="24" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="12" x2="12" y1="5" y2="19"></line>
                                    <line x1="5" x2="19" y1="12" y2="12"></line>
                                </svg>
                            </span>
                        </a>
                        @endif


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
                                <td class="p-2 whitespace-nowrap">
                                    @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 {{$product->edit == NULL || $product->edit == 'Available' ? 'bg-green-200' : ($product->edit == 'Edited'? 'bg-orange-300' : 'bg-yellow-200' )  }} opacity-50 rounded-full"></span>
                                        <span class="relative">{{$product->edit == NULL || $product->edit == 'Available'  ? 'Available' : $product->edit}}
                                        </span>
                                    </span>

                                    @endif

                                </td>
                                <td>
                                    <div class="flex text-blue-900">
                                        <!-- edit button -->
                                        @livewire('edit-product',['product'=>$product], key($product->id))
                                        <svg class=" ml-2 h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>



                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div>

                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>