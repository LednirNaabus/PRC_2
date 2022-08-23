<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;

use Storage;

class ApplicationsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date_submitted_start = \Carbon\Carbon::parse($request->input('date_submitted_start'));        
        $date_submitted_start->format('Y-m-d');

        $date_submitted_end = \Carbon\Carbon::parse($request->input('date_submitted_end'));        
        $date_submitted_end->format('Y-m-d');

        $client_name = $request->input('client_name');  




        $clients = User::where('user_type', '5')
                       ->orderBy('client_name', 'asc')
                       ->get();

        
        if (Auth::user()->user_type=='5') {
            $applications = Application::orderBy('created_at', 'desc')
            ->select(DB::raw('application_id, user_id, created_at, status'))
            ->where('user_id', Auth::user()->id)
            ->distinct()
            ->get();
        }
        else {    

            if ($request->input('date_submitted_start')=='') {
                $applications = Application::orderBy('created_at', 'desc')
                ->select(DB::raw('application_id, user_id, created_at, status'))
                ->Where('user_id', 'like', '%' . $client_name . '%')
                ->distinct()
                ->get();
                }
            else {
                $applications = Application::orderBy('created_at', 'desc')
                ->select(DB::raw('application_id, user_id, created_at, status'))
                ->Where('user_id', 'like', '%' . $client_name . '%')
                ->whereBetween('created_at', [$date_submitted_start, $date_submitted_end])
                ->distinct()
                ->get();
            }
        }

        return view('applications.index', compact('clients','applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_type = Auth::user()->account_type;
        $questions = Question::where('account_type',$account_type)->get();


        return view('applications.create', compact('questions'));       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todaysDate = Carbon::now()->toDateTimeString();
        $todaysDate = date('YmdHis');

        $createdAt = date('Y-m-d').' 00:00:00';

        $applicationID = $todaysDate.
                         substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 20).
                         uniqid();



        $data = $request->all();

        if (Auth::user()->account_type=='1') {
            $count = 56;
        }
        else {
            $count = 40;
        }





        
        



        for ($i=1;$i<=$count;$i++) {

            if ($request["url_".$i]=='')
            {
                $url="";
            }
            else
            {
            $url = time().'.'.$request["url_".$i]->extension();  
            
            $file = $request->file("url_".$i);
            
            Storage::disk('s3')->put($url, file_get_contents($file));
            }

           

            $applications = DB::table('applications')->insert(
                array(
                       'application_id'  =>   $applicationID, 
                       'created_at'      =>   $createdAt, 
                       'account_type'    =>   Auth::user()->account_type,
                       'user_id'         =>   Auth::user()->id,
                       'question_id'     =>   $request['question_id_'.$i], 
                       'answer'          =>   $request['answer_'.$i], 
                       'option_'         =>   $request['option_'.$i], 
                       'url'             =>   $url, 
                )
           );  
        }

        $clients = User::where('user_type', '5')
                       ->orderBy('client_name', 'asc')
                       ->get();

        if (Auth::user()->user_type=='5') {
            $applications = Application::orderBy('created_at', 'desc')
            ->select(DB::raw('application_id, user_id, created_at, status'))
            ->where('user_id',Auth::user()->id)
            ->distinct()
            ->get();
        }
        else {    
            $applications = Application::orderBy('created_at', 'desc')
            ->select(DB::raw('application_id, user_id, created_at, status'))
            ->distinct()
            ->get();
        }    
        

        return view('applications.index', compact('clients','applications')
                   )->with('message', 'Application Submitted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications = Application::where('application_id',$id)->where('url','<>','')->paginate(10);

        return view('applications.show', compact('id','applications'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applications = Application::where('application_id',$id)->get();

        return view('applications.edit', compact('id','applications'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        if (Auth::user()->account_type=='1') {
            $count = 56;
        }
        else {
            $count = 40;
        }








        if (Auth::user()->user_type=='5') {

            


            for ($i=1;$i<=$count;$i++) {

                
                    if($request['url_'.$i]=='') {
                        $url = $request['origUrl_'.$i];
                    }
                    else {
                            
                        if ($request["url_".$i]=='')
                        {
                            $url="";    
                        }    
                        else
                        {
                                $url = time().'.'.$request["url_".$i]->extension();  
                                
                                $file = $request->file("url_".$i);
                                
                                Storage::disk('s3')->put($url, file_get_contents($file));
                        }    
                    }




                    $applications = DB::table('applications')
                                    ->where('application_id', $id)
                                    ->where('question_id', $request['question_id_'.$i])
                                    ->update([
                            'answer'          =>   $request['answer_'.$i], 
                            'option_'         =>   $request['option_'.$i], 
                            'url'             =>   $url,             
                        ]

                    );  


            }










        }
        else {    



                if ($request['post']=='0') {
                    $post="";
                }
                else {
                    $post="2";



                    $todaysDate = Carbon::now()->toDateTimeString();
                    $todaysDate = date('Y-m-d');

                    $createdAt = date('Y-m-d').' 00:00:00';

                    $clientID = $request['user_id_1'];
                    $clienName = Auth::user()->client_name;




                    $applications = DB::table('events')->insert(
                        array(
                            'title'           =>   'Your Application needs Amendment', 
                            'title1'          =>   'Client '.$clienName.' Application needs Amendment', 
                            'client_id'       =>   $clientID, 
                            'start'           =>   $todaysDate, 
                            'end'             =>   $todaysDate, 
                            'created_at'      =>   $createdAt, 
                        )
                        );  

                    








                }


                for ($i=1;$i<=$count;$i++) {

                    $applications = DB::table('applications')
                                    ->where('application_id', $id)
                                    ->where('question_id', $request['question_id_'.$i])
                                    ->update([
                            'comment'           =>   $request['comment_'.$i],          
                            'option'            =>   $request['option'.$i], 
                            'score'             =>   $request['score'.$i], 
                            'status'            =>   $post, 
                        ]
                );  
                }

        }        


        $clients = User::where('user_type', '5')
                       ->orderBy('client_name', 'asc')
                       ->get();
        
        if (Auth::user()->user_type=='5') {
            $applications = Application::orderBy('created_at', 'desc')
            ->select(DB::raw('application_id, user_id, created_at, status'))
            ->where('user_id',Auth::user()->id)
            ->distinct()
            ->get();
        }
        else {
            $applications = Application::orderBy('created_at', 'desc')
            ->select(DB::raw('application_id, user_id, created_at,status'))
            ->distinct()
            ->get();
        }    
        

        return view('applications.index', compact('clients','applications')
                   )->with('message', 'Application Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function createCertificate($application_id) {
        // retreive all records from db
        
        $todaysDate = Carbon::now()->toDateTimeString();
        $todaysDate = date('M d, Y');


        $path = 'img/certificate.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);  
        

        $data = Application::where('application_id',$application_id)->first();
        
        $data = User::find($data->user_id);
       

        view()->share('certificate', $data);
        
        $html = view('applications/certificate', [ 'todaysDate' => $todaysDate, 'data' => $data, 'logo' => $logo ])->render();
        return @\PDF::loadHTML($html, 'utf-8')->setPaper('letter','landscape')->stream(); 
      }

    public function destroy($id){


        $todaysDate = Carbon::now()->toDateTimeString();
        $todaysDate = date('Y-m-d');

        $createdAt = date('Y-m-d').' 00:00:00';





        $applications = DB::table('applications')
                              ->where('application_id', $id)
                              ->first();
           
        $clientID = $applications->user_id;
        $clienName = Auth::user()->client_name;







        $applications = DB::table('applications')
                              ->where('application_id', $id)
                              ->update([
                       'status'            =>   '1',          
                ]
           );  


           


           $applications = DB::table('events')->insert(
            array(
                   'title'           =>   'Your Application Approved Successfully', 
                   'title1'          =>   'Client '.$clienName.' Application Approved Successfully', 
                   'client_id'       =>   $clientID, 
                   'start'           =>   $todaysDate, 
                   'end'             =>   $todaysDate, 
                   'created_at'      =>   $createdAt, 
            )
            );  






            $clients = User::where('user_type', '5')
                       ->orderBy('client_name', 'asc')
                       ->get();


           $applications = Application::orderBy('created_at', 'desc')
           ->select(DB::raw('application_id, user_id, created_at,status'))
           ->distinct()
           ->get();
   
           
   
           return view('applications.index', compact('clients','applications')
                      )->with('message', 'Application Approve Successfully');   

        
    } 

    public function cancel($id) {  
        
    } 

    public function terms() {  
        dd ('1');
        
    }

}
