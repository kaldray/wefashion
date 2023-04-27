@extends("base") @section("main")

<div class="mx-auto w-5/6 max-w-screen-xl">
  <div class="mb-10 mt-10 flex flex-col pb-10">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th class="border border-slate-600 p-4">Id</th>
                <th class="border border-slate-600 p-4">Nom</th>
                <th class="border border-slate-600 p-4">Catégorie</th>
                <th class="border border-slate-600 p-4">Prix</th>
                <th class="border border-slate-600 p-4">Etat</th>
                <th class="border border-slate-600 p-4">Editer</th>
                <th class="border border-slate-600 p-4">Supprimer</th>
              </tr>
            </thead>
            <tbody>
              @if ($products) @foreach ($products as $p )
              <tr class="border-b dark:border-neutral-500">
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $p->id }}
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $p->name }}
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $p->categories->name }}
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $p->price }}€
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  {{ $p->state }}
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  <a
                    class="rounded-md bg-yellow-500 p-2"
                    href="{{route('admin.edit',['product'=> $p->id])}}"
                    >Modifier</a
                  >
                </td>
                <td
                  class="whitespace-nowrap border border-slate-600 px-6 py-4 font-medium"
                >
                  <a class="rounded-md bg-red-500 p-2" href="">Supprimer</a>
                </td>
              </tr>
              @endforeach @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div>@include("components.pagination")</div>
@endsection

