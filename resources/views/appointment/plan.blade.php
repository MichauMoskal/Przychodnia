@include('parts.header')
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
            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
            <button type="submit" class=" my-10 mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                {{__('Add')}}
            </button>
        </div>

    </div>
</form>

@include('parts.footer')
