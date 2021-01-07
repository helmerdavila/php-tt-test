@extends('application')
@section('content')
  @foreach($electronicItems->chunk(2) as $electronicItemsChunk)
    <div class="flex flex-col sm:flex-row">
      @foreach($electronicItemsChunk as $electronicItem)
        <?php /** @var \App\Models\ElectronicItem $electronicItem */ ?>
        <div class="flex-1 m-5 shadow-xl rounded-lg bg-gray-100">
          <div class="relative bg-black rounded-lg h-96 bg-white">
            <img alt="{{ $electronicItem->name }}" src="{{ $electronicItem->image }}" class="absolute h-full w-full object-cover rounded-t-lg">
          </div>
          <a href="{{ route('item.show', $electronicItem->id) }}" class="flex flex-row p-6 items-center justify-between">
            <h3 class="text-4xl font-semibold text-center">{{ $electronicItem->name }}</h3>
            <span class="font-semibold text-green-500">${{ $electronicItem->price }}</span>
          </a>
        </div>
      @endforeach
    </div>
  @endforeach
@endsection
