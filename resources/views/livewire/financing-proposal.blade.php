<div class="min-h-screen bg-gradient-to-br from-steel-blue via-steel-gray to-charcoal py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-electric-blue rounded-full mb-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-4">
                💰 Financie seu Carro dos Sonhos!
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Aprovação rápida, taxas especiais e condições imperdíveis.
                Complete sua proposta em poucos minutos!
            </p>
        </div>

        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                @for ($i = 1; $i <= $totalSteps; $i++)
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-medium
                            {{ $currentStep >= $i ? 'bg-electric-blue text-white' : 'bg-steel-gray text-gray-400' }}">
                            {{ $i }}
                        </div>
                        <span class="text-xs text-gray-400 mt-2">
                            @switch($i)
                                @case(1) Veículo @break
                                @case(2) Dados Pessoais @break
                                @case(3) Renda @break
                                @case(4) Confirmação @break
                            @endswitch
                        </span>
                    </div>
                    @if ($i < $totalSteps)
                        <div class="flex-1 h-1 mx-4 rounded
                            {{ $currentStep > $i ? 'bg-electric-blue' : 'bg-steel-gray' }}">
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12">
            <form wire:submit="submit">
                <!-- Step 1: Vehicle Information -->
                @if ($currentStep === 1)
                    <div class="space-y-6">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-steel-blue mb-2">🚗 Qual veículo você deseja?</h2>
                            <p class="text-gray-600">Conte-nos sobre o carro dos seus sonhos</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Marca</label>
                                <input type="text" wire:model="vehicle_brand"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="Ex: Toyota, Honda, Ford...">
                                @error('vehicle_brand') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Modelo</label>
                                <input type="text" wire:model="vehicle_model"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="Ex: Corolla, Civic, Focus...">
                                @error('vehicle_model') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Ano</label>
                                <input type="number" wire:model="vehicle_year"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="2024" min="1900" max="2025">
                                @error('vehicle_year') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Valor do Veículo</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">R$</span>
                                    <input type="number" wire:model="vehicle_price"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                        placeholder="50.000" min="1000" step="100">
                                </div>
                                @error('vehicle_price') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="bg-electric-blue/10 p-6 rounded-lg">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-electric-blue mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                <h3 class="font-semibold text-steel-blue">Por que escolher nosso financiamento?</h3>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✅ Aprovação em até 24 horas</li>
                                <li>✅ Taxas a partir de 1,2% ao mês</li>
                                <li>✅ Até 72 meses para pagar</li>
                                <li>✅ Sem entrada obrigatória</li>
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Step 2: Personal Information -->
                @if ($currentStep === 2)
                    <div class="space-y-6">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-steel-blue mb-2">👤 Seus dados pessoais</h2>
                            <p class="text-gray-600">Precisamos conhecer você melhor para oferecer as melhores condições</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-steel-blue mb-2">Nome Completo</label>
                                <input type="text" wire:model="full_name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="Seu nome completo">
                                @error('full_name') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">CPF</label>
                                <input type="text" wire:model="cpf"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="000.000.000-00" maxlength="11">
                                @error('cpf') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Data de Nascimento</label>
                                <input type="date" wire:model="birth_date"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all">
                                @error('birth_date') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">E-mail</label>
                                <input type="email" wire:model="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="seu@email.com">
                                @error('email') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Telefone/WhatsApp</label>
                                <input type="text" wire:model="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="(11) 99999-9999" maxlength="11">
                                @error('phone') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="bg-green-50 p-6 rounded-lg border border-green-200">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <h3 class="font-semibold text-green-800">Seus dados estão seguros!</h3>
                            </div>
                            <p class="text-sm text-green-700">
                                Utilizamos criptografia de ponta e seguimos rigorosamente a LGPD para proteger suas informações pessoais.
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Step 3: Financial Information -->
                @if ($currentStep === 3)
                    <div class="space-y-6">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-steel-blue mb-2">💼 Informações financeiras</h2>
                            <p class="text-gray-600">Conte-nos sobre sua renda para calcularmos as melhores condições</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Renda Mensal</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">R$</span>
                                    <input type="number" wire:model="monthly_income"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                        placeholder="5.000" min="1000" step="100">
                                </div>
                                @error('monthly_income') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Profissão</label>
                                <input type="text" wire:model="profession"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                    placeholder="Ex: Engenheiro, Professor...">
                                @error('profession') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Valor da Entrada (Opcional)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">R$</span>
                                    <input type="number" wire:model="down_payment"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all"
                                        placeholder="0" min="0" step="100">
                                </div>
                                @error('down_payment') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-steel-blue mb-2">Parcelas Desejadas</label>
                                <select wire:model="installments"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all">
                                    <option value="12">12x</option>
                                    <option value="18">18x</option>
                                    <option value="24" selected>24x</option>
                                    <option value="36">36x</option>
                                    <option value="48">48x</option>
                                    <option value="60">60x</option>
                                    <option value="72">72x</option>
                                </select>
                                @error('installments') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="bg-electric-blue/10 p-6 rounded-lg">
                            <h3 class="font-semibold text-steel-blue mb-3">💡 Dica para melhor aprovação:</h3>
                            <ul class="text-sm text-gray-700 space-y-2">
                                <li>• Renda mínima de 3x o valor da parcela aumenta as chances de aprovação</li>
                                <li>• Uma entrada maior reduz significativamente as taxas de juros</li>
                                <li>• Prazos mais curtos têm taxas menores</li>
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Step 4: Terms and Confirmation -->
                @if ($currentStep === 4)
                    <div class="space-y-6">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-steel-blue mb-2">✅ Confirme sua proposta</h2>
                            <p class="text-gray-600">Revise os dados e aceite os termos para finalizar</p>
                        </div>

                        <!-- Summary -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="font-semibold text-steel-blue mb-4">Resumo da sua proposta:</h3>
                            <div class="grid md:grid-cols-2 gap-4 text-sm">
                                <div><strong>Veículo:</strong> {{ $vehicle_brand }} {{ $vehicle_model }} {{ $vehicle_year }}</div>
                                <div><strong>Valor:</strong> R$ {{ number_format($vehicle_price, 2, ',', '.') }}</div>
                                <div><strong>Entrada:</strong> R$ {{ number_format($down_payment, 2, ',', '.') }}</div>
                                <div><strong>Parcelas:</strong> {{ $installments }}x</div>
                                <div><strong>Renda Mensal:</strong> R$ {{ number_format($monthly_income, 2, ',', '.') }}</div>
                                <div><strong>Profissão:</strong> {{ $profession }}</div>
                            </div>
                        </div>

                        <!-- LGPD Terms -->
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <input type="checkbox" wire:model="accept_terms" id="accept_terms"
                                    class="mt-1 h-4 w-4 text-electric-blue focus:ring-electric-blue border-gray-300 rounded">
                                <label for="accept_terms" class="ml-3 text-sm text-gray-700">
                                    Eu aceito os <a href="#" class="text-electric-blue hover:underline">Termos de Uso</a> e
                                    confirmo que todas as informações fornecidas são verdadeiras. *
                                </label>
                            </div>
                            @error('accept_terms') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror

                            <div class="flex items-start">
                                <input type="checkbox" wire:model="accept_privacy" id="accept_privacy"
                                    class="mt-1 h-4 w-4 text-electric-blue focus:ring-electric-blue border-gray-300 rounded">
                                <label for="accept_privacy" class="ml-3 text-sm text-gray-700">
                                    Eu aceito a <a href="#" class="text-electric-blue hover:underline">Política de Privacidade</a>
                                    e autorizo o tratamento dos meus dados pessoais conforme a LGPD. *
                                </label>
                            </div>
                            @error('accept_privacy') <span class="text-deep-red text-sm">{{ $message }}</span> @enderror

                            <div class="flex items-start">
                                <input type="checkbox" wire:model="marketing_consent" id="marketing_consent"
                                    class="mt-1 h-4 w-4 text-electric-blue focus:ring-electric-blue border-gray-300 rounded">
                                <label for="marketing_consent" class="ml-3 text-sm text-gray-700">
                                    Desejo receber ofertas e novidades por e-mail e WhatsApp (opcional).
                                </label>
                            </div>
                        </div>

                        <div class="bg-electric-blue/10 border border-electric-blue/20 p-6 rounded-lg">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 text-electric-blue mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                                <h3 class="font-semibold text-steel-blue">Proteção dos seus dados (LGPD)</h3>
                            </div>
                            <p class="text-sm text-gray-700">
                                Seus dados pessoais serão utilizados exclusivamente para análise de crédito e comunicação sobre sua proposta.
                                Você pode solicitar a exclusão dos seus dados a qualquer momento através do nosso canal de atendimento.
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8 pt-8 border-t border-gray-200">
                    @if ($currentStep > 1)
                        <button type="button" wire:click="previousStep"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Voltar
                        </button>
                    @else
                        <div></div>
                    @endif

                    @if ($currentStep < $totalSteps)
                        <button type="button" wire:click="nextStep"
                            class="px-8 py-3 bg-electric-blue text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center font-semibold">
                            Continuar
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    @else
                        <button type="submit"
                            class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center font-semibold">
                            🚀 Enviar Proposta
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <!-- Trust Badges -->
        <div class="mt-12 text-center">
            <div class="flex justify-center items-center space-x-8 text-white/70">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm">SSL Certificado</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm">LGPD Compliance</span>
                </div>
            </div>

            <!-- Call to Action Footer -->
            <div class="mt-8 text-center">
                <p class="text-white/60 text-sm mb-4">
                    Mais de 10.000 clientes já realizaram o sonho do carro próprio conosco!
                </p>
                <div class="flex justify-center space-x-4 text-white/40 text-xs">
                    <span>⭐ 4.9/5 Avaliação</span>
                    <span>•</span>
                    <span>🚗 +5.000 Carros Financiados</span>
                    <span>•</span>
                    <span>⚡ Aprovação Rápida</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div wire:loading.flex class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-4 text-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-electric-blue mx-auto mb-4"></div>
            <h3 class="text-lg font-semibold text-steel-blue mb-2">Processando...</h3>
            <p class="text-gray-600 text-sm">Por favor, aguarde enquanto processamos sua solicitação.</p>
        </div>
    </div>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif
</div>
