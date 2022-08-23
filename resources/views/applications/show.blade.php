<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

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



        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Application Review  
                      </th>
                    </tr>
                  </thead>
                  
                  <tbody class="bg-white divide-y divide-gray-200">
                    @if (count($applications))
                    
                    @foreach ($applications as $application)  

                      @php $status = $application->status; @endphp
                      <tr>
                        <td class="px-6 py-3">
                            <b>Question:</b><br>
                            {!! nl2br($application->question->question) !!}
                            <hr><br>
                            <b>Answer:</b><br>
                            <span class="text-sm">{!! $application->answer !!}</span><br>
                            
                            @if ($application->url<>'')
                              <br><b>Attachment:</b><br><br>
                              <a href="{{Storage::disk('s3')->url($application->url)}}" class="underline" target="_blank">Click here to Preview File</a><br><br>
                            @endif  
                        </td>
                      </tr>
                    @endforeach  
                  </tbody>
                </table>
                <div class="flex flex-wrap justify-center">
                {{ $applications->links(); }}
                </div>

                @if ($status=='0' || $status=='2')  
                <div class="p-3 mb-6">
                  <div class="col-md-12" style="text-align: right">
                    <a href="{{ route('applications.edit', $id) }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">For Edit</a>
                    </div>
                </div>
                @endif

                @else

                

                @endif

                

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
  