@extends("base") @section("main")

<div class="mx-auto mt-10 min-h-screen w-5/6 max-w-screen-xl">
  <div class="mx-auto w-2/4 py-5 text-center">
    @if (session("succes"))
    <p class="bg-logo p-2 text-white">{{ session("succes") }}</p>
    @endif
  </div>
  <div class="mt-3 text-left">
    <a
      class="rounded-md bg-black p-2 text-white"
      href="{{route('categories.create')}}"
      >Nouvelle Catégories</a
    >
  </div>
  @if (count($categories) === 0)
  <p class="mt-10 text-center">Aucune catégorie</p>
  @else
  <div class="mb-10 mt-10 flex flex-col pb-10">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th class="border border-slate-600 p-4">Id</th>
                <th class="border border-slate-600 p-4">Nom de la catégoris</th>
                <th class="border border-slate-600 p-4">Editer</th>
                <th class="border border-slate-600 p-4">Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @if ($categories) @foreach ($categories as $c )
              <tr class="border-b dark:border-neutral-500">
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $c->id }}
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $c->name }}
                </td>

                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  <a
                    class="rounded-md bg-yellow-500 p-2"
                    href="{{route('categories.edit',['category'=> $c->id])}}"
                    >Modifier</a
                  >
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  <form
                    method="post"
                    class="delete"
                    action="{{route('categories.destroy',['category'=> $c])}}"
                  >
                    @csrf @method("DELETE")
                    <button type="submit" class="rounded-md bg-red-500 p-2">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
<section class="mx-auto my-10 w-full max-w-xs">
  {{ $categories->links() }}
</section>
@endsection

