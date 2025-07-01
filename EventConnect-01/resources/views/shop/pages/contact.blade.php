@extends('shop.layout.base')
@section('title', 'Contate-nos')

@section('content')

<body>
    <div class="container">
        <div class="contact-section">
            <!-- Cabeçalho da página -->
           
            <div class="contact-content">
                <!-- Informações de Contato -->
                <div class="contact-info-section">
                    
                    <div class="contact-cards">
                        <div class="faq-card">
                           
                            <div class="contact-details">
                                <h3>Telefone</h3>
                                <p>+258 84 123 4567</p>
                                <p>+258 87 987 6543</p>
                            </div>
                        </div>

                        <div class="faq-card">
                          
                            <div class="contact-details">
                                <h3>Email</h3>
                                <p>eventConnect.gmail.com</p>
                            </div>
                        </div>

                      

                        <div class="faq-card">
                         
                            <div class="contact-details">
                                <h3>Horário de Funcionamento</h3>
                                <p>Segunda - Sexta: 8h às 18h</p>
                                <p>Sábado: 8h às 14h</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulário de Contato -->
                <div class="contact-form-section">
                    <h2><i class="fas fa-paper-plane"></i> Envie sua Mensagem</h2>
                    
                    <form action="{{ route('contacts.store') }}" method="POST" class="contact-form" id="contactForm">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">
                                    <i class="fas fa-envelope"></i>
                                    Email *
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-input @error('email') error @enderror" 
                                    value="{{ old('email') }}"
                                    placeholder="seu@email.com"
                                    required
                                >
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">
                                    <i class="fas fa-phone"></i>
                                    Telefone *
                                </label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    class="form-input @error('phone') error @enderror" 
                                    value="{{ old('phone') }}"
                                    placeholder="+258 84 123 4567"
                                    required
                                >
                                @error('phone')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="message">
                                    <i class="fas fa-comment"></i>
                                    Mensagem *
                                </label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    rows="6" 
                                    class="form-input @error('message') error @enderror"
                                    placeholder="Descreva sua necessidade, dúvida ou solicite um orçamento..."
                                    required
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="reset" class="btn-secondary">
                                <i class="fas fa-eraser"></i>
                                Limpar
                            </button>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-paper-plane"></i>
                                Enviar Mensagem
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Seção de FAQ -->
                <div class="faq-section">
                    <h2><i class="fas fa-question-circle"></i> Perguntas Frequentes</h2>
                    
                    <div class="faq-grid">
                        <div class="faq-card">
                            <h3>Como solicitar um orçamento?</h3>
                            <p>Você pode solicitar um orçamento através do formulário acima ou ligando diretamente para nossos telefones.</p>
                        </div>

                        <div class="faq-card">
                            <h3>Qual o prazo de resposta?</h3>
                            <p>Respondemos todas as mensagens em até 24 horas durante dias úteis.</p>
                        </div>

                        <div class="faq-card">
                            <h3>Fazem eventos em outras cidades?</h3>
                            <p>Sim! Atendemos em todo Moçambique. Entre em contato para mais informações.</p>
                        </div>

                        <div class="faq-card">
                            <h3>Como agendar uma reunião?</h3>
                            <p>Entre em contato conosco por telefone ou email para agendar uma reunião presencial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-section {
            padding: 2rem 0;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .contact-content {
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        /* Seção de Informações de Contato */
        .contact-info-section h2,
        .contact-form-section h2,
        .faq-section h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .contact-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .contact-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .contact-details h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: #666;
            margin-bottom: 0.3rem;
        }

        /* Formulário de Contato */
        .contact-form-section {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .contact-form {
            max-width: none;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
        }

        .form-group.full-width {
            flex: 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-input.error {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

        .form-footer {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-secondary,
        .btn-primary {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        /* Seção de FAQ */
        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .faq-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #667eea;
        }

        .faq-card h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .faq-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }

            .contact-cards {
                grid-template-columns: 1fr;
            }

            .contact-card {
                padding: 1.5rem;
            }

            .contact-form-section {
                padding: 1.5rem;
            }

            .form-row {
                flex-direction: column;
                gap: 15px;
            }

            .form-footer {
                flex-direction: column;
            }

            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .contact-section {
                padding: 1rem 0;
            }

            .page-header h1 {
                font-size: 1.8rem;
            }

            .contact-card {
                flex-direction: column;
                text-align: center;
            }

            .contact-icon {
                align-self: center;
            }
        }
    </style>

    <script>
        // Validação do formulário
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;

            // Validação de email simples
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um email válido.');
                return;
            }

            // Validação de telefone simples
            const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
            if (!phoneRegex.test(phone)) {
                e.preventDefault();
                alert('Por favor, insira um telefone válido.');
                return;
            }

            // Validação de mensagem
            if (message.length < 10) {
                e.preventDefault();
                alert('A mensagem deve ter pelo menos 10 caracteres.');
                return;
            }
        });

        // Formatação automática do telefone
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                if (value.startsWith('258')) {
                    value = '+' + value;
                } else if (!value.startsWith('+')) {
                    value = '+258' + value;
                }
            }
            
            e.target.value = value;
        });

        // Contador de caracteres para a mensagem
        const messageTextarea = document.getElementById('message');
        const charCounter = document.createElement('div');
        charCounter.style.cssText = 'text-align: right; font-size: 12px; color: #666; margin-top: 5px;';
        messageTextarea.parentNode.appendChild(charCounter);

        messageTextarea.addEventListener('input', function() {
            const current = this.value.length;
            const max = 1000;
            charCounter.textContent = `${current}/${max} caracteres`;
            
            if (current > max) {
                this.value = this.value.substring(0, max);
                charCounter.textContent = `${max}/${max} caracteres`;
            }
        });

        // Trigger inicial do contador
        messageTextarea.dispatchEvent(new Event('input'));
    </script>

@endsection