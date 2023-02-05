@include('parts.header')
@if (session('status'))
    <div class="alert alert-danger text-center">
        {{ session('status') }}
    </div>
@endif
<div class="m-10" align="right">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
            {{ __('Logout') }}
        </button>
    </form>

</div>
<div class="mx-auto  min-h-screen my-10 max-w-5xl justify-center flex flex-column">
    <div>



        <h1 class="m-10 text-2xl">{{__('Welcome')}} <span class="text-red-600">{{$user->surname}} {{$user->name}} </span> {{__('to the DentProject.')}}</h1>
        <h1 class="my-20 mx-10 text-2xl">{{__('Your Details:')}} </h1>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">{{__('Name')}}</th>
                <th class="px-4 py-2">{{__('Surname')}}</th>
                <th class="px-4 py-2">{{__('Email')}}</th>
                <th class="px-4 py-2">{{__('Phone')}}</th>
                <th class="px-4 py-2">{{__('Address')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2">{{$user->name}}</td>
                <td class="border px-4 py-2">{{$user->surname}}</td>
                <td class="border px-4 py-2">{{$user->email}}</td>
                <td class="border px-4 py-2">{{$user->phone}}</td>
                <td class="border px-4 py-2">{{$user->address}}</td>
            </tr>
        </tbody>
    </table>

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <form action="{{ route('user.updateUser') }}" method="POST">
            @csrf
            @method('POST')

            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2 p-3">
                    <h3 class="text-3xl my-10 font-bold text-center text-gray-800">
                        {{__('Edit your details')}}
                    </h3>
                    <p class="text-gray-800 text-center">
                        {{__('Name: ')}}
                    </p>
                    <input type="text" name="name" value="{{$user->name}}" class="border border-gray-300 p-2 w-full" class="@error('name') is-invalid @else is-valid @enderror">
                    <p class="text-gray-800 text-center">
                        {{__('Surname: ')}}
                    </p>
                    <input type="text" name="surname" value="{{$user->surname}}" class="border border-gray-300 p-2 w-full" class="@error('surname') is-invalid @else is-valid @enderror">
                    <p class="text-gray-800 text-center">
                        {{__('Email: ')}}
                    </p>
                    <input type="email" name="email" value="{{$user->email}}" class="border border-gray-300 p-2 w-full" class="@error('email') is-invalid @else is-valid @enderror">
                    <p class="text-gray-800 text-center">
                        {{__('Phone: ')}}
                    </p>
                    <input type="text" name="phone" value="{{$user->phone}}" class="border border-gray-300 p-2 w-full" class="@error('phone') is-invalid @else is-valid @enderror">
                    <p class="text-gray-800 text-center">
                        {{__('Address: ')}}
                    </p>
                    <input type="text" name="address" value="{{$user->address}}" class="border border-gray-300 p-2 w-full" class="@error('address') is-invalid @else is-valid @enderror">

                    <button type="submit" class=" my-10 mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        {{__('Update')}}
                    </button>
                </div>
            </div>
        </form>



        <h1 class="my-20 mx-10 text-2xl">{{__('Your Appointments:')}} </h1>
        <table class="table-auto w-full table-striped">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">{{__('Nr')}}</th>
                    <th class="px-4 py-2">{{__('Title')}}</th>
                    <th class="px-4 py-2">{{__('Description')}}</th>
                    <th class="px-4 py-2">{{__('Time')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    @if($appointment->isApproved==0)
                    <tr class="table-danger">
                    @else
                        <tr class="table-success">
                            @endif
                        <td class="border px-4 py-2">{{$appointment->id}}</td>
                        <td class="border px-4 py-2">{{$appointment->service->title}}</td>
                        <td class="border px-4 py-2">{{$appointment->service->description}}</td>
                        <td class="border px-4 py-2">{{$appointment->appointment_date}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <form action="{{ route('appointment.add') }}"  method="POST">
            @csrf

            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2 p-3">
                    <h3 class="text-3xl my-10 font-bold text-center text-gray-800">
                        {{__('Add Appointment')}}
                    </h3>
                    <p class="text-gray-800 text-center" >
                        {{__('Service: ')}}
                    </p>
                    <select name="service_id" class="form-control">
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->title}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="appointment_date">Appointment Date:</label>
                        <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="appointment_time">Appointment Time:</label>
                        <select name="appointment_time" id="appointment_time" class="form-control" required>
                            @for($i = 7; $i <= 15; $i++)
                                <option value="{{ $i }}:00">{{ $i }}:00:00</option>
                                <option value="{{ $i }}:30">{{ $i }}:30:00</option>
                            @endfor
                        </select>
                    </div>
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                    <button type="submit" class=" my-10 mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        {{__('Add')}}
                    </button>
                </div>

            </div>
        </form>
        @if ($appointments !== null)
            <div class="my-2">
                <div class="table-pagination">
                    {{ $appointments->links() }}
                </div>
            </div>
        @endif


</div>
@include('parts.footer')
