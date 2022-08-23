<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />
<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

@push('scripts')


<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.lang.en.min.js"></script>


<script>
    uploadcare.registerTab('preview', uploadcareTabEffects)

    UPLOADCARE_LOCALE_TRANSLATIONS = {
        buttons: {
            choose: {
                files: {
                    one: 'Choose a file'
                }
            }
        }
    }
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


<script>
    function toggle() {
        var count = document.getElementById('count').value;

        var targetEl = document.getElementById('popup-modal');
       
        targetEl.className = "overflow-y-auto fixed top-0 flex  justify-center z-50 md:inset-0 h-modal md:w-full";

        
        for (i=1;i<=count;i++)
            {   
                if (document.getElementById('answer_'+i).value !='') {
                    document.getElementById('answerSummary_'+i).style.display = 'block';
                    document.getElementById('answerValue_'+i).innerHTML = document.getElementById('answer_'+i).value;
                    document.getElementById('urlValue_'+i).src = document.getElementById('url_'+i).value;
                }
            }
        
    }
</script>    

@endpush


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
                @include('layouts.alert')  

                <form method="POST" action="{{ route('applications.store') }}">
                    @csrf

                    



                    <div class="card-body table-responsive"">

                        @if (count($questions) > 0) 
                            <div class="accordion" id="accordionExample">

                                
                                    <input type="hidden" name="count" id="count" value="{{ count($questions) }}">
        



                                    @php 
                                        $category = ""; 
                                        $start = 1;
                                    @endphp

                                    @foreach($questions as $key => $question)

                                        @php 
                                        
                                            $i = $loop->index + 1                                     
                                
                                        @endphp                                
                                        
                                        @if ($category <> $question->category)

                                            @if ($category<>"")
                                                            </table>
                                                        </div>        
                                                    </div>        
                                                </div>
                                            @endif





                                            <div class="accordion-item bg-white border border-gray-200">
                                                <h2 class="accordion-header mb-0" id="heading{{ $start }}">
                                                  <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $start }}" aria-expanded="true" aria-controls="collapse{{ $start }}">
                                                        {{ $question->category }}
                                                  </button>
                                                </h2>
                                                <div id="collapse{{ $start }}" class="accordion-collapse collapse @if ($start==1) show @endif" aria-labelledby="heading{{ $start }}" data-bs-parent="#accordionExample">    
                                                    <div class="accordion-body py-4 px-5">
                                                        <table class="table table-hover" style="width:100%; overflow-x:scroll; overflow-y:hidden;">

                                            @php 
                            
                                                $start = $start + 1;
                                            
                                            @endphp                
                                        @endif

                                        @php 
                                        
                                            $category = $question->category; 
                                        
                                        @endphp



                                    
                                
                                        <tr>
                                            <td colspan="4">
                                                
                                                <div class="grid md:grid-cols-1 sm:grid-cols-12 text-gray text-sm leading-6">

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        {!! nl2br($question->question) !!}
                                                        <input type="hidden" name="question_id_{{ $i }}" value="{{ $question->id }}">
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <textarea rows="5" cols="40" id="answer_{{ $i }}" name="answer_{{ $i }}" class="form-input rounded-md shadow-sm mt-1 block text-gray-900 w-full"></textarea>
                                                    </div>


                                                    @if (Auth::user()->account_type=="2")
                                                        <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                                <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">Level of Compliance:</span>
                                                            </div>    
                                                        </div>
                                                    @endif


                                                    <div class="grid md:grid-cols-4 sm:grid-cols-12 text-white text-sm leading-6">
                                                        
                                                        @if ($question->option_1<>'')
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                                <input type="radio" name="option_{{ $i }}" class="text-gray-900" value="{{ old('option_', $question->option_1) }}">
                                                                <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $question->option_1 }}</span>
                                                                @error('option_')
                                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                            </div>
                                                        @endif
        
                                                        @if ($question->option_2<>'')
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                                <input type="radio" name="option_{{ $i }}" class="text-gray-900" value="{{ old('option_', $question->option_2) }}">
                                                                <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $question->option_2 }}</span>
                                                                @error('option_')
                                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                            </div>
                                                        @endif

                                                        @if ($question->option_3<>'')
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                                <input type="radio" name="option_{{ $i }}" class="text-gray-900" value="{{ old('option_', $question->option_3) }}">
                                                                <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $question->option_3 }}</span>
                                                                @error('option_')
                                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                            </div>
                                                        @endif

                                                        @if ($question->option_4<>'')
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                                <input type="radio" name="option_{{ $i }}" class="text-gray-900" value="{{ old('option_', $question->option_4) }}">
                                                                <span class="uppercase tracking-wide text-gray-700 text-xs font-bold">{{ $question->option_4 }}</span>
                                                                @error('option_')
                                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="px-4 py-2 bg-white sm:p-2">
                                                            </div>
                                                        @endif
        
                                                    </div>

                                                    <div class="px-4 py-2 bg-white sm:p-2">
                                                        <input
                                                            type="hidden"
                                                            role="uploadcare-uploader"
                                                            data-public-key="{{ env('UPLOADCARE_PUBLIC_KEY') }}"
                                                            data-tabs="file camera"
                                                            data-effects="crop, flip, enhance, grayscale, rotate, sharp, invert, mirror"
                                                            data-clearable="true"
                                                            id="url_{{ $i }}"
                                                            name="url_{{ $i }}"
                                                        />
                                                        @if ($question->required=='1')
                                                            <label><small class="animated flash text-danger" style="font-size: 10px; padding: 1px;">Required</small></label>
                                                        @endif
                                                    </div>
                                                </div>    
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                            </table></div></div></div>
                        @endif  
                    </div>
                    

                    <div class="row mb-0">
                        <div class="col-md-12" style="text-align: right">
                            <button onClick="toggle();" type="button" class="btn btn-lg btn-block btn-primary text-right bg-blue-500">
                                {{ __('Review') }}
                            </button>
                        </div>
                    </div>








                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-y-scroll fixed top-0 w-full flex  justify-center z-50 md:inset-0 h-modal md:w-full">
                        <div class="relative p-4 w-full max-w-2xl md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6">
                                    <h1 class="mt-10 mb-5 text-lg font-bold text-gray-900 dark:text-gray-900">Please check and Review to proceed.</h1>

                                    @if (count($questions) > 0) 

                                    @foreach($questions as $key => $question)

                                        @php 
                                        
                                        $i = $loop->index + 1                                     
                            
                                        @endphp       

                                        <div class="p-2 text-sm" id="{{ "answerSummary_".$i }}" style="display:none">
                                            <b>Question:</b><br>
                                            {!! nl2br($question->question)."<br>"; !!}
                                            <hr><br>
                                            <b>Answer:</b><br>
                                            <span class="text-sm" id="{{ "answerValue_".$i }}"></span><br>
                                            <br><b>Image:</b><br>
                                            <img id="{{ "urlValue_".$i }}" class="w-16 md:w-32 lg:w-48"><br><br>
                                        </div>
                                            
                                    @endforeach
                                    
                                    @endif
                                    


                                    <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Submit
                                    </button>
                                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>









                
                </form>    
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class=" overflow-y-auto overflow-x-hidden fixed top-0 z-50 w-full h-modal flex  justify-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Instructions
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Welcome! To certify your establishment’s compliance, you must seek ocular inspection the coordination with the PRC in validating that you are practicing and maintaining the proper ethical and technical standards to enhance professions or occupations. You need to apply for accreditation when it is near expiration.

Before starting your application, please be informed that the process is guided by RA 10173 the Data Privacy Act of 2012. Only the authorized personnel will have access to any personal information you will share during the process. Rest assured that the privacy and confidentiality of data will be observed.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="defaultModal" type="button" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-full sm:w-1/2">I accept</button>
                <button data-modal-toggle="defaultModal" type="button" class="block text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600  md:w-full sm:w-1/2">Decline</button>
            </div>
        </div>
    </div>
</div>
</x-app-layout> 


<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
