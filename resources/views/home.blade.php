<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ url('posts') }}">
                        @csrf

                        <!-- Set Time -->
                        <div>
                            <label for="datetime-local"
                                class="block font-medium text-sm text-gray-700 dark:text-gray-300">Start date</label>
                            <input type="datetime-local" id="datetime-local"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                name="start_time" min="{{ date('Y-m-d H:i') }}" required="required"
                                autofocus="autofocus">
                        </div>
                        <div class="mt-4">
                            <label for="client_name"
                                class="block font-medium text-sm text-gray-700 dark:text-gray-300">Client
                                Name</label>
                            <input type="text" id="client_name"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                name="client_name" required="required" autofocus="autofocus">
                        </div>

                        <div class="mt-4">
                            <x-input-label for="text" :value="__('Comments')" />
                            <x-text-input id="comments" class="block mt-1 w-full" type="text" name="comments"
                                :value="old('text')" required autofocus />
                            <x-input-error :messages="$errors->get('text')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <label for="employees"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                Employee</label>
                            <select id="employees" name="employee_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="calander"></div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log(@json($events));
                var calendarEl = document.getElementById('calander');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    themeSystem: 'bootstrap5',
                    allDaySlot: false,
                    initialView: 'dayGridMonth',
                    slotMinTime: '9:00:00',
                    slotMaxTime: '22:00:00',
                    slotDuration: '00:60:01',
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endpush


</x-app-layout>
