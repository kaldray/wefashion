<nav class="fixed top-0 z-10 mb-5 w-full bg-black">
  <section
    class="mx-auto flex max-w-2xl flex-row flex-wrap justify-between gap-5 p-5"
  >
    <div>
      @guest
      <a class="text-logo" href="{{ route('home')}} ">WeFashion</a>
      @endguest @auth()
      <p class="text-logo">WeFashion</p>
      @endauth
    </div>
    <div class="hamburger space-y-2 sm:hidden">
      <div class="h-0.5 w-8 bg-white"></div>
      <div class="h-0.5 w-8 bg-white"></div>
      <div class="h-0.5 w-8 bg-white"></div>
    </div>
    <div
      class="nav-menu group-[]: hidden basis-full flex-col items-center justify-center gap-5 text-white sm:flex sm:basis-auto sm:flex-row"
    >
      @guest
      <a href="{{route('solde.index')}}">Soldes</a>
      <a href="{{route('home.category','homme')}}">Homme</a>
      <a href="{{route('home.category','femme')}}">Femme</a>
      @endguest @auth()
      <a href="{{route('admin.index')}}">Produits</a>
      <a href="{{route('categories.index')}}">Catégories</a>
      @if ( Route::is('admin.*') || Route::is('categories.*') )
      <a href="{{route('home')}}">Client</a>
      @endif
      <a href="{{route('auth.logout')}}">Déconnexion</a>
      @endauth
    </div>
  </section>
</nav>