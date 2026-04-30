# Memorial Analítico - Sistema de Cadastro de Veículos

## 1. Introdução
Este documento descreve o processo de desenvolvimento do sistema de gerenciamento de veículos "AutoGestão", desenvolvido como parte de um desafio profissional acadêmico. O objetivo do sistema é permitir o cadastro e a consulta de veículos disponíveis para venda, utilizando uma arquitetura cliente-servidor moderna.

## 2. Tecnologias Utilizadas
Para o desenvolvimento da solução, foram selecionadas tecnologias que garantem desempenho, segurança e uma experiência de usuário superior:

- **Front-end**:
    - **HTML5**: Estruturação semântica das páginas de cadastro e listagem.
    - **CSS3 (Moderno)**: Utilização de variáveis CSS, Glassmorphism, Dark Mode e Design Responsivo para uma interface premium.
    - **JavaScript (Vanilla)**: Manipulação dinâmica do DOM e comunicação assíncrona com o servidor via Fetch API (AJAX).
- **Back-end**:
    - **PHP 8.x**: Processamento das requisições, validação de dados e comunicação com o banco de dados.
- **Banco de Dados**:
    - **MySQL/MariaDB**: Armazenamento persistente dos dados dos veículos com integridade referencial.
- **Formato de Intercâmbio de Dados**:
    - **JSON**: Utilizado para o retorno das consultas do PHP para o front-end, conforme exigido pelos requisitos.

## 3. Solução Implementada
A solução foi dividida em camadas para facilitar a manutenção:

1.  **Camada de Dados**: Criou-se uma tabela `veiculos` contendo todos os campos solicitados (placa, marca, modelo, ano_fabricacao, ano_modelo, cor, combustivel, quilometragem, chassi, renavam, data_cadastro e observacoes). Todos os campos foram configurados como `NOT NULL` para atender ao requisito de obrigatoriedade.
2.  **Camada de API (Back-end)**: Um arquivo central (`api.php`) gerencia os métodos HTTP:
    - `POST`: Recebe um objeto JSON do front-end e realiza o `INSERT INTO` no banco.
    - `GET`: Realiza o `SELECT *` e converte o resultado em uma lista de objetos JSON.
3.  **Camada de Interface (Front-end)**:
    - **Página de Cadastro**: Um formulário validado que coleta as informações e as envia via Fetch API para o servidor.
    - **Página de Consulta**: Carrega os dados automaticamente ao abrir a página, gerando as linhas de uma tabela HTML dinamicamente através do processamento do JSON recebido.

## 4. Requisitos Atendidos
- [x] Tela HTML para cadastrar veículo.
- [x] Todos os campos configurados como obrigatórios.
- [x] Back-end implementado em PHP.
- [x] Persistência em banco de dados MySQL.
- [x] Tela de listagem com tabela HTML.
- [x] Implementação de retorno JSON no PHP para montagem da tabela.
- [x] Operações restritas a Inserção e Consulta (sem Alterar/Excluir).
- [x] Memorial Analítico detalhado.

## 5. Conclusão
O sistema "AutoGestão" cumpre integralmente os objetivos propostos, apresentando uma interface profissional que vai além do básico, demonstrando o domínio das tecnologias web estudadas e a capacidade de integrar front-end e back-end de forma eficiente.
