<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="w-full relative mt-2 my-24 overflow-hidden p-2 bg-white">
    
    <div class="grid grid-cols-12 bg-white">

        <div class="col-span-12 px-3 text-center py-6 flex space-x-2 border-b border-solid md:space-x-0 md:space-y-2 md:flex-col md:col-span-2 md:justify-start overflow-x-scroll scrollber-container custom-scrollbar">
            
            @if (Auth::user()->user_type<>"5")  
                <a href="{{ route('questions.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="Questionaires">Questionaires</a>
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
        <div class="px-4 pt-4">

            <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                   
            </div>
        </div>
        </div>
    </div>
</div>

</x-app-layout> 


