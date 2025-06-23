<div x-data="{ showModal: false }" x-on:open-terms-modal.window="showModal = true">
    <!-- Overlay do Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay - REMOVIDO o x-on:click aqui -->
            <div class="fixed inset-0 transition-opacity" 
                 aria-hidden="true"
                 x-on:click="showModal = false">
                <div class="absolute inset-0 bg-steel-blue bg-opacity-90"></div>
            </div>

            <!-- Modal container -->
            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-4xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg relative z-10" 
                 x-on:click.stop>
                
                <!-- Header do Modal -->
                <div class="flex items-center justify-between pb-4 border-b border-steel-gray border-opacity-20">
                    <h3 class="text-2xl font-bold text-steel-blue">
                        Termos de Uso
                    </h3>
                    <button x-on:click="showModal = false" 
                            class="text-steel-gray hover:text-deep-red transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Conteúdo do Modal -->
                <div class="mt-6 max-h-96 overflow-y-auto">
                    <div class="prose prose-sm max-w-none text-steel-blue">
                        <h4 class="text-lg font-semibold text-steel-blue mb-4">1. Aceitação dos Termos</h4>
                        <p class="mb-4 text-steel-gray">
                            Ao acessar e usar nosso site de revenda de veículos, você concorda em cumprir e estar vinculado aos seguintes termos e condições de uso. Se você não concordar com algum destes termos, não deverá usar nosso serviço.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">2. Definições</h4>
                        <p class="mb-4 text-steel-gray">
                            "Nós", "nosso" e "nossa" referem-se à empresa proprietária do site. "Você" e "seu" referem-se ao usuário do site. "Serviço" refere-se ao site de revenda de veículos e todos os serviços relacionados.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">3. Uso do Site</h4>
                        <p class="mb-4 text-steel-gray">
                            Nosso site destina-se exclusivamente à consulta, pesquisa e compra de veículos usados. Você concorda em usar o site apenas para fins legítimos e de acordo com todas as leis e regulamentos aplicáveis.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">4. Cadastro e Conta do Usuário</h4>
                        <p class="mb-4 text-steel-gray">
                            Para acessar certas funcionalidades do site, você pode precisar criar uma conta. Você é responsável por manter a confidencialidade de suas credenciais de login e por todas as atividades que ocorrem sob sua conta.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">5. Informações dos Veículos</h4>
                        <p class="mb-4 text-steel-gray">
                            Nos esforçamos para fornecer informações precisas sobre todos os veículos listados, incluindo preço, quilometragem, ano, modelo e condição. No entanto, não garantimos a precisão completa de todas as informações e recomendamos uma inspeção pessoal antes da compra.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">6. Processo de Compra</h4>
                        <p class="mb-4 text-steel-gray">
                            Todas as vendas estão sujeitas à disponibilidade do veículo e à aprovação de crédito, quando aplicável. Os preços podem estar sujeitos a alterações sem aviso prévio. A conclusão da compra requer a assinatura de contrato específico.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">7. Garantias e Isenções</h4>
                        <p class="mb-4 text-steel-gray">
                            Os veículos são vendidos "como estão", exceto quando expressamente indicado de outra forma. Qualquer garantia específica será detalhada no contrato de compra individual.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">8. Limitação de Responsabilidade</h4>
                        <p class="mb-4 text-steel-gray">
                            Não seremos responsáveis por quaisquer danos diretos, indiretos, incidentais, consequenciais ou punitivos decorrentes do uso ou incapacidade de usar nosso site ou serviços.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">9. Propriedade Intelectual</h4>
                        <p class="mb-4 text-steel-gray">
                            Todo o conteúdo do site, incluindo textos, gráficos, logotipos, imagens e software, é de nossa propriedade ou licenciado por nós e está protegido por direitos autorais e outras leis de propriedade intelectual.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">10. Modificações dos Termos</h4>
                        <p class="mb-4 text-steel-gray">
                            Reservamo-nos o direito de modificar estes termos a qualquer momento. As modificações entrarão em vigor imediatamente após a publicação no site. É sua responsabilidade verificar periodicamente estes termos.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">11. Cancelamento e Rescisão</h4>
                        <p class="mb-4 text-steel-gray">
                            Podemos suspender ou encerrar seu acesso ao site a qualquer momento, sem aviso prévio, por violação destes termos ou por qualquer outro motivo que consideremos apropriado.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">12. Lei Aplicável</h4>
                        <p class="mb-4 text-steel-gray">
                            Estes termos serão regidos e interpretados de acordo com as leis brasileiras. Qualquer disputa será resolvida nos tribunais competentes do Brasil.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">13. Contato</h4>
                        <p class="mb-4 text-steel-gray">
                            Se você tiver dúvidas sobre estes termos de uso, entre em contato conosco através dos canais de atendimento disponíveis no site.
                        </p>
                    </div>
                </div>

                <!-- Footer do Modal -->
                <div class="flex justify-end mt-6 pt-4 border-t border-steel-gray border-opacity-20">
                    <button x-on:click="showModal = false" 
                            class="px-6 py-2 text-sm font-medium text-white bg-electric-blue hover:bg-blue-600 rounded-lg transition-colors duration-200">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>