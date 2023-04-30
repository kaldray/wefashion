@extends("base") @section("main")
<div class="mx-auto mt-10 w-4/5">
  <div class="mx-auto w-2/4 py-5 text-center">
    <h1 class="text-lg">Modification d'une catégorie</h1>
  </div>
  <div class="flex justify-center">
    <form
      method="post"
      class="flex w-4/5 max-w-md flex-col gap-5"
      action="{{ route('categories.update', ['category'=> $categories ] ) }}"
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
          value="{{ old('name', $categories->name)}}"
        />
        @error("name") {{ $message }} @enderror
      </div>
      <div class="text-center">
        <button class="w-20 rounded-md border border-gray-900 p-2">
          Modier
        </button>
      </div>
    </form>
  </div>
</div>
@endsection