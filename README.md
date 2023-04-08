# Aplicación en Docker para pruebas - Empresa Zataca


## Requisitos previos

Para utilizar esta aplicación, debes tener instalados Docker y Docker Compose en tu sistema. Puedes seguir las guías de instalación oficiales para cada herramienta:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Comandos disponibles

- `make help`: Muestra este mensaje de ayuda.
- `make start`: Inicia los contenedores.
- `make stop`: Detiene los contenedores.
- `make restart`: Reinicia los contenedores.
- `make build`: Reconstruye todos los contenedores.
- `make prepare`: Ejecuta comandos del backend.
- `make composer-install`: Instala las dependencias de Composer.
- `make ssh-be`: Accede al contenedor del backend usando bash.
- `make run-tests`: Ejecuta las pruebas de Laravel.

## Ejemplo de uso

Primero, construye los contenedores Docker ejecutando el siguiente comando:

```bash
make build
