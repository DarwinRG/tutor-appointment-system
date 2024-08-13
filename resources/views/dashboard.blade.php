<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>View Page</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Page') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                           <div class="text_align_r">
                                            <h2 class="text_style_welcome text_align_r">
                                                {{ 'Welcome ' .$userName }}
                                            </h2>
                                            <p class="text-style">You have {{$totalAppointments}} Appointment</p>
                                           </div>
                                            <p class="text-style text_align_c">Register your appointment</p><br>
                                            <div class="text_align_c">
                                                <a href="{{ route('create') }}">
                                                    <button  class="btn btn-primary mybtn">Create</button>
                                                </a>
                                            </div>

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Appointment ID</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                  @php $counter = ($appointments->currentPage() - 1) * $appointments->perPage() + 1 @endphp
                                                    @foreach ($appointments as $appointment)
                                                        <tr>
                                                            <td>{{ $counter++}}</td>
                                                            <td>{{ $appointment->date->format('d/m/Y') }}</td>
                                                            <td>{{ $appointment->time}}</td>
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