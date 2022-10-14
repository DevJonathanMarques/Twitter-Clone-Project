# Projeto Twitter Clone
Criei este repositório para postar scripts com fins de exibir o meu trabalho.

# Como executar o site?
Para conseguir fazer uso do projeto é necessário ter instalado o PHP. Abaixo eu ensinarei uma forma de conseguir executar o site e fazê-lo funcionar.

### Passo 1
Instalar o XAMPP: - https://www.apachefriends.org/pt_br/download.html

Ao instalar o XAMPP, só será necessário baixar no pacote o Apache, o PHP, o MySQL e o phpMyAdmin.

### Passo 2
Após instalar o XAMPP, é possível utilizar como servidor HTTp o Apache como o servidor embutido do PHP. Eu particularmente prefiro utilizar o servidor embutido do PHP. Para isso, procure o diretório onde o PHP foi instalado pelo XAMPP e depois pesquise nas configurações Variáveis de Ambiente, acesse a Variável de Ambiente e inclua a pasta onde o php está instalado, para que todos os executáveis dentro do diretório sejam reconhecidos de qualquer local do sistema operacional. **NÂO APAGAR NADA DA VARIÁVEL PATH DO SISTEMA OPERACIONAL.**

### Passo 3
Para testar se o PHP está configurado globalmente, basta ir no CMD e digitar o comando **php -v**. Se estiver configurado, irá aparecer a versão do PHP instalada.

### Passo 4
Após configurar o PHP, é necessário abrir o painel do XAMPP, habilitar o Apache e o MySQL. Com eles habilitados, acesse o phpMyAdmin e utilize as querys do arquivo querys.txt.

### Passo 5
Agora basta acessar o CMD, selecionar o caminho para a pasta onde foi baixado o repositório e digitar o seguinte comando para criar um servidor local:
```sh
php -S localhost:8080
```

### Passo 6
Após realizar todos os passos, tudo está configurado para conseguir utilizar o site, basta digitar localhost:8080 na URL do seu browser.

# Como utilizar o site?
O site funciona com a Arquitetura MVC, logo, ele funciona com o sistema de rotas.

### CADASTRO E LOGIN
Faça o cadastro de alguns usuários para teste. Recomendo 3. Após conseguir cadastrar alguns usuários, faça login.

### Tweetar
Após fazer cadastro e login é possível tweetar, deletar seus próprios tweets, seguir outros usuários e visuliazar os tweets deles.
