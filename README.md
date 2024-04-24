# docker-volume
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
