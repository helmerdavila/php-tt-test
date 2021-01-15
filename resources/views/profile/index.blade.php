@extends('application')
@section('content')
  <h1 class="text-4xl font-bold mt-3">My orders</h1>
  @foreach($orders as $order)
    <?php /** @var \App\Models\Order $order */ ?>
    <div class="flex flex-col shadow bg-white my-3 p-4">
      <h2 class="text-3xl">Order #{{ $order->id }}</h2>
      <h3 class="text-2xl">Items</h3>
      <div class="flex">
        <div class="w-1/4">
          <div class="font-semibold mt-5">Total: <span>${{ $order->total }}</span></div>
        </div>
        <div class="flex flex-col">
          @foreach($order->order_details as $orderDetail)
            <?php /** @var \App\Models\OrderDetail $orderDetail */ ?>
            <div class="flex flex-row-reverse items-center">
              <div class="w-1/4">
                <img src="{{ $orderDetail->electronic_item->image }}" alt="{{ $orderDetail->electronic_item->name }}">
              </div>
              <div class="flex-1 flex flex-col">
                <span class="font-semibold">{{ $orderDetail->electronic_item->name }}</span>
                <span class="text-green-600">+ ${{ $orderDetail->electronic_item->price }}</span>
                <span>Wired: {{ $orderDetail->electronic_item->is_wired ? 'Yes' : 'No' }}</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endforeach
@endsection
