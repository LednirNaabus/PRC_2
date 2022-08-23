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
                <a href="{{ route('instructions.index') }}" class="text-sm p-1 bg-indigo-900 text-white text-center rounded font-bold" title="">Instructions</a>
              @endif
              
              <a href="{{ route('applications.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Application List</a>
              
              @if (Auth::user()->user_type=="6")  
                <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Upload Findings</a>
              @endif

              @if (Auth::user()->user_type=="1" || Auth::user()->user_type=="2" || Auth::user()->user_type=="3" || Auth::user()->user_type=="4")  
                  <a href="{{ route('uploads.index') }}" class="text-sm p-1 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200" title="">Check Findings</a>
              @endif
          </div>
    
          <div class="col-span-12 h-full md:col-span-10">
            <div class="px-4 pt-8">

              



        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            INSTRUCTIONS AND NOTES
                          </h3>
                        </th>
                      </tr>
                    </thead>
                    <tr>
                      <td class="px-6 py-3">
					  
                      @if (Auth::user()->user_type=="3")
                      	
                              <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                              	    As the Level 1 Accreditor, you can accredit, review and check the applications of the clients using the Digital Accreditation System. To start the accreditation:<br />
								</p>                              
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    1. Click on the "Applications" feature in the Digital Monitoring System to see the "Questionnaires," "Application List," and "Check Findings" features. - Questionnaires. This contains the questions the respective clients applying for accreditation will be asked. - Application List. Here is where the clients' applications will be available for you to accredit. - Check Findings. You may see the uploaded photos by the Surveyor in this feature.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    2. Click the "Application List" to check the list of applications available for you to accredit.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    3. Once decided, click the "Accredit" button to see the application. <br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    4. Proceed on checking and verifying the documents and answers made by the applicant. <br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">                         
                                    5. If there are amendments, you may immediately submit your feedback to the client. You can then wait for the client to make the necessary amendments to their application.<br>
                                </p>      
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    6. If you determine that the application is compliant, you may submit the application to the Level 2 accreditor for further assessment.<br>
                                </p>
                              </div>  
                              
                         @endif
                         
                         
                         @if (Auth::user()->user_type=="4")
                      	
                              <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                              	    As the Level 2 accreditor, you can accredit, review and check the applications of the clients using the Digital Accreditation System. To start the accreditation:<br /><br /> 
								</p>                              
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    1. Click on the "Applications" feature in the Digital Monitoring System to see the "Questionnaires," "Application List," and "Check Findings" features. - Questionnaires. This contains the questions the respective clients applying for accreditation will be asked. - Application List. Here is where the clients' applications will be available for you to accredit. - Check Findings. You may see the uploaded photos by the Surveyor in this feature.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    2. Click the "Application List" to check the list of applications available for you to accredit.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    3. Once decided, click the "Accredit" button to see the application. <br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    4. Proceed on checking and verifying the documents and answers made by the applicant.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">                         
                                    5. In the application, you will see the remarks of the Level 1 accreditor to the application. You may amend their feedback if necessary.<br>
                                </p>      
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    6. You may submit your feedback immediately to the client if there are still amendments. You can then wait for the client to make the necessary amendments to their application.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                	7. If you determine that the application is compliant, you may submit the application for approval.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
									8. Return to the "Application List" feature of the system, and click "Approve" to the relevant application. This will verify that the client's application for accreditation is compliant and will generate their certificate of compliance.<br>
                                </p>	                                
                              </div>  
                              
                         @endif
                         
                         
                         @if (Auth::user()->user_type=="5")
                      	
                              <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    1. Click on the "Applications" feature in the Digital Monitoring System to start your application.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                  2. Click on the "Add Application" button to finally start your application. Or, you can click on the "Start Application" in the "Instructions" button.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    3. A pop-up containing the Terms and Conditions will appear, in which you must oblige to start your application. Click the I accept button to proceed.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    4. Each question pertaining to your respective establishment is included in this online application. You must, with due diligence, provide the appropriate and correct answer to each requirement to ensure that you met the criteria set.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">                         
                                    5. There are textboxes and file attachments to each question. Textboxes may not be filled, depending on the question. However, file attachments are required to submit your application successfully.<br>
                                </p>      
                                <p class="font-bold text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    6. Important! Once you have justified your compliance with each question, you may submit the online application form. You may REVIEW and EDIT your answers only after you submit them. You can access these features by pressing the "Application List" feature. Do not worry if you missed any questions; you will be prompt about it.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400"> 
                                    7. If your application needs to be amended, you will be notified in the "Dashboard" feature of the system.<br>
                                </p>
                                <p class="text-base leading-relaxed text-gray-700 dark:text-gray-400">                         
                                    8. If your application is found compliant, you will also be notified in the "Dashboard" feature of the system, and you may download your certificate in the "Application List."
                                </p>  
                              </div>  
                              
                         @endif
                         
                         
                         
                                
                      </td>
                    </tr>
                    @if (Auth::user()->user_type=="5")
                    <tr>
                      <td class="text-center mb-10">
                        <a href="{{ route('applications.create') }}" class="text-center items-center px-4 py-3 bg-blue-600 mt-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Start Application</a>
                        <br><br><br><br><br>
                      </td>
                    </tr>
                    @endif
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
  