# Docker Volume
Gerenciar dados com volume Docker de uma aplicação PHP
---
`docker build -t phpmessages .`

`docker run -d -p 81:80 --name phpmessages_container phpmessages`

`docker ps`

---
## Nesse ponto da aplicação é preciso estar atento, pois: 
	. Modificações nos arquivos php tornam necessario o rebuild da imagem;
	. Os arquivos txt gerados são salvos apenas no container;
		É necessario criar volumes para persistir os dados.

## Volumes Anônimos
-v /data Monta um volume anônimo na pasta /data do contêiner:

`docker run -d -p 81:80 --name phpmessages_container --rm -v /data phpmessages`

## Volumes Nomeados
-v nome_volume:/var/www/html/messages Monta um volume chamado “nome_volume” na pasta "messages" no workdir do contêiner:

`docker run -d -p 81:80 --name phpmessages_container --rm -v nome_volume:/var/www/html/messages phpmessages`

## Bind Mounts
Warning: fopen(./messages/msg-0.txt): Failed to open stream: Permission denied in /var/www/html/process.php on line 7
Fatal error: Uncaught TypeError: fwrite(): Argument #1 ($stream) must be of type resource, false given in /var/www/html/process.php:9 Stack trace: #0 /var/www/html/process.php(9): fwrite(false, 'teste') #1 {main} thrown in /var/www/html/process.php on line 9
`docker run -d -p 81:80 --name phpmessages_container --rm -v /home/azvdouglas/github.com/azvdouglas/docker-volume/messages:/var/www/html/messages phpmessages`

O erro ocorreu por que o diretório não tem permissão de escrita. Permissão que foi concedida com o comando:

`chmod 777 messages`

Aproveitei para utilizar o comando mais atualizado para rodar o container com bind mount:

`docker run -d -p 81:80 --name=phpmessages_container --mount type=bind,src=$PWD/messages,dst=/var/www/html/messages phpmessages`
