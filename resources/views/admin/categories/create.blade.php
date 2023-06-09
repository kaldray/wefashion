@extends("base") @section("main")
<div class="mx-auto mt-10 min-h-screen w-4/5">
  <div class="my-10 text-center">
    <h1 class="text-lg">Ajout d'une catégorie</h1>
  </div>
  <div class="flex justify-center">
    <form
      method="post"
      class="flex w-4/5 max-w-md flex-col gap-5"
      action="{{ route('categories.store') }}"
    >
      @csrf
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
      <div class="text-center">
        <button class="w-20 rounded-md border border-gray-900 p-2">
          Créer
        </button>
      </div>
    </form>
  </div>
</div>
@endsection