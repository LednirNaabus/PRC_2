<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/flowbite@1.3.4/dist/datepicker.js"></script>

<x-app-layout>
  <x-slot name="header">
  </x-slot>

  <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">

    <div class="grid grid-cols-12 bg-white ">

      <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">

        @if (Auth::user()->user_type<>"5")
          <a href="{{ route('questions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="Questionaires">Questionaires</a>
          @endif

          @if (Auth::user()->user_type=="3" || Auth::user()->user_type=="4" || Auth::user()->user_type=="5")
          <a href="{{ route('instructions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Instructions</a>
          @endif

          <a href="{{ route('applications.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="">Application List</a>

          @if (Auth::user()->user_type=="6")
          <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Upload Findings</a>
          @endif

          @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2" || Auth::user()->user_type=="3" || Auth::user()->user_type=="4")
          <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Check Findings</a>
          @endif
      </div>

      <div class="col-span-12 h-full md:col-span-10">
        <div class="px-4">

          @if (Auth::user()->user_type=="5")
          <div class="px-4 pt-8">
            <div class="block mb-4">
              <a href="{{ route('applications.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Application</a>
            </div>
            @else
            <div class="px-4 pt-6">
              @endif



              <form action="{{ route('applications.index') }}" method="GET">
                <div class="search" @if (Auth::user()->user_type=='5') style="display:none" @endif>

                  <div date-rangepicker class="grid md:grid-cols-3 sm:grid-cols-12 text-sm leading-6">
                    <div class="bg-white p-2">
                      <input name="date_submitted_start" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select start date registered" value="" readonly>
                    </div>
                    <div class="bg-white p-2">
                      <input name="date_submitted_end" type="text" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" placeholder="Select end date registered" value="" readonly>
                    </div>
                    <div class="bg-white p-2">
                      <input type="text" name="client_name" id="client_name" placeholder="Enter Client Name" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
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
                              Date Submitted
                            </th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Client Name
                            </th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($applications as $application)
                          <tr>
                            <td class="px-6 py-3 whitespace-nowrap">
                              {{ date('m/d/Y', strtotime($application->created_at)) }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                              {{ $application->user->client_name; }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                              @if ($application->status=='0' || $application->status=='')
                              Pending
                              @elseif ($application->status=='1')
                              Approved
                              @else
                              Amend
                              @endif
                            </td>

                            <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                              @if (Auth::user()->user_type=="5")

                              @if ($application->status=='0')
                              <a href="{{ route('applications.show', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Review</a>
                              @endif

                              @if ($application->status=='2')
                              <a href="{{ route('applications.edit', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Amend</a>
                              @endif

                              @if ($application->status=='1')
                              <a href="{{ route('certificate', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" target="_blank">Certificate</a>
                              @endif

                              @else

                              @if ($application->status=='1')
                              <a href="{{ route('certificate', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" target="_blank">Certificate</a>
                              @else
                              <a href="{{ route('applications.edit', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Accredit</a>
                              @endif

                              @if ($application->status<>'1' && (Auth::user()->user_type<>"2" && Auth::user()->user_type<>"3"))
                                    <form class="inline-block" action="{{ route('applications.destroy', $application->application_id) }}" method="POST" onsubmit="return confirm('Approve?');">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="submit" class="text-center items-center px-4 py-3 bg-green-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" value="Approve">
                                    </form>
                                    @endif







                                    @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>


                    </div>
                  </div>
                </div>
              </div>
              <!-- MOBILE -->
              <div class="flex flex-col md:hidden mt-3">
                <table>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($applications as $application)
                    <tr>
                      <div class="mt-3 space-y-3 rounded-lg bg-white p-4 shadow">
                        <div class="flex items-center space-x-2 text-sm">
                          <div class="font-bold uppercase text-blue-300">Client Name:</div>
                          <div class="text-gray-900">{{ $application->user->client_name; }}</div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                          <div class="font-bold uppercase text-blue-500">Date Submitted:</div>
                          <div class="text-gray-900">{{ date('m/d/Y', strtotime($application->created_at)) }}</div>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                          <div class="font-bold uppercase text-teal-600">Status:</div>
                          <div class="text-gray-900">@if ($application->status=='0' || $application->status=='')
                            Pending
                            @elseif ($application->status=='1')
                            Approved
                            @else
                            Amend
                            @endif</div>
                        </div>
                        <div>
                          @if (Auth::user()->user_type=="5")

                          @if ($application->status=='0')
                          <div class="mt-1 py-3">
                            <a href="{{ route('applications.show', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Review</a>
                          </div>
                          @endif

                          @if ($application->status=='2')
                          <div class="mt-1 py-3">
                            <a href="{{ route('applications.edit', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Amend</a>
                          </div>
                          @endif

                          @if ($application->status=='1')
                          <div class="mt-1 py-3">
                            <a href="{{ route('certificate', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" target="_blank">Certificate</a>

                          </div>
                          @endif

                          @else

                          @if ($application->status=='1')
                          <div class="mt-1 py-3">
                            <a href="{{ route('certificate', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" target="_blank">Certificate</a>
                          </div>
                          @else
                          <div class="mt-1 py-3">
                            <a href="{{ route('applications.edit', $application->application_id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Accredit</a>

                            @endif

                            @if ($application->status<>'1' && (Auth::user()->user_type<>"2" && Auth::user()->user_type<>"3"))
                                  <form class="inline-block" action="{{ route('applications.destroy', $application->application_id) }}" method="POST" onsubmit="return confirm('Approve?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="text-center items-center px-4 py-3 bg-green-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" value="Approve">
                                  </form>
                                  @endif





                          </div>

                          @endif
                        </div>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>