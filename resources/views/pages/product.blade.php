@extends("base") @section("main")
<div
  class="mx-auto my-10 grid w-4/5 grid-cols-12 place-content-center justify-items-center gap-5"
>
  <div class="col-span-12 sm:col-span-6">
    <img
      src="{{ $product->imageUrl() }}"
      alt="{{$product->name}}"
      class="w-full"
    />
    <div class="mt-5 flex justify-center gap-5">
      <p>{{ $product->name }}</p>
      <p>{{ $product->price }} €</p>
    </div>
    <div class="text-center">
      @if ($product->state === "solde")
      <p>Actuellement en {{ $product->state }}</p>
      @endif
      <p class="mt-5 text-center">{{ $product->description }}</p>
    </div>
  </div>
  <div
    class="col-span-12 mt-5 flex flex-col justify-center sm:col-start-7 sm:col-end-12 sm:w-full sm:max-w-sm sm:justify-start"
  >
    <select class="" name="size" id="size">
      @foreach ($sizes as $s )
      <option value="{{ $s->sizes }}">{{ $s->sizes }}</option>
      @endforeach
    </select>
    <button class="mt-10 rounded-xl border border-black p-3">Acheter</button>
  </div>
</div>
@endsection