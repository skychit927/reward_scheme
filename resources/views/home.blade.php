@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @if (\Auth::user()->role === 'student')
            {{-- Award --}}
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Award Goal</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="progress-group">
                                <span class="progress-text">Gold Award</span>
                                @if((int)($sicker / 1000 * 100) >= 100)
                                    <span class="progress-number"><b>complete</b></span>
                                @else
                                    <span class="progress-number"><b>{{$sicker}}</b>/1000</span>
                                @endif
                                <div class="progress sm">
                                <div class="progress-bar progress-bar-yellow" style="width: {{ ($sicker / 1000 * 100) }}%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="progress-text">Sliver Award</span>
                                @if((int)($sicker / 1000 * 100) >= 100)
                                    <span class="progress-number"><b>complete</b></span>
                                @else
                                    <span class="progress-number"><b>{{$sicker}}</b>/700</span>
                                @endif

                                <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: {{ ($sicker / 700 * 100) }}%"></div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <span class="progress-text">Bronze Award</span>
                                @if((int)($sicker / 1000 * 100) >= 100)
                                    <span class="progress-number"><b>complete</b></span>
                                @else
                                    <span class="progress-number"><b>{{$sicker}}</b>/500</span>
                                @endif

                                <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: {{ ($sicker / 500 * 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Popular Prize</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Sticker</th>
                                <th>Redeem Times</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prize_list as $key => $prize)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$prize->name}}</td>
                                <td>{{$prize->sticker}}</td>
                                <td>{{$prize->redeem_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Sicker Quantity Ranking List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Total Sticker</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_list as $key => $user)
                            <tr style="{{ $user->id == $nowUser->id ? 'background-color:#f9dd20;' : '' }}">
                                <td>{{$key + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->classroom}}</td>
                                <td>{{$user->sticker}}</td>
                            </tr>
                            @endforeach
                            @if (\Auth::user()->role === 'student')
                                <tr>
                                    <td><b>Your Rank</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>{{$userInfo->rank}}</td>
                                    <td>{{$userInfo->name}}</td>
                                    <td>{{$userInfo->classroom}}</td>
                                    <td>{{$userInfo->sticker}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
