@extends("base") @section("main")
<div class="mx-auto mt-10 w-4/5">
  @if ($number === 1)
  <p class="text-right">Il y a {{$number}} produit au total.</p>
  @else
  <p class="text-right">Il y a {{$number}} produits au total.</p>
  @endif
</div>
<div
  class="mx-auto mt-10 grid w-4/5 grid-cols-12 place-content-center justify-items-center gap-5"
>
  @foreach ($products as $p )
  <div class="col-span-12 sm:col-span-4">
    <a href="{{ route('home.product', $p->id ) }}">
      <img
        class="aspect-[3/4] w-full object-cover"
        loading="lazy"
        src="{{ $p->imageUrl() }}"
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
@include("components.pagination",["pagination"=>$products]) @endsection