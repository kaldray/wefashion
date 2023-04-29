@extends("base") @section("main")
<div class="mx-auto w-2/4 pt-5 text-center">
  @if (session("indisponible"))
  <p class="bg-orange-500 p-2 text-white">{{ session("indisponible") }}</p>
  @endif
</div>
@if (count($products) === 0)
<div class="mt-10 flex min-h-screen justify-center">
  <p>Aucun produits</p>
</div>
@else
<div
  class="mx-auto mt-10 grid min-h-screen w-4/5 grid-cols-12 place-content-center justify-items-center gap-5"
>
  @if ($products) @foreach ($products as $p )
  <div class="col-span-12 sm:col-span-4">
    <a href="{{route('home.product', $p->id ) }} ">
      <img
        width="200px"
        height="150px"
        class="aspect-[3/4] w-full object-cover"
        loading="lazy"
        src="{{ $p->imageUrl() }}"
        alt="Description image"
      />
      <p class="text-center">{{ $p->name }}</p>
      <p class="text-center">{{ $p->price }} €</p>
    </a>
  </div>
  @endforeach @endif
</div>
<div class="mt-10 flex justify-center">
  <p>Il y a {{$number}} produits au total.</p>
</div>
@endif @include("components.pagination") @endsection