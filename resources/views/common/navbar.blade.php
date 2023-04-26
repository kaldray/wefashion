<nav class="fixed top-0 mb-5 w-full bg-black">
  <section
    class="mx-auto flex max-w-2xl flex-row flex-wrap justify-between gap-5 p-5"
  >
    <div>
      <a class="text-logo" href="{{ route('index')}} ">WeFashion</a>
    </div>
    <div class="hamburger space-y-2 sm:hidden">
      <div class="h-0.5 w-8 bg-white"></div>
      <div class="h-0.5 w-8 bg-white"></div>
      <div class="h-0.5 w-8 bg-white"></div>
    </div>
    <div
      class="nav-menu group-[]: hidden basis-full flex-col items-center justify-center gap-5 text-white sm:block sm:basis-auto"
    >
      <a href="">Soldes</a>
      <a href="{{route('show','homme')}}">Homme</a>
      <a href="{{route('show','femme')}}">Femme</a>
    </div>
  </section>
</nav>