@if(session('message'))
    <div class="animate-pulse bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div role="alert">
        <div class="animate-pulse bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Error
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{ session('error') }}</p>
        </div>
    </div>    
@endif

@if ($errors->any())
    <div class="animate-pulse alert alert-danger alert-dismissible fade show p-3" role="alert"">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <div role="alert">
                        <div class="animate-pulse bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Error
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>{{ $error }}</p>
                        </div>
                    </div> 
                </li>                
            @endforeach
        </ul>
    </div>
@endif