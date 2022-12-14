<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<style>
    ::-webkit-scrollbar{
        display: block;
    }
</style>


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

<div class="w-full relative mt-2 my-24 p-2 bg-white overflow-y-scroll">
    
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
  
      <div class="col-span-12 h-full md:col-span-10  overflow-y-scroll">
        <div class="px-4 pt-4">

            <div class="shadow sm:rounded-md p-2 bg-white">
                @include('layouts.alert')  

                <form method="post" action="{{ route('applications.update', $id) }}">
                    @method('PUT')
                    @csrf
                                    
                    <div class="card-body table-responsive">
                        <table class="table table-hover" style="width:100%; overflow-x:scroll; overflow-y:scroll overflow-y-auto;">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 49%">Areas of Evaluation</th>
                                    <th style="width: 35%">Actual Situation</th>
                                    <th style="width: 5%">Attachment</th>
                                </tr>
                            </thead>
                            @if (count($applications) > 0) 

                                @php $category = ""; @endphp

                                @foreach($applications as $key => $application)

                                    @php 
                                    
                                        $i = $loop->index + 1                                     
                            
                                    @endphp                                
                                    
                                    @if ($category<>$application->question->category)
                                        <tr @if ($application->comment=="" && Auth::user()->user_type=="5") style="display:none" @endif>
                                            <td style="font-weight: bold" colspan="5"><br><br>{{ $application->question->category }}</td>
                                        </tr>
                                    @endif

                                    @php $category = $application->question->category @endphp

                                    
                                    @if (Auth::user()->user_type=="5") 
                                    
                                        

                                        <tr @if ($application->comment=="") style="display:none" @endif>
                                            <td colspan="4">
                                                
                                                <div class="grid md:grid-cols-1 sm:grid-cols-12 text-gray text-sm leading-6">

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold">Question:</label><br>
                                                        {!! nl2br($application->question->question) !!}
                                                        <input type="hidden" name="question_id_{{ $i }}" value="{{ $application->question_id }}">
                                                        <input type="hidden" name="user_id_{{ $i }}" value="{{ $application->user_id }}">
                                                        <input type="hidden" name="ammend_{{ $i }}" value="@if ($application->comment=="") 0 @else 1 @endif">
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold">Answer:
                                                        </label><br>
                                                        <textarea rows="5" cols="40" name="answer_{{ $i }}" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" @if ($question->required=='1') required @endif>{{ $application->answer }}</textarea>
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold">Remarks:</label><br>
                                                        {!! nl2br($application->comment) !!}
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        @if ($application->question->required=='1')
                                                            <label><small class="animated flash text-danger" style="font-size: 10px; padding: 1px;">Required</small></label>
                                                        @endif 
                                                        <input
                                                            type="hidden"
                                                            role="uploadcare-uploader"
                                                            data-public-key="{{ env('UPLOADCARE_PUBLIC_KEY') }}"
                                                            data-tabs="file camera"
                                                            data-effects="crop, flip, enhance, grayscale, rotate, sharp, invert, mirror"
                                                            data-clearable="true"
                                                            name="url_{{ $i }}"
                                                        />
                                                    </div>
                                                </div>    
                                                


                                            </td>
                                        </tr>








                                    @else
                                    
                                        <tr>
                                            <td colspan="4">
                                                
                                                <div class="grid md:grid-cols-1 sm:grid-cols-12 text-gray text-sm leading-6">

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold">Question:</label><br>
                                                        {!! nl2br($application->question->question) !!}
                                                        <input type="hidden" name="question_id_{{ $i }}" value="{{ $application->question_id }}">
                                                        <input type="hidden" name="user_id_{{ $i }}" value="{{ $application->user_id }}">
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold">Answer:</label><br>
                                                        {!! nl2br($application->answer) !!}<br>

                                                        @if (Auth::user()->account_type=="2" || Auth::user()->user_type=="3" || Auth::user()->user_type=="4")
                                                            <label class="font-bold">Level of Compliance:</label>
                                                            {{ $application->option_ }}
                                                        @endif
                                                    </div>

                                                    
                                                </div>    
                                                
                                                @if (Auth::user()->user_type<>"2")
                                                <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
                                                    
                                                    @if ($application->question->option_5<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="option{{ $i }}" class="text-gray-900" value="{{ old('option', $application->question->option_5) }}" @if ($application->option==$application->question->option_5) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->option_5 }}</span>
                                                            @error('option')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                    @if ($application->question->option_6<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="option{{ $i }}" class="text-gray-900" value="{{ old('option', $application->question->option_6) }}" @if ($application->option==$application->question->option_6) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->option_6 }}</span>
                                                            @error('option')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                    @if ($application->question->option_7<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="option{{ $i }}" class="text-gray-900" value="{{ old('option', $application->question->option_7) }}" @if ($application->option==$application->question->option_7) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->option_7 }}</span>
                                                            @error('option')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                    @if ($application->question->option_8<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="option{{ $i }}" class="text-gray-900" value="{{ old('option', $application->question->option_8) }}" @if ($application->option==$application->question->option_8) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->option_8 }}</span>
                                                            @error('option')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                </div>



                                                <div class="grid md:grid-cols-1 sm:grid-cols-12 text-white text-sm leading-6">
                                                
                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <label class="font-bold text-black">Remarks:</label><br>
                                                        <textarea rows="5" cols="40" name="comment_{{ $i }}" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full" @if (Auth::user()->user_type=="2") readonly @endif >{{ $application->comment }}</textarea>
                                                    </div>

                                                    @if ($application->url)
                                                    <div class="px-4 py-2 bg-white sm:p-2 mt-2 mb-4">
                                                        <a href="{{ $application->url }}" class="text-center items-center px-4 py-3 bg-green-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" target="_blank">Preview Image</a>
                                                    </div>
                                                    @endif
                                                
                                                </div>    

                                                <div class="hidden grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
                                                    @if ($application->question->score_1<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="score{{ $i }}" class="text-gray-900" value="{{ old('score', $application->question->score_1) }}" @if ($application->score==$application->question->score_1) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->score_1 }}</span>
                                                            @error('score')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                    @if ($application->question->score_2<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="score{{ $i }}" class="text-gray-900" value="{{ old('score', $application->question->score_2) }}" @if ($application->score==$application->question->score_2) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->score_2 }}</span>
                                                            @error('score')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                    @if ($application->question->score_3<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="score{{ $i }}" class="text-gray-900" value="{{ old('score', $application->question->score_3) }}" @if ($application->score==$application->question->score_3) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->score_3 }}</span>
                                                            @error('score')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif


                                                    @if ($application->question->score_4<>'')
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                            <input type="radio" name="score{{ $i }}" class="text-gray-900" value="{{ old('score', $application->question->score_4) }}" @if ($application->score==$application->question->score_4) checked @endif>
                                                            <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $application->question->score_4 }}</span>
                                                            @error('score')
                                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    @else
                                                        <div class="px-4 py-2 bg-white sm:p-2">
                                                        </div>
                                                    @endif

                                                </div>
                                                @endif
                                                
                            
                                                


                                            </td>
                                        </tr>
                                    @endif     












                                @endforeach
                            @else   
                                <tr>
                                    <td colspan="3" style="text-align: center">No record found.</td>
                                </tr>
                            @endif
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    

                    @if (Auth::user()->user_type=="5") 
                        <div class="row mb-0">
                            <div class="col-md-12" style="text-align: right">
                                <input type="hidden" id="post" name="post" value="">
                                <button type="submit" onclick="javascript:setSubmit('0')" class="btn btn-lg btn-block btn-primary text-right bg-blue-500">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>                 
                                    
                    @else


                        @if (Auth::user()->user_type<>"2")
                        <div class="row mb-0">
                            <div class="col-md-12" style="text-align: right">
                                <input type="hidden" id="post" name="post" value="">
                                <button type="submit" onclick="javascript:setSubmit('0')" class="btn btn-lg btn-block btn-primary text-right bg-blue-500">
                                    @if (Auth::user()->user_type=="3")
                                        {{ __('Submit to Level 2') }}
                                    @else
                                        {{ __('Submit for Approval') }}
                                    @endif
                                </button>

                                <button type="submit" onclick="javascript:setSubmit('1')" class="btn btn-lg btn-block btn-primary text-right bg-red-500">
                                    {{ __('Submit for Amendment') }}
                                </button>
                            </div>
                        </div>
                        @endif
                    
                    @endif    
                </form>    
            </div>
        </div>
        </div>
    </div>
</div>


</x-app-layout> 

<script>
    function setSubmit(post)
    {
        document.getElementById('post').value = post;
    }
</script>
