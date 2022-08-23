<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">



@push('scripts')


<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.lang.en.min.js"></script>


<script>
    uploadcare.registerTab('preview', uploadcareTabEffects)
</script>

<style>
    .uploadcare--widget__button {
        background: #157cfc; color: #fff; display: block
    }
    .uploadcare--widget__button_type_open {
        background: #157cfc; color: #fff; display: block
    }
    .uploadcare--tab__action-button {
        background: #157cfc; color: #fff; display: block
    }
    .uploadcare--widget__button:hover{
        background: #157cfc; color: #fff; display: block
    }

</style>

@endpush







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
        <div class="px-4 pt-4">
            <form method="post" action="{{ route('uploads.store') }}">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                    @include('layouts.alert')                            
                    
                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="client_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Client <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <select name="client_id" id="client_id" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 p-2 w-full select2" style="width:100%">
                                @foreach ($clients as $client)  
                                    <option value="{{ $client->id }}">{{ strtoupper($client->client_name) }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>  

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Category <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="category" id="category" value="{{ old('category') }}" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2">
                            @error('category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>
                    
                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="comment" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Comment <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <textarea name="comment" id="comment" rows="5" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>  

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <input
                                type="hidden"
                                role="uploadcare-uploader"
                                data-public-key="{{ env('UPLOADCARE_PUBLIC_KEY') }}"
                                data-tabs="file camera"
                                data-effects="crop, flip, enhance, grayscale, rotate, sharp, invert, mirror"
                                data-clearable="true"
                                name="url"
                            />
                        </div>
                    </div>    

                    <hr>
                    <p class="font-bold text-center; mt-10">Answer Options</p>



                    <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_1"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 1 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="option_1" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_1', '') }}">
                            @error('option_1')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_2"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 2 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="option_2" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_2', '') }}">
                            @error('option_2')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_3"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 3 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="text" name="option_3" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_3', '') }}">
                            @error('option_3')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_4"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 4 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="text" name="option_4" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_4', '') }}">
                            @error('option_4')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>

                    <div class="hidden grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="score_1"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Score 1 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="number" name="score_1" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('score_1', '0') }}">
                            @error('score_1')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="score_2"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Score 2 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="number" name="score_2" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('score_2', '0') }}">
                            @error('score_2')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="score_3"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Score 3 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="number" name="score_3" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('score_3', '0') }}">
                            @error('score_3')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="score_4"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Score 4 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="number" name="score_4" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('score_4', '0') }}">
                            @error('score_4')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>
                        
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Add Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
  
  
    </div>
  </div>
</x-app-layout>  

<script type="text/javascript">
    $(document).ready(function() {
        $('#user_id').select2();
    });
</script>
