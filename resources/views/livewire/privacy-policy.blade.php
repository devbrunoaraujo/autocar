<div x-data="{ showModal: false }" x-on:open-privacy-modal.window="showModal = true">
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
            <!-- Background overlay - MOVIDO o x-on:click para aqui -->
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
                        Política de Privacidade
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
                        <h4 class="text-lg font-semibold text-steel-blue mb-4">1. Introdução</h4>
                        <p class="mb-4 text-steel-gray">
                            Esta Política de Privacidade descreve como coletamos, usamos, armazenamos e protegemos suas informações pessoais quando você usa nosso site de revenda de veículos. Estamos comprometidos em proteger sua privacidade e cumprir a Lei Geral de Proteção de Dados (LGPD).
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">2. Informações que Coletamos</h4>
                        <p class="mb-4 text-steel-gray">
                            <strong>Dados Pessoais:</strong> Nome completo, CPF, RG, endereço, telefone, e-mail, data de nascimento e informações profissionais quando você se cadastra ou solicita informações sobre veículos.
                        </p>
                        <p class="mb-4 text-steel-gray">
                            <strong>Dados de Navegação:</strong> Endereço IP, tipo de navegador, páginas visitadas, tempo de permanência no site, origem do acesso e outras informações técnicas.
                        </p>
                        <p class="mb-4 text-steel-gray">
                            <strong>Dados Financeiros:</strong> Informações sobre renda, histórico de crédito e dados bancários, quando necessário para processos de financiamento.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">3. Como Coletamos suas Informações</h4>
                        <p class="mb-4 text-steel-gray">
                            Coletamos informações diretamente quando você nos fornece (formulários, cadastros, contatos) e automaticamente através de cookies e tecnologias similares durante sua navegação em nosso site.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">4. Finalidades do Tratamento</h4>
                        <p class="mb-4 text-steel-gray">
                            Utilizamos suas informações para processar vendas de veículos, fornecer atendimento ao cliente, enviar comunicações sobre produtos e serviços, realizar análises para melhorar nossos serviços, cumprir obrigações legais e prevenir fraudes.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">5. Base Legal para o Tratamento</h4>
                        <p class="mb-4 text-steel-gray">
                            Processamos seus dados pessoais com base no seu consentimento, execução de contrato, cumprimento de obrigação legal, proteção de interesses vitais, exercício de função pública e legítimo interesse.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">6. Compartilhamento de Informações</h4>
                        <p class="mb-4 text-steel-gray">
                            Podemos compartilhar suas informações com parceiros financeiros para análise de crédito, prestadores de serviços que nos auxiliam nas operações, autoridades governamentais quando exigido por lei, e empresas do nosso grupo empresarial.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">7. Segurança dos Dados</h4>
                        <p class="mb-4 text-steel-gray">
                            Implementamos medidas técnicas e organizacionais de segurança, incluindo criptografia, controles de acesso, monitoramento de sistemas e treinamento de funcionários para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">8. Retenção de Dados</h4>
                        <p class="mb-4 text-steel-gray">
                            Mantemos suas informações pessoais pelo tempo necessário para cumprir as finalidades para as quais foram coletadas, cumprir obrigações legais e regulamentares, e exercer direitos em processos judiciais.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">9. Cookies e Tecnologias Similares</h4>
                        <p class="mb-4 text-steel-gray">
                            Nosso site utiliza cookies essenciais para funcionamento básico, cookies de desempenho para análise de uso, cookies funcionais para lembrar preferências, e cookies de marketing para personalizar anúncios. Você pode gerenciar suas preferências de cookies nas configurações do navegador.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">10. Seus Direitos</h4>
                        <p class="mb-4 text-steel-gray">
                            Conforme a LGPD, você tem direito à confirmação da existência de tratamento, acesso aos dados, correção de dados incompletos/inexatos, anonimização/bloqueio/eliminação, portabilidade, eliminação dos dados tratados com consentimento, informação sobre compartilhamento, e revogação do consentimento.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">11. Transferência Internacional</h4>
                        <p class="mb-4 text-steel-gray">
                            Alguns de nossos prestadores de serviços podem estar localizados fora do Brasil. Quando isso ocorrer, garantimos que sejam adotadas as medidas de proteção adequadas conforme exigido pela LGPD.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">12. Menores de Idade</h4>
                        <p class="mb-4 text-steel-gray">
                            Nossos serviços não são direcionados a menores de 18 anos. Não coletamos intencionalmente dados pessoais de menores sem consentimento dos pais ou responsáveis legais.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">13. Alterações nesta Política</h4>
                        <p class="mb-4 text-steel-gray">
                            Podemos atualizar esta política periodicamente. Notificaremos sobre mudanças significativas por e-mail ou através de aviso em nosso site.
                        </p>

                        <h4 class="text-lg font-semibold text-steel-blue mb-4">14. Contato e Encarregado de Dados</h4>
                        <p class="mb-4 text-steel-gray">
                            Para exercer seus direitos ou esclarecer dúvidas sobre esta política, entre em contato com nosso Encarregado de Proteção de Dados através dos canais disponíveis no site ou autoridade competente (ANPD).
                        </p>

                        <p class="mb-4 text-steel-gray">
                            <strong>Data da última atualização:</strong> [Data]
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