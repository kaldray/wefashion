<footer class="bg-slate-300">
  <section
    class="flex flex-col items-center justify-center gap-10 p-3 sm:flex-row"
  >
    <div class="flex flex-col gap-3 text-center">
      <h5>Informations</h5>
      <a href="">Mentions légales</a>
      <a href="">Presse</a>
      <a href="">Fabricaation</a>
    </div>
    <div class="flex flex-col gap-3 text-center">
      <h5>Services client</h5>
      <a href="">Contacter-nous</a>
      <a href="">Livrasion & retour</a>
      <a href="">Condition de ventes</a>
    </div>
    <div class="flex flex-col gap-3 text-center">
      <h5>Réseaux sociaux</h5>
      <a href="">Inscrivez vous à la newsletter</a>
      <div class="flex flex-row justify-center gap-5">
        <a href="">
          <img src="{{ Vite::asset('resources/images/instagram.svg') }}" />
        </a>
        <a href="">
          <img
            width="25"
            height="25"
            src="{{ Vite::asset('resources/images/facebook.png') }}"
          />
        </a>
      </div>
    </div>
  </section>
</footer>