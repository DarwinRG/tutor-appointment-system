<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Create Appointment</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Appointment') }}
            </h2>
            @if(session('success'))
                <div class="center">
                    <div class="btn_green info_con info_width">
                        {{ session('success') }}
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
            @if(session('error_delete'))
            <div class="center">
                <div class="btn_red info_con info_width">
                    {{ session('error_delete') }}
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
                                                    <input type="date"  name="date" id="date" class="form-control" required>
                                                </div><br>
                                            
                                                <div class="form-group">
                                                    <label for="time">Time:</label><br>
                                                    <select name="time" id="time" class="form-control select_time" required>>
                                                        <?php for($i=9; $i<=21; $i++) {   
                                                           $timeFormat = sprintf('%02d:00', $i);?>
                                                        <option value="<?php echo $timeFormat; ?>"><?php echo $timeFormat; ?></option>
                                                       <?php }?>
                                                    </select>
                                                </div><br>
                                         
                                                <button name="btn_sub" type="submit" class="btn btn-primary mybtn btn_green">Create Appointment</button>
                                            </form>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Appointment ID</th>
                                                        <th>E-mail</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                  @php $counter = ($appointments->currentPage() - 1) * $appointments->perPage() + 1 @endphp
                                                    @foreach ($appointments as $appointment)
                                                        <tr>
                                                            <td>{{ $counter++}}</td>
                                                            <td>{{ $userEmail}}</td>
                                                            <td>{{ $appointment->date->format('d/m/Y') }}</td>
                                                            <td>{{ $appointment->time}}</td>
                                                            <td>   
                                                                <a href="{{ route('update', $appointment) }}"><button class="btn_delete_edit btn_green">Edit</button></a>                                                   
                                                                <a href="{{route('delete',$appointment)}}"><button name="" class="btn_delete_edit btn_red">Delete</button></a>              
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                           <br>{{ $appointments->links() }}
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