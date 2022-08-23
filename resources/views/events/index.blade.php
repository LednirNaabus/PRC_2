<x-app-layout>
    <x-slot name="header">
    </x-slot>
  
    <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
      
      @if (Auth::user()->user_type<>"5")
      
        <div class="px-4 pt-8">
  
          <div class="block mb-4">
              <a href="{{ route('events.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Status</a>
          </div>
        @else  
        <div class="px-4 pt-8">
  
        @endif

          
        <div class="flex flex-col hidden md:block">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Client Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Requirements
                      </th>
                      <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @if (Auth::user()->user_type<>"15") 
                        Starting Date
                        @else
                          Due Date
                        @endif
                      </th>
                      <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        @if (Auth::user()->user_type<>"15") 
                          Due Date1
                        @else
                          End Date1
                        @endif
                      </th>
                      
                    </tr>
                  </thead>
                  
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($events as $event)  
                      <tr>
                        <td class="px-6 py-3">
                          {{ $event->user->client_name }}    
                        </td>  
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $event->title }}    
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ date('m/d/Y', strtotime($event->start)) }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ date('m/d/Y', strtotime($event->end)) }}
                        </td>
                        
                      </tr>
                    @endforeach  
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {!! $events->links('vendor.pagination.tailwind') !!}
                </div>
  
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile -->
        <div class="flex flex-col md:hidden mt-3">
          <table>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($events as $event)
              <tr>
                <div class="mt-3 space-y-3 rounded-lg bg-white p-4 shadow">
                  <div class="flex items-center space-x-2 text-sm">
                    <div class="font-bold uppercase text-blue-300">Client Name:</div>
                    <div class="text-gray-900">{{ $event->user->client_name }}</div>
                  </div>
                  <div class="block items-center text-sm">
                    <div class="font-bold uppercase text-blue-500">Requirements:</div>
                    <div class="text-gray-900">{{ $event->title }}</div>
                  </div>
                  <div class="flex items-center space-x-2 text-sm">
                    <div class="font-bold uppercase text-teal-600">Starting Date:</div>
                    <div class="text-gray-900">{{ date('m/d/Y', strtotime($event->start)) }}</div>
                  </div>
                  <div class="flex items-center space-x-2 text-sm">
                    <div class="font-bold uppercase text-teal-900">Due Date:</div>
                    <div class="text-gray-900">{{ date('m/d/Y', strtotime($event->end)) }}</div>
                  </div>
                </div>
              </tr> 
              @endforeach     
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {!! $events->links('vendor.pagination.tailwind') !!}
          </div>
        </div>
      </div>
    
    </div>
  </div>
  </x-app-layout>
  