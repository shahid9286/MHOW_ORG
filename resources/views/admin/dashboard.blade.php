{{-- @extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Welcome back,') }} {{ auth()->user()->name }} !</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
    </div>
@endsection --}}
@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')

@php
    use App\Models\Donation;
    use Carbon\Carbon;
    use App\Models\DonorEmail;
    use App\Models\Campaign;
    use App\Models\Department;
    use App\Models\ProjectCategory;
    use App\Models\User;
use App\Models\EmailHistory;




    $totalDonations = Donation::sum('amount');
    $todayDonations = Donation::whereDate('donation_date', today())->sum('amount');
    $thisWeekDonations = Donation::whereBetween('donation_date', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->sum('amount');
    $thisMonthDonations = Donation::whereMonth('donation_date', now()->month)->sum('amount');

    $todayCount = DonorEmail::where('status', 'sent')
        ->whereDate('sent_at', Carbon::today())
        ->count();

    $yesterdayCount = DonorEmail::where('status', 'sent')
        ->whereDate('sent_at', Carbon::yesterday())
        ->count();

    $thisWeekCount = DonorEmail::where('status', 'sent')
        ->whereBetween('sent_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

    $thisMonthCount = DonorEmail::where('status', 'sent')
        ->whereMonth('sent_at', Carbon::now()->month)
        ->whereYear('sent_at', Carbon::now()->year)
        ->count();
       

    $total = Campaign::count();
    $active = Campaign::where('status', 'active')->count();
    $inactive = Campaign::where('status', 'inactive')->count();

    $totalDepartments = Department::count();
    $activeDepartments = Department::where('status', 'active')->count();
    $inactiveDepartments = Department::where('status', 'inactive')->count();

    $total = ProjectCategory::count();
    $active = ProjectCategory::where('status', 'active')->count();
    $inactive = ProjectCategory::where('status', 'inactive')->count();

    $total = User::count();
    $active = User::where('status', 'active')->count();
    $inactive = User::where('status', 'inactive')->count();
    
    
    $todayCountEmial = EmailHistory::whereDate('sent_at', Carbon::today())
    ->where('status', 'sent')
    ->count();

$yesterdayCountEmial = EmailHistory::whereDate('sent_at', Carbon::yesterday())
    ->where('status', 'sent')
    ->count();

$thisWeekCountEmial = EmailHistory::whereBetween('sent_at', [
        Carbon::now()->startOfWeek(),
        Carbon::now()->endOfWeek(),
    ])
    ->where('status', 'sent')
    ->count();

$thisMonthCountEmial = EmailHistory::whereYear('sent_at', Carbon::now()->year)
    ->whereMonth('sent_at', Carbon::now()->month)
    ->where('status', 'sent')
    ->count();
@endphp

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Welcome back,') }} {{ Auth::user()->name }}!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12 my-2">
                <h4>Donar's Data</h4>
            </div>
            
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.donor.index') }}">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span> <!-- Changed Icon -->
                        <div class="info-box-content">
                            <span class="info-box-text">Total Donars</span>
                            <span class="info-box-number">{{ \App\Models\Donor::all()->count() }}</span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.donor.index') }}">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-user"></i></span> <!-- Changed Icon -->
                        <div class="info-box-content">
                            <span class="info-box-text">Individual Donars</span>
                            <span class="info-box-number">{{ \App\Models\Donor::where('donor_type', 'individual')->count() }} </span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.donor.index') }}">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-building"></i></span> <!-- Changed Icon -->
                        <div class="info-box-content">
                            <span class="info-box-text">Corporate Donars</span>
                            <span class="info-box-number">{{ \App\Models\Donor::where('donor_type', 'corporate')->count() }} </span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.donor.index') }}">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-sync-alt"></i></span> <!-- Changed Icon -->
                        <div class="info-box-content">
                            <span class="info-box-text">Recurring Donars</span>
                            <span class="info-box-number">{{ \App\Models\Donor::where('donor_type', 'recurring')->count() }} </span>
                        </div>
                    </div>
                </a>
            </div>
            


            <div class="col-12 my-2">
                <h4>Donation Data</h4>
            </div>
            
            <div class="col-md-3 col-sm-4 col-12">
                <a href="{{ route('admin.donation.index') }}">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Donations:</span>
                            <span class="info-box-number">£ {{ number_format($totalDonations, 2) }}</span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-4 col-12">
                <a href="{{ route('admin.donation.index') }}">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Today's Donations:</span>
                            <span class="info-box-number">£ {{ number_format($todayDonations, 2) }}</span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-4 col-12">
                <a href="{{ route('admin.donation.index') }}">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">This Week's Donations:</span>
                            <span class="info-box-number">£ {{ number_format($thisWeekDonations, 2) }}</span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 col-sm-4 col-12">
                <a href="{{ route('admin.donation.index') }}">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">This Month's Donations:</span>
                            <span class="info-box-number">£ {{ number_format($thisMonthDonations, 2) }}</span>
                        </div>
                    </div>
                </a>
            </div>
              

                <div class="col-12 my-2">
                  <h4>Emails Data</h4>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                  <a href="#">
                  <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-calendar-day"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Emails Sent Today:</span>
                      <span class="info-box-number">{{ $todayCountEmial }}</span>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                  <a href="#">
                  <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-calendar-minus"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Emails Sent Yesterday:</span>
                      <span class="info-box-number">{{ $yesterdayCountEmial }}</span>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                  <a href="#">
                  <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-calendar-week"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Emails Sent This Week: </span>
                      <span class="info-box-number">{{ $thisWeekCountEmial }}</span>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <a href="#">
                  <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-calendar-alt"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Emails Sent This Month:</span>
                      <span class="info-box-number">{{ $thisMonthCountEmial }}</span>
                    </div>
                  </div>
                </a>
              </div> 

              <div class="col-12 my-2">
                <h4>Campaign Data</h4>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <a href="{{ route('admin.campaign.index') }}">
                <div class="info-box bg-danger">
                  <span class="info-box-icon"><i class="fas fa-flag"></i>

                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Campaigns:</span>
                    <span class="info-box-number">{{ $total }}</span>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <a href="{{ route('admin.campaign.index') }}">
                <div class="info-box bg-info">
                  <span class="info-box-icon"><i class="fas fa-flag"></i>

                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Active Campaigns:</span>
                    <span class="info-box-number">{{ $active }}</span>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-4 col-sm-6 col-12">
                <a href="{{ route('admin.campaign.index') }}">
                <div class="info-box bg-success">
                  <span class="info-box-icon"><i class="fas fa-flag"></i>

                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Inactive Campaigns: </span>
                    <span class="info-box-number">{{ $inactive }}</span>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-12 my-2">
              <h4>Department Data</h4>
          </div>
          
          <div class="col-md-4 col-sm-6 col-12">
              <a href="{{ route('admin.department.index') }}">
                  <div class="info-box bg-info">
                      <span class="info-box-icon"><i class="fas fa-building"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Total Departments:</span>
                          <span class="info-box-number">{{ \App\Models\Department::count() }}</span>
                      </div>
                  </div>
              </a>
          </div>
          
          <div class="col-md-4 col-sm-6 col-12">
              <a href="{{ route('admin.department.index') }}">
                  <div class="info-box bg-success">
                      <span class="info-box-icon"><i class="fas fa-building"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Active Departments:</span>
                          <span class="info-box-number">{{ \App\Models\Department::where('status', 'active')->count() }}</span>
                      </div>
                  </div>
              </a>
          </div>
          
          <div class="col-md-4 col-sm-6 col-12">
              <a href="{{ route('admin.department.index') }}">
                  <div class="info-box bg-warning">
                      <span class="info-box-icon"><i class="fas fa-building"></i></span>
                      <div class="info-box-content">
                          <span class="info-box-text">Inactive Departments:</span>
                          <span class="info-box-number">{{ \App\Models\Department::where('status', 'inactive')->count() }}</span>
                      </div>
                  </div>
              </a>
          </div>
          
          <div class="col-12 my-2">
            <h4>Project Category Data</h4>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ route('admin.project-category.index') }}">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Project Categories:</span>
                        <span class="info-box-number">{{ $total }}</span>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ route('admin.project-category.index') }}">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Active Project Categories:</span>
                        <span class="info-box-number">{{ $active }}</span>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ route('admin.project-category.index') }}">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Inactive Project Categories:</span>
                        <span class="info-box-number">{{ $inactive }}</span>
                    </div>
                </div>
            </a>
        </div>
          
        <div class="col-12 my-2">
          <h4>User Data</h4>
      </div>
      
      <div class="col-md-4 col-sm-6 col-12">
          <a href="{{ route('admin.user.index') }}">
              <div class="info-box bg-warning">
                  <span class="info-box-icon"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Total Users:</span>
                      <span class="info-box-number">{{ $total }}</span>
                  </div>
              </div>
          </a>
      </div>
      
      <div class="col-md-4 col-sm-6 col-12">
          <a href="{{ route('admin.user.index') }}">
              <div class="info-box bg-danger">
                  <span class="info-box-icon"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Active Users:</span>
                      <span class="info-box-number">{{ $active }}</span>
                  </div>
              </div>
          </a>
      </div>
      
      <div class="col-md-4 col-sm-6 col-12">
          <a href="{{ route('admin.user.index') }}">
              <div class="info-box bg-info">
                  <span class="info-box-icon"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Blocked Users:</span>
                      <span class="info-box-number">{{ $inactive }}</span>
                  </div>
              </div>
          </a>
      </div>

           



            </div>
        </div>
    </div>

@endsection