@extends('application')
@section('content')
  <h1 class="text-3xl font-semibold mt-5">Order preview</h1>
  @if($cart->count() > 0)
    @foreach($cart->content() as $item)
      <div class="flex flex-row shadow items-center bg-white my-3">
        <div class="w-1/4">
          <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
        </div>
        <div class="flex-1 flex flex-col">
          <span class="font-semibold">{{ $item['name'] }}</span>
          <span class="text-green-600">+ ${{ $item['price'] }}</span>
          <span>Wired: {{ $item['is_wired'] ? 'Yes' : 'No' }}</span>
        </div>
        <form class="inline-block px-5" action="{{ route('cart.remove', $item['id']) }}" method="post">
          {!! csrf_field() !!}
          <button type="submit" class="inline-block bg-black text-white px-4 py-2 rounded shadow">
            <i class="fas fa-fw fa-trash"></i>
          </button>
        </form>
      </div>
    @endforeach
  @endif
  <form action="{{ route('order.generate') }}" method="post" class="flex flex-row justify-between mt-4">
    {!! csrf_field() !!}
    <div>
      <span class="text-xl font-semibold mr-2">Total:</span>
      <span class="text-xl font-semibold text-green-600">${{ $cart->total() }}</span>
    </div>
    <button type="submit" class="block bg-black text-white px-4 py-2 rounded shadow">
      <i class="fas fa-fw fa-check"></i> Generate order
    </button>
  </form>
@endsection
