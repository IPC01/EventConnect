<!-- resources/views/components/footer.blade.php -->

<footer class="bg-gray-900 text-gray-300">
  <!-- Seção Principal -->
  <div class="container mx-auto px-6 py-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Coluna 1: Logo e Informações -->
          <div>
              <div class="mb-6">
                  <a href="{{ route('dashboard') }}" class="flex items-center">
                      <span class="text-amber-500 font-serif text-3xl font-bold">Elegance</span>
                      <span class="text-white font-serif ml-1 text-xl">Events</span>
                  </a>
              </div>
              <p class="mb-6">Transformamos momentos em memórias inesquecíveis. Nossa equipe de profissionais dedicados está pronta para tornar seu evento especial e único.</p>
              <div class="flex space-x-4">
                  <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                      <span class="sr-only">Facebook</span>
                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                      </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                      <span class="sr-only">Instagram</span>
                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                      </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                      <span class="sr-only">YouTube</span>
                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                      </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                      <span class="sr-only">WhatsApp</span>
                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                          <path fill-rule="evenodd" d="M17.498 14.382c-.301-.15-1.767-.867-2.04-.966-.273-.101-.473-.15-.673.15-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.174-.3-.019-.465.13-.615.136-.135.301-.345.451-.523.146-.181.194-.301.297-.496.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.172-.015-.371-.015-.571-.015s-.523.074-.796.359c-.273.3-1.045 1.02-1.045 2.475s1.07 2.865 1.219 3.075c.149.18 2.095 3.195 5.076 4.485.709.3 1.263.48 1.694.629.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z" clip-rule="evenodd"></path>
                          <path fill-rule="evenodd" d="M12 1.5c-5.799 0-10.5 4.701-10.5 10.5S6.201 22.5 12 22.5c5.799 0 10.5-4.701 10.5-10.5S17.799 1.5 12 1.5zM5.478 19.452c-.231-.345-1.426-2.016-1.426-4.575 0-2.559 1.32-4.665 1.5-4.95.45-.705 1.575-1.05 2.55-1.126.925-.075 1.8-.045 2.175.255.375.301.825.915.825 1.44 0 .525-.375 1.05-.6 1.426-.211.339-.399.685-.6.87-.45.42-.75.495-.75 1.035s.75.975 1.05 1.2c.3.226 1.575 2.4 3.975 3.27.825.301 1.426.3 1.95.256.525-.045 1.65-.675 1.875-1.351.225-.675.225-1.26.15-1.351-.075-.09-.25-.149-.524-.269-.28-.12-1.64-.81-1.875-.915-.236-.106-.458-.136-.67.105-.21.24-.809.9-.994 1.109-.181.195-.375.225-.675.075-.3-.149-1.275-.465-2.43-1.485-.9-.81-1.5-1.8-1.676-2.104-.165-.301-.015-.465.127-.615.12-.136.285-.356.435-.534.15-.18.201-.301.3-.495.099-.21.05-.39-.026-.54-.074-.149-.675-1.62-.93-2.22l-.002-.005c-.24-.585-.487-.51-.675-.51-.172 0-.367-.015-.564-.015z" clip-rule="evenodd"></path>
                      </svg>
                  </a>
              </div>
          </div>
          
          <!-- Coluna 2: Links Rápidos -->
          <div>
              <h3 class="text-white text-lg font-bold mb-6">Links Rápidos</h3>
              <ul class="space-y-3">
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Home</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Sobre Nós</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Nossos Serviços</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Promoções</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Galeria</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Blog</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Contato</a></li>
              </ul>
          </div>
          
          <!-- Coluna 3: Serviços -->
          <div>
              <h3 class="text-white text-lg font-bold mb-6">Nossos Serviços</h3>
              <ul class="space-y-3">
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Casamentos</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Festas de Aniversário</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Eventos Corporativos</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Decoração</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Gastronomia</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Aluguel de Espaços</a></li>
                  <li><a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-amber-500 transition duration-300">Sonorização e Iluminação</a></li>
              </ul>
          </div>
          
          <!-- Coluna 4: Contato -->
          <div>
              <h3 class="text-white text-lg font-bold mb-6">Contato</h3>
              <ul class="space-y-4">
                  <li class="flex items-start">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <span>Av. Paulista, 1000<br>São Paulo, SP</span>
                  </li>
                  <li class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                      <span>(11) 5555-5555</span>
                  </li>
                  <li class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      <span>contato@eleganceevents.com</span>
                  </li>
                  <li class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span>Seg-Sex: 9h às 18h<br>Sáb: 10h às 14h</span>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  
  <!-- Newsletter -->
  {{-- <div class="bg-gray-800 py-8">
      <div class="container mx-auto px-6">
          <div class="flex flex-col md:flex-row justify-between items-center">
              <div class="mb-6 md:mb-0">
                  <h4 class="text-white text-lg font-bold mb-2">Assine nossa Newsletter</h4>
                  <p class="text-gray-400">Receba nossas promoções e novidades exclusivas.</p>
              </div>
              <div class="w-full md:w-1/2 lg:w-2/5">
                  <form class="flex flex-col sm:flex-row gap-3">
                      <input type="email" class="px-4 py-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-500 flex-grow" placeholder="Seu e-mail">
                      <button type="submit" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition duration-300">Assinar</button>
                  </form>
              </div>
          </div>
      </div>
  </div> --}}
  
  <!-- Copyright -->
  <div class="bg-black py-6">
      <div class="container mx-auto px-6">
          <div class="flex flex-col md:flex-row justify-between items-center">
              <div class="mb-4 md:mb-0">
                  <p class="text-gray-500">&copy; {{ date('Y') }} Elegance Events. Todos os direitos reservados.</p>
              </div>
              <div>
                  <ul class="flex space-x-6">
                      <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-amber-500 transition duration-300">Política de Privacidade</a></li>
                      <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-amber-500 transition duration-300">Termos de Uso</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</footer>