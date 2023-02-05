@include('parts.header')
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
        <h1 class="m-10 text-2xl">{{__('Welcome Admin')}} <span class="text-red-600">{{$user->surname}} {{$user->name}} </span> {{__('to the DentProject.')}}</h1>
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



        <form action="{{ route('admin.updateUser') }}" method="POST">
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
                    <input type="email" name="email" value="{{$user->email}}" class="border border-gray-300 p-2 w-full" class="@error('surname') is-invalid @else is-valid @enderror">
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


        <a class="btn btn-primary " href="{{route('appointments',$user)}}">All appointments</a>
        <a class="btn btn-primary " href="{{route('appointment.toApprove',$user)}}">Accept appointments</a>
        <h1 class="my-20 mx-10 text-2xl">{{__('All Users:')}} </h1>
            <form class="input-group" method="GET">
                <input type="search" name="search"  class="form-control rounded" placeholder="Znajdź" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">Znajdź</button>
            </form>
        <table class="table-auto w-full table-striped">

            <thead>
            <tr>
                <th class="px-4 py-2">{{__('Name')}}</th>
                <th class="px-4 py-2">{{__('Surname')}}</th>
                <th class="px-4 py-2">{{__('Email')}}</th>
                <th class="px-4 py-2">{{__('Phone')}}</th>
                <th class="px-4 py-2">{{__('Address')}}</th>
                <th class="px-4 py-2">{{__('Is Admin')}}</th>
                <th class="px-4 py-2">{{__('Action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="">
                    <td class="border px-4 py-2">{{$user->name}}</td>
                    <td class="border px-4 py-2">{{$user->surname}}</td>
                    <td class="border px-4 py-2">{{$user->email}}</td>
                    <td class="border px-4 py-2">{{$user->phone}}</td>
                    <td class="border px-4 py-2">{{$user->address}}</td>
                    <td class="border px-4 py-2">{{$user->is_admin}}</td>
                    <td class="border px-4 py-2">
                        @if($user->is_admin==0)
                        <form action="{{ route('admin.user.delete') }}" method="POST">
                            @csrf
                            @method('post')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                {{__('Delete')}}
                            </button>
                        </form>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <a class="btn btn-info" href="{{route('appointment.plan',$user)}}">plan</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if ($users !== null)
            <div class="my-2">
                <div class="table-pagination">
                    {{ $users->links() }}
                </div>
            </div>
        @endif

    </div>
@include('parts.footer')
