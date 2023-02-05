@include('parts.header')
<p class="m-10" align="right">
    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
        <a href="{{ route('login') }}">Login</a>
    </button>
    <button  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
        <a href="{{ route('register') }}">Register</a>
    </button>
</p>

<div class="mx-auto  my-10 max-w-5xl justify-center flex flex-column">

    <h1 class="text-3xl text-center mb-6"><b>Welcome to our dentist clinic</b></h1>
    <img src="https://thehill.com/wp-content/uploads/sites/2/2022/11/CA_dentist_11072022istock.jpg?strip=1" alt="zdjecie">
    <h1 class="text-2xl text-center mb-6"><b>Our Services</b></h1>
        <ul>
            <li class="list-group-item-primary text-2xl pl-3" ><b>In our clinic you will perform procedures such as:</b></li>
        @foreach($services->slice(0,5) as $service)
                <li class="list-group-item" >
                   <p class="sm:text-left text-xl"> {{$service->title}} </p>
                    <p class="sm:text-left text-base"> {{$service->description}}</p>

                </li>

            @endforeach
        </ul>
    <a href="{{route('services')}}" class="btn btn-info w-48 ">
        see more services
    </a>
    </div>
    @include('parts.footer')
</div>
