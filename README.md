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

