@php
    $ip_address = '-.-.-.-';
    $timezone = config('app.timezone');
    $date_format = 'd/m/Y H:i:s';
@endphp

@extends('v200.layouts.app')
@section('page_title', env('APP_NAME').' - Dashboard')
@section('main_content')

    <section class="row">
        <div class="col-sm-12">
            <section class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card text-white bg-primary">
                        <div class="card-header">
                            <p><i class="fa fa-wifi"></i> {{ __('common.ip_address') }}</p>
                        </div>
                        <div class="card-block">
                            @if ($public_ip != null)
                                @php
                                    $ip_address = $public_ip->ip_address;
                                    $last_update = $public_ip->updated_at;
                                @endphp
                            @endif
                            @if (isset($user_settings))
                                @foreach ($user_settings as $settings)
                                    @php
                                        if ($settings->option_key === 'timezone') {
                                            $timezone = $settings->option_value;
                                        }
                                        if ($settings->option_key === 'date_format') {
                                            $date_format = $settings->option_value.' H:i:s';
                                        }
                                    @endphp
                                @endforeach
                            @endif
                            <p>{{ $ip_address }}</p>
                            <p>{{ __('common.last_update') }} {{ isset($last_update) ? $last_update->tz($timezone)->format($date_format) : '----' }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection