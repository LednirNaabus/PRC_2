<x-app-layout>
    <x-slot name="header">
    </x-slot>
  
    <div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
      
      <div class="grid grid-cols-12 bg-white ">
  
          <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
            
            @if (Auth::user()->user_type<>"5")  
            <a href="{{ route('questions.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="Questionaires">Questionaires</a>
            @endif

            @if (Auth::user()->user_type=="3" || Auth::user()->user_type=="4" || Auth::user()->user_type=="5")  
            <a href="{{ route('instructions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Instructions</a>
            @endif
            
            @if (Auth::user()->user_type<>"6")                           
              <a href="{{ route('applications.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Application List</a>
            @endif

            @if (Auth::user()->user_type=="6")  
                <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Upload Findings</a>
            @endif

            @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2" || Auth::user()->user_type=="3" || Auth::user()->user_type=="4")  
                <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Check Findings</a>
            @endif

        </div>
    
          <div class="col-span-12 h-full md:col-span-10">
            
            @if (Auth::user()->user_type=="1")               
                <div class="px-4 pt-8">
                <div class="block mb-4">
                    <a href="{{ route('questions.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Question</a>
                </div>
            @else
              <div class="px-4 pt-6">
            @endif    
  
        <form action="{{ route('questions.index') }}" method="GET">
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
                <input type="text" name="question" id="question" placeholder="Enter Question" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
              </div>
            </div>

              <div class="grid md:grid-cols-2 sm:grid-cols-12 text-sm leading-6">
                  <div class="bg-white p-2">
                    <input type="text" name="category" id="category" placeholder="Enter Category" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
                  </div>
                  <div class="bg-white p-2">
                    <input type="text" name="sub_category" id="sub_category" placeholder="Enter Sub Category" class="form-input rounded-md shadow-sm mt-1 block w-full p-2">
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
                      <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                      </th>
                      <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Account Type
                      </th>
                      <th scope="col" class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Question
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Action</span>
                      </th>
                    </tr>
                  </thead>
                  
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($questions as $question)  
                      <tr>
                        <td class="px-6 py-3 whitespace-nowrap align-top">
                            {{ ($loop->index + 1) }}
                        </td>      
                        <td class="px-6 py-3 whitespace-nowrap align-top">
                            @if ($question->account_type=='1')
                                School
                            @elseif ($question->account_type=='2')
                                Hospital
                            @endif
                        </td>  
                        <td class="px-6 py-3 align-top">
                            {!! '<span class="px-0 inline-flex text-xs leading-0 text-md font-semibold rounded-full bg-green-100 text-green-800">'.$question->category.'</span><br>'.nl2br($question->question) !!}    
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium align-top">
                          
                          @if (Auth::user()->user_type=="1")      

                            <a href="{{ route('questions.edit', $question->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Manage</a>
                            <form class="inline-block" action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                            </form>

                          @endif

                        </td>
                      </tr>
                    @endforeach  
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  {!! $questions->withQueryString()->links('vendor.pagination.tailwind') !!}
                </div>
  
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
  