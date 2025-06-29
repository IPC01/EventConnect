<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}@hasSection('title')
            - @yield('title')
        @endif
    </title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/dash.css') }}"> --}}

</head>
@include('shop.layout.navbar')
<!-- Conteúdo da Página -->
@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
        <strong>Ocorreu um erro:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
        <strong>Sucesso:</strong> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
        <strong>Erro:</strong> {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="mb-4 rounded-lg bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3">
        <strong>Aviso:</strong> {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="mb-4 rounded-lg bg-blue-100 border border-blue-400 text-blue-800 px-4 py-3">
        <strong>Informação:</strong> {{ session('info') }}
    </div>
@endif

@yield('content')
@include('shop.layout.footer')
@php
    $types = App\Models\eventType::all();
@endphp

<div id="scheduleModal" class="modal hidden">
    <div class="modal-content">

        <!-- Cabeçalho do Modal -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-800 p-4 flex justify-between items-center rounded-t-lg">
            <h2 class="text-white text-xl font-semibold">
                Pedido de Reserva: <span class="font-bold" id="schedule_package_name"></span>
                <span class="block text-sm" id="schedule_package_price"></span>
            </h2>
            <button onclick="closeScheduleModal()" class="text-white text-2xl leading-none">&times;</button>
        </div>




        <!-- Formulário -->
        <form action="{{ route('reservations.store') }}" method="POST" class="p-6 space-y-4" id="reservationForm">
            @csrf
            {{-- <input type="hidden" name="package_id" id="modalPackageId" value=""> --}}
            <input type="hidden" name="id_user" value="{{ auth()->id() }}">
            <input type="hidden" name="status" value="pending">
            <input type="hidden" name="budget" id="budget">

            <div>
                <label for="event_type_id" class="block text-gray-700 font-medium mb-1">Tipo de
                    Evento</label>
                <select name="id_event_type" id="event_type_id" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="nr_guests" class="block text-gray-700 font-medium mb-1">Número de
                    Convidados</label>
                <input type="number" name="nr_guests" id="nr_guests" min="1" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                    oninput="updateTotalAmount()">
            </div>

{{-- 
            <div>
                <label for="budget" class="block text-gray-700 font-medium mb-1">Orçamento
                    (MZN)</label>
                <input type="number" name="budget" id="budget" step="0.01" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div> --}}

            <div>
                <label for="event_start_date" class="block text-gray-700 font-medium mb-1">Data de
                    Início</label>
                <input type="date" name="event_start_date" id="event_start_date" onchange="updateTotalAmount()" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label for="event_end_date" class="block text-gray-700 font-medium mb-1">Data de
                    Fim</label>
                <input type="date" name="event_end_date" id="event_end_date" onchange="updateTotalAmount()" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            
            <div>
                <label for="total_amount" class="block text-gray-700 font-medium mb-1">Valor Total a
                    Pagar (MZN)</label>
                <input type="number" id="total_amount" name="total_amount" disabled
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" id="cancelBtn" onclick="closeScheduleModal()"
                    class="px-5 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition">
                    Enviar Pedido
                </button>
            </div>

            <input type="hidden" name="id_package" id="schedule_package_id">


        </form>
    </div>
</div>
<script>
    let packageTotalPrice = 0;

    function openScheduleModal(packageData) {
        packageTotalPrice = parseFloat(packageData.price ?? 0);

        const modal = document.getElementById('scheduleModal');

        // Preencher os dados no modal
        document.getElementById('schedule_package_name').innerText = packageData.name;
        document.getElementById('schedule_package_price').innerText =
            `Preço Total Por covidado: ${packageData.price} MZN`;
        document.getElementById('schedule_package_id').value = packageData.id;

        // Mostrar o modal
        modal.classList.remove('hidden');
    }

 function updateTotalAmount() {
        const nrGuests = parseInt(document.getElementById('nr_guests').value) || 0;

        const startDate = new Date(document.getElementById('event_start_date').value);
        const endDate = new Date(document.getElementById('event_end_date').value);

        if (isNaN(startDate) || isNaN(endDate) || endDate < startDate) {
            document.getElementById('total_amount').value = '';
            return;
        }

        const timeDiff = endDate.getTime() - startDate.getTime();
        const dayDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1; // incluir o dia final

        const total = nrGuests * packageTotalPrice * dayDiff;

        document.getElementById('total_amount').value = total.toFixed(2);
        document.getElementById('budget').value = total.toFixed(2);
    }

    function closeScheduleModal() {
        document.getElementById('scheduleModal').classList.add('hidden');
    }
</script>

<script>
    // Pega elementos
    const modal = document.getElementById('modalReserva');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    const packageNameSpan = document.getElementById('modalPackageName');
    const packageIdInput = document.getElementById('modalPackageId');
    const budgetInput = document.getElementById('budget');

    openBtn.addEventListener('click', () => {
        // Pega dados do pacote do botão
        const pkgId = openBtn.getAttribute('data-package-id');
        const pkgName = openBtn.getAttribute('data-package-name');
        const pkgPrice = openBtn.getAttribute('data-package-price');

        // Preenche modal
        packageNameSpan.textContent = pkgName;
        packageIdInput.value = pkgId;
        budgetInput.value = pkgPrice;

        // Mostra modal
        modal.style.display = 'flex';
    });

    function fecharModal() {
        modal.style.display = 'none';
    }

    closeBtn.addEventListener('click', fecharModal);
    cancelBtn.addEventListener('click', fecharModal);

    // Fechar com ESC
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            fecharModal();
        }
    });

    // Fechar clicando fora do conteúdo
    modal.addEventListener('click', (e) => {
        if (e.target === modal) fecharModal();
    });
</script>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if($errors->any())
        toastr.warning("Por favor, verifique os campos e tente novamente.");
    @endif
</script>

<style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #1f1f2e;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #8056FF, #FF56B1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #FF56B1, #0BC4E2);
    }
</style>

</html>
