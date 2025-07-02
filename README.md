
# AutoCar - Plataforma de Revenda de Veículos

AutoCar é uma plataforma completa para revenda de automóveis, oferecendo uma experiência moderna e intuitiva tanto para clientes quanto para administradores. O sistema permite:

Navegação por catálogo de veículos

Simulação e envio de propostas de financiamento

Painel administrativo completo para gestão de estoque e propostas


## Funcionalidades
🔍 Catálogo de Veículos
Pesquisa avançada com filtros por marca, modelo, ano e preço. Visualização detalhada com destaques.

💰 Proposta de Financiamento
Formulário interativo passo a passo para envio de propostas de financiamento.

🛠️ Gestão Administrativa (Filament)
Cadastro, edição e exclusão de veículos, controle de propostas e clientes.

🔗 Integração FIPE
Consulta automática de marcas, modelos e preços via API FIPE.

🛡️ LGPD
Termos de uso, política de privacidade e consentimento explícito nas propostas.

📱 Design Responsivo
Interface otimizada para dispositivos móveis e desktop.

📊 Extras
Estatísticas, equipe, diferenciais, banners promocionais e formulário de contato.## Stack utilizada

**Back-end:** Laravel, Livewire, Eloquent ORM

**Front-end:** Blade, TailwindCSS, Alpine.js, FontAwesome

**Banco de dados:** MySQL / MariaDB

**Integração** API FIPE

**Outros** Vite, Composer, NPM
## Instalação

1. Clone o repositório

```bash
 git clone https://github.com/devbrunoaraujo/autocar.git
    cd autocar

```

2. Instale as dependências

```bash
 composer install
 npm install

```

3. Configure o ambiente
    - copie o arquivo .env.example para .env

```bash
 cp .env.example .env

```

4. Gere a chave da aplicação

```bash
 php artisan key:generate

```

5. Execute migrações e seeders

```bash
 php artisan migrate --seed

```

6. Compile os assets

```bash
 npm run build

```

7. Inicie o servidor

```bash
 php artisan serve

```


    
# Painel Administrativo

Acesse: http://localhost:8000/admin

Crie um usuário administrador com o comando:


```bash
    php artisan make:filament-user

```


## Estrutura

├── app/
│   ├── Models/                # Car, FinancingProposalModel, Customer
│   └── Livewire/             # Componentes Livewire
│
├── resources/
│   └── views/livewire/       # Views dos componentes
│
├── database/
│   └── migrations/           # Estrutura do banco de dados
│
├── routes/
│   └── web.php               # Rotas do sistema
