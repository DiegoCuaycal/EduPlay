<p align="center">
  <h1>🎮 <strong>EduPlay</strong> 🎮</h1>
</p>


**EduPlay** es una plataforma gamificada para docentes y estudiantes, desarrollada con **Laravel, PHP, PostgreSQL** y **Bootstrap**, que permite la creación de evaluaciones interactivas y el seguimiento del rendimiento académico en tiempo real. La plataforma facilita la participación de los estudiantes en pruebas mediante códigos únicos, ofrece rankings dinámicos y mantiene un historial de resultados, mientras que los docentes pueden crear y administrar pruebas de forma sencilla y visual.

---

## 🚀 Descripción del proyecto

EduPlay está inspirada en herramientas educativas como **Kahoot**. Permite que los docentes creen pruebas interactivas y que los estudiantes participen en tiempo real, con rankings dinámicos y seguimiento de resultados.  

El sistema soporta **dos roles principales**:

### 👩‍🎓 Rol Estudiante
- Ingresar a pruebas mediante un **código único**.  
- Responder preguntas en tiempo real y visualizar su **posición en el ranking**.  
- Consultar un **historial de pruebas realizadas**.  
- Acceder a la **configuración de perfil** (cambiar contraseña, editar información).  
- Visualizar **instrucciones y guías** para contestar correctamente las pruebas.  

### 👨‍🏫 Rol Profesor
- **Crear pruebas** con preguntas y respuestas, indicando la respuesta correcta.  
- Consultar el **historial de pruebas creadas**.  
- Configurar su cuenta y gestionar el perfil.  
- Acceder a una **guía para docentes** sobre cómo crear y administrar pruebas.  

---

## 🛠 Tecnologías utilizadas
- **Backend:** Laravel (PHP)  
- **Base de datos:** PostgreSQL  
- **Frontend:** Blade Templates (Laravel), HTML, CSS, JavaScript, Bootstrap  
- **Control de versiones:** Git & GitHub  

---

## ⚙️ Instalación y ejecución

 1. Clonar el repositorio
```sh
git clone https://github.com/DiegoCuaycal/GamificacionUTN
cd GamificacionUTN
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
npm install
npm run dev
```

