# Twitter Clone Project / Projeto Twitter Clone
I created this repository to post scripts for the purpose of displaying my work. For those who speak English, just keep reading the next topic.

Criei este repositório para postar scripts com fins de exibir o meu trabalho. Para conseguir fazer uso do projeto é necessário ter instalado o PHP. Após o texto em inglês, eu ensinarei uma forma de conseguir executar o site e fazê-lo funcionar.

# How to run the site?
To be able to use the project it is necessary to have PHP installed. Below I will teach you a way to get the site running and make it work.

### Step 1
Install XAMPP: https://www.apachefriends.org/en_br/download.html

When installing XAMPP, you will only need to download Apache, PHP, MySQL and phpMyAdmin in the package.

### Step 2
After installing XAMPP, you can use PHP's built-in server as your HTTp server. I particularly prefer to use PHP's built-in server. For this, look for the directory where PHP was installed by XAMPP and then search in the Environment Variables settings, access the Environment Variable and include the folder where php is installed, so that all executables within the directory are recognized from anywhere of the operating system. **DO NOT DELETE ANYTHING FROM THE OPERATING SYSTEM PATH VARIABLE.**

### Step 3
To test if PHP is configured globally, just go to CMD and type the command **php -v**. If configured, the installed version of PHP will appear.

### Step 4
After configuring PHP, it is necessary to open the XAMPP panel, enable Apache and MySQL. With them enabled, access phpMyAdmin and use the queries from the querys.txt file.

### Step 5
Now just access the CMD, select the path to the folder where the repository was downloaded and enter the following command to create a local server:
```sh
php -S localhost:8080
```

### Step 6
After performing all the steps, everything is configured to be able to use the site, just type localhost:8080 in your browser's URL.

# How to use the site?
The site works with the MVC Architecture, so it works with the route system.

### REGISTRATION AND LOGIN
Register some users for testing. Recommend 3. After registering some users, log in.

### Tweet
After registering and logging in, you can tweet, delete your own tweets, follow other users and view their tweets.


# Como executar o site?

### Passo 1
Instalar o XAMPP: https://www.apachefriends.org/pt_br/download.html

Ao instalar o XAMPP, só será necessário baixar no pacote o Apache, o PHP, o MySQL e o phpMyAdmin.

### Passo 2
Após instalar o XAMPP, é possível utilizar como servidor HTTp o servidor embutido do PHP. Eu particularmente prefiro utilizar o servidor embutido do PHP. Para isso, procure o diretório onde o PHP foi instalado pelo XAMPP e depois pesquise nas configurações Variáveis de Ambiente, acesse a Variável de Ambiente e inclua a pasta onde o php está instalado, para que todos os executáveis dentro do diretório sejam reconhecidos de qualquer local do sistema operacional. **NÂO APAGAR NADA DA VARIÁVEL PATH DO SISTEMA OPERACIONAL.**

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
