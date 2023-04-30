@extends("base") @section("main")
<div class="mx-auto mt-10 w-4/5">
  <div class="mx-auto w-2/4 py-5 text-center">
    <h1 class="text-lg">Ajout d'un produit</h1>
  </div>
  <div class="flex justify-center">
    <form
      method="post"
      class="flex w-4/5 max-w-md flex-col gap-5"
      action="{{ route('admin.store') }}"
      enctype="multipart/form-data"
    >
      @csrf
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="image">Image</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="file"
          name="image"
        />
        @error('image') {{ $message }} @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="name">Name</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="name"
          value="{{ old('name')}}"
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
        {{ old('description')}}
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
          value="{{ old('price')}}"
        />
        @error("price")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>

      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="published">Status</label>
        </div>
        <select class="w-full border border-gray-950 p-2" name="published">
          <option value="{{old('published')}}">{{old('published')}}</option>
          @foreach ($published as $p )
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
          <option value="{{old('state')}}">{{old('state')}}</option>
          @foreach ($state as $s )
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
          readonly
          value="{{old('reference', Str::random(16) )}}"
        />
        @error("reference")
        <span class="text-red-500"> {{ $message }}</span> @enderror
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="categories_id">Catégorie</label>
        </div>
        <select class="w-full border border-gray-950 p-2" name="categories_id">
          <option value="{{old('categories_id')}}">
            {{old('categories_id')}}
          </option>
          @if ($categories) @foreach ($categories as $c )
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
        @foreach ($sizes as $s )
        <div class="flex items-center justify-center gap-5">
          <label for="{{ $s }}">{{ $s }}</label>
          <input
            class="my-3 border border-gray-950 p-2"
            name="sizes[{{$s}}]"
            type="checkbox"
            value="{{ $s }}"
          />
        </div>
        @error("sizes.".$s)
        <span class="text-red-500"> {{ $message }}</span> @enderror @endforeach
      </div>
      <div class="text-center">
        <button class="w-20 rounded-md border border-gray-900 p-2">
          Ajouter
        </button>
      </div>
    </form>
  </div>
</div>
@endsection