# 🏥 CliniGest: Sistema de Gestão Clínica (Substitui pelo nome do teu projeto)

![Licença](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-blueviolet)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4-purple)
![Status](https://img.shields.io/badge/status-Em%20Desenvolvimento-yellow)

Um sistema de *dashboard* web robusto para a gestão de clínicas, centros de saúde ou consultórios médicos. Facilita a administração de pacientes, consultas, materiais e utilizadores num único local.

## 📜 Índice

* [Sobre o Projeto](#-sobre-o-projeto)
* [✨ Funcionalidades Principais](#-funcionalidades-principais)
* [🚀 Tecnologias Utilizadas](#-tecnologias-utilizadas)
* [🛠️ Como Executar](#️-como-executar)
* [📂 Estrutura de Pastas](#-estrutura-de-pastas)
* [📄 Licença](#-licença)

## 📖 Sobre o Projeto

Este projeto é uma aplicação web completa construída em **PHP**, desenhada para servir como um painel de controlo administrativo (dashboard) para uma entidade de saúde. Ele utiliza o template **SB Admin 2** (baseado em Bootstrap 4) para uma interface de utilizador limpa, moderna e responsiva.

O sistema permite gerir todos os aspetos do dia-a-dia de uma clínica, desde o registo de pacientes até à gestão de materiais, passando pela marcação de consultas e comunicação interna.

## ✨ Funcionalidades Principais

O sistema está dividido por perfis de utilizador (Administrador, Secretário/a, Enfermeiro/a), cada um com as suas permissões específicas.

| Funcionalidade | Descrição |
| :--- | :--- |
| **Gestão de Pacientes** | CRUD (Criar, Ler, Atualizar, Apagar) completo de doentes. |
| **Gestão de Consultas** | Marcação e visualização de consultas num calendário interativo. |
| **Perfis de Paciente** | Página dedicada com o histórico e detalhes de cada paciente. |
| **Gestão de Utilizadores** | (Admin) Capacidade de adicionar, editar e remover contas de funcionários. |
| **Gestão de Stock** | Controlo de Equipamento e Materiais clínicos. |
| **Indicadores de Saúde** | Gráficos e *dashboards* para monitorizar indicadores (ex: Diabetes, Hipertensão, Saúde Infantil). |
| **Geração de PDF** | Emissão de documentos, como atestados médicos (`gerar_pdf.php`). |
| **Mensagens Internas** | Um sistema de chat em tempo real para comunicação entre a equipa. |
| **Autenticação** | Sistema seguro de Login, Logout e gestão de perfis de utilizador. |

## 🚀 Tecnologias Utilizadas

Este projeto é construído com as seguintes tecnologias:

* **Backend:**
    * ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat&logo=php&logoColor=white)
    * ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?style=flat&logo=mysql&logoColor=white) (Inferido, através de `ligacao.php`)
* **Frontend:**
    * ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat&logo=html5&logoColor=white)
    * ![CSS3](https://img.shields.io/badge/-CSS3-1572B6?style=flat&logo=css3&logoColor=white)
    * ![SASS](https://img.shields.io/badge/-SASS-CC6699?style=flat&logo=sass&logoColor=white) (Compilado via Gulp)
    * ![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
* **Frameworks & Bibliotecas:**
    * ![Bootstrap](https://img.shields.io/badge/-Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white) (Template SB Admin 2)
    * ![jQuery](https://img.shields.io/badge/-jQuery-0769AD?style=flat&logo=jquery&logoColor=white)
    * **Chart.js** (Para os gráficos e indicadores)
    * **DataTables** (Para tabelas interativas)
    * **Evo Calendar** (Para o calendário de consultas)
* **Ferramentas (DevOps):**
    * ![NPM](https://img.shields.io/badge/-NPM-CB3837?style=flat&logo=npm&logoColor=white)
    * ![Gulp](https://img.shields.io/badge/-Gulp-CF4647?style=flat&logo=gulp&logoColor=white)

## 🛠️ Como Executar

Para configurar e executar este projeto localmente, segue estes passos:

1.  **Requisitos:**
    * Um servidor web (Apache, Nginx, etc.)
    * PHP (versão 7.4 ou superior)
    * Servidor de Base de Dados (MySQL ou MariaDB)
    * Node.js e NPM (para gerir as dependências de frontend)

2.  **Clonar o Repositório:**
    ```bash
    git clone [https://github.com/1231366/PROJETO.git](https://github.com/1231366/PROJETO.git)
    cd PROJETO
    ```

3.  **Configurar a Base de Dados:**
    * Importa o ficheiro `.sql` (se existir) para o teu gestor de BD (ex: phpMyAdmin).
    * Configura a ligação principal à BD no ficheiro `ligacao.php`.
    * Configura a ligação à BD para o chat em `Mensagens/php/config.php`.

4.  **Instalar Dependências de Frontend:**
    * O projeto usa `npm` para gerir bibliotecas como Bootstrap, jQuery, etc.
    ```bash
    npm install
    ```

5.  **Compilar (se necessário):**
    * O projeto contém um `gulpfile.js`, o que sugere que o SCSS é compilado para CSS. Se fizeste alterações nos ficheiros `.scss`, corre o Gulp.
    ```bash
    gulp
    ```

6.  **Executar:**
    * Coloca a pasta do projeto no diretório do teu servidor web (ex: `htdocs` no XAMPP, `www` no WAMP).
    * Acede ao projeto através do teu browser (ex: `http://localhost/PROJETO/`).

## 📂 Estrutura de Pastas

Uma visão geral da organização do projeto:
