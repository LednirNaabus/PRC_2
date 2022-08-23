<script src="https://unpkg.com/flowbite@1.3.4/dist/datepicker.js"></script>

<x-app-layout>
  <x-slot name="header">
  </x-slot>

  <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">

    <div class="grid grid-cols-12 bg-white ">

      <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
        <a href="{{ route('users.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="Users">User</a>

        @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2")
        <a href="{{ route('users.registration') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="Registration for Approval">Registration for Approval</a>
        @endif

      </div>

      <div class="col-span-12 h-full md:col-span-10">
        <div class="px-4 pt-8">

          <form action="{{ route('users.registration') }}" method="GET">
            <div class="search">
              <div class="grid md:grid-cols-2 sm:grid-cols-12 text-sm leading-6">
                <div class="bg-white p-2">
                  <select name="account_type" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
                    <option value="">Select Account Type</option>
                    <option value="1">School</option>
                    <option value="2">Hospital</option>
                  </select>
                </div>

                <div class="bg-white p-2">
                  <input type="text" name="name" id="name" placeholder="Enter Name" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
                </div>
              </div>

              <div date-rangepicker class="grid md:grid-cols-2 sm:grid-cols-12 text-sm leading-6">
                <div class="bg-white p-2">
                  <input name="date_registered_start" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select start date registered" value="" readonly>
                </div>
                <div class="bg-white p-2">
                  <input name="date_registered_end" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select end date registered" value="" readonly>
                </div>
              </div>

              <div class="grid md:grid-cols-1 sm:grid-cols-12 text-sm leading-6">
                <div class="bg-white">
                  <button type="submit" class="block w-full text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('Continue?');">Search
                  </button>
                </div>
              </div>
            </div>
          </form>

          <div class="flex flex-col hidden md:block">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name/ Client Name
                        </th>
                        <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Account Type
                        </th>
                        <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Date Registered
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Action</span>
                        </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($users as $user)
                      <tr>
                        <td class="px-6 py-3 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              @if ($user->profile_photo_path==null)
                              <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ substr($user->first_name,0,1) }}+{{ substr($user->last_name,0,1) }}&amp;color=7F9CF5&amp;background=EBF4FF">
                              @else
                              <img class="h-10 w-10 rounded-full" src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="">
                              @endif
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{ $user->client_name }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          @if ($user->account_type=='1')
                          Hospital
                          @elseif ($user->account_type=='2')
                          School
                          @else
                          Admin
                          @endif
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          {{ date('m/d/Y h:i A', strtotime($user->created_at)) }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                          <a href="{{ route('editApprove', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Approve User</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-center">
                    {!! $users->links('vendor.pagination.tailwind') !!}
                  </div>

                </div>
              </div>
            </div>
          </div>


          <div class="flex flex-col md:hidden mt-3">
            <table>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr>
                  <div class="mt-3 space-y-3 rounded-lg bg-white p-4 shadow">
                    <div class="flex items-center space-x-2 text-sm">
                      @if ($user->profile_photo_path==null)
                      <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ substr($user->first_name,0,1) }}+{{ substr($user->last_name,0,1) }}&amp;color=7F9CF5&amp;background=EBF4FF">
                      @else
                      <img class="h-10 w-10 rounded-full" src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="">
                      @endif
                      <div class="block">
                        <div class="font-bold uppercase text-blue-300">NAME/</div>
                        <div class="font-bold uppercase text-blue-300">CLIENT NAME:</div>
                      </div>
                      <div class="block">
                        <div class="text-sm font-medium text-gray-900"> {{ $user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $user->client_name }}</div>
                      </div>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                      <div class="font-bold uppercase text-blue-500">Account Type:</div>
                      <div class="text-gray-900">@if ($user->account_type=='1')
                        Hospital
                        @elseif ($user->account_type=='2')
                        School
                        @else
                        Admin
                        @endif</div>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                      <div class="font-bold uppercase text-teal-600">Date Registered:</div>
                      <div class="text-gray-900">{{ date('m/d/Y h:i A', strtotime($user->created_at)) }}</div>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                      <a href="{{ route('editApprove', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Approve User</a>
                    </div>
                  </div>
                </tr>
                @endforeach
              </tbody>
              <div class="d-flex justify-content-center">
                {!! $users->links('vendor.pagination.tailwind') !!}
              </div>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>