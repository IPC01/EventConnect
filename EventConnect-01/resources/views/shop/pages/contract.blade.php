 @extends('shop.layout.base')
@section('title', 'Contate-nos')

@section('content')
 <style>
     
    
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
            line-height: 1.6;
            color: #333;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h2 {
            color: #667eea;
            font-size: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section h3 {
            color: #764ba2;
            font-size: 16px;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }

        .highlight .percentage {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }

        .terms-list {
            list-style: none;
            margin: 15px 0;
        }

        .terms-list li {
            margin: 10px 0;
            padding-left: 25px;
            position: relative;
        }

        .terms-list li:before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: #667eea;
            position: absolute;
            left: 0;
            top: 0;
        }

        .warning-box {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .warning-box i {
            color: #856404;
            margin-top: 2px;
        }

        .signature-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 12px;
            margin-top: 30px;
            border: 2px dashed #667eea;
        }

        .form-group {
            margin: 20px 0;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 25px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 2px solid #e1e5e9;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
            margin-top: 2px;
        }

        .checkbox-group label {
            flex: 1;
            font-size: 14px;
            color: #333;
            cursor: pointer;
        }

        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }

            .content {
                padding: 20px;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
                flex-direction: column;
                gap: 10px;
            }

            .btn-container {
                flex-direction: column;
            }
        }
    </style>
<body>
    <div class="container">
        <div class="header">
            <h1>
                <i class="fas fa-handshake"></i>
                CONTRATO DE COLABORADOR
            </h1>
            <p>EventConnect - Plataforma de Gestão de Eventos</p>
        </div>

        <div class="content">
            <div class="section">
                <h2><i class="fas fa-info-circle"></i> Informações Gerais</h2>
                <p>Este contrato estabelece os termos e condições para a colaboração entre o prestador de serviços e a plataforma EventConnect, definindo direitos, obrigações e condições comerciais para a prestação de serviços de eventos.</p>
            </div>

            <div class="highlight">
                <i class="fas fa-percentage" style="font-size: 20px;"></i>
                <div class="percentage">Taxa de Comissão: {{ $settings->pct_payment ?? '15' }}%</div>
                <p>Percentagem aplicada sobre o valor total de cada reserva</p>
            </div>

            <div class="section">
                <h2><i class="fas fa-clipboard-list"></i> Termos e Condições</h2>
                
                <h3>1. Objeto do Contrato</h3>
                <p>O presente contrato tem por objeto estabelecer a parceria comercial entre o Colaborador e a plataforma EventConnect para prestação de serviços relacionados a eventos.</p>

                <h3>2. Obrigações do Colaborador</h3>
                <ul class="terms-list">
                    <li>Prestar serviços de qualidade conforme acordado com os clientes</li>
                    <li>Manter informações atualizadas na plataforma</li>
                    <li>Cumprir prazos e especificações acordadas</li>
                    <li>Tratar clientes com profissionalismo e cortesia</li>
                    <li>Informar indisponibilidades com antecedência</li>
                </ul>

                <h3>3. Comissão da Plataforma</h3>
                <p><strong>O Colaborador aceita expressamente que será descontada uma comissão de {{ $settings->pct_payment ?? '15' }}% ({{ $settings->pct_payment ?? 'quinze' }} por cento) sobre o valor total de cada reserva realizada através da plataforma EventConnect.</strong></p>
                
                <ul class="terms-list">
                    <li>O desconto será aplicado automaticamente no momento do pagamento</li>
                    <li>A percentagem atual é definida pelo proprietário da plataforma</li>
                    <li>O Colaborador receberá o valor líquido após dedução da comissão</li>
                    <li>A comissão cobre os custos operacionais e de marketing da plataforma</li>
                </ul>

                <h3>4. Pagamentos</h3>
                <ul class="terms-list">
                    <li>Pagamentos serão processados conforme cronograma da plataforma</li>
                    <li>Valores serão transferidos após confirmação do serviço prestado</li>
                    <li>Colaborador deve manter dados bancários atualizados</li>
                </ul>

                <h3>5. Cancelamentos e Alterações</h3>
                <ul class="terms-list">
                    <li>Cancelamentos devem seguir a política estabelecida</li>
                    <li>Alterações de último momento podem gerar penalidades</li>
                    <li>Reagendamentos devem ser acordados entre as partes</li>
                </ul>

                <h3>6. Responsabilidades</h3>
                <ul class="terms-list">
                    <li>Colaborador é responsável pela qualidade dos serviços prestados</li>
                    <li>Plataforma facilita o contato mas não se responsabiliza por conflitos</li>
                    <li>Ambas as partes devem agir com boa-fé</li>
                </ul>
            </div>

            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <strong>Importante:</strong> Ao aceitar este contrato, você está concordando com o desconto automático da comissão de {{ $settings->pct_payment ?? '15' }}% sobre todas as reservas. Esta percentagem pode ser alterada pelo proprietário da plataforma mediante notificação prévia.
                </div>
            </div>

            <div class="signature-section">
                <h2><i class="fas fa-signature"></i> Dados do Colaborador</h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label for="nome_completo">Nome Completo:</label>
                        <input type="text" id="nome_completo" name="nome_completo" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="documento">CPF/CNPJ:</label>
                        <input type="text" id="documento" name="documento" class="form-input" required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço Completo:</label>
                    <input type="text" id="endereco" name="endereco" class="form-input" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="aceito_termos" name="aceito_termos" required>
                    <label for="aceito_termos">
                        <strong>Eu li, compreendi e aceito todos os termos e condições deste contrato, incluindo o desconto da comissão de {{ $settings->pct_payment ?? '15' }}% sobre todas as reservas realizadas através da plataforma EventConnect.</strong>
                    </label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="aceito_politica" name="aceito_politica" required>
                    <label for="aceito_politica">
                        Aceito a política de privacidade e tratamento de dados da plataforma EventConnect.
                    </label>
                </div>

                <div class="btn-container">
                    <button type="button" class="btn btn-secondary" onclick="cancelarContrato()">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" id="btnAssinar" onclick="assinarContrato()" disabled>
                        <i class="fas fa-pen-nib"></i>
                        Assinar Contrato
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Validação em tempo real
        function validateForm() {
            const nome = document.getElementById('nome_completo').value;
            const documento = document.getElementById('documento').value;
            const email = document.getElementById('email').value;
            const telefone = document.getElementById('telefone').value;
            const endereco = document.getElementById('endereco').value;
            const aceitoTermos = document.getElementById('aceito_termos').checked;
            const aceitoPolitica = document.getElementById('aceito_politica').checked;

            const isValid = nome && documento && email && telefone && endereco && aceitoTermos && aceitoPolitica;
            
            document.getElementById('btnAssinar').disabled = !isValid;
        }

        // Adicionar listeners para validação
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', validateForm);
                input.addEventListener('change', validateForm);
            });
        });

        function cancelarContrato() {
            if (confirm('Tem certeza que deseja cancelar? Todas as informações preenchidas serão perdidas.')) {
                // Redirecionar ou limpar formulário
                document.querySelector('form')?.reset();
                window.history.back();
            }
        }

        function assinarContrato() {
            if (confirm('Confirma a assinatura do contrato? Esta ação não pode ser desfeita.')) {
                // Aqui você pode enviar os dados para o servidor
                alert('Contrato assinado com sucesso! Bem-vindo à equipe EventConnect!');
                
                // Simulação de envio (substitua pela lógica real)
                const formData = {
                    nome_completo: document.getElementById('nome_completo').value,
                    documento: document.getElementById('documento').value,
                    email: document.getElementById('email').value,
                    telefone: document.getElementById('telefone').value,
                    endereco: document.getElementById('endereco').value,
                    aceito_termos: document.getElementById('aceito_termos').checked,
                    aceito_politica: document.getElementById('aceito_politica').checked,
                    data_assinatura: new Date().toISOString()
                };
                
                console.log('Dados do contrato:', formData);
                
                // Redirecionar para dashboard do colaborador
                // window.location.href = '/collaborator/dashboard';
            }
        }

        // Máscara para CPF/CNPJ
        document.getElementById('documento').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length <= 11) {
                // CPF: 000.000.000-00
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            } else {
                // CNPJ: 00.000.000/0000-00
                value = value.replace(/(\d{2})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1/$2');
                value = value.replace(/(\d{4})(\d{1,2})$/, '$1-$2');
            }
            
            e.target.value = value;
        });

        // Máscara para telefone
        document.getElementById('telefone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length <= 10) {
                // Telefone fixo: (00) 0000-0000
                value = value.replace(/(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                // Celular: (00) 00000-0000
                value = value.replace(/(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }
            
            e.target.value = value;
        });
    </script>
</body>
@endsection