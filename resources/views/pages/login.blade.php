@extends("base") @section("main")
<div class="mx-auto mt-10 flex w-4/5 flex-col justify-center">
  <div class="my-5">
    <h1 class="text-center">Se connecter</h1>
  </div>
  <form
    class="flex flex-wrap gap-5"
    action="{{route('login.store')}}"
    method="post"
  >
    @csrf
    <input
      class="flex-shrink-0 flex-grow basis-40 border border-gray-950"
      type="mail"
      name="email"
      placeholder="exemple@exemple.com"
      value="{{ old('email') }}"
    />
    <input
      class="flex-shrink-0 flex-grow basis-40 border border-gray-950"
      type="password"
      name="password"
      placeholder="admin"
    />
    <button
      type="submit"
      class="basis-30 flex-shrink-0 flex-grow rounded-xl bg-black p-3 text-white"
    >
      Se connecter
    </button>
  </form>
</div>
@endsection