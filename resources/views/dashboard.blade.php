<link href="{{ asset('css/theme.css') }}" rel="stylesheet" />        

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />        
<link href="{{ asset('css/iconkit.min.css') }}" rel="stylesheet" >

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    

    <div class="page-header mt-0">
        
      
      
      
        
        
        @if (Auth::user()->user_type=="5" && Auth::user()->registration_status=="0")
        <div class="container-fluid pt-4">
          <div class="col-xl-12 col-md-12 col-sm-12 mt-4">
            <div class="card latest-update-card">
              <div class="card-header">
                <h3>Kindly wait for Administrator for Approval of your account and login again. Thank you!
                </h3>
              </div>    
            </div>
          </div>  
        </div>
        @elseif (Auth::user()->user_type<>"5")
        <div class="container-fluid pt-20">
        <div class="row clearfix">
          <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
            
              <div class="widget bg-primary">
                <div class="widget-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                      <h6>Total Registered School</h6>
                      <h2 style="font-size: 2rem">{{ $counts['totalRegisteredSchool'] }}</h2>
                    </div>
                    <div class="icon">
                      <i class="ik ik-user-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
            
              <div class="widget bg-success">
                <div class="widget-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                      <h6>Total Registered Hospital</h6>
                      <h2 style="font-size: 2rem">{{ $counts["totalRegisteredHospital"] }}</h2>
                    </div>
                    <div class="icon">
                      <i class="ik ik-user-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
            @if (Auth::user()->user_type<>"3" && Auth::user()->user_type<>"4" && Auth::user()->user_type<>"6")
            <a href="{{ route('users.registration') }}" style="text-decoration: none">
            @endif  
              <div class="widget bg-warning">
                <div class="widget-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                      <h6>New Registration (School)</h6>
                      <h2 style="font-size: 2rem">{{ $counts["newRegisteredSchool"] }}</h2>
                    </div>
                    <div class="icon">
                      <i class="ik ik-user-plus"></i>
                    </div>
                  </div>
                </div>
              </div>
            @if (Auth::user()->user_type<>"3" && Auth::user()->user_type<>"4")
            </a>
            @endif
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
            @if (Auth::user()->user_type<>"3" && Auth::user()->user_type<>"4" && Auth::user()->user_type<>"6")
            <a href="{{ route('users.registration') }}" style="text-decoration: none">
            @endif  
              <div class="widget bg-danger">
                <div class="widget-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                      <h6>New Registration (Hospital)</h6>
                      <h2 style="font-size: 2rem">{{ $counts['newRegisteredHospital'] }}</h2>
                    </div>
                    <div class="icon">
                      <i class="ik ik-user-plus"></i>
                    </div>
                  </div>
                </div>
              </div>
            @if (Auth::user()->user_type<>"3" && Auth::user()->user_type<>"4")
            </a>
            @endif
          </div>
        </div>
        @endif

        @if (Auth::user()->user_type=="5" && Auth::user()->registration_status=="1")

        <div class="row">
          <div class="col-xl-12 col-md-12 col-sm-12 mt-4">
            <div class="card latest-update-card">
              <div class="card-header">
                <h3>My Application Status</h3>
                <div class="card-header-right"></div>
              </div>
              <div class="card-block pb-0">
                <div class="table-responsive">
                  <table class="table table-hover mb-0 without-header">
                    <tbody>
                      @foreach($events as $event)
                      <tr>
                        <td>
                          <div class="ml-4 text-sm font-medium text-gray-900">

                            @if (Auth::user()->user_type=="5")
                              <a href="#"></h3>{{ $event->title }}</h3></a>
                            @else 
                              <a href="#"></h3>{{ $event->title1 }}</h3></a>
                            @endif
                          </div>  
                        </td>
                        <td>
                          <p class="font-weight-bold whitespace-nowrap">{{ date('F d, Y', strtotime($event->start)) }}</p>
                        </td>
                      </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        @elseif (Auth::user()->user_type<>"5")

          <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 mt-4">
              <div class="card table-card">
                <div class="card-header">
                  <h3>New Client </h3>
                  <div class="card-header-right"></div>
                </div>
                <div class="card-block pb-0">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 without-header">
                      <tbody>
                        @foreach($newClients as $newClient)
                        <tr>
                          <td>
                            <div class="col">
                              <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ substr($newClient->first_name,0,1) }}+{{ substr($newClient->last_name,0,1) }}&amp;color=7F9CF5&amp;background=EBF4FF">
                                <div class="ml-4 text-sm font-medium text-gray-900">
                                  <h3>{{ $newClient->client_name }}</h3>
                                </div>  
                              </div>  
                            </div>  
                          </td>
                          <td>
                            <p class="font-weight-bold whitespace-nowrap">{{ date('F d, Y', strtotime($newClient->created_at)) }}</p>
                          </td>
                        </tr>
                        
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12 mt-4">
              <div class="card latest-update-card">
                <div class="card-header">
                  <h3>Application Status Message</h3>
                  <div class="card-header-right"></div>
                </div>
                <div class="card-block pb-0">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0 without-header">
                      <tbody>
                        @foreach($events as $event)
                        <tr>
                          <td>
                            <div class="ml-4 text-sm font-medium text-gray-900">
                              @if (Auth::user()->user_type=="5")
                                <a href="#"></h3>{{ $event->title }}</h3></a>
                              @else 
                                <a href="#"></h3>{{ $event->title1 }}</h3></a>
                              @endif
                            </div>  
                          </td>
                          <td>
                            <p class="font-weight-bold whitespace-nowrap">{{ date('F d, Y', strtotime($event->start)) }}</p>
                          </td>
                        </tr>
                        
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif  


      </div>    
    
    



</x-app-layout>
