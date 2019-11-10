# Guía Básica de Pug
`Pug` es un preprocesador para `HTML`, es decir, escribes `HTML` _sin escribir_ `HTML`.

:warning: `Pug` es muy especial con las identaciones, entonces, ten cuidado con cuantos _tabs_ escribes en tu código.

## Índice
- [Lo básico](#Lo-básico)
- [Javascript en Pug](#Javascript-en-Pug)
- [Layouts](#Layouts)
- [Mixins](#Mixins)
- [Ver tambien](#ver-también)

## Lo básico:
```pug
doctype html
html
    head
        title Esto es un título
        link(rel="stylesheet" src="css/estilo.css")
    body
        //- Comentario que se ignora
        // Comentario que no se ignora
        img(src="images/imagen.jpg" alt="Alt text")
        
        //- No es necesario usar div si va a tener clases añadidas, o id's
        .clase1.clase2.clase3
        #identificador
        #id.clase1.clase2

        //- Etiquetas con clases
        h1.clase-para-header1

        //- Etiqueta que se cierra a sí misma forzadamente
        circle.clase-para-circle/

        span#id-para-span.clase-para-span Contenido

    script(src="js/script.js")
```
Resultado:
```html
<!DOCTYPE html>
<html>
  <head>
    <title>Esto es un título</title>
    <link rel="stylesheet" src="css/estilo.css">
  </head>
  <body>
    <!-- Comentario que no se ignora--><img src="images/imagen.jpg" alt="Alt text">
    <div class="clase1 clase2 clase3"></div>
    <div id="identificador"></div>
    <div class="clase1 clase2" id="id"></div>
    <h1 class="clase-para-header1"></h1>
    <circle class="clase-para-circle"/><span class="clase-para-span" id="id-para-span">Contenido</span>
  </body>
  <script src="js/script.js"></script>
</html>
```

## Javascript en Pug
```pug
- var variable = 10;
- let otra_variable = '';
- for (var i = 0; i < 10; ++i){
-    otra_variable += 'a';
- }
p= 5 + variable
p= `Esto es una literal de JS: ${variable}`
//- También se puede así:
p #{otra_variable}
```
Resultado:
```html
<p>15</p>
<p>Esto es una literal de JS: 10</p>
<p>aaaaaaaaaa</p>
```

## Layouts
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

## Mixins
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

## Ver también
- Tutorial con `ExpressJS` y `NodeJS`, aunque puedes ver como lo usa sin hacer el tutorial [aquí](https://www.sitepoint.com/a-beginners-guide-to-pug/)