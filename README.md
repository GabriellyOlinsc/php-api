# PHP API RESTful

<p align="center">
   <img src="https://img.shields.io/static/v1?label=STATUS&message=EM DESENVOLVIMENTO&color=RED&style=for-the-badge" #vitrinedev/>
</p>

## Guia Completo: Rodando API PHP no Visual Studio Code

## 📋 **Pré-requisitos**

### 1. **Instalar o PHP**

#### **Windows:**

1. Acesse: https://www.php.net/downloads.php ou diretamente em https://windows.php.net/download#php-8.4
2. Baixe a versão **Thread Safe** (ex: `php-8.2.x-Win32-vs16-x64.zip`)
3. Extraia para `C:\php`
4. Adicione `C:\php` às variáveis de ambiente:
   - Pressione `Win + R`, digite `sysdm.cpl`
   - Vá em **Avançado** → **Variáveis de Ambiente**
   - Em **Variáveis do Sistema**, encontre `Path` e clique **Editar**
   - Clique **Novo** e adicione `C:\php`
   - Clique **OK** em todas as janelas

#### **macOS:**

```bash
# Instalar via Homebrew
brew install php

# Ou baixar do site oficial: https://www.php.net/downloads.php
```

#### **Linux (Ubuntu/Debian):**

```bash
sudo apt update
sudo apt install php php-cli php-json
```

### 2. **Verificar Instalação**

Abra o terminal e digite:

```bash
php --version
```

Deve aparecer algo como: `PHP 8.2.x (cli)...`

---

## 🔧 **Configuração no Visual Studio Code**

### 1. **Instalar Extensões Recomendadas**

No VS Code, vá em **Extensions** (Ctrl+Shift+X) e instale:

- **PHP Intelephense** (bmewburn.vscode-intelephense-client)
- **PHP Debug** (xdebug.php-debug)

### 2. **Criar Estrutura do Projeto**

```

├── public/
│   └── index.php             # Front controller: ponto de entrada da API
│
├── src/
│   ├── config/
│   │   └── database.php      # Configuração da conexão com PostgreSQL
│   │
│   ├── controllers/
│   │   ├── CategoriaController.php  # Lógica de manipulação das categorias
│   │   └── ItemController.php       # Lógica de manipulação dos itens
│   │
│   ├── models/
│   │   ├── Categoria.php     # Modelo da entidade Categoria (CRUD)
│   │   └── Item.php          # Modelo da entidade Item (CRUD)
│   │
│   └── utils/
│       └── Response.php      # Funções auxiliares para padronizar respostas JSON
│
├── .env                      # Variáveis de ambiente (como dados de conexão)

```

---

## 🎯 **Passo a Passo para Rodar o Projeto**

### **Passo 1: Criar e Organizar os Arquivos**

1. **Abra o VS Code**
2. **Crie uma nova pasta** para o projeto (ex: `projeto-api-php`)
3. **Abra a pasta** no VS Code: `File` → `Open Folder`
4. **Crie o arquivo `api.php`** e cole o código da API

### **Passo 2: Iniciar o Servidor PHP**

#### **Método 1: Terminal Integrado do VS Code**

1. Abra o terminal: `View` → `Terminal` (ou `Ctrl + '`)
2. Certifique-se de estar na pasta `src`. Pode ser utilizado o seguinte comando:

```bash
cd .\src\
```

3. Execute o comando:

```bash
php -S localhost:8000
```

#### **Método 2: Terminal Externo**

1. Abra o **Prompt de Comando** (Windows) ou **Terminal** (Mac/Linux)
2. Navegue até a pasta do projeto:

```bash
cd caminho/para/projeto-api-php
```

3. Execute:

```bash
php -S localhost:8000
```

### **Passo 3: Verificar se está Funcionando**

Quando o servidor iniciar, você verá:

```
PHP 8.2.x Development Server (http://localhost:8000) started
```

**Teste no navegador:**

- Acesse: http://localhost:8000/items
- Deve aparecer a lista de usuários em JSON

---

## 🧪 **Testando a API**

Para melhor organização e entendimento sobre os **endpoints**, é interessante utilizar a ferramenta [**Postmann**](https://www.postman.com/downloads/)

### **Método 1: Navegador (apenas GET)**

- **Listar categorias:** http://localhost:8000/categorias
- **Listar items:** http://localhost:8000/items

### **Método 2 (RECOMENDADO): Postmann**

Utilizar o seguinte link para importar todos os **endpoints** pontos para serem testados:

- [CodeQueens-PHP](https://interstellar-star-144677.postman.co/workspace/Team-Workspace~5eead234-3417-4440-84ed-4874d6ee7cff/collection/27429896-6aceac37-2c0e-470f-b8a5-6947377d5e04?action=share&source=copy-link&creator=27429896)

Após importar a coleção acima, basta testar os endpoints a vontade e sem medo :D!

---

## 🚀 **Comandos Úteis**

### **Iniciar Servidor (diferentes portas):**

```bash
php -S localhost:8000    # Porta 8000
php -S localhost:3000    # Porta 3000
php -S localhost:8080    # Porta 8080
```

### **Parar o Servidor:**

- Pressione `Ctrl + C` no terminal onde o servidor está rodando

### **Verificar se a porta está em uso:**

```bash
# Windows
netstat -an | findstr :8000

# Mac/Linux
lsof -i :8000
```

**🎉 Agora vocês estão prontas para desenvolver em PHP!**

