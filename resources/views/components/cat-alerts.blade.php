@if ($errors->any())
    <div class="alert alert-danger bg-red-600 w-max p-2 rounded-2xl h-min">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
