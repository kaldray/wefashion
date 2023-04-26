@extends("base") @section("main")
<div
  class="mx-auto mt-10 grid w-4/5 grid-cols-12 place-content-center justify-items-center gap-5"
>
  @foreach ($products as $p )
  <div class="col-span-12 sm:col-span-4">
    <a href="">
      <img
        class="w-full"
        loading="lazy"
        src="{{ $p->image }}"
        alt="Description image"
      />
      <p class="text-center">{{ $p->name }}</p>
      <p class="text-center">{{ $p->price }} €</p>
    </a>
  </div>
  @endforeach
</div>
<div class="mt-10 flex justify-center">
  <p>Il y a {{$number}} produits au total.</p>
</div>
@include("components.pagination") @endsection