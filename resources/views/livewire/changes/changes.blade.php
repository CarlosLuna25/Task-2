<div>


    <div class="antialiased bg-gray-100 text-gray-600 h-screen px-4 py-5">
        <div class="flex flex-col justify-center ">
            <!-- Table -->

            <div class=" w-full px-4   mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Pending changes</h2>
                </header>
                <div class="p-3">

                    <table class=" w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left"> Edited table</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left">Editor</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-left">Status</div>
                                </th>
                                <th class="p-2 whitespace-wrap">
                                    <div class="font-semibold text-center">Actions</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-200">
                            @foreach ($changes as $change)

                            <tr class="mt-1 border-bottom-1">
                                <td class="p-2 whitespace-wrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{$change->table_name}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-wrap">
                                    <div class="text-left">{{$change->user->name}}</div>
                                </td>

                                <td class="p-2 whitespace-wrap">

                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 {{$change->status  == 'pending' ? 'bg-yellow-300' :'bg-orange-300'  }} opacity-50 rounded-full"></span>
                                        <span class="relative">{{$change->status == 'pending' ? 'pending' : 'in
                                            review'}}
                                        </span>
                                    </span>



                                </td>
                                <td>
                                    <div class="flex text-blue-900">
                                        <!-- view change button -->

                                        @livewire('view-changes', ['change'=>$change], key($change->id))



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