<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

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
        <div class="px-4 pt-4">
            <form method="post" action="{{ route('questions.store') }}">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md p-2 bg-white">
                    @include('layouts.alert')                            
                    
                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="account_type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Account Type <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <select name="account_type" id="account_type" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2">
                            <option value="1" @if ("1"==old('account_type')) selected @endif>School</option>
                            <option value="2" @if ("2"==old('account_type')) selected @endif>Hospital</option>
                            </select>
                            @error('account_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    
                    </div>    

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="category"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Category <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="category" id="category" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" required 
                                value="{{ old('category') }}" />
                            @error('category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>    

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="sub_category"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Sub Category</label>
                            <input type="text" name="sub_category" id="sub_category" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" 
                                value="{{ old('sub_category') }}" />
                            @error('sub_category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div> 

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="group_category"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Group Category</label>
                            <input type="text" name="group_category" id="group_category" maxlength="100" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" 
                                value="{{ old('group_category') }}" />
                            @error('group_category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>  

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="question"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Question <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <textarea name="question" rows="5" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" required>{{ old('question') }}</textarea>
                            @error('question')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div> 

                    <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2 col-span-2">
                            <label for="required"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Required an Answer</label>
                            <select name="required" id="required" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2">
                            <option value="1" @if ("1"==old('required')) selected @endif>Yes</option>
                            <option value="0" @if ("0"==old('required')) selected @endif>No</option>
                            </select>
                            @error('required')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div> 

                    <hr>
                    <p class="font-bold text-center; mt-10">Answer Options</p>



                    <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_1"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 1 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="text" name="option_1" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_1', '') }}">
                            @error('option_1')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_2"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Option 2 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
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



                    <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_5"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Compliance 1 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="option_5" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_5', '') }}">
                            @error('option_5')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_6"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Compliance 2 <small class="animated flash text-danger" style="font-size: 6px; padding: 1px;">Required</small></label>
                            <input type="text" name="option_6" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_6', '') }}">
                            @error('option_6')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_7"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Compliance 3 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="text" name="option_7" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_7', '') }}">
                            @error('option_7')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-2 bg-white sm:p-2">
                            <label for="option_8"  class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Compliance 4 <small class="animated flash text-primary" style="font-size: 6px; padding: 1px;">Optional</small></label>
                            <input type="text" name="option_8" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full p-2" value="{{ old('option_8', '') }}">
                            @error('option_8')
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
                            Add Question
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
  
  
    </div>
  </div>
</x-app-layout>  
