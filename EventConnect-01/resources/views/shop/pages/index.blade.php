@extends('shop.layout.base')
@section('title', 'Pagina inicial')

@Section('content')
<body>
   

    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-purple-500 rounded-bl-full" style="opacity: 0.2;"></div>
        <div class="absolute bottom-0 left-0 w-1/3 h-full bg-cyan-400 rounded-tr-full" style="opacity: 0.2;"></div>
        
        <div class="container py-20 mt-5">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 mt-5">Encontre e Reserve Salões de Eventos Perfeitos</h1>
                    <p class="text-lg text-gray-600 mb-8">Gerencie todos os seus eventos, desde casamentos até conferências corporativas, em uma única plataforma intuitiva</p>
                    <div class="flex flex-col md:flex-row gap-4">
                        <a href="#" class="btn-primary px-8 py-3 rounded-lg text-white text-center">Começar Agora</a>
                        <a href="#" class="px-8 py-3 rounded-lg border border-gray-300 text-gray-700 hover:border-purple-500 hover:text-purple-500 text-center" style="transition: all 0.3s ease;">Ver Demonstração</a>
                    </div>
                    <div class="mt-6 flex items-center">
                        <div class="avatar-group">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Ccircle cx='20' cy='20' r='20' fill='%23E4E4E7'/%3E%3Cpath d='M20 10 A10 10 0 0 1 20 30 A10 10 0 0 1 20 10' fill='%23A1A1AA'/%3E%3Ccircle cx='20' cy='16' r='6' fill='%23A1A1AA'/%3E%3C/svg%3E" alt="User" class="w-10 h-10 rounded-full">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Ccircle cx='20' cy='20' r='20' fill='%23DBEAFE'/%3E%3Cpath d='M20 10 A10 10 0 0 1 20 30 A10 10 0 0 1 20 10' fill='%2393C5FD'/%3E%3Ccircle cx='20' cy='16' r='6' fill='%2393C5FD'/%3E%3C/svg%3E" alt="User" class="w-10 h-10 rounded-full">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Ccircle cx='20' cy='20' r='20' fill='%23FCE7F3'/%3E%3Cpath d='M20 10 A10 10 0 0 1 20 30 A10 10 0 0 1 20 10' fill='%23F9A8D4'/%3E%3Ccircle cx='20' cy='16' r='6' fill='%23F9A8D4'/%3E%3C/svg%3E" alt="User" class="w-10 h-10 rounded-full">
                        </div>
                        <p class="ml-4 text-gray-600">Mais de <span class="font-semibold text-purple-500">2.000</span> eventos realizados este mês</p>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-20 h-20 bg-yellow-300 rounded-full" style="opacity: 0.5;"></div>
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-cyan-400 rounded-full" style="opacity: 0.5;"></div>
                          
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 py-16">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Tudo que você precisa para gerenciar seus eventos</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nossa plataforma simplifica todo o processo de busca, reserva e gerenciamento de salões de eventos.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3" style="gap: 2rem;">
                <!-- Feature 1 -->
                <div class="feature-card bg-white rounded-lg p-6 shadow-md" style="transition: all 0.3s ease;">
                    <div class="w-14 h-14 rounded-full bg-cyan-100 flex items-center justify-center mb-4" style="display: flex; align-items: center; justify-content: center;">
                        <span class="fas fa-search text-cyan-500 text-2xl"></span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Busca Inteligente</h3>
                    <p class="text-gray-600">Encontre o salão perfeito filtrando por localização, capacidade, preço e muito mais.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white rounded-lg p-6 shadow-md" style="transition: all 0.3s ease;">
                    <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center mb-4" style="display: flex; align-items: center; justify-content: center;">
                        <span class="fas fa-calendar-check text-purple-500 text-2xl"></span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Agendamento Simplificado</h3>
                    <p class="text-gray-600">Veja a disponibilidade em tempo real e faça sua reserva em apenas alguns cliques.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-white rounded-lg p-6 shadow-md" style="transition: all 0.3s ease;">
                    <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center mb-4" style="display: flex; align-items: center; justify-content: center;">
                        <span class="fas fa-star text-yellow-500 text-2xl"></span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Avaliações Verificadas</h3>
                    <p class="text-gray-600">Leia avaliações de pessoas reais que utilizaram os espaços anteriormente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Como Funciona</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Agendar seu salão de eventos nunca foi tão fácil.</p>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-4" style="gap: 2rem;">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl" style="display: flex; align-items: center; justify-content: center;">1</div>
                    <h3 class="text-xl font-semibold mb-2">Busque</h3>
                    <p class="text-gray-600">Encontre o espaço ideal para seu evento usando nossos filtros avançados.</p>
                </div>
    
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl" style="display: flex; align-items: center; justify-content: center;">2</div>
                    <h3 class="text-xl font-semibold mb-2">Compare</h3>
                    <p class="text-gray-600">Analise preços, fotos, avaliações e recursos disponíveis.</p>
                </div>
    
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl" style="display: flex; align-items: center; justify-content: center;">3</div>
                    <h3 class="text-xl font-semibold mb-2">Reserve</h3>
                    <p class="text-gray-600">Escolha a melhor opção e faça sua reserva de forma rápida e segura.</p>
                </div>
    
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl" style="display: flex; align-items: center; justify-content: center;">4</div>
                    <h3 class="text-xl font-semibold mb-2">Aproveite</h3>
                    <p class="text-gray-600">Curta seu evento sem preocupações o espaço perfeito já é seu!</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">O que nossos clientes dizem</h2>
                <p class="section-subtitle">Experiências compartilhadas por organizadores que confiam em nós</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar"></div>
                        <div>
                            <h4 class="testimonial-name">Maria Silva</h4>
                            <div class="testimonial-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="testimonial-text">"Encontrei o local perfeito para meu casamento em apenas um dia! O processo de reserva foi incrivelmente fácil e o suporte foi excelente."</p>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar"></div>
                        <div>
                            <h4 class="testimonial-name">Carlos Mendes</h4>
                            <div class="testimonial-stars">★★★★☆</div>
                        </div>
                    </div>
                    <p class="testimonial-text">"Como organizador de eventos corporativos, esta plataforma se tornou minha ferramenta essencial. Economizo tempo e encontro sempre as melhores opções."</p>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar"></div>
                        <div>
                            <h4 class="testimonial-name">Ana Ferreira</h4>
                            <div class="testimonial-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="testimonial-text">"A flexibilidade para mudanças de última hora me salvou! O atendimento ao cliente é incrível e a plataforma é super intuitiva."</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cta">
        <div class="container">
            <div class="cta-box">
                <div class="cta-decoration cta-circle-1"></div>
                <div class="cta-decoration cta-circle-2"></div>
                
                <h2 class="cta-title">Pronto para começar seu evento?</h2>
                <p class="cta-text">Junte-se a milhares de organizadores que já confiam no EventConnect para encontrar os melhores espaços para seus eventos.</p>
                
                <div class="cta-buttons">
                    <a href="#" class="btn btn-white">Criar Conta Gratuita</a>
                    <a href="#" class="btn btn-outline-white">Ver Espaços</a>
                </div>
            </div>
        </div>
    </section>

   
</body>             
@endsection
