<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Update Appointment</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Appointment') }}
            </h2>
            @if(session('info_update'))
              <div class="center">
                    <div class="btn_green info_con width_info_update">
                        {{ session('info_update') }}
                    </div>
              </div>
            @endif
            @if(session('error'))
            <div class="center">
                <div class="btn_red info_con info_width_error">
                    {{ session('error') }}
                </div>
            </div>
            @endif
        </x-slot> 
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card" style="text-align:center;">
                                        <div class="card-body" >
                                            <form method="POST" action="">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="date">Date:</label><br>
                                                    <input type="date"  name="date" id="date" class="form-control" value="{{ $appointment->date->format('Y-m-d') }}" required>
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="time">Time:</label><br>
                                                    <select name="time" id="time" class="form-control select_time" required>>
                                                        <?php for($i=9; $i<=21; $i++) {   
                                                           $timeFormat = sprintf('%02d:00', $i);?>
                                                        <option value="<?php echo $timeFormat; ?>" <?php if($appointment->time == $timeFormat){echo"selected";}?>> <?php echo $timeFormat; ?></option>
                                                       <?php }?>
                                                    </select>

                                                </div><br>
                                                <button type="submit" class="btn btn-primary mybtn mybtn_update">Update Appointment</button>
                                            </form>
                                             <div style="text-align:center;">
                                                <a href="{{ route('create') }}">
                                                    <button  class="btn btn-primary mybtn mybtn_update color_btn_back">Back</button>
                                                </a>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Appointment ID</th>
                                                        <th>E-mail</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>{{ $appointment->appointment_id }}</td>
                                                            <td>{{ $userEmail}}</td>
                                                            <td>{{ $appointment->date->format('d/m/Y') }}</td>
                                                            <td>{{ $appointment->time}}</td>
                                                        </tr>
                                                </tbody>
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
</body>
</html>