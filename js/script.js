// Função para cadastrar veículo
const formCadastro = document.getElementById('formCadastro');
if (formCadastro) {
    formCadastro.addEventListener('submit', async (e) => {
        e.preventDefault();
        const msgDiv = document.getElementById('mensagem');
        msgDiv.textContent = 'Enviando...';
        msgDiv.style.color = 'var(--primary)';

        const formData = new FormData(formCadastro);
        const data = Object.fromEntries(formData.entries());

        try {
            const response = await fetch('php/api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                msgDiv.textContent = result.message;
                msgDiv.style.color = 'var(--success)';
                formCadastro.reset();
            } else {
                msgDiv.textContent = result.message;
                msgDiv.style.color = '#ef4444';
            }
        } catch (error) {
            console.error('Erro:', error);
            msgDiv.textContent = 'Erro ao conectar com o servidor.';
            msgDiv.style.color = '#ef4444';
        }
    });
}

// Função para carregar veículos na tabela
async function carregarVeiculos() {
    const corpoTabela = document.getElementById('corpoTabela');
    if (!corpoTabela) return;

    try {
        const response = await fetch('php/api.php');
        const veiculos = await response.json();

        corpoTabela.innerHTML = '';

        if (veiculos.length === 0) {
            corpoTabela.innerHTML = '<tr><td colspan="7" style="text-align: center; color: var(--text-muted);">Nenhum veículo encontrado.</td></tr>';
            return;
        }

        veiculos.forEach(veiculo => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td style="font-weight: 600; color: var(--accent);">${veiculo.placa}</td>
                <td>${veiculo.marca} ${veiculo.modelo}</td>
                <td>${veiculo.ano_fabricacao}/${veiculo.ano_modelo}</td>
                <td>${veiculo.cor}</td>
                <td>${veiculo.combustivel}</td>
                <td>${Number(veiculo.quilometragem).toLocaleString()} km</td>
                <td>${new Date(veiculo.data_cadastro).toLocaleDateString('pt-BR')}</td>
            `;
            corpoTabela.appendChild(tr);
        });
    } catch (error) {
        console.error('Erro ao carregar:', error);
        corpoTabela.innerHTML = '<tr><td colspan="7" style="text-align: center; color: #ef4444;">Erro ao carregar dados do banco de dados.</td></tr>';
    }
}
