<x-dashboard name="slot">
    <div class="col-span-5 xl:col-span-4">
        <div class="overflow-x-auto border-gray-200">

            <table class="table-fixed w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Book name
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Report
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>

                </tr>
                </thead>
                <tbody class=" bg-white text-xs divide-y divide-gray-200">
                @forelse($reports as $report)
                    <tr class="hover:bg-blue-50">

                        <td class="px-1 py-1 ">
                            {{$report->book->title}}
                        </td>

                        <td class="px-1 py-1 ">
                            {{$report->report}}
                        </td>


                        <td class="px-1 py-1 text-sm text-gray-500">

                            <div class="flex justify-start space-x-1">
                                <a href="{{route("reports.show", $report->id)}}" class="border-2 border-indigo-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                                        b      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </div>

                        </td>
                    </tr>

                @empty

                @endforelse


                <!-- More items... -->
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>
