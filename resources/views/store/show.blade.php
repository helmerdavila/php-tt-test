@extends('application')
@section('content')
  <?php /** @var \App\Models\ElectronicItem $electronicItem */ ?>
  <h1 class="text-6xl font-bold mt-3">{{ $electronicItem->name }}</h1>
  <div class="flex mt-4">
    <div class="w-1/2">
      <img src="{{ $electronicItem->image }}" class="rounded shadow-xl" alt="{{ $electronicItem->name }}">
    </div>
    <div class="w-1/2 px-5">
      <h2 class="text-green-600 text-4xl">${{ $electronicItem->price }}</h2>
      <div class="mt-4">
        <form class="inline-block" action="{{ route('cart.add', $electronicItem->id) }}" method="post">
          {!! csrf_field() !!}
          <button type="submit" class="bg-black text-white px-4 py-2 rounded shadow">
            <i class="fas fa-fw fa-plus"></i> Add to cart
          </button>
        </form>
        @if(\App\Instances\Cart::instance()->contains($electronicItem))
          <form class="inline-block" action="{{ route('cart.remove', $electronicItem->id) }}" method="post">
            {!! csrf_field() !!}
            <button type="submit" class="inline-block bg-black text-white px-4 py-2 rounded shadow">
              <i class="fas fa-fw fa-minus"></i>
            </button>
          </form>
        @endif
      </div>
      @if($electronicItem->extras->count() > 0)
        <h2 class="text-3xl font-semibold mt-5">Extras</h2>
        @foreach($electronicItem->extras as $extra)
          <div class="flex flex-row items-center bg-white my-3">
            <div class="w-1/4">
              <img src="{{ $extra->image }}" alt="{{ $extra->name }}">
            </div>
            <div class="flex-1 flex flex-col">
              <span class="font-semibold">{{ $extra->name }}</span>
              <span class="text-green-600">+ ${{ $extra->price }}</span>
              <span>Wired: {{ $extra->is_wired ? 'Yes' : 'No' }}</span>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection
