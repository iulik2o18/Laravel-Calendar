<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add New</a>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Start
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date End
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Client Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Employee ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $appointment->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $appointment->start_time }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appointment->finish_time }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appointment->client_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appointment->employee_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
