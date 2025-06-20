
<div class="min-h-screen bg-gradient-to-br from-steel-blue via-steel-gray to-charcoal flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto text-center">
        <!-- Success Animation -->
        <div class="relative mb-8">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-green-500 rounded-full animate-pulse-slow">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="absolute inset-0 bg-green-400 rounded-full opacity-25 animate-ping"></div>
        </div>

        <!-- Success Message -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 animate-slide-up">
            <h1 class="text-4xl font-bold text-steel-blue mb-4">
                🎉 Proposta Enviada com Sucesso!
            </h1>

            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Sua proposta de financiamento foi recebida e já está sendo analisada por nossa equipe especializada.
            </p>

            <!-- Process Timeline -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-steel-blue mb-4">Próximos Passos:</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700">Proposta recebida e registrada</span>
                    </div>

                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-electric-blue rounded-full flex items-center justify-center mr-4 animate-pulse">
                            <span class="text-white text-sm font-bold">2</span>
                        </div>
                        <span class="text-gray-700">Análise de crédito (até 24 horas)</span>
                    </div>

                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                            <span class="text-gray-600 text-sm font-bold">3</span>
                        </div>
                        <span class="text-gray-500">Retorno com aprovação e condições</span>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-electric-blue/10 border border-electric-blue/20 rounded-lg p-6 mb-8">
                <h3 class="font-semibold text-steel-blue mb-3">📞 Nosso contato:</h3>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-electric-blue mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <span>(11) 99999-9999</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-electric-blue mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <span>financiamento@autocar.com</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('financing.index') }}"
                    class="px-8 py-3 bg-electric-blue text-white rounded-lg hover:bg-blue-600 transition-colors font-semibold">
                    Nova Proposta
                </a>
                <a href="{{ url('/') }}"
                    class="px-8 py-3 bg-steel-gray text-white rounded-lg hover:bg-gray-600 transition-colors font-semibold">
                    Voltar ao Site
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500">
                    📧 Os detalhes da sua análise serão enviados por e-mail. Caso sejam necessárias informações adicionais, entraremos em contato por um dos meios informados no seu cadastro.
                </p>
            </div>
        </div>

        <!-- Trust Badges -->
        <div class="mt-8 flex justify-center items-center space-x-6 text-white/70">
            <div class="flex items-center text-sm">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                Dados Protegidos
            </div>
            <div class="flex items-center text-sm">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                LGPD Compliance
            </div>
        </div>
    </div>
</div>
