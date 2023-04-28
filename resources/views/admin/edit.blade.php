@extends("base") @section("main")
<div class="mx-auto mt-10 w-4/5">
  <div class="my-10 text-center">
    <h1 class="text-lg">Modification d'un produit</h1>
    @if (session("succes"))
    <p class="bg-logo p-2 text-white">{{ session("succes") }}</p>
    @endif
  </div>
  <div class="flex justify-center">
    <form
      method="post"
      class="flex w-4/5 max-w-md flex-col gap-5"
      action="{{ route('admin.update',['product'=> $product] ) }}"
    >
      @csrf @method("PATCH")
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="name">Name</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="name"
          value="{{ old('name', $product->name)}}"
        />
        @error("name") {{ $message }} @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="description">Description</label>
        </div>
        <textarea
          class="h-32 w-full resize-none border border-gray-950 p-2"
          type="text"
          name="description"
        >
        {{ old('description', $product->description)}}"
    </textarea
        >
        @error("description")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="price">Prix</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="price"
          step="0.01"
          value="{{ old('price', $product->price)}}"
        />
        @error("price")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="image">Image</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="image"
          value="{{old('image',$product->image)}}"
        />
        @error("image")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="published">Status</label>
        </div>
        <select class="w-full border border-gray-950 p-2" name="published">
          <option value="{{old('published',$product->published)}}">
            {{old('published',$product->published)}}
          </option>
          @foreach ($published as $p ) @if ($p === $product->published)
          @continue @endif
          <option value="{{$p}}">{{$p}}</option>
          @endforeach
        </select>
        @error("published")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="state">Etat</label>
        </div>
        <select class="w-full border border-gray-950 p-2" name="state">
          <option value="{{old('state',$product->state)}}">
            {{old('state',$product->state)}}
          </option>
          @foreach ($state as $s ) @if ($s === $product->state) @continue @endif
          <option value="{{$s}}">{{$s}}</option>
          @endforeach
        </select>
        @error("state")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="reference">Référence</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="reference"
          value="{{old('reference', $product->reference)}}"
        />
        @error("reference")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="categories_id">Catégorie</label>
        </div>
        <select class="w-full border border-gray-950 p-2" name="categories_id">
          <option value="{{old('categories_id',$product->categories->id)}}">
            {{old('categories_id',$product->categories->name)}}
          </option>
          @if ($categories) @foreach ($categories as $c ) @if ($c->name ===
          $product->categories->name ) @continue @endif
          <option value="{{$c->id}}">{{$c->name}}</option>
          @endforeach @endif
        </select>
        @error("categories_id")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <p>Tailles</p>
          @error("sizes") {{ $message }} @enderror
        </div>
        @foreach ($product->sizes as $s )
        <div class="flex items-center justify-center gap-5">
          <label for="{{ $s->sizes }}">{{ $s->sizes }}</label>
          <input
            class="my-3 border border-gray-950 p-2"
            name="sizes[{{$s->sizes}}]"
            type="checkbox"
            checked
            value="{{ $s->sizes }}"
          />
        </div>
        @error("sizes.".$s)
        <span class="text-red-500"> {{ $message }}</span>
        @enderror @endforeach @foreach ($sizes as $s )
        <div class="flex items-center justify-center gap-5">
          <label for="{{ $s }}">{{ $s }}</label>
          <input
            class="my-3 border border-gray-950 p-2"
            name="sizes[{{ $s }}]"
            type="checkbox"
            value="{{ $s }}"
          />
        </div>
        @endforeach
      </div>
      <div class="text-center">
        <button class="w-20 rounded-md border border-gray-900 p-2">
          Modifier
        </button>
      </div>
    </form>
  </div>
</div>
@endsection