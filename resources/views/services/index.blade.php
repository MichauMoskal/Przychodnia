@include('parts.header')
<div class="mx-auto  my-10 max-w-5xl justify-center flex flex-column">

    <h1 class="text-3xl text-center mb-6"><b>Our Services</b></h1>
    <ul>
        <li class="list-group-item-primary text-2xl pl-3" ><b>In our clinic you will perform procedures such as:</b></li>
        @foreach($services as $service)
            <li class="list-group-item" >
                <p class="sm:text-left text-xl"> {{$service->title}} </p>
                <p class="sm:text-left text-base"> {{$service->description}}</p>

            </li>

        @endforeach
    </ul>
</div>
@include('parts.footer')
