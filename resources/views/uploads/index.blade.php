<x-app-layout>
    <x-slot name="header">
    </x-slot>
  
    <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
      
      <div class="grid grid-cols-12 bg-white ">
  
          <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
              <a href="{{ route('questions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="Questionaires">Questionaires</a>

              @if (Auth::user()->user_type=="3" || Auth::user()->user_type=="4" || Auth::user()->user_type=="5")  
              <a href="{{ route('instructions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Instructions</a>
              @endif

              @if (Auth::user()->user_type<>"6")                           
              <a href="{{ route('applications.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Application List</a>
              @endif

              @if (Auth::user()->user_type=="6")  
                  <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="">Upload Findings</a>
              @endif

              @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2" || Auth::user()->user_type=="3" || Auth::user()->user_type=="4")  
                  <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="">Check Findings</a>
              @endif

              
          </div>
    
          <div class="col-span-12 h-full md:col-span-10">
            
            
            @if (Auth::user()->user_type=="6")      
              <div class="px-4 pt-8">

              <div class="block mb-4">
                <a href="{{ route('uploads.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Upload</a>
              </div>
            @else
              <div class="px-4 pt-6">
            @endif

        <form action="{{ route('uploads.index') }}" method="GET">
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
                    <input type="text" name="client_name" id="client_name" placeholder="Enter Client Name" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
                  </div>
                </div>
  
                <div class="grid md:grid-cols-1 sm:grid-cols-12 text-sm leading-6">
                  <div class="bg-white">
                      <button type="submit"
                          class="block w-full text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                          onclick="return confirm('Continue?');"
                      >Search
                      </button>
                  </div>
              </div>                 
          </div>  
        </form>
  
        <div class="flex flex-col">
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
                        Photo
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Action</span>
                      </th>
                    </tr>
                  </thead>
                  
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($uploads as $upload)  
                      <tr>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ date('m/d/Y', strtotime($upload->created_at)) }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            {{ $upload->user->client_name }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                          <img src="{{ $upload->url }}" class="w-16 md:w-32 lg:w-48">
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
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
    </div>
    </div>
    </div>
  </div>
  </x-app-layout>
  