<div>
    <footer class="bg-blue-600 text-white py-8" id="contato">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="font-bold text-lg mb-2">Revenda</h3>
                <p>Veículos selecionados com garantia e procedência.</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Contato</h3>
                <p>📞 {{$siteConfig->telefone}}</p>
                <p>📧 {{ $siteConfig->email }}</p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Endereço</h3>
                <p>{{$siteConfig->endereco}}</p>
            </div>
        </div>
        <div class="text-center mt-6 text-sm text-white/70">
            © {{ now()->year }} Revenda de Veículos. Todos os direitos reservados.
        </div>
    </footer>

</div>
