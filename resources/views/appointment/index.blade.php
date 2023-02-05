@include('parts.header')
<div class="mx-auto  my-10 max-w-5xl justify-center flex flex-column">
<div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
            {{ __('Logout') }}
        </button>
    </form>
</div>
<h1 class="my-20 mx-10 text-2xl">{{__('All Appointments:')}} </h1>
<form class="input-group" method="GET">
    <input type="search" name="search1"  class="form-control rounded" placeholder="Znajdź" aria-label="Search" aria-describedby="search-addon" />
    <button type="submit" class="btn btn-outline-primary">Znajdź</button>
</form>
<table class="w-full">
    <thead class="table-dark">
    <tr>
        <th class="px-4 py-2">{{__('Id')}}</th>
        <th class="px-4 py-2">{{__('Date')}}</th>
        <th class="px-4 py-2">{{__('Title')}}</th>
        <th class="px-4 py-2">{{__('Description')}}</th>
        <th class="px-4 py-2">{{__('Name')}}</th>
        <th class="px-4 py-2">{{__('Surname')}}</th>
        <th class="px-4 py-2">{{__('Delete')}}</th>
    </tr>
    </thead>
    <tbody>


    @foreach($appointments as $appointment)
        @if($appointment->isApproved==0)
        <tr class="table-danger">
            @else
                <tr>
                    @endif
            <td class="border px-4 py-2">{{$appointment->id}}</td>
            <td class="border px-4 py-2">{{$appointment->appointment_date}}</td>
            <td class="border px-4 py-2">{{$appointment->service->title}}</td>
            <td class="border px-4 py-2">{{$appointment->service->description}}</td>
            <td class="border px-4 py-2">{{$appointment->user->name}}</td>
            <td class="border px-4 py-2">{{$appointment->user->surname}}</td>
            <td class="border px-4 py-2">
                <form action="{{ route('admin.appointment.delete') }}" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="{{$appointment->id}}">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        {{__('Delete')}}
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@if ($appointments !== null)
    <div class="my-2">
        <div class="table-pagination">
            {{ $appointments->links() }}
        </div>
    </div>
@endif
</div>
</div>
@include('parts.footer')
