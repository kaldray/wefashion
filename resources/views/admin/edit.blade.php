@extends("base") @section("main")
<div class="mx-auto mt-10 w-4/5">
  <div class="my-5 text-center">
    <h1 class="text-lg">Modification d'un produit</h1>
  </div>
  <div class="flex justify-center">
    <form
      class="flex w-4/5 max-w-md flex-col gap-5"
      action="{{ route('admin.update',['product'=> $product->id] ) }}"
    >
      @method("PUT")
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
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="price">Prix</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="number"
          step="0.01"
          value="{{ old('price', $product->price)}}"
        />
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
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="published">Status</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="published"
          value="{{old('published',$product->published)}}"
        />
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="state">Etat</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="state"
          value="{{old('state',$product->state)}}"
        />
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
      </div>
      <div class="flex-shrink-0 flex-grow">
        <div class="mb-5 text-center">
          <label for="categories_id">Catégorie</label>
        </div>
        <input
          class="w-full border border-gray-950 p-2"
          type="text"
          name="categories_id"
          value="{{old('categories_id',$product->categories->name)}}"
        />
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