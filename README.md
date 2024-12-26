<h1> Gamificación </h1>

## Introducción
**Gamificación ** es una plataforma educativa desarrollada para gamificar la enseñanza de TIC en la Universidad Técnica del Norte. Inspirada en herramientas como Kahoot y DucaPlay, permite a los profesores evaluar a los estudiantes mediante preguntas y puntuaciones basadas en tiempo y precisión.

---

## Instalación

 1. Clonar el repositorio
```sh
git clone https://github.com/tu-usuario-tu-repo.git GamificacionUTENE
cd GamificacionUTENE
code .
```

2. Backend
```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

4. Frontend
```sh
Copiar código
npm install
npm run dev
```

A tener en cuenta para subir cambios
1. Para crear una nueva rama
```sh
Copiar código
git branch nombre-de-la-rama
git switch nombre-de-la-rama
```
2. Para subir los cambios a la rama principal (main)
```sh
Copiar código
git switch main
git pull origin main
git add . 
git commit -m "Descripción de los cambios"
git push origin main
```
3. Si hay conflictos al realizar las migraciones, ejecutar estos comandos
```sh
Copiar código
php artisan config:clear
php artisan migrate:fresh --seed
