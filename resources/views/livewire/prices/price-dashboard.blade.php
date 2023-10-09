<div>

    <div class="antialiased bg-gray-100 text-gray-600 h-screen px-4 py-5">
        <div class="flex flex-col justify-center ">
            <!-- Table -->

            <div class="px-4 w-3/4  mx-auto table-fix bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Product prices</h2>
                </header>
                <div class="p-3">

                    <table class=" w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left"> Product</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left"> Store</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left">Price</div>
                                </th>
                             
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-center">Status</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-center">Actions</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-200">
                            @foreach ($products as $product)
                            <tr class="mt-1 border-bottom-1">
                                <td class="p-2 whitespace-wrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">
                                            {{ $product->product->title }}
                                        </div>
                                    </div>
                                </td>
                       
                                <td class="p-2 whitespace-wrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">
                                            {{ $product->store->name }}
                                        </div>
                                    </div>
                                </td>
                              
                                <td class="p-2 whitespace-wrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">
                                           ${{ $product->price }}
                                        </div>
                                    </div>
                                </td>
                                @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                    <td class="p-2 whitespace-nowrap text-center">
                                    
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 {{$product->edit == NULL || $product->edit == 'Available' ? 'bg-green-200' : ($product->edit == 'Edited'? 'bg-orange-300' : 'bg-yellow-200' )  }} opacity-50 rounded-full"></span>
                                            <span class="relative">{{$product->edit == NULL || $product->edit == 'Available'  ? 'Available' : $product->edit}}
                                            </span>
                                        </span>

                                    

                                    </td>
                                 @endif
                                 <td>
                                    <div class="flex text-blue-900">
                                        <!-- edit button -->
                                        @if (Auth::user()->role == 'Teamleader' || Auth::user()->role == 'Editor' )
                                             @livewire('prices.price-edit',['product'=>$product], key($product->id))
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