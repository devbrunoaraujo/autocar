AutoCar - Plataforma de Revenda de Veículos
AutoCar é uma plataforma completa para revenda de automóveis, oferecendo uma experiência moderna tanto para clientes quanto para administradores. O sistema permite a navegação por um catálogo de veículos, simulação e envio de propostas de financiamento, além de um painel administrativo robusto para gestão de estoque e propostas.

Funcionalidades
Catálogo de Veículos: Pesquisa, filtros dinâmicos (marca, modelo, ano, preço), visualização detalhada e destaques.
Simulação de Financiamento: Formulário passo a passo, cálculo de parcelas, envio de proposta e acompanhamento do status.
Gestão Administrativa: Painel Filament para cadastro, edição e exclusão de veículos, controle de propostas de financiamento e clientes.
Integração FIPE: Consulta automática de marcas, modelos, anos e preços via API FIPE.
LGPD: Termos de uso, política de privacidade e consentimento explícito no envio de propostas.
Responsivo: Interface adaptada para dispositivos móveis e desktop.
Recursos Extras: Estatísticas, equipe, diferenciais, banners promocionais e contato.
Tecnologias Utilizadas
Backend: Laravel 10+, Livewire, Eloquent ORM
Frontend: Blade, TailwindCSS, Alpine.js, FontAwesome
Painel Admin: Filament
Banco de Dados: MySQL/MariaDB
Integração: API FIPE (https://parallelum.com.br/fipe/api/v1)
Outros: Vite, Composer, NPM
Instalação
Clone o repositório:
git clone https://github.com/seu-usuario/autocar.git
cd autocar

Instale as dependências:
composer install
npm install


Configure o ambiente:

Copie .env.example para .env e ajuste as variáveis (DB, FIPE, etc).
Gere a chave da aplicação:
php artisan key:generate

Execute as migrações e seeders:
php artisan migrate --seed

Compile os assets:
npm run build

Inicie o servidor:
php artisan serve

Acesse em http://localhost:8000

Painel Administrativo
Acesse /admin (ou conforme configuração do Filament)
Crie um usuário admin com:
php artisan make:filament-user

Estrutura Principal
Models - Modelos Eloquent (Car, FinancingProposalModel, Customer)
Livewire - Componentes Livewire (filtros, listagem, formulário de financiamento)
Resources - Recursos do painel administrativo
livewire - Views dos componentes
migrations - Estrutura do banco de dados
Observações
O projeto segue as melhores práticas de segurança e privacidade (LGPD).
A integração FIPE exige configuração da URL no .env e em services.php.
Para dúvidas, consulte os arquivos de exemplo e comentários no código.