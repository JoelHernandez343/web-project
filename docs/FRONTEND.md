# ¿Cómo trabajar con el FrontEnd?

:warning: Si trabajas en la parte del FrontEnd, es **importante** que sólo trabajes en `./frontend/`

## Índice
- [Estructura del folder](#estructura-del-folder)
- [Trabajando](#trabajando)
- [Ver también](#ver-también)
    - [Plantillas/Layouts](#layouts)
    - [Mixins](#Mixins)

## Estructura del folder
```ssh
frontend
├── build
│   └── // Archivos HTML resultantes
├── css
│   ├── main.css // Nuestro css
│   └── materialize.min.css
├── images
|   └── // Imágenes a usar
├── js
│   ├── jquery-3.4.1.min.js
│   ├── main.js // Nuestro js
│   └── materialize.min.js
├── prepros-6.config
└── views 
    ├── // Vistas hechas en pug
    ├── index.pug
    ├── layouts // Clases que se pueden extender
    │   └── _home.pug
    └── mixins // Bloques reutilizables
        ├── _content.pug
        └── _p.pug
```

- `build`: Carpeta generada por Prepros donde se guardan las vistas renderizadas presentes en  `views`.
- `css`: Carpeta de estilos.
- `images`: Carpeta de imágenes.
- `js`: Carpeta de JavaScript.
- `views`: Los archivos que son **hijos directos** de esta carpeta son los que se renderizarán en `build`
    - `layouts`: Clases extendibles de **Pug**, puedes crear las que necesites. _No se renderizarán._
    - `mixins`: Bloques de código de **Pug** que se pueden usar dentro de cualquier otro archivo. _No se renderizarán._
- `prepros-6.config`: Configuración de Prepros 6 para que lo de arriba no se rompa :trollface:

## Trabajando
- Instala [Prepros 6](https://prepros.io/) si aun no lo tienes instalado. (Importante que sea la versión 6).
- Agrega la carpeta frontend a Prepros
- Inicia LivePreview ([Ayuda aquí](https://prepros.io/help/live-preview)).
- Las vistas deben ser creadas directamente en `views/`.
- Las _plantillas_ que quieras crear, van en `layouts`:
    - Los nombres de las _plantillas_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear la plantilla alumnos, el nombre debe ser `_alumnos.pug`.
- Los _mixins_ que quieras crear deben de ir en `mixins`:
    - Los nombres de las _mixins_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear el mixin footer, el nombre debe ser `_footer.pug`
## Ver también
- Más sobre `mixins` y `layouts` [aquí](https://www.sitepoint.com/a-beginners-guide-to-pug/)
- En desarrollo...
### Layouts
Las _templates_ o _layouts_ son plantillas que nos permiten tomar pedazos repetitivos de código HTML y usarlo en otros archivos.

**Nota:** Sólo pueden haber un `extend` por archivo.

Por ejemplo, supongamos que tenemos esta plantilla:
```pug
//- layouts/_home.pug
doctype html
html
  head
    title Esto es un título
    link(
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    )
  body
    //-  Bloque de contenido
    block content

    //- Bloque de footer
    block footer
  script(
    src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"
  )
```
Que es una plantilla que nos permite añadir lo que nosotros queramos en los `block`.
Ahora, queremos crear nuestro `index.html` basándonos en la plantilla. 

Creamos el archivo directamente en `views`:
```pug
//- views/index.pug
//- Extendemos la plantilla _home.pug
extends layouts/_home.pug

block content
  h1 Esto es el index
  .row
    .col.s6
      p Aquí va a ir algo

block footer
  h2 Footer
```
Lo cual nos generará el siguiente archivo HTML en `build`:
```html
<!DOCTYPE html>
<html>
  <head>
    <title>Esto es un título</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>
  <body>
    <h1>Esto es el index</h1>
    <div class="row">
      <div class="col s6">
          <p>Aquí va a ir algo</p>
      </div>
    </div>
    <h2>Footer</h2>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
```

### Mixins
Supongamos que queremos una sección reutilizable, como una `card`:
```pug
//- mixins/_card.pug
mixin card(title, content)
    .card.blue-grey.darken-1
        .card-content.white-text
            span.card-title= `${title}`
            p= `${content}`
        .card-action
            a(href="#") Action 1
```
Y queremos usarla 2 veces en index.pug:
```pug
//- Extendemos la plantilla _home.pug
extends layouts/_home.pug
//- Incluímos el mixin _card.pug
include mixins/_card.pug

block content
  - var title = 'Esto es un título', content = 'Esto es un contenido'
  - var title2 = 'Otro título', content2 = 'Otro contenido' 
  h1 Esto es el index
  .row
    .col.s6
      +card(title, content)
    .col.s6
      +card(title2, content2)

block footer
  h2 Footer
```
Generará el siguiente archivo HTML en `build`:
```html
<!DOCTYPE html>
<html>
  <head>
    <title>Esto es un título</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>
  <body>
    <h1>Esto es el index</h1>
    <div class="row">
      <div class="col s6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text"><span class="card-title">Esto es un título</span>
            <p>Esto es un contenido</p>
          </div>
          <div class="card-action"><a href="#">Action 1</a></div>
        </div>
      </div>
      <div class="col s6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text"><span class="card-title">Otro título</span>
            <p>Otro contenido</p>
          </div>
          <div class="card-action"><a href="#">Action 1</a></div>
        </div>
      </div>
    </div>
    <h2>Footer</h2>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
```